@extends('layouts.admin')
@section('title')
	Leiding - FAQ's
@endsection

@section('content')
	<div class="section">
		<div class="row">
			<h1 class="grow">
				Overzicht FAQ's
			</h1>
			<a href="{{ route('faq.create') }}" class="btn is-small for-admin">
				voeg een FAQ toe
			</a>
		</div>
		
		<div class="teaser--container">
			@foreach($faqs as $faq)
				<div class="teaser {{ $faq['belongsTo'] }}">
					<div class="row">
						<h2 class="teaser__title grow">
							{{$faq['question']}}
						</h2>
						<div class="teaser__actions">
							<a class="" href={{ route('faq.edit', ['faq_id' => $faq->id]) }}>
								@svg('edit', 'is-small')
							</a>
							<form
								class="form"
								method="POST"
								action="{{ route('faq.postDelete', ['faq_id' => $faq->id]) }}"
							>
								{{ csrf_field() }}
								<button class="" type="submit">
									@svg('delete', 'is-small')
								</button>
							</form>
						</div>
					</div>
					
					<div class="teaser__content">
						{!! $faq['answer'] !!}
					</div>
					
				</div>
			@endforeach
		</div>
	</div>
@endsection