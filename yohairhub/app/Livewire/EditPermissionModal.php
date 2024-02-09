<?php
namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;

class EditPermissionModal extends Component
{
    public $permission;
    public $editPermissionModal_isOpen = false;
    public $name;

    public function mount($permission)
    {
        $this->permission = $permission;
        $this->name = $permission->name;
    }

    public function render()
    {
        return view('livewire.edit-permission-modal');
    }

    public function openEditPermissionModal()
    {
        $this->editPermissionModal_isOpen = true;
    }

    public function updatePermission()
    {
        $validatedData = $this->validate([
            'name' => 'required',
        ]);

        $this->permission->name = $validatedData['name'];
        $this->permission->save();

        $this->dispatch('PermissionUpdated');
    }
    public function closeEditPermissionModal()
    {
        $this->editPermissionModal_isOpen = false;
    }
}
