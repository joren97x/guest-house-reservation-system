@extends('master')
@section('content')
@include('partials._navbar')
<div class="container-fluid">
    <header class="fs-1 text-center">All Users</header>

    <table class="table table-striped table-hover table-bordered mt-4">
        <thead class="table-primary">
            <tr class="text-center">
                <th scope="col">#</th>
                <th scope="col">Full Name</th>
                <th scope="col">Email</th>
                <th scope="col">Contact No.</th>
                <th scope="col">Address</th>
                {{-- <th scope="col">Action</th> --}}
            </tr>
        </thead>
        <tbody id="tbl">   

            @foreach($users as $user)

                <tr>
                    <td> {{ $user->id }} </td>
                    <td> {{ $user->name }} </td>
                    <td> {{ $user->email }} </td>
                    <td> {{ $user->contact_no ?  $user->contact_no : "Not provided"  }} </td>
                    <td> {{ $user->address ? $user->address : "Not provided" }} </td>
                    {{-- <td> edit delete </td> --}}
                </tr>

            @endforeach

        </tbody>
    </table>
</div>
@include('partials._footer')
@endsection