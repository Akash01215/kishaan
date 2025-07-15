<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Krishi AI - Login</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Added Caveat font -->
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400;700&display=swap" rel="stylesheet" />
    <style>
        /* ✅ Fullscreen background image */
        body {
            background: url('{{ asset("frontend/img/ak.jpg") }}') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* ✅ Glass effect login box */
        .login-box {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            padding: 40px;
            border-radius: 15px;
            color: #218838;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
        }

        .form-control {
            background-color: rgba(255, 255, 255, 0.2);
            border: none;
            color: white;
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .form-label {
            color: white;
        }

        .btn-login {
            background-color: #28a745;
            border: none;
            font-weight: bold;
        }

        .btn-login:hover {
            background-color: #218838;
        }

        .text-link {
            color: #ddd;
            font-size: 14px;
        }

        .text-link:hover {
            color: #fff;
        }

        .text-link {
            color: #ddd;
            font-size: 14px;
        }

      
    </style>
</head>

<body>

   <div class="login-box text-#218838">
        <h3 class="text-center mb-4">Login to Krishi AI</h3>

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Field -->
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input autocomplete="email" type="email" name="email" id="email"
                    class="form-control @error('email') is-invalid @enderror"
                    value="{{ old('email') }}" placeholder="Enter email" required autofocus>
                @error('email')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password Field -->
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input autocomplete="current-password" type="password" name="password" id="password"
                    class="form-control @error('password') is-invalid @enderror"
                    placeholder="Enter password" required>
                @error('password')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Remember Me -->
            <div class="mb-3 form-check">
                <input type="checkbox" name="remember" id="remember" class="form-check-input"
                    {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">Remember Me</label>
            </div>

            <!-- Submit -->
            <button type="submit" class="btn btn-login w-100 text-white">Login</button>

            <!-- Register Link -->
            <div class="text-center mt-3">
                <a href="{{ route('register') }}" class="text-link">Don't have an account? Register</a>
            </div>

            <!-- Forgot Password Link -->
            @if (Route::has('password.request'))
            <div class="text-center mt-2">
                <a class="text-link" href="{{ route('password.request') }}">
                    Forgot your password?
                </a>
            </div>
            @endif
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>