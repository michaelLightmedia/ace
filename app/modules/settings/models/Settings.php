<?php

class Settings extends Eloquent
{
	protected $table = 'settings';
	protected $primaryKey = 'option_id';
	public $timestamps = false;

    CONST CACHE_PREFIX = "_settings_";

	/**
	 * get Settings by option_name
	 *
	 * @param option_name, option_value
	 */

	public static function get($option_name)
	{
		$option_value = DB::table('settings')
            ->where('option_name', $option_name)
            ->remember(4000,self::CACHE_PREFIX . $option_name)->pluck('option_value');

		return meta_true_value($option_value);
	}

	/**
	 * get date Settings
	 *
	 * @param none
	 */

	public static function gyDate()
	{
		$date = Settings::get('date_format') == 'custom' ? Settings::get('date_format_custom') : Settings::get('date_format');
		

		return $date;
	}


    /**
     * @param $option_name
     * @param $option_value
     * @return array
     */
    public function saveSettings($option_name, $option_value)
    {

    	if($option_name)
    	{

            // Destroy session cached
            Cache::forget(self::CACHE_PREFIX . $option_name);

    		$query = Settings::whereRaw("option_name = '$option_name'");


	    	if(!$settings = $query->get()->toArray())
	    	{
	    		$settings = new Settings;
		    	$settings->option_name 	= $option_name;
		    	$settings->option_value = $option_value;

	    		$affectedRows = $settings->save();
	    	}
	    	else
	    	{
	    		$affectedRows = $query->update(array('option_name' => $option_name, 'option_value' => $option_value));
	    	}


	    	if($affectedRows)
	    	{
	    		return array('status' => 'saved');
	    	}
	    	else
	    	{
	    		return array('status' => 'failed');
	    	}

    	}
    	else
    	{
    		return array('status' => 'failed');
    	}
    }


}