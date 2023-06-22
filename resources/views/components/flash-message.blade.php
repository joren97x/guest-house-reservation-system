@if(session()->has('message'))
    
<div id="message-container" x-data="{show: true}" x-init="setTimeout( () => show = false, 2000)" x-show="show" class=" text-dark h6" style="background-color: whitesmoke;border: 2px solid black; position: fixed; border-radius: 20px;top: 18px;left: 30%;width: 40%;padding-top:20px ;text-align: center;z-index: 9999;display: block;">
          <p class="fw-bold h6"> {{session('message')}} </p> 
</div>

@endif
