<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Password Reset</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <style>

            /* http://meyerweb.com/eric/tools/css/reset/ 
               v2.0 | 20110126
               License: none (public domain)
            */

            body {
                margin: 0;
                padding: 0;
            }

            @media (max-width: 600px) {
                h1 {
                    font-size: 20px !important;
                }

                td {
                    font-size: 13px !important;
                    line-height: 1.5 !important;
                }
                .btn {
                    padding: 8px 15px !important;
                    font-size: 13px !important;
                }

            }

        </style>
        <script src="{{ URL::asset('js/vendor/modernizr-2.6.2.min.js') }}"></script>
    </head>
    <body style="background: #edeced;">
        <center style="height: 100%; padding: 30px 0; background: #edeced;">
            <table width="90%" style="max-width: 650px; margin: 0 auto; border-radius: 8px; box-shadow: 0 4px 2px -2px #DDD;" cellpadding="30" cellspacing="0" bgcolor="FFFFFF">
                <tbody>
                    <tr>
                        <td style="font-family: 'Helvetica', Arial, Sans-serif; font-size: 14px; color: #555555; line-height: 1.7;">
                            <h1 style="margin-bottom: 15px; margin-top: 0; font-size: 26px; text-align: center; color: #333; ">Request new <span style="color: #37a4ca;">password</span></h1>
                            <p style="text-align: center">
                                <img src="{{ URL::asset('assets/site/i/placeholders/confirm-pass.png') }}" alt="" style="display: inline-block; margin-top: 10px;">
                            </p>
                            <p style="margin: 0 0 35px 0; text-align: center;">To reset password, Complete this form: <strong style="color: #37a4ca;">Ace</strong> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi, omnis optio id accusantium voluptas quos assumenda sequi ratione cum cupiditate eaque provident quae officia error similique voluptatum amet ipsam suscipit? Officia.</p>
                            <div style="text-align: center">
                                <a href="{{ URL::route('user/reset').'?token='. $token }}" class="btn" style="display: inline-block; padding: 15px 28px; background: #35a5c7; color: #fff; border-radius: 4px; text-decoration: none; font-size: 16px;">Click here to activate</a>
                            </div>
                            <p style="margin: 0 0 35px 0; text-align: center;">
                                Copy this link if above link not working. 
                                {{ URL::route('user/reset').'?token='. $token }}</p>
                        </td>
                    </tr>
                </tbody>
            </table>
            <table width="90%" style="max-width: 650px; margin: 0 auto;" cellpadding="20" cellspacing="0">
                <tbody>
                    <tr>
                        <td style="font-family: 'Helvetica', Arial, Sans-serif; font-size: 14px; color: #555555; line-height: 1.7; text-align: center;" valign="center">
                            <img src="{{ URL::asset('assets/global/i/logo-gray.png') }}" alt="">
                        </td>
                    </tr>
                </tbody>
            </table>

            
        </center>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>
        <script src="{{ URL::asset('js/plugins.js') }}"></script>
        <script src="{{ URL::asset('js/main.js') }}"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src='//www.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>