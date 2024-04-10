<?php

namespace Pshenichniyinfo\AdminPanel\Http\Controllers;

use Pshenichniyinfo\AdminPanel\Http\Requests\CreateRoleRequest;
use Pshenichniyinfo\AdminPanel\Services\RoleService;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function __construct(protected RoleService $roleService)
    {
    }

    public function index()
    {
        $roles = Role::get();

        return view('admin-panel::pages.roles.index', ['roles' => $roles]);
    }

    public function show()
    {
//        return view('admin-panel::pages.users.show', ['user' => $user]);
    }

    public function create()
    {
        $permissions = Permission::get();

        return view('admin-panel::pages.roles.create', ['permissions' => $permissions]);
    }

    public function store(CreateRoleRequest $roleRequest)
    {
        $isStatus = $this->roleService->create($roleRequest->validated());

        return $isStatus
            ? redirect()->route('admin.roles')->withSuccess('You have successfully created a role')
            : redirect()->route('admin.roles.create')->withErrors('Something went wrong');
    }

    public function edit(Role $role)
    {
        $permissions = Permission::get();

        return view('admin-panel::pages.roles.edit', ['permissions' => $permissions, 'role' => $role]);
    }

    public function update(CreateRoleRequest $roleRequest, Role $role)
    {
        $isStatus = $this->roleService->update($roleRequest->validated(), $role);

        return $isStatus
            ? redirect()->route('admin.roles')->withSuccess('You have successfully updated a role')
            : redirect()->route('admin.roles.edit')->withErrors('Something went wrong');
    }

    public function delete(Role $role)
    {
        $role->delete();
    }
}
