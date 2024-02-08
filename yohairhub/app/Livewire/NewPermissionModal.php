<?php

namespace App\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Livewire\Attributes\Rule;
class NewPermissionModal extends Component
{
    public $newPermissionModal_isOpen = false;
    #[Rule('required | min:3 | unique:permissions,name| max:50')]
    public $name;
    public function render()
    {
        return view('livewire.new-permission-modal');
    }

    public function openNewPermisionModal()
    {
        $this->newPermissionModal_isOpen = true;
    }

    public function closeNewPermissionModal()
    {
        $this->newPermissionModal_isOpen = false;
    }
    public function createPermission()
    {
        $this->validate();
        $p = Permission::create(['name' => $this->name]);
        $p->guard_name = 'web';
        $p->save();
        $this->dispatch('permissionCreated');
        $this->name = '';
    }
}
