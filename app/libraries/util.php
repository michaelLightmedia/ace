<?php

// Settings and Options helper and getter helper

function get_settings($setting_name) {
    return Settings::get($setting_name);
}

// Auth Helper and Roles

function get_logout_url() {
    return URL::to("/logout/?_token=" . urlencode(Session::get('_token')));
}


function is_logged_in() {
    return IS_LOGGED_IN;
}

function is_admin() {
    if (!is_logged_in()) {
        return false;
    }

    return Auth::user()->group_id == 1;
}
function is_super_user() {
    if (!is_logged_in()) {
        return false;
    }

    return Auth::user()->group_id == 5;
}

function can($role_name) {
    if ( is_logged_in() ) {
        return Auth::User()->group->hasRole($role_name);
    }
    return false;
}

// Blog Utilities

function get_blog_add_link() {

    if (is_logged_in() && can('manage_blogs')){
        return HTML::link("/admin/blog/create", 'Add new', array(
            'rel'=>'nofollow'
        ), false);
    } else {
        return "";
    }
}

function get_blog_edit_link($blog_id) {

    if (is_logged_in() && can('manage_blogs')){
        return HTML::link("/admin/blog/{$blog_id}/edit", 'Edit', array(
            'rel'=>'nofollow'
        ), false);
    } else {
        return "";
    }
}


// Short Code Registration

// function add_short_code($short_code_name,$func) {
//     ShortCode::add($short_code_name,$func);
// }

function post_decode($post_text) {
    preg_match_all('/\[([!?a-zA-Z_]+)\s(.+)?.+?\]/i', $post_text, $matches);

    foreach($matches[0] as $key=>$value) {
        //STRING FOUND

        //METHOD TO EXECUTE
        $short_code_key = $matches[1][$key];

        $found = $matches[2][$key];


        //CLEAN HTML
        $found = strip_tags($found);
        $found = html_entity_decode($found);
        $extracted = explode("\" \"", $found);
        $v = array();
        foreach($extracted as $extracted_val) {
            $extracted_val = substr($extracted_val,1,strlen($extracted_val) -1 );
            list($key,$extracted_val) = explode('"="',$extracted_val);

            $v[$key] = $extracted_val;
        }

        if(ShortCode::has($short_code_key) && ShortCode::funcExists($short_code_key)) {

            //EXECUTE METHOD IF FOUND
            ob_start();
            call_user_func(ShortCode::getFunc($short_code_key) , $v);

            $replace = ob_get_clean();

            //SUBSTITUTE TAG IN TEXT
            if($replace or empty($replace)) $post_text = str_replace($value, $replace, $post_text);

        }

        //SKIP ! EXECUTION
        if(substr($short_code_key, 0, 1) == '!') $post_text = str_replace('$!', '&#36;', $post_text);

        if(!is_array($v)) $v = array();
    }

    return $post_text;
}


// Lock Out After Several Attempt
function lock_out_user($email) {
    $user = User::where('email','=',$email)->first();

    if ($user) {
        $attempt = (int) $user->getMetaValue('login_attempt',1);
        $is_locked_out = (int) $user->getMetaValue('is_locked_out',0);

        // Not already locked out
        if ($is_locked_out != 1) {
            // Check for the attempt if greater than the sent attempt
            if ($attempt > (get_settings('maximum_login_attempt'))) {
                $user->updateMeta('lockout_datetime',time());
                $user->updateMeta('is_locked_out',1);
                $user->updateMeta('locked_out_session_used',csrf_token());
            } else {
                $attempt++;
                $user->updateMeta('login_attempt',$attempt);
            }
        }
    }


    return false;
}

function lock_out_remove($email) {
    $user = User::where('email','=',$email)->first();

    if ($user) {
        $user->updateMeta('is_locked_out',0);
        $user->updateMeta('login_attempt',1);
    }
}

function is_locked_out_user($email) {
    $user = User::where('email','=',$email)->first();

    if ($user) {

        $session_used = $user->getMetaValue('locked_out_session_used');
        $is_locked_out = (int) $user->getMetaValue('is_locked_out',0);

        // Not already locked out
        if ($is_locked_out == 1 && $session_used == csrf_token()) {

            // Checked if the locked out has expired.
            $lockout_datetime = $user->getMetaValue('lockout_datetime',time());
            $total_locked_hours = get_settings('user_locked_hours');
            $total_locked_hours_in_seconds = (($total_locked_hours * 60) * 60) - 2570;
            $descripancy = time() - $lockout_datetime; // total_locked hours to second
            if ($descripancy < $total_locked_hours_in_seconds) {
                // Session Session Message
                Session::flash('error_msg',get_settings('on_user_lock_message'));

                return true;
            } else {
                $user->updateMeta('is_locked_out',0);
            }

        }
    }

    return false;
}


// Meta : User Meta, Post Meta

function meta_cached_name($table,$id,$meta_name) {
    return 'meta_key_'.$meta_name.'_'.$table.'_'.$id;
}

function create_user_meta($user_id,$meta_key,$meta_value) {

    // remove cached ' meta_key_(met_aa_name)_(userid)
    Cache::forget( meta_cached_name('users',$user_id,$meta_key) );

    $is_exists = UserMeta::where('meta_key','=',$meta_key)
        ->where('user_id','')->first();

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




