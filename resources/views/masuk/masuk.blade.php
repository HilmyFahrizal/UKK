<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        $white: #fff;
        $google-blue: #4285f4;
        $button-active-blue: #1669F2;

        .google-btn {
            width: 184px;
            height: 42px;
            background-color: $google-blue;
            border-radius: 2px;
            box-shadow: 0 3px 4px 0 rgba(0, 0, 0, .25);

            .google-icon-wrapper {
                position: absolute;
                margin-top: 1px;
                margin-left: 1px;
                width: 40px;
                height: 40px;
                border-radius: 2px;
                background-color: $white;
            }

            .google-icon {
                position: absolute;
                margin-top: 11px;
                margin-left: 11px;
                width: 18px;
                height: 18px;
            }

            .btn-text {
                float: right;
                margin: 11px 11px 0 0;
                color: $white;
                font-size: 14px;
                letter-spacing: 0.2px;
                font-family: "Roboto";
            }

            &:hover {
                box-shadow: 0 0 6px $google-blue;
            }

            &:active {
                background: $button-active-blue;
            }
        }

        @import url(https://fonts.googleapis.com/css?family=Roboto:500);
    </style>
</head>

<body>
    <section style="background-color: #504d4e;">
        <div class="container py-5 h-100">
            @if (session('delete'))
                <div class="alert alert-warning mb-3 col-lg-10" role="alert">
                    {{ session('delete') }}
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success mb-3 col-lg-10" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src={{ asset('assets/front/images/login.jpg') }} alt="login form" class="img-fluid"
                                    style="border-radius: 1rem 0 0 1rem;" />
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">

                                    <form action="/login" method="POST">
                                        @csrf

                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <img src={{ asset('assets/front/images/logo7.png') }} class="w-50">
                                        </div>

                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Masukkan Akun Anda
                                        </h5>

                                        <div class="form-outline mb-4">
                                            <input type="email" id="form2Example17"
                                                class="form-control form-control-lg" name="email" />
                                            <label class="form-label" for="form2Example17">Email</label>
                                        </div>

                                        <div class="form-outline mb-2">
                                            <input type="password" id="form2Example27"
                                                class="form-control form-control-lg" name="password" />
                                            <label class="form-label" for="form2Example27">Password</label>
                                            <p><a href="/cekEmail" style="color: #393f81;">Lupa Password</a></p>
                                        </div>

                                        <div class="pt-1 mb-4 d-flex">
                                            <button class="btn btn-white btn-outline-dark btn-lg btn-block me-3"
                                                type="submit">Login</button>
                                            {{-- <div class="google-btn">
                                                <a href="/auth/google"
                                                    class="d-flex align-items-center items-center btn btn-outline-dark btn-lg"
                                                    style="width: fit-content">
                                                    <div class="google-icon-wrapper">
                                                        <img class="google-icon"
                                                            src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg" />

                                                    </div>
                                                    <p class="btn-text ms-2 my-auto align-self-center"><b>Google
                                                            Login</b>
                                                    </p>
                                                </a>
                                            </div> --}}
                                        </div>
                                        <p class="mb-2 pb-lg-2" style="color: #393f81;">Belum punya akun? <a
                                                href="/daftar" style="color: #393f81;">Daftar disini</a></p>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"></script>
</body>

</html>
