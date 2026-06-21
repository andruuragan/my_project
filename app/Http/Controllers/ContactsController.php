<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Notifications\ContactFormNotification;
use Illuminate\Support\Facades\Notification;

class ContactsController extends Controller
{
    public function index()
    {
        return view('contacts');
    }

 public function send(Request $request)
{
    $data = $request->validate([
        'name'    => 'required|string|max:255',
        'email'   => 'required|email',
        'phone'   => 'required|string|max:20',
        'message' => 'required|string',
    ]);

    $notifiable = new class {
        use \Illuminate\Notifications\Notifiable;

        public function routeNotificationForTelegram()
        {
            return env('TELEGRAM_ADMIN_CHAT_ID');
        }
    };

    Notification::send(
        $notifiable,
        new ContactFormNotification($data)
    );

    return back()->with(
        'success',
        'Дякуємо! Ваше повідомлення успішно відправлено.'
    );
}
}