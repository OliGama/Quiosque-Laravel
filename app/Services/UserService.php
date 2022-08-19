<?php

namespace App\Services;

class UserService
{
    public static function getDashboardRouteBasedOnUserRole($userRole){
        if($userRole === 'garcom'){
            return redirect()->route('garcom.dashboard.index');
        }

        if($userRole === 'caixa'){
            return redirect()->route('caixa.dashboard.index');
        }
    }
}
