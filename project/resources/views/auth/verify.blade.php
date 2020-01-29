@extends('layouts.app')

@section('content')
    <div class="page page--auth">
        <div class="page__image">
            <img src="https://images.pexels.com/photos/1187086/pexels-photo-1187086.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="">
        </div>
        
        <div class="panel">
            <div class="panel__title">
                {{ __('Verify Your Email Address') }}
            </div>
            
            <div class="panel__body">
                @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        Een nieuwe link is verzonden naar jouw mailadres.
                        {{# __('A fresh verification link has been sent to your email address.') #}}
                    </div>
                @endif
                
                Voor je verder gaat, kijk even in je mailbox.
                    Als je geen mail hebt ontvangen,
                {{# __('Before proceeding, please check your email for a verification link.') #}}
                {{# __('If you did not receive the email') #}},
                <a href="{{ route('verification.resend') }}">
                    klik hier om een nieuwe te versturen.
                    {{# __('click here to request another') #}}
                </a>.
            </div>
        </div>
    </div>
</div>
@endsection
