@component('mail::message')
# Hello {{ $user->full_name }}

You are receiving this email because we received a password reset request for your account.

Your forgot password verification code is here.

<div style="display: block;width: 100%;text-align: center;padding: 30px 40px 60px 40px;" >
    <span class="button button-primary" style="text-sp: 10">
        @foreach(str_split($user->otp) as $numb)
            <span style="padding: 0 5px">{{$numb}}</span>
        @endforeach
    </span>
</div>

If you did not request a password reset, no further action is required.

<br>

## Thanks,
## {{ config('app.name') }}
@endcomponent
