@if ($errors->has('email'))
    <div class="alert alert-danger">
        <strong>{{ $errors->first('email') }}</strong>
    </div>
@endif