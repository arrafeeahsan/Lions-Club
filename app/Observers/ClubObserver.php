<?php

namespace App\Observers;

use App\Models\Club;
use Illuminate\Support\Facades\Auth;

class ClubObserver
{
    /**
     * Handle the Club "created" event.
     *
     * @param  \App\Models\Club  $club
     * @return void
     */
    public function creating(Club $club)
    {
        $club->created_by = 'USERID: '.Auth::id();
    }

    /**
     * Handle the Club "updated" event.
     *
     * @param  \App\Models\Club  $club
     * @return void
     */
    public function updated(Club $club)
    {
        //
    }

    /**
     * Handle the Club "deleted" event.
     *
     * @param  \App\Models\Club  $club
     * @return void
     */
    public function deleted(Club $club)
    {
        //
    }

    /**
     * Handle the Club "restored" event.
     *
     * @param  \App\Models\Club  $club
     * @return void
     */
    public function restored(Club $club)
    {
        //
    }

    /**
     * Handle the Club "force deleted" event.
     *
     * @param  \App\Models\Club  $club
     * @return void
     */
    public function forceDeleted(Club $club)
    {
        //
    }
}
