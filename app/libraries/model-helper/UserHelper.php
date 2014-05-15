<?php 

class UserHelper
{
     /**
     * Get User avatar
     * @param user_id optional, size (optional)
     * @return image_url
     */
	public static function avatar( $user_id = false, $size = false )
    {
    	if($user_id)
    	{
    		if( $user = User::find($user_id) )
    			$avatar = $user->avatar;
    		else
    			$avatar = null;
    	}
    	else
    	{
    		$avatar 	= Auth::user()->avatar;	
    	}
    	
        
        if( $size )
        {
        	$extensn 	= File::extension($avatar);

    		$avatar 	= str_replace('.'.$extensn, $size.'.'.$extensn, $avatar);
    	}

        if( !File::exists( $avatar ) )
        {
            $avatar = 'assets/global/placeholders/avatar'.$size.'.jpg';
        }
        //add random string
        return $avatar.'?'.Str::random($length = 10) ;
    }

     /**
     * Get User default avatar if avatar is not exists
     * @param size (optional)
     * @return image_url
     */
    public static function defaultAvatar($size = false)
    {
        return 'assets/global/placeholders/avatar'.$size.'.jpg';
    }


     /**
     * Get all countries
     * @param none
     * @return array
     */
    public static function countries()
    {
    	$_countries = \DB::table('countries')->select('code', 'name')->get();

		$countries = array();

		foreach($_countries as $country)
		{
			$countries[$country->code] = $country->name;
		}

		return $countries;
    }

    /**
     * Get all membership levels
     * @param level_ids (array of level_id | optional)
     * @return object
     */
    public static function getAllLevels( $levelIds = array() )
    {
        $levels = \DB::table('levels')->select('id','name');

        if(count($levelIds) > 0)
        {
            $levels = $levels->whereIn('id', $levelIds);
        }

        $levels = $levels->get();

        return $levels;
    }


}