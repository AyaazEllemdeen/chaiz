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

    <section>
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
                    <div class="description">
                        Endurance offers flexibility to choose your certified mechanic, and a 30-day money-back guarantee
                        for
                        peace of mind. Also, get a free Year of Elite Benefits featuring 24/7 Roadside Assistance, Complete
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

                    <button class="learn-more-btn">Learn More</button>
                </div>
            </div>
        </div>
    </section>
@endsection