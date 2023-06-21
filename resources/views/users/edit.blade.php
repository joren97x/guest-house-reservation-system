@extends('master')
@section('title', 'Account')
@section('content')

<style>
    .title {
        color: gray;

    }

    .button:hover {
        color: blue;
        text-decoration: underline;
        cursor: pointer;
    }

</style>
@include('partials._navbar')

<div class="container border border-bottom-0">
    <h4 class="text-center mt-3 fw-bold fs-3">Account Information</h4>
    <hr>
    <div class="row justify-content-around ">
        <div class="col-5">
            <div class="row fw-bold h6">
                Full name
            </div>
            <div class="row ms-2 title">
                <form action="/account/update/name" method="POST" id="form_full_name" hidden >
                    @csrf
                    @method('PUT')
                    <input type="text" class="form-control" value="{{ auth()->user()->name }}" name="name"  placeholder="Full name" required>
                </form>
                <span id="span_full_name"> {{ auth()->user()->name }} </span>
            </div>
        </div>
        <div class="col-2 mt-3 button">
            <span  onclick="show_input_full_name()"> Edit </span>
        </div>
    </div>
    <hr>
    <div class="row justify-content-around ">
        <div class="col-5">
            <div class="row fw-bold h6">
                Email Address
            </div>
            <div class="row ms-2 title" id="input_email">
                <form action="/account/update/email" method="POST" id="form_email" hidden>
                    @csrf
                    @method('PUT')
                    <input type="email" class="form-control" value="{{ auth()->user()->email }}" name="email" placeholder="Email Address" required>
                </form>
                <span id="span_email"> {{ auth()->user()->email }} </span> 
                @error('email')
                    <label class="text-danger"> {{ $message }} </label>
                @enderror 
            </div>
        </div>
        <div class="col-2 mt-3 button">
            <span onclick="show_input_email()"> Edit </span>
        </div>
    </div>
    <hr>
    <div class="row justify-content-around ">
        <div class="col-5">
            <div class="row fw-bold h6">
                Phone Number
            </div>
            <div class="row ms-2 title" >
                @if( auth()->user()->contact_no )
                <form action="/account/update/phone" method="POST" id="form_contact_no" hidden>
                    @csrf
                    @method('PUT')
                    <input type="number" class="form-control" value="{{ auth()->user()->contact_no }}" name="contact_no" pattern="[0-9]{3}-[0-9]{4}-[0-9]{4}" placeholder="Phone Number" required>
                </form>
                @else 
                <form action="/account/add/phone" method="POST" id="form_contact_no" hidden>
                    @csrf
                    <input type="number" class="form-control" name="contact_no" pattern="[0-9]{3}-[0-9]{4}-[0-9]{4}" placeholder="Phone Number" required>
                </form>
                @endif
                <span id="span_contact_no"> {{ auth()->user()->contact_no ? auth()->user()->contact_no : "Not provided"}} </span>
            </div>
        </div>
        <div class="col-2 mt-3 button">
            <span onclick="show_input_contact_no()"> {{ auth()->user()->contact_no ? "Edit" : "Add"}} </span>
        </div>
    </div>
    <hr>
    <div class="row justify-content-around ">
        <div class="col-5">
            <div class="row fw-bold h6">
                Address
            </div>
            <div class="row ms-2 title">
                @if(auth()->user()->address)
                <form action="/account/update/address" method="POST" id="form_address" hidden>
                    @csrf
                    @method('PUT')
                    <input type="text" class="form-control" value="{{ auth()->user()->address }}" name="address" placeholder="Address"  required>
                </form>
                @else
                <form action="/account/add/address" method="POST" id="form_address" hidden>
                    @csrf
                    <input type="text" class="form-control" name="address" placeholder="Address" required>
                </form>
                @endif
                <span id="span_address"> {{ auth()->user()->address ? auth()->user()->address : "Not provided" }} </span>
            </div>
        </div>
        <div class="col-2 mt-3 button">
            <span onclick="show_input_address()"> {{ auth()->user()->address ? "Edit" : "Add"}} </span>
        </div>
    </div>
    <hr>

</div>

<script>

    function show_input_full_name() {
        $('#span_full_name').hide()
        $('#form_full_name').removeAttr('hidden')
    }

    function show_input_email() {
        $('#span_email').hide()
        $('#form_email').removeAttr('hidden')
    }

    function show_input_contact_no() {
        $('#span_contact_no').hide()
        $('#form_contact_no').removeAttr('hidden')
    }

    function show_input_address() {
        $('#span_address').hide()
        $('#form_address').removeAttr('hidden')
    }

</script>

@include('partials._footer')    
@endsection