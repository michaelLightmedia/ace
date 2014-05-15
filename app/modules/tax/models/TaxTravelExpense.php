<?php

class TaxTravelExpense extends Eloquent{

    protected $table = 'tax_travel_expenses';
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

        // Salary Rules
        if (Input::has('travel_expenses') && is_array(Input::get('travel_expenses'))) {

            // The Input
            foreach(Input::get('travel_expenses') as $key=>$value) {
                $rules["travel_expenses.{$key}.description"]          = 'required|max:1000|min:0';
                $rules["travel_expenses.{$key}.amount"] = 'required|money';
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
        TaxTravelExpense::where('user_tax_year_id','=',$user_tax_year_id)->delete();

        if (Input::has('travel_expenses')) {
            foreach(Input::get('travel_expenses') as $key=>$value) {
                $travel_expense = new TaxTravelExpense();
                $travel_expense->user_tax_year_id     = $user_tax_year_id;
                $travel_expense->description     = $value['description'];
                $travel_expense->amount    = parse_money($value['amount']);

                $travel_expense->save();
            }
        }
    }
}