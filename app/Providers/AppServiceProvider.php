<?php

namespace App\Providers;

use App\Models\MenuPage;
use App\Observers\MenuPageObserver;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        MenuPage::observe(MenuPageObserver::class);
        Blade::aliasComponent('components.helpers.modal-form-ini', 'modal_form_ini');
        Blade::aliasComponent('components.helpers.modal-form-fim', 'modal_form_fim');
        Blade::aliasComponent('components.helpers.grid-ini'      , 'grid_ini');
        Blade::aliasComponent('components.helpers.grid-fim'      , 'grid_fim');        
        Blade::aliasComponent('components.helpers.input-text'    , 'input_text');
        Blade::aliasComponent('components.helpers.input-password', 'input_password');
        Blade::aliasComponent('components.helpers.input-select'  , 'input_select');
        Blade::aliasComponent('components.helpers.input-box'     , 'input_box');
        Blade::aliasComponent('components.helpers.table-open'    , 'table_open');
        Blade::aliasComponent('components.helpers.table-close'   , 'table_close');
        Blade::aliasComponent('components.helpers.button'        , 'button');
        Blade::aliasComponent('components.helpers.thead'         , 'render_thead');
        Blade::aliasComponent('components.helpers.tbody'         , 'render_tbody');
        Blade::aliasComponent('components.helpers.page-title'    , 'page_title');
    }
}
