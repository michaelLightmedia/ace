Payment related options

// Global
gateway_currency =
gateway_tax_state =
gateway_tax_rate =
sslseal = (text)

// Gateways

----Paypal Express

    paypalexpress_account_email =
    paypalexpress_api_username =
    paypalexpress_password =
    paypalexpress_signature =
    paypalexpress_endpoint =
    paypalexpress_return =

----Merchant Warrior
    merchantwarrior_merchant_uuid =
    merchantwarrior_api_key =
    merchantwarrior_pass_phrase =
    merchantwarrior_api_endpoint = 'https://base.merchantwarrior.com/post/'


----Email settings

    //email options
    setOption("from_email");
    setOption("from_name");
    setOption("only_filter_pmpro_emails");

    setOption("email_admin_checkout");
    setOption("email_admin_changes");
    setOption("email_admin_cancels");
    setOption("email_admin_billing");

    setOption("email_member_notification");

----Advance Settings
    Require Terms of Service on signups?
    If yes, create a WordPress page containing your TOS
    agreement and assign it using the dropdown above.

----Reports
    --Sales and Revenue (Testing/Sandbox) - removed when settings gateway_environment = live
      All time
      this year
      this month
      today

    --visits and logins

        --views
          all time
          this year
          this month
          today

        --logins
          all time
          this year
          this month
          today

        --logins
          all time
          this year
          this month
          today

    --member stat
        --signups
          all time
          this year
          this month
          today

    --cancellation rate
        all time
        this year
        this month
        today
