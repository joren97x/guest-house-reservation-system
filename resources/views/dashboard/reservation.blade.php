@extends('master')
@section('title', 'Dashboard')
    

@section('content')
@include('partials._navbar')


<div class="container-fluid">
    @if(auth()->user()->role == "admin")
        <header class="fs-1 text-center">All reservations</header>
    @else
        <header class="fs-1 text-center">My reservations</header>
    @endif

    <table class="table table-striped table-hover table-bordered mt-4">
        <thead class="table-primary">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Guest House</th>
                <th scope="col">Guest Name</th>
                <th scope="col">Guest Address</th>
                <th scope="col">Contact No.</th>
                <th scope="col">Payment Process</th>
                <th scope="col">Guest House Address</th>
                <th scope="col">Date</th>
                <th scope="col">
                    <div class="dropdown">
                        <button class="btn btn-sm dropdown-toggle fw-bold" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Status</button>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="/reservation/sort/all" id="dropdown_all">All</a></li>
                          <li><a class="dropdown-item" href="/reservation/sort/cancelled" id="dropdown_cancel">Cancelled</a></li>
                          <li><a class="dropdown-item" href="/reservation/sort/approved" id="dropdown_approved">Approved</a></li>
                          <li><a class="dropdown-item" href="/reservation/sort/pending" id="dropdown_pending">Pending</a></li>
                        </ul>
                      </div>
                </th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody id="tbl">   


            @if(count($reservations) === 0)
            <tr>
                <td colspan="10" class="text-center"> <h3>No reservations found</h3> </td>
            </tr>
            
            @else
            
            @foreach($reservations as $reservation)

            @php
                $created_time = strtotime($reservation->created_at);
                $expire_time = $created_time + (24 * 60 * 60); // Add 24 hours in seconds
                $current_time = time();
                $is_expired = $current_time > $expire_time;
                // echo "CREATED TIME :". $created_time . " EXPIRY TIME :" . $expire_time . " CREATED TIME IS LESS THAN EXPIRE TIME? " . $is_expired. "<br>";
                $status = '';
                switch($reservation->status){
                    case 'approved':
                        $status .= '<span class="rounded" style="background-color: hsl(145, 63%, 40%);">'.  $reservation->status   .'</span>';
                        break;
                    case 'pending':
                        $status .= '<span class="rounded bg-warning">'.  $reservation->status   .'</span>';
                        break;
                    case 'cancelled':
                        $status .= '<span class="rounded bg-danger">'.  $reservation->status  .'</span>';
                        break;
                }
            @endphp

            <tr id="reservation{{ $reservation->id }}">
                <td scope="row"> {{ $reservation->id }} </td>
                <td> {{ $reservation->guest_house->room_name }} </td>
                <td> {{ $reservation->name }} </td>
                <td> {{ $reservation->address }} </td>
                <td> {{ $reservation->contact_no }} </td>
                <td> {{ $reservation->payment_process }} </td>
                <td> {{ $reservation->guest_house->room_location }} </td>
                <td> {{ $reservation->created_at->format('d/m/Y') }} </td>
                <td> <span class="rounded bg-danger" id="status{{ $reservation->id }}"> {!! $status !!}  </span> </td>
                <td>
                    <button class="btn btn-warning btn-sm" {{ $is_expired ? "disabled" : "" }} data-bs-toggle="modal" data-bs-target="#cancel_reservation_modal{{ $reservation->id }}"><i class="bi bi-x-circle-fill h6 text-dark"></i></button>
                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete_reservation_modal{{ $reservation->id }}"><i class="bi bi-trash-fill h6 text-dark"></i></button>
                </td>
              </tr>

              <div class="modal fade" id="delete_reservation_modal{{ $reservation->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Reservation?</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h4> {{ $reservation->guest_house->room_name }} </h4>
                        <h5> Location: {{ $reservation->guest_house->room_location }} </h5>
                        <h5> Date: {{ $reservation->created_at }} </h5>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <form action="reservation/delete" method="POST">
                        @method('DELETE')
                        @csrf
                            <button class="btn btn-danger" id="btn-delete" onclick="deleteReservation({{ $reservation->id }})" data-bs-dismiss="modal"> Delete </button>
                    </form>
                    </div>
                  </div>
                </div>
              </div>

              <div class="modal fade" id="cancel_reservation_modal{{ $reservation->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Cancel Reservation?</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h4> {{ $reservation->guest_house->room_name }} </h4>
                        <h5> Location: {{ $reservation->guest_house->room_location }} </h5>
                        <h5> Date: {{ $reservation->created_at }} </h5>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <form action="reservation/delete" method="POST">
                        @method('PATCH')
                        @csrf
                            <button class="btn btn-warning" id="btn-cancel" onclick="cancelReservation({{ $reservation->id }})" data-bs-dismiss="modal"> Cancel </button>
                    </form>
                    </div>
                  </div>
                </div>
              </div>

            @endforeach
            @endif
        </tbody>
    </table>
</div>

<div class="" id="modalDiv"></div>



@include('partials._footer')

<script>

        function cancelReservation(id) {
            event.preventDefault();
            $.ajax({
                type: 'POST',
                url: '/reservation/cancel',
                data: {
                    _method: 'PUT',
                    _token: ' {{ csrf_token() }} ',
                    id: id
                },
                success: function(data) {
                    console.log(data)
                    $('#status'+id).html('<span class="rounded bg-danger">cancelled</span>')
                },
                error: function(error) {
                    console.log(error)
                }
            })
        }

        function deleteReservation(id) {
            event.preventDefault();
            $.ajax({
                type: 'POST',
                url: '/reservation/delete',
                data: {
                    _method: 'DELETE',
                    _token: '{{ csrf_token() }}',
                    id: id
                },
                success: function(data) {
                    console.log(data)
                    console.log($('#reservation'+id))
                    $('#reservation'+id).remove()
                },
                error: function(error) {
                    console.log(error)
                }
            })
        }

        $('#dropdown_cancel').on('click', function() {
            $.ajax({
                url: '/reservation/sort/cancelled',
                type: 'GET',
                
                success: function(response) {
                    console.log(response)
                    for (var key in response) {
        if (response.hasOwnProperty(key)) {
            var value = response[key];
            console.log(key + ': ' + value);
        }
    }
                },
                error: function(error) {
                    console.log(error)
                }
            })
        })

</script>

@endsection