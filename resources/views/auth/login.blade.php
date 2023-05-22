<!DOCTYPE html>
<html lang="en">
<head>
    <title>MY CLINIC</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{asset('front_log/images/icons/favicon.ico')}}"/>
    <link href="{{asset('backend/img/logo/logo.png')}}" rel="icon">

    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('front_log/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('front_log/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('front_log/vendor/animate/animate.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('front_log/vendor/css-hamburgers/hamburgers.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('front_log/vendor/select2/select2.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('front_log/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('front_log/css/main.css')}}">
    <!--===============================================================================================-->
    <style>
        .error-message {
            color: red;
            font-size: smaller;
        }

    </style>
</head>
<body>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="{{asset('front_log/images/imag_02.jpeg')}}" alt="IMG">
            </div>

            <form class="login100-form validate-form" method="post" action="{{url('log/in')}}">
                @csrf
					<span class="login100-form-title">
                            MY CLINIC
					</span>

                <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <input class="input100" type="text" name="email" placeholder="Email">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
                </div>


                <div class="wrap-input100 validate-input" data-validate = "Password is required">
                    <input class="input100" type="password" name="password" placeholder="Password">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
                </div>

                @error('email')
                <div class="error-message">{{ $message }}</div>
                @enderror
                <div class="container-login100-form-btn">
                    <button class="login100-form-btn" type="submit">
                        Login
                    </button>
                </div>

                <div class="text-center p-t-12">
						<span class="txt1">

						</span>
                    <a class="txt2" >

                    </a>
                </div>

                <div class="text-center p-t-136">
                    <a class="txt2" >

                    </a>
                </div>
            </form>
        </div>
    </div>
</div>




<!--===============================================================================================-->
<script src="{{asset('front_log/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('front_log/vendor/bootstrap/js/popper.js')}}"></script>
<script src="{{asset('front_log/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('front_log/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('front_log/vendor/tilt/tilt.jquery.min.js')}}"></script>
<script >
    $('.js-tilt').tilt({
        scale: 1.1
    })
</script>
<!--===============================================================================================-->
<script src="{{asset('front_log/js/main.js')}}"></script>

</body>
</html>
