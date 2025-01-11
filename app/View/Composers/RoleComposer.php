<?php

namespace App\View\Composers;

use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class RoleComposer
{
    public function __construct()
    {
        //
    }
    
    public function compose(View $view)
    {
        $view->with('viewRoles',DB::table('roles')->pluck('name','id'));
    }
}