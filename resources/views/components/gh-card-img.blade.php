@props(['cardimg'])

@php
    $images = explode(',', $cardimg);
@endphp

@for($i = 0; $i < count($images); $i++)
    
    <div class="carousel-item {{ $i == 0 ? "active" : "" }}">
        <img class="card-img-top" src=" {{ asset('images/'.$images[$i]) }} " style="height: 265px; object-fit:cover" alt="Room Image">
    </div>

@endfor