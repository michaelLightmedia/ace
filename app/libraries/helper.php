<?php


// Debugger
function __d($data) {
    echo "<tt><pre>" . var_export($data, true) . "</pre></tt>";
}
function __dd($data) {
    echo "<tt><pre>" . var_export($data, true) . "</pre></tt>";
    die();
}


// Static content Helper

function getCountry() {
    return array(
        'AD' => 'Andorra',
        'AE' => 'United Arab Emirates',
        'AF' => 'Afghanistan',
        'AG' => 'Antigua and Barbuda',
        'AI' => 'Anguilla',
        'AL' => 'Albania',
        'AM' => 'Armenia',
        'AN' => 'Netherlands Antilles',
        'AO' => 'Angola',
        'AQ' => 'Antarctica',
        'AR' => 'Argentina',
        'AS' => 'American Samoa',
        'AT' => 'Austria',
        'AU' => 'Australia',
        'AW' => 'Aruba',
        'AX' => 'Aland Islands',
        'AZ' => 'Azerbaijan',
        'BA' => 'Bosnia and Herzegovina',
        'BB' => 'Barbados',
        'BD' => 'Bangladesh',
        'BE' => 'Belgium',
        'BF' => 'Burkina Faso',
        'BG' => 'Bulgaria',
        'BH' => 'Bahrain',
        'BI' => 'Burundi',
        'BJ' => 'Benin',
        'BL' => 'Saint Barthelemy',
        'BM' => 'Bermuda',
        'BN' => 'Brunei',
        'BO' => 'Bolivia',
        'BR' => 'Brazil',
        'BS' => 'Bahamas',
        'BT' => 'Bhutan',
        'BV' => 'Bouvet Island',
        'BW' => 'Botswana',
        'BY' => 'Belarus',
        'BZ' => 'Belize',
        'CA' => 'Canada',
        'CC' => 'Cocos (Keeling) Islands',
        'CD' => 'Congo (Kinshasa)',
        'CF' => 'Central African Republic',
        'CG' => 'Congo (Brazzaville)',
        'CH' => 'Switzerland',
        'CI' => 'Ivory Coast',
        'CK' => 'Cook Islands',
        'CL' => 'Chile',
        'CM' => 'Cameroon',
        'CN' => 'China',
        'CO' => 'Colombia',
        'CR' => 'Costa Rica',
        'CU' => 'Cuba',
        'CV' => 'Cape Verde',
        'CX' => 'Christmas Island',
        'CY' => 'Cyprus',
        'CZ' => 'Czech Republic',
        'DE' => 'Germany',
        'DJ' => 'Djibouti',
        'DK' => 'Denmark',
        'DM' => 'Dominica',
        'DO' => 'Dominican Republic',
        'DZ' => 'Algeria',
        'EC' => 'Ecuador',
        'EE' => 'Estonia',
        'EG' => 'Egypt',
        'EH' => 'Western Sahara',
        'ER' => 'Eritrea',
        'ES' => 'Spain',
        'ET' => 'Ethiopia',
        'FI' => 'Finland',
        'FJ' => 'Fiji',
        'FK' => 'Falkland Islands',
        'FM' => 'Micronesia',
        'FO' => 'Faroe Islands',
        'FR' => 'France',
        'GA' => 'Gabon',
        'GB' => 'United Kingdom',
        'GD' => 'Grenada',
        'GE' => 'Georgia',
        'GF' => 'French Guiana',
        'GG' => 'Guernsey',
        'GH' => 'Ghana',
        'GI' => 'Gibraltar',
        'GL' => 'Greenland',
        'GM' => 'Gambia',
        'GN' => 'Guinea',
        'GP' => 'Guadeloupe',
        'GQ' => 'Equatorial Guinea',
        'GR' => 'Greece',
        'GS' => 'South Georgia and the South Sandwich Islands',
        'GT' => 'Guatemala',
        'GU' => 'Guam',
        'GW' => 'Guinea-Bissau',
        'GY' => 'Guyana',
        'HK' => 'Hong Kong S.A.R., China',
        'HM' => 'Heard Island and McDonald Islands',
        'HN' => 'Honduras',
        'HR' => 'Croatia',
        'HT' => 'Haiti',
        'HU' => 'Hungary',
        'ID' => 'Indonesia',
        'IE' => 'Ireland',
        'IL' => 'Israel',
        'IM' => 'Isle of Man',
        'IN' => 'India',
        'IO' => 'British Indian Ocean Territory',
        'IQ' => 'Iraq',
        'IR' => 'Iran',
        'IS' => 'Iceland',
        'IT' => 'Italy',
        'JE' => 'Jersey',
        'JM' => 'Jamaica',
        'JO' => 'Jordan',
        'JP' => 'Japan',
        'KE' => 'Kenya',
        'KG' => 'Kyrgyzstan',
        'KH' => 'Cambodia',
        'KI' => 'Kiribati',
        'KM' => 'Comoros',
        'KN' => 'Saint Kitts and Nevis',
        'KP' => 'North Korea',
        'KR' => 'South Korea',
        'KW' => 'Kuwait',
        'KY' => 'Cayman Islands',
        'KZ' => 'Kazakhstan',
        'LA' => 'Laos',
        'LB' => 'Lebanon',
        'LC' => 'Saint Lucia',
        'LI' => 'Liechtenstein',
        'LK' => 'Sri Lanka',
        'LR' => 'Liberia',
        'LS' => 'Lesotho',
        'LT' => 'Lithuania',
        'LU' => 'Luxembourg',
        'LV' => 'Latvia',
        'LY' => 'Libya',
        'MA' => 'Morocco',
        'MC' => 'Monaco',
        'MD' => 'Moldova',
        'ME' => 'Montenegro',
        'MF' => 'Saint Martin (French part)',
        'MG' => 'Madagascar',
        'MH' => 'Marshall Islands',
        'MK' => 'Macedonia',
        'ML' => 'Mali',
        'MM' => 'Myanmar',
        'MN' => 'Mongolia',
        'MO' => 'Macao S.A.R., China',
        'MP' => 'Northern Mariana Islands',
        'MQ' => 'Martinique',
        'MR' => 'Mauritania',
        'MS' => 'Montserrat',
        'MT' => 'Malta',
        'MU' => 'Mauritius',
        'MV' => 'Maldives',
        'MW' => 'Malawi',
        'MX' => 'Mexico',
        'MY' => 'Malaysia',
        'MZ' => 'Mozambique',
        'NA' => 'Namibia',
        'NC' => 'New Caledonia',
        'NE' => 'Niger',
        'NF' => 'Norfolk Island',
        'NG' => 'Nigeria',
        'NI' => 'Nicaragua',
        'NL' => 'Netherlands',
        'NO' => 'Norway',
        'NP' => 'Nepal',
        'NR' => 'Nauru',
        'NU' => 'Niue',
        'NZ' => 'New Zealand',
        'OM' => 'Oman',
        'PA' => 'Panama',
        'PE' => 'Peru',
        'PF' => 'French Polynesia',
        'PG' => 'Papua New Guinea',
        'PH' => 'Philippines',
        'PK' => 'Pakistan',
        'PL' => 'Poland',
        'PM' => 'Saint Pierre and Miquelon',
        'PN' => 'Pitcairn',
        'PR' => 'Puerto Rico',
        'PS' => 'Palestinian Territory',
        'PT' => 'Portugal',
        'PW' => 'Palau',
        'PY' => 'Paraguay',
        'QA' => 'Qatar',
        'RE' => 'Reunion',
        'RO' => 'Romania',
        'RS' => 'Serbia',
        'RU' => 'Russia',
        'RW' => 'Rwanda',
        'SA' => 'Saudi Arabia',
        'SB' => 'Solomon Islands',
        'SC' => 'Seychelles',
        'SD' => 'Sudan',
        'SE' => 'Sweden',
        'SG' => 'Singapore',
        'SH' => 'Saint Helena',
        'SI' => 'Slovenia',
        'SJ' => 'Svalbard and Jan Mayen',
        'SK' => 'Slovakia',
        'SL' => 'Sierra Leone',
        'SM' => 'San Marino',
        'SN' => 'Senegal',
        'SO' => 'Somalia',
        'SR' => 'Suriname',
        'ST' => 'Sao Tome and Principe',
        'SV' => 'El Salvador',
        'SY' => 'Syria',
        'SZ' => 'Swaziland',
        'TC' => 'Turks and Caicos Islands',
        'TD' => 'Chad',
        'TF' => 'French Southern Territories',
        'TG' => 'Togo',
        'TH' => 'Thailand',
        'TJ' => 'Tajikistan',
        'TK' => 'Tokelau',
        'TL' => 'Timor-Leste',
        'TM' => 'Turkmenistan',
        'TN' => 'Tunisia',
        'TO' => 'Tonga',
        'TR' => 'Turkey',
        'TT' => 'Trinidad and Tobago',
        'TV' => 'Tuvalu',
        'TW' => 'Taiwan',
        'TZ' => 'Tanzania',
        'UA' => 'Ukraine',
        'UG' => 'Uganda',
        'UM' => 'United States Minor Outlying Islands',
        'US' => 'United States',
        'UY' => 'Uruguay',
        'UZ' => 'Uzbekistan',
        'VA' => 'Vatican',
        'VC' => 'Saint Vincent and the Grenadines',
        'VE' => 'Venezuela',
        'VG' => 'British Virgin Islands',
        'VI' => 'U.S. Virgin Islands',
        'VN' => 'Vietnam',
        'VU' => 'Vanuatu',
        'WF' => 'Wallis and Futuna',
        'WS' => 'Samoa',
        'YE' => 'Yemen',
        'YT' => 'Mayotte',
        'ZA' => 'South Africa',
        'ZM' => 'Zambia',
        'ZW' => 'Zimbabwe',
        'USAF' => 'US Armed Forces' ,
        'VE' => 'Venezuela',
    );
}

