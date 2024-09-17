<?php

namespace App\Listeners;

use App\Events\WorkCreated;
use App\Models\User;
use App\Notifications\NewWork;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendWorkCreatedNofitications implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(WorkCreated $event): void
    {
        foreach (User::whereNot('id', $event->work_center->user_id)->cursor() as $user) {
            $user->notify(new NewWork($event->work_center));
        }
    }
}
