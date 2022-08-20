@php
	$inputName = $inputName ?? 'inputName';
	$labelName = $labelName ?? 'Nombre del Campo';
	$type = $type ?? 'text';
	$styleLabel = "form-label";
	$styleInput = 'form-control';
	$styleDiv = 'my-3';

	if($type == 'checkbox' OR $type == 'radio' ){
		$styleLabel = 'form-check-label col-10 mx-2';
		$styleInput = 'form-check-input col-2 order-1';
		$styleDiv = 'form-check';
	}
@endphp


<div class="{{ $styleDiv }}">

	<label for="{{ $inputName }}" class="{{ $styleLabel }}">{!! $labelName !!}</label>

	<input required class="{{ $styleInput }} @if($errors->has($inputName)) border border-danger @endif"
		type="{{ $type }}"
		name="{{  $inputName}}"
		@if($errors) value="{{ old($inputName) }} @endif ">

	@if($errors->has($inputName))
	    <small class="text-danger col-12">{{ $errors->first($inputName) }}</small>
	@endif

</div>