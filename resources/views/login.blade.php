<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="resources/css/bootstrap.min.css" rel="stylesheet">

    <link href="resources/css/bootstrap-icons.css" rel="stylesheet">

    <link href="resources/css/templatemo-topic-listing.css" rel="stylesheet">

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
    @endif

    <style>
        .form-signin{
            width: 33%;
            margin: 0 auto;
            margin-top: 10%;
            border: 1px solid black;
            padding: 10px;
            border-radius: 10px;
        }
    </style>
</head>

<body class=" text-center">
<div class="container">
     @if (Session::has('success'))
         <div class="alert alert-success">{{ Session::get('success') }}</div>
     @endif
    <main class="form-signin"  >
        <form action="{{route('authenticate')}}" method="POST">
            @csrf
            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

            <div class="form-floating m-2">
                <input type="text" value="{{old('phone')}}" class="form-control" @error('phone') is-invalid @enderror id="phone" name="phone" placeholder="Phone Number">
                <label for="phone">Phone Number</label>
                @error('phone')
                    <p class="invalid-feedback" >{{$message}}</p>
                @enderror
            </div>
            <div class="form-floating m-2">
                <input type="password" value="{{old('password')}}" class="form-control" @error('password') is-invalid @enderror id="password" name="password" placeholder="Password">
                <label for="password">Password</label>
                @error('password')
                    <p class="invalid-feedback" >{{$message}}</p>
                @enderror
            </div>

            <p>Don't have an account?<a href="{{route('register')}}">click here to register</a> </p>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
            {{-- <a href="http://localhost/otm/login.php">User Login</a> --}}
            {{-- <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p> --}}
        </form>
    </main>
</div>

</body>

</html>
