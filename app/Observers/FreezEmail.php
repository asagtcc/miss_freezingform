<?php

namespace App\Observers;

use App\Mail\FreezingMail;
use App\Models\Branch;
use App\Models\Form;
use Illuminate\Contracts\Events\ShouldHandleEventsAfterCommit;
use Illuminate\Support\Facades\Mail;

class FreezEmail implements ShouldHandleEventsAfterCommit
{
    /**
     * Handle the Form "created" event.
     */
    public function created(Form $form): void
    {
        info($form);
        $branch_email = Branch::where('id', $form->branch_id)->pluck('email');
        // freeze.miss@missplatinum.com
        Mail::to($branch_email)->send(new FreezingMail($form));
    }

    /**
     * Handle the Form "updated" event.
     */
    public function updated(Form $form): void
    {
        //
    }

    /**
     * Handle the Form "deleted" event.
     */
    public function deleted(Form $form): void
    {
        //
    }

    /**
     * Handle the Form "restored" event.
     */
    public function restored(Form $form): void
    {
        //
    }

    /**
     * Handle the Form "force deleted" event.
     */
    public function forceDeleted(Form $form): void
    {
        //
    }
}
