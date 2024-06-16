@extends('layout.baseview')
@section('title', 'Login')
@section('style')
<style>
    .navbar-brand img {
        width: 60px;
    }
    .navbar-nav {
        align-items: center;
    }
    .navbar .navbar-nav .nav-link {
        font-size: 1.1em;
        padding: 0.5em 1em;
    }
    @media screen and (min-width: 768px) {
        .navbar-brand img {
            width: 80px;
        }
        .navbar-brand {
            margin-right: 0;
            padding: 0 1em;
        }
    }
</style>
@endsection
@section('content')
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-white">
            <div class="container-fluid">
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar1">
                    <i class="bi bi-list"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbar1">
                    <div class="navbar-nav mx-auto text-black">
                        <a href="#" class="nav-item nav-link active">Home</a>
                        <a href="#" class="nav-item nav-link active">Team</a>
                        <a href="#" class="navbar-brand d-none d-md-block">
                            <img src="{{ asset('assets/images/logo.png') }}" alt="Brand Logo">
                        </a>
                        <a href="#" class="nav-item nav-link active">About Us</a>
                        <a href="#" class="nav-item nav-link active">Contact Us</a>
                      @if(isset($pages) && $pages->isNotEmpty())
                            @foreach($pages as $page)
                                <a href="{{ url('page/' . $page->slug) }}" class="nav-item nav-link text-black">{{ $page->name }}</a>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </nav>
        <div id="carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carousel" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#carousel" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#carousel" data-bs-slide-to="2"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQO2plsuNDMcjIPjdmD8DvtPcO9b7bmV14WJw&s" class="d-block w-100" alt="Carousel 1" style="max-height: 100vh;">
                </div>
                <div class="carousel-item">
                    <img src="data:image/jpeg;base64,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" class="d-block w-100" alt="Carousel 2" style="max-height: 100vh;">
                </div>
                <div class="carousel-item">
                    <img src="data:image/jpeg;base64,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" class="d-block w-100" alt="Carousel 3" style="max-height: 100vh;">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </header>
    <main class="m-5">
        <section class="container m-4" id="about-us">
            <h6 class="display-5 text-center">About Us</h6>
            <div class="row">
                <div class="col-md-5">
                    <div class="container">
                        <img src="https://23c133e0c1637be1e07d-be55c16c6d91e6ac40d594f7e280b390.ssl.cf1.rackcdn.com/u/gpch/Park-Hotel-Group---Explore---Grand-Park-City-Hall-Facade.jpg" class="d-block w-100" alt="About us">
                    </div>
                </div>
                <div class="col-md-7">
                    <p class="text-black-50">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque modi ratione iure magnam reprehenderit quidem eum non vel voluptatibus dolorum quasi aut nobis quo placeat incidunt consequatur doloremque, aliquid at?
                    </p>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus veritatis voluptatibus sint excepturi qui veniam possimus minus, vitae, porro aliquam voluptas voluptates, harum reiciendis molestias dolore quasi beatae unde quae? Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla voluptas fuga animi, aperiam iure sed cum dicta reprehenderit maiores porro adipisci reiciendis dolores fugit nostrum quidem dolorem vel. Similique, veritatis! Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae tempore eaque voluptatem eveniet repudiandae doloremque debitis asperiores id maxime rerum cupiditate quibusdam, commodi, maiores facere quo amet ut ea mollitia. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolores suscipit eligendi, aspernatur numquam tenetur enim inventore reprehenderit voluptas placeat hic magnam accusantium. Atque iure a in eveniet quas cupiditate excepturi?
                    </p>
                </div>
            </div>
            <div class="row">
                <h6 class="display-6 text-center">What Makes us Unique</h6>
                <div class="col-md-4">
                    <div class="container text-center">
                        <span class="bi bi-person color-teal icon-lg"></span>
                        <p>Custom Tailored user Options</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="container text-center">
                        <span class="bi bi-shield-shaded color-teal icon-lg"></span>
                        <p>Privacy First Approach</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="container text-center">
                        <span class="bi bi-list color-teal icon-lg"></span>
                        <p>Multiple Variations</p>
                    </div>
                </div>
            </div>
        </section>
        <section id="team" class="container m-4">
            <h6 class="display-5 text-center">Our Innovative Team</h6>
            <div class="container">
                <div class="row">
                    <div class="col-md-4 d-flex align-items-center justify-content-center">
                        <div class="card" style="width: 300px;">
                            <img class="card-img-top" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQtNWaEvssZ7hquJIgrIXAoHSfXi0-26Empyw&s">
                            <div class="card-body text-center">
                                <h4 class="card-title">Team Member 1</h4>
                                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                                <i class="bi bi-facebook icon-sm m-2"></i>
                                <i class="bi bi-instagram icon-sm m-2"></i>
                                <i class="bi bi-linkedin icon-sm m-2"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex align-items-center justify-content-center">
                        <div class="card" style="width: 300px;">
                            <img class="card-img-top" src="https://thumbs.dreamstime.com/z/diverse-hotel-staff-diverse-hotel-staff-hospitality-employee-group-212470874.jpg">
                            <div class="card-body text-center">
                                <h4 class="card-title">Team Member 2</h4>
                                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                                <i class="bi bi-facebook icon-sm m-2"></i>
                                <i class="bi bi-instagram icon-sm m-2"></i>
                                <i class="bi bi-linkedin icon-sm m-2"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex align-items-center justify-content-center">
                        <div class="card" style="width: 300px;">
                            <img class="card-img-top" src="https://img.freepik.com/premium-photo/hospitality-excellence-friendly-professional-hotel-staff-team-generative-ai_896194-3292.jpg">
                            <div class="card-body text-center">
                                <h4 class="card-title">Team Member 3</h4>
                                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                                <i class="bi bi-facebook icon-sm m-2"></i>
                                <i class="bi bi-instagram icon-sm m-2"></i>
                                <i class="bi bi-linkedin icon-sm m-2"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="contact" class="container m-4">
            <h6 class="display-5 text-center">Contact Us</h6>
            <div class="row">
                <div class="col-md-6">
                    <div class="container p-3">
                        <p class="text-muted text-center fs-3">Here's our Contact Info</p>
                        <div class="text-black-s text-center fs-4">Our Email</div>
                        <div class="text-black-50 text-center fs-5">support@example.com</div>
                        <div class="text-black-s text-center fs-4">Our Phone No.</div>
                        <div class="text-black-50 text-center fs-5">+91 85658 98563</div>
                        <div class="text-black-s text-center fs-4">Our Address</div>
                        <div class="text-black-50 text-center fs-5">HSR Layout, Bangalore <br> Karnataka 560 XXX</div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="container">
                        <p class="text-muted text-center fs-3">You can also Write to Us</p>
                        <div class="container p-3">
                            <div class="card shadow">
                                <div class="card-body">
                                    <form>
                                        <div class="form-group">
                                            <label for="name" class="form-label">Enter Your Name</label>
                                            <input type="text" class="form-control" name="name" id="name">
                                        </div>
                                        <div class="form-group">
                                            <label for="emailid" class="form-label">Enter Your Email</label>
                                            <input type="email" class="form-control" name="email" id="emailid">
                                        </div>
                                        <div class="form-group">
                                            <label for="subject" class="form-label">Enter the subject</label>
                                            <input type="text" class="form-control" name="subject" id="subject">
                                        </div>
                                        <div class="form-group">
                                            <label for="message" class="form-label">Enter Your Message</label>
                                            <textarea class="form-control" name="message" id="message"></textarea>
                                        </div>
                                        <div class="form-group text-center">
                                            <input type="submit" class="btn btn-outline-dark" value="Send Message">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer class="bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="container m-5">
                        <img src="{{ asset('assets/images/logo.png') }}" height="20px" class="bg-white">
                        <div>
                            <p class="text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati nulla maxime, at culpa ipsa aliquam exercitationem deserunt odit incidunt a neque voluptas suscipit maiores quae dolor dolore tenetur corrupti dolorem!</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="container m-5">
                        <p class="text-white fs-5">Quick Links</p>
                        <ul class="remove-bullets remove-text-decoration">
                            <li><a href="#" class="remove-text-decoration text-white">About Us</a></li>
                            <li><a href="#" class="remove-text-decoration text-white">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="text-white text-center">
                    <p>All rights reserved &copy; 2022, <a href="1stop.ai" class="text-white">1Stop.ai</a></p>
                </div>
            </div>
        </div>
    </footer>
@endsection
@section('customjs')
<script>
    // Custom JavaScript if any
</script>
@endsection
