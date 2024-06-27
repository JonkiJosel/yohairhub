@component('mail::message')
# Booking Cancelled

Hello {{ $booking->customer_name }},

We regret to inform you that your booking at {{ $booking->salon->name }} has been cancelled.

**Cancellation Reason:** {{ $booking->cancel_reason ?? 'Reason not provided' }}

If you have any concerns or wish to reschedule, please contact us.

We apologize for any inconvenience caused.

@component('mail::subcopy')
    This email was automatically generated by the {{ config('app.name', 'YoHairHub') }} Reservation System. Please do not reply to this email.
@endcomponent
@endcomponent
