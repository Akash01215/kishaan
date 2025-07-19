<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>KRISHI SHATHI</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

    <!-- Existing fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet" />

    <!-- Added Caveat font -->
    <!-- <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400;700&display=swap" rel="stylesheet" /> -->

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />

    <!-- Libraries Stylesheet -->
    <link rel="stylesheet" href="{{ asset('frontend/lib/animate/animate.min.css') }}" />
    <link href="{{ asset('frontend/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet" />
    

    <!-- Template Stylesheet -->
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet" />

<!-- Bootstrap 5.3 CSS -->

    <style>
        .caveat-normal {
            font-family: "Caveat", cursive;
            font-weight: 400;
            font-style: normal;
            font-optical-sizing: auto;
            font-size: 1.1rem;
            /* Increase size */
        }

        .caveat-bold {
            font-family: "Caveat", cursive;
            font-weight: 700;
            font-style: normal;
            font-optical-sizing: auto;
            font-size: 1.2rem;
            /* Increase size */
        }

        .caveat-display-4 {
            font-family: "Caveat", cursive;
            font-weight: 700;
            font-size: 3.5rem;
            /* Bootstrap display-4 approx 3.5rem hota hai */
            line-height: 1.2;
        }
        .caveat-display-2{
            font-family: "Caveat", cursive;
            font-weight: 700;
            font-size: 1.5rem;
            /* Bootstrap display-1 approx 2.5rem hota hai */
            line-height: 1.2;
           
        }
    </style>

</head>

<body>

    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <!-- Topbar Start -->
    @include('frontend.partials.topbar')
    <!-- Topbar End -->
    

    @yield('content')
    <!-- Footer Start -->
    @include('frontend.partials.footer')
    <!-- Footer End -->

    <!-- Copyright Start -->
    <div class="container-fluid copyright py-4">
        <div class="container">
            <div class="row g-4 align-items-center">
                <div class="col-md-6 text-center text-md-start mb-md-0">
                    <span class="text-body"><a href="#" class="border-bottom text-white"><i class="fas fa-copyright text-light me-2"></i>KRISHI AI</a>, All right reserved.</span>
                </div>
               
            </div>
        </div>
    </div>
    <!-- Copyright End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-lg-square rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('frontend/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/lightbox/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('frontend/js/main.js') }}"></script>

    <script>
    window.addEventListener('scroll', function () {
        const siteName = document.getElementById('siteName');
        if (window.scrollY > 50) {
            siteName.style.color = 'black';
        } else {
            siteName.style.color = 'white';
        }
    });
</script>

    <script>
        window.addEventListener('scroll', function () {
            const siteLogo = document.getElementById('siteLogo');
            if (window.scrollY > 50) {
                siteLogo.style.height = '50px';   // slightly smaller
                siteLogo.style.width = '50px';
                siteLogo.style.border = '2px solid #000'; // black border
            } else {
                siteLogo.style.height = '60px';   // original size
                siteLogo.style.width = '60px';
                siteLogo.style.border = 'none';
            }
        });
    </script>
<script>
    window.addEventListener('scroll', function () {
        const siteName = document.getElementById('siteName');
        const siteLogo = document.getElementById('siteLogo');

        if (window.scrollY > 50) {
            siteName.style.color = 'black';
            siteLogo.style.height = '50px';   // slightly smaller
            siteLogo.style.width = '50px';
            siteLogo.style.border = '2px solid #000'; // black border
        } else {
            siteName.style.color = 'white';
            siteLogo.style.height = '60px';   // original size
            siteLogo.style.width = '60px';
            siteLogo.style.border = 'none';
        }
    });
</script>

<script>
function openLoginForm() {
  document.getElementById("loginModal").style.display = "block";
}
function closeLoginForm() {
  document.getElementById("loginModal").style.display = "none";
}
</script>

</body>

</html>