<?php

namespace Pshenichniyinfo\AdminPanel\Http\Controllers;

use Pshenichniyinfo\AdminPanel\Http\Requests\CreateUserRequest;
use Pshenichniyinfo\AdminPanel\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);

        return view('admin-panel::pages.users.index', ['users' => $users]);
    }

    public function show(User $user)
    {
        return view('admin-panel::pages.users.show', ['user' => $user]);
    }

    public function create()
    {
        return view('admin-panel::pages.users.create');
    }

    public function store(CreateUserRequest $request)
    {
        $isCreate = (bool)User::create($request->validated());
        return $isCreate
            ? redirect()->route('admin.users')->withSuccess('You have successfully created a user')
            : redirect()->route('admin.users.create')->withErrors('Something went wrong');
    }
}
