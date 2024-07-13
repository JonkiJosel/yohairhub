<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use App\Models\SalonUser;

class UniqueSalonOwnersCard extends Component
{
    public $uniqueSalonOwners;

    public function mount()
    {
        $this->uniqueSalonOwners = SalonUser::where('is_owner', true)->distinct('user_id')->count('user_id');
    }
    
    public function render()
    {
        return view('livewire.dashboard.unique-salon-owners-card');
    }
}
