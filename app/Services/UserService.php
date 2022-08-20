<?php

namespace App\Services;

class UserService
{
    public static function getDashboardRouteBasedOnUserRole($userRole){
        if($userRole === 'garcom'){
            return route('garcom.dashboard.index');
        }

        if($userRole === 'caixa'){
            return route('caixa.dashboard.index');
        }
    }
}
