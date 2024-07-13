<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use App\Models\User;

class TotalUsersCard extends Component
{
    public $totalUsers;

    public function mount()
    {
        $this->totalUsers = User::count();
    }
    public function render()
    {
        return view('livewire.dashboard.total-users-card');
    }
}
