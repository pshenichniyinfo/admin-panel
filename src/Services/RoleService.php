<?php

namespace Pshenichniyinfo\AdminPanel\Services;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleService
{
    public function create($fields): bool
    {
        $role = Role::create(['name' => $fields['name']]);
        return $this->updatePermissions($fields['permissions'], $role);
    }

    public function update($fields, Role $role): bool
    {
        $role->update(['name' => $fields['name']]);

        return $this->updatePermissions($fields['permissions'], $role);
    }

    protected function updatePermissions($fieldPermissions, Role $role): bool
    {
        $permissions = Permission::whereIn('id', $fieldPermissions)->get();
        return (bool)$role->syncPermissions($permissions);
    }
}
