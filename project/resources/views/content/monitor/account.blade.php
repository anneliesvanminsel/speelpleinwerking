@extends('layouts.moni')
@section('title')
	Mijn account
@endsection

@section('content')
	<div class="section account">
		<div class="grid">
			@if($user['account_id'] === null)
				<div>
					<h1>
						Mijn account
					</h1>
				</div>
				
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
							<li class="list__item">Schrijf je in voor een week (of twee)</li>
						</ol>
					</div>
				</div>
			@else
				@php
					$monitor = $user->account()->first();
				@endphp
				<div class="row">
					<h1 class="account__text grow">
						{{ $monitor['first_name'] }} {{ $monitor['name'] }}
					</h1>
					<a href="{{ route('monitor.edit', ['monitor_id' => $monitor['id']]) }}" class="btn btn--icon for-volunteer is-small">
						@svg('edit')
					</a>
				</div>
				<div class="account__section">
					<div class="account__text">
						{{ $user['email'] }}
					</div>
					<div class="account__text">
						{{ $monitor['phone_nr'] }}
					</div>
					<div class="account__text">
						{{ \Jenssegers\Date\Date::parse(strtotime($monitor['birthday']))->format('j F Y') }}
					</div>
				</div>
				
				<div class="account__section">
					<div class="row">
						<h3 class="grow">
							Adresgegevens
						</h3>
						<a href="{{ route('monitor.editAddress', ['address_id' => $monitor->address()->first()->id ]) }}" class="btn btn--icon for-volunteer is-small">
							@svg('edit')
						</a>
					</div>
					@include('cards.address', ['address' => $monitor->address()->first()])
				</div>
			
				<div class="account__section">
					<h3>
						Extra informatie
					</h3>
					@if($monitor['allergies'])
						<div class="account__text">
							Allergieën: <br>
							{{ $monitor['allergies'] }}
						</div>
					@endif
					@if($monitor['isVeggie'] == 1)
						<div class="account__text">
							Ik ben vegetarisch!
						</div>
					@endif
					@if($monitor['extra_info'])
						<div class="account__text">
							Extra informatie die je gedeeld hebt met ons: <br>
							{{ $monitor['extra_info'] }}
						</div>
					@endif
					
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
					
					<div class="account__section card--container is-column">
						@foreach($monitor->contacts()->get() as $contact)
							@include('cards.contactperson', ['contact' => $contact])
						@endforeach
					</div>
					@if($monitor->weeks()->exists())
						<div class="account__section">
							<div class="row">
								<h2 class="grow">
									Mijn weken
								</h2>
								<a href="{{ route('moni.addWeek', ['moni_id' => $monitor['id']]) }}" class="btn for-volunteer is-small">
									voeg week toe
								</a>
							</div>
							<div class="account__section">
								@foreach($monitor->weeks()->get() as $week)
									<div class="row">
										<div class="grow checkbox__title">
											{{ \Jenssegers\Date\Date::parse(strtotime($week['startdate']))->format('l j F Y') }}
											t.e.m. {{ \Jenssegers\Date\Date::parse(strtotime($week['enddate']))->format('l j F Y') }}
										</div>
										<div>
											<form
												class="form"
												method="POST"
												action="{{ route('monitor.internship', ['monitor_id' => $monitor['id'], 'week_id' => $week['id']]) }}"
											>
												{{ csrf_field() }}
												<button class="" type="submit">
													@if($monitor->weeks()->findOrFail($week['id'], ['week_id'])->pivot->wantsIntern === 1)
														ik wil deze week geen stage doen
													@else
														ik wil deze week stage doen
													@endif
												</button>
											</form>
										</div>
									</div>
									<br>
								@endforeach
							</div>
						</div>
					@else
						<div class="account__section for-volunteer">
							<div class="account__subheading row">
								<h2 class="grow">
									Account voltooien
								</h2>
								<a href="{{ route('moni.addWeek', ['moni_id' => $monitor['id']]) }}" class="btn for-volunteer is-small">
									voeg week toe
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
									<li class="list__item is-completed">Voeg de contactgegevens van een ouder of voogd toe.</li>
									<li class="list__item">Schrijf je in voor een week (of twee)</li>
								</ol>
							</div>
						</div>
					@endif
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
								<li class="list__item">Schrijf je in voor een week (of twee)</li>
							</ol>
						</div>
					</div>
				@endif
			@endif
		</div>
	</div>
@endsection