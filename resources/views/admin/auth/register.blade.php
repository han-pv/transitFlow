<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <div class="container">
        <div class="d-flex">
            <form action="{{ route('register') }}" method="POST" class="form">
                <div class="form-title">Register</div>
                @csrf
                <div>
                    <label for="name">Firsname</label><br>
                    <input type="text" id="name" name="name" required>
                    @error('name')
                    <div class="">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="name">Surname</label><br>
                    <input type="text" id="surname" name="surname" required>
                    @error('surname')
                    <div class="">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="username">Username</label><br>
                    <input type="text" id="username" name="username" required>
                    @error('username')
                    <div>{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="password">Password</label><br>
                    <input type="password" id="password" name="password" required>
                    @error('password')
                    <div>{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="password_confirmation">Password confirmation</label><br>
                    <input type="password" id="password_confirmation" name="password_confirmation" required>
                    @error('password_confirmation')
                    <div>{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>
</body>

</html>