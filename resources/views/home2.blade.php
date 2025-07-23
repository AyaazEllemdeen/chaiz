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
                <div class="service-card">
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
                </div>

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
@endsection