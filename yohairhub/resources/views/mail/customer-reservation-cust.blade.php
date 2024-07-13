@component('mail::message')
# Reservation Notification

Dear {{ $reservation->customer_name }},

Thank you for making a reservation at {{ $reservation->salon->name }}.

### Your Reservation Details:
- Reservation Date: {{ $reservation->reservation_date }}
- Reservation Time: {{ $reservation->reservation_time ?? 'Not specified' }}
- Hairstyle: {{ optional($reservation->hairstyle->hairstyle)->name ?? 'Not specified' }}
- Service: {{ optional($reservation->service)->name ?? 'Not specified' }}

We have received your request and one of our hairdressers will be in touch shortly to confirm your reservation details.

Thank you!

Sincerely,<br>
The {{ $reservation->salon->name }} Team

@component('mail::subcopy')
    This email was automatically generated by the {{ config('app.name', 'YoHairHub') }} Reservation System. Please do not reply to this email.
@endcomponent
@endcomponent