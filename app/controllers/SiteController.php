<?php

class SiteController extends BaseController {


    function getContactUs() {
        return View::make('contact-us');
    }

    function postContactUs() {
        $input = Input::all();
        $return_url = Input::get('error_url');

        // Default rules
        $rules = array(
            'name' => '',
            'email' => 'required|email',
            'message' => 'required|max:1000|min:10'
        );

        // If Edit

        $validator = Validator::make($input,$rules);

        if($validator->fails()){

            Session::flash('error_msg','Validation errors occurred. Please confirm the fields and submit it again.');

            return Redirect::to($return_url)
                ->withErrors($validator)
                ->withInput()
                ->with('error_msg',"Please correct the error below.");

        } else {
            // Send Email notification.
            $data = array(
                'name'			 => $input['name'],
                'email' 			 => $input['email'],
                'data_message'	 => $input['message']
            );

            //Send email
            $is_send = \Mail::send('emails.contact_us_notification',$data, function($message) use ($data){
                $message->to(get_settings('admin_email'), $data['name'])->subject('Contact request.');
            });

            if ($is_send) {
                return Redirect::to(Input::get('success_url'));
            } else {
                Session::flash('Failed to send your message. Please try later or contact the administrator by another method.');

                return Redirect::to('/contact-us');
            }

        }
    }


}