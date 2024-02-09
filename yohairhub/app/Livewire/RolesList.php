<?php

namespace App\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class RolesList extends Component
{
    public function render()
    {
        return view('livewire.roles-list', [
            'roles' => Role::all()
        ]);
    }
    public function delete($roleid)
    {
        $role = Role::find($roleid);
        $role->delete();
        $this->dispatch('RoleDeleted');
    }
}
