@extends('layouts.app')

@section('content')

    <section id="hero-section" class="position-relative" style="height: auto;">
        <img src="{{ asset('img/banner3.jpg') }}" alt="Banner" class="object-fit-cover banner-img"
            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; z-index: 1;">

        <div class="hero-text-overlay py-5">
            <div class="container text-white">
                <p class="quiz-heading">Compare Alternatives</p>
                <p class="quiz-subtext">Take our short quiz to find an Auto Warranty suited to you.</p>

                <!-- Quiz starts directly below text -->
                <div class="quiz-content-box mt-4">
                    <form id="quiz-start-form">
                        <h3 class="quiz-question">Choose your vehicle type:</h3>


                        <div class="vehicle-grid">
                            <button type="button" class="vehicle-option" data-value="Hatchback">
                                <span class="vehicle-img">
                                    <img src="https://images-ulpn.ecs.prd9.eu-west-1.mvfglobal.net/wp-content/uploads/2025/05/hatchback.svg?width=58&height=25&format=webply"
                                        alt="Hatchback" />
                                </span>
                                <span class="vehicle-label">Hatchback <span class="arrow">→</span></span>
                            </button>

                            <button type="button" class="vehicle-option" data-value="Sedan">
                                <span class="vehicle-img">
                                    <img src="https://images-ulpn.ecs.prd9.eu-west-1.mvfglobal.net/wp-content/uploads/2025/05/sedan.svg?width=58&height=25&format=webply"
                                        alt="Sedan" />
                                </span>
                                <span class="vehicle-label">Sedan <span class="arrow">→</span></span>
                            </button>

                            <button type="button" class="vehicle-option" data-value="Coupe">
                                <span class="vehicle-img">
                                    <img src="https://images-ulpn.ecs.prd9.eu-west-1.mvfglobal.net/wp-content/uploads/2025/05/coupe.svg?width=63&height=25&format=webply"
                                        alt="Coupe" />
                                </span>
                                <span class="vehicle-label">Coupe <span class="arrow">→</span></span>
                            </button>

                            <button type="button" class="vehicle-option" data-value="Truck">
                                <span class="vehicle-img">
                                    <img src="https://images-ulpn.ecs.prd9.eu-west-1.mvfglobal.net/wp-content/uploads/2025/05/truck-1.svg?width=51&height=25&format=webply"
                                        alt="Truck" />
                                </span>
                                <span class="vehicle-label">Truck <span class="arrow">→</span></span>
                            </button>

                            <button type="button" class="vehicle-option" data-value="SUV">
                                <span class="vehicle-img">
                                    <img src="https://images-ulpn.ecs.prd9.eu-west-1.mvfglobal.net/wp-content/uploads/2025/05/suv.svg?width=51&height=25&format=webply"
                                        alt="SUV" />
                                </span>
                                <span class="vehicle-label">SUV <span class="arrow">→</span></span>
                            </button>

                            <button type="button" class="vehicle-option" data-value="Other">
                                <span class="vehicle-img">
                                    <img src="https://images-ulpn.ecs.prd9.eu-west-1.mvfglobal.net/wp-content/uploads/2025/05/question.svg?width=16&height=25&format=webply"
                                        alt="Other" />
                                </span>
                                <span class="vehicle-label">Other <span class="arrow">→</span></span>
                            </button>
                        </div>

                        <input type="hidden" name="car_make" id="car-make" required>

                        <p class="quiz-disclaimer">
                            <span class="quiz-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" fill="none"
                                    viewBox="0 0 25 24">
                                    <path
                                        d="M11.45 16.55L17.1 10.9 15.675 9.475 11.45 13.7 9.325 11.575 7.9 13l3.55 3.55ZM12.5 22a9.5 9.5 0 1 1 0-19 9.5 9.5 0 0 1 0 19ZM6.1 2.35 7.5 3.75 3.25 8 1.85 6.6 6.1 2.35ZM18.9 2.35 23.15 6.6 21.75 8 17.5 3.75 18.9 2.35Z"
                                        fill="#1C1B1F" />
                                </svg>
                            </span>
                            It only takes a minute!
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section id="card-section">
        <div class="container">
            <h3 class="mt-5 mb-3" style="font-weight: 700;">Our providers</h3>

            <div class="mb-4">
                <!-- endurance card -->
                <div class="service-card">
                    <div class="card-header">
                        <div class="logo-section">
                            <div class="logo">
                                <img src="/img/1.png" alt="">
                            </div>
                            <div class="promo-badge">
                                $300 off any new plan!
                            </div>
                            <div class="rating-section">
                                <div class="rating-score">9.9</div>
                                <div class="stars">★★★★★</div>
                            </div>
                            <div class="cta-section">
                                <button class="get-quote-btn">Get a Quote</button>
                            </div>
                        </div>
                    </div>
                    <div class="divider-line"></div>
                    <div class="card-body-row">
                        <div class="description">
                            Endurance offers flexibility to choose your certified mechanic, and a 30-day money-back
                            guarantee
                            for
                            peace of mind. Also, get a free Year of Elite Benefits featuring 24/7 Roadside Assistance,
                            Complete
                            Tire
                            Coverage, Key Replacement, and more!
                        </div>

                        <div class="features-grid">
                            <div class="feature">
                                <span class="checkmark">✓</span>
                                <span>Covers cars up to 20 years old/200K miles</span>
                            </div>
                            <div class="feature">
                                <span class="checkmark">✓</span>
                                <span>1 year of FREE Elite Benefits</span>
                            </div>
                            <div class="feature">
                                <span class="checkmark">✓</span>
                                <span>Flexible down payment to fit your budget</span>
                            </div>
                            <div class="feature">
                                <span class="checkmark">✓</span>
                                <span>6 coverage plans to choose from</span>
                            </div>
                            <div class="feature">
                                <span class="checkmark">✓</span>
                                <span>No obligation fast quote</span>
                            </div>
                            <div class="feature">
                                <span class="checkmark">✓</span>
                                <span>30 Day money back guarantee</span>
                            </div>
                            <div class="feature">
                                <span class="checkmark">✓</span>
                                <span> Quick and easy claims process</span>
                            </div>
                        </div>
                    </div>
                    <button class="learn-more-btn">Learn More</button>
                </div>

                <!-- american dream card -->
                <div class="service-card">
                    <div class="card-header">
                        <div class="logo-section">
                            <div class="logo">
                                <img src="/img/american-dream.png" alt="">
                            </div>
                            <div class="promo-badge">
                                $350 off + 3 months free!
                            </div>
                            <div class="rating-section">
                                <div class="rating-score">8.4</div>
                                <div class="stars">★★★★☆</div>
                            </div>
                            <div class="cta-section">
                                <button class="get-quote-btn">Get a Quote</button>
                            </div>
                        </div>
                    </div>
                    <div class="divider-line"></div>
                    <div class="card-body-row">
                        <div class="description">
                            American Dream Auto Protect provides peace of mind by mitigating the high costs that come with
                            unexpected repairs. Their stress-free claims process means you get approved in as little as 48
                            hours.
                        </div>

                        <div class="features-grid">
                            <div class="feature">
                                <span class="checkmark">✓</span>
                                <span>Choose your own repair facility</span>
                            </div>
                            <div class="feature">
                                <span class="checkmark">✓</span>
                                <span>Covers cars up to 20 years old / 200K miles</span>
                            </div>
                            <div class="feature">
                                <span class="checkmark">✓</span>
                                <span>Customize your coverage plan</span>
                            </div>
                            <div class="feature">
                                <span class="checkmark">✓</span>
                                <span>OFFER: $350 off + 3 months free!</span>
                            </div>
                            <div class="feature">
                                <span class="checkmark">✓</span>
                                <span>Flexible payment plan options</span>
                            </div>
                            <div class="feature">
                                <span class="checkmark">✓</span>
                                <span>24/7 Roadside Assistance</span>
                            </div>
                            <div class="feature">
                                <span class="checkmark">✓</span>
                                <span>30 Day money back guarantee</span>
                            </div>
                        </div>
                    </div>
                    <button class="learn-more-btn">Learn More</button>
                </div>

                <!-- elite card -->
                {{-- <div class="service-card">
                    <div class="card-header">
                        <div class="logo-section">
                            <div class="logo">
                                <img src="/img/elite.webp" alt="">
                            </div>
                            <div class="promo-badge">
                                Up to $450 OFF + Free Rim & Tire Protection w/ White Glove Upgrade!
                            </div>
                            <div class="rating-section">
                                <div class="rating-score">8.1</div>
                                <div class="stars">★★★★☆</div>
                            </div>
                            <div class="cta-section">
                                <button class="get-quote-btn">Get a Quote</button>
                            </div>
                        </div>
                    </div>
                    <div class="divider-line"></div>
                    <div class="card-body-row">
                        <div class="description">
                            Elite Auto Protect prides itself on exceptional customer service and transparent, hassle-free
                            claims processing, setting the standard for automotive warranty providers.
                        </div>

                        <div class="features-grid">
                            <div class="feature">
                                <span class="checkmark">✓</span>
                                <span>Zero Deductible!</span>
                            </div>
                            <div class="feature">
                                <span class="checkmark">✓</span>
                                <span>#1 Rated in customer Service</span>
                            </div>
                            <div class="feature">
                                <span class="checkmark">✓</span>
                                <span>Cars covered from 1999</span>
                            </div>
                            <div class="feature">
                                <span class="checkmark">✓</span>
                                <span>Monthly Payment Options available</span>
                            </div>
                            <div class="feature">
                                <span class="checkmark">✓</span>
                                <span>Fully Transferable</span>
                            </div>
                            <div class="feature">
                                <span class="checkmark">✓</span>
                                <span>No obligation fast quote</span>
                            </div>
                            <div class="feature">
                                <span class="checkmark">✓</span>
                                <span>Camper/Motorcycle Coverage Available</span>
                            </div>
                        </div>
                    </div>
                    <button class="learn-more-btn">Learn More</button>
                </div> --}}

                <!-- omega card -->
                <div class="service-card">
                    <div class="card-header">
                        <div class="logo-section">
                            <div class="logo">
                                <img src="/img/omega.png" alt="">
                            </div>
                            <div class="promo-badge">

                            </div>
                            <div class="rating-section">
                                <div class="rating-score">7.9</div>
                                <div class="stars">★★★★☆</div>
                            </div>
                            <div class="cta-section">
                                <button class="get-quote-btn">Get a Quote</button>
                            </div>
                        </div>
                    </div>
                    <div class="divider-line"></div>
                    <div class="card-body-row">
                        <div class="description">
                            Once you sign your Omega Auto Care vehicle service contract, you gain access to several member
                            benefits. And these are more than just simple perks, with benefits that will give you the peace
                            of mind and customer service you deserve.
                        </div>

                        <div class="features-grid">
                            <div class="feature">
                                <span class="checkmark">✓</span>
                                <span>Comprehensive coverage</span>
                            </div>
                            <div class="feature">
                                <span class="checkmark">✓</span>
                                <span>Peace of mind with great customer service</span>
                            </div>
                            <div class="feature">
                                <span class="checkmark">✓</span>
                                <span>Roadside assistance</span>
                            </div>
                            <div class="feature">
                                <span class="checkmark">✓</span>
                                <span>Flexible plans tailored to different needs</span>
                            </div>
                            <div class="feature">
                                <span class="checkmark">✓</span>
                                <span>Nationwide network of authorized repair facilities</span>
                            </div>
                            <div class="feature">
                                <span class="checkmark">✓</span>
                                <span>Road Hazard Coverage</span>
                            </div>
                        </div>
                    </div>
                    <button class="learn-more-btn">Learn More</button>
                </div>

                <!-- naac card -->
                <div class="service-card">
                    <div class="card-header">
                        <div class="logo-section">
                            <div class="logo">
                                <img src="/img/naac.png" alt="">
                            </div>
                            <div class="promo-badge">

                            </div>
                            <div class="rating-section">
                                <div class="rating-score">7.1</div>
                                <div class="stars">★★★★☆</div>
                            </div>
                            <div class="cta-section">
                                <button class="get-quote-btn">Get a Quote</button>
                            </div>
                        </div>
                    </div>
                    <div class="divider-line"></div>
                    <div class="card-body-row">
                        <div class="description">
                            North American auto care offers convenient access to a variety of services provided by trained
                            technicians, with readily available parts and potential warranty coverage for added peace of
                            mind.
                        </div>

                        <div class="features-grid">
                            <div class="feature">
                                <span class="checkmark">✓</span>
                                <span>Variety of services</span>
                            </div>
                            <div class="feature">
                                <span class="checkmark">✓</span>
                                <span>Trained & certified professionals</span>
                            </div>
                            <div class="feature">
                                <span class="checkmark">✓</span>
                                <span>No obligation quote</span>
                            </div>
                            <div class="feature">
                                <span class="checkmark">✓</span>
                                <span>Easy access to replacements</span>
                            </div>
                            <div class="feature">
                                <span class="checkmark">✓</span>
                                <span>Over 100 years of combined experience</span>
                            </div>
                            <div class="feature">
                                <span class="checkmark">✓</span>
                                <span>Numerous service centers across North America</span>
                            </div>
                        </div>
                    </div>
                    <button class="learn-more-btn">Learn More</button>
                </div>
            </div>

            <div class="mt-5 divider-line"></div>
            <h3 class="mt-5 mb-3" style="font-weight: 700;">Looking for a quick solution? Buy your Auto Warranty direct
                today!</h3>

            <div class="mb-4">
                <!-- chaiz card -->
                <div class="service-card">
                    <div class="card-header">
                        <div class="logo-section">
                            <div class="logo">
                                <img src="/img/chaiz.png" alt="">
                            </div>
                            <div class="promo-badge">
                                Buy directly online
                            </div>
                            <div class="rating-section">
                                <div class="rating-score">7.9</div>
                                <div class="stars">★★★★★</div>
                            </div>
                            <div class="cta-section">
                                <button class="get-quote-btn">Buy Now</button>
                            </div>
                        </div>
                    </div>
                    <div class="divider-line"></div>
                    <div class="card-body-row">
                        <div class="description">
                            Chaiz shows you several plans from multiple providers within 30 seconds. Compare and buy
                            breakdown protection from top providers today.
                        </div>

                        <div class="features-grid">
                            <div class="feature">
                                <span class="checkmark">✓</span>
                                <span>Compare live quotes within less than a minute</span>
                            </div>
                            <div class="feature">
                                <span class="checkmark">✓</span>
                                <span>Best price guaranteed</span>
                            </div>
                            <div class="feature">
                                <span class="checkmark">✓</span>
                                <span>Purchase completely online 24/7</span>
                            </div>
                            <div class="feature">
                                <span class="checkmark">✓</span>
                                <span>No email or phone needed</span>
                            </div>
                            <div class="feature">
                                <span class="checkmark">✓</span>
                                <span>Independent and unbiased</span>
                            </div>
                            <div class="feature">
                                <span class="checkmark">✓</span>
                                <span>Hundreds of 5* reviews</span>
                            </div>
                            <div class="feature">
                                <span class="checkmark">✓</span>
                                <span>A+ customer service</span>
                            </div>
                            <div class="feature">
                                <span class="checkmark">✓</span>
                                <span>30-day money back guarantee</span>
                            </div>
                        </div>
                    </div>
                    <button class="learn-more-btn">Learn More</button>
                </div>
            </div>
        </div>
    </section>


    <section id="get-matched" style="padding: 40px 0;">
        <div class="container">
            <h1 class="match-title">How we match you with the right provider</h1>

            <div class="match-steps-container">
                <div class="match-step">
                    <div class="match-step-icon">
                        <img src="/img/icon.svg" alt="">
                    </div>
                    <h3 class="match-step-title">Your vehicle</h3>
                    <p class="match-step-description">Tell us a bit about your vehicle and what you need covered.</p>
                </div>

                <div class="match-step">
                    <div class="match-step-icon">
                        <img src="/img/icon2.svg" alt="">
                    </div>
                    <h3 class="match-step-title">Our network</h3>
                    <p class="match-step-description">We'll search our network of top providers to find the right match for
                        you.</p>
                </div>

                <div class="match-step">
                    <div class="match-step-icon">
                        <img src="/img/icon3.svg" alt="">
                    </div>
                    <h3 class="match-step-title">Your quote</h3>
                    <p class="match-step-description">Receive your personalized match and a quote specific to your needs.
                    </p>
                </div>
            </div>

            <button class="match-cta-button">Get Matched</button>
        </div>
    </section>

    <section id="score-section" class="score-section">
        <div class="container">
            <div class="score-content">
                <h1 class="score-title">How we work our magic</h1>
                <p class="score-description">
                    Our ratings are scored on a scale of up to 10 and are assessed based on
                    three parameters - <span class="score-highlight">Successful matches, brand engagement and
                        coverage</span>.
                </p>
                <button class="score-cta-button">More about our scores</button>
            </div>

            <div class="score-illustration">
                <img src="/img/icon4.svg" alt="">
            </div>
        </div>
    </section>

    <section class="faq-section container my-5">
        <div class="faq-card border-light shadow-sm">
            <div class="faq-card-body p-4">
                <h2 class="faq-card-title h4 mb-4">Frequently Asked Questions</h2>

                <div class="faq-accordion">
                    <!-- FAQ Item 1 -->
                    <div class="faq-item mb-3">
                        <button
                            class="faq-question btn btn-link text-left p-0 w-100 d-flex justify-content-between align-items-center">
                            <span>Our Comprehensive Review Process for Extended Car Warranties</span>
                            <span class="faq-icon">+</span>
                        </button>
                        <div class="faq-answer mt-2 d-none">
                            <p>We thoroughly evaluate each plan based on factors like coverage scope, options, pricing,
                                availability, support, and claims processing. This rigorous review process enables us to
                                recommend only the top extended car warranty providers.
                            </p>
                        </div>
                    </div>

                    <div class="faq-item mb-3">
                        <button
                            class="faq-question btn btn-link text-left p-0 w-100 d-flex justify-content-between align-items-center">
                            <span>Who Benefits from an Extended Car Warranty?</span>
                            <span class="faq-icon">+</span>
                        </button>
                        <div class="faq-answer mt-2 d-none">
                            <p>Typically, car owners seek extended warranties after their factory warranty expires (usually
                                between 3-5 years or 36,000-60,000 miles). An extended warranty prolongs your car's
                                protection, saving you money and providing peace of mind for future repairs.
                            </p>
                        </div>
                    </div>

                    <!-- FAQ Item 2 -->
                    <div class="faq-item mb-3">
                        <button
                            class="faq-question btn btn-link text-left p-0 w-100 d-flex justify-content-between align-items-center">
                            <span>Selecting the Right Plan</span>
                            <span class="faq-icon">+</span>
                        </button>
                        <div class="faq-answer mt-2 d-none">
                            <p>When selecting a plan, consider your vehicle's age, mileage, typical repair costs, and your
                                budget. Look for coverage that matches your vehicle's most likely repair needs while fitting
                                your financial situation.</p>

                            <ul>
                                <li><strong>Bumper-to-Bumper Warranties:</strong> Comprehensive coverage for most mechanical
                                    systems, excluding explicitly listed items.</li>
                                <li><strong>Powertrain Warranties:</strong> Covers engine, transmission, and related
                                    components.</li>
                                <li><strong>Wear-and-Tear Warranties:</strong> Repairs or replacements due to natural wear
                                    and tear.</li>
                                <li><strong>Maintenance Plans:</strong> Covers routine maintenance, plus some wear-and-tear
                                    parts.</li>
                                <li><strong>Emission Warranties:</strong> Protects against emission-related failures.</li>
                                <li><strong>Factory Accessory Plans:</strong> Extended coverage for factory-installed
                                    accessories.</li>
                                <li><strong>Rust or Corrosion Warranties:</strong> Covers repairs due to rust-through
                                    problems.</li>
                            </ul>
                        </div>

                    </div>

                    <!-- FAQ Item 3 -->
                    <div class="faq-item mb-3">
                        <button
                            class="faq-question btn btn-link text-left p-0 w-100 d-flex justify-content-between align-items-center">
                            <span>Sustainability Model</span>
                            <span class="faq-icon">+</span>
                        </button>
                        <div class="faq-answer mt-2 d-none">
                            <p>With numerous options available, choosing the best car warranty can be overwhelming. Our
                                reviews and ratings help you compare companies based on coverage, pricing, support, and
                                claims processing, ensuring you make an informed decision.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const faqQuestions = document.querySelectorAll('.faq-question');

            faqQuestions.forEach(question => {
                question.addEventListener('click', function (e) {
                    e.preventDefault();
                    const answer = this.nextElementSibling;
                    const icon = this.querySelector('.faq-icon');

                    if (answer.classList.contains('d-none')) {
                        // Open this FAQ
                        answer.classList.remove('d-none');
                        icon.textContent = '-';
                    } else {
                        // Close this FAQ
                        answer.classList.add('d-none');
                        icon.textContent = '+';
                    }
                });
            });
        });
    </script>

    <section class="advertising-disclosure container my-5">
        <div class="advertising-card border-light shadow-sm">
            <div class="advertising-card-body p-4">
                <h2 class="advertising-card-title h4 mb-3">Disclaimer, please read.</h2>
                <div class="advertising-card-text">
                    <p>comparewarranties.org is a trading site of Chaiz, Inc. comparewarranties.org is a free online
                        resource committed to helping you find Vehicle Service Contract providers ("Products").</p>
                    <p>Unlike our main site at chaiz.com, we may accept advertising compensation from some of the companies
                        advertised. The compensation may impact the location and order in which these Products are
                        presented. We may also list Products for which we receive no compensation. This site does not
                        feature all Products on the market.</p>

                    <div class="more-content d-none">
                        <p>By clicking through the links on this site you agree to allow us to pass on your name, address,
                            email and telephone number to providers of Products advertised on this site. In doing so we may
                            receive a small fee from the Product provider for the introduction.</p>
                        <p>This is an advertising site only and does not offer or sell the Products displayed on this site.
                            We are nor responsible for nor do we control Products advertised on this site. If you wish to
                            purchase a Product (other than thru the advertisers on this site) you can do so through our site
                            at chaiz.com.</p>
                        <p>The Terms of Use and Privacy Policy of Chaiz, Inc. as set out below apply to this site and your
                            use of it.</p>
                    </div>

                    <a href="#" class="btn advertising-btn-link px-0 read-more-btn">Read more →</a>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const readMoreBtn = document.querySelector('.read-more-btn');
            const moreContent = document.querySelector('.more-content');
            const advertisingCard = document.querySelector('.advertising-card');

            readMoreBtn.addEventListener('click', function (e) {
                e.preventDefault();

                if (moreContent.classList.contains('d-none')) {
                    // Expand
                    moreContent.classList.remove('d-none');
                    readMoreBtn.textContent = 'Read less →';
                } else {
                    // Collapse
                    moreContent.classList.add('d-none');
                    readMoreBtn.textContent = 'Read more →';
                }
            });
        });
    </script>
@endsection