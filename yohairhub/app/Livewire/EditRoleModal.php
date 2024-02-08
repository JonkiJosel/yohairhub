<?php

namespace App\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class EditRoleModal extends Component
{
    public $editRoleModal_isOpen = false;
    public $role;
    public function mount($role)
    {
        $this->role = Role::with('permissions')->find($role->id);
    }
    public function render()
    {
        return view('livewire.edit-role-modal',[
            'allPermissions' => Permission::all()
        ]);
    }

    public function openEditRoleModal()
    {
        $this->editRoleModal_isOpen = true;
    }
    public function togglePermission($permissionid)
    {
        $permission = Permission::find($permissionid);
        if($permission->roles->contains($this->role))
        {
            $this->role->revokePermissionTo($permission);
        }
        else
        {
            $this->role->givePermissionTo($permission);
        }
        $this->dispatch('RoleUpdated');

    }
    public function grantAllPermissions(){
        $this->role->syncPermissions(Permission::all());
        $this->dispatch('RoleUpdated');
    }
    public function revokeAllPermissions(){
        $this->role->syncPermissions([]);
        $this->dispatch('RoleUpdated');
        // $this->editRoleModal_isOpen = false;
    }


}
