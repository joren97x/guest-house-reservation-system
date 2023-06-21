@extends('master')
@section('title', 'Wishlists')
@section('content')
@include('partials._navbar')

    <div class="container" style="margin-bottom: 120px">
        <h2>Wishlists</h2>
            <div class="row">

                @if(count($wishlists) === 0) 
                    <h3>No wishlists found.</h3>
                    <h6> While searching, click the heart icon to save your favorite places.  </h6>
                    <h6> <a href="/" style="color: blue"> Look for places </a> </h6>
                @endif

                @foreach($wishlists as $wishlist) 
                    <x-wishlist-card :wishlist="$wishlist" />
                @endforeach
            </div>
    </div>

@include('partials._footer')    
@endsection


