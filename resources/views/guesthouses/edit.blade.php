@extends('master')


@section('content')
@include('partials._navbar')
    
<div class="container text-center bg-white" style="margin-top: 120px">
   <form method="POST" action="/rooms/{{$guesthouse->id}}">
    @csrf
    @method('PUT')
    <div class="row justify-content-around">
      <h1 class="mt-2">EDIT GUEST HOUSE</h1>


      <div class="col-8">
      <div class="form-group">
      <label for="roomName" class="mb-2">Room Name</label>
      <input type="text" class="form-control rounded-pill"  id="roomName" name="room_name" value="{{$guesthouse->room_name}}" >
      @error('room_name')
          <p class="text-danger mt-1"> {{ $message }} </p>
      @enderror
    </div>
    <div class="form-group">
        <label for="roomDetails" class="mb-2">Room Description</label>
        <textarea class="form-control rounded" id="roomDetails" name="room_details" rows="3" > {{$guesthouse->room_details}} </textarea>
        @error('room_details')
          <p class="text-danger mt-1"> {{ $message }} </p>
        @enderror
      </div>

      <input type="hidden" name="room_image" >
      
      <div class="form-group">
        <div class="row">
          <div class="col-6">
              <label for="room_img" class="mb-2">Room Location</label>
              <input type="text" class="form-control rounded-pill" id="roomLocation" name="room_location" value="{{$guesthouse->room_location}}">
                @error('room_location')
                    <p class="text-danger mt-1"> {{ $message }} </p>
                @enderror
          </div>
            <div class="col-6">
                <label for="room_img" class="mb-2">Room Price</label>
                <input type="text" class="form-control rounded-pill" id="roomPrice" name="room_price" value="{{ $guesthouse->room_price }}">
                @error('room_price')
                    <p class="text-danger mt-1"> {{ $message }} </p>
                @enderror
            </div>
        </div>
      </div>
     
      <input type="hidden" value="{{$guesthouse->room_image}}" name="room_image">

      <div class="form-group text-center mt-4">
        <button type="submit" class="btn btn-success rounded-pill px-5 py-3 mb-5">Create Room</button>
      </div>
        </div>
      </div>
   </form>
    
</div>

@include('partials._footer')
@endsection
