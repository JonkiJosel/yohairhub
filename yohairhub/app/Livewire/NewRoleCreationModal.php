<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Rule;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class NewRoleCreationModal extends Component
{
    public $newRoleCreationModal_isOpen = false;
    #[Rule('required | min:3 | unique:roles,name| max:50')]
    public $name;
    public $permissions = [];
    public function render()
    {

        return view('livewire.new-role-creation-modal', [
            'allPermissions' => Permission::all()
        ]);
    }
    public function openNewRoleCreationModal()
    {
        $this->newRoleCreationModal_isOpen = true;
    }
    public function closeNewRoleCreationModal()
    {
        $this->newRoleCreationModal_isOpen = false;
    }
    public function createRole()
    {
        $this->validate();
        $role = Role::create(['name' => $this->name, 'guard_name' => 'web']);
        $role->syncPermissions($this->permissions);
        $this->dispatch('roleCreated');
        $this->name = '';
        $this->permissions = [];
    }

}
