
<nav class="nav sidebar">
	<ul class="nav__bar">
		<li class="nav__item">
			<a class="nav__link" href="{{ route('admin.dashboard', ['user_id' => Auth::id() ]) }}">
				Dashboard
			</a>
		</li>
		<li class="nav__item">
			<a class="nav__link" href="{{ route('playgroup.overview') }}">
				Speelgroepen
			</a>
		</li>
		
		<hr>
		
		<li class="nav__item">
			<a class="nav__link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" >
				Afmelden
			</a>
			<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
				{{ csrf_field() }}
			</form>
		</li>
	</ul>
</nav>
