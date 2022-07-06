@component('mail::message')

<img src="{{$file->getRealPath()}}" alt="">
Welcome to finance hub and enjoy our services.

@component('mail::button', ['url' => ''])
Go and Check your profile 
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
