<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <header class="nav-content">
        <ul class="nav-links">
            <li><a class="nav-link" href="/">Home</a></li>
            <li><a class="nav-link" href="{{url('products')}}">Products</a></li>
            <li><a class="nav-link" href="/register">Register</a></li>
        </ul>
    </header>

    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <img class="login-logo" src="{{ asset('images/Logo/logo.png') }}" alt="Logo EternaKS">
                <h1>PT Eterna Karya Sejahtera</h1>
                <p>LOGIN</p>
            </div>
            
            <form action="/authenticate" method="POST" class="login-form" id="loginForm">
                @csrf
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" value="{{ old('username') }}" autofocus>
                    @error('username')
                        <p style="font-size: 12px; color: red;">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="password-wrapper">
                        <input type="password" id="password" name="password">
                        {{-- <button type="button" class="password-toggle" id="passwordToggle"></button> --}}
                    </div>
                    @error('password')
                            <p style="font-size: 12px; color: red;">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="login-btn">
                    <span class="btn-text">Sign In</span>
                </button>
                @if (session()->has('error'))
                    <p style="font-size: 14px; color: red; text-align: center;">
                        {{ session('error') }}
                    </p>
                @endif
            </form>
            <br>
            <p>Don't have an account yet?</p>
            <a class="register-btn" href="register">
                <span class="btn-text">Register Here</span>
            </a>
        </div>
    </div>
</body>