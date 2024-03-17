@component('mail::message')
# Hello {{ $user->full_name }}

Welcome to the {{ config('app.name') }}<br>
Your account verification code is here

<div style="display: block;width: 100%;text-align: center;padding: 30px 40px 60px 40px;" >
    <span class="button button-primary" style="text-sp: 10">
        @foreach(str_split($user->otp) as $numb)
            <span style="padding: 0 5px">{{$numb}}</span>
        @endforeach
    </span>
</div>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
