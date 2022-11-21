<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}" />


<style type="text/css">

* {
    box-sizing: border-box;
    margin: 0;
    padding: 0; 
    font-family: Raleway, sans-serif;
}

body {
    background: linear-gradient(90deg, #C7C5F4, #776BCC);       
}

.container {
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
}

.screen {       
    background: linear-gradient(90deg, #5D54A4, #7C78B8);       
    position: relative; 
    height: 600px;
    width: 360px;   
    box-shadow: 0px 0px 24px #5C5696;
}

.screen__content {
    z-index: 1;
    position: relative; 
    height: 100%;
}

.screen__background {       
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: 0;
    -webkit-clip-path: inset(0 0 0 0);
    clip-path: inset(0 0 0 0);  
}

.screen__background__shape {
    transform: rotate(45deg);
    position: absolute;
}

.screen__background__shape1 {
    height: 520px;
    width: 520px;
    background: #FFF;   
    top: -50px;
    right: 120px;   
    border-radius: 0 72px 0 0;
}

.screen__background__shape2 {
    height: 220px;
    width: 220px;
    background: #6C63AC;    
    top: -172px;
    right: 0;   
    border-radius: 32px;
}

.screen__background__shape3 {
    height: 540px;
    width: 190px;
    background: linear-gradient(270deg, #5D54A4, #6A679E);
    top: -24px;
    right: 0;   
    border-radius: 32px;
}

.screen__background__shape4 {
    height: 400px;
    width: 200px;
    background: #7E7BB9;    
    top: 420px;
    right: 50px;    
    border-radius: 60px;
}

.login {
    width: 320px;
    padding: 30px;
    padding-top: 156px;
}

.login__field {
    padding: 20px 0px;  
    position: relative; 
}

.login__icon {
    position: absolute;
    top: 30px;
    color: #7875B5;
}

.login__input {
    border: none;
    border-bottom: 2px solid #D1D1D4;
    background: none;
    padding: 10px;
    padding-left: 24px;
    font-weight: 700;
    width: 63%;
    transition: .2s;
}

.login__input:active,
.login__input:focus,
.login__input:hover {
    outline: none;
    border-bottom-color: #6A679E;
}

.login__submit {
    background: #fff;
    font-size: 14px;
    margin-top: 30px;
    padding: 16px 20px;
    border-radius: 26px;
    border: 1px solid #D4D3E8;
    text-transform: uppercase;
    font-weight: 700;
    display: flex;
    align-items: center;
    width: 100%;
    color: #4C489D;
    box-shadow: 0px 2px 2px #5C5696;
    cursor: pointer;
    transition: .2s;
}

.login__submit:active,
.login__submit:focus,
.login__submit:hover {
    border-color: #6A679E;
    outline: none;
}

.button__icon {
    font-size: 24px;
    margin-left: auto;
    color: #7875B5;
}

.social-login { 
    position: absolute;
    height: 140px;
    width: 160px;
    text-align: center;
    bottom: 0px;
    right: 0px;
    color: #fff;
}

.social-icons {
    display: flex;
    align-items: center;
    justify-content: center;
}

.social-login__icon {
    padding: 20px 10px;
    color: #fff;
    text-decoration: none;  
    text-shadow: 0px 0px 8px #7875B5;
}

.social-login__icon:hover {
    transform: scale(1.5);  
}
</style>
</head>
<body>
  
    
       
<div class="container">
    <div class="screen">
        <div class="screen__content">
            <div class="login">
<!--                        method="POST" action="{{ route('login') }}" @csrf
 -->
                <div class="login__field" style="display: none;">
                    <i class="login__icon fas fa-user"></i>
                    <select class="login__input" style="width: 35%;" id="code" placeholder="Telephone number">
                        @php 
                        $countries = App\Models\countries::where('stat',1)->get();
                        @endphp
                        @foreach($countries as $countrie)
                        <option value="{{ $countrie->phonecode }}">{{$countrie->name}}</option>
                        @endforeach
                    </select>
                    <input type="number" class="login__input" id="phone" placeholder="Telephone number">
                </div>
                <div class="login__field" id="inputcode" >
                    <i class="login__icon fas fa-lock"></i>
                    <input type="text" class="login__input" placeholder="code" id="password">
                </div>
                <button class="button login__submit" id="btnSubmit"style="display: none;">
                    <span class="button__text">Log In Now</span>
                    <i class="button__icon fas fa-chevron-right"></i>
                </button>               

                <button class="button login__submit" id="btnSubmit1"   >
                    <span class="button__text">Log In Now</span>
                    <i class="button__icon fas fa-chevron-right"></i>
                </button>         
            </div>
            <input type="hidden" name="email" id="email">
          
        </div>
        <div class="screen__background">
            <span class="screen__background__shape screen__background__shape4"></span>
            <span class="screen__background__shape screen__background__shape3"></span>      
            <span class="screen__background__shape screen__background__shape2"></span>
            <span class="screen__background__shape screen__background__shape1"></span>
        </div>      
    </div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<script type="text/javascript">
    

    $(document).ready(function() {
    $("#btnSubmit").click(function(){
       if($("#phone").val().length != 0){
        


  $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });
 var phone = $("#phone").val();
  var code = $("#code").val();
 $.ajax({
        url: '{{ url('logins')}}',
        type: 'post',
        dataType: 'json',
        data: {
            phone :phone,
            code:code,
        },
        success: function(data) {
                 if(data.success){
                    document.getElementById("inputcode").style.display = "block";
                    document.getElementById("btnSubmit1").style.display = "block";
                    document.getElementById("btnSubmit").style.display = "none";
                    $("#email").val(data.email)
                       console.log(data);
                  
                 }
                 }
    });




       }
    }); 


    $("#btnSubmit1").click(function(){
       if($("#email").val() != null){
        


  $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });
 var email = $("#email").val();
  var password = $("#password").val();
 $.ajax({
        url: '{{ route('login')}}',
        type: 'post',
        dataType: 'json',
        data: {
            password :password,
            email:email,
        },
        success: function(data) {
                   window.setTimeout(function(){location.reload()},2000);
                 }
    });




       }
    }); 
});
</script>

</body>
</html>

