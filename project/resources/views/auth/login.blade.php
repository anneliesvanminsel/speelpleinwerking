@extends('layouts.app')
@section('title')
    aanmelden
@endsection

@section('content')
    <div class="page page--auth">
        <div class="page__image">
            <img src="https://images.pexels.com/photos/1187086/pexels-photo-1187086.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="">
        </div>
        
        <a class="logo logo--link" href="#">
            Spleelpleinwerking
        </a>
        
        <div class="panel">
            
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
                            class="form__input @error('email') is-invalid @enderror"
                            name="email"
                            placeholder="bv. jan.peeters@mail.be"
                            value="{{ old('email') }}"
                            required
                            autocomplete="email"
                            autofocus
                        >
                        <label for="email" class="form__label">
                            e-mailadres
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
                            class="form__input @error('password') is-invalid @enderror"
                            name="password"
                            placeholder="Jouw wachtwoord"
                            required
                            autocomplete="current-password"
                        >
                        <label for="password" class="form__label">
                            wachtwoord
                        </label>
                        
                        @error('password')
                        <span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
							</span>
                        @enderror
                    
                    </div>
                    
                    <div class="">
                        <div class="">
                            <div class="">
                                <input
                                    class="form-check-input"
                                    type="checkbox"
                                    name="remember"
                                    id="remember"
                                    {{ old('remember') ? 'checked' : '' }}
                                >
                                
                                <label class="" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="">
                        <button type="submit" class="btn btn--full">
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
