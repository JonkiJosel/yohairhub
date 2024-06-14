<?php

namespace App\Livewire\Salon;

use Livewire\Component;

use App\Models\Salon;
use App\Models\SalonUser;
use App\Models\User;


class InviteHairdresser extends Component
{
    public $email;
    public $salon;

    public function mount($salonId)
    {
        $this->salon = $salonId;
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
            $salon = Salon::find($this->salon->id);
            // $salon->hairdressers()->attach($user->id);
            SalonUser::create([
                'salon_id' => $salon->id,
                'user_id' => $user->id,
            ]);

            $this->reset('email');
            $this->dispatch('hairdresserInvited');
        } else {
            noty()->addError('User with the provided email does not exist.');
        }
    }
}
