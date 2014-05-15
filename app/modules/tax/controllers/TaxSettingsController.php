<?php
namespace App\Modules\Tax;

class TaxSettingsController extends \BaseController
{

    /**
     * Display General Settings page
     *@param none
     *@return none
     */
    public function getGeneral()
    {

        $timezones = tz_list();

        $dateFormats = array(
            'F j, Y' => date('F j, Y'),
            'Y/m/d'	 => date('Y/m/d'),
            'm/d/Y'	 => date('m/d/Y'),
            'd/m/Y'	 => date('d/m/Y'),
            'custom' => 'Custom'
        );

        $timeFormats = array(
            'g:i a'  => date('g:i a'),
            'g:i A'  => date('g:i A'),
            'H:i'	 => date('H:i'),
            'custom' => 'Custom'
        );

        return \View::make('tax::tax-settings.general')
            ->with('timezones', $timezones)
            ->with('dateFormats', $dateFormats)
            ->with('timeFormats', $timeFormats);

    }

    public function postGeneral() {
        $input = \Input::all();

        $rules = array(
            'admin_email' 		=> 'required|email',
            'timezone_string'	=> 'required',
            'date_format'		=> 'required',
            'post_per_page'		=> 'required|integer'
        );

        if(isset($input['date_format']) == 'custom')
        {
            $rules['date_format_custom'] = 'required';
        }

        if(isset($input['time_format']) == 'custom')
        {
            $rules['time_format_custom'] = 'required';
        }
        $input_toValidate = $input['option'];

        $validator = \Validator::make($input_toValidate, $rules);

        if( $validator->passes() )
        {
            $settings = new \Settings;

            foreach($input['option'] as $option_name => $option_value)
            {
                $settings->saveSettings($option_name, $option_value);
            }

            return \Redirect::to('admin/tax-form/settings/general')
                ->with('success_msg', 'Settings successfully saved');
        }
        else
        {
            return \Redirect::to('admin/tax-form/settings/general')
                ->withInput()
                ->with('errors', $validator->getMessageBag()->toArray());
        }
    }



    /**
     * Display Payment Settings page
     *@param none
     *@return none
     */

    public function getPayment()
    {
        $currencies = getCurrency();

        return \View::make('tax::tax-settings.payment')->with('currencies', $currencies);
    }

    /**
     * @return mixed
     */
    public function postPayment() {
        $input = \Input::all();

        $rules= array();

        $input_toValidate = $input['option'];

        $validator = \Validator::make($input_toValidate, $rules);

        if( $validator->passes() )
        {
            $settings = new \Settings;

            foreach($input['option'] as $option_name => $option_value)
            {
                $settings->saveSettings($option_name, $option_value);
            }

            return \Redirect::to('admin/tax-form/settings/payment')
                ->with('zones', 'Settings successfully saved');
        }
    }

}