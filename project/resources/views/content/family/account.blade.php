@extends('layouts.app')
@section('title')
	Mijn account
@endsection

@section('content')
	<div class="section">
		<div class="row">
			<h1>
				Mijn account
			</h1>
		</div>
		
		<div class="grid">
			@if($user['account_id'] === null)
				<div class="account__section is-green">
					<div class="account__subheading">
						<div class="account__text">
							Account voltooien
						</div>
						<a class="btn for-family" href="{{ route('family.createAddress') }}">
							@svg('plus', 'is-white')
							Voeg jouw adresgegevens toe.
						</a>
					</div>
					<div class="account__text">
						Voor je gebruik kan maken van dit platform, vragen wij om een aantal gegevens met ons te delen.
					</div>
					<div class="account__text">
						<ol class="list">
							<li class="list__item">Voeg adresgegevens toe.</li>
							<li class="list__item">Voeg de contactgegevens van een ouder, voogd of begeleider toe.</li>
							<li class="list__item">Schrijf een kind in.</li>
						</ol>
					</div>
				</div>
			@else
				@php
					$family = $user->account()->first();
				@endphp
				<div class="account__content">
					<div class="account__section is-green">
						<div class="account__subheading">
							<h5 class="account__text">
								Account gegevens
							</h5>
						</div>
						<div class="account__text">
							{{ $family['email'] }}
						</div>
					</div>
				</div>
				
				
				<div class="account__text is-left">
					<div class="account__text is-bold">
						Adresgegevens
					</div>
					@include('cards.address', ['address' => $family->address()->first()])
				</div>
				
				@if($family->guardians()->exists())
					<div>
						<h2>
							Ouders, voogden of begeleiders
						</h2>
						<a class="btn for-family" href="{{ route('guardian.create', ['family_id' => $family['id']]) }}">
							@svg('plus', 'is-white')
							Voeg een voogd, ouder of begeleider toe.
						</a>
					</div>
					@foreach($family->guardians()->get() as $guardian)
						@include('cards.guardian', ['guardian' => $guardian])
					@endforeach
					
					@if($family->kids()->exists())
						<div>
							<h2>
								Kinderen
							</h2>
							<a class="btn for-family" href="{{ route('kid.create', ['family_id' => $family['id']]) }}">
								@svg('plus', 'is-white')
								Schrijf een kind in
							</a>
						</div>
						@foreach($family->kids()->get() as $kid)
							@include('cards.kid', ['kid' => $kid])
						@endforeach
					@else
						<div class="account__section is-green">
							<div class="account__subheading">
								<div class="account__text">
									Account voltooien
								</div>
								<a class="btn for-family" href="{{ route('kid.create', ['family_id' => $family['id']]) }}">
									@svg('plus', 'is-white')
									Schrijf een kind in
								</a>
							</div>
							<div class="account__text">
								Voor je gebruik kan maken van dit platform, vragen wij om een aantal gegevens met ons te delen.
							</div>
							<div class="account__text">
								<ol class="list">
									<li class="list__item is-completed">Voeg adresgegevens toe.</li>
									<li class="list__item is-completed">Voeg de contactgegevens van een ouder, voogd of begeleider toe.</li>
									<li class="list__item">Schrijf een kind in.</li>
								</ol>
							</div>
						</div>
					@endif
				@else
					<div class="account__section is-green">
						<div class="account__subheading">
							<div class="account__text">
								Account voltooien
							</div>
							<a class="btn for-family" href="{{ route('guardian.create', ['family_id' => $family['id']]) }}">
								@svg('plus', 'is-white')
								Voeg een voogd, ouder of begeleider toe.
							</a>
						</div>
						<div class="account__text">
							Voor je gebruik kan maken van dit platform, vragen wij om een aantal gegevens met ons te delen.
						</div>
						<div class="account__text">
							<ol class="list">
								<li class="list__item is-completed">Voeg adresgegevens toe.</li>
								<li class="list__item">Voeg de contactgegevens van een ouder, voogd of begeleider toe.</li>
								<li class="list__item">Schrijf een kind in.</li>
							</ol>
						</div>
					</div>
				@endif
				
			@endif
		</div>
	</div>
@endsection