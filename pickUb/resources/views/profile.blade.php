<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        .profile-pic {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-5 p-3" style="background: #f0f0f0">
                <div class="row">
                    <div class="col-5">
                        <a class="text-dark" href="{{route('index')}}">
                            <i class="bi bi-chevron-left fs-2"></i>
                        </a>
                        <h2 class="text-center">Edit Profile</h2>
                    </div>
                </div>
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}

                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>

                    </div>
                @endif
                @php
                    if(auth()->user()->image){
                        $image = 'img/profile/'. auth()->user()->image;
                    }else{
                        $image = 'img/profile.png';
                    }
                @endphp
                <div class="row" style="background: linear-gradient(to bottom, #f0f0f0 50%, #636363 50%);">
                    <div class="col text-center">
                        <img src="{{ asset($image) }}" alt="Profile Picture" class="profile-pic"
                            data-bs-toggle="modal" data-bs-target="#image" style="cursor: pointer">
                    </div>
                </div>
                <form action="{{ route('profile.store') }}" method="post">
                    @csrf
                    <div class="row pt-2 d-flex justify-content-center" style="background: #636363">
                        <div class="col-11">
                            <div class=" m-3 form-group text-light">
                                <label for="name">Nama lengkap</label>
                                <input type="text" class="form-control rounded-0" id="name" name="name"
                                    placeholder="Input User Text" value="{{ auth()->user()->name }}">
                            </div>
                            <div class=" m-3 form-group text-light">
                                <label for="noHp">Nomor Ponsel</label>
                                <input type="text" class="form-control rounded-0" id="noHp" name="noHp"
                                    placeholder="Input User Text" value="{{ auth()->user()->noHp }}">
                            </div>
                            <div class=" m-3 form-group text-light">
                                <label for="email">Masukkan alamat email</label>
                                <input type="email" class="form-control rounded-0" id="email" name='email'
                                    placeholder="Input User Text" value="{{ auth()->user()->email }}">
                            </div>

                            <div class=" m-3 form-group text-light">
                                <label>Akun yang terhubung</label>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="background: #f0f0f0">
                        <div class="col">
                            <div class="row border border-dark">
                                <div class="col-3">
                                    <img src="{{ asset('img/facebook.png') }}" alt="" class="img-fluid"
                                        width="100" height="100">

                                </div>
                                <div class="col-2 d-flex justify-content-start align-items-center">
                                    <p class="fs-5 mt-3">Facebook</p>
                                </div>
                                <div class="col-7 d-flex justify-content-end align-items-center">
                                    @if (auth()->user()->facebook)
                                        <div class="form-check form-switch">
                                            <input class="form-check-input fs-1" name="facebook" type="checkbox" role="switch"
                                                id="flexSwitchCheckDefault"  {{auth()->user()->status_facebook == 'on' ? 'checked' : ''}}>
                                        </div>
                                    @else
                                        <button type="button" class="btn btn-primary rounded-0"
                                         data-bs-toggle="modal" data-bs-target="#akun">Buat</button>
                                    @endif
                                </div>
                            </div>
                            <div class="row border border-dark">
                                <div class="col-3 p-3 d-flex justify-content-center">
                                    <img src="{{ asset('img/Google.png') }}" alt="" class="img-fluid"
                                        width="60" height="60">

                                </div>
                                <div class="col-2 d-flex justify-content-start align-items-center">
                                    <p class="fs-5 mt-3">Google</p>
                                </div>
                                <div class="col-7 d-flex justify-content-end align-items-center">
                                    @if (auth()->user()->google)
                                        <div class="form-check form-switch">
                                            <input class="form-check-input fs-1" name="google" type="checkbox" role="switch"
                                                id="flexSwitchCheckDefault" {{auth()->user()->status_google == 'on' ? 'checked' : ''}}>
                                        </div>
                                    @else
                                        <button type="button" class="btn btn-primary rounded-0"
                                         data-bs-toggle="modal" data-bs-target="#akun">Buat</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row p-4" style="background: #636363">
                        <div class="col d-flex justify-content-center">
                            <button type="submit" class="btn btn-outline-dark fs-4 ">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="akun" tabindex="-1" aria-labelledby="akunLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="akunLabel">Update Profile</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('profile.akun') }}" method="POST" >
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label for="facebook">Facebook</label>
                            <input type="text" class="form-control" placeholder="Masukan akun" id="facebook" name="facebook" value="{{auth()->user()->facebook}}">
                        </div>
                        <div class="form-group">
                            <label for="google">Google</label>
                            <input type="text" class="form-control" placeholder="Masukan akun" id="google" name="google" value="{{auth()->user()->google}}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>







    <div class="modal fade" id="image" tabindex="-1" aria-labelledby="imageLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="imageLabel">Update Profile</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('profile.image') }}" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label for="image">Ubah profile</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
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

</body>

</html>
