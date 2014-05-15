<?php

class DatabaseController extends BaseController {


    public function getUpdate() {

        ?>
        <h1>
            Are you sure you want to update database ?</h1>
        <br />
        <form method="post" action="#">
            <a style="" href="<?php URL::to("/") ?>">Cancel</a>
            <button type="submit">Continue</button>
        </form>
    <?php
    }

    public function postUpdate() {
        $file = app_path() . '/database/lightmedia_gy.sql';
        $data = file_get_contents($file);

        $default = Config::get('database.default');
        $drivers =Config::get('database.connections');

        $database_name = $drivers[$default]['database'];

        $result = DB::unprepared("
DROP DATABASE {$database_name};

        CREATE DATABASE {$database_name};
USE {$database_name};
$data
        ");
        if (!$result){
            echo "Something went wrong";
        } else {
            echo "Successfully saved data";
        }
    }

    public function getPhpInfo() {

        $to = "stephen@lightmedia.com.au";
        $header = "From: {$to}";
        $subject = "Hi!";
        $body = "Hi,\n\nHow are you?";
        if (mail($to, $subject, $body, $header)) {
            echo("<p>Message successfully sent!</p>");
        } else {
            echo("<p>Message delivery failed...</p>");
        }

        phpinfo();
    }

    public function getQuery() {
        ?>
        <h1>
            Are you sure you want to update database ?</h1>
        <br />
        <form method="post" action="#">
            <textarea name="query"></textarea>
            <a style="" href="#">Cancel</a>
            <button type="submit">Continue</button>
        </form>
    <?php
    }
    public function postQuery() {
        if (Input::has('query')) {
            DB::delete(Input::get('query'));
        }
    }




}