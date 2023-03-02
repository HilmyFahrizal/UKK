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

                                    <form method="POST">
                                        @csrf

                                        <input type="hidden" name="currentEmail" value="{{ encrypt($user->email) }}">
                                        <input type="hidden" name="token" value="{{ encrypt($user->created_at) }}">

                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <i class="fas fa-cubes fa-2x" style="color: #ff6219;"></i>
                                            <img src={{ asset('assets/front/images/logo7.png') }}>
                                        </div>

                                        @if (session('error'))
                                            <div class="alert alert-danger mb-3 col-lg-10" role="alert">
                                                {{ session('error') }}
                                            </div>
                                        @endif

                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Buat Password Baru
                                        </h5>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form2Example17">Password baru</label>
                                            <input type="text" id="form2Example17"
                                                class="form-control form-control-lg" name="password" />
                                        </div>

                                        <div class="pt-1 mb-4 d-flex">
                                            <button class="btn btn-outline-dark btn-white btn-lg btn-block me-3"
                                                type="submit">Reset Password</button>
                                        </div>
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
