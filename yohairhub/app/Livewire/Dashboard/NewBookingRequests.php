<?php

namespace App\Livewire\Dashboard;

use App\Models\SalonBooking;
use App\Models\SalonUser;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;


use Illuminate\Support\Facades\Mail;
use App\Mail\FeedbackRequestMail;
use App\Mail\ReservationCancelledNotification;
use App\Mail\ReservationConfirmedNotification;


class NewBookingRequests extends Component
{
    public $showDaily = true;
    public $bookings;

    public function mount()
    {
        $this->fetchBookings();
    }

    public function toggleView()
    {
        $this->showDaily = !$this->showDaily;
        $this->fetchBookings();
    }

    public function fetchBookings()
    {
        $salons = SalonUser::where('user_id', Auth::user()->id)->pluck('salon_id');

        $query = SalonBooking::whereIn('salon_id', $salons)
            ->whereNull('salon_user_id')
            ->orderBy('created_at', 'asc');

        if ($this->showDaily) {
            $query->whereDate('created_at', Carbon::today());
        } else {
            $query->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
        }

        $this->bookings = $query->get();
    }

    public function render()
    {
        $this->fetchBookings();
        return view('livewire.dashboard.new-booking-requests');
    }


    public function confirmBooking($bookingId)
    {
        $booking = SalonBooking::findOrFail($bookingId);
        $booking->update([
            'confirmed_at' => now(),
            'salon_user_id' => SalonUser::where('salon_id', $booking->salon->id)
                ->where('user_id', auth()->user()->id)->first()->id,
        ]);

        // Send email to customer on confirmation
        $this->sendEmailToCustomer($booking, 'Booking_Confirmed');

        noty()->addSuccess('Booking confirmed successfully!');
    }

    // private function getBookingSalonUser($booking_id){
    //     $booking = SalonBooking::find( $booking_id );
    //     $salon_user = SalonUser::where('')
    // }

    public function cancelBooking($bookingId)
    {
        $booking = SalonBooking::findOrFail($bookingId);
        $booking->update([
            'cancelled_at' => now(),
            'salon_user_id' => SalonUser::where('salon_id', $booking->salon->id)->where('user_id', auth()->user()->id)->first()->id,
            'cancel_reason' => 'Cancelled by ' . auth()->user()->name,
            'deleted_at' => now(),
        ]);

        // Send email to customer on cancellation
        $this->sendEmailToCustomer($booking, 'Booking_Cancelled');

        noty()->addSuccess('Booking cancelled successfully!');
    }

    public function completeBooking($bookingId)
    {
        $booking = SalonBooking::findOrFail($bookingId);
        $booking->delete(); // Soft delete the booking

        // Send email to prompt user for feedback
        $this->sendEmailToCustomer($booking, 'FeedbackRequest');

        noty()->addSuccess('Booking completed and soft-deleted successfully!');
    }

    private function sendEmailToCustomer($booking, $subject)
    {
        if (empty($booking->customer_email)) {
            noty()->addError('Customer email not found.');
            return;
        } else {
            if ($subject == 'FeedbackRequest') {
                Mail::to($booking->customer_email)->send(new FeedbackRequestMail($booking));
            }

            if ($subject == 'Booking_Confirmed') {
                Mail::to($booking->customer_email)->send(new ReservationConfirmedNotification($booking));
            }

            if ($subject == 'Booking_Cancelled') {
                Mail::to($booking->customer_email)->send(new ReservationCancelledNotification($booking));
            }
        }
    }
}
