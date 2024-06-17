<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Modal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        .profile-pic {
            width: 300px;
            height: 300px;
            border-radius: 50%;
            object-fit: cover;
        }
    </style>
</head>

<body style="background: #555; height:100vh; display: flex; justify-content: center; align-items: center;">

    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-8 p-md-5 p-3" style="background: #f0f0f0">
                <div class="row">
                    <div class="col text-end">
                        <a class="text-dark" href="{{route('profile')}}">
                            <span class="fs-4">X</span>

                        </a>
                    </div>
                </div>
                @php
                    if(auth()->user()->image){
                        $image = 'img/profile/'. auth()->user()->image;
                    }else{
                        $image = 'img/profile.png';
                    }
                @endphp
                <div class="row d-flex justify-content-between align-items-center">
                    <div class="col-md-4 mb-md-0  mb-5">
                        <img src="{{ asset($image) }}" alt="Profile Picture" class="profile-pic border border-dark ">
                    </div>
                    <div class="col-md-6 text-md-start text-center">
                        <h1 class="pb-md-5 pb-0 ">{{auth()->user()->name}}</h1>
                        <span class="fs-4">{{auth()->user()->fakultas}},{{auth()->user()->angkatan}}</span>
                    </div>
                </div>
                <div class="row d-flex justify-content-md-end justify-content-center">
                    <div class="col-5 d-flex justify-content-md-end mt-md-0 mt-3">
                        <button class="btn btn-outline-dark">See Profile</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
</body>

</html>
