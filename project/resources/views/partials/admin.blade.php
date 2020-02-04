
<nav class="nav sidebar">
	@if(Auth::user()->account_id != null)
		@php
			$admin = Auth::user()->account()->first();
		@endphp
	
		<a href="" class="sidebar__heading">
			@if(File::exists(public_path() . "/images/admin/" . $admin['image']))
				<div class="sidebar__image ctn-image">
					<img src="{{ asset('images/admin/' . $admin['image']) }}" alt="">
				</div>
			@endif
			
			<div class="sidebar__title">
				{{$admin['first_name']}} {{$admin['name']}}
			</div>
		</a>
	@endif
	<hr>
	<ul class="nav__bar">
		<li class="nav__item">
			<a class="nav__title {{ (strpos(Route::currentRouteName(), 'admin.dashboard') === 0) ? 'is-active' : '' }}" href="{{ route('admin.dashboard', ['user_id' => Auth::id() ]) }}">
				Dashboard
			</a>
		</li>
		<li class="nav__item">
			<a class="nav__link" href="{{ route('admin.dashboard', ['user_id' => Auth::id() ]) }}">
				Vandaag
			</a>
		</li>
		<li class="nav__item">
			<a class="nav__link" href="{{ route('admin.dashboard', ['user_id' => Auth::id() ]) }}">
				Deze week
			</a>
		</li>
		
		<hr>
		
		<li class="nav__title">
			Zomerzaken
		</li>
		
		
		<li class="nav__item">
			<a class="nav__link {{ (request()->is('admin/monitors*')) ? 'is-active' : '' }}" href="{{ route('monitor.overview') }}">
				Monitoren
			</a>
		</li>
		
		<li class="nav__item">
			<a class="nav__link {{ (request()->is('admin/families*')) ? 'is-active' : '' }}" href="{{ route('family.overview') }}">
				Families
			</a>
		</li>
		<li class="nav__item">
			<a class="nav__link {{ (request()->is('admin/kinderen*')) ? 'is-active' : '' }}" href="{{ route('kid.overview') }}">
				Kinderen
			</a>
		</li>
		
		<hr>
		
		<li class="nav__title">
			Anderen
		</li>
		<li class="nav__item">
			<a class="nav__link {{ (request()->is('admin/werkgroepen*')) ? 'is-active' : '' }}" href="{{ route('playgroup.overview') }}">
				Werkgroepen
			</a>
		</li>
		<li class="nav__item">
			<a class="nav__link {{ (request()->is('admin/speelgroepen*')) ? 'is-active' : '' }}" href="{{ route('playgroup.overview') }}">
				Speelgroepen
			</a>
		</li>
		<li class="nav__item">
			<a class="nav__link {{ (request()->is('admin/activiteiten*')) ? 'is-active' : '' }}" href="{{ route('activity.overview') }}">
				Activiteiten
			</a>
		</li>
		<li class="nav__item">
			<a class="nav__link {{ (request()->is('admin/sponsors*')) ? 'is-active' : '' }}" href="{{ route('sponsor.overview') }}">
				Sponsors
			</a>
		</li>
		<li class="nav__item">
			<a class="nav__link {{ (request()->is('admin/faq*')) ? 'is-active' : '' }}" href="{{ route('faq.overview') }}">
				FAQ
			</a>
		</li>
		
		<hr>
		
		<li class="nav__title">
			Hoofdleiding
		</li>
		
		<li class="nav__item">
			<a class="nav__link" href="{{ route('admin.current-overview') }}">
				Huidige hoofdleiding
			</a>
		</li>
		
		<li class="nav__item">
			<a class="nav__link" href="{{ route('admin.old-overview') }}">
				Oude hoofdleiding
			</a>
		</li>
		
		<hr>
		
		<li class="nav__title">
			Persoonlijk
		</li>
		
		<li class="nav__item">
			<a class="nav__link" href="{{ route('admin.dashboard', ['user_id' => Auth::id() ]) }}">
				Account
			</a>
		</li>
		
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
