<?php

class UserSeeder
extends DatabaseSeeder
{
    public function run()
    {
        $users = array(
            array(
                "username" => "lightmedia",
                "password" => Hash::make("Lightrv0784$"),
                "email"    => "michael@lightmedia.com.au"
            )
        );
        foreach ($users as $user)
        {
            User::create($user);
        }
    }
}