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
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form__group row">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                        <label for="email" class="form__label">
                            Mailadres
                        </label>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form__group row">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        <label for="password" class="form__label">Wachtwoord</label>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        <label for="password-confirm" class="form__label">
                            Wachtwoord bevestigen
                        </label>
                    </div>

                    <div class="form__actions">
                        <button type="submit" class="btn for-family">
                            Verander mijn wachtwoord
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
