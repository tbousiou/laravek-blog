@component('mail::message')
# Welcome Again

Thanks so much for registering


@component('mail::button', ['url' => ''])

Start Browsing

@endcomponent

@component('mail::panel', ['url' => ''])

As above so below

@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
