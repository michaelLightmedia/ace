<?php

class UserTaxYear extends Eloquent{

    protected $table = 'user_tax_years';
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function usertaxyearmeta() {
        return $this->hasMany('UserTaxYearMeta','user_tax_year_id');
    }
    
    // STATUSES

    const STATUS_IN_PROGRESS = "in_progress";
    const STATUS_PAID_AND_SUBMITTED = "paid_and_submitted";
    const STATUS_REVIEWED_BY_ACCOUNTANT = "reviewed_by_accountant";
    const STATUS_REVIEWED_BY_AGENT = "reviewed_by_agent";
    const STATUS_SUBMITTED_TO_ATO = "submitted_to_ATO";

    public static $status_label = array(
        self::STATUS_IN_PROGRESS => 'In Progress',
        self::STATUS_PAID_AND_SUBMITTED => 'Paid and Submitted',
        self::STATUS_REVIEWED_BY_ACCOUNTANT => 'Reviewed by Accountant',
        self::STATUS_REVIEWED_BY_AGENT => 'Reviewed By Agent',
        self::STATUS_SUBMITTED_TO_ATO => 'Submitted to ATO',
    );



    // META HELPER

    private function getMetaCachedName($meta_name) {
        return 'meta_key_'.$meta_name.'_'.$this->id;
    }

    public function createMeta($key,$value) {

        // remove cached ' meta_key_(meta_name)_(userid)
        Cache::forget( $this->getMetaCachedName($key) );

        $is_exists = $this->usertaxyearmeta()->where('meta_key','=',$key)->first();

        if ($is_exists) {
            $meta = $is_exists;
        } else {
            $meta = new UserTaxYearMeta;
        }

        $meta->user_tax_year_id  = $this->id;
        $meta->meta_key = $key;
        $meta->meta_value = meta2db_value($value) ;
        $meta->save();

    }

    public function getMeta($key) {
        $meta = $this->usertaxyearmeta()
            ->where('meta_key','=',$key)
            ->remember( 2000,$this->getMetaCachedName($key) )
            ->first();

        if (!$meta) return false;

        return $meta;
    }

    public function updateMeta($key,$value) {
        $this->createMeta($key,$value);
    }

    public function getMetaValue($key) {
        $meta = $this->getMeta($key);

        return $meta ? meta_true_value($meta->meta_value) : "";
    }


    function createHooksMeta() {
        $this->createMeta('flag_income',0);
        $this->createMeta('flag_deductions',0);
        $this->createMeta('flag_deductions',0);
    }




    // STATIC HELPERS

    public static function hasFiled($user_id,$tax_year) {
        return self::where('user_id','=',$user_id)
            ->where('tax_year','=',$tax_year)
            ->first();
    }



    // Handle The creation of Income related Table.
    public static function validateDataIncomes() {
        $return_url = '/dashboard';
        // Default Input

        $input = Input::all();

        // Default rules
        $rules = array(
            'user_tax_year_id' => 'required|numeric|exists:user_tax_years,id'
        );

        // Salary Rules
        if (Input::has('tax_salary') && is_array(Input::get('tax_salary'))) {
            // The Input
            foreach(Input::get('tax_salary') as $key=>$value) {
                // Rules
                $rules["tax_salary.{$key}.payers_abn"] = 'required|abn';
                $rules["tax_salary.{$key}.payers_name"] = 'required|max:1000';
                $rules["tax_salary.{$key}.gross_salary"] = 'money';
                $rules["tax_salary.{$key}.tax_withheld"] = 'required|money';
                $rules["tax_salary.{$key}.fringe_benefits"] = 'money';
                $rules["tax_salary.{$key}.allowance_amount"] = 'money';
                $rules["tax_salary.{$key}.lump_sum_amount"] = 'money';
                $rules["tax_salary.{$key}.lump_sum_type"] = 'required';
            }

        } else {
            App::abort('500');
        }

        // Bank Interests
        if (Input::has('bank_interest') && is_array(Input::get('bank_interest'))) {
            for ($i = 0, $c = count(Input::get('bank_interest')); $i < $c; $i++) {
                $rules["bank_interest.{$i}.bank"] = 'required|max:1000';
                $rules["bank_interest.{$i}.interest"] = 'required|money';
                $rules["bank_interest.{$i}.tax_withheld"] = 'required|money';
            }
        }


        // Dividend
        if (Input::has('dividend') && is_array(Input::get('dividend'))) {
            for ($i = 0, $c = count(Input::get('dividend')); $i < $c; $i++) {
                $rules["dividend.{$i}.company"] = 'required|max:1000';
                $rules["dividend.{$i}.unfranked_divident"] = 'required|money';
                $rules["dividend.{$i}.franked_divident"] = 'required|money';
                $rules["dividend.{$i}.franking_credit"] = 'required|money';
                $rules["dividend.{$i}.tax_withheld"] = 'required|money';
            }
        }


        // Other Income
        if (Input::has('other_income') && is_array(Input::get('other_income'))) {
            for ($i = 0, $c = count(Input::get('other_income')); $i < $c; $i++) {
                $rules["other_income.{$i}.income_type_guid"] = 'required|exists:tax_income_types,guid';
                $rules["other_income.{$i}.description"] = 'required|max:1000';
                $rules["other_income.{$i}.amount"] = 'required|money';
                $rules["other_income.{$i}.tax_withheld"] = 'required|money';
            }
        }



        // No any additional information

        $validator = Validator::make($input,$rules);

        if($validator->fails()){

            if (Request::ajax()) {
                $response =  array(
                    'status'=>  'error',
                    'errorData'=> $validator->getMessageBag()->toArray(),
                    'errorMsg' => 'Please correct the error below and try again.',
                );

                return Response::json( $response );

            } else {
                return Redirect::to($return_url)
                    ->withErrors($validator)
                    ->withInput()
                    ->with('error_msg',"Please correct the error below.");
            }

        } else {

            // Manual validation for any required business roles validation
            // Validate if client own the user_tax_year or does have a previleges to change settings
            $real_tax_year_owner = UserTaxYear::where('id','=',Input::get('user_tax_year_id'))
                ->where('user_id','=',Auth::user()->id)->first();

            if (!$real_tax_year_owner && !can('manage_tax')) {
                App::abort('403');
            }

            return false;
        }
    }

