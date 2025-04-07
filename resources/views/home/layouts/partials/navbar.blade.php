 <!-- Top Bar -->
 <div class="top-bar bg-primary py-2">
     <div class="container">
         <div class="row">
             <div class="col-md-6">
                 <div class="d-flex text-white">
                     <div class="me-3"><i class="fas fa-phone-alt me-1"></i> (123) 456-7890</div>
                     <div><i class="fas fa-envelope me-1"></i> info@yourwebsite.com</div>
                 </div>
             </div>
             <div class="col-md-6 text-end">
                 <div class="social-icons">
                     <a href="#" class="text-white me-2"><i class="fab fa-facebook-f"></i></a>
                     <a href="#" class="text-white me-2"><i class="fab fa-twitter"></i></a>
                     <a href="#" class="text-white me-2"><i class="fab fa-instagram"></i></a>
                     <a href="#" class="text-white"><i class="fab fa-youtube"></i></a>
                 </div>
             </div>
         </div>
     </div>
 </div>

 <!-- Main Navigation -->
 <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top" style="z-index: 1030;">
     <div class="container">
         <a class="navbar-brand" href="#">
             <img src="{{ asset('/storage/images/logo.png') }}" alt="Logo" height="60">
         </a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
             <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarNav">
             <ul class="navbar-nav ms-auto">
                 <li class="nav-item">
                     <a class="nav-link active" href="{{ route('home') }}">Home</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="{{ route('home.news') }}">News</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="{{ route('home.wisata') }}">Wisata</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="#">Budaya</a>
                 </li>
                 <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                         data-bs-toggle="dropdown">
                         UMKM
                     </a>
                     <ul class="dropdown-menu">
                         <li><a class="dropdown-item" href="#">Service 1</a></li>
                         <li><a class="dropdown-item" href="#">Service 2</a></li>
                         <li><a class="dropdown-item" href="#">Service 3</a></li>
                     </ul>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="#">Penginapan</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="#">Makanan</a>
                 </li>
                 <li class="nav-item border border-primary rounded">
                     <a class="nav-link " href="{{ route('login') }}">Login</a>
                 </li>
             </ul>
         </div>
     </div>
 </nav>
