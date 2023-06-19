@props(['guesthouse'])
@php


@endphp
<div class="room col-lg-3 col-md-4 col-sm-6 my-2">
    <a href="rooms/{{$guesthouse->id}}">
      <div id="carouselExample{{$guesthouse->id}}" class="carousel slide card" data-bs-ride="carousel">
        <div class="carousel-inner">
            
          <x-gh-card-img :cardimg="$guesthouse->room_image" />          

        </div>
        <div class="card-body">
          <div class="room-name">
            <h5 class="truncate-text-title"> {{$guesthouse->room_name}} </h5>
          </div>
            <div class="room-desc"> 
                <p class="truncate-text"> {{ $guesthouse->room_details }} </p> 
             </div>
          <div>
            <p>
              <label class="fw-bold"> {{ $guesthouse->room_price }} </label> monthly
            </p>
          </div>
        </div>
        <button class="carousel-control-prev"  style="margin-bottom: 150px; display: block;" type="button" data-bs-target="#carouselExample{{$guesthouse->id}}" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" style="border-radius: 50%" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next rounded"  style="margin-bottom: 150px; display: block;" type="button" data-bs-target="#carouselExample{{$guesthouse->id}}" data-bs-slide="next">
          <span class="carousel-control-next-icon " style="border-radius: 50%" aria-hidden="true"></span>
          <span class="visually-hidden bg-dark">Next</span>
        </button>
      </div>
    </a>
  </div>