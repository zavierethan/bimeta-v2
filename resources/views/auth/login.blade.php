<!DOCTYPE html>
<html lang="en" class="light">
    <!-- BEGIN: Head -->
    <head>
        <meta charset="utf-8">
        <link href="dist/images/logo.svg" rel="shortcut icon">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Bimeta Karnusa Bandung">
        <meta name="author" content="LEFT4CODE">
        <title>Bimeta Karnusa Versi 2.0</title>
        <!-- BEGIN: CSS Assets-->
        <link rel="stylesheet" href="{{asset('assets/dist/css/app.css')}}" />
        <!-- END: CSS Assets-->
    </head>
    <!-- END: Head -->
    <body class="login">
        <div class="container sm:px-10">
            <div class="block xl:grid grid-cols-2 gap-4">
                <!-- BEGIN: Login Info -->
                <div class="hidden xl:flex flex-col min-h-screen">
                    <div class="my-auto">
                        <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">

                        </div>
                    </div>
                </div>
                <!-- END: Login Info -->
                <!-- BEGIN: Login Form -->
                <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                    <div class="my-auto mx-auto xl:ml-20 bg-white dark:bg-darkmode-600 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                        <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                            Log In
                        </h2>
                        <div class="intro-x mt-2 text-slate-400 xl:hidden text-center">A few more clicks to sign in to your account. Manage all your e-commerce accounts in one place</div>
                        <form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="intro-x mt-8">
        <input type="text" class="intro-x login__input form-control py-3 px-4 block @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <input type="password" id="password" class="intro-x login__input form-control py-3 px-4 block mt-4 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="intro-x flex text-slate-600 dark:text-slate-500 text-xs sm:text-sm mt-4">
        <div class="flex items-center ml-auto">
            <input id="show-password" type="checkbox" class="form-check-input border mr-2" onclick="togglePassword()">
            <label class="cursor-pointer select-none" for="show-password">Tampilkan Password</label>
        </div>
    </div>
    <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
        <button class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top">Login</button>
    </div>
</form>

<script>
    function togglePassword() {
        var passwordField = document.getElementById("password");
        var showPasswordCheckbox = document.getElementById("show-password");
        if (showPasswordCheckbox.checked) {
            passwordField.type = "text";
        } else {
            passwordField.type = "password";
        }
    }
</script>

                    </div>
                </div>
                <!-- END: Login Form -->
            </div>
        </div>
        <!-- BEGIN: JS Assets-->
        <script src="{{asset('assets/dist/js/app.js')}}"></script>
        <!-- END: JS Assets-->
    </body>
</html>
