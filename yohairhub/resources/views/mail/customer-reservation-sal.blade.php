@component('mail::message')
# New Reservation Notification

Hello,

A new reservation has been made at {{ $reservation->salon->name }}.

**Reservation Details:**
- Customer Name: {{ $reservation->customer_name }}
- Reservation Date: {{ $reservation->reservation_date }}
- Reservation Time: {{ $reservation->reservation_time ?? 'Not specified' }}
- Hairstyle: {{ optional($reservation->hairstyle)->hairstyle->name ?? 'Not specified' }}
- Service: {{ optional($reservation->service)->name ?? 'Not specified' }}

Please follow up with the customer to confirm their appointment.

Thank you!

Sincerely,
The {{ config('app.name', 'YoHairHub') }} Reservation System

@component('mail::subcopy')
    This email was automatically generated by the {{ config('app.name', 'YoHairHub') }} Reservation System. Please do not reply to this email.
@endcomponent
@endcomponent