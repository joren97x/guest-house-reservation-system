@extends('master')
@section('title', 'Home')
@section('content')
<style>
    .truncate-text {
      display: -webkit-box;
      -webkit-line-clamp: 2; /* Adjust the number of lines to show */
      -webkit-box-orient: vertical;
      overflow: hidden;
      text-overflow: ellipsis;
    }

    .truncate-text-title {
      display: -webkit-box;
      -webkit-line-clamp: 1; /* Adjust the number of lines to show */
      -webkit-box-orient: vertical;
      overflow: hidden;
      text-overflow: ellipsis;
    }
    
    .container-fluid {
      padding-left: 50px;
      padding-right: 50px
    }

    .card:hover {
      cursor: pointer;
    }

    .card:hover .truncate-text{
      -webkit-line-clamp: unset;
    }

    .card:hover .truncate-text-title{
      -webkit-line-clamp: unset;
    }

    .card:hover {
      transform: scale(1.05);
      border-color: #ffc107;
      
    }
    
    .card-img-overlay {
      opacity: 0;
      transition: opacity 0.3s ease;
    }

    .room:hover .carousel-control-prev .carousel-control-prev-icon,
    .room:hover .carousel-control-next .carousel-control-next-icon {
      background-color: black
    }
    
    .card:hover .card-img-overlay {
      opacity: 1;
    }

</style>
@include('partials._navbar')

<div class="container-fluid mt-5">
<div class="row" id="roomDiv" name="roomDiv">
      
@foreach ($guesthouses as $guesthouse)

        <x-guesthouse-card :guesthouse="$guesthouse" />
    
@endforeach
</div>
</div>
@include('partials._footer')

@endsection
