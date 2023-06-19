@if(session()->has('message'))
    
<div id="message-container" x-data="{show: true}" x-init="setTimeout( () => show = false, 2000)" x-show="show" class="border border-success text-success h6" style="position: fixed; border-radius: 20px;top: 18px;left: 30%;width: 40%;background-color: rgb(227, 242, 193);padding-top:20px ;text-align: center;z-index: 9999;display: block;">
     <p> <i class="bi bi-check-circle"></i>  {{session('message')}} </p> 
</div>

@endif
