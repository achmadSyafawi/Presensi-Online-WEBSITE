@extends('layouts.app')

@section('content')
<style>
img {
    border-radius: 50%;
}
</style>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <br><br>
            <center><img src="{{ url('public/assets/img/img.png') }}" width="600" height="600">
        </div>
    </div>
</div>
@endsection
