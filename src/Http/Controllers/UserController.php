<?php

namespace Pshenichniyinfo\AdminPanel\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Pshenichniyinfo\AdminPanel\Http\Requests\CreateUserRequest;
use Pshenichniyinfo\AdminPanel\Http\Requests\UpdateUserRequest;
use Pshenichniyinfo\AdminPanel\Models\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        $superAdmin = User::first();

        return view('admin-panel::pages.users.index', ['users' => $users, 'superAdmin' => $superAdmin]);
    }

    public function edit(User $user)
    {
        $roles = Role::get();

        return view('admin-panel::pages.users.edit', ['user' => $user, 'roles' => $roles]);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $fields = $request->validated();

        if (!$fields['password']) {
            unset($fields['password']);
        }

        $user->update($fields);

        DB::table('model_has_roles')
            ->updateOrInsert(
                ['model_id' => $user->id],
                [
                    'role_id' => $request->role,
                    'model_type' => 'App\Models\User'
                ]
            );

        return redirect()->route('admin.users')->withSuccess('You have successfully created a user');
    }

    public function create()
    {
        $roles = Role::get();
        return view('admin-panel::pages.users.create', ['roles' => $roles]);
    }

    public function store(CreateUserRequest $request)
    {
        $user = User::create($request->validated());

        DB::table('model_has_roles')->insert([
            'model_id' => $user->id,
            'role_id' => $request->role,
            'model_type' => 'App\Models\User'
        ]);

        return $user
            ? redirect()->route('admin.users')->withSuccess('You have successfully created a user')
            : redirect()->route('admin.users.create')->withErrors('Something went wrong');
    }

    public function delete(User $user)
    {
        DB::table('model_has_roles')->where('model_id', $user->id)->delete();
        $user->delete();
    }
}
