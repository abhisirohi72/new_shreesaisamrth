<!-- footer -->
<footer class="w3l-footer py-5">
    <div class="container pt-4">
        <div class="row">
            <div class="col-lg-4 sub-one-left">
                <h6>About </h6>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa officia dicta magni ea
                    at, culpa atque, rerum dolorum voluptas alias
                    qui temporibus ex totam distinctio nobis impedit minus rerum,
                    nihil blan ditiis quos atque.</p>
                <ul class="social mt-4 pt-lg-1">
                    <li><a href="{{ $footerDetails->fb_url ?? '' }}"><span class="fab fa-facebook-f"></span></a></li>
                    <li><a href="{{ $footerDetails->twitter_url ?? '' }}"><span class="fab fa-twitter"></span></a></li>
                    <li><a href="{{ $footerDetails->linkedin_url ?? '' }}"><span class="fab fa-linkedin-in"></span></a></li>
                    <li><a href="{{ $footerDetails->gplus_url ?? '' }}"><span class="fab fa-google-plus-g"></span></a></li>
                    <li><a href="{{ $footerDetails->insta_url ?? '' }}"><span class="fab fa-instagram"></span></a></li>
                </ul>
            </div>
            <div class="col-lg-5 col-md-6 mt-lg-0 mt-5 px-lg-5 sub-two-right">
                <h6>Recent Posts</h6>
                <div class="footer-post">
                    <ul>
                        <li><a href="#post">Suzan Lois</a></li>
                        <li class="mx-2"><a href="#post">- Nov. 21 - </a></li>
                        <li><a href="#post">3 comments</a></li>
                    </ul>
                    <p class="post-footer"><a href="#post">Delivering New Customer Experiences with Workup.</a></p>
                </div>
                <div class="footer-post mt-4">
                    <ul>
                        <li><a href="#post">Rose Alha</a></li>
                        <li class="mx-2"><a href="#post">- Nov. 21 - </a></li>
                        <li><a href="#post">3 comments</a></li>
                    </ul>
                    <p class="post-footer"><a href="#post">Discussing the current trends in the share market.</a>
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mt-lg-0 mt-5 sub-one-left">
                <h6>Contact </h6>
                <div class="column2">
                    <div class="href1"><span class="fas fa-envelope-open"></span><a
                            href="mailto:{{ $footerDetails->email ?? '' }}">{{ $footerDetails->email ?? '' }}</a>
                    </div>
                    <div class="href2 my-3"><span class="fas fa-phone-alt"></span><a
                            href="tel:{{ $footerDetails->phone ?? '' }}">{{ $footerDetails->phone ?? '' }}</a>
                    </div>
                    <div>
                        <p class="contact-para mb-3"><span class="fas fa-map-marker-alt"></span>
                            {{ $footerDetails->address ?? '' }}
                        </p>
                    </div>
                    <div>
                        <p class="contact-para"><span class="fas fa-clock"></span>Office Hours: {{ $footerDetails->office_open_time ?? '' }} - {{ $footerDetails->office_close_time ?? '' }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-footer text-center mt-5 pt-sm-4 pt-2">
            <p>{{ $footerDetails->footer_line ?? '' }}
            </p>
        </div>
    </div>
</footer>
<!-- //footer -->

<!-- Js scripts -->
<!-- move top -->
<button onclick="topFunction()" id="movetop" title="Go to top">
    <span class="fas fa-level-up-alt" aria-hidden="true"></span>
</button>
<script>
    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function () {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            document.getElementById("movetop").style.display = "block";
        } else {
            document.getElementById("movetop").style.display = "none";
        }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
</script>
<!-- //move top -->

<!-- common jquery plugin -->
<script src="{{ asset('front/assets/js/jquery-3.3.1.min.js') }}"></script>
<!-- //common jquery plugin -->

<!-- banner slider -->
<script>
    const slides = document.querySelectorAll(".slide");
    const nextButton = document.getElementById("next");
    const prevButton = document.getElementById("prev");
    const auto = true;
    const intervalTime = 5000;
    let slideInterval;

    const nextSlide = () => {
        const current = document.querySelector(".current");
        current.classList.remove("current");
        if (current.nextElementSibling) {
            current.nextElementSibling.classList.add("current");
        } else {
            slides[0].classList.add("current");
        }
    };

    const prevSlide = () => {
        const current = document.querySelector(".current");
        current.classList.remove("current");
        if (current.previousElementSibling) {
            current.previousElementSibling.classList.add("current");
        } else {
            slides[slides.length - 1].classList.add("current");
        }
    };

    nextButton.addEventListener("click", () => {
        nextSlide();
        if (auto) {
            clearInterval(slideInterval);
            slideInterval = setInterval(nextSlide, intervalTime);
        }
    });
    prevButton.addEventListener("click", () => {
        prevSlide();
        if (auto) {
            clearInterval(slideInterval);
            slideInterval = setInterval(nextSlide, intervalTime);
        }
    });

    if (auto) {
        slideInterval = setInterval(nextSlide, intervalTime);
    }
</script>
<!-- //banner slider -->

<!-- theme switch js (light and dark)-->
<script src="{{ asset('front/assets/js/theme-change.js') }}"></script>
<!-- //theme switch js (light and dark)-->

<!-- MENU-JS -->
<script>
    $(window).on("scroll", function () {
        var scroll = $(window).scrollTop();

        if (scroll >= 80) {
            $("#site-header").addClass("nav-fixed");
        } else {
            $("#site-header").removeClass("nav-fixed");
        }
    });

    //Main navigation Active Class Add Remove
    $(".navbar-toggler").on("click", function () {
        $("header").toggleClass("active");
    });
    $(document).on("ready", function () {
        if ($(window).width() > 991) {
            $("header").removeClass("active");
        }
        $(window).on("resize", function () {
            if ($(window).width() > 991) {
                $("header").removeClass("active");
            }
        });
    });
</script>
<!-- //MENU-JS -->

<!-- disable body scroll which navbar is in active -->
<script>
    $(function () {
        $('.navbar-toggler').click(function () {
            $('body').toggleClass('noscroll');
        })
    });
</script>
<!-- //disable body scroll which navbar is in active -->

<!-- bootstrap -->
<script src="{{ asset('front/assets/js/bootstrap.min.js') }}"></script>
<!-- //bootstrap -->
<!-- //Js scripts -->
</body>

</html>