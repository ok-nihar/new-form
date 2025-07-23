<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #4e73df;
            --secondary-color: #f8f9fc;
            --success-color: #1cc88a;
        }
        body {
            background-color: var(--secondary-color);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .register-container {
            max-width: 500px;
            margin: 5% auto;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
            border-radius: 10px;
            overflow: hidden;
        }
        .register-header {
            background-color: var(--primary-color);
            color: white;
            padding: 1.5rem;
            text-align: center;
        }
        .register-body {
            background-color: white;
            padding: 2rem;
        }
        .btn-register {
            background-color: var(--primary-color);
            border: none;
            width: 100%;
            padding: 12px;
            font-weight: 600;
        }
        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(78, 115, 223, 0.25);
        }
        .password-strength {
            height: 5px;
            background-color: #e9ecef;
            margin-top: 5px;
            border-radius: 3px;
            overflow: hidden;
        }
        .password-strength-bar {
            height: 100%;
            width: 0%;
            transition: width 0.3s ease, background-color 0.3s ease;
        }
        .input-group-text {
            cursor: pointer;
        }
        .divider {
            display: flex;
            align-items: center;
            margin: 1.5rem 0;
        }
        .divider::before, .divider::after {
            content: "";
            flex: 1;
            border-bottom: 1px solid #e3e6f0;
        }
        .divider-text {
            padding: 0 10px;
            color: #6c757d;
            font-size: 0.8rem;
        }
        .requirements {
            font-size: 0.8rem;
            color: #6c757d;
            margin-top: 5px;
        }
        .requirement-item {
            margin-bottom: 3px;
        }
        .requirement-item.valid {
            color: var(--success-color);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="register-container">
            <div class="register-header">
                <h2>Create Your Account</h2>
                <p class="mb-0">Join our community today</p>
            </div>
            <div class="register-body">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                
                <form action="{{ route('my-form.register.store') }}" method="POST" id="registrationForm">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" 
                               value="{{ old('username') }}" placeholder="Choose a username" required>
                        @error('username') 
                            <div class="text-danger small mt-1">{{ $message }}</div> 
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" 
                               value="{{ old('email') }}" placeholder="Enter your email" required>
                        @error('email') 
                            <div class="text-danger small mt-1">{{ $message }}</div> 
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="password" name="password" 
                                   placeholder="Create a password" required>
                            <span class="input-group-text toggle-password">
                                <i class="far fa-eye"></i>
                            </span>
                        </div>
                        <div class="password-strength mt-2">
                            <div class="password-strength-bar" id="passwordStrengthBar"></div>
                        </div>
                        <div class="requirements mt-2">
                            <div class="requirement-item" id="lengthReq">At least 8 characters</div>
                            <div class="requirement-item" id="numberReq">Contains a number</div>
                            <div class="requirement-item" id="specialReq">Contains a special character</div>
                        </div>
                        @error('password') 
                            <div class="text-danger small mt-1">{{ $message }}</div> 
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="password_confirmation" 
                                   name="password_confirmation" placeholder="Confirm your password" required>
                            <span class="input-group-text toggle-password">
                                <i class="far fa-eye"></i>
                            </span>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary btn-register mb-3">Create Account</button>
                    
                    <div class="divider">
                        <span class="divider-text">ALREADY HAVE AN ACCOUNT?</span>
                    </div>
                    
                    <div class="text-center">
                        <p class="mb-0">Sign in to your account 
                            <a href="{{ route('my-form.login.create') }}" class="text-decoration-none">Login here</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Password visibility toggle
        document.querySelectorAll('.toggle-password').forEach(function(element) {
            element.addEventListener('click', function() {
                const input = this.parentElement.querySelector('input');
                const icon = this.querySelector('i');
                if (input.type === 'password') {
                    input.type = 'text';
                    icon.classList.remove('fa-eye');
                    icon.classList.add('fa-eye-slash');
                } else {
                    input.type = 'password';
                    icon.classList.remove('fa-eye-slash');
                    icon.classList.add('fa-eye');
                }
            });
        });

        // Password strength indicator
        document.getElementById('password').addEventListener('input', function() {
            const password = this.value;
            const strengthBar = document.getElementById('passwordStrengthBar');
            const lengthReq = document.getElementById('lengthReq');
            const numberReq = document.getElementById('numberReq');
            const specialReq = document.getElementById('specialReq');
            
            // Reset requirements
            lengthReq.classList.remove('valid');
            numberReq.classList.remove('valid');
            specialReq.classList.remove('valid');
            
            let strength = 0;
            
            // Check length
            if (password.length >= 8) {
                strength += 25;
                lengthReq.classList.add('valid');
            }
            
            // Check for numbers
            if (/\d/.test(password)) {
                strength += 25;
                numberReq.classList.add('valid');
            }
            
            // Check for special characters
            if (/[!@#$%^&*(),.?":{}|<>]/.test(password)) {
                strength += 25;
                specialReq.classList.add('valid');
            }
            
            // Check for uppercase and lowercase
            if (/[a-z]/.test(password) && /[A-Z]/.test(password)) {
                strength += 25;
            }
            
            // Update strength bar
            strengthBar.style.width = strength + '%';
            
            // Change color based on strength
            if (strength < 50) {
                strengthBar.style.backgroundColor = '#e74a3b'; // Red
            } else if (strength < 75) {
                strengthBar.style.backgroundColor = '#f6c23e'; // Yellow
            } else {
                strengthBar.style.backgroundColor = '#1cc88a'; // Green
            }
        });

        // Form validation
        document.getElementById('registrationForm').addEventListener('submit', function(e) {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('password_confirmation').value;
            
            if (password !== confirmPassword) {
                e.preventDefault();
                alert('Passwords do not match!');
            }
        });
    </script>
</body>
</html>