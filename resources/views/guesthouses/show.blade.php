@extends('master')
@section('title', $guesthouse->room_name )

@section('content')
<style>

    .img-fluid:hover {
        opacity: 0.8;
        cursor: pointer;
    }

    .rounded-left {
        border-top-left-radius: 15px;
        border-bottom-left-radius: 15px;
    }

    .rounded-bottom-right {
        border-bottom-right-radius: 15px;
    }

    .rounded-top-right {
        border-top-right-radius: 15px;
    }

    .image-container {
        position: relative;
        display: inline-block;
    }

    .top-right-button {
        position: absolute;
        top: 0;
        right: 0;
        z-index: 1;
    }

    .top-button {
        position: absolute;
        top: 0;
        left: 0;
        z-index: 1;
    }

    .offcanvas-container {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 0;
        overflow: hidden;
        background-color: rgba(0, 0, 0, 0.7);
        transition: height 0.3s ease-in-out;
    }

    .offcanvas-container.show {
        height: 100%;
    }

    .offcanvas-content {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: #fff;
        transform: translateY(100%);
        animation: slideFromBottom 0.3s ease-in-out forwards;
    }

    @keyframes slideFromBottom {
        0% {
            transform: translateY(100%);
        }

        100% {
            transform: translateY(0);
        }
    }

    .overlay {
        position: fixed;
        z-index: 9999;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.8);
        display: none;
    }

    .fullscreen-img {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        max-width: 100%;
        max-height: 100%;
    }

    .btn-transparent {
        opacity: 0.8;
    }

    /* Style the close button */
    .close-btn {
        position: absolute;
        top: 20px;
        right: 20px;
        color: white;
        font-size: 30px;
        font-weight: bold;
        cursor: pointer;
    }
    #save_icon:hover {
        text-decoration: underline;
        cursor: pointer;
    }
    #unsave_icon:hover {
        text-decoration: underline;
        cursor: pointer;
    }
</style>
@include('partials._navbar')

<div class="container" style="margin-bottom: 100px;">
    <div class="row">
        <div class="col-12">
        <h1 id="house_title">{{$guesthouse->room_name}}  </h1>  
        </div>
        
        @php 
            $room_image = explode(',', $guesthouse->room_image);
        @endphp
    </div>
    <div class="row mb-2">
        <div class="col-2 text-center">
            <i class="fa-solid fa-star" style="color: rgb(255, 190, 11);"></i> 3.3 - <span style="text-decoration: underline;">(69 reviews)</span>
        </div>
        <div class="col-8 text-start">
            <i class="fa-solid fa-location-dot" style="color: red;"></i> Located in - <span style="text-decoration: underline;"> {{ $guesthouse->room_location }} </span> 
        </div>
        @auth
        @if ( auth()->user()->role == "admin" )
        
            <div class="col-2 d-flex align-items-center justify-content-end">
                <button class="btn mr-2"><a href="/rooms/{{$guesthouse->id}}/edit">Edit</a></button>
                <button class="btn text-danger" data-bs-toggle="modal" data-bs-target="#delete_guest_house_modal" >Delete</button>
            </div>
        @else 

            @if($wishlist)
            <div class="col-2 mt-4 text-end">
                <span class="mt-3" id="unsave_icon"> <i class="bi bi-heart-fill text-danger "></i> saved </span>
            </div>
            @else 
            <div class="col-2 mt-4 text-end">
                <span class="mt-3" id="save_icon"> <i class="bi bi-heart "></i> save </span>
            </div>
            @endif

        @endif
        @endauth
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <img src="{{ asset('images/'.$room_image[0]) }}" id="img0" onclick="openFullscreen(this)"
                class="img-fluid w-100 rounded-left ms-4" style="height: 360px;">
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6">
            <div class="row">
                <div class="col-12">
                    <img src="{{ asset('images/'.$room_image[1]) }}" id="" onclick="openFullscreen(this)"
                        class="img-fluid object-fit-cover ms-2 w-100" style="height: 175px; margin-bottom: 5px;">
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <img src="{{ asset('images/'.$room_image[2]) }}" id="" onclick="openFullscreen(this)"
                        class="img-fluid object-fit-cover ms-2" style="height: 175px; margin-top: 5px;">
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6">
            <div class="row">
                <div class="col-12 image-container">
                    <img src="{{asset('images/'.$room_image[3])}}" id="img3" onclick="openFullscreen(this)"
                        class="img-fluid object-fit-cover rounded-top-right w-100"
                        style="height: 175px; margin-bottom: 5px;">
                    <button class="btn btn-light me-4 mt-2 btn-sm top-right-button btn-transparent" id="showAllButton"
                        data-bs-toggle="offcanvas" data-bs-target="#imageOffcanvas"><i class="bi bi-layers"></i> Show
                        all
                        images</button>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <img src="{{ asset('images/'.$room_image[4]) }}" id="" onclick="openFullscreen(this)"
                        class="img-fluid object-fit-fill rounded-bottom-right w-100"
                        style="height: 175px; margin-top: 5px;">
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="h4 text-dark">About this place</div>
            <ul>
                <li>
                    <div class="h5 mx-5 text-dark" id="house_desc"> {{ $guesthouse->room_details }} </div>
                </li>
                <li>
                    <div class="h5 mx-5 text-dark" id="house_location"> Located in {{ $guesthouse->room_location }} </div>
                </li>
            </ul>
            <hr>
            <div class="h4 text-dark">Reviews</div>
            <div class="row h5">
                <div class="col">
                    <i class="fa-solid fa-star" style="color: rgb(255, 190, 11);"></i> 3.3 - <span style="text-decoration: underline;">(69 reviews)</span>
                </div>
            </div>

            <div class="row review-section">

                @for($i = 0; $i < 5; $i++)

                <div class="col-5 m-2 border">
                    <div class="row mt-2">
                        <div class="col-1">
                            <img src="{{ asset('images/profile/'.auth()->user()->profile_pic ) }}" class="profile_avatar" alt="">
                        </div>
                        <div class="col-10 ms-3 mt-2 fw-bold">
                            John Doe 
                        </div>
                    </div>
                    <div class="row m-1">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </div>
                </div>

                @endfor

            </div>

        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 mt-3">
            <div class="card">
                <form method="post" action="/payment/{{ $guesthouse->id }}">
                    @csrf
                <div class="card-body">
                    <h3 class="card-title">Price details</h3>
                    <p class="card-text">Monthly Fee <label for="" style="margin-left: 135px;"
                            id="house_price">₱{{ $guesthouse->room_price }}</label></p>
                            <button type="submit" class="btn btn-success form-control" id="reserveBtn">Reserve Now</button>
                </div>
                </form>

            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="delete_guest_house_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Guest House</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
       
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <form method="POST" action="/rooms/{{$guesthouse->id}}">
            @csrf
            @method('DELETE')
            <button type="button submit" class="btn btn-danger">Delete</button>
        </form>
        </div>
      </div>
    </div>
  </div>
