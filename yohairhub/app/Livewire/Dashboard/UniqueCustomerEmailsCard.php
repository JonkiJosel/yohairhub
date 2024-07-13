<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use App\Models\SalonBooking;

class UniqueCustomerEmailsCard extends Component
{
    public $uniqueCustomerEmails;

    public function mount()
    {
        $this->uniqueCustomerEmails = SalonBooking::distinct('customer_email')->count('customer_email');
    }
    public function render()
    {
        return view('livewire.dashboard.unique-customer-emails-card');
    }
}
