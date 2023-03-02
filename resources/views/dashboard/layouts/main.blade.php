<!--
=========================================================
* Argon Dashboard 2 - v2.0.4
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href={{ asset('./assets/dashboard/img/apple-icon.png') }}>
    <link rel="icon" type="image/png" href={{ asset('./assets/dashboard/img/favicon.png') }}>
    <title>
        Dashboard HFcamp
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href={{ asset('./assets/dashboard/css/nucleo-icons.css') }} rel="stylesheet" />
    <link href={{ asset('./assets/dashboard/css/nucleo-svg.css') }} rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href={{ asset('./assets/dashboard/css/nucleo-svg.css') }} rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href={{ asset('./assets/dashboard/css/argon-dashboard.css?v=2.0.4') }} rel="stylesheet" />
</head>

<body class="g-sidenav-show" style="background-image: url({{ asset('assets/dashboard/img/Gunung.jpg') }}); background-size: cover">
    <div class="min-height-300 position-absolute w-100"></div>
    @include('dashboard.partials.navbar')
    @include('dashboard.partials.sidebar')
    <main class="main-content position-relative border-radius-lg ">
        <!-- Navbar -->
        <!-- End Navbar -->
        @yield('container')
    </main>
    <!--   Core JS Files   -->
    <script src={{ asset('./assets/dashboard/js/core/popper.min.js') }}></script>
    <script src={{ asset('./assets/dashboard/js/core/bootstrap.min.js') }}></script>
    <script src={{ asset('./assets/dashboard/js/plugins/perfect-scrollbar.min.js') }}></script>
    <script src={{ asset('./assets/dashboard/js/plugins/smooth-scrollbar.min.js') }}></script>
    <script src={{ asset('./assets/dashboard/js/plugins/chartjs.min.js') }}></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @yield('script')
    <script>
        var ctx1 = document.getElementById("chart-line").getContext("2d");

        var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

        gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
        gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
        gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
        new Chart(ctx1, {
            type: "line",
            data: {
                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Mobile apps",
                    tension: 0.4,
                    borderWidth: 0,
                    pointRadius: 0,
                    borderColor: "#5e72e4",
                    backgroundColor: gradientStroke1,
                    borderWidth: 3,
                    fill: true,
                    data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                    maxBarThickness: 6

                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#fbfbfb',
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#ccc',
                            padding: 20,
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });
    </script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src={{ asset('./assets/dashboard/js/core/popper.min.js') }}></script>
</body>

</html>
