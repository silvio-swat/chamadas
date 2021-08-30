<?php

namespace App\Observers;

use App\Models\MenuPage;

class MenuPageObserver
{
    /**
     * Handle the MenuPage "created" event.
     *
     * @param  \App\Models\MenuPage  $menuPage
     * @return void
     */
    public function created(MenuPage $menuPage)
    {
        //
    }

    /**
     * Handle the MenuPage "updated" event.
     *
     * @param  \App\Models\MenuPage  $menuPage
     * @return void
     */
    public function updated(MenuPage $menuPage)
    {
        //
    }

    /**
     * Handle the MenuPage "deleted" event.
     *
     * @param  \App\Models\MenuPage  $menuPage
     * @return void
     */
    public function deleted(MenuPage $menuPage)
    {
        //
    }

    /**
     * Handle the MenuPage "restored" event.
     *
     * @param  \App\Models\MenuPage  $menuPage
     * @return void
     */
    public function restored(MenuPage $menuPage)
    {
        //
    }

    /**
     * Handle the MenuPage "force deleted" event.
     *
     * @param  \App\Models\MenuPage  $menuPage
     * @return void
     */
    public function forceDeleted(MenuPage $menuPage)
    {
        //
    }
}
