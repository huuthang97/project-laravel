
{{-- @if ($errors->has('name'))
    <div class="alert alert-danger">
        <strong>{{ $errors->first('name') }}</strong>
    </div>
@endif --}}

@foreach ($errors->all() as $error)
    <div class="alert alert-danger">
        <strong>{{ $error }}</strong>
    </div>
@endforeach