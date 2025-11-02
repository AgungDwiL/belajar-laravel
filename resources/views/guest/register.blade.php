<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <header>
        <nav class="nav-content">
            <ul class="nav-links">
                <li><a class="nav-link" href="/">Home</a></li>
                <li><a class="nav-link" href="{{url('products')}}">Products</a></li>
                <li><a class="nav-link" href="/login">Login</a></li>
            </ul>
        </nav>
    </header>
    
    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <img class="login-logo" src="{{ asset('images/Logo/logo.png') }}" alt="Logo EternaKS">
                <h1>PT Eterna Karya Sejahtera</h1>
                <p>REGISTER</p>
            </div>
            
            <form action="/register" method="POST" class="login-form" id="loginForm">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}">
                    @error('name')
                        <p style="font-size: 12px; color: red;">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" value="{{ old('username') }}">
                    @error('username')
                        <p style="font-size: 12px; color: red;">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password">
                    @error('password')
                        <p style="font-size: 12px; color: red;">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="login-btn">
                    <span class="btn-text">Register</span>
                </button>
            </form>
            <br>
            <p>Have an account?</p>
            <a class="register-btn" href="login">
                <span class="btn-text">Sign In Here</span>
            </a>
        </div>
    </div>
</body>