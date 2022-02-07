<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
   <!--Made with love by Mutiullah Samim -->
   
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

</head>
<body>
    <style>
        html,body{
                background-image: url("{% static 'images/cover.jpg' %}");
                background-size: cover;
                background-repeat: no-repeat;
                height: 100%;
                font-family: 'Numans', sans-serif;
                }

                .container{
                height: 100%;
                align-content: center;
                }

                .card{
                height: 370px;
                margin-top: auto;
                margin-bottom: auto;
                width: 400px;
                background-color: rgba(0,0,0,0.5) !important;
                }

                .social_icon span{
                font-size: 60px;
                margin-left: 10px;
                color: #FFC312;
                }

                .card-header h3{
                color: white;
                }

                .social_icon{
                position: absolute;
                right: 20px;
                top: -45px;
                }

                .input-group-prepend span{
                width: 50px;
                background-color: #FFC312;
                color: black;
                border:0 !important;
                }

                input:focus{
                outline: 0 0 0 0  !important;
                box-shadow: 0 0 0 0 !important;

                }

                .remember{
                color: white;
                }

                .remember input
                {
                width: 20px;
                height: 20px;
                margin-left: 15px;
                margin-right: 5px;
                }

                .login_btn{
                color: black;
                background-color: #FFC312;
                width: 100px;
                }

                .login_btn:hover{
                color: black;
                background-color: white;
                }

                .links{
                color: white;
        }	
        
    </style>
    <!-- <div class="menu">
        <button class="btn"> <a  href="{% url 'signout' %}">Sign Out</a></button>
    </div> -->
    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-header">
                    <h3>Log In..</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('login_user')}}" method="POST"> 
                        @if(Session::has('success'))
                        <div class="alert alert-succes">{{Session::get('success')}}</div>
                        @endif
                        @csrf
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type = "text" name = "user" placeholder = "Enter User name" required>
                            
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type = "Password" name = "password" placeholder="Enter Password" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Login" class="btn float-right login_btn">
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-center links">

                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-center links">
                        Don't have an account?<a href='registration'>Sign Up</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
