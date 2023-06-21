@props(['wishlist'])

@php

$room_image = explode(',', $wishlist->guesthouse->room_image);

@endphp

<div class="col-3 my-3" id="wishlist_container{{ $wishlist->id }}" style="position: relative; display: inline-block;"> 
    <a href="/rooms/{{ $wishlist->guesthouse->id }}" >
        <img src="{{ asset('images/'.$room_image[0]) }}" class="img-thumbnail h-100" alt="...">
        <h6> {{ $wishlist->guesthouse->room_name }} </h6>
    </a>
        {{-- <button class="btn btn-light me-3 mt-1" data-bs-toggle="modal" data-bs-target="#delete_wishlist_modal" style="position: absolute; top: 0; right: 0;"> <i class="bi bi-x-lg"></i> </button> --}}
</div>
{{-- 
<div class="modal fade" id="delete_wishlist_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Wishlist</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Delete from wishlist?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" onclick="delete_wishlist({{ $wishlist->id }})" class="btn btn-danger">{{ $wishlist->id }}Delete</button>
        </div>
      </div>
    </div>
  </div> --}}

