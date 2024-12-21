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
    <main class="form-signin"  >
        <form action="{{route('processRegister')}}" method="POST">
            @csrf
            <h1 class="h3 mb-3 fw-normal">Please sign up</h1>
            <div class="form-floating m-2">
                <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Enter Your Name">
                <label for="name">Name</label>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-floating m-2">
                <input type="text" class="form-control" name="phone" value="{{ old('phone') }}" id="phone" placeholder="Enter Your Phone Number">
                <label for="phone">Phone</label>
                @error('phone')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-floating m-2">
                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="name@example.com">
                <label for="email">Email</label>
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-floating m-2">
                <input type="text" class="form-control" value="{{ old('hrmsId') }}" name="hrmsId" placeholder="Hrmas Id">
                <label for="hrmsId">HRMS ID</label>
                @error('hrmsId')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div id="otpSection" style="display:none;">
                <div class="form-floating m-2">
                    <input type="text" class="form-control" name="otp" placeholder="Enter OTP" required>
                    <label for="otp">OTP</label>
                    @error('otp')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="text-success"> Resend otp after <span id="timer"></span></div>
                <div> <a href="#" class="btn btn-warning" style="display:none" id="resend_otp"
                    onclick="generateOtp()">Resend OTP</a> </div>
            </div>

            <p id="alreadyAccount">Already have an account? <a href="{{route('login')}}">click here to login</a> </p>
            <button type="button" id="sendOtpBtn" class="btn btn-warning w-100">Register</button>
            <button class="w-100 btn btn-lg btn-primary" style="display: none" type="submit" id="registerBtn">Verify Otp</button>
            {{-- <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p> --}}
        </form>
    </main>
</div>

</body>
<script>
    document.getElementById('sendOtpBtn').addEventListener('click', function () {
        const phone = document.getElementById('phone').value;
        if (!phone) {
            alert('Please enter a phone number.');
            return;
        }

        fetch("{{ route('sendOTP') }}", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ phone: phone })
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            if (data.success) {
                alert(data.message);

                document.getElementById('alreadyAccount').style.display = 'none';
                document.getElementById('otpSection').style.display = 'block';
                document.getElementById('sendOtpBtn').style.display = 'none';
                document.getElementById('registerBtn').style.display = 'block';
                timer(120);
            } else {
                alert('Error: ' + data.message);
            }
        })
        .catch(error => console.error('Error:', error));
    });
    function timer(remaining) {
        var m = Math.floor(remaining / 60);
        var s = remaining % 60;

        m = m < 10 ? '0' + m : m;
        s = s < 10 ? '0' + s : s;
        document.getElementById('timer').innerHTML = m + ':' + s;
        remaining -= 1;

        if (remaining >= 0 ) {
            setTimeout(function() {
                timer(remaining);
            }, 1000);
            return;
        }

        if (!timerOn) {
            // Do validate stuff here
            return;
        }

        // Do timeout stuff here
        $('#resend_otp').show();
        otp = '';
        console.log('expire_otp - ', otp);
    }

</script>

</html>
