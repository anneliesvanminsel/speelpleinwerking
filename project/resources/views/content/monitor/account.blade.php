@extends('layouts.moni')
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
				<div class="account__section for-volunteer">
					<div class="account__subheading row">
						<h2 class="account__title grow">
							Account voltooien
						</h2>
						<a class="btn for-volunteer is-small row has-icon" href="{{ route('monitor.create', ['user_id' => $user['id']]) }}">
							@svg('plus', 'is-white')
							Voeg jouw gegevens toe.
						</a>
					</div>
					<div class="account__text">
						Voor je gebruik kan maken van dit platform, vragen wij om een aantal gegevens met ons te delen.
					</div>
					<div class="account__text">
						<ol class="list for-volunteer">
							<li class="list__item">Voeg jouw gegevens toe.</li>
							<li class="list__item">Voeg de contactgegevens van een ouder of voogd toe.</li>
						</ol>
					</div>
				</div>
			@else
				@php
					$monitor = $user->account()->first();
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
					<h3 class="account__text is-bold">
						Adresgegevens
					</h3>
					@include('cards.address', ['address' => $monitor->address()->first()])
				</div>
				
				@if($monitor->contacts()->exists())
					<div  class="account__section row">
						<h2 class="grow">
							Ouders of voogden
						</h2>
						<a class="btn for-volunteer is-small row has-icon" href="{{ route('contact.create', ['moni_id' => $monitor['id']]) }}">
							@svg('plus', 'is-white')
							Voeg een voogd of ouder toe.
						</a>
					</div>
					
					<div class="account__section card--container">
						@foreach($monitor->contacts()->get() as $contact)
							@include('cards.contactperson', ['contact' => $contact])
						@endforeach
					</div>
					
					<div>
						<a href="{{ route('moni.addWeek', ['moni_id' => $monitor['id']]) }}">
							voeg week toe
						</a>
					</div>
				@else
					<div class="account__section for-volunteer">
						<div class="account__subheading row">
							<h2 class="grow">
								Account voltooien
							</h2>
							<a class="btn for-volunteer is-small row has-icon" href="{{ route('contact.create', ['moni_id' => $monitor['id']]) }}">
								@svg('plus', 'is-white')
								Voeg een voogd of ouder toe.
							</a>
						</div>
						<div class="account__text">
							Voor je gebruik kan maken van dit platform, vragen wij om een aantal gegevens met ons te delen.
							<br>
							Deze contactgegevens worden gebruikt in geval van nood.
						</div>
						<div class="account__text">
							<ol class="list for-volunteer">
								<li class="list__item is-completed">Voeg jouw gegevens toe.</li>
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