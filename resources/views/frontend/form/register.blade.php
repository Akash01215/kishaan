<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register - Krishi AI</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Added Caveat font -->
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400;700&display=swap" rel="stylesheet" />
    <style>
        body {
            background: url('{{ asset("frontend/img/ak.jpg") }}') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .register-box {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            padding: 40px;
            border-radius: 15px;
            color: #218838;
            width: 100%;
            max-width: 500px;
            box-shadow: 0 0 15px rgba(0,0,0,0.3);
        }

        .form-control {
            background-color: rgba(255,255,255,0.2);
            border: none;
            color: white;
        }

        .form-control::placeholder {
            color: rgba(255,255,255,0.7);
        }

        .form-label {
            color: white;
        }

        .btn-register {
            background-color: #218838;
            border: none;
            font-weight: bold;
        }

        .btn-register:hover {
            background-color: #0056b3;
        }

        .text-link {
            color: #ddd;
            font-size: 14px;
        }

        .text-link:hover {
            color: #fff;
        }

        
        body, .caveat-normal, .caveat-bold {
    font-family: 'Caveat', cursive;
    font-size: 1.5rem; /* Increase as needed */
        }

        .caveat-bold {
            font-weight: 700;
        }
    </style>
</head>
<body>

    <div class="register-box">
        <h3 class="text-center mb-4">Create Your Account</h3>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Full Name -->
            <div class="mb-3 caveat-bold">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" name="name" id="name" autocomplete="name"
                       class="form-control @error('name') is-invalid @enderror"
                       placeholder="Enter your name" value="{{ old('name') }}" required>
                @error('name')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" name="email" id="email" autocomplete="email"
                       class="form-control @error('email') is-invalid @enderror"
                       placeholder="Enter your email" value="{{ old('email') }}" required>
                @error('email')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" autocomplete="new-password"
                       class="form-control @error('password') is-invalid @enderror"
                       placeholder="Create a password" required>
                @error('password')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                       autocomplete="new-password" class="form-control"
                       placeholder="Confirm your password" required>
            </div>

            <!-- Submit -->
            <button type="submit" class="btn btn-register w-100 text-white">Register</button>

            <!-- Login Link -->
            <div class="text-center mt-3">
                <a href="{{ route('login') }}" class="text-link">Already have an account? Login</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
