<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Alegreya+Sans&display=swap" rel="stylesheet">
    <title>Account Login | Aamarportal.Com</title>
	<style>
		html {
			height: 100%;
		}

		body {
			height: 100%;
			padding: 0;
			margin: 0;
			font-family: "Open Sans", sans-serif;
			background: url(images/body-bg.png);
			font-family: "Alegreya Sans", sans-serif;
		}
		.payment_method_wrap h2 {
			font-size: 26px;
			text-align: center;
			margin-bottom: 25px;
			color: #3ad5a0;
			font-weight: 500;
			font-family: "Alegreya Sans", sans-serif;
		}html {
			height: 100%;
		}

		body {
			height: 100%;
			padding: 0;
			margin: 0;
			font-family: "Open Sans", sans-serif;
			background: url(images/body-bg.png);
			font-family: "Alegreya Sans", sans-serif;
		}
		.payment_method_wrap h2 {
			font-size: 26px;
			text-align: center;
			margin-bottom: 25px;
			color: #3ad5a0;
			font-weight: 500;
			font-family: "Alegreya Sans", sans-serif;
		}
	</style>
</head>
<body style="background: #f8f8f8;">
    <div class="container h-100 payment_method_wrap">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-md-5">
                <div class="card">
                    {{-- <img src="{{asset('public/admin/dist/img/logo.png')}}" alt="" class="img-fluid mx-auto" style="width: 413px;"> --}}
                    <h2>Admin Login</h2>
                    <div class="card-body">
                        <form class="" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group" data-validate = "Valid email is required">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email" autofocus>
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                </span>
                            </div>

                            @error('email')
                                <span class="invalid-feedback d-block ml-3 text-sm" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                                

                            <div class="form-group" data-validate = "Password is required">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="fa fa-lock" aria-hidden="true"></i>
                                </span>
                            </div>
                            @error('password')
                                <span class="invalid-feedback d-block ml-3 d-block ml-3 text-sm" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <div class="wrap-input100 validate-input">
                                    <div class="col-md-12 ml-3">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            
                            <div class="container-login100-form-btn text-center mt-3 mb-2">
                                <button class="btn btn-danger" type="submit">
                                    Login
                                </button>
                            </div>
                        </form>
                    </div>  
                </div>
                <p class="text-center p-5" style="font-size: 15px;">Copyright &copy; <?php echo date('Y');?>. All Rights Reserved | Riptwrae.Com </p>
            </div>
        </div> 
    </div>
</body>
</html>