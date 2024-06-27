<?php

namespace App\Livewire\Website;

use App\Mail\CustomerReservationCust;
use App\Mail\CustomerReservationSal;
use Livewire\Component;

// use App\Models\Reservation;
use App\Models\Hairstyle;
use App\Models\SalonBooking;
use App\Models\Service;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class MakeNewReservationModal extends Component
{
    public $salon;

    public $customerName;
    public $customerEmail;
    public $customerPhone;
    public $reservationDate;
    public $reservationTime;
    public $selectedHairstyle;
    public $selectedService;
    public $specialRequests;

    public function mount($salon)
    {
        $this->salon = $salon;

        $this->reservationDate = date('Y-m-d');
        $this->reservationTime = (new \DateTime())->modify('+3 hours')->format('H:i');
    }

    public function render()
    {
        return view('livewire.website.make-new-reservation-modal');
    }


    public function makeReservation()
    {
        // Custom validation rules
        $this->validate([
            'customerName' => 'required|string|max:255',
            'customerEmail' => 'nullable|email',
            'customerPhone' => 'nullable|string|max:20',
            'reservationDate' => 'required|date',
            'reservationTime' => 'nullable|date_format:H:i',
            'selectedHairstyle' => 'nullable|exists:salon_hair_styles,id',
            'selectedService' => 'nullable|exists:salon_services,id',
            'specialRequests' => 'nullable|string',
        ]);

        // Ensure at least one of email or phone is provided
        if (empty($this->customerEmail) && empty($this->customerPhone)) {
            $this->addError('contact', 'Please provide either an email address or a phone number.');
            noty()->addError('Please provide either an email address or a phone number.');
            return;
        }
        // Ensure at least one of hairstyle or service is provided
        if (empty($this->selectedHairstyle) && empty($this->selectedService)) {
            $this->addError('services', 'Please select either a hairstyle or a service.');
            noty()->addError('Please select either a hairstyle or a service.');
            return;
        }

        // Create a new reservation
        $reservation = SalonBooking::create([
            'salon_id' => $this->salon->id,
            'customer_name' => $this->customerName ?? null,
            'customer_email' => $this->customerEmail ?? null,
            'customer_phone' => $this->customerPhone ?? null,
            'reservation_date' => $this->reservationDate,
            'reservation_time' => $this->reservationTime ?? null,
            'salon_hair_style_id' => $this->selectedHairstyle ?? null,
            'salon_service_id' => $this->selectedService ?? null,
            'special_requests' => $this->specialRequests ?? null,
        ]);

        // // Optionally send a confirmation email if email is provided
        if (!empty($this->customerEmail)) {
            Mail::to($this->customerEmail)->send(new CustomerReservationCust($reservation));
        }

        // notify all salon hairdressers using cc email
        $salonHairdressers = $this->salon->hairdressers;
        $ccEmails = $salonHairdressers->pluck('user.email')->toArray();
        if (!empty($ccEmails)) {
            Mail::to($ccEmails)
                ->send(new CustomerReservationSal($reservation));
        }
        // Notify the user
        noty()->addSuccess('Reservation made successfully! One of our hairdressers will be in touch shortly.');

        // Reset form fields
        $this->reset(['customerName', 'customerEmail', 'customerPhone', 'reservationDate', 'reservationTime', 'selectedHairstyle', 'selectedService', 'specialRequests']);
        $this->mount($this->salon);
    }
}
