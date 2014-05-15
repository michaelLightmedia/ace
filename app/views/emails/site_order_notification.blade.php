<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
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

                .table-mobile td {
                    font-size: 13px !important;
                    line-height: 1.5 !important;
                    display: block !important;
                    width: 100% !important;
                    -webkit-box-sizing: border-box;
                    -moz-box-sizing: border-box;
                    box-sizing: border-box;
                }
                .btn {
                    padding: 8px 15px !important;
                    font-size: 13px !important;
                }


            }

        </style>
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body style="background: #edeced;">
        <center style="height: 100%; padding: 30px 0; background: #edeced;">
            <table width="90%" style="max-width: 650px; margin: 0 auto; border-radius: 8px; box-shadow: 0 4px 2px -2px #DDD;" cellpadding="30" cellspacing="0" bgcolor="FFFFFF">
                <tbody>
                    <tr>
                        <td style="font-family: 'Helvetica', Arial, Sans-serif; font-size: 14px; color: #555555; line-height: 1.7;">
                            <h1 style="margin-bottom: 15px; margin-top: 0; font-size: 26px; color: #333; ">Order confirmation</h1>

                            <p style="margin: 0 0 20px 0;"><strong>Dear {{ $order_recipient_name }},</strong></p>

                            <p style="margin: 0 0 25px 0;">New order created by {{ $customer_name }}</p>

                            <p style="margin: 0;"><strong>To view your order click the link below:</strong></p>

                            <!--<a href="{{ URL::to('order/info&order_id='.$order_no) }}" style="text-decoration: none; color: #35a5c7 ">{{ URL::to('order/info&order_id='.$order_no) }}</a>-->

                            <table class="table-mobile" width="100%" cellpadding="10" cellspacing="0" style="margin: 20px 0; text-align: left; border: 1px solid #eee;">
                                <thead>
                                    <tr>
                                        <th colspan="2" bgcolor="eeeeee">Order Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="width: 50%; border-right: 1px solid #eee; border-bottom: 1px solid #eee;" valign="top">
                                            <table width="100%">
                                                <tr>
                                                    <td><strong>Invoice No./Order No.:</strong> {{ $order_no }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Date of order:</strong> {{ $date_order }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Order Status:</strong> {{ $order_status }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Payment Status:</strong> {{ $payment_status }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Payment Method:</strong> {{ $payment_method }}</td>
                                                </tr>
                                                <!--<tr>
                                                    <td><strong>Shipping Method:</strong> {{ $customer_address }}</td>
                                                </tr>-->
                                            </table>
                                        </td>
                                        <td  valign="top" style="width: 50%; border-bottom: 1px solid #eee;">
                                            <table width="100%">
                                                <tr>
                                                    <td><strong>Email:</strong> <a href="#" style="text-decoration: none; color: #35a5c7 ">{{ $customer_email }}</a></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Telephone:</strong> {{ $customer_phone }}</td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 50%; border-right: 1px solid #eee" valign="top">
                                            <table width="100%">
                                                <tr>
                                                    <td><strong>Payment Address:</strong></td>
                                                </tr>
                                                <tr>
                                                    <td>{{ $customer_address }}</td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td  valign="top" style="width: 50%; ">
                                            <table width="100%">
                                                <tr>
                                                    <td><strong>Shipment Address:</strong></td>
                                                </tr>
                                                <tr>
                                                    <td>{{ $customer_address }} </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table width="100%" cellpadding="10" cellspacing="0" style="margin: 20px 0; text-align: left; border: 1px solid #eee;">
                                <thead>
                                    <tr>
                                        <th width="10%" bgcolor="eeeeee">Product</th>
                                        <th width="20%" bgcolor="eeeeee">Quantity</th>
                                        <th width="20%" bgcolor="eeeeee">Price</th>
                                        <th width="20%" bgcolor="eeeeee">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($items['cart'] as $item)
                                    <tr>
                                        <td style="border-right: 1px solid #eee; border-bottom: 1px solid #eee;" valign="top">
                                            <img src="{{ $item['thumbnail'] }}" width="100px" alt="" style="display: block;">
                                        </td>
                                        <td style="border-right: 1px solid #eee; border-bottom: 1px solid #eee;" valign="top">
                                            {{ $item['cartQty'] }}
                                        </td>
                                        <td style="border-right: 1px solid #eee; border-bottom: 1px solid #eee;" valign="top">
                                            {{ Gy::formatNumber($item['productSalePrice']) }}
                                        </td>
                                        <td style="border-bottom: 1px solid #eee;" valign="top">
                                           {{ Gy::formatNumber($item['cartSubTotal']) }}
                                        </td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="2">
                                            Subtotal
                                        </td>
                                        <td colspan="2" style="border-bottom: 1px solid #eee;text-align:right;" valign="top">
                                           {{ Gy::formatNumber($items['subTotal']) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            Total
                                        </td>
                                        <td colspan="2" style="border-bottom: 1px solid #eee;text-align:right;" valign="top">
                                           {{ Gy::formatNumber($items['subTotal']) }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src='//www.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>
