@extends('layouts.main')

@section('title', 'User Page')

@section('head')
    <link rel="stylesheet" href="google-map.css">
@endsection

@section('content')
<div class="container-fluid px-4">
    <h3 class="m-5">
        User Page
    </h3>
</div>
@endsection

@section('scripts')
    <script src="XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX<YOUR_GoogleAPIKey_HERE>&callback=initMap&v=weekly" defer></script>
    <script src="google-map.js"></script>
@endsection
