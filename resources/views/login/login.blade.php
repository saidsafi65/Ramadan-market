<!DOCTYPE html>
<html>

<head>
    <title>رمضــــان نـــت</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{ URL('loginRs/images/icons/favicon.ico') }}" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ URL('loginRs/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ URL('loginRs/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ URL('loginRs/vendor/animate/animate.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ URL('loginRs/vendor/css-hamburgers/hamburgers.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ URL('loginRs/vendor/select2/select2.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ URL('loginRs/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL('loginRs/css/main.css') }}">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="{{ URL('loginRs/images/img-01.png') }}" alt="IMG">
                </div>

                <form method="POST" action="{{ route('login') }}" class="login100-form validate-form">
                @csrf
                    <span class="login100-form-title">
                        تسجيل الدخول
                    </span>

                    <div class="wrap-input100 validate-input" data-validate="الرجاء ادخال ايميل صحيح مثل: ex@abc.xyz">
                        <input class="input100" type="text" name="login_id" id="login_id" placeholder="الايميل">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="password" id="password" placeholder="كلمة المرور">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            الدخول
                        </button>
                    </div>

                    <div class="text-center p-t-12">
                        <span class="txt1">
                            نسيت كلمة المرور
                        </span>
                        <a class="txt2" href="#">
                            اسم المستخدم / كلمة المرور?
                        </a>
                    </div>

                    <div class="text-center p-t-136">
                        <a class="txt2" href="{{ route('registrat') }}">
							انشاء حساب جديد
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
                    </div>
                </form>
            </div>
        </div>
    </div>




    <!--===============================================================================================-->
    <script src="{{ URL('loginRs/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ URL('loginRs/vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ URL('loginRs/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ URL('loginRs/vendor/select2/select2.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ URL('loginRs/vendor/tilt/tilt.jquery.min.js') }}"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <!--===============================================================================================-->
    <script src="{{ URL('loginRs/js/main.js') }}"></script>

</body>

</html>