@component('mail::message')
# Order Notification

New order place.Please check your panel.

@component('mail::button', ['url' => $url])
Access Panel
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
