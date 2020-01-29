@extends('layouts.auth')
@section('title')
    Wachtwoord herstellen
@endsection
@section('content')
    <div class="page page--auth">
        <div class="page__image">
            <img src="https://images.pexels.com/photos/1187086/pexels-photo-1187086.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="">
        </div>
        
        <div class="panel">
            <div class="breadcrumb">
                <a href="{{ route('index') }}" class="breadcrumb__link">
                    @svg('back') Terug
                </a>
            </div>
            
            <div class="panel__title">
                Wachtwoord herstellen
            </div>
            
            <div class="panel__body">
                
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="form__group">
                        <input
                            id="email"
                            type="email"
                            class="form__input for-family @error('email') is-invalid @enderror"
                            name="email"
                            placeholder="jan.peeters@gmail.com"
                            value="{{ old('email') }}"
                            required
                            autocomplete="email"
                            autofocus
                        >
                        <label for="email" class="form__label">
                            Mailadres
                        </label>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form__actions">
                        <button type="submit" class="btn for-family">
                            Stuur mij de link om mijn wachtwoord te herstellen
                        </button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</div>
@endsection
