@if ($errors->has('password'))
    <div class="alert alert-danger">
        <strong>{{ $errors->first('password') }}</strong>
    </div>
@endif