<?php

namespace App\Services;

use MailchimpMarketing\ApiClient;

class MailchimpNewsletter implements Newsletter
{
    public function __construct(protected ApiClient $client)
    {
    }

    public function subscribe(string $email, string $list = null)
    {


        return $this->client->lists->createList([
            "name" => "testReader",
            "permission_reminder" => "permission_reminder",
            "email_type_option" => true
            ]);

//        return $this->client->lists->addListMember($list, [
//            'email_address' => $email,
//            'status' => 'subscribed',
//        ]);
    }
}
