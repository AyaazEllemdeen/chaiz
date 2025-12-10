@extends('layouts.app')

@section('content')

    <section id="hero-section" class="hero-section">
        <div class="hero-content">
            <div class="row align-items-center g-0">
                <!-- Left side - Text and Button -->
                <div class="col-md-5">
                    <div class="hero-left-container">
                        <h1 class="hero-title mb-3">Compare Car<br>Warranties</h1>
                        <p class="hero-subtitle mb-4">Find the best extended auto warranty for your vehicle</p>
                        <button type="button" class="hero-cta-btn" id="instant-quote-btn">Compare Warranties</button>
                    </div>
                </div>

                <!-- Right side - Form -->
                <div class="col-md-7">
                    <div class="form-card">
                        <form id="quiz-start-form">
                            @csrf
                            <h3 class="form-title mb-4">See Multiple Quotes in Seconds</h3>

                            <div class="row g-3 mb-3">
                                <div class="col-6 col-md-6">
                                    <input type="text" name="user-name" class="form-input" placeholder="Full Name" required>
                                </div>
                                <div class="col-6 col-md-6">
                                    <input type="text" name="user-number" class="form-input" placeholder="Phone Number"
                                        required>
                                </div>
                            </div>

                            <div class="row g-3 mb-3">
                                <div class="col-6 col-md-6">
                                    <input type="email" name="email" class="form-input" placeholder="Email Address"
                                        required>
                                </div>
                                <div class="col-6 col-md-6">
                                    <select name="user-state" class="form-input" required>
                                        <option value="">Select Your State</option>
                                        @php
                                            $states = [
                                                'AL' => 'Alabama',
                                                'AK' => 'Alaska',
                                                'AZ' => 'Arizona',
                                                'AR' => 'Arkansas',
                                                'CA' => 'California',
                                                'CO' => 'Colorado',
                                                'CT' => 'Connecticut',
                                                'DE' => 'Delaware',
                                                'FL' => 'Florida',
                                                'GA' => 'Georgia',
                                                'HI' => 'Hawaii',
                                                'ID' => 'Idaho',
                                                'IL' => 'Illinois',
                                                'IN' => 'Indiana',
                                                'IA' => 'Iowa',
                                                'KS' => 'Kansas',
                                                'KY' => 'Kentucky',
                                                'LA' => 'Louisiana',
                                                'ME' => 'Maine',
                                                'MD' => 'Maryland',
                                                'MA' => 'Massachusetts',
                                                'MI' => 'Michigan',
                                                'MN' => 'Minnesota',
                                                'MS' => 'Mississippi',
                                                'MO' => 'Missouri',
                                                'MT' => 'Montana',
                                                'NE' => 'Nebraska',
                                                'NV' => 'Nevada',
                                                'NH' => 'New Hampshire',
                                                'NJ' => 'New Jersey',
                                                'NM' => 'New Mexico',
                                                'NY' => 'New York',
                                                'NC' => 'North Carolina',
                                                'ND' => 'North Dakota',
                                                'OH' => 'Ohio',
                                                'OK' => 'Oklahoma',
                                                'OR' => 'Oregon',
                                                'PA' => 'Pennsylvania',
                                                'RI' => 'Rhode Island',
                                                'SC' => 'South Carolina',
                                                'SD' => 'South Dakota',
                                                'TN' => 'Tennessee',
                                                'TX' => 'Texas',
                                                'UT' => 'Utah',
                                                'VT' => 'Vermont',
                                                'VA' => 'Virginia',
                                                'WA' => 'Washington',
                                                'WV' => 'West Virginia',
                                                'WI' => 'Wisconsin',
                                                'WY' => 'Wyoming',
                                                'DC' => 'District of Columbia',
                                                'PR' => 'Puerto Rico',
                                                'GU' => 'Guam',
                                                'VI' => 'U.S. Virgin Islands',
                                                'AS' => 'American Samoa',
                                                'MP' => 'Northern Mariana Islands'
                                            ];
                                        @endphp
                                        @foreach($states as $abbr => $name)
                                            <option value="{{ $abbr }}">{{ $name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row g-3 mb-3">
                                <div class="col-6 col-md-6">
                                    <select id="sel_make" name="sel-make" class="form-input" required>
                                        <option value="">Select Vehicle Make</option>
                                        @php
                                            $makes = call_user_func(config('vehicles.makes'));
                                        @endphp
                                        @foreach($makes as $make)
                                            <option value="{{ $make }}">{{ $make }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-6 col-md-6">
                                    <select id="sel_model" name="sel-model" class="form-input" required>
                                        <option value="">Select Vehicle Model</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row g-3 mb-4">
                                <div class="col-6 col-md-6">
                                    <select id="sel_year" name="sel-year" class="form-input" required>
                                        <option value="">Select Vehicle Year</option>
                                        @for($year = 2026; $year >= 1990; $year--)
                                            <option value="{{ $year }}">{{ $year }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-6 col-md-6">
                                    <select name="car_mileage" class="form-input" required>
                                        <option value="">Select Vehicle Mileage</option>
                                        <option value="less-than-100k">Less than 100,000 miles</option>
                                        <option value="100k-140k">100,000 - 140,000 miles</option>
                                        <option value="140k-200k">140,000 - 200,000 miles</option>
                                        <option value="more-than-200k">More than 200,000 miles</option>
                                    </select>
                                </div>
                            </div>

                            <button type="submit" id="submit-btn" class="form-submit-btn">
                                <span id="submit-text">See Quotes</span>
                                <span id="submit-loader" class="submit-loader" style="display: none;">
                                    <svg width="20" height="20" viewBox="0 0 50 50" style="vertical-align: middle;">
                                        <circle cx="25" cy="25" r="20" fill="none" stroke="currentColor" stroke-width="5"
                                            stroke-dasharray="31.415, 31.415" transform="rotate(-90 25 25)">
                                            <animateTransform attributeName="transform" type="rotate" from="0 25 25"
                                                to="360 25 25" dur="1s" repeatCount="indefinite" />
                                        </circle>
                                    </svg>
                                    Processing...
                                </span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="providers-section" id="providers-section">
    <div class="container">
        <h3 class="section-title">Our providers</h3>
        
        <div class="scroll-wrapper">
            <button class="nav-btn prev" id="scrollLeftProviders" aria-label="Scroll left">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
                </svg>
            </button>
            
            <div class="cards-track" id="providersWrapper">
                
                <!-- Endurance Card -->
                <div class="provider-card">
                    <div class="card-badge">TOP RATED</div>
                    <div class="card-top">
                        <div class="logo-wrap">
                            <a href="https://endurancewarranty.com/lp/czcw" target="_blank" rel="noopener noreferrer">
                                <img src="/img/1c.png" alt="Endurance Logo">
                            </a>
                        </div>
                        <div class="rating-wrap">
                            <span class="rating-number">9.9</span>
                            <span class="rating-stars">★★★★★</span>
                        </div>
                    </div>
                    <div class="promo-text">$300 off any new plan!</div>
                    <div class="card-body">
                        <p class="card-desc">Endurance offers flexibility to choose your certified mechanic, and a 30-day money-back guarantee for peace of mind. Also, get a free Year of Elite Benefits featuring 24/7 Roadside Assistance, Complete Tire Coverage, Key Replacement, and more!</p>
                        <ul class="features-list">
                            <li>Covers cars up to 20 years old/200K miles</li>
                            <li>1 year of FREE Elite Benefits</li>
                            <li>Flexible down payment to fit your budget</li>
                            <li>6 coverage plans to choose from</li>
                            <li>No obligation fast quote</li>
                            <li>30 Day money back guarantee</li>
                        </ul>
                    </div>
                    <div class="card-actions">
                        <a href="https://endurancewarranty.com/lp/czcw" class="btn-primary" target="_blank" rel="noopener noreferrer">Get a Quote</a>
                        <a href="tel:8005980082" class="btn-secondary">800-598-0082</a>
                    </div>
                </div>

                <!-- American Dream Card -->
                <div class="provider-card">
                    <div class="card-badge">3 MONTHS FREE</div>
                    <div class="card-top">
                        <div class="logo-wrap">
                            <a href="https://www.americandreamautoprotect.com/u7izFNKM9E" target="_blank" rel="noopener noreferrer">
                                <img src="/img/american-dreamc.png" alt="American Dream Logo">
                            </a>
                        </div>
                        <div class="rating-wrap">
                            <span class="rating-number">9.2</span>
                            <span class="rating-stars">★★★★★</span>
                        </div>
                    </div>
                    <div class="promo-text">$350 off + 3 months free!</div>
                    <div class="card-body">
                        <p class="card-desc">American Dream Auto Protect provides peace of mind by mitigating the high costs that come with unexpected repairs. Their stress-free claims process means you get approved in as little as 48 hours.</p>
                        <ul class="features-list">
                            <li>Choose your own repair facility</li>
                            <li>Customize your coverage plan</li>
                            <li>Flexible payment plan options</li>
                            <li>24/7 Roadside Assistance</li>
                            <li>30 Day money back guarantee</li>
                            <li>Covers cars up to 20 years old / 200K miles</li>
                        </ul>
                    </div>
                    <div class="card-actions">
                        <a href="https://www.americandreamautoprotect.com/u7izFNKM9E" class="btn-primary" target="_blank" rel="noopener noreferrer">Get a Quote</a>
                        <a href="tel:8333640947" class="btn-secondary">833-364-0947</a>
                    </div>
                </div>

                <!-- Chaiz Card -->
                <div class="provider-card">
                    <div class="card-badge">BEST COVERAGE</div>
                    <div class="card-top">
                        <div class="logo-wrap">
                            <a href="https://www.chaiz.com/?fpr=cworg&utm_source=sem&utm_medium=cps&utm_campaign=cworg&utm_content=article" target="_blank" rel="noopener noreferrer">
                                <img src="/img/chaiz.png" alt="Chaiz Logo">
                            </a>
                        </div>
                        <div class="rating-wrap">
                            <span class="rating-number">9.9</span>
                            <span class="rating-stars">★★★★★</span>
                        </div>
                    </div>
                    <div class="promo-text">Buy directly online — No Email or Phone needed</div>
                    <div class="card-body">
                        <p class="card-desc">Chaiz shows you several plans from multiple providers within 30 seconds. Compare and buy breakdown protection from top providers today.</p>
                        <ul class="features-list">
                            <li>Best price guaranteed</li>
                            <li>No email or phone needed</li>
                            <li>Independent and unbiased</li>
                            <li>Hundreds of 5* reviews</li>
                            <li>30-day money back guarantee</li>
                            <li>Purchase completely online 24/7</li>
                        </ul>
                    </div>
                    <div class="card-actions">
                        <a href="https://www.chaiz.com/?fpr=cworg&utm_source=sem&utm_medium=cps&utm_campaign=cworg&utm_content=article" class="btn-primary" target="_blank" rel="noopener noreferrer">Buy Now</a>
                        <a href="tel:8339429249" class="btn-secondary">833-942-9249</a>
                    </div>
                </div>

                <!-- Omega Card -->
                <div class="provider-card">
                    <div class="card-top">
                        <div class="logo-wrap">
                            <a href="https://www.chaiz.com/p/omega?fpr=cworg&utm_source=sem&utm_medium=cps&utm_campaign=cworg&utm_content=article" target="_blank" rel="noopener noreferrer">
                                <img src="/img/omega.png" alt="Omega Logo">
                            </a>
                        </div>
                        <div class="rating-wrap">
                            <span class="rating-number">8.2</span>
                            <span class="rating-stars">★★★★☆</span>
                        </div>
                    </div>
                    <div class="promo-text subtle">Member benefits included</div>
                    <div class="card-body">
                        <p class="card-desc">Once you sign your Omega Auto Care vehicle service contract, you gain access to several member benefits. And these are more than just simple perks, with benefits that will give you the peace of mind and customer service you deserve.</p>
                        <ul class="features-list">
                            <li>Comprehensive coverage</li>
                            <li>Peace of mind with great customer service</li>
                            <li>Roadside assistance</li>
                            <li>Flexible plans tailored to different needs</li>
                            <li>Nationwide repair network</li>
                            <li>Road Hazard Coverage</li>
                        </ul>
                    </div>
                    <div class="card-actions">
                        <a href="https://www.chaiz.com/p/omega?fpr=cworg&utm_source=sem&utm_medium=cps&utm_campaign=cworg&utm_content=article" class="btn-primary" target="_blank" rel="noopener noreferrer">Get a Quote</a>
                    </div>
                </div>

                <!-- NAAC Card -->
                <div class="provider-card">
                    <div class="card-top">
                        <div class="logo-wrap">
                            <a href="https://www.chaiz.com/p/naac?fpr=cworg&utm_source=sem&utm_medium=cps&utm_campaign=cworg&utm_content=article" target="_blank" rel="noopener noreferrer">
                                <img src="/img/naac.png" alt="NAAC Logo">
                            </a>
                        </div>
                        <div class="rating-wrap">
                            <span class="rating-number">8.1</span>
                            <span class="rating-stars">★★★★☆</span>
                        </div>
                    </div>
                    <div class="promo-text subtle">100+ years combined experience</div>
                    <div class="card-body">
                        <p class="card-desc">North American Auto Care offers convenient access to a variety of services provided by trained technicians, with readily available parts and potential warranty coverage for added peace of mind.</p>
                        <ul class="features-list">
                            <li>Variety of services</li>
                            <li>Trained & certified professionals</li>
                            <li>No obligation quote</li>
                            <li>Easy access to replacements</li>
                            <li>100+ years combined experience</li>
                            <li>Nationwide service centers</li>
                        </ul>
                    </div>
                    <div class="card-actions">
                        <a href="https://www.chaiz.com/p/naac?fpr=cworg&utm_source=sem&utm_medium=cps&utm_campaign=cworg&utm_content=article" class="btn-primary" target="_blank" rel="noopener noreferrer">Get a Quote</a>
                    </div>
                </div>

            </div>
            
            <button class="nav-btn next" id="scrollRightProviders" aria-label="Scroll right">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708"/>
                </svg>
            </button>
        </div>
    </div>
</section>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const wrapper = document.getElementById("providersWrapper");
    const prevBtn = document.getElementById("scrollLeftProviders");
    const nextBtn = document.getElementById("scrollRightProviders");
    
    function getCardWidth() {
        const card = wrapper.querySelector('.provider-card');
        if (!card) return 340;
        const style = getComputedStyle(wrapper);
        const gap = parseFloat(style.gap) || 24;
        return card.offsetWidth + gap;
    }
    
    function updateUI() {
        if (!wrapper) return;
        
        const maxScroll = wrapper.scrollWidth - wrapper.clientWidth;
        const scrollPos = wrapper.scrollLeft;
        
        prevBtn.disabled = scrollPos <= 5;
        nextBtn.disabled = scrollPos >= maxScroll - 5;
    }
    
    prevBtn.addEventListener("click", () => {
        const cardWidth = getCardWidth();
        wrapper.scrollBy({ left: -cardWidth, behavior: "smooth" });
    });
    
    nextBtn.addEventListener("click", () => {
        const cardWidth = getCardWidth();
        wrapper.scrollBy({ left: cardWidth, behavior: "smooth" });
    });
    
    wrapper.addEventListener("scroll", updateUI);
    window.addEventListener("resize", updateUI);
    
    setTimeout(updateUI, 100);
});
</script>


    <section id="warranty-section" class="warranty-section">
        <div class="container">
            <div class="warranty-content">
                <h2 class="warranty-title">Is an extended warranty worth it?</h2>
                <p class="warranty-description">
                    That really depends on the car and the driver. If you’re someone who trades cars every couple of years,
                    you probably won’t get your money’s worth. But if you plan on keeping your ride for a while, an extended
                    warranty can be a lifesaver.</p>
                <p class="warranty-description">
                    Think of it like health insurance for your car. You hope you don’t need it, but when something big goes
                    wrong, it can save you from a bill that wipes out your savings. Modern cars are packed with electronics
                    and sensors. A single repair on one of those systems can cost more than the warranty itself.</p>

                <h2 class="warranty-title">How long does a car warranty last?</h2>
                <p class="warranty-description">
                    Most new cars come with a warranty that lasts three years or 36,000 miles. Some brands, like Hyundai and
                    Kia, give you longer coverage on the powertrain, sometimes as much as ten years or 100,000 miles.
                </p>
                <p class="warranty-description">
                    Once that factory coverage ends, you’re on your own unless you’ve picked up an extended plan. Extended
                    warranties can add several more years of protection, depending on the provider and the level of coverage
                    you choose.
                </p>

                <h2 class="warranty-title">Types of warranties</h2>

                <p>Car warranties aren’t one-size-fits-all. Some plans cover only the essentials, while others practically
                    babysit your car. The right choice really depends on how much risk you’re comfortable with and how much
                    you want to spend. Let’s break it down in plain English:</p>

                <ul class="warranty-list">
                    <li><strong>Powertrain warranty:</strong> This is the “big stuff” warranty. It takes care of the engine,
                        transmission, and the parts that keep the car moving. It won’t save you from smaller repair bills,
                        but it covers the most expensive problems you could face.</li>
                    <li><strong>Bumper-to-bumper warranty:</strong> This is the gold standard. It covers almost everything
                        from your electronics to your A/C. Of course, there are always exclusions, but if you want maximum
                        peace of mind, this is the one to look at.</li>
                    <li><strong>Named component warranty:</strong> This one is more selective. Instead of covering nearly
                        everything, it lists out specific parts that are protected. It’s a good fit if you know what systems
                        you want covered and don’t care about the rest.</li>
                    <li><strong>Wrap coverage:</strong> Think of this as the “gap filler.” If your powertrain is still under
                        factory warranty, a wrap plan can extend coverage to everything else. It rounds out your protection
                        without overlapping what you already have.</li>
                    <li><strong>Drivetrain warranty:</strong> Sounds a lot like powertrain, right? The difference is it
                        usually skips the engine. It focuses on the parts that send power to the wheels, like the
                        transmission and axles.</li>
                </ul>

                <p>So which should you pick? If you’re driving an older car, a simple powertrain plan might be enough to
                    save you from a nightmare repair bill. If you’ve got a newer or luxury car, bumper-to-bumper or wrap
                    coverage is usually the smarter move.</p>

                <h2 class="warranty-title">Car warranty for luxury vehicles</h2>
                <p class="warranty-description">
                    Luxury cars are incredible to drive, but they can be brutal on your wallet when something breaks. A
                    simple repair on a Mercedes, BMW, or Audi can cost more than fixing an entire economy car.
                </p>
                <p class="warranty-description">
                    That’s why a car warranty for luxury vehicles is worth looking into. These plans often cover the pricey
                    tech that makes high-end cars so special, like adaptive suspensions, advanced safety systems, or digital
                    dashboards. Yes, the warranties cost more, but so do the repairs. If you’re driving a luxury car,
                    extended coverage isn’t just nice to have. It can protect you from financial shock when something goes
                    wrong.
                </p>

                <h2 class="warranty-title">Extended car warranty cost</h2>
                <p class="warranty-description">
                    The price of an extended warranty is all over the place. On average, you’re looking at somewhere between
                    $1,500 and $4,000. The price is higher if you own an older car or a luxury vehicle.
                </p>
                <p class="warranty-description">
                    What you pay depends on the make and age of your car, the type of coverage you choose, the deductible,
                    and whether you’re buying through a dealer or a third-party provider. Some plans also include perks like
                    roadside assistance or rental car coverage. Those extras don’t sound exciting until you’re stuck on the
                    side of the road and suddenly truly grateful you have them.
                </p>

                <h2 class="warranty-title">Used automobile warranties</h2>
                <p class="warranty-description">
                    If you’re buying used, you still have options. Used automobile warranties are built for pre-owned cars
                    that don’t have factory coverage anymore. They can help cover things like transmission repairs or
                    electrical failures, which are the kinds of surprises no one wants to pay for out of pocket.
                </p>
                <p class="warranty-description">
                    Some dealers include a short warranty with certified pre-owned cars, but if you’re buying privately, a
                    third-party warranty is usually your best bet. Keep in mind that not every car qualifies. Ancient or
                    high-mileage cars might be excluded, so check before you buy.
                </p>
            </div>
        </div>
    </section>

    <section id="get-matched" class="get-matched-section">
        <div class="container">
            <h1 class="match-title">How we connect you with the right provider</h1>

            <div class="match-steps-container">
                <div class="match-step">
                    <div class="match-step-icon">
                        <img src="/img/icons/icon1.png" alt="">
                    </div>
                    <h3 class="match-step-title">Your vehicle details</h3>
                    <p class="match-step-description">Provide information about your vehicle and the coverage you require.
                    </p>
                </div>

                <div class="match-step">
                    <div class="match-step-icon">
                        <img src="/img/icons/icon2.png" alt="">
                    </div>
                    <h3 class="match-step-title">Extensive provider network</h3>
                    <p class="match-step-description">We carefully review offers from leading warranty providers to identify
                        the best options for you.</p>
                </div>

                <div class="match-step">
                    <div class="match-step-icon">
                        <img src="/img/icons/icon3.png" alt="">
                    </div>
                    <h3 class="match-step-title">Your personalized solution</h3>
                    <p class="match-step-description">Choose to submit a quote request for a tailored proposal or purchase
                        your selected warranty directly online for immediate coverage.</p>
                </div>
            </div>

            <button class="match-cta-button">Find My Match</button>
        </div>
    </section>

    <section id="score-section" class="score-section">
        <div class="container">
            <div class="score-content">
                <h1 class="score-title">How we work our magic</h1>
                <p class="score-description">
                    Each provider is rated out of 10 based on three key factors:
                    <span class="score-highlight">how often
                        they match successfully with drivers, how well their brand connects with users, and the strength of
                        their coverage.
                    </span>
                </p>
                <!-- <button class="score-cta-button">More about our scores</button> -->
            </div>

            <div class="score-illustration">
                <img src="/img/icons/icon5.png" alt="">
            </div>
        </div>
    </section>

    <section class="faq-section py-5">
        <div class="container">
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
                                <p>Typically, car owners seek extended warranties after their factory warranty expires
                                    (usually
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
                                <p>When selecting a plan, consider your vehicle's age, mileage, typical repair costs, and
                                    your
                                    budget. Look for coverage that matches your vehicle's most likely repair needs while
                                    fitting
                                    your financial situation.</p>

                                <ul>
                                    <li><strong>Bumper-to-Bumper Warranties:</strong> Comprehensive coverage for most
                                        mechanical
                                        systems, excluding explicitly listed items.</li>
                                    <li><strong>Powertrain Warranties:</strong> Covers engine, transmission, and related
                                        components.</li>
                                    <li><strong>Wear-and-Tear Warranties:</strong> Repairs or replacements due to natural
                                        wear
                                        and tear.</li>
                                    <li><strong>Maintenance Plans:</strong> Covers routine maintenance, plus some
                                        wear-and-tear
                                        parts.</li>
                                    <li><strong>Emission Warranties:</strong> Protects against emission-related failures.
                                    </li>
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
            // Store all vehicles data
            const vehiclesData = @json(config('vehicles.vehicles'));

            // Handle make selection to populate models
            document.getElementById('sel_make').addEventListener('change', function () {
                const selectedMake = this.value;
                const modelSelect = document.getElementById('sel_model');

                // Clear existing options
                modelSelect.innerHTML = '<option value="">Select Vehicle Model</option>';

                if (selectedMake) {
                    // Filter models for selected make
                    const models = vehiclesData
                        .filter(vehicle => vehicle.startsWith(selectedMake + ' '))
                        .map(vehicle => vehicle.substring(selectedMake.length + 1))
                        .sort();

                    // Add model options
                    models.forEach(model => {
                        const option = document.createElement('option');
                        option.value = model;
                        option.textContent = model;
                        modelSelect.appendChild(option);
                    });
                }
            });

            // Function to submit form
            async function submitForm() {
                const form = document.getElementById('quiz-start-form');
                const submitBtn = document.getElementById('submit-btn');
                const submitText = document.getElementById('submit-text');
                const submitLoader = document.getElementById('submit-loader');

                submitBtn.disabled = true;
                submitText.style.display = 'none';
                submitLoader.style.display = 'inline-flex';

                const formData = new FormData(form);
                const data = Object.fromEntries(formData);

                try {
                    // 1. Submit to Endurance/LeadConduit via LeadSubmissionController (this sets the session)
                    const apiResponse = await fetch('{{ route('lead.submit') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify(data)
                    });

                    const apiResult = await apiResponse.json();
                    console.log('API submission result:', apiResult);

                    // 2. Save to database via LeadController
                    const dbResponse = await fetch('{{ route('lead.store') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify(data)
                    });

                    const dbResult = await dbResponse.json();
                    console.log('Database save result:', dbResult);

                    // 3. Store data in session (this should happen AFTER the API call sets lead_destination)
                    await fetch('{{ route('store.car.data') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify(data)
                    });

                    // Small delay to ensure session is saved
                    await new Promise(resolve => setTimeout(resolve, 100));

                    // 4. Redirect to thank you page
                    window.location.href = '{{ route('final') }}';

                } catch (error) {
                    console.error('Error:', error);
                    alert('Error submitting form. Please try again.');

                    // Re-enable button on error
                    submitBtn.disabled = false;
                    submitText.style.display = 'inline';
                    submitLoader.style.display = 'none';
                }
            }

            // Instant Quote button clicks the submit button
            document.getElementById('instant-quote-btn').addEventListener('click', function () {
                document.getElementById('submit-btn').click();
            });

            // Find My Match button - scroll to top and show alert
            const matchButton = document.querySelector('.match-cta-button');
            if (matchButton) {
                matchButton.addEventListener('click', function () {
                    // Scroll to top of page
                    window.scrollTo({ top: 0, behavior: 'smooth' });

                    // Show alert after a short delay for smooth scroll
                    setTimeout(function () {
                        alert('Please fill in your details');
                    }, 500);
                });
            }

            // Form submission
            let isSubmitting = false;

            document.getElementById('quiz-start-form').addEventListener('submit', async function (e) {
                e.preventDefault();

                // Prevent multiple submissions
                if (isSubmitting) {
                    return;
                }

                isSubmitting = true;

                await submitForm();

                isSubmitting = false;
            });

            // // More/Less button functionality
            // document.querySelectorAll(".more-btn").forEach(btn => {
            //     btn.addEventListener("click", function () {
            //         const cardBody = this.previousElementSibling;
            //         cardBody.classList.toggle("active");

            //         if (cardBody.classList.contains("active")) {
            //             this.textContent = "- Less";
            //         } else {
            //             this.textContent = "+ More";
            //         }
            //     });
            // });

            // FAQ functionality
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

            // Update title with current month (only if element exists)
            const title = document.getElementById('quiz-title');
            if (title) {
                const now = new Date();
                const monthNames = [
                    "January", "February", "March", "April", "May", "June",
                    "July", "August", "September", "October", "November", "December"
                ];
                const currentMonth = monthNames[now.getMonth()];
                title.textContent = `Best Extended Auto Warranty in ${currentMonth} ${now.getFullYear()}`;
            }
        });
    </script>

@endsection