<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function __invoke()
    {
        // Get all users
        $users = Sentinel::getUserRepository()->all();
        $Allroles = Sentinel::getRoleRepository()->all();
        $usersWithRoles = [];
        // Loop through each user
        foreach ($users as $user) {
            $roles = $user->getRoles()->pluck('slug')->toArray();

            $usersWithRoles[] = [
                'user' => $user,
                'roles' => $roles,
            ];
        }


        return view('admin.dashboard', ['usersWithRoles' => $usersWithRoles ,
        'allRoles'=>$Allroles
    ]);
    }

}
