<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class BrevoMailService
{
    public function sendOrderMail($toEmail, $toName, $subject, $html)
    {
        return Http::withHeaders([
            'accept' => 'application/json',
            'api-key' => env('BREVO_API_KEY'),
            'content-type' => 'application/json',
        ])->post('https://api.brevo.com/v3/smtp/email', [

            'sender' => [
                'name' => env('MAIL_FROM_NAME'),
                'email' => env('MAIL_FROM_ADDRESS'),
            ],

            'to' => [
                [
                    'email' => $toEmail,
                    'name' => $toName,
                ]
            ],

            'subject' => $subject,

            'htmlContent' => $html,
        ]);
    }
}