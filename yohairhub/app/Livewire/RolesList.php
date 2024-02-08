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
}
