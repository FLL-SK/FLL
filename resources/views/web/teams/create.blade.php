@extends('web.layouts.master')

@section('title') Nastavenia @endsection

@section('content')
@include('web.includes.message_block')

<section class="content">
	<div class="container">
		<div class="hr-title hr-long center"><abbr>Formulár na založenie tímu</abbr> </div>

		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<form method="POST" action="{{ route('team/store') }}">
					{{csrf_field()}}

					<div class="row">
						<div class="col-md-6">
							<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
								<label class="upper" for="name">Názov tímu</label>
								<input type="text" class="form-control required" name="name" placeholder="Názov tímu" id="name" aria-required="true" value="{{ Request::old('name') }}" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group {{ $errors->has('organization') ? 'has-error' : '' }}">
								<label class="upper" for="organization">Organizácia</label>
								<input type="text" class="form-control required" name="organization" placeholder="Organizácia" id="organization" aria-required="true" value="{{ Request::old('organization') }}" required>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group {{ $errors->has('city') ? 'has-error' : '' }}">
								<label class="upper" for="city">Mesto organizácie</label>
								<input type="text" class="form-control required" name="city" placeholder="Mesto organizácie" id="city" aria-required="true" value="{{ Request::old('city') }}" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
								<label class="upper" for="address">Adresa organizácie</label>
								<input type="text" class="form-control required" name="address" placeholder="Adresa organizácie" id="address" aria-required="true" value="{{ Request::old('address') }}" required>
							</div>
						</div>
					</div>

					<div class="hr-title hr-long center"><abbr>Členovia tímu</abbr> </div>

{{-- 					@for($i = 1; $i < 4; $i++)
						<div class="row">
							<div class="col-md-6">
								<div class="form-group {{ $errors->has('member') ? 'has-error' : '' }}">
									<label class="upper" for="member{{$i}}">Meno člena č. {{$i}}</label>
									<input type="text" class="form-control required" name="member{{$i}}" placeholder="Meno člena" id="member{{$i}}" aria-required="true" value="{{ Request::old('member') }}" required>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group {{ $errors->has('birth') ? 'has-error' : '' }}">
									<label class="upper" for="birth{{$i}}">Dátum narodenia člena č. {{$i}}</label>
									<input data-provide="datepicker" type="text" class="form-control required datepicker" name="birth{{$i}}" placeholder="Dátum narodenia člena" id="birth{{$i}}" aria-required="true" value="{{ Request::old('birth') }}" required>
								</div>
							</div>
						</div>
					@endfor --}}

					<div class="row">
						<div class="col-xs-12">
							<button id="add" class="btn grey btn-block">Pridať člena tímu</button>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="form-group text-center">
								<input type="hidden" name="count" id="count" value="0">
								<button class="btn btn-primary" type="submit"><i ="fa fa-paper-plane"></i>&nbsp;Odoslať</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
    </div>
</section>

<script src="{{ URL::asset('jquery-ui/jquery-ui.min.js') }}"></script>

<script>
	
	$(document).ready(function () {

		$('.datepicker').datepicker({
			dateFormat: 'dd/mm/yy'
		});

		$("#add").click(function(event) {
			event.preventDefault();

			var count = $("#count").val();
			count++;

			$("<div class='row'>\
					<div class='col-md-6'>\
						<div class='form-group'> \
							<label class='upper' for='member" + count +"'>Meno člena č. " + count +"</label>\
							<input type='text' class='form-control required' name='member" + count +"' placeholder='Meno člena' id='member" + count +"' aria-required='true' required> \
						</div>\
					</div>\
					<div class='col-md-6'>\
						<div class='form-group'> \
							<label class='upper' for='birth" + count +"'>Dátum narodenia člena č. " + count +"</label> \
							<input data-provide='datepicker' type='text' class='form-control required datepicker' name='birth" + count +"' placeholder='Dátum narodenia člena' id='birth" + count +"' aria-required='true' required> \
						</div> \
					</div> \
				</div>").insertBefore(this);

			$("#count").val(count);

			$('.datepicker').datepicker({
				dateFormat: 'dd/mm/yy'
			});
		});
	});

</script>

@endsection