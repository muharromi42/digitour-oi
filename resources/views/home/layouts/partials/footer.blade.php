    <!-- Footer -->
    <footer class="footer bg-dark text-white pt-5 pb-3">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h5 class="footer-heading mb-3">About Us</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quam velit, vulputate eu pharetra
                        nec, mattis ac neque.</p>
                    <div class="social-icons mt-3">
                        <a href="#" class="text-white me-2"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-white me-2"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-white me-2"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <h5 class="footer-heading mb-3">Quick Links</h5>
                    <ul class="list-unstyled footer-links">
                        <li><a href="#" class="text-white">Home</a></li>
                        <li><a href="#" class="text-white">About Us</a></li>
                        <li><a href="#" class="text-white">Services</a></li>
                        <li><a href="#" class="text-white">News</a></li>
                        <li><a href="#" class="text-white">Contact</a></li>
                    </ul>
                </div>
                <div class="col-md-2 mb-4">
                    <h5 class="footer-heading mb-3">Services</h5>
                    <ul class="list-unstyled footer-links">
                        <li><a href="#" class="text-white">Service 1</a></li>
                        <li><a href="#" class="text-white">Service 2</a></li>
                        <li><a href="#" class="text-white">Service 3</a></li>
                        <li><a href="#" class="text-white">Service 4</a></li>
                        <li><a href="#" class="text-white">Service 5</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mb-4">
                    <h5 class="footer-heading mb-3">Newsletter</h5>
                    <p>Subscribe to our newsletter for updates.</p>
                    {{-- <form action="{{ route('newsletter.subscribe') }}" method="POST"> --}}
                    @csrf
                    <div class="input-group">
                        <input type="email" class="form-control" name="email" placeholder="Your Email" required>
                        <button class="btn btn-primary" type="submit">Subscribe</button>
                    </div>
                    </form>
                </div>
            </div>
            <hr class="my-4 bg-secondary">
            <div class="row">
                <div class="col-md-6">
                    <p class="mb-md-0">&copy; {{ date('Y') }} Your Website. All Rights Reserved.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="mb-0">
                        <a href="#" class="text-white me-3">Privacy Policy</a>
                        <a href="#" class="text-white me-3">Terms of Service</a>
                        <a href="#" class="text-white">Sitemap</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>
