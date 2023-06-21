@extends('master')
@section('title', 'Users')
@section('content')
@include('partials._navbar')
<div class="container-fluid">
    <header class="fs-1 text-center">Users</header>

    <table class="table table-striped table-hover table-bordered mt-4">
        <thead class="table-primary">
            <tr class="text-center">
                <th scope="col">#</th>
                <th scope="col">Full Name</th>
                <th scope="col">Email</th>
                <th scope="col">Contact No.</th>
                <th scope="col">Address</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody id="tbl">   

            @foreach($users as $user)

                <tr id="user_container{{ $user->id }}">
                    <td> {{ $user->id }} </td>
                    <td> {{ $user->name }} </td>
                    <td> {{ $user->email }} </td>
                    <td> {{ $user->contact_no ?  $user->contact_no : "Not provided"  }} </td>
                    <td> {{ $user->address ? $user->address : "Not provided" }} </td>
                    <td>  
                    
                        <button type="button" class="btn btn-danger btn-sm"  data-bs-toggle="modal" data-bs-target="#delete_user_modal{{ $user->id }}">
                            <i class="bi bi-trash"></i>
                        </button>

                    </td>
                </tr>

                <div class="modal fade" id="delete_user_modal{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <form action="/users/delete/{{ $user->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5" id="exampleModalLabel">Delete User</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h5> {{ $user->name }} </h5>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="button submit" class="btn btn-primary" data-bs-dismiss="modal" onclick="delete_user({{ $user->id }})" id="delete_button">Delete</button>
                            </div>
                          </div>
                      </form>
                    </div>
                  </div>

            @endforeach

        </tbody>
    </table>
</div>

<script>

       function delete_user(id) {
        event.preventDefault();
        $.ajax({
            url: '/users/delete/',
            type: 'DELETE',
            data: {
                _token: '{{ csrf_token() }}',
                id: id
            },
            success: function(data) {
                $('#user_container'+id).remove()
            },
            error: function(error) {
                console.log(error);
            }
        })
       }

</script>

@include('partials._footer')
@endsection