@component('mail::message')
# Test Mail

Hello,

This is a test mail with parameter: {{ $param }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
