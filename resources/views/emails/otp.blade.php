@component('mail::message')
<div>
    <h2 style="text-align: center;">OTP Verification</h2>
    <p>Dear User,</p>
    <p style="margin: 0;padding:0;">Please note your One-Time Password (OTP) for application login:</p>
    <p style="margin: 0;padding:0;"> OTP : <b>{{ $otp }}</b></p>
    <p style="margin: 0;padding:0;">This OTP is valid for 5 minutes, it will expire at <b> {{$expireTime}}. </b> </p>
    <p>Application url: @if (app()->environment('uat') || app()->environment('local'))
        <a href="https://wsautomations-uat.piramal.com/login">https://wsautomations-uat.piramal.com/login</a>
        @else
        <a href="https://wsautomations.piramal.com/login">https://wsautomations.piramal.com/login</a>
        @endif
    </p>
    <br>
    <p style="margin: 0;padding:0;">Regards,</p>
    <p>IT Automation Team.</p>
</div>
@endcomponent