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
    <link rel="stylesheet" href="{{ URL('registr/css/style.css') }}">
    <!--===============================================================================================-->
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

</head>

<body>
    <div class="container">
        <div class="title">تسجيل مستخدم جديد</div>
        <div class="content">
            <form method="POST" action="{{ route('registrat.post') }}">
                @csrf
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">الاسم بالكامل</span>
                        <input class="form-control" type="text" id="name" name="name"
                            placeholder="ادخل الاسم باللغة العربية" required>
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="input-box">
                        <span class="details">الاسم المستخدم باللغة الانجليزية</span>
                        <input class="form-control" type="text" id="username" name="username"
                            placeholder="ادخل اسم الحساب باللغة الانجليزية فقط"
                            onkeypress="return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)"
                            required>
                        @error('username')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="input-box">
                        <span class="details">البريد الالكتروني</span>
                        <input class="form-control" type="email" id="email" name="email"
                            placeholder="ادخل البريد الالكتروني الخاص بك" required>
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="input-box">
                        <span class="details">رقم الجوال</span>
                        <input class="form-control" type="number" maxlength="10" id="mobile" name="mobile"
                            placeholder="ادخل رقم الجوال" required>
                        @error('mobile')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="input-box">
                        <span class="details">كلمة المرور</span>
                        <input class="form-control" type="password" id="password" name="password"
                            placeholder="كلمة المرور" required>
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="input-box">
                        <span class="details">تأكيد كلمة المرور</span>
                        <input class="form-control" type="password" id="password_confirmation"
                            name="password_confirmation" placeholder="تأكيد كلمة المرور" required>
                        @error('password_confirmation')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="button">
                    <input class="form-control" type="submit" value="تسجيل">
                </div>
            </form>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            //called when key is pressed in textbox
            $("#mobile").keypress(function(e) {

                var maxlengthNumber = parseInt($('#mobile').attr('maxlength'));
                var inputValueLength = $('#mobile').val().length + 1;
                if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {

                    return false;
                }
                if (maxlengthNumber < inputValueLength) {
                    return false;
                }
            });
        });
    </script>


</body>

</html>
