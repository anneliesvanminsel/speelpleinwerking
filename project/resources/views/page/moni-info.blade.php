@extends('layouts.moni')
@section('title')
	Speelplein voor monitoren
@endsection
@section('content')
	<main>
		<div class="row section">
			<h1 class="grow">
				Monitor worden
			</h1>
			<a class="btn is-small for-volunteer" href="{{ route('register') }}">
				Maak snel een account aan!
			</a>
		</div>
		
		<article class="article">
			<h2 class="article__title">
				Toelatingsvoorwaarden
			</h2>
			<div class="article__content row">
				<div>
					Je kan als animator bij Speelpleinwerking aan de slag vanaf het jaar dat je 16 wordt. Je hoeft geen
					animatorcursus gevolgd te hebben, maar dit wordt wel sterk aanbevolen. Enige vorm van ervaring in
					omgang met kinderen (babysit, scouts, chiro, jeugdhuis…) is ook aangewezen.
				</div>
				<div class="ctn-image is-small is-left">
					<img src="https://images.pexels.com/photos/939702/pexels-photo-939702.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="">
				</div>
			</div>
		</article>
		
		<article class="article">
			<h2 class="article__title">
				Takenpakket
			</h2>
			<ul class="list for-volunteer">
				<li class="list__item">
					met kinderen omgaan op een stimulerende en spontane manier, met oog voor het individuele kind
				</li>
				<li class="list__item">
					kinderen begeleiden bij spel-, knutselactiviteiten en eetmomenten
				</li>
				<li class="list__item">
					onthaal kinderen en ouders op het speelplein
				</li>
			</ul>
		</article>
		
		<div class="ctn-image is-large">
			<img src="https://images.pexels.com/photos/1231365/pexels-photo-1231365.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500" alt="de huidige hoofdleiding">
		</div>
		
		<article class="article">
			<h2 class="article__title">
				Praktische informatie
			</h2>
			<div class="row has-two">
				<div class="grow">
					<h3 class="article__subtitle">
						Aankomen
					</h3>
					<p>
						Zondagavond om 18u
					</p>
				</div>
				<div class="grow">
					<h3 class="article__subtitle">
						Vertrekken
					</h3>
					<p>
						Zaterdag om 13u
					</p>
				</div>
			</div>
			<div class="row has-two">
				<div class="grow">
					<h3 class="article__subtitle">
						Wat breng je mee?
					</h3>
					<ul class="list for-volunteer">
						<li class="list__item">
							hoofdkussen, hoeslaken en slaapzak
						</li>
						<li class="list__item">
							eigen mediactie
						</li>
						<li class="list__item">
							kleren die tegen een stootje kunnen
							<p>
								<i class="accent">
									Voorzie genoeg want ze kunnen vuil en/of bezweet worden na een hele dag spelen
								</i>
							</p>
						</li>
						<li class="list__item">
							zwemgerief
						</li>
						<li class="list__item">
							handdoekken
						</li>
						<li class="list__item">
							brooddoos
						</li>
						<li class="list__item">
							rugzak
						</li>
						<li class="list__item">
							toiletgerief
						</li>
						<li class="list__item">
							regenkledij
						</li>
					</ul>
				</div>
				<div class="grow">
					<h3 class="article__subtitle">
						Wat laat je thuis?
					</h3>
					<ul class="list for-volunteer">
						<li class="list__item">
							Kostbare voorwerpen
						</li>
						<li class="list__item">
							drank en drugs
						</li>
					</ul>
				</div>
			</div>
		</article>
		
		<div class="ctn-image is-large">
			<img src="https://images.pexels.com/photos/3621227/pexels-photo-3621227.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="de huidige hoofdleiding">
		</div>
		
		<article class="article">
			<h2 class="article__title">
				Veelgestelde vragen
			</h2>
			
			<div class="faq">
				@foreach($faqs as $faq)
					<div class="faq__item" id="faq-{{$loop->iteration}}">
						<button class="faq__question" data-target="faq-{{$loop->iteration}}">
							<div class="faq__title">
								{{ $faq['question'] }}
							</div>
							@svg('back', 'faq__icon')
						</button>
						<div class="faq__answer">
							{{ $faq['answer'] }}
						</div>
					</div>
				@endforeach
			</div>
		</article>
		<script src="{{ asset('js/faq.js') }}" > </script>
	</main>
@endsection