    public static function saveDataIncomes() {

        // Default rules
        $user_tax_year_id = Input::get('user_tax_year_id');

        // Tax Salary
        TaxSalary::where('user_tax_year_id','=',$user_tax_year_id)->delete();
        foreach(Input::get('tax_salary') as $value) {
            $salary = new TaxSalary();
            $salary->user_tax_year_id     = $user_tax_year_id;
            $salary->payers_abn     = $value['payers_abn'];
            $salary->payers_name    = $value['payers_name'];
            $salary->gross_salary   = parse_money($value['gross_salary']);
            $salary->tax_withheld   = parse_money($value['tax_withheld']);
            $salary->fringe_benefits    = parse_money($value['fringe_benefits']);
            $salary->allowance_amount   = parse_money($value['allowance_amount']);
            $salary->lump_sum_amount    = parse_money($value['lump_sum_amount']);
            $salary->lump_sum_type      = $value['lump_sum_type'];
            $salary->save();
        }

        // Bank Interest
        TaxBankInterest::where('user_tax_year_id','=',$user_tax_year_id)->delete();
        if (Input::has('bank_interest') && is_array(Input::get('bank_interest'))) {
            foreach(Input::get('bank_interest') as $value) {
                $bank_interest = new TaxBankInterest();
                $bank_interest->user_tax_year_id     = $user_tax_year_id;
                $bank_interest->bank     = $value['bank'];
                $bank_interest->interest    = parse_money($value['interest']);
                $bank_interest->tax_withheld   = parse_money($value['tax_withheld']);
                $bank_interest->save();
            }
        }

        // Bank Interest
        TaxDividend::where('user_tax_year_id','=',$user_tax_year_id)->delete();
        if (Input::has('dividend') && is_array(Input::get('dividend'))) {
            foreach(Input::get('dividend') as $value) {
                $dividend = new TaxDividend();
                $dividend->user_tax_year_id     = $user_tax_year_id;
                $dividend->company     = $value['company'];
                $dividend->unfranked_divident    = parse_money($value['unfranked_divident']);
                $dividend->franked_divident   = parse_money($value['franked_divident']);
                $dividend->franking_credit   = parse_money($value['franking_credit']);
                $dividend->tax_withheld   = parse_money($value['tax_withheld']);
                $dividend->save();
            }
        }

        TaxOtherIncome::where('user_tax_year_id','=',$user_tax_year_id)->delete();
        if (Input::has('other_income') && is_array(Input::get('other_income'))) {
            // Other Income
            foreach(Input::get('other_income') as $value) {
                $other_income = new TaxOtherIncome();
                $other_income->user_tax_year_id     = $user_tax_year_id;
                $other_income->income_type_guid     = $value['income_type_guid'];
                $other_income->description    = $value['description'];
                $other_income->amount   = parse_money($value['amount']);
                $other_income->tax_withheld   = parse_money($value['tax_withheld']);
                $other_income->save();
            }
        }
    }
}