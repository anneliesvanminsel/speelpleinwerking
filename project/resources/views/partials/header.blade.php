<header class="header for-family">
	<div class="header__content">
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
		<div class="ctn-icon menu-icon">
			<span></span>
			<span></span>
			<span></span>
		</div>
	</div>
</header>
<script src="{{ asset('js/header.js') }}" > </script>
