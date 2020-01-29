@extends('layouts.auth')
@section('title')
    aanmelden
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
                Aanmelden
            </div>
            
            <div class="panel__body">
                <form method="POST" action="{{ route('login') }}" class="form">
                    @csrf
                    
                    <div class="form__group">
                        <input
                            id="email"
                            type="email"
                            class="form__input for-family @error('email') is-invalid @enderror"
                            name="email"
                            placeholder="bv. jan.peeters@mail.be"
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
                    
                    <div class="form__group">
                        
                        
                        <input
                            id="password"
                            type="password"
                            class="form__input for-family @error('password') is-invalid @enderror"
                            name="password"
                            placeholder="Jouw wachtwoord"
                            required
                            autocomplete="current-password"
                        >
                        <label for="password" class="form__label">
                            Wachtwoord
                        </label>
                        
                        @error('password')
                            <span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
							</span>
                        @enderror
                    </div>
                    
                    <div class="form__actions">
                        <button type="submit" class="btn for-family">
                            aanmelden
                        </button>
                        
                        @if (Route::has('password.request'))
                            <a class="link" href="{{ route('password.request') }}">
                                Wachtwoord vergeten?
                            </a> <br> <br>
                        @endif
                        <a class="link" href="{{ route('register') }}">
                            Nog geen account? Maak er snel één aan.
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{--<script> TODO: fix this
		$(document).ready(function(){
			$('#checkbox').on('change', function(){
				$('#password').attr('type',$('#checkbox').prop('checked')==true?"text":"password");
			});
		});
	</script>
	<input type="password" id="password">
	<input type="checkbox" id="checkbox">Show Password--}}
@endsection
