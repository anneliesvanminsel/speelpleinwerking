@extends('layouts.auth')
@section('title')
    registreren
@endsection

@section('content')
    <div class="page page--auth">
        <div class="page__image">
            <img src="https://images.pexels.com/photos/697244/pexels-photo-697244.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="">
        </div>
        
        <div class="panel">
            <div class="panel__title">
                Account aanmaken
            </div>
            
            <div class="panel__body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    
                    <div class="form__group">
                        <input
                            id="email"
                            type="email"
                            class="for-family form__input @error('email') is-invalid @enderror"
                            name="email"
                            placeholder="bv. jan.peeters@mail.be"
                            value="{{ old('email') }}"
                            required
                            autocomplete="email"
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
                            class="for-family form-control @error('password') is-invalid @enderror"
                            placeholder="Jouw wachtwoord"
                            name="password"
                            required
                            autocomplete="new-password"
                        >
                        <label for="password" class="form__label text-md-right">
                            Wachtwoord
                        </label>
                        
                        
                        @error('password')
                        <span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
                        @enderror
                    </div>
                    
                    <div class="form__group">
                        <input
                            id="password-confirm"
                            type="password"
                            class="for-family form-control"
                            name="password_confirmation"
                            placeholder="Wachtwoord bevestigen"
                            required
                            autocomplete="new-password"
                        >
                        
                        <label for="password-confirm" class="form__label">
                            Wachtwoord bevestigen
                        </label>
                    </div>
    
                    <div class="checkbox__wrapper">
                        <div class="checkbox">
                            <label class="checkbox__label">
                                <input
                                    class="checkbox__input for-volunteer"
                                    type="radio"
                                    name="role"
                                    value="vol"
                                >
                                <div class="checkbox__text">
                                    Ik ben Vrijwilliger
                                </div>
                            </label>
                        </div>
                        <div class="checkbox">
                            <label class="checkbox__label">
                                <input
                                    class="checkbox__input for-family"
                                    type="radio"
                                    name="role"
                                    value="fam"
                                >
                                <div class="checkbox__text">
                                    Ik ben Ouder, Voogd of Verantwoordelijke
                                </div>
                            </label>
                        </div>
                        @if ($errors->has('role'))
                            <div class="form__message is-error">
                                <strong>{{ $errors->first('role') }}</strong>
                            </div>
                        @endif
                    </div>
                    
                    
                    <div class="form__group">
                        <button type="submit" class="btn for-family">
                            Maak een account
                        </button>
                    </div>
                    <br>
                    <a class="link" href="{{ route('login') }}">
                        Al een account? Meld je nu aan.
                    </a>
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
