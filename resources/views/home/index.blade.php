 @extends('home.layouts.app')
 @section('content')
     <!-- Hero Section with Carousel -->
     <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
         <div class="carousel-indicators">
             <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
             <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
             <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
         </div>
         <div class="carousel-inner">
             <div class="carousel-item active">
                 <img src="{{ asset('/storage/images/hari-kesehatan-nasional.jpg') }}" class="d-block w-100" alt="Slide 1">
                 <div class="carousel-caption">
                     <h1>Welcome to Your Website</h1>
                     <p>Your main tagline goes here</p>
                     <button class="btn btn-primary btn-lg">Learn More</button>
                 </div>
             </div>
             <div class="carousel-item">
                 <img src="{{ asset('/storage/images/website-resmi-kecamatan-lubuk-keliat.png') }}" class="d-block w-100"
                     alt="Slide 2">
                 <div class="carousel-caption">
                     <h1>Quality Services</h1>
                     <p>Explore what we have to offer</p>
                     <button class="btn btn-primary btn-lg">Our Services</button>
                 </div>
             </div>
             <div class="carousel-item">
                 <img src="{{ asset('/storage/images/hari-sumpah-pemuda.jpg') }}" class="d-block w-100" alt="Slide 3">
                 <div class="carousel-caption">
                     <h1>Get in Touch</h1>
                     <p>We're here to help</p>
                     <button class="btn btn-primary btn-lg">Contact Us</button>
                 </div>
             </div>
         </div>
         <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
             <span class="carousel-control-prev-icon"></span>
         </button>
         <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
             <span class="carousel-control-next-icon"></span>
         </button>
     </div>

     <!-- Quick Links Section -->
     <section class="quick-links py-5">
         <div class="container">
             <div class="row g-4">
                 <div class="col-md-3 col-sm-6">
                     <div class="card h-100 text-center quick-link-card">
                         <div class="card-body">
                             <div class="icon-box mb-3">
                                 <i class="fas fa-file-alt fa-3x text-primary"></i>
                             </div>
                             <h5 class="card-title">Documents</h5>
                             <p class="card-text">Access important documents and forms</p>
                             <a href="#" class="btn btn-outline-primary">View More</a>
                         </div>
                     </div>
                 </div>
                 <div class="col-md-3 col-sm-6">
                     <div class="card h-100 text-center quick-link-card">
                         <div class="card-body">
                             <div class="icon-box mb-3">
                                 <i class="fas fa-calendar-alt fa-3x text-primary"></i>
                             </div>
                             <h5 class="card-title">Events</h5>
                             <p class="card-text">Check upcoming events and schedule</p>
                             <a href="#" class="btn btn-outline-primary">View More</a>
                         </div>
                     </div>
                 </div>
                 <div class="col-md-3 col-sm-6">
                     <div class="card h-100 text-center quick-link-card">
                         <div class="card-body">
                             <div class="icon-box mb-3">
                                 <i class="fas fa-info-circle fa-3x text-primary"></i>
                             </div>
                             <h5 class="card-title">Information</h5>
                             <p class="card-text">Find helpful information and guides</p>
                             <a href="#" class="btn btn-outline-primary">View More</a>
                         </div>
                     </div>
                 </div>
                 <div class="col-md-3 col-sm-6">
                     <div class="card h-100 text-center quick-link-card">
                         <div class="card-body">
                             <div class="icon-box mb-3">
                                 <i class="fas fa-phone-alt fa-3x text-primary"></i>
                             </div>
                             <h5 class="card-title">Contact</h5>
                             <p class="card-text">Get in touch with our team</p>
                             <a href="#" class="btn btn-outline-primary">View More</a>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </section>

     <!-- About Section -->
     <section class="about-section py-5 bg-light">
         <div class="container">
             <div class="row">
                 <div class="col-lg-6">
                     <h2 class="section-title">About Us</h2>
                     <div class="title-underline mb-4"></div>
                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quam velit, vulputate eu pharetra
                         nec, mattis ac neque. Duis vulputate commodo lectus, ac blandit elit tincidunt id.</p>
                     <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                         totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae
                         dicta sunt explicabo.</p>
                     <div class="mt-4">
                         <a href="#" class="btn btn-primary">Learn More</a>
                     </div>
                 </div>
                 <div class="col-lg-6">
                     <div class="about-image">
                         <img src="{{ asset('/storage/images/2.jpg') }}" alt="About Us" class="img-fluid rounded shadow">
                     </div>
                 </div>
             </div>
         </div>
     </section>

     <!-- News Section -->
     <section class="news-section py-5">
         <div class="container">
             <div class="section-header text-center mb-5">
                 <h2 class="section-title">Latest News</h2>
                 <div class="title-underline mx-auto"></div>
             </div>
             <div class="row g-4">
                 <div class="col-lg-4 col-md-6">
                     <div class="card news-card h-100">
                         <img src="{{ asset('/storage/images/2.jpg') }}" class="card-img-top" alt="News 1">
                         <div class="card-body">
                             <div class="news-date">
                                 <span class="day">15</span>
                                 <span class="month">Mar</span>
                             </div>
                             <h5 class="card-title">News Title Here</h5>
                             <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quam
                                 velit, vulputate eu pharetra nec, mattis ac neque.</p>
                             <a href="#" class="btn btn-link text-primary p-0">Read More <i
                                     class="fas fa-arrow-right ms-1"></i></a>
                         </div>
                     </div>
                 </div>
                 <div class="col-lg-4 col-md-6">
                     <div class="card news-card h-100">
                         <img src="{{ asset('/storage/images/2.jpg') }}" class="card-img-top" alt="News 2">
                         <div class="card-body">
                             <div class="news-date">
                                 <span class="day">10</span>
                                 <span class="month">Mar</span>
                             </div>
                             <h5 class="card-title">Another News Title</h5>
                             <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quam
                                 velit, vulputate eu pharetra nec, mattis ac neque.</p>
                             <a href="#" class="btn btn-link text-primary p-0">Read More <i
                                     class="fas fa-arrow-right ms-1"></i></a>
                         </div>
                     </div>
                 </div>
                 <div class="col-lg-4 col-md-6">
                     <div class="card news-card h-100">
                         <img src="{{ asset('/storage/images/2.jpg') }}" class="card-img-top" alt="News 3">
                         <div class="card-body">
                             <div class="news-date">
                                 <span class="day">05</span>
                                 <span class="month">Mar</span>
                             </div>
                             <h5 class="card-title">Third News Title</h5>
                             <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quam
                                 velit, vulputate eu pharetra nec, mattis ac neque.</p>
                             <a href="#" class="btn btn-link text-primary p-0">Read More <i
                                     class="fas fa-arrow-right ms-1"></i></a>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="text-center mt-4">
                 <a href="#" class="btn btn-outline-primary">View All News</a>
             </div>
         </div>
     </section>

     <!-- Video Section -->
     <section class="video-section py-5 bg-light">
         <div class="container">
             <div class="row align-items-center">
                 <div class="col-lg-6">
                     <div class="video-container ratio ratio-16x9 shadow">
                         <iframe width="560" height="315"
                             src="https://www.youtube.com/embed/Z2Z9V-4DMGw?si=-RM7KendcLzGY_cl"
                             title="YouTube video player" frameborder="0"
                             allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                             referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                     </div>
                 </div>
                 <div class="col-lg-6">
                     <div class="video-content ps-lg-4 mt-4 mt-lg-0">
                         <h2 class="section-title">Watch Our Video</h2>
                         <div class="title-underline mb-4"></div>
                         <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quam velit, vulputate eu
                             pharetra nec, mattis ac neque. Duis vulputate commodo lectus.</p>
                         <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                             laudantium, totam rem aperiam.</p>
                         <a href="#" class="btn btn-primary mt-3">Learn More</a>
                     </div>
                 </div>
             </div>
         </div>
     </section>

     <!-- Gallery Section -->
     <section class="gallery-section py-5">
         <div class="container">
             <div class="section-header text-center mb-5">
                 <h2 class="section-title">Photo Gallery</h2>
                 <div class="title-underline mx-auto"></div>
             </div>
             <div class="row g-4">
                 <div class="col-lg-3 col-md-4 col-6">
                     <div class="gallery-item">
                         <img src="{{ asset('images/gallery1.jpg') }}" class="img-fluid rounded" alt="Gallery Image 1">
                         <div class="gallery-overlay">
                             <a href="{{ asset('images/gallery1.jpg') }}" data-bs-toggle="lightbox">
                                 <i class="fas fa-search-plus"></i>
                             </a>
                         </div>
                     </div>
                 </div>
                 <div class="col-lg-3 col-md-4 col-6">
                     <div class="gallery-item">
                         <img src="{{ asset('images/gallery2.jpg') }}" class="img-fluid rounded" alt="Gallery Image 2">
                         <div class="gallery-overlay">
                             <a href="{{ asset('images/gallery2.jpg') }}" data-bs-toggle="lightbox">
                                 <i class="fas fa-search-plus"></i>
                             </a>
                         </div>
                     </div>
                 </div>
                 <div class="col-lg-3 col-md-4 col-6">
                     <div class="gallery-item">
                         <img src="{{ asset('images/gallery3.jpg') }}" class="img-fluid rounded" alt="Gallery Image 3">
                         <div class="gallery-overlay">
                             <a href="{{ asset('images/gallery3.jpg') }}" data-bs-toggle="lightbox">
                                 <i class="fas fa-search-plus"></i>
                             </a>
                         </div>
                     </div>
                 </div>
                 <div class="col-lg-3 col-md-4 col-6">
                     <div class="gallery-item">
                         <img src="{{ asset('images/gallery4.jpg') }}" class="img-fluid rounded" alt="Gallery Image 4">
                         <div class="gallery-overlay">
                             <a href="{{ asset('images/gallery4.jpg') }}" data-bs-toggle="lightbox">
                                 <i class="fas fa-search-plus"></i>
                             </a>
                         </div>
                     </div>
                 </div>
                 <div class="col-lg-3 col-md-4 col-6">
                     <div class="gallery-item">
                         <img src="{{ asset('images/gallery5.jpg') }}" class="img-fluid rounded" alt="Gallery Image 5">
                         <div class="gallery-overlay">
                             <a href="{{ asset('images/gallery5.jpg') }}" data-bs-toggle="lightbox">
                                 <i class="fas fa-search-plus"></i>
                             </a>
                         </div>
                     </div>
                 </div>
                 <div class="col-lg-3 col-md-4 col-6">
                     <div class="gallery-item">
                         <img src="{{ asset('images/gallery6.jpg') }}" class="img-fluid rounded" alt="Gallery Image 6">
                         <div class="gallery-overlay">
                             <a href="{{ asset('images/gallery6.jpg') }}" data-bs-toggle="lightbox">
                                 <i class="fas fa-search-plus"></i>
                             </a>
                         </div>
                     </div>
                 </div>
                 <div class="col-lg-3 col-md-4 col-6">
                     <div class="gallery-item">
                         <img src="{{ asset('images/gallery7.jpg') }}" class="img-fluid rounded" alt="Gallery Image 7">
                         <div class="gallery-overlay">
                             <a href="{{ asset('images/gallery7.jpg') }}" data-bs-toggle="lightbox">
                                 <i class="fas fa-search-plus"></i>
                             </a>
                         </div>
                     </div>
                 </div>
                 <div class="col-lg-3 col-md-4 col-6">
                     <div class="gallery-item">
                         <img src="{{ asset('images/gallery8.jpg') }}" class="img-fluid rounded" alt="Gallery Image 8">
                         <div class="gallery-overlay">
                             <a href="{{ asset('images/gallery8.jpg') }}" data-bs-toggle="lightbox">
                                 <i class="fas fa-search-plus"></i>
                             </a>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="text-center mt-4">
                 <a href="#" class="btn btn-outline-primary">View All Photos</a>
             </div>
         </div>
     </section>

     <!-- Contact Section -->
     <section class="contact-section py-5 bg-light">
         <div class="container">
             <div class="row">
                 <div class="col-lg-5">
                     <h2 class="section-title">Contact Us</h2>
                     <div class="title-underline mb-4"></div>
                     <p>Have questions or need assistance? Fill out the form and we'll get back to you as soon as
                         possible.</p>

                     <div class="contact-info mt-4">
                         <div class="d-flex mb-3">
                             <div class="contact-icon me-3">
                                 <i class="fas fa-map-marker-alt text-primary"></i>
                             </div>
                             <div>
                                 <h5 class="mb-1">Address</h5>
                                 <p class="mb-0">123 Street Name, City, Country</p>
                             </div>
                         </div>
                         <div class="d-flex mb-3">
                             <div class="contact-icon me-3">
                                 <i class="fas fa-phone-alt text-primary"></i>
                             </div>
                             <div>
                                 <h5 class="mb-1">Phone</h5>
                                 <p class="mb-0">(123) 456-7890</p>
                             </div>
                         </div>
                         <div class="d-flex mb-3">
                             <div class="contact-icon me-3">
                                 <i class="fas fa-envelope text-primary"></i>
                             </div>
                             <div>
                                 <h5 class="mb-1">Email</h5>
                                 <p class="mb-0">info@yourwebsite.com</p>
                             </div>
                         </div>
                         <div class="d-flex">
                             <div class="contact-icon me-3">
                                 <i class="fas fa-clock text-primary"></i>
                             </div>
                             <div>
                                 <h5 class="mb-1">Office Hours</h5>
                                 <p class="mb-0">Mon - Fri: 9:00 AM - 5:00 PM</p>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="col-lg-7 mt-4 mt-lg-0">
                     <div class="contact-form bg-white p-4 rounded shadow">
                         {{-- <form action="{{ route('contact.submit') }}" method="POST"> --}}
                         @csrf
                         <div class="row g-3">
                             <div class="col-md-6">
                                 <div class="form-group">
                                     <label for="name" class="form-label">Your Name</label>
                                     <input type="text" class="form-control" id="name" name="name" required>
                                 </div>
                             </div>
                             <div class="col-md-6">
                                 <div class="form-group">
                                     <label for="email" class="form-label">Your Email</label>
                                     <input type="email" class="form-control" id="email" name="email" required>
                                 </div>
                             </div>
                             <div class="col-md-6">
                                 <div class="form-group">
                                     <label for="phone" class="form-label">Phone Number</label>
                                     <input type="tel" class="form-control" id="phone" name="phone">
                                 </div>
                             </div>
                             <div class="col-md-6">
                                 <div class="form-group">
                                     <label for="subject" class="form-label">Subject</label>
                                     <input type="text" class="form-control" id="subject" name="subject" required>
                                 </div>
                             </div>
                             <div class="col-12">
                                 <div class="form-group">
                                     <label for="message" class="form-label">Message</label>
                                     <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                                 </div>
                             </div>
                             <div class="col-12">
                                 <button type="submit" class="btn btn-primary">Send Message</button>
                             </div>
                         </div>
                         </form>
                     </div>
                 </div>
             </div>
         </div>
     </section>

     <!-- Map Section -->
     <div class="map-section">
         <div class="container-fluid p-0">
             <div class="map-container">
                 <iframe
                     src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.2157306755366!2d-73.98784468505147!3d40.757921142763696!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25855c6480299%3A0x55194ec5a1ae072e!2sTimes+Square!5e0!3m2!1sen!2sus!4v1564680003009!5m2!1sen!2sus"
                     width="100%" height="400" style="border:0;" allowfullscreen loading="lazy"></iframe>
             </div>
         </div>
     </div>
 @endsection