function getCurrency() {
    return array(
        'USD' => 'US Dollars ($)',
        'EUR' => 'Euros (€)',
        'GBP' => 'Pounds Sterling (£)',
        'AUD' => 'Australian Dollars ($)',
        'BRL' => 'Brazilian Real ($)',
        'CAD' => 'Canadian Dollars ($)',
        'CNY' => 'Chinese Yuan',
        'CZK' => 'Czech Koruna',
        'DKK' => 'Danish Krone',
        'HKD' => 'Hong Kong Dollar ($)',
        'HUF' => 'Hungarian Forint',
        'INR' => 'Indian Rupee',
        'IDR' => 'Indonesia Rupiah',
        'ILS' => 'Israeli Shekel',
        'JPY' => 'Japanese Yen (¥)',
        'MYR' => 'Malaysian Ringgits',
        'MXN' => 'Mexican Peso ($)',
        'NZD' => 'New Zealand Dollar ($)',
        'NOK' => 'Norwegian Krone',
        'PHP' => 'Philippine Pesos',
        'PLN' => 'Polish Zloty',
        'SGD' => 'Singapore Dollar ($)',
        'ZAR' => 'South African Rand',
        'KRW' => 'South Korean Won',
        'SEK' => 'Swedish Krona',
        'CHF' => 'Swiss Franc',
        'TWD' => 'Taiwan New Dollars',
        'THB' => 'Thai Baht',
        'TRY' => 'Turkish Lira',
        'VND' => 'Vietnamese Dong'
    );

}

/**
 * Convert $ 1,000.00 to 1000.00
 *
 * @param $money
 */
function parse_money($money) {

    // @todo : what if multiple currencies and another format. ?
    $final = str_replace(",",'',$money);
    $final = str_replace("$",'',$final);
    $final = str_replace(" ",'',$final);

    if (is_numeric($final)) {
        return $final;
    } else {
        return 0;
    }
}


// DATE FORMAT HELPER

/** Convert the specified timestamp to mysql datetime format
 * @param int $time a datetime time stamp
 * @author Stephen Cantila
 * @return Date
 */
function dt2db($time){
    if(!is_int($time))
        $time = strtotime($time);

    return date("Y-m-d H:i:s", $time);
}

/** Convert the specified timestamp to mysql datetime format
 *
 * @param Timestamp $time a datetime time stamp
 * @author Regner Atillo
 * @return date
 */
function d2db($time){
    $time = str_replace('/','-',$time);

    if( !is_int($time) )
        $time = strtotime($time);

    return date("Y-m-d", $time);
}//endfct

function db2dpicker($time) {
    $time = str_replace('/','-',$time);

    if( !is_int($time) )
        $time = strtotime( $time );

    return date( "d/m/Y", $time );
}

function db2dtpicker($time) {
    // @to do
    if(!is_int($time))
        $time = strtotime($time);

    return date("m/d/Y", $time);
}

/**
 * Date to client display formatted, not converted to timezone
 *
 * @param $time
 * @return bool|string
 */
function dbd2c($time) {

    $format = Settings::get('date_format');

    if (!empty($format)) {
        if ($format == "custom") {
            $format = Settings::get('date_format_custom');
        }

        if(!is_int($time))
            $time = strtotime($time);

    } else {
        $format = "Y-m-d";
    }

    return date($format, $time);
}

/**
 * Time to client display formatted, not converted to timezone
 *
 * @param $time
 * @return bool|string
 */
function dbt2c($time) {
    $format = Settings::get('time_format');

    if (!empty($format)) {
        if ($format == "custom") {
            $format = Settings::get('time_format_custom');
        }
    } else {
        $format = "H:i:s";
    }

    if(!is_int($time))
        $time = strtotime($time);

    return date($format, $time);

}


/**
 * Date time to client display formatted, not converted to timezone
 *
 * @param $time
 * @return bool|string
 */
function dbdt2c($time) {
    return dbd2c($time) . " " . dbt2c($time);
}

