<?php

namespace App\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Permission;


class PermissionsList extends Component
{
    public function render()
    {
        return view('livewire.permissions-list', [
            'permissions' => Permission::all()
        ]);
    }
    public function delete($permissionid)
    {
        $permission = Permission::find($permissionid);
        $permission->delete();
        $this->dispatch('PermissionDeleted');
    }
}
