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

 

    .card-body span {
      font-size: 12px
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

    .card i {
      margin-top: 5px;
      font-size: 20px;
    }

    .icon-text {
      font-size: 13px;
    }

    .col .card {
      border: none;
      color: gray;
    }

    .col .card:hover {
      color: black;
      border-bottom: 1px solid black;
    }

</style>
@include('partials._navbar')

{{-- <div class="container">
  <div class="row">


    <div class="col">
      <div class="card text-center" style="display: inline-block;">
          <i class="fa-solid fa-umbrella-beach icon"></i>
          <br>
          <span class="mx-1 icon-text">Beach</span>
      </div>
    </div>

    <div class="col">
      <div class="card text-center" style="display: inline-block;">
        <i class="fa-solid fa-leaf"></i>
          <br>
          <span class="mx-1 icon-text">Tropical</span>
      </div>
    </div>

    <div class="col">
      <div class="card text-center" style="display: inline-block;">
        <i class="fa-solid fa-house-chimney-window"></i>
          <br>
          <span class="mx-1 icon-text">Cabins</span>
      </div>
    </div>

    <div class="col">
      <div class="card text-center" style="display: inline-block;">
        <i class="fa-solid fa-tree"></i>
          <br>
          <span class="mx-1 icon-text">Forest</span>
      </div>
    </div>

    <div class="col">
      <div class="card text-center" style="display: inline-block;">
        <i class="fa-solid fa-sun-plant-wilt"></i>
          <br>
          <span class="mx-1 icon-text">Dessert</span>
      </div>
    </div>

    <div class="col">
      <div class="card text-center" style="display: inline-block;">
        <i class="fa-solid fa-mountain-sun"></i>
          <br>
          <span class="mx-1 icon-text">Mountain</span>
      </div>
    </div>

    <div class="col">
      <div class="card text-center" style="display: inline-block;">
        <i class="fa-solid fa-house-flood-water"></i>
          <br>
          <span class="mx-1 icon-text">Lakefront</span>
      </div>
    </div>

    <div class="col">
      <div class="card text-center" style="display: inline-block;">
        <i class="fa-regular fa-snowflake"></i>
          <br>
          <span class="mx-1 icon-text">Snow</span>
      </div>
    </div>

    <div class="col">
      <div class="card text-center" style="display: inline-block;">
        <i class="fa-solid fa-dungeon"></i>
          <br>
          <span class="mx-1 icon-text">Dungeon</span>
      </div>
    </div>
    
  </div>
</div> --}}

<div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
  <!-- Wrapper for carousel items -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <div class="row">
        <!-- First set of 10 cards -->
        <div class="col">
          <div class="card text-center" style="display: inline-block;">
            <i class="fa-solid fa-umbrella-beach icon"></i>
            <br>
            <span class="mx-1 icon-text">Beach</span>
          </div>
        </div>
        <div class="col">
          <div class="card text-center" style="display: inline-block;">
            <i class="fa-solid fa-umbrella-beach icon"></i>
            <br>
            <span class="mx-1 icon-text">Beach</span>
          </div>
        </div>
        <div class="col">
          <div class="card text-center" style="display: inline-block;">
            <i class="fa-solid fa-umbrella-beach icon"></i>
            <br>
            <span class="mx-1 icon-text">Beach</span>
          </div>
        </div>
        <div class="col">
          <div class="card text-center" style="display: inline-block;">
            <i class="fa-solid fa-umbrella-beach icon"></i>
            <br>
            <span class="mx-1 icon-text">Beach</span>
          </div>
        </div>
        <div class="col">
          <div class="card text-center" style="display: inline-block;">
            <i class="fa-solid fa-umbrella-beach icon"></i>
            <br>
            <span class="mx-1 icon-text">Beach</span>
          </div>
        </div>
        <div class="col">
          <div class="card text-center" style="display: inline-block;">
            <i class="fa-solid fa-umbrella-beach icon"></i>
            <br>
            <span class="mx-1 icon-text">Beach</span>
          </div>
        </div>
        <!-- Add the rest of the 9 cards -->
        <!-- ... -->
      </div>
    </div>
    <div class="carousel-item ">
      <div class="row">
        <!-- First set of 10 cards -->
        <div class="col">
          <div class="card text-center" style="display: inline-block;">
            <i class="fa-solid fa-umbrella-beach icon"></i>
            <br>
            <span class="mx-1 icon-text">Beach</span>
          </div>
        </div>
        <div class="col">
          <div class="card text-center" style="display: inline-block;">
            <i class="fa-solid fa-umbrella-beach icon"></i>
            <br>
            <span class="mx-1 icon-text">Beach</span>
          </div>
        </div><div class="col">
          <div class="card text-center" style="display: inline-block;">
            <i class="fa-solid fa-umbrella-beach icon"></i>
            <br>
            <span class="mx-1 icon-text">Beach</span>
          </div>
        </div><div class="col">
          <div class="card text-center" style="display: inline-block;">
            <i class="fa-solid fa-umbrella-beach icon"></i>
            <br>
            <span class="mx-1 icon-text">Beach</span>
          </div>
        </div><div class="col">
          <div class="card text-center" style="display: inline-block;">
            <i class="fa-solid fa-umbrella-beach icon"></i>
            <br>
            <span class="mx-1 icon-text">Beach</span>
          </div>
        </div>
      </div>
    </div>
    <!-- Add more carousel items as needed for the remaining cards -->
    <!-- ... -->
  </div>
  <!-- Carousel navigation controls -->
  <button class="carousel-control-prev bg-dark rounded-pill" style="margin-top: 10px; width: 30px; height:30px" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next bg-dark rounded-pill" style="margin-top: 10px; width: 30px; height:30px" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>


<div class="container-fluid mt-5">
<div class="row" id="roomDiv" name="roomDiv">

</div>
</div>
@include('partials._footer')

@endsection
