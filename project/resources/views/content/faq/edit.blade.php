@extends('layouts.admin')
@section('title')
	Leiding - FAQ's
@endsection

@section('content')
	<div class="section">
		<div class="breadcrumb">
			<a href="{{ route('faq.overview') }}" class="breadcrumb__link">
				@svg('back') Terug
			</a>
		</div>
		<h1>
			Bewerk "{{ $faq['question'] }}"
		</h1>
		
		<form
			method="POST"
			id="form-create"
			action="{{ route('faq.postEdit', ['faq_id' => $faq['id']]) }}"
			class="form"
			enctype="multipart/form-data"
		>
			@csrf
			<div class="form__group">
				<input
					id="question"
					type="text"
					class="form__input for-admin @error('question') is-invalid @enderror"
					name="question"
					placeholder="Veelgestelde vraag"
					value="{{ $faq['question'] }}"
					required
					autofocus
					autocomplete="off"
				>
				
				<label for="question" class="form__label">
					Vraag
				</label>
				
				@error('question')
				<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>
			
			
			<div class="form__group">
				<textarea
					form="form-create"
					id="answer"
					class="form__input for-admin @error('answer') is-invalid @enderror"
					name="answer"
					placeholder="Antwoord op de vraag"
					required
					maxlength="1000"
				>{{ $faq['answer'] }}</textarea>
				
				<label for="answer" class="form__label">
					Antwoord
				</label>
				
				@error('answer')
				<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>
			
			<div class="form__group">
				<select class="select" id="belongsTo" name="belongsTo">
					<option value="for-family" {{ ( $faq['belongsTo'] == 'for-family') ? 'selected' : '' }}>
						Familie-pagina
					</option>
					<option value="for-volunteer" {{ ( $faq['belongsTo'] == 'for-volunteer') ? 'selected' : '' }}>
						Monitor-pagina
					</option>
				</select>
				<label for="belongsTo" class="form__label">
					Aan welke pagina moet deze FAQ toegevoegd worden?
				</label>
				
				@error('belongsTo')
				<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>
			
			<div class="form__actions">
				<button type="submit" class="btn for-admin">
					Sla jouw bewerkingen op
				</button>
			</div>
		
		</form>
	</div>
@endsection