<div class="offcanvas offcanvas-container" tabindex="-1" id="imageOffcanvas" aria-labelledby="imageOffcanvasLabel">
    <div class="offcanvas-content">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="imageOffcanvasLabel">All Images</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div id="imageGallery" class="row">
                    @for($i = 0; $i < count($room_image); $i++)
                    <img src="{{ asset('images/'.$room_image[$i]) }}" id="" onclick="openFullscreen(this)"
                    class="img-fluid object-fit-fill rounded-bottom-right w-25"
                            style="height: 175px; margin-top: 5px;">
                    @endfor
            </div>
        </div>
    </div>
</div>
<script>
    function openFullscreen(img) {
        var overlay = document.createElement("div");
        overlay.classList.add("overlay");

        var fullscreenImg = document.createElement("img");
        fullscreenImg.classList.add("fullscreen-img");
        fullscreenImg.src = img.src;

        var closeBtn = document.createElement("span");
        closeBtn.classList.add("close-btn");
        closeBtn.innerHTML = "&times;";
        closeBtn.onclick = closeFullscreen;

        overlay.appendChild(fullscreenImg);
        overlay.appendChild(closeBtn);

        document.body.appendChild(overlay);

        overlay.style.display = "block";
    }

    function closeFullscreen() {
        var overlay = document.querySelector(".overlay");
        overlay.style.display = "none";

        overlay.removeChild(overlay.querySelector(".fullscreen-img"));
        overlay.removeChild(overlay.querySelector(".close-btn"));

        document.body.removeChild(overlay);
    }

@if(auth()->user())
    $('#save_icon').on('click', function() {
        
        $.ajax({
            url: '/wishlist/save',
            type: 'POST',
            data: {
                user_id: "{{ auth()->user()->id }}",
                room_id: "{{ $guesthouse->id }}",
                _token: " {{ csrf_token() }} "
            },
            success: function(data) {
                console.log(data);
                $('#save_icon').html('<i class="bi bi-heart-fill text-danger"></i> saved');
                $('#save_icon').attr('id', 'unsave_icon');
            },
            error: function(error) {
                console.log(error)
            }
        })

    })
@if(isset($wishlist))
    $('#unsave_icon').on('click', function() {
        
        $.ajax({
            url: '/wishlist/unsave',
            type: 'DELETE',
            data: {
                id: "{{ $wishlist->id }}",
                _token: " {{ csrf_token() }} "
            },
            success: function(data) {
                console.log(data);
                $('#unsave_icon').html('<i class="bi bi-heart"></i> save');
                $('#unsave_icon').attr('id', 'save_icon');
            },
            error: function(error) {
                console.log(error)
            }
        })

    })
@endif
@endif

</script>
@include('partials._footer')

@endsection
