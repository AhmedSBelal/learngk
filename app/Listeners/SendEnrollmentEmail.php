<?php

namespace App\Listeners;

use App\Events\EnrollCreated;
use Illuminate\Support\Facades\Mail;

class SendEnrollmentEmail
{
    public function handle(EnrollCreated $event)
    {
        $data = [
            'name' => $event->name,
            'email' => $event->email,
            'phone' => $event->phone,
            'course' => $event->course,
            'id' => $event->id,
        ];

        Mail::send('emails.enrollment', $data, function ($message) {
            $message->to('hossam.amin@lgk-kuwait.com')
                ->subject('New Enrollment Received');
        });
    }
}
