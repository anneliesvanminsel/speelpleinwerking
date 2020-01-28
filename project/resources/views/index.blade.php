@extends('layouts.app')
@section('title')
	Lentekind Vakantiewerking
@endsection
@section('content')
	<main class="l-main">
		<div class="hero">
			<div class="hero__image ctn-image">
				<img src="https://images.pexels.com/photos/1250346/pexels-photo-1250346.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="Sfeerfoto">
			</div>
			<p class="hero__subtitel">
				Onze speelpleinwerking
			</p>
			<p class="hero__description">
				Speelpleinwerking is een unieke jeugdwerkvorm en gedragen door de kracht van jongeren.
				Spelen om te spelen staat altijd voorop! <br>
				In onze speelpleinwerking streven we ernaar dat iedereen kan deelnemen.
			</p>
			<div class="hero__actions">
				<a class="btn for-volunteer" href="">Vrijwilliger</a>
				<a class="btn for-family" href="">Ouder</a>
			</div>
		</div>
		
		@if($playgroups)
			<div class="section" id="playgroups">
				<div class="section__header">
					<h1 class="section__title">
						Onze speelgroepen
					</h1>
					<p class="section__description">
						We verdelen onze kinderen volgens leeftijd in groepen om hen samen met
						leeftijdsgenoten een fijne dag te garanderen.
					</p>
				</div>
				
				<div class="section__content grid">
					@foreach($playgroups as $group)
						<div class="grid__item">
							<div class="grid__image ctn-image">
								<img src="{{asset("/img/playgroup/auto.png")}}" alt="de autootjes">
							</div>
							<div class="grid__content">
								<h4 class="grid__title">
									De autootjes (2,5 tot 3 jaar)
								</h4>
								<div class="grid__text">
									Onze jongste kinderen zitten bij de autootjes. Zij kunnen nog niet heel veel, maar vinden
									het de max als je dingen doet die de zintuigen prikkelt: een blote-voetenpad, kneden met
									klei, waterspelletjes...
									<br>Dit is bij uitstek de meest geliefde groep als je een hele week schattige kinderen
									rondom je wil.
								</div>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		@endif
		
		<div class="contact--wrapper" id="contact">
			<iframe
				src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2517.2431483702967!2d4.7122213158142365!3d50.88220997953733!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c160d33f0a3fa9%3A0xc05030830bac50f6!2sLeuven%20Station!5e0!3m2!1snl!2sbe!4v1580166635270!5m2!1snl!2sbe"
				width="600"
				height="450"
				frameborder="0"
				style="border:0;"
				allowfullscreen=""
			></iframe>
			
			<div class="">
				<h6 class="contact__title">Lentekind Vakantiewerking</h6>
				<p class="contact__text">
					<strong>E-mail</strong> <br>
					speelplein@anneliesvanminsel.be <br>
				</p>
				<p class="contact__text">
					<strong>Adres</strong> <br>
					speelstraat 43, 1000 Speelplein <br>
				</p>
				<p class="contact__text">
					<strong>​Tel</strong> <br>
					0488 11 22 33 (enkel van juni tot en met augustus) <br>
				</p>
			</div>
		</div>
	</main>
@endsection
