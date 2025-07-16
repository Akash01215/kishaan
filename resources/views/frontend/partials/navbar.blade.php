<div class="container-fluid position-relative p-0">
    <nav id="mainNavbar" class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0 fixed-top">
        <a class="navbar-brand d-flex align-items-center gap-2" href="#">
            <img src="{{ asset($globalSettings['logo'] ?? '') }}"
                id="siteLogo"
                alt="Logo"
                style="height: 60px; width: 60px; object-fit: cover; border-radius: 50%; transition: all 0.3s ease;">

            <span id="siteName" class="fw-bold fs-5"
                style="text-transform: uppercase; font-family: 'Caveat', cursive; color: white; font-weight: 600;">
                {{ $globalSettings['sitename'] ?? 'My Site' }}
            </span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="index.html" class="nav-item nav-link caveat-bold active">Home</a>
                <a href="about.html" class="nav-item nav-link caveat-bold">About</a>
                <a href="service.html" class="nav-item nav-link caveat-bold">Services</a>
                <a href="blog.html" class="nav-item nav-link caveat-bold">Blogs</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link caveat-bold" data-bs-toggle="dropdown">
                        <span class="dropdown-toggle">Pages</span>
                    </a>
                    <div class="dropdown-menu m-0">
                        <a href="feature.html" class="dropdown-item caveat-normal">Our Features</a>
                        <a href="team.html" class="dropdown-item caveat-normal">Our Team</a>
                        <a href="testimonial.html" class="dropdown-item caveat-normal">Testimonial</a>
                        <a href="offer.html" class="dropdown-item caveat-normal">Our Offer</a>
                        <a href="FAQ.html" class="dropdown-item caveat-normal">FAQs</a>
                        <a href="404.html" class="dropdown-item caveat-normal">404 Page</a>
                    </div>
                </div>
                <a href="contact.html" class="nav-item nav-link caveat-bold">Contact Us</a>
            </div>
            <a href="#" class="btn btn-primary rounded-pill py-2 px-4 my-3 my-lg-0 flex-shrink-0">Get Started</a>
        </div>
    </nav>

    <!-- Carousel Start -->
    <div class="header-carousel owl-carousel">
        <!-- Slide 1 -->
        <div class="header-carousel-item">
            <img src="{{ asset('frontend/img/a.jpg') }}" class="img-fluid w-100" alt="Image">
            <div class="carousel-caption">
                <div class="container">
                    <div class="row gy-0 gx-5">
                        <div class="col-lg-0 col-xl-5"></div>
                        <div class="col-xl-7 animated fadeInLeft">
                            <div class="text-sm-center text-md-end">
                                <h4 class="text-primary text-uppercase fw-bold mb-4 caveat-display-4">Welcome to Krishi AI</h4>
                                <h1 class="display-4 text-uppercase text-white mb-4 caveat-display-4">Empowering Farmers with AI-based Support</h1>
                                <p class="caveat-display-2 text-white">
                                    Krishi AI is an intelligent farming assistant that helps farmers make better decisions.
                                    Whether it's choosing the right crop, suggesting the best fertilizer, or identifying
                                    plant diseases through images, our platform simplifies farming with the power of Artificial Intelligence.
                                </p>
                                <div class="d-flex justify-content-center justify-content-md-end flex-shrink-0 mb-4">
                                    <a class="btn btn-light rounded-pill py-3 px-4 px-md-5 me-2" href="#"><i class="fas fa-play-circle me-2"></i> Watch Demo</a>
                                    <a class="btn btn-primary rounded-pill py-3 px-4 px-md-5 ms-2" href="#">Learn More</a>
                                </div>
                                <div class="d-flex align-items-center justify-content-center justify-content-md-end">
                                    <h2 class="text-white me-2 caveat-bold">Follow Us:</h2>
                                    <div class="d-flex justify-content-end ms-2">
                                        <a class="btn btn-md-square btn-light rounded-circle me-2" href=""><i class="fab fa-facebook-f"></i></a>
                                        <a class="btn btn-md-square btn-light rounded-circle mx-2" href=""><i class="fab fa-twitter"></i></a>
                                        <a class="btn btn-md-square btn-light rounded-circle mx-2" href=""><i class="fab fa-instagram"></i></a>
                                        <a class="btn btn-md-square btn-light rounded-circle ms-2" href=""><i class="fab fa-linkedin-in"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slide 2 -->
        <div class="header-carousel-item">
            <img src="{{ asset('frontend/img/ak.jpg') }}" class="img-fluid w-100" alt="Image">
            <div class="carousel-caption">
                <div class="container">
                    <div class="row g-5">
                        <div class="col-12 animated fadeInUp">
                            <div class="text-center">
                                <h4 class="text-primary text-uppercase fw-bold mb-4 caveat-display-4">Smart Agriculture Solutions</h4>
                                <h1 class="display-4 text-uppercase text-white mb-4 caveat-display-4">Your Personal Digital Farming Assistant</h1>
                                <p class="mb-5 fs-5 caveat-display-2 text-white">
                                    Our multilingual AI-driven website offers features like voice-based farming queries,
                                    crop and fertilizer recommendation based on real data, and real-time plant disease prediction
                                    through image upload. Let technology transform the way you farm!
                                </p>
                                <div class="d-flex justify-content-center flex-shrink-0 mb-4">
                                    <a class="btn btn-light rounded-pill py-3 px-4 px-md-5 me-2" href="#"><i class="fas fa-play-circle me-2"></i> Watch Demo</a>
                                    <a class="btn btn-primary rounded-pill py-3 px-4 px-md-5 ms-2" href="#">Explore Features</a>
                                </div>
                                <div class="d-flex align-items-center justify-content-center">
                                    <h2 class="text-white me-2 caveat-bold">Follow Us:</h2>
                                    <div class="d-flex justify-content-end ms-2">
                                        <a class="btn btn-md-square btn-light rounded-circle me-2" href=""><i class="fab fa-facebook-f"></i></a>
                                        <a class="btn btn-md-square btn-light rounded-circle mx-2" href=""><i class="fab fa-twitter"></i></a>
                                        <a class="btn btn-md-square btn-light rounded-circle mx-2" href=""><i class="fab fa-instagram"></i></a>
                                        <a class="btn btn-md-square btn-light rounded-circle ms-2" href=""><i class="fab fa-linkedin-in"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slide 3 -->
        <div class="header-carousel-item">
            <img src="{{ asset('frontend/img/paddy01.jpg') }}" class="img-fluid w-100" alt="Farming Image">
            <div class="carousel-caption">
                <div class="container">
                    <div class="row g-5">
                        <div class="col-12 animated fadeInUp">
                            <div class="text-center">
                                <h4 class="text-primary text-uppercase fw-bold mb-4 caveat-display-4">Fertilizer Solutions</h4>
                                <h1 class="display-4 text-uppercase text-white mb-4 caveat-display-4">Balanced Soil, Better Yield</h1>
                                <p class="mb-5 fs-5 caveat-display-2 text-white">
                                    Get personalized fertilizer recommendations based on your soil’s NPK value and crop type.
                                    Our system analyzes deficiencies and provides actionable advice instantly.
                                </p>
                                <a class="btn btn-light rounded-pill py-3 px-4 px-md-5 me-2" href="#">Get Suggestion</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slide 4 -->
        <div class="header-carousel-item">
            <img src="{{ asset('frontend/img/maize01.jpg') }}" class="img-fluid w-100" alt="Disease Detection">
            <div class="carousel-caption">
                <div class="container">
                    <div class="row g-5">
                        <div class="col-12 animated fadeInUp">
                            <div class="text-center">
                                <h4 class="text-primary text-uppercase fw-bold mb-4 caveat-display-4">Plant Disease Detection</h4>
                                <h1 class="display-4 text-uppercase text-white mb-4 caveat-display-4">AI Image Analysis</h1>
                                <p class="mb-5 fs-5 caveat-display-2 text-white">
                                    Upload a photo of a diseased plant leaf and get instant diagnosis. Our system identifies the disease
                                    and recommends treatment and prevention solutions within seconds.
                                </p>
                                <a class="btn btn-primary rounded-pill py-3 px-4 px-md-5" href="#">Try It Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Carousel End -->
</div>