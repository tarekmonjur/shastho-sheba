@component('mail::message')
# Contact Message Info

## Name : {{$name}}
## Eamil : {{$email}}
## Mobile : {{$mobile}}
## City : {{$city}}
## State : {{$state}}
## Address : {{$address}}

# Message

{{$message}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
