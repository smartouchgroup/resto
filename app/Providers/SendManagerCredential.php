<?php

namespace App\Providers;

use App\Providers\ManagerAdded;
use App\Mail\ManagerCreatedMail;
use Illuminate\Support\Facades\Mail;

class SendManagerCredential
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Providers\ManagerAdded  $event
     * @return void
     */
    public function handle(ManagerAdded $event)
    {
        Mail::to($event->userEmail)->send(new ManagerCreatedMail($event->mailData));
    }
}
