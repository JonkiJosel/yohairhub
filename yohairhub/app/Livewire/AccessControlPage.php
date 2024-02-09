<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;


class AccessControlPage extends Component
{
    public function render()
    {
        if(Auth::user()->hasRole('admin'))
        return view('livewire.access-control-page');
        abort(403,'JOSEL SAYS NO');
    }
}
