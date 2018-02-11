<?php

namespace App\Http\Controllers;

use App\Models\{User,Role,Permission};
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('name', '=', 'moon')->first();
//        var_dump($user->hasRole('owner'),$user->can('edit-user'));
        if (!$user->hasRole('admin')) {
            $owner = new Role();
            $owner->name = 'owner';
            $owner->display_name = 'Project Owner';
            $owner->description = 'User is the owner of a given project';
            $owner->save();

            /*$admin = new Role();
            $admin->name = 'admin';
            $admin->display_name = 'User Administrator';
            $admin->description = 'User is allowed to manage and edit other users';
            $admin->save();*/


            //调用EntrustUserTrait提供的attachRole方法
//            $user->attachRole($admin); // 参数可以是Role对象，数组或id


            // 或者也可以使用Eloquent原生的方法
//            $user->roles()->attach($admin->id); //只需传递id即可


            $createPost = new Permission();
            $createPost->name = 'create-post';
            $createPost->display_name = 'Create Posts';
            $createPost->description = 'create new blog posts';
            $createPost->save();

            /*$editUser = new Permission();
            $editUser->name = 'edit-user';
            $editUser->display_name = 'Edit Users';
            $editUser->description = 'edit existing users';
            $editUser->save();*/

//            $owner->attachPermission($createPost);  //给角色分配权限
//等价于 $owner->perms()->sync(array($createPost->id));

//            $admin->attachPermissions(array($createPost, $editUser));
//等价于 $admin->perms()->sync(array($createPost->id, $editUser->id));
        }
        return view('home');
    }

    public function bindUserAndRole(Request $request)
    {
        $role = Role::where(array('name'=>'owner'))->first();
        $user = User::where(['name'=>'moon'])->first();
        //user和role绑定
        $attach = $user->attachRole($role); // 参数可以是Role对象，数组或id
        var_dump($user,$role,$attach);
    }

    public function bindRoleAndPermission(Request $request)
    {
        $role = Role::where(array('name'=>'owner'))->first();
        $permission = Permission::where(array('name'=>'edit-user'))->first();

        //role和permission绑定
        $attach = $role->attachPermission($permission); // 参数可以是Role对象，数组或id
        var_dump($role,$permission,$attach);
    }
}
