<?php

namespace App\Services;

use Brevo\Client\Api\TransactionalEmailsApi;
use Brevo\Client\Configuration;
use Brevo\Client\Model\SendSmtpEmail;
use GuzzleHttp\Client;

class BrevoMailService
{
    protected TransactionalEmailsApi $api;

    public function __construct()
    {
        $config = Configuration::getDefaultConfiguration()
            ->setApiKey('api-key', env('BREVO_API_KEY'));

        $this->api = new TransactionalEmailsApi(
            new Client(),
            $config
        );
    }

    public function sendOrderMail($toEmail, $toName, $subject, $html)
    {
        $email = new SendSmtpEmail([
            'sender' => [
                'email' => env('MAIL_FROM_ADDRESS'),
                'name'  => env('MAIL_FROM_NAME'),
            ],
            'to' => [[
                'email' => $toEmail,
                'name'  => $toName,
            ]],
            'subject' => $subject,
            'htmlContent' => $html,
        ]);

        return $this->api->sendTransacEmail($email);
    }
}