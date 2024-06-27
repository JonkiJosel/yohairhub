<?php

namespace App\Livewire\Salon;

use App\Mail\FeedbackRequestMail;
use App\Mail\ReservationCancelledNotification;
use App\Mail\ReservationConfirmedNotification;
use App\Models\Salon;
use App\Models\SalonBooking;
use App\Models\SalonUser;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class BookinsManagerView extends Component
{
    use WithPagination;

    public $salon;
    public $search = '';
    #[Url()]
    public $startDate = '';
    #[Url()]
    public $endDate = '';
    public $sortBy = 'reservation_date'; // Default sorting
    public $sortDirection = 'asc'; // Default direction
    public $includeSoftDeleted = false;

    protected $queryString = ['search', 'startDate', 'endDate']; // Ensure query parameters are maintained in URL

    public function mount($salon)
    {
        $this->salon = Salon::find($salon);
        $this->startDate = now()->startOfMonth()->format('Y-m-d'); // Default to today's date
        $this->endDate = now()->format('Y-m-d'); // Default to today's date
    }

    // public function render()
    // {
    //     $bookings = SalonBooking::where('salon_id', $this->salon->id)
    //         ->when($this->search, function ($query) {
    //             $query->where('customer_name', 'like', '%' . $this->search . '%')
    //                 ->orWhere('customer_email', 'like', '%' . $this->search . '%')
    //                 ->orWhere('customer_phone', 'like', '%' . $this->search . '%');
    //         })
    //         ->when($this->startDate && $this->endDate, function ($query) {
    //             $query->whereBetween('reservation_date', [$this->startDate, $this->endDate]);
    //         })
    //         ->orderBy($this->sortBy, $this->sortDirection)
    //         ->paginate(10); // Paginate to limit the number of items per page

    //     return view('livewire.salon.bookins-manager-view', [
    //         'bookings' => $bookings
    //     ]);
    // }
    public function render()
    {
        $query = SalonBooking::where('salon_id', $this->salon->id)
            ->when($this->search, function ($query) {
                $query->where(function ($subquery) {
                    $subquery->where('customer_name', 'like', '%' . $this->search . '%')
                        ->orWhere('customer_email', 'like', '%' . $this->search . '%')
                        ->orWhere('customer_phone', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->startDate && $this->endDate, function ($query) {
                $query->whereBetween('reservation_date', [$this->startDate, $this->endDate]);
            });

        // Apply soft-deleted condition if necessary
        if (!$this->includeSoftDeleted) {
            $query->withTrashed();
        }

        $bookings = $query->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(10); // Paginate to limit the number of items per page

        return view('livewire.salon.bookins-manager-view', [
            'bookings' => $bookings
        ]);
    }


    public function toggleIncludeSoftDeleted()
    {
        $this->includeSoftDeleted = !$this->includeSoftDeleted;
    }

    public function sortBy($field)
    {
        if ($this->sortBy === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function clearFilters()
    {
        $this->reset(['sortBy', 'sortDirection', 'search', 'startDate', 'endDate']);
    }

    public function confirmBooking($bookingId)
    {
        $booking = SalonBooking::findOrFail($bookingId);
        $booking->update([
            'confirmed_at' => now(),
            'salon_user_id' => SalonUser::where('salon_id', $this->salon->id)
                ->where('user_id', auth()->user()->id)->first()->id,
        ]);

        // Send email to customer on confirmation
        $this->sendEmailToCustomer($booking, 'Booking_Confirmed');

        noty()->addSuccess('Booking confirmed successfully!');
    }

    public function cancelBooking($bookingId)
    {
        $booking = SalonBooking::findOrFail($bookingId);
        $booking->update([
            'cancelled_at' => now(),
            'salon_user_id' => SalonUser::where('salon_id', $this->salon->id)->where('user_id', auth()->user()->id)->first()->id,
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
