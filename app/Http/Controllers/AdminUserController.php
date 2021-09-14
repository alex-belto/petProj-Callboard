<?php

namespace App\Http\Controllers;
use App\Models\Role;
use App\Models\Role_User;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function show() //вывести всех пользователей
    {
        $users = User::simplePaginate(3);


        return view('admin.users', ['users'=>$users]);
    }

    public function edit(Request $request, $id) //изменить данные рользователя
    {
        $user = User::find($id);



        if($request -> has('submit'))
        {
            $user -> name = $request -> input('name');
            $user -> email = $request -> input('email');

            $user -> save();

            $request -> session() -> flash('message', 'Запись успешно обновлена!');
            return redirect('/admin/users/');
        }

        return view('admin.editUser', ['user'=>$user]);
    }

    public function delRole(Request $request, $role_id, $user_id) //удалить роль
    {
        Role_User::where('role_id', $role_id) -> where('user_id', $user_id) -> delete();
        $request -> session() -> flash('message', 'Роль пользователя удалена!');
        return redirect('/admin/users/');
    }

    public function addRole(Request $request, $user_id) //добавить роль
    {
        $user = User::find($user_id);
        $roles = Role::all();
        //dump($roles);
        if($request -> has('role'))
        {

            $role_id =  $request -> input('role'); //role_id

            $roleUser = new Role_User;
            $roleUser -> user_id = $user_id;
            $roleUser -> role_id = $role_id;

            $roleUser -> save();



            $request -> session() -> flash('message', 'Добавлена новая роль!');
            return redirect('/admin/users/');
        }

        return view('admin.addRole', ['user'=>$user, 'roles'=>$roles]);
    }
}
