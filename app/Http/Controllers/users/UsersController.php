<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Http\Requests\user\UpdateUserRequest;
use App\Models\User;
use Illuminate\Routing\Route;
use function Symfony\Component\String\b;

class UsersController extends Controller
{
    public function update_user_view(){
        return response(view('admin.users.users'));
    }
    public function edit_users_view(User $user){
        return response(view('admin.users.edit_users',compact('user')));
    }

    public function edit_user(UpdateUserRequest $request,User $user){
        $user->update([
            'name'=>$request->name,
            'email'=>$request->email,
        ]);
        if (isset($request->password)){
            $user->update([
                'password'=>bcrypt($request->password)
            ]);
        }
        return back()->with('update_user','لقد تم تحديث بياناتك');
    }

    public function update_current_user(UpdateUserRequest $request){
        $current_user=User::find(auth()->user()->id);
        $current_user->update([
            'name'=>$request->name,
            'email'=>$request->email,
        ]);
        if (isset($request->password)){
            $current_user->update([
                'password'=>bcrypt($request->password)
            ]);
        }
        return back()->with('update_user','لقد تم تحديث بياناتك');

    }

    public function all_users(){
        $users=User::all();
        return response(view('admin.users.users',compact('users')));
    }
    public function delete_user(User $user){
        if (auth()->user()->id==$user->id){
            return back()->with('current_user_error','لايمكن حذف الحساب ,لانه مستخدم حالياً');

        }
        $user->delete();
        return back()->with('deleted_user_success','تم حذف الحساب بنجاح');
    }

}
