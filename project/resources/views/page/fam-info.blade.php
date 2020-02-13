@extends('layouts.app')
@section('title')
	Speelplein - voor ouders
@endsection
@section('content')
	<main>
		<div class="section row">
			<h1 class="grow">
				Praktische informatie
			</h1>
			<a class="btn for-family is-small" href="{{ route('register') }}">
				Maak snel een account aan!
			</a>
		</div>
		
		<article class="article">
			<h2 class="article__title">
				Praktische informatie
			</h2>
			
			<div class="row">
				<div class="grow">
					<h3 class="article__subtitle">
						Kinderen brengen:
					</h3>
					<p>
						tussen 09u tot 09u45.
					</p>
					<br>
					<br>
					<h3 class="article__subtitle">
						Kinderen ophalen:
					</h3>
					<p>
						tussen 16u tot 17u30.
					</p>
				</div>
				<div class="ctn-image is-small">
					<img src="https://images.pexels.com/photos/296301/pexels-photo-296301.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="">
				</div>
			</div>
		</article>
		<article class="article">
			<div class="row has-two">
				<div class="grow">
					<h3 class="article__subtitle">
						Wat moeten jouw kinderen meebrengen?
					</h3>
					<ul class="list for-family">
						<li class="list__item">
							Lunchpakket
						</li>
						<li class="list__item">
							Regenjas
						</li>
						<li class="list__item">
							Eventueel reservekleren
						
						</li>
						<li class="list__item">
							Bij heel mooi weer: zwemkleren
						</li>
					</ul>
					<p>
						Bij bijzonderheden (zwemkledij, regenjasjes, kleren die vuil mogen worden) proberen we dit tijdig te melden.
					</p>
				</div>
				<div class="grow">
					<h3 class="article__subtitle">
						Wat laten ze beter thuis?
					</h3>
					<ul class="list for-family">
						<li class="list__item">
							Snoep (een koekje voor bij het eten mag, verder zorgen wij voor alles)
						</li>
						<li class="list__item">
							GSM, Smartphones, tablets en andere kostbare voorwerpen (als deze stuk of verloren gaan is dit
							niet onze verantwoordelijkheid).
						</li>
					</ul>
				</div>
			</div>
		</article>
		
		<div class="ctn-image is-large">
			<img src="https://images.pexels.com/photos/754769/pexels-photo-754769.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="">
		</div>
		
		@if($faqs->count() > 0)
			<article id="faq" class="article">
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
		@endif
		<script src="{{ asset('js/faq.js') }}" > </script>
	</main>
@endsection
