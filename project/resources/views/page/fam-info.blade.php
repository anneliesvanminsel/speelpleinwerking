@extends('layouts.app')
@section('title')
	Speelplein - voor ouders
@endsection
@section('content')
	<main class="l-main section">
		<div class="h-row has-distance-y-l">
			<h1 class="section__header">
				Praktische informatie
			</h1>
			<a class="button is-green h-row" href="{{ route('register') }}">
				<i class="fas fa-user-plus"></i>
				Maak snel een account aan!
			</a>
		</div>
		
		<article id="info" class="article">
			<div class="article__content">
				<div class="h-row has-distance-bottom-l">
					<div class="ctn-image is-medium is-left">
						<img src="https://images.pexels.com/photos/296301/pexels-photo-296301.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="">
					</div>
					<div>
						<h5 class="article__subtitle">Kids brengen:</h5>
						<p class="article__text"> Vanaf 08u30 tot 09u15.</p>
						
						<h5 class="article__subtitle">Kids ophalen:</h5>
						<p class="article__text"> Vanaf 16u30 tot 17u00.</p>
						
						<p class="article__text">
							Er wordt enkel van deze planning afgeweken in overleg met de hoofdleiding.
						</p>
					
					</div>
				</div>
				
				<h5 class="article__subtitle">Meebrengen?</h5>
				
				<p class="article__text">
					Wij zorgen voor 11-uurtjes (sapje) en 16-uurtjes (koek of stuk fruit) en een beker soep voor bij het middagmaal. We voorzien ook heel regelmatig water- en plaspauzes.
				</p>
				<p class="article__text">
					Onderstaande dingen brengen de kinderen zelf mee naar het speelplein:
				</p>
				<ul class="u-list">
					<li class="u-list__item">
						Lunchpakket
					
					</li>
					<li class="u-list__item">
						Regenjas
					</li>
					<li class="u-list__item">
						Eventueel reservekleren
					
					</li>
					<li class="u-list__item">
						Bij heel mooi weer: zwemkleren
					</li>
				
				</ul>
				<p class="article__text">
					Bij bijzonderheden (zwemkledij, regenjasjes, kleren die vuil mogen worden) proberen we dit tijdig te melden.
				</p>
				<h5 class="article__subtitle">Wat laat je thuis?</h5>
				<ul class="u-list">
					<li class="u-list__item">
						Snoep (een koekje voor bij het eten mag, verder zorgen wij voor alles)
					</li>
					<li class="u-list__item">
						GSM, Smartphones, tablets en andere kostbare voorwerpen (als deze stuk of verloren gaan is dit
						niet onze verantwoordelijkheid).
					</li>
				</ul>
			</div>
			<div class="ctn-image is-large is-center has-distance-y-l">
				<img src="https://images.pexels.com/photos/754769/pexels-photo-754769.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="">
			</div>
		</article>
		
		<article id="faq" class="article">
			<h2 class="article__title">Veelgestelde vragen</h2>
			
			<div class="article__content">
				<div class="faq">
					
					<div class="faq__item" id="faq-5">
						<button class="faq__question" data-target="faq-5">
							<div class="faq__title">
								Opgelet: Wat moet je doen als je kind niet kan komen?
							</div>
							<i class="fas fa-chevron-down"></i>
						</button>
						<div class="faq__answer">
							<p>
								Bij afwezigheid moet je ons dit zo snel mogelijk melden. Liefst telefonisch via 0486 79 69 90.
							</p>
							<br>
							<p>
								<strong>
									Als je kinderen vijf dagen afwezig zijn zonder een verwittiging, <br>
									mogen jouw kinderen de volgende dagen niet meer komen.
								</strong>
							</p>
							<br>
							<p>
								Lees hieronder hoe je jouw kinderen kunt uitschrijven voor bepaalde dagen.
							</p>
						</div>
					</div>
					
					<div class="faq__item" id="faq-1">
						<button class="faq__question" data-target="faq-1">
							<div class="faq__title">
								Ik had mijn kinderen ingeschreven voor een bepaalde dag, maar zij zullen toch niet aanwezig zijn.
								Wat moet ik doen?
							</div>
							<i class="fas fa-chevron-down"></i>
						</button>
						<div class="faq__answer">
							Je laat ons dit best zo snel mogelijk weten. Er zijn verschillende opties: <br>
							<ul class="u-list">
								<li class="u-list__item">
									<strong>Ten laatste 's avonds voor 16u</strong> kan je je kinderen inschrijven en uitschrijven voor de dag erna.
								</li>
								<li class="u-list__item">
									Als je je kind uitschrijft voor de volgende dag en het is <strong>na 16u</strong> moet dit <strong>telefonisch</strong> gebeuren.
								</li>
								<li class="u-list__item">
									Indien je kinderen volgende week of later niet aanwezig zullen zijn, kan je dit aanpassen via jouw account.
								</li>
							</ul>
							<div class="accent has-distance-top-l">Het telefoonnummer waarop je ons tijdens de zomer kunt bereiken: 0486 79 69 90</div>
						</div>
					</div>
					
					<div class="faq__item" id="faq-2">
						<button class="faq__question" data-target="faq-2">
							<div class="faq__title">
								Hoeveel moet ik betalen en hoe wordt deze betaling geregeld?
							</div>
							<i class="fas fa-chevron-down"></i>
						</button>
						<div class="faq__answer">
							Een dag kost €0,50 per kind. <br>
							Je kan dit betalen bij het brengen van jouw kinderen. Je hoeft niet direct voor alle dagen betalen. <br>
							Je beslist zelf wanneer je voor welke dagen betaalt, maar probeer liefst de dag zelf te betalen.
						</div>
					</div>
					
					<div class="faq__item" id="faq-3">
						<button class="faq__question" data-target="faq-3">
							<div class="faq__title">
								Moet ik voor mijn kinderen eten en drinken voorzien?
							</div>
							<i class="fas fa-chevron-down"></i>
						</button>
						<div class="faq__answer">
							Wij zorgen voor 11-uurtjes (sapje) en 16-uurtjes (koek of stuk fruit) en een beker soep voor bij het middagmaal.
							<br>
							Jouw kinderen nemen best boterhammen mee voor tijdens het middagmaal.
						</div>
					</div>
					
					<div class="faq__item" id="faq-4">
						<button class="faq__question" data-target="faq-4">
							<div class="faq__title">
								Is het mogelijk om later aan te komen of vroeger te vertrekken?
							</div>
							<i class="fas fa-chevron-down"></i>
						</button>
						<div class="faq__answer">
							<p>
								<strong>Kinderen brengen: </strong>
								vanaf 08u30 tot 09u15.
							</p>
							<p>
								<strong>Kinderen ophalen:</strong> vanaf 16u30 tot 17u00. <br>
							</p>
							
							<p>
								Er wordt enkel van deze planning afgeweken <strong>in overleg met de hoofdleiding</strong>. <br>
								Indien dit voor de week zelf is, kan dit telefonisch op: 0486 79 69 90 <br>
								Als dit een andere week is, stuur je best een mail naar: <span class="accent">info@lentekindvakantiewerking.be</span>.
							</p>
						
						
						</div>
					</div>
				</div>
			</div>
		</article>
		<script src="{{ asset('js/faq.js') }}" > </script>
	</main>
@endsection
