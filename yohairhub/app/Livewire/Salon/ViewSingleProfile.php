<?php

namespace App\Livewire\Salon;

use App\Models\Salon;
use App\Models\SalonService;
use App\Models\SalonUser;
use Livewire\Component;

class ViewSingleProfile extends Component
{
    public $salon;
    public $services;
    public $hairdressers;

    public function mount(Salon $salon)
    {
        // Initialize the salon data
        $this->salon = $salon;
        $this->services = $salon->services;
        $this->hairdressers = $salon->hairdressers;
    }
    public function render()
    {
        return view('livewire.salon.view-single-profile');
    }

    public function deleteService($s_id)
    {
        SalonService::findOrFail($s_id)->delete();
        noty()->addSuccess('Service deleted');
    }

    public function fireHairDresser($h_id)
    {
        $hairdresser = SalonUser::findOrFail($h_id);

        // Check if the hairdresser is the owner
        if ($hairdresser->is_owner) {
            noty()->addError('Cannot fire the salon owner.');
            return;
        }

        // Check if the authenticated user is trying to fire themselves
        if (auth()->user()->id == $hairdresser->user_id) {
            noty()->addError('You cannot fire yourself.');
            return;
        }

        // Proceed with firing the hairdresser
        $hairdresser->delete();

        noty()->addSuccess('Fired');
    }

    public function restoreHairDresser($h_id)
    {
        SalonUser::onlyTrashed()->findOrFail($h_id)->restore();
        noty()->addSuccess('Restored');
    }
}
