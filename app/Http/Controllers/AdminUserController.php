<?php

namespace App\Http\Controllers;
use App\Models\Role;
use App\Models\Role_User;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AdminUserController extends Controller
{


    public function show() //вывести всех пользователей
    {
        $users = User::simplePaginate(3);

        return view('admin.users', ['users'=>$users]);
    }

    public function edit(Request $request, $id) //изменить данные рользователя
    {
        $user = User::find($id); //updated user
        $authUser = Auth::user(); //auth user

        if($request -> has('submit')) //user changes
        {
            if(Gate::denies('update', [$user, $authUser]))
            {
                return redirect('/admin/users/') -> with(['message'=>'У вас нет прав!']);
            }
            $user -> name = $request -> input('name');
            $user -> email = $request -> input('email');
            $user -> status = $request -> input('status');

            $user -> save();

            $request -> session() -> flash('message', 'Запись успешно обновлена!');
            return redirect('/admin/users/');
        }

        return view('admin.editUser', ['user'=>$user]);
    }

    public function delRole(Request $request, $role_id, $user_id) //удалить роль
    {
        $authUser = Auth::user();

        if(Gate::denies('updateJustAdmin', $authUser)){
            return redirect('/admin/users/') -> with(['message' => 'У вас нет прав!']);
        }

        Role_User::where('role_id', $role_id) -> where('user_id', $user_id) -> delete();
        $request -> session() -> flash('message', 'Роль пользователя удалена!');
        return redirect('/admin/users/');
    }

    public function addRole(Request $request, $user_id) //добавить роль
    {
        $user = User::find($user_id);
        $authUser = Auth::user();
        $roles = Role::all();

        if(Gate::denies('updateJustAdmin', $authUser))
        {
            return redirect('/admin/users/') -> with(['message' => 'У вас нет прав!']);
        }

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
