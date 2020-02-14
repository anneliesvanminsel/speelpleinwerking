@extends('layouts.admin')
@section('title')
	Leiding - FAQ's
@endsection

@section('content')
	<div>
		<div class="section row">
			<h1 class="grow">
				Overzicht FAQ's
			</h1>
			<a href="{{ route('faq.create') }}" class="btn is-small for-admin">
				voeg een FAQ toe
			</a>
		</div>
		<div>
			<form action="{{ route('faq.search') }}" method="GET" class="search section">
				<div class="form__group">
					<select class="select" id="belongsTo" name="belongsTo" onChange="this.form.submit()">
						<option>Kies een optie</option>
						<option value="for-family">Familie-pagina</option>
						<option value="for-volunteer">Monitor-pagina</option>
					</select>
					<label for="belongsTo" class="form__label">
						Filter op basis van pagina
					</label>
				</div>
			</form>
		</div>
		
		<div class="section teaser--container">
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