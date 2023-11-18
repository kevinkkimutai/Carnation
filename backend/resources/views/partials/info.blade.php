@if (session()->has('error'))
    <div class="alert alert-danger" role="alert">
        {!! session()->get('error') !!}
    </div>
@endif

@if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">

        {{ $message }}
    </div>
@endif

@if ($message = Session::get('warning'))
    <div class="alert alert-warning alert-block">

        {{ $message }}
    </div>
@endif

@if ($message = Session::get('info'))
    <div class="alert alert-info alert-block">

        {{ $message }}
    </div>
@endif

{{-- @if ($errors->any())
    <div class="alert alert-danger">
        {{ $errors }}
    </div>
@endif --}}