function seconds2Weeks($seconds) {
    $WEEKS = "%d day(s)";
    $DAYS = "%d week(s)";

    $minutes = $seconds / 60;
    $hours = $minutes / 60;
    $days = $hours / 24;
    $weeks = $days / 7;

    if ($days < 7) {
        $words = sprintf($DAYS,$days);
    } else if ($weeks > 0) {
        $words = sprintf($WEEKS,$weeks);
    }

    return $words;
}

function format_currency($price,$decimal_places = null) {

    // get the currency information
    $code = Currency::find( Settings::get('payment_currency') );

    // get the format base on that currency
    if (!is_numeric($price)){
        return $price;
    }

    if (!is_null($decimal_places)) {
        $code->decimal_places = $decimal_places;
    }

    $formatted_price =number_format( $price , $code->decimal_places , $code->decimal_point, $code->thousands_point );

    return $code->symbol_left . " " . $formatted_price . " " . $code->symbol_right;

}

/** Convert the specified timestamp to mysql datetime format
 *
 * @param Timestamp $time a datetime time stamp
 * @author Stephen Cantila
 * @return time
 */
function t2db($time){
    if(!is_int($time))
        $time = strtotime($time);

    return date("H:i:s", $time);
}

/**
 * @param $db_date
 * @param bool $diff_for_humans
 * @return array
 */
function tz_2client($db_date) {
    $format = User::getUserDateFormat() . " " .  User::getUserTimeFormat();
    $tz = User::getUserTimezone();

    if ($db_date instanceof \Carbon\Carbon) {
        $dt = $db_date;
    } else {
        $dt = \Carbon\Carbon::createFromFormat("Y-m-d H:i:s", (string) $db_date, Config::get('app.timezone'));
    }

    $dt->timezone = 'Europe/London';

    return array(
        $dt->format($db_date),
        $dt->diffForHumans()
    );
}

/**
 * @param $db_date
 * @return string
 */
function tz_2server($db_date) {
    $tz = User::getUserTimezone();

    $dt = \Carbon\Carbon::createFromFormat("Y-m-d H:i:s", $db_date, $tz);

    $dt->timezone = Config::get('app.timezone');

    return $dt->format("Y-m-d H:i:s");
}

/**
 * This will just display a markup of timezone that will be
 * parsed by javascript as time ago
 *
 * @param $time - Y-m-d H:i:s format
 * @param bool $to_client
 */
function date_markup($time,$to_client = true) {
    if (is_null($time) || $time == ""){
        echo "";
        return;
    }
    list($time_formmated,$time_ago) = tz_2client($time,true);
    ?>

    <abbr title="<?php echo $time_formmated; ?>"><?php echo $time_ago; ?></abbr>
<?php
}


// MISCELLANEOUS

/**
 * This will just generate a random token
 *
 * @return string
 */
function generate_token(){

    while(empty($code))
    {
        $user_email = is_logged_in() ? Auth::user()->email : Config::get('app.key');
        $code = uniqid() . md5( $user_email  . time() );

        $found = \DB::table('users')
            ->where('activation_code', $code)->get();

        if($found)
            $code = NULL;
    }

    return $code;

}

/**
 * Unique URL
 *
 * @param int $max
 * @return string
 */
function generate_unique($max = 10) {
    return uniqid($max);
}


// REQUEST AND RESPONSE HANDLER

/**
 * This will just get the client ip, for logging purposes
 * @return string|null
 * @author Stephen Cantila
 */
function get_client_ip(){
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) { //check ip from share internet
        $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  //to check ip is pass from proxy
        $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else {
        $ip= isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : "";
    }

    return $ip;
}


/**
 * Get the last visited url from editchimp,
 * if it is from editchimp urls then return this url string with an exceptions of
 * the url base of the website, else: return home with an exception also from the url base.
 * This is intended for redirecting. Although laravel has a function for this one,
 * but only occur when redirecting from denied unlogged user.
 *
 * @author Stephen Cantila
 * @return String
 * @return string
 */
function get_last_url(){

    if(isset($_SERVER['HTTP_REFERER'])){
        if($result = preg_match("/".preg_quote(URL::to('/'),"/")."/", $_SERVER['HTTP_REFERER'])){
            return preg_replace('/^'. preg_quote(URL::to('/'),"/") .'/','',$_SERVER['HTTP_REFERER']);
        }
    }

    if(Session::has('country_code')){
        return "/" . Session::get('country_code') . "/home";
    }else{
        return "/home";
    }
}

function create_url($url,$caption){
    $the_url = URL::to($url);
    return "<a href=\"{$the_url}\">{$caption}</a>";
}

/**
 * This will attach the object array to class
 * @param $class         - The class that is being instantiated
 * @param $array_object  - The array of object that will be going to merge
 */
function merge_object_to_class($class,$array_object) {
    foreach($array_object as $key=>$value){
        $class->$key = $value;
    }

    return $class;
}

/**
 * This will just get an information of the used broser by the client
 * @return array
 * @override Stephen Cantila
 */
function  get_browser_info()  {

    // the request was not on user browser
    if (!isset($_SERVER['HTTP_USER_AGENT'])){
        return array(
            'userAgent' => "",
            'name'      => "",
            'version'   => "",
            'platform'  => "",
            'pattern'    => ""
        );
    }

    $u_agent = $_SERVER['HTTP_USER_AGENT'];
    $bname = 'Unknown';
    $platform = 'Unknown';
    $version= "";

    //First get the platform?
    if (preg_match('/linux/i', $u_agent)) {
        $platform = 'linux';
    }
    elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
        $platform = 'mac';
    }
    elseif (preg_match('/windows|win32/i', $u_agent)) {
        $platform = 'windows';
    }

    // Next get the name of the useragent yes seperately and for good reason
    if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)){
        $bname = 'Internet Explorer';
        $ub = "MSIE";
    }
    elseif(preg_match('/Firefox/i',$u_agent)){
        $bname = 'Mozilla Firefox';
        $ub = "Firefox";
    }
    elseif(preg_match('/Chrome/i',$u_agent)){
        $bname = 'Google Chrome';
        $ub = "Chrome";
    }
    elseif(preg_match('/Safari/i',$u_agent)){
        $bname = 'Apple Safari';
        $ub = "Safari";
    }
    elseif(preg_match('/Opera/i',$u_agent)) {
        $bname = 'Opera';
        $ub = "Opera";
    }
    elseif(preg_match('/Netscape/i',$u_agent)){
        $bname = 'Netscape';
        $ub = "Netscape";
    }

    // finally get the correct version number
    $known = array('Version', $ub, 'other');
    $pattern = '#(?<browser>' . join('|', $known) .
        ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
    if (!preg_match_all($pattern, $u_agent, $matches)) {
        // we have no matching number just continue
    }

    // see how many we have
    $i = count($matches['browser']);

    if ($i != 1) {
        //we will have two since we are not using 'other' argument yet
        //see if version is before or after the name
        if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
            $version= $matches['version'][0];
        }
        else {
            $version= $matches['version'][1];
        }
    }
    else {
        $version= $matches['version'][0];
    }

    // check if we have a number
    if ($version==null || $version=="") {$version="?";}

    return array(
        'userAgent' => $u_agent,
        'name'      => $bname,
        'version'   => $version,
        'platform'  => $platform,
        'pattern'    => $pattern
    );
}

/**
 * Get the domain referrer if $just_domain param is true
 * , else get the full referrer uri
 *
 * @param bool $just_domain
 * @return mixed|string
 * @override Stephen Cantila
 */
function get_referrer($just_domain= false) {
    $ref = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER']: "/";

    // remove http or s, remove www and /
    if ($just_domain){
        $ref = preg_replace("/http:\/\//i", "", $ref);
        $ref = preg_replace("/^www\./i", "", $ref );
        $ref = preg_replace("/\/.*/i", "", $ref );
        return $ref;
    } else {
        return $ref;
    }
}

/**
 * This will connect to google closure api and minimize the merged js
 * @return array {"country_name":"UNITED STATES","country_code":"US","city":"Sugar Grove, IL","ip":"12.215.42.19"}
 *
 */
function get_ip_info() {
    // check and set ip info
    $storage_prefix = "ip-address_";
    $ip = get_client_ip();
    $cache_name = $storage_prefix . $ip;

    if ( !Cache::has( $cache_name  ) ){

        $ip_info = request_ip_info($ip);

        Cache::forever($cache_name, array(
            'country'   => $ip_info->country_code,
            'city'      => $ip_info->city,
            'ip'        => $ip
        ));
    }

    $ip_info = Cache::get( $cache_name );
    return $ip_info;
}

function request_ip_info($ip) {

    //set POST variables
    $url_api = 'http://api.hostip.info/get_json.php?ip=' . urlencode($ip);

    //open connection
    $ch = curl_init();

    //set the url, number of POST vars, POST data
    curl_setopt($ch,CURLOPT_URL, $url_api);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
    // you may insert your secure connection here

    //execute post
    $result = curl_exec($ch);
    if(curl_errno($ch)){
        throw new Exception('Error Curl : ' . curl_error($ch) );
    }

    //close connection
    curl_close($ch);
    // TODO add curl error here

    return json_decode($result);

}

function is_hidden($true = true){
    if ($true){
        return "is-hidden";
    } else {
        return "";
    }
}

function isset_ret($value){
    if ($value){
        return $value;
    }
    return "";
}


// PAYMENT HELPER

function check_CC($cc, $extra_check = false){
    $cards = array(
        "visa" => "(4\d{12}(?:\d{3})?)",
        "amex" => "(3[47]\d{13})",
        "jcb" => "(35[2-8][89]\d\d\d{10})",
        "maestro" => "((?:5020|5038|6304|6579|6761)\d{12}(?:\d\d)?)",
        "solo" => "((?:6334|6767)\d{12}(?:\d\d)?\d?)",
        "mastercard" => "(5[1-5]\d{14})",
        "switch" => "(?:(?:(?:4903|4905|4911|4936|6333|6759)\d{12})|(?:(?:564182|633110)\d{10})(\d\d)?\d?)",
    );
    $names = array("Visa", "American Express", "JCB", "Maestro", "Solo", "Mastercard", "Switch");
    $matches = array();
    $pattern = "#^(?:".implode("|", $cards).")$#";
    $result = preg_match($pattern, str_replace(" ", "", $cc), $matches);
    if($extra_check && $result > 0){
        $result = (validatecard($cc))?1:0;
    }
    return ($result>0)?$names[sizeof($matches)-2]:false;
}



// VALIDATOR HELPER

function is_empty($value) {
    return trim($value) == "" || empty($value) || is_null($value);
}
function is_valid_price($value) {
    return !is_empty($value) && is_numeric($value);
}
function is_valid_time_point($time_code) {
    return JSTime::findOrFail($time_code);
}

function validator_res($errors,$input_name){

    $errorMsg ="<span class=\"validator-message\">";
    $errorClass = "js-validator";


//    if (is_object($errors)) {
//        if($errors->has($input_name)) :
//            $errorMsg = '<span class="help-inline">'  . $errors->first($input_name) . '</span>';
//            $errorClass = "has-error";
//        endif;
//    } else {
//        if (isset($errors[$input_name])) {
//            $errorMsg = '<span class="help-inline">'  . $errors[$input_name][0] . '</span>';
//            $errorClass = "has-error";
//        }
//    }

    // Check if $input_name has bracket in it. name[0][name]
    // then change it with name.0.name
    if (strpos($input_name,'[')) {
        $input_name = str_replace('[]','.',$input_name); // name[0.name]
        $input_name = str_replace('[','.',$input_name); // name.0.name]
        $input_name = str_replace(']','',$input_name); // name.0.name
    }

    if (is_object($errors)) {
        if($errors->has($input_name)) :
            $errorMsg .= '<i class="fa fa-exclamation-triangle form-control-feedback"></i><span class="form-control-feedback-msg">'  . $errors->first($input_name) . '</span>';
            $errorClass .= " has-error has-feedback";
        endif;
    } else {
        if (isset($errors[$input_name])) {
            $errorMsg .= ' <i class="fa fa-exclamation-triangle form-control-feedback"></i><span class="form-control-feedback-msg">'  . $errors[$input_name][0] . '</span>';
            $errorClass .= " has-error has-feedback";
        }
    }

    // Closing tag
    $errorMsg .= "</span>";

    return array(
        $errorMsg,// Error message
        $errorClass, // error Class
    );
}

function error_block($message) {
    $markup = '
            <ul class="parsley-error-list">
                <li>
                    <i class="icon-warning-sign"></i> <span class="message">'.$message.'</span>
                </li>
            </ul>';

    return $markup;
}

/**
 * Get the exact validation for rules for from and to related input
 *
 * @param $from - name of the input from name
 * @param $to - name of the input to name
 */
function from_and_to_input($from_input_name,$to_input_name) {
    if ( !Input::has($to_input_name) && !Input::has($from_input_name)) {
        $to = "required";
        $from = "required";
    } else {
        if ( (!Input::has($to_input_name) || Input::get($to_input_name) == 0) && Input::has($from_input_name)
            || (!Input::has($from_input_name) || Input::get($from_input_name) == 0) && Input::has($to_input_name)
        ) {
            $to = "numeric";
            $from = "numeric";
        } else {
            $from = "numeric|max:" . Input::get($to_input_name);
            $to = "numeric|min:" . Input::get($from_input_name);
        }
    }

    return array(
        $from,
        $to
    );
}



function getErrorMessage($message = "Please correct the error below and try again.") {
    $m  = "<p class=\"alert alert-warning\">";
    $m .=  "<i class=\" icon-warning-warning offset-right\"></i>";
    $m .=  $message;
    $m .=  "<button class=\"close information-bar-close\" type=\"button\" data-dismiss=\"alert\">×</button>";
    $m .= "</p>";

    return $m;
}

function getSuccessMessage($message = "Successfully updated data.") {
    $m  = "<p class=\"alert alert-success\">";
    $m .=  "<i class=\" icon-warning-sign offset-right\"></i>";
    $m .=  $message;
    $m .=  "<button class=\"close information-bar-close\" type=\"button\" data-dismiss=\"alert\">×</button>";
    $m .= "</p>";
    return $m;
}


function success_block($message) {
    $markup = '
        <ul class="parsley-success-list">
            <li>
                <i class="icon-success-sign"></i> <span class="message">'.$message.'</span>
            </li>
        </ul>';

    return $markup;
}

function get_error($input_name){
    $errorMsg ="";
    $errorClass = "";
    $inputOld ="";

    $errorInput = $input_name . "Error";
    if(isset($_POST[$errorInput]) && $_POST[$errorInput] != "") :
        $errorMsg = '<ul class="parsley-error-list"><li><i class="icon-warning-sign"></i>'  . str_replace("##","",$_POST[$errorInput]). '</li></ul>';
        $errorClass = "parsley-error";
    endif;

    if(isset($_POST[$input_name])){
        $inputOld = $_POST[$input_name];
    }

    return array(
        $errorMsg,// Error message
        $errorClass, // error Class
        $inputOld
    );
}



/**
 * To prevent the rounding that occurs when next digit after last significant decimal is 5
 * Replacement of the method number_format, we don't need to round the number on calculation
 *
 * @param $number
 * @param string $decimals
 * @param string $sep1
 * @param string $sep2
 * @return string
 */
function fnumber_format($number, $decimals='', $sep1='.', $sep2=',') {

    if (($number * pow(10 , $decimals + 1) % 10 ) == 5)  //if next not significant digit is 5
        $number -= pow(10 , -($decimals+1));

    return number_format($number, $decimals, $sep1, $sep2);

}

/**
 * Convert number i.e 100000 to decimal point.
 */
function number_to_cents($number) {
    $ret = $number/100;
    return $ret;
}


/**
 * Second version of sprintf
 *
 *  <code>
 *      echo sprintf2('Hello %s my name is %s! I am %s, how old are you? I like %s!', array(
 *          'Ben',
 *          'Matt',
 *          '21',
 *          'food'
 *      ));
 *  </code>
 * @param string $str
 * @param array $vars
 * @param string $char
 * @return mixed|string
 */
function sprintf2($str='', $vars=array(), $char='%s')
{
    if (!$str) return '';
    if (count($vars) > 0)
    {
        foreach ($vars as $v)
        {
            $str = str_replace($char, $v, $str);
        }
    }

    return $str;

}


function is_label_awaiting($var1,$var2) {
    if( $var1 == $var2){
        return " label--awaiting ";
    } else {
        return "";
    }
}



// META HELPER

function meta_true_value($meta_value) {
    $unserialize = @unserialize($meta_value);
    $meta_value = $unserialize ? $unserialize : $meta_value;

    if (is_int($meta_value)) {
        return $meta_value;
    } else {
        return $meta_value;
    }
}

function meta2db_value($meta_value) {
    $can_be = is_array($meta_value);
    return $can_be ? serialize($meta_value) : $meta_value;
}


// USER CAPABILITIES HElPER

function in_capabilities($capabilities,$cap) {
    if ($capabilities){
        foreach ($capabilities as $cap_data) {
            if ($cap_data['code'] == $cap) {
                return true;
            }
        }
    }

    return false;
}



/**
 * Retrieve media type.
 *
 * @param  string  $ext
 * @return string
 */
function media_type($ext)
{

    $img_mimes = array('jpg', 'jpeg', 'gif', 'png');

    if (in_array($ext, $img_mimes)) {

        $t = 'img';

    } else {

        $t = $ext;

    }

    return $t;

}

function isImage($mime) {
    $img_mimes = array('jpg', 'jpeg', 'gif', 'png');

    if (in_array($mime,$img_mimes)) {
        return true;
    } else {
        return false;
    }
}

function toSizeName($size) {
    $b = $size . "B";
    $kb = round($b / 1024,2) . " KB ";
    $mb = round($kb / 1024,2) . " MB ";
    $gb = round($mb / 1024,2) . " GB";

    if ($kb < 1) {
        return $b;
    } elseif ( $mb < 1){
        return $kb;
    } elseif( $gb < 1) {
        return $mb;
    }

    return $gb;
}


/**
 * Convert int text to formatted file size
 *
 * @param  int
 * @param  string
 * @return string
 */
function media_size($size, $type)
{
    switch($type) {
        case "KB":
            $filesize = $size * .0009765625; // bytes to KB
            break;
        case "MB":
            $filesize = ($size * .0009765625) * .0009765625; // bytes to MB
            break;
        case "GB":
            $filesize = (($size * .0009765625) * .0009765625) * .0009765625; // bytes to GB
            break;
    }

    if($filesize < 0) {
        return $filesize = 'unknown file size';}
    else {
        return round($filesize, 2).' '.$type;
    }
}


/**
 * Remove extension
 *
 * @param  string
 * @return string
 */
function mead_no_ext($path)
{
    return substr($path, 0, -4);
}


/**
 * Remove point of extension
 *
 * @param  string
 * @return string
 */
function media_no_point($path)
{
    return str_replace('.', '', $path);
}

/**
 * Get the google script for analytics
 * @return string markup
 * @author Stephen Cantila
 */
function google_analytics(){
    ?>
    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
    <script type="text/javascript">

        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-22699475-1']);
        _gaq.push(['_setDomainName', 'editchimp.local.com']);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();
    </script>
<?php
}


/**
 * This will just include in every footer of every page in front end to track coocies
 *
 * @return string
 */
function pap_tracking_link(){
    ?>

    <script type="text/javascript"><!--
        document.write(unescape("%3Cscript id='pap_x2s6df8d' src='" +
            "<?php echo URL::to('/'); ?>/affiliate/scripts/trackjs.js' type='text/javascript'%3E%3C/script%3E"));//-->

    </script>
    <script type="text/javascript"><!--
        PostAffTracker.setAccountId('default1');
        try {
            PostAffTracker.track();
        } catch (err) { }
        //-->
    </script>

<?php
} //// ///


/**
 * Compare two string and return the active word if equal
 * @param String $str1
 * @param String $str2
 * @return String|null
 */
function display_is_active($str1,$str2) {
    return $str1 == $str2 ? "active" : "";
}

// PAGINATION URL
function get_url_param() {
    return $_GET;
}

function get_url_full() {
    return Request::url();
}

function get_pagi_url($page, $current_page) {
    $param = get_url_param();
    $domain = get_url_full();

    // Override
    $param['page'] = $page;

    $link = $domain . "?" . http_build_query($param);
    return $link;
}


/**
 * Will update multiple rows in a Table
 * @param String $table     - The table name without prefix
 * @param Array $columns    - the column Names in array format
 * @param Array $data       - The associative data that will be used in update
 * @param string $primary_key_column
 * @return bool
 * @version 1.1 - added multiple keys
 */
function db_multiple_update($table,$columns,$data,$primary_key_column = "id") {

    $binding = array();

    // Check if $data is empty;
    if (count($data) <= 0){
        return false;
    }

    $sql = "UPDATE ".T_P."{$table} SET";

    $col_set = array();
    foreach($columns as $col){

        $sql_col = " {$col} = CASE {$primary_key_column}";

        foreach ($data as $row_key => $row_cols) {
            $sql_col .= " WHEN ? THEN ? ";
            $binding[] = $row_key;
            $binding[] = $row_cols[$col];
        }

        $sql_col .= " END";

        $col_set[] = $sql_col;
    }

    $sql .= join(',',$col_set);

    $binding_placeholders = array();
    foreach(array_keys($data) as $value) {
        $binding_placeholders[] = "?";
        $binding[] = $value;
    }
    $sql .= " WHERE {$primary_key_column} IN (" . implode(',',$binding_placeholders) . ")";

    return DB::update($sql,$binding);
}



// HTML HELPER

function str_ellipsis_center($str) {
    $start = substr($str,0,14);
    $center = " ... ";
    $end = substr($str,strlen($str) - 8, strlen($str) );
    return $start . $center . $end;
}

/**
 * This will display file link and direct download
 *
 * @param Object $file - database object contains columns attr key
 * @return string
 */
function displayFile($file){
    return '
        <a href="' . URL::to("/uploads/{$file->id}/download") . '" target="_blank">
            <i class="icon-uploader icon-uploader-' . $file->file_type. ' offset-right"></i>
            <span>' . $file->file_name . '</span>
        </a>
        ';
}


/**
 * Compare two string and return the active word if equal
 * @param String $str1
 * @param String $str2
 * @return String|null
 */
function displayIsFocused($str1,$str2) {
    return $str1 == $str2 ? "is-focused" : "";
}

function toStringReset($reset = 1) {
    if ($reset == 1){
        return "yes";
    }else {
        return "no";
    }
}

function pureFormat($str) {
    return nl2br( stripslashes( htmlentities($str)));
}


// HONEY POT


/**
 * This is a helper for Spreadsheet (ss)
 * Convert a given number to spread sheet column key (AA, AB,A)
 *
 * @param $number
 * @author Stephen Cantila
 */
function ss_to_letter($col = 2) {
    $letter = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $total_letters = strlen($letter) - 1 ;
    $remaining_count = $col - 1;
    $result = "";
    $i_bool = false;
    $while_i = 0;
    while($i_bool == false){

        if ( $remaining_count > $total_letters ) {
            //$letter_section = $remaining_count % $total_letters;
            $result .= $letter[$while_i];

            $remaining_count = $remaining_count - $total_letters;

            if ($while_i > $total_letters){
                $while_i = 0;
            } else {
                $while_i++;
            }
        }else {
            $result .= $letter[ $remaining_count];
            $i_bool = true;
        }
    }

    return $result; // A | AB | BD
}


/**
 * This will automate the generation of Excel file
 *
 * @param $title
 * @param $file_name
 * @param $data
 * @author Stephen Cantila
 */
function ss_write($title = "Editchimp Spreadsheet",$file_name,$data = array()) {
    if (ob_get_clean()) ob_clean();

    $objPHPExcel = new PHPExcel();

    // Get header keys
    $header_keys = array_keys($data[0]);

    // Set document properties
    $objPHPExcel->getProperties()->setCreator("editchimp.com")
        ->setTitle("Office 2007 XLSX Editchimp Document");

    // Generate the header
    $col_position = 1;
    foreach($header_keys as $key => $value){
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue( ss_to_letter($col_position) . "1",$value);
        $col_position++;
    }

    // Generate the body content
    $row_position = 2;
    foreach( $data as $key=>$value){
        $col_position = 1;

        foreach($header_keys as $key){
            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue( ss_to_letter($col_position) . $row_position,$value[$key]);
            $col_position++;
        }

        $row_position++;
    }

// Rename worksheet
    $objPHPExcel->getActiveSheet()->setTitle($title);


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
    $objPHPExcel->setActiveSheetIndex(0);


// Redirect output to a client’s web browser (Excel5)
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="'.$file_name.'"');
    header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
    header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
    header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
    header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
    header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
    header ('Pragma: public'); // HTTP/1.0

    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
    $objWriter->save('php://output');
    exit;

}


function tz_list() {
    return DateTimeZone::listIdentifiers(DateTimeZone::ALL);
}



// FORM Helper


/**
 * This will just echo select attribute in html element if two given
 *
 * @param $value1
 * @param $value2
 * @param bool $old_input
 * @return null|string
 */
function is_selected($value1,$value2,$old_input = false){

    if (!empty($old_input) || $old_input != "") {
        $value1 = $old_input;
    }

    if( $value1 == $value2){
        echo "selected=\"selected\"";
    } else {
        echo null;
    }
}

    /**
     * a class name if the two vars are equal
     *
     * @param $val1
     * @return string
     */
function is_disabled($val1 = false) {
    return $val1 ? " disabled " : "";
}

/**
 * @param $value1
 * @param $value2
 * @param bool $old_input
 * @return null|string
 */
function is_checked($value1,$value2,$old_input = false){
    if (!empty($old_input) || $old_input != "") {
        $value1 = $old_input;
    }

    if( $value1 == $value2)
        return "checked=\"checked\"";

    return null;
}

/**
 * To Optimize retrieval for left joins, we need to use static country data
 * @param null $country_code - the country code, if null then return all country array
 *                           - if not, then return specific country with the passed param
 * @return array
 */
function countries($country_code = null){
    $countries = array(
        'AF' => 'Afghanistan',
        'AX' => 'Åland Islands',
        'AL' => 'Albania',
        'DZ' => 'Algeria',
        'AS' => 'American Samoa',
        'AD' => 'Andorra',
        'AO' => 'Angola',
        'AI' => 'Anguilla',
        'AQ' => 'Antarctica',
        'AG' => 'Antigua and Barbuda',
        'AR' => 'Argentina',
        'AM' => 'Armenia',
        'AW' => 'Aruba',
        'AU' => 'Australia',
        'AT' => 'Austria',
        'AZ' => 'Azerbaijan',
        'BS' => 'Bahamas',
        'BH' => 'Bahrain',
        'BD' => 'Bangladesh',
        'BB' => 'Barbados',
        'BY' => 'Belarus',
        'BE' => 'Belgium',
        'BZ' => 'Belize',
        'BJ' => 'Benin',
        'BM' => 'Bermuda',
        'BT' => 'Bhutan',
        'BO' => 'Bolivia, Plurinational State of',
        'BQ' => 'Bonaire, Sint Eustatius and Saba',
        'BA' => 'Bosnia and Herzegovina',
        'BW' => 'Botswana',
        'BV' => 'Bouvet Island',
        'BR' => 'Brazil',
        'IO' => 'British Indian Ocean Territory',
        'BN' => 'Brunei Darussalam',
        'BG' => 'Bulgaria',
        'BF' => 'Burkina Faso',
        'BI' => 'Burundi',
        'KH' => 'Cambodia',
        'CM' => 'Cameroon',
        'CA' => 'Canada',
        'CV' => 'Cape Verde',
        'KY' => 'Cayman Islands',
        'CF' => 'Central African Republic',
        'TD' => 'Chad',
        'CL' => 'Chile',
        'CN' => 'China',
        'CX' => 'Christmas Island',
        'CC' => 'Cocos (Keeling) Islands',
        'CO' => 'Colombia',
        'KM' => 'Comoros',
        'CG' => 'Congo',
        'CD' => 'Congo, The Democratic Republic of the',
        'CK' => 'Cook Islands',
        'CR' => 'Costa Rica',
        'CI' => 'CÔTE D`IVOIRE',
        'HR' => 'Croatia',
        'CU' => 'Cuba',
        'CW' => 'CURAÇAO',
        'CY' => 'Cyprus',
        'CZ' => 'Czech Republic',
        'DK' => 'Denmark',
        'DJ' => 'Djibouti',
        'DM' => 'Dominica',
        'DO' => 'Dominican Republic',
        'EC' => 'Ecuador',
        'EG' => 'Egypt',
        'SV' => 'El Salvador',
        'GQ' => 'Equatorial Guinea',
        'ER' => 'Eritrea',
        'EE' => 'Estonia',
        'ET' => 'Ethiopia',
        'FK' => 'Falkland Islands (Malvinas)',
        'FO' => 'Faroe Islands',
        'FJ' => 'Fiji',
        'FI' => 'Finland',
        'FR' => 'France',
        'GF' => 'French Guiana',
        'PF' => 'French Polynesia',
        'TF' => 'French Southern Territories',
        'GA' => 'Gabon',
        'GM' => 'Gambia',
        'GE' => 'Georgia',
        'DE' => 'Germany',
        'GH' => 'Ghana',
        'GI' => 'Gibraltar',
        'GR' => 'Greece',
        'GL' => 'Greenland',
        'GD' => 'Grenada',
        'GP' => 'Guadeloupe',
        'GU' => 'Guam',
        'GT' => 'Guatemala',
        'GG' => 'Guernsey',
        'GN' => 'Guinea',
        'GW' => 'Guinea-Bissau',
        'GY' => 'Guyana',
        'HT' => 'Haiti',
        'HM' => 'Heard Island and McDoanl Islands',
        'VA' => 'Holy See(Vatican City State)',
        'HN' => 'Honduras',
        'HK' => 'Hong Kong',
        'HU' => 'Hungary',
        'IS' => 'Iceland',
        'IN' => 'India',
        'ID' => 'Indonesia',
        'IR' => 'Iran, Islamic Republic of',
        'IQ' => 'Iraq',
        'IE' => 'Ireland',
        'IM' => 'Isle of Man',
        'IL' => 'Israel',
        'IT' => 'Italy',
        'JM' => 'Jamaica',
        'JP' => 'Japan',
        'JE' => 'Jersey',
        'JO' => 'Jordan',
        'KZ' => 'Kazakhstan',
        'KE' => 'Kenya',
        'KI' => 'Kiribati',
        'KP' => 'Korea, Democratic Peoples Republic of',
        'KR' => 'Korea, Republic of',
        'KW' => 'Kuwait',
        'KG' => 'Kyrgyzstan',
        'LA' => 'Lao People\'s Democratic Republic',
        'LV' => 'Latvia',
        'LB' => 'Lebanon',
        'LS' => 'Lesotho',
        'LR' => 'Liberia',
        'LY' => 'Libya',
        'LI' => 'Liechtenstein',
        'LT' => 'Lithuania',
        'LU' => 'Luxembourg',
        'MO' => 'Macao',
        'MK' => 'Macedonia, The Former Yugoslav Republic of',
        'MG' => 'Madagascar',
        'MW' => 'Malawi',
        'MY' => 'Malaysia',
        'MV' => 'Maldives',
        'ML' => 'Mali',
        'MT' => 'Malta',
        'MH' => 'Marshall Islands',
        'MQ' => 'Martinique',
        'MR' => 'Mauritania',
        'MU' => 'Mauritius',
        'YT' => 'Mayotte',
        'MX' => 'Mexico',
        'FM' => 'Micronesia, Federated States of',
        'MD' => 'Moldova, Republic of',
        'MC' => 'Monaco',
        'MN' => 'Mongolia',
        'ME' => 'Montenegro',
        'MS' => 'Monserrat',
        'MA' => 'Morocco',
        'MZ' => 'Mozambique',
        'MM' => 'Myanmar',
        'NA' => 'Namibia',
        'NR' => 'Nauru',
        'NP' => 'Nepal',
        'NL' => 'Netherlands',
        'NC' => 'New Caledonia',
        'NZ' => 'New Zealand',
        'NI' => 'Nicaragua',
        'NE' => 'Niger',
        'NG' => 'Nigeria',
        'NU' => 'Niue',
        'NF' => 'Norfolk Island',
        'MP' => 'Northern Mariana Islands',
        'NO' => 'Norway',
        'OM' => 'Oman',
        'PK' => 'Pakistan',
        'PW' => 'Palau',
        'PS' => 'Palestine, State of',
        'PA' => 'Panama',
        'PG' => 'Papua New Guinea',
        'PY' => 'Paraguay',
        'PE' => 'Peru',
        'PH' => 'Philippines',
        'PN' => 'Pitcairn',
        'PL' => 'Poland',
        'PT' => 'Portugal',
        'PR' => 'Puerto Rico',
        'QA' => 'Qatar',
        'RE' => 'RÉUNION',
        'RO' => 'Romania',
        'RU' => 'Russian Federation',
        'RW' => 'Rwanda',
        'BL' => 'SAINT BARTHÉLEMY',
        'SH' => 'Saint Helena, Ascension and Tristand Da Cunha',
        'KN' => 'Saint Kitts and Nevis',
        'LC' => 'Saint Lucia',
        'MF' => 'Saint Martin(French Part)',
        'PM' => 'Saint Pierre and Miquelon',
        'VC' => 'Saint Vincent and the Grenadines',
        'WS' => 'Samoa',
        'SM' => 'San Marino',
        'ST' => 'Sao Tome and Principe',
        'SA' => 'Saudi Arabia',
        'SN' => 'Senegal',
        'RS' => 'Serbia',
        'SC' => 'Seychelles',
        'SL' => 'Sierra Leone',
        'SG' => 'Singapore',
        'SX' => 'Saint Maarten (Dutch Part)',
        'SK' => 'Slovakia',
        'SI' => 'Slovenia',
        'SB' => 'Solomon Islands',
        'SO' => 'Somalia',
        'ZA' => 'South Africa',
        'GS' => 'South Georgia and the South Sandwich Islands',
        'SS' => 'South Sudan',
        'ES' => 'Spain',
        'LK' => 'Sri Lanka',
        'SD' => 'Sudan',
        'SR' => 'Suriname',
        'SJ' => 'Svalbard and Jan Mayen',
        'SZ' => 'Swaziland',
        'SE' => 'Sweden',
        'CH' => 'Switzerland',
        'SY' => 'Syrian Arab Republic',
        'TW' => 'Taiwan, Province of China',
        'TJ' => 'Tajikistan',
        'TZ' => 'Tanzania, United Republic of',
        'TH' => 'Thailand',
        'TL' => 'Timor-Leste',
        'TG' => 'Togo',
        'TK' => 'Tokelau',
        'TO' => 'Tonga',
        'TT' => 'Trinidad and Tobago',
        'TN' => 'Tunisia',
        'TR' => 'Turkey',
        'TM' => 'Turkmenistan',
        'TC' => 'Turks and Caicos Islands',
        'TV' => 'Tuvalu',
        'UG' => 'Uganda',
        'UA' => 'Ukraine',
        'AE' => 'United Arab Emirates',
        'GB' => 'United Kingdom',
        'US' => 'United States',
        'UM' => 'United States Minor Outlying Islands',
        'UY' => 'Uruguay',
        'UZ' => 'Uzbekistan',
        'VU' => 'Vanuatu',
        'VE' => 'Venezuela, Bolivarian Republic of',
        'VN' => 'Viet Nam',
        'VG' => 'Virgin Islands, British',
        'VI' => 'Virgin Islands, U.S.',
        'WF' => 'Wallis and Futuna Islands',
        'EH' => 'Western Sahara',
        'YE' => 'Yemen',
        'ZM' => 'Zambia',
        'ZW' => 'Zimbabwe'

    );

    if ($country_code != null ){
        return $countries[$country_code];
    }

    return $countries;
}

/**
 * Static callendar Month
 * @return array
 */
function calendar_month(){
    return array(
        '' => '',
        'Jan' => 'January',
        'Feb' => 'February',
        'Mar' => 'March',
        'Apr' => 'April',
        'May' => 'May',
        'Jun' => 'June',
        'Jul' => 'July',
        'Aug' => 'August',
        'Sep' => 'September',
        'Oct' => 'October',
        'Nov' => 'November',
        'Dec' => 'December'
    );
}

    /**
     * Static, for frontend demo purposes.
     * @return array
     * @todo Override it
     */
function expiry_year(){
    return array(
        '' => '',
        '2013' => '2013',
        '2014' => '2014',
        '2015' => '2015',
        '2016' => '2016',
        '2017' => '2017',
    );
}

function generateMonth() {
    $ret = array();
    for($i=1;$i<=12;$i++){
        $ret[$i] = $i;
    }
    return $ret;
}

function generateYear() {

    $ret = array();
    $start = self::getCurrentYear();
    $end = $start + 20;
    for($i=$start;$i<=$end;$i++){
        $ret[$i] = $i;
    }
    return $ret;

}

function getCurrentYear() {
    return date('Y',time());
}

/**
 * Get the array value via details.id will get $input['details']['id']
 * @param $
 */
function get_array_key_value($sequence,$input,$default = "") {

    if (!is_string($sequence)){
        return "";
    }

    $exploded = explode('.',$sequence);

    $current_val = $input;
    $final_ret = $default;
    foreach($exploded as $value) {
        if (isset($current_val[$value])){
            $current_val = $current_val[$value];

            $final_ret = $current_val;
        }
    }

    return $final_ret;
}

function date_to_age($dob) {
    $dob = strtotime($dob);
    $y = date('Y', $dob);

    if (($m = (date('m') - date('m', $dob))) < 0) {
        $y++;
    } elseif ($m == 0 && date('d') - date('d', $dob) < 0) {
        $y++;
    }

    return date('Y') - $y;
}









// Modal Helper

// Create Modal
function create_modal($id,$content,$title,$modal_template = 'default') {
    ?>
    <div class="modal fade" id="<?php echo $id ?>"  tabindex="-1" role="dialog" aria-labelledby="media" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"> <?php echo $title; ?> <h4>
                </div>
                <div class="modal-body">
                    <?php echo $content ?>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


<?php
}


function the_segments() {


    $no_more_segment = false;
    $segment_index = 1;
    $segments = array();
    while(!$no_more_segment) {
        $the_segment = Request::segment($segment_index);
        if (is_null($the_segment) || $the_segment == "") {
            $no_more_segment = true;
        } else {
            if (count($segments) > 0) {
                $segments[] = $segments[count($segments) - 1] . '/' . $the_segment;
            } else {
                $segments[] = $the_segment;
            }
            $segment_index ++;
        }
    }

     return $segments;
}





global $short_codes;


function the_content( $content ) {

    global $short_codes;

    preg_match_all('/\[(.*?)\]/', $content, $match );


    if(isset($match[1]) && $match[1] != null) {

        for($indx = 0; $indx < count($match[1]); $indx++) {
            $short_code = explode( " " , $match[1][$indx] );
     
            $params = array();
            for( $i = 1; $i < count( $short_code ); $i++ ) {

                $paramStr = explode( "=", preg_replace('/(\'|")/','', $short_code[$i] ) );

                if (isset($paramStr[1]) && isset($paramStr[0])) {
                    $params[$paramStr[0]] = $paramStr[1];
                }
                
            }
            
            if( isset( $short_codes[$short_code[0]] ) ) {

                if( is_callable( $short_codes[$short_code[0]] ) )
                    echo preg_replace( '/\[(.*?)\]/', $short_codes[$short_code[0]]($params), $content );
            }
        }
    } else {
        echo $content;
    }

}

function add_shortcode( $tag, $func ) {
    global $short_codes;

    $short_codes[$tag] = $func;
}


function do_shortcode( $shortcode = false ) {
    global $short_codes;


    preg_match( '/\[(.*?)\]/', $shortcode, $match );

    if( $match ) {

        $short_code = explode( " " , $match[1] );


        $params = array();
        for( $i = 1; $i < count( $short_code ); $i++ ) {

            $paramStr = explode( "=", preg_replace('/(\'|")/','', $short_code[$i] ) );

            $params[$paramStr[0]] = $paramStr[1];
            
        }

        if( isset( $short_codes[$short_code[0]] ) ) {
            if( is_callable( $short_codes[$short_code[0]] ) )
                echo $short_codes[$short_code[0]]($params);
        }
    }

}

function excerpt_content( $content = false, $length = 100, $more_text = '', $is_echo = false ) {

    $content = strip_tags( $content );

    if( strlen($content) > $length) {
        $content = substr($content, 0, $length).$more_text;
    }

    if( $is_echo )
        echo $content;
    else 
        return $content;

}