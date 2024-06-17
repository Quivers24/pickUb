<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        .profile-pic {
            width: 350px;
            height: 350px;
            /* border-radius: 50%; */
            object-fit: cover;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row p-3" style="background: #7EBEE0">
            <div class="col-1 d-flex mt-2">
                <a class="text-dark" href="{{route('pop-up')}}">
                    <i class="bi bi-chevron-left fs-2"></i>
                </a>
            </div>
            <div class="col-10 text-start ">
                <h1>{{auth()->user()->name}} Profile</h1>
            </div>
        </div>
        @php
            if (auth()->user()->image) {
                $image = 'img/profile/' . auth()->user()->image;
            } else {
                $image = 'img/profile.png';
            }
        @endphp
        <div class="row d-flex justify-content-center m-5">
            <div class="col-md-5">
                <img src="{{ asset($image) }}" alt="Profile Picture" class="profile-pic rounded-circle">
            </div>
            <div class="col-md-5">
                <h1>Orang</h1>
                <p class="fs-2">{{ auth()->user()->name }}</p>
                <p class="fs-2">{{ auth()->user()->fakultas }},{{auth()->user()->angkatan}}</p>

                <p class="fs-2">{{ auth()->user()->email }}</p>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>
</body>

</html>
