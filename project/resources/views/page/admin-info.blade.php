@extends('layouts.moni')
@section('title')
	Speelplein voor hoofdmonitoren
@endsection
@section('content')
	<main>
		<div class="section">
			<h1>
				Hoofdmonitoren
			</h1>
		</div>
		
		<article class="article">
			<div class="row">
				<div>
					<h2 class="article__title">
						Toelatingsvoorwaarden
					</h2>
					<div class="article__content">
						<p>
							Je kan als hoofdanimator bij Speelpleinwerking aan de slag vanaf het jaar dat je 18 wordt.
						</p>
						<p>
							Je hoeft geen animatorcursus gevolgd te hebben, maar dit wordt wel sterk aanbevolen.
						</p>
						<p>
							Je kan enkel een hoofdanimator worden als je al een jaar als monitor gestaan hebt.
						</p>
					</div>
				</div>
				
				<div class="ctn-image is-small is-left">
					<img src="https://images.pexels.com/photos/939328/pexels-photo-939328.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="">
				</div>
			</div>
		</article>
		
		<div class="ctn-image is-large">
			<img src="https://images.pexels.com/photos/1974927/pexels-photo-1974927.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="de huidige hoofdleiding">
		</div>
		
		<article class="article">
			<h2 class="article__title">
				Huidige hoofmonitoren
			</h2>
			<div class="polaroid--container">
				@foreach($admins as $admin)
					<div class="polaroid">
						@if(File::exists(public_path() . "/images/admin/" . $admin['image']))
							<div class="polaroid__image ctn-image">
								<img src="{{ asset('images/admin/' . $admin['image']) }}" alt="">
							</div>
						@endif
						<div class="polaroid__content">
							<div class="polaroid__title">
								{{$admin['name']}} {{$admin['first_name']}}
							</div>
							<div class="polaroid__text">
								{{$admin['introtext']}}
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</article>
		
		<div class="ctn-image is-large">
			<img src="https://images.pexels.com/photos/1000445/pexels-photo-1000445.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="de huidige hoofdleiding">
		</div>
	</main>
@endsection
