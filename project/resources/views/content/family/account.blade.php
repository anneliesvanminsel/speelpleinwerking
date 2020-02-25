@extends('layouts.app')
@section('title')
	Mijn account
@endsection

@section('content')
	<div class="section account">
		<div>
			<h1>
				Mijn account
			</h1>
		</div>
		
		<div class="grid">
			@if($user['account_id'] === null)
				<div class="account__section for-family">
					<div class="account__subheading row">
						<h2 class="account__title grow">
							Account voltooien
						</h2>
						<a class="btn for-family is-small row has-icon" href="{{ route('family.createAddress') }}">
							@svg('plus', 'is-white')
							Voeg jouw adresgegevens toe.
						</a>
					</div>
					<div class="account__text">
						Voor je gebruik kan maken van dit platform, vragen wij om een aantal gegevens met ons te delen.
					</div>
					<div class="account__text">
						<ol class="list for-family">
							<li class="list__item">Voeg adresgegevens toe.</li>
							<li class="list__item">Voeg de contactgegevens van een ouder of voogd toe.</li>
							<li class="list__item">Schrijf een kind in.</li>
						</ol>
					</div>
				</div>
			@else
				@php
					$family = $user->account()->first();
				@endphp
				<div class="account__section">
					<h2 class="account__text">
						Account gegevens
					</h2>
					<div class="account__text">
						{{ $user['email'] }}
					</div>
				</div>
			
				<div class="account__section">
					<div class="row">
						<h3 class="grow">
							Adresgegevens
						</h3>
						<a href="{{ route('family.editAddress', ['address_id' => $family->address()->first()->id ]) }}" class="btn btn--icon for-volunteer is-small">
							@svg('edit')
						</a>
					</div>
					@include('cards.address', ['address' => $family->address()->first()])
				</div>
				
				@if($family->guardians()->exists())
					<div  class="account__section row">
						<h2 class="grow">
							Ouders, voogden of begeleiders
						</h2>
						<a class="btn for-family is-small row has-icon" href="{{ route('guardian.create', ['family_id' => $family['id']]) }}">
							@svg('plus', 'is-white')
							Voeg een voogd of ouder toe.
						</a>
					</div>
				
				
					<div class="account__section card--container">
						@foreach($family->guardians()->get() as $guardian)
							@include('cards.guardian', ['guardian' => $guardian])
						@endforeach
					</div>
					
					@if($family->kids()->exists())
						<div class="account__section row">
							<h2 class="grow">
								Kinderen
							</h2>
							@if(App\Kid::with("days")->has('days')->count() < config('global.max_kids'))
								<a class="btn for-family is-small row has-icon" href="{{ route('kid.create', ['family_id' => $family['id']]) }}">
									@svg('plus', 'is-white')
									Schrijf een kind in
								</a>
							@endif
						</div>
						<div class="account__section for-family">
							<div class="account__subheading row">
								<h3 class="account__title grow">
									Hoe kan je jouw kind inschrijven voor de zomer?
								</h3>
							</div>
							<div class="account__text">
								Om jouw kinderen in te schrijven voor verschillende dagen klik je hieronder op @svg('calendar (3)').
								<br>
								Dit geeft jou een overzicht naar alle zomerdagen waarop jouw kind naar onze speelpleinwerking kan komen.
							</div>
						</div>
						<div class="account__section card--container">
							@foreach($family->kids()->get() as $kid)
								@include('cards.kid', ['kid' => $kid])
							@endforeach
						</div>
					
					@else
						<div class="account__section for-family">
							<div class="account__subheading row">
								<h2 class="account__title grow">
									Account voltooien
								</h2>
								<a class="btn for-family is-small row has-icon" href="{{ route('kid.create', ['family_id' => $family['id']]) }}">
									@svg('plus', 'is-white')
									Schrijf een kind in
								</a>
							</div>
							<div class="account__text">
								Voor je gebruik kan maken van dit platform, vragen wij om een aantal gegevens met ons te delen.
							</div>
							<div class="account__text">
								<ol class="list for-family">
									<li class="list__item is-completed">Voeg adresgegevens toe.</li>
									<li class="list__item is-completed">Voeg de contactgegevens van een ouder of voogd toe.</li>
									<li class="list__item">Schrijf een kind in.</li>
								</ol>
							</div>
						</div>
					@endif
				@else
					<div class="account__section for-family">
						<div class="account__subheading row">
							<h2 class="grow">
								Account voltooien
							</h2>
							<a class="btn for-family is-small row has-icon" href="{{ route('guardian.create', ['family_id' => $family['id']]) }}">
								@svg('plus', 'is-white')
								Voeg een voogd of ouder toe.
							</a>
						</div>
						<div class="account__text">
							Voor je gebruik kan maken van dit platform, vragen wij om een aantal gegevens met ons te delen.
						</div>
						<div class="account__text">
							<ol class="list for-family">
								<li class="list__item is-completed">Voeg adresgegevens toe.</li>
								<li class="list__item">Voeg de contactgegevens van een ouder of voogd toe.</li>
								<li class="list__item">Schrijf een kind in.</li>
							</ol>
						</div>
					</div>
				@endif
				
			@endif
		</div>
	</div>
@endsection