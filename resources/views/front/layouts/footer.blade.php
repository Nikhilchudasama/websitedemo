<footer class="footer section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-12 col-sm-12 mb-sm-45">
                <div class="footer-block about-us-block text-center">
                    <a href="{{ route('front_home') }}">
                        <img src="{{ asset('images/logo.png') }}" width="150" alt="Yumsenghub">
                    </a>

                    <p>
                        Gumbo beet greens corn soko endive gum gourd. Parsley allot courgette tatsoi pea sprouts fava bean soluta nobis est ses eligendi optio.
                    </p>

                    <ul class="footer-social-icon list-none-ib">
                        <li>
                            <a href="http://facebook.com/" target="_blank">
                                <i class="fab fa-facebook-f" aria-hidden="true"></i>
                            </a>
                        </li>

                        <li>
                            <a href="https://twitter.com/" target="_blank">
                                <i class="fab fa-twitter" aria-hidden="true"></i>
                            </a>
                        </li>

                        <li>
                            <a href="https://www.pinterest.com/" target="_blank">
                                <i class="fab fa-pinterest-p" aria-hidden="true"></i>
                            </a>
                        </li>

                        <li>
                            <a href="https://plus.google.com/" target="_blank">
                                <i class="fab fa-google-plus-g" aria-hidden="true"></i>
                            </a>
                        </li>

                        <li>
                            <a href="https://www.instagram.com/" target="_blank">
                                <i class="fab fa-instagram" aria-hidden="true"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-4 mb-sm-45">
                <div class="footer-block information-block">
                    <h6>
                        Information
                    </h6>

                    <ul>
                        <li>
                            <a href="#">
                                About Us
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Contact Us
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('front_faq') }}">
                                FAQ
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('front_privacy__and_policy') }}">
                                Privacy And Policy
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('front_return_and_refund') }}">
                                Return And Refund
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-4 mb-sm-45">
                <div class="footer-block links-block">
                    <h6>
                        Our Links
                    </h6>

                    <ul>
                        <li>
                            <a href="#">
                                Popular Brands
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Royal Stag
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Bagpiper
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Antiquity
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Blue Riband
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-12">
                <div class="footer-block contact-block">
                    <h6>
                        Contact
                    </h6>

                    <ul>
                        <li>
                            <i class="far fa-compass" aria-hidden="true"></i>
                            1 Wintergreen Dr. Huntley
                            <br>
                            IL 60142, Usa
                        </li>

                        <li>
                            <i class="far fa-envelope" aria-hidden="true"></i>
                            <a href="mailto:info@yumsenghub.com">
                                info@yumsenghub.com
                            </a>
                        </li>

                        <li>
                            <i class="far fa-id-badge" aria-hidden="true"></i>
                            (013) 456789
                        </li>

                        <li>
                            <i class="far fa-comments" aria-hidden="true"></i>
                            89567989
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="copyrights">
            <p class="copyright">
                Copyright &copy; YUMSENGHUB {{ date('Y') }}
            </p>
            <p class="payment">
                <img src="{{ asset('/images/payment-logos.png') }}" alt="Payment logos">
            </p>
        </div>
    </div>
</footer>
