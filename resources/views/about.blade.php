@extends('master')

@include('partials._navbar')

@section('content')

<div >
    <div class="col-lg-11 mx-auto " style="margin-top:100px;">
        <div class="text-white  shadow-sm rounded banner bg-info text-center p-4">
            <h1 class="display-4">GR System</h1>
            <p class="lead"> </p>
        </div>

        <div class="box" class=" p-3" style="margin-left:5%;">
            <img src="../images/owners.png" alt="img" style="height: 350px; width:350px; float: left; margin:10px;">

        </div>

        <div>
        <img src="../images/room.png" alt="img" style=" float:right; height:150px; width:55%; margin-top:10px;">
            <p class="text-left" style=" float:right; width: 55%; font-family: Arial, Helvetica, sans-serif; margin-top:5%;">
            Hello! We're Guesthouse Reservation System (GRS). 

            We are a distinct kind of platform for managing small accommodation businesses created specifically for those kinds of establishments. Our system allows for affordable home reservation that provide customers with a quick and efficient way to reserve Guesthouse. Clients have access to the most recent information regarding rooms that are open, a secure payment processing and an intuitive user experience.

            We've been created this platform to help small businesses, motivated by the notion that technologies created just for small providers of accommodation should be used. With the help of our platform, you can spend more time taking care of your customers and other important business matters.
            </p>
        </div>
    </div>
</div>

<div class="p-3" style="position:absolute; margin-top:35%; margin-left:6%;">
<img src="../images/img.jpg" alt="img" style="height: 380px; width:380px; ">
<img src="../images/per.jpg" alt="img" style="height: 380px; width:380px; ">
<img src="../images/pers.jpg" alt="img" style="height: 380px; width:380px; ">
</div>
    
@endsection