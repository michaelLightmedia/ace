<?php

class TaxCarExpense extends Eloquent{

    protected $table = 'tax_car_expenses';
    protected $primaryKey = 'id';
    public $timestamps = true;

    // Handle The creation of Income related Table.
    public static function validateData() {
        $return_url = '/dashboard';
        // Default Input

        $input = Input::all();

        // Default rules
        $rules = array(
            'user_tax_year_id' => 'required|numeric|exists:user_tax_years,id'
        );

        $registrations = array();
        // Salary Rules
        if (Input::has('car_expenses') && is_array(Input::get('car_expenses'))) {
            // The Input
            foreach(Input::get('car_expenses') as $key=>$value) {
                // Rules
                $add_reg_rules = count($registrations) <= 0 ? "" : "|registration_not_in:\"" . join("\",\"",$registrations) . "\"";
                if (isset($input["car_expenses"][$key]["registration"]) && $input["car_expenses"][$key]["registration"] != "") {
                    $registrations[] = $input["car_expenses"][$key]["registration"];
                }


                // Add some business roles
                if (isset($input["car_expenses"][$key]['has_claimed_log_book']) && $input["car_expenses"][$key]['has_claimed_log_book'] == 1 ) {
                    // Check if business kilometre is required;
                    $business_kilometre_validation = "";
                    $log_book = "required|";
                } else {
                    $business_kilometre_validation = "required|";
                    $log_book = "";
                }


                $rules["car_expenses.{$key}.registration"]          = 'required' . $add_reg_rules;
                $rules["car_expenses.{$key}.cents_per_kilometre_id"] = 'required|max:1000|exists:cents_per_kilometre,id';
                $rules["car_expenses.{$key}.business_kilometre"]    = $business_kilometre_validation . 'numeric|max:5000';

                if (isset($input["car_expenses"][$key]['has_claimed_log_book']) && $input["car_expenses"][$key]['has_claimed_log_book'] == 1) {
                    $rules["car_expenses.{$key}.total_expenses"]        = $log_book . 'money';
                    $rules["car_expenses.{$key}.business_percentage"]   = $log_book . 'numeric|max:100|min:0';
                    $rules["car_expenses.{$key}.car_purchase_date"]     = $log_book . 'uk_date';
                    $rules["car_expenses.{$key}.car_purchase_amount"]   = $log_book . 'money';
                }
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

    public static function saveData() {

        // Default rules
        $user_tax_year_id = Input::get('user_tax_year_id');
        $input = Input::all();

        // The Input
        TaxCarExpense::where('user_tax_year_id','=',$user_tax_year_id)->delete();
        if (Input::has('car_expenses') && is_array(Input::get('car_expenses'))) {
            foreach(Input::get('car_expenses') as $key=>$value) {
                $car_expense = new TaxCarExpense();
                $car_expense->user_tax_year_id     = $user_tax_year_id;
                $car_expense->registration     = $value['registration'];
                $car_expense->cents_per_kilometre_id    = $value['cents_per_kilometre_id'];
                $car_expense->business_kilometre   = $value['business_kilometre'];

                $cent_per_kilometre = CentsPerKilometre::find($value['cents_per_kilometre_id']);

                if ($cent_per_kilometre) {
                    $car_expense->engine_capacity = $cent_per_kilometre->engine_capacity;
                    $car_expense->cents_per_kilometre = $cent_per_kilometre->cents_per_kilometre;
                }

                $car_expense->has_claimed_log_book = $input["car_expenses"][$key]['has_claimed_log_book'];

                if (isset($input["car_expenses"][$key]['has_claimed_log_book']) && $input   ["car_expenses"][$key]['has_claimed_log_book'] == 1) {
                    $car_expense->total_expenses   = parse_money($value['total_expenses']);
                    $car_expense->business_percentage    = $value['business_percentage'];
                    $car_expense->car_purchase_date   = d2db($value['car_purchase_date']);
                    $car_expense->car_purchase_amount    = parse_money($value['car_purchase_amount']);
                }
                $car_expense->save();
            }
        }
    }
}