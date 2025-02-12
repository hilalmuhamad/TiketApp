<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Golara</title>
    <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .password-group {
            position: relative;
            width: 100%;
        }
        .toggle-password {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #999;
        }
    </style>
</head>
<body>

    <div class="main">

        <!-- Sing up  Form -->
        <section class="sign-up">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-image" style="text-align: right; margin-bottom: 0; padding-right: 10px;">
                        <figure><img src="{{ asset('Asset/img/golara.png') }}" alt="Golara Logo" style="width: 90%; max-width: 100px;"></figure>
                    </div>
                    <div class="signup-form" style="display: flex; flex-direction: column; align-items: right;">
                        <h2 class="form-title" style="margin-top: 0; padding-right: 10px;">Create Account</h2>
                        <form method="POST" action="{{ route('register') }}" class="register-form" id="register-form" style="width: 100%; max-width: 400px;">
                            @csrf
                            <div class="form-group" style="display: flex; flex-direction: column; align-items: center;">
                                <label for="name"><i class="zmdi zmdi-account"></i></label>
                                <input type="text" name="name" id="name" placeholder="Your Name" required style="width: 100%;" value="{{ old('name') }}"/>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group" style="display: flex; flex-direction: column; align-items: center;">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email" required style="width: 100%;" value="{{ old('email') }}"/>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group" style="display: flex; flex-direction: column; align-items: center;">
                                <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                <div class="password-group">
                                    <input type="password" name="password" id="password" placeholder="Password" required style="width: 100%;"/>
                                    <i class="fas fa-eye-slash toggle-password" onclick="togglePassword('password')"></i>
                                </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group" style="display: flex; flex-direction: column; align-items: center;">
                                <label for="password_confirmation"><i class="zmdi zmdi-lock-outline"></i></label>
                                <div class="password-group">
                                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm password" required style="width: 100%;"/>
                                    <i class="fas fa-eye-slash toggle-password" onclick="togglePassword('password_confirmation')"></i>
                                </div>
                            </div>
                            <div class="form-group form-button" style="display: flex; justify-content: center;">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                            </div>
                            <p class="loginhere" style="text-align: center;">
                                Already have an account? <a href="{{ route('login') }}" class="loginhere-link">Login here</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <script>
        function togglePassword(fieldId) {
            const passwordField = document.getElementById(fieldId);
            const toggleIcon = passwordField.nextElementSibling;
            
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            } else {
                passwordField.type = 'password';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            }
        }
    </script>

</body>
</html>