<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class UserManagement extends Component
{
    public function render()
    {
        if(Auth::user()->hasRole('admin'))
        return view('livewire.user-management');
        abort(403);
    }
}
