<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootsrap 4 CDN-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <title>Signup</title>
</head>
<body>
    <style>
        fieldset {
            border: thin solid #ccc; 
            border-radius: 4px;
            padding: 20px;
            padding-left: 40px;
            background: #fbfbfb;
        }

        .form-control {
            width: 95%;
        }
        label small {
            color: #678 !important;
        }
        span.req {
            color:maroon;
            font-size: 112%;
        }
        .text-center{
            color: lightblue;
        }
        .alert {
            color: red !important;
        }
        legend {
            display: block;
            width: 100%;
            max-width: 100%;
            margin-bottom: 0.5rem;
            font-size: 1.5rem;
            line-height: inherit;
            color: #678;
            white-space: normal;
        }
    </style>

    <div class="container" style="align-content: center;">
        <div class="row">
            <div class="col-md-6">
                <form action="{{route('register_user')}}" onsubmit="return validation()" method="POST" autocomplete="off">
                    @if(Session::has('fail'))
                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                    @endif
                    @csrf
                    <fieldset><legend class="text-center">Valid information is required to register. <span class="req"><small> required *</small></span></legend>

                    <div class="form-group"> 	 
                        <label for="firstname"><span class="req">* </span> First name: </label>
                            <input class="form-control" type="text" id ="firstname" name="firstname" required /> 
                                <div class = "alert" id="errFirst"></div>    
                    </div>

                    <div class="form-group">
                        <label for="lastname"><span class="req">* </span> Last name: </label> 
                            <input class="form-control" type="text" id = "lastname" name = "lastname" placeholder="hyphen or single quote OK" required />  
                                <div class = "alert" id="errLast"></div>
                    </div>

                    <div class="form-group">
                        <label for="email"><span class="req">* </span> Email Address: </label> 
                            <input class="form-control" required type="text" id = "email" name="email" />   
                                <div class = "alert" id="errEmail"></div>
                    </div>

                    <div class="form-group">
                        <label for="username"><span class="req">* </span> User name:  <small>This will be your login user name</small> </label> 
                            <input class="form-control" type="text" id = "user" name = "user" autocomplete="off" required>
                            <div class = "alert" id="errUser"></div>  
                    </div>

                    <div class="form-group">
                        <label for="password"><span class="req">* </span> Password: </label><br>
                        <input type = "Password" id = "password" name = "password" placeholder="Enter Password" autocomplete="off" required>
                        <div class = "alert" id="errPass"></div>
                    </div>
                    <br>
                    <div class="form-group">
                        <input type = "submit" name = "" value = "Sign Up">
                    </div>
                    </fieldset>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        function validation(){
            var firstname = document.getElementById('firstname').value;
            var lastname = document.getElementById("lastname").value;
            var email = document.getElementById("email").value;
            var user = document.getElementById("user").value;
            var password = document.getElementById("password").value;

            if(firstname.length < 2){
                document.getElementById("errFirst").innerHTML = "**Write more than one character**";
                return false;
            }
            if(!isNaN(firstname)){
                document.getElementById("errFirst").innerHTML = "**Write only alphabets**";
                return false;
            }
            if(lastname.length < 2){
                document.getElementById("errLast").innerHTML = "**Write more than one character**";
                return false;
            }
            if(!isNaN(lastname)){
                document.getElementById("errLast").innerHTML = "**Write only alphabets**";
                return false;
            }
            if(user.length < 2){
                document.getElementById("errUser").innerHTML = "**Write more than one character**";
                return false;
            }
            if(!isNaN(user)){
                document.getElementById("errUser").innerHTML = "**Write only alphabets**";
                return false;
            }
            if(email.indexOf('@')<= 0){
                document.getElementById("errEmail").innerHTML = "**Worng position of @**";
                return false;
            }
            if(email.charAt(email.length-4) != '.'){
                document.getElementById("errEmail").innerHTML = "**Worng position of . **";
                return false;
            }
            if(password.length < 8){
                document.getElementById("errPass").innerHTML = "**Password must be at least 8 characters**";
                return false;
            }
            if(password.search(/[0-9]/) == -1){
                document.getElementById("errPass").innerHTML = "**Password must be contained at least 1 numerical Value**";
                return false;
            }
            if(password.search(/[a-z]/) == -1){
                document.getElementById("errPass").innerHTML = "**Password must be contained at least 1 lower case character**";
                return false;
            }
            if(password.search(/[A-Z]/) == -1){
                document.getElementById("errPass").innerHTML = "**Password must be contained at least 1 Upper case character**";
                return false;
            }
            // else{
            //     alert("Sign up Successfully!");
            // }

        }
    </script>
</body>
</html>