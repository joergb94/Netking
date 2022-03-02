
@extends('layouts.app')
@section('style')
<style>
    #myVideo {
            position: fixed;
            right: 0;
            bottom: 0;
            width: 100%; 
            min-height: calc(100vh - 123px);
        }
 

</style>
@endsection
@section('content')

    <video autoplay muted loop id="myVideo">
        <source src="{{ asset('videos/keypl-video.mp4') }}" type="video/mp4">
        Your browser does not support HTML5 video.
    </video>


@endsection
@section('js')
@endsection