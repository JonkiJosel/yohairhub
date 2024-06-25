<?php

namespace App\Livewire\Salon;

use App\Models\Salon;
use Livewire\Component;

class ListAllSalons extends Component
{
    public function render()
    {
        return view('livewire.salon.list-all-salons', [
            'salons' => Salon::withTrashed()->get()
        ]);
    }

    public function addFeatured($id)
    {
        $salon = Salon::withTrashed()->find($id);
        $salon->update([
            'is_featured' => true
        ]);
        noty()->addSuccess('Saved');
    }

    public function removeFeatured($id)
    {
        $salon = Salon::withTrashed()->find($id);
        $salon->update([
            'is_featured' => false
        ]);
        noty()->addSuccess('Saved');
    }

    public function unblockSalon($id)
    {
        $salon = Salon::withTrashed()->find($id);
        $salon->restore();
        noty()->addSuccess('Unblocked');
    }
    public function blockSalon($id)
    {
        $salon = Salon::find($id);
        $salon->delete();
        noty()->addSuccess('Blocked');
    }
}
