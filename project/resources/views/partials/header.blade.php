<header class="header is-green">
	<div class="header__logo">
		<a class="header__link" href="{{ route('index') }}">
			Speelpleinwerking
		</a>
	</div>
	
	<nav class="nav">
		<ul class="nav__bar">
			<li class="nav__item">
				<a class="nav__link" href="{{ route('index') }}#playgroups">
					Onze speelgroepen
				</a>
			</li>
			<li class="nav__item">
				<a class="nav__link" href="{{ route('index') }}#contact">
					Contact
				</a>
			</li>
			
			@if (Auth::user())
				<li class="nav__item">
					<a class="nav__link" href="{{ route('account', ['id' => Auth::user()->id]) }}">Account</a>
				</li>
				<li class="nav__item">
					<a class="nav__link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" >
						Afmelden
					</a>
					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						{{ csrf_field() }}
					</form>
				</li>
			@else
				<li class="nav__item">
					<a class="nav__link" href="{{ route('login') }}">Aanmelden</a>
				</li>
			@endif
		</ul>
	</nav>
	<button class="button ctn-icon menu-icon">
		<svg class="nav-icon" viewBox="0 0 56 56">
			<path d="M28 0C12.561 0 0 12.561 0 28s12.561 28 28 28 28-12.561 28-28S43.439 0 28 0zm0 54C13.663 54 2 42.336 2 28S13.663 2 28 2s26 11.664 26 26-11.663 26-26 26z"/><path d="M40 16H16a1 1 0 1 0 0 2h24a1 1 0 1 0 0-2zM40 27H16a1 1 0 1 0 0 2h24a1 1 0 1 0 0-2zM40 38H16a1 1 0 1 0 0 2h24a1 1 0 1 0 0-2z"/>
		</svg>
	</button>
</header>
<script src="{{ asset('js/header.js') }}" > </script>
