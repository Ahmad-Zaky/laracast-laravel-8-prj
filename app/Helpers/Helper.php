<?php

use App\Services\Newsletters\MailChimp;
use MailchimpMarketing\ApiClient;

if (!function_exists('newsletter')) {
    function newsletterInstance()
    {
        switch (config('services.newsletter')) {
            case 'mailchimp':
                return mailchimp();
                break;
            
            case 'convertkit':
                return convertkit();
                break;
            
            default:
                return false;
                break;
        }
         return ;
    }
}

if (!function_exists('mailchimp')) {
    function mailchimp()
    {
        return new MailChimp((new ApiClient)->setConfig([
                    'apiKey' => config('services.mailchimp.key'),
                    'server' => config('services.mailchimp.server'),
        ]));
    }
}

if (!function_exists('convertkit')) {
    function convertkit()
    {
        return;
    }
}

