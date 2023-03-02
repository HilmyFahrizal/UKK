<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <section style="background-color: #504d4e;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src={{ asset('assets/front/images/login.jpg') }} alt="login form"
                                    class="img-fluid h-100" style="border-radius: 1rem 0 0 1rem;" />
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">

                                    <form action="/daftar" method="POST">
                                        @csrf

                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <i class="fas fa-cubes fa-2x" style="color: #ff6219;"></i>
                                            <img src={{ asset('assets/front/images/logo7.png') }}>
                                        </div>

                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Daftarkan Akunmu
                                        </h5>


                                        <div class="form-outline mb-2">
                                            <label class="form-label" for="form2Example17">Nama Lengkap</label>
                                            <input type="text" id="form2Example17"
                                                class="form-control form-control-lg" name="nm_lengkap" />
                                        </div>

                                        <div class="form-outline mb-2">
                                            <label class="form-label" for="form2Example17">Nama User</label>
                                            <input type="text" id="form2Example17"
                                                class="form-control form-control-lg" name="nm_user" />
                                        </div>

                                        <div class="form-outline mb-2">
                                            <label class="form-label" for="form2Example17">Email</label>
                                            <input type="email" id="form2Example17"
                                                class="form-control form-control-lg" name="email" />
                                        </div>

                                        <div class="form-outline mb-5">
                                            <label class="form-label" for="form2Example27">Password</label>
                                            <input type="password" id="form2Example27"
                                                class="form-control form-control-lg" name="password" />
                                        </div>
                                        <div class="pt-1 mb-4 d-flex">
                                            <button class="btn btn-outline-dark btn-white btn-lg btn-block me-3"
                                                type="submit">Daftar</button>
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
                                        <p class="mb-2 pb-lg-2" style="color: #393f81;">Sudah punya akun? <a
                                                href="/login" style="color: #393f81;">Masuk</a></p>
                                </div>
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
</body>

</html>
