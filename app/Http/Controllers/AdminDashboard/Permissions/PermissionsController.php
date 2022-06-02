<?php

namespace App\Http\Controllers\AdminDashboard\Permissions;

use App\Http\Controllers\Controller;
use App\Models\User;
use function back;

class PermissionsController extends Controller
{
    public function give_User_Permissions(User $user){
        $user->givePermissionTo('manage accounts');
        $user->assignRole('admin');
        return back()->with('given_perm','تم إعطائه الصلاحيات للمستخدم');
    }
    public function remove_User_Permissions(User $user){
        $user->revokePermissionTo('manage accounts');
        $user->removeRole('admin');
        $user->getAllPermissions();
        return back()->with('remove_perm','تم إخذا الصلاحيات من المستخدم');


    }
}
