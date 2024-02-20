<?php

namespace App\Livewire\Salon;

use Livewire\Component;

use App\Models\Salon;
use App\Models\User;


class InviteHairdresser extends Component
{
    public $email;
    public $salonId;

    public function mount($salonId)
    {
        $this->salonId = $salonId;
    }
    public function render()
    {
        return view('livewire.salon.invite-hairdresser');
    }

    public function invite()
    {
        $validatedData = $this->validate([
            'email' => ['required', 'email'],
        ]);

        $user = User::where('email', $validatedData['email'])->first();

        if ($user) {
            $salon = Salon::find($this->salonId);
            $salon->hairdressers()->attach($user->id);
            
            $this->reset('email');
            $this->dispatch('hairdresserInvited');
        } else {
            session()->flash('error', 'User with the provided email does not exist.');
        }
    }

}
