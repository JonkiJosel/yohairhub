@component('mail::message')
# Image Deleted Notification

Hello {{ $salon->owner->user->name }},

We regret to inform you that an image has been deleted from your salon's gallery. Below are the details:

- **Salon Name:** {{ $salon->name }}
- **Salon Address:** {{ $salon->address }}
- **Hairstyle:** {{ $image->salonHairStyle->hairStyle->name }}
- **Uploaded DateTime:** {{ Carbon\Carbon::parse($image->created_at)->format('d-m-Y H:i:s') }}

@component('mail::button', ['url' => asset('storage/' . $image->image_path), 'color' => 'blue'])
Download Deleted Image
@endcomponent

If you have any questions or concerns, please contact us immediately.

Thank you,
{{ config('app.name') }}
@endcomponent
