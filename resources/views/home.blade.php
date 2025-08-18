@extends('layouts.app')

@section('content')

    <section id="hero-section" class="position-relative" style="height: auto;">
        <img src="{{ asset('img/banner4.webp') }}" alt="Banner" class="object-fit-cover banner-img"
            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; z-index: 1;">

        <div class="hero-text-overlay py-5">
            <div class="container text-white">
                <p class="quiz-heading">Compare car warranties with confidence</p>
                <p class="quiz-subtext">Every car is different. Enter your details and see real car warranty options,
                    coverage plans, and protection that fit your vehicle.</p>

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

                        <div class="quiz-intro-actions d-flex align-items-center gap-3 mb-4">
                            <button type="button" class="begin-btn get-quote-btn">Begin</button>
                            <p class="quiz-disclaimer-text mb-0 d-flex align-items-center">
                                <span class="quiz-icon me-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" fill="none"
                                        viewBox="0 0 25 24">
                                        <path
                                            d="M11.45 16.55L17.1 10.9 15.675 9.475 11.45 13.7 9.325 11.575 7.9 13l3.55 3.55ZM12.5 22a9.5 9.5 0 1 1 0-19 9.5 9.5 0 0 1 0 19ZM6.1 2.35 7.5 3.75 3.25 8 1.85 6.6 6.1 2.35ZM18.9 2.35 23.15 6.6 21.75 8 17.5 3.75 18.9 2.35Z"
                                            fill="#1C1B1F" />
                                    </svg>
                                </span>
                                It only takes a minute!
                            </p>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- quiz modal start -->
    <!-- Car Quiz Modal -->
    <div id="car-quiz" class="car-quiz-modal">
        <button class="car-quiz-close" onclick="closeModalskip()">×</button>
        <div class="car-quiz-split">
            <div class="car-quiz-left">
                <div class="car-quiz-body">
                    <h4 id="quiz-section-heading" class="quiz-section-heading">Vehicle Details</h4>
                    <div class="quiz-progress-container">
                        <div class="quiz-progress-bar" id="quiz-progress-bar">
                            <span id="quiz-progress-text">10%</span>
                        </div>
                    </div>
                    <!-- Step 1: Year, Make, Model -->
                    <div id="quiz-step1">
                        <h3 class="modal-question">What is the year, make & model of your vehicle?</h3>
                        <select id="sel_year" name="sel-year" class="modal-dropdown1">
                            <option value="">Select Year</option>
                        </select>
                        <select id="sel_make" name="sel-make" class="modal-dropdown1">
                            <option value="">Select Make</option>
                        </select>
                        <select id="sel_model" name="sel-model" class="modal-dropdown1">
                            <option value="">Select Model</option>
                        </select>
                        <div class="step-buttons">
                            <button id="to-step2" class="to-step-btn">Continue</button>
                        </div>
                    </div>

                    <!-- Step 2: Mileage -->
                    <div id="quiz-step2" class="d-none">
                        <h3 class="modal-question">Roughly, how many miles are on the vehicle?</h3>
                        <div class="options-grid1">
                            <button type="button" class="mile-opt1" data-value="<100000">Less than 100k</button>
                            <button type="button" class="mile-opt1" data-value="130000">100-140k</button>
                            <button type="button" class="mile-opt1" data-value="180000">140-200k</button>
                            <button type="button" class="mile-opt1" data-value=">200000">More than 200k</button>
                        </div>
                        <div class="step-buttons">
                            <button id="to-step3" class="to-step-btn">Continue</button>
                        </div>
                        <input type="hidden" name="car_mileage" id="input-mileage" value="">
                    </div>

                    <div id="quiz-step3" class="d-none">
                        <h3 class="modal-question">How soon do you want your new auto warranty?</h3>
                        <div class="options-grid1">
                            <button type="button" class="warranty-urgency-opt1" data-value="As soon as possible">As soon as
                                possible</button>
                            <button type="button" class="warranty-urgency-opt1" data-value="1-2 weeks">1-2 weeks</button>
                            <button type="button" class="warranty-urgency-opt1" data-value="3-4 weeks">3-4 weeks</button>
                            <button type="button" class="warranty-urgency-opt1" data-value="4+ weeks">4+ weeks</button>
                            <button type="button" class="warranty-urgency-opt1" data-value="Unsure">Unsure</button>
                        </div>
                        <div class="step-buttons">
                            <button id="to-step4" class="to-step-btn">Continue</button>
                        </div>
                        <input type="hidden" name="warranty" id="warranty" value="">
                    </div>

                    <div id="quiz-step4" class="d-none">
                        <h3 class="modal-question">What state would you like coverage in?</h3>
                        <select id="user-state" name="user-state" class="modal-dropdown1" required>
                            <option value="">Select your state</option>
                            <option value="AL">Alabama</option>
                            <option value="AK">Alaska</option>
                            <option value="AZ">Arizona</option>
                            <option value="AR">Arkansas</option>
                            <option value="CA">California</option>
                            <option value="CO">Colorado</option>
                            <option value="CT">Connecticut</option>
                            <option value="DE">Delaware</option>
                            <option value="FL">Florida</option>
                            <option value="GA">Georgia</option>
                            <option value="HI">Hawaii</option>
                            <option value="ID">Idaho</option>
                            <option value="IL">Illinois</option>
                            <option value="IN">Indiana</option>
                            <option value="IA">Iowa</option>
                            <option value="KS">Kansas</option>
                            <option value="KY">Kentucky</option>
                            <option value="LA">Louisiana</option>
                            <option value="ME">Maine</option>
                            <option value="MD">Maryland</option>
                            <option value="MA">Massachusetts</option>
                            <option value="MI">Michigan</option>
                            <option value="MN">Minnesota</option>
                            <option value="MS">Mississippi</option>
                            <option value="MO">Missouri</option>
                            <option value="MT">Montana</option>
                            <option value="NE">Nebraska</option>
                            <option value="NV">Nevada</option>
                            <option value="NH">New Hampshire</option>
                            <option value="NJ">New Jersey</option>
                            <option value="NM">New Mexico</option>
                            <option value="NY">New York</option>
                            <option value="NC">North Carolina</option>
                            <option value="ND">North Dakota</option>
                            <option value="OH">Ohio</option>
                            <option value="OK">Oklahoma</option>
                            <option value="OR">Oregon</option>
                            <option value="PA">Pennsylvania</option>
                            <option value="RI">Rhode Island</option>
                            <option value="SC">South Carolina</option>
                            <option value="SD">South Dakota</option>
                            <option value="TN">Tennessee</option>
                            <option value="TX">Texas</option>
                            <option value="UT">Utah</option>
                            <option value="VT">Vermont</option>
                            <option value="VA">Virginia</option>
                            <option value="WA">Washington</option>
                            <option value="WV">West Virginia</option>
                            <option value="WI">Wisconsin</option>
                            <option value="WY">Wyoming</option>
                        </select>
                        <div class="step-buttons">
                            <button id="to-step5" class="to-step-btn">Continue</button>
                        </div>
                    </div>

                    <div id="quiz-loading" class="d-none">
                        <div class="loading-container">
                            <div class="spinner"></div>
                            <p>Gathering details...</p>
                        </div>
                    </div>


                    <div id="quiz-step5" class="d-none">
                        <p class="zip-helper-text">Your ZIP code ensures quotes are as accurate as possible for your area
                        </p>
                        <h3 class="modal-question">What's your ZIP code?</h3>
                        <input type="text" name="user-zip" id="user-zip" class="modal-dropdown1"
                            placeholder="Enter your ZIP code" maxlength="5" pattern="\d{5}" inputmode="numeric" required />
                        <div class="step-buttons-wrapper">
                            <div class="step-buttons">
                                <button id="to-step6" class="to-step-btn">Continue</button>
                            </div>

                            <div class="skip-section">
                                <p class="skip-message">Don’t want to give us your details?</p>
                                <button type="button" class="to-skip-btn" onclick="skipMyDetails()">Instant Quote</button>
                            </div>
                        </div>
                    </div>


                    <div id="quiz-step6" class="d-none">
                        <p class="zip-helper-text">You will receive a copy of your quote via Email. We only pass your Email
                            Address onto your match.</p>
                        <h3 class="modal-question">What's your Email Address?</h3>
                        <input type="email" name="email" id="user-email" class="modal-dropdown1"
                            placeholder="Enter your Email" required />
                        <div class="step-buttons-wrapper">
                            <div class="step-buttons">
                                <button id="to-step7" class="to-step-btn">Continue</button>
                            </div>

                            <div class="skip-section">
                                <p class="skip-message">Don’t want to give us your details?</p>
                                <button type="button" class="to-skip-btn" onclick="skipMyDetails()">Instant Quote</button>
                            </div>
                        </div>
                    </div>

                    <div id="quiz-step7" class="d-none">
                        <p class="zip-helper-text">Enter your full name so your match knows who to make your quote out to.
                        </p>
                        <h3 class="modal-question">What's your Full Name?</h3>
                        <input type="text" name="user-name" id="user-name" class="modal-dropdown1"
                            placeholder="Enter your name" required />
                        <div class="step-buttons-wrapper">
                            <div class="step-buttons">
                                <button id="to-step8" class="to-step-btn">Continue</button>
                            </div>

                            <div class="skip-section">
                                <p class="skip-message">Don’t want to give us your details?</p>
                                <button type="button" class="to-skip-btn" onclick="skipMyDetails()">Instant Quote</button>
                            </div>
                        </div>
                    </div>

                    <div id="quiz-step8" class="d-none">
                        <p class="zip-helper-text">This is the last page of questions. We only pass your phone number onto
                            your match.</p>
                        <h3 class="modal-question">What's your Phone Number?</h3>
                        <input type="text" name="user-number" id="user-number" name="number" class="modal-dropdown1"
                            placeholder="Enter your number" required />
                        <div class="step-buttons-wrapper">
                            <div class="step-buttons">
                                <button id="to-card" class="to-step-btn">Submit</button>
                            </div>

                            <div class="skip-section">
                                <p class="skip-message">Don’t want to give us your details?</p>
                                <button type="button" class="to-skip-btn" onclick="skipMyDetails()">Instant Quote</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="d-none modal-right-section">
                <div class="content-wrapper">
                    <div class="success-header">
                        <h2>Your Lead Has Been Submitted Successfully!</h2>
                    </div>
                    <div class="lead-destination-card">
                        <p class="lead-destination-info">
                            <strong>Submitted to:</strong> <span class="destination-name">Processing...</span>
                        </p>
                    </div>
                    <div class="content-grid">
                        <div class="what-happens-next">
                            <h4>What happens next?</h4>
                            <div class="steps-container">
                                <div class="step-item">
                                    <div class="step-number">1</div>
                                    <div class="step-content">
                                        <p>If there is a match between your specifications and our provider's criteria, you
                                            will receive a call from between 1-5 providers within the next working day.</p>
                                    </div>
                                </div>
                                <div class="step-item">
                                    <div class="step-number">2</div>
                                    <div class="step-content">
                                        <p>You will have a free phone consultation with the relevant provider(s) to discuss
                                            prices and ask any questions.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="awareness-section">
                            <h5>Please be aware that you may not receive quotes if:</h5>
                            <div class="awareness-items">
                                <div class="awareness-item">
                                    <div class="awareness-number">1</div>
                                    <p>Your specifications don't match the provider's criteria</p>
                                </div>
                                <div class="awareness-item">
                                    <div class="awareness-number">2</div>
                                    <p>There's an error in your contact details</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn-continue" onclick="closeModalskip()">Continue</button>
                </div>
            </div>

            <div class="car-quiz-right">
                <div id="quiz-right-div">
                    <img src="{{ asset('img/logo.png') }}" alt="Company Logo" />
                    <h2>Best Extended Auto Warranty in May 2025</h2>
                    <p>Continue our short quiz to get matched to an auto warranty provider suited to you.</p>
                </div>
                <div id="chaiz-inline-container" class="d-none">
                    <h3>Plans for your car</h3>
                    <p>Buy coverage from leading providers, right here, right now.</p>

                    <div id="chaiz-loading-inline" style="text-align: center; padding: 20px;">
                        <p>Loading plans...</p>
                        <div class="spinner"
                            style="margin: auto; width: 40px; height: 40px; border: 4px solid #ccc; border-top: 4px solid #333; border-radius: 50%; animation: spin 1s linear infinite;">
                        </div>
                    </div>

                    <div id="search-results-skip">
                        <!-- Chaiz results will be injected here -->
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        const progressBar = document.getElementById('quiz-progress-bar');
        const progressText = document.getElementById('quiz-progress-text');
        const sectionHeading = document.getElementById('quiz-section-heading');

        const stepProgress = {
            'to-step2': 20,
            'to-step3': 30,
            'to-step4': 40,
            'to-step5': 50,
            'to-step6': 60,
            'to-step7': 75,
            'to-step8': 90
        };

        const headingMap = {
            'to-step2': 'Vehicle Details',
            'to-step3': 'Vehicle Details',
            'to-step4': 'Vehicle Details',
            'to-step5': 'Your Details',
            'to-step6': 'Your Details',
            'to-step7': 'Your Details',
            'to-step8': 'Your Details'
        };

        document.querySelectorAll('.to-step-btn').forEach(btn => {
            btn.addEventListener('click', function () {
                const progress = stepProgress[this.id];
                const heading = headingMap[this.id];

                if (progress !== undefined) {
                    progressBar.style.width = `${progress}%`;
                    progressText.textContent = `${progress}%`;
                }

                if (heading) {
                    sectionHeading.textContent = heading;
                }
            });
        });
    </script>

    <!-- Success Modal -->
    <div id="success-modal" class="success-modal-container" style="display:none;">
        <div class="success-modal-content">
            <button class="car-quiz-close1" onclick="closeModal()" aria-label="Close modal">×</button>
            <div class="modal-right-section">
                <div class="content-wrapper">
                    <div class="success-header">
                        <h2>Your Lead Has Been Submitted Successfully!</h2>
                    </div>
                    <div class="lead-destination-card">
                        <p class="lead-destination-info">
                            <strong>Submitted to:</strong> <span class="destination-name">Processing...</span>
                        </p>
                    </div>
                    <div class="content-grid">
                        <div class="what-happens-next">
                            <h4>What happens next?</h4>
                            <div class="steps-container">
                                <div class="step-item">
                                    <div class="step-number">1</div>
                                    <div class="step-content">
                                        <p>If there is a match between your specifications and our provider's criteria, you
                                            will receive a call from between 1-5 providers within the next working day.</p>
                                    </div>
                                </div>
                                <div class="step-item">
                                    <div class="step-number">2</div>
                                    <div class="step-content">
                                        <p>You will have a free phone consultation with the relevant provider(s) to discuss
                                            prices and ask any questions.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="awareness-section">
                            <h5>Please be aware that you may not receive quotes if:</h5>
                            <div class="awareness-items">
                                <div class="awareness-item">
                                    <div class="awareness-number">1</div>
                                    <p>Your specifications don't match the provider's criteria</p>
                                </div>
                                <div class="awareness-item">
                                    <div class="awareness-number">2</div>
                                    <p>There's an error in your contact details</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn-continue" onclick="closeModal()">Continue</button>
                </div>
            </div>
            <div class="modal-left-section">
                <div class="plans-heading">
                    <h1>Plans for your car</h1>
                    <p>Buy coverage from leading providers, right here, right now.</p>
                </div>
                <div id="search-results"></div>
            </div>
        </div>
    </div>


    <style>
        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>


    <script>
        function closeModalskip() {
            const quizModal = document.getElementById('car-quiz');
            if (quizModal) {
                quizModal.classList.add('d-none');
                quizModal.classList.remove('show');
            }
        }

        document.addEventListener("DOMContentLoaded", () => {
            function skipMyDetails() {
                console.log('Skip button clicked');
                window.chaizSkipPressed = true;

                const make = window.carData?.make?.toLowerCase().replace(/\s+/g, '-') || 'default-make';
                const model = window.carData?.model?.toLowerCase().replace(/\s+/g, '-') || 'default-model';
                const year = window.carData?.year ? parseInt(window.carData.year, 10) : 2020;
                const state = window.carData?.state?.toUpperCase() || 'NJ';

                let mileage = 30000;
                if (typeof window.carData?.mileage === 'string') {
                    const digits = window.carData.mileage.replace(/\D/g, '');
                    if (digits) {
                        mileage = parseInt(digits, 10);
                    }
                }

                window.chaizWarrantySearchConfig = {
                    targetElementId: "search-results-skip",
                    searchData: {
                        make,
                        model,
                        year,
                        state,
                        mileage,
                        userId: "96d8841b-6ae6-4cb6-9b43-401662e25560"
                    }
                };

                const quizModal = document.getElementById('car-quiz');
                const loadingSpinner = document.getElementById('chaiz-loading');
                const loadingInline = document.getElementById('chaiz-loading-inline');
                const resultContainer = document.getElementById('search-results-skip');

                const rightPane = document.querySelector('.car-quiz-right');
                const chaizContainer = document.getElementById('chaiz-inline-container');
                const quizRightDiv = document.getElementById('quiz-right-div');

                if (rightPane && chaizContainer && quizRightDiv) {
                    rightPane.classList.remove('d-none');
                    chaizContainer.classList.remove('d-none');
                    quizRightDiv.classList.add('d-none');
                    rightPane.scrollIntoView({ behavior: 'smooth' });
                }

                if (loadingSpinner) loadingSpinner.style.display = 'block';
                if (loadingInline) loadingInline.style.display = 'block';
                if (resultContainer) resultContainer.innerHTML = '';

                function startPollingForResults() {
                    const spinDuration = 4000;

                    if (loadingSpinner) loadingSpinner.style.display = 'block';
                    if (loadingInline) loadingInline.style.display = 'block';

                    setTimeout(() => {
                        if (loadingSpinner) loadingSpinner.style.display = 'none';
                        if (loadingInline) loadingInline.style.display = 'none';
                    }, spinDuration);
                }

                const existingScript = document.querySelector('script[src="https://uat.warranty-search.chaiz.com/initialize.js"]');
                if (!existingScript) {
                    const script = document.createElement('script');
                    script.src = 'https://uat.warranty-search.chaiz.com/initialize.js';
                    script.onload = () => {
                        startPollingForResults();
                    };
                    document.body.appendChild(script);
                } else {
                    startPollingForResults();
                }
            }


            function submitFormData() {
                const finalButton = document.getElementById("to-card") || document.getElementById("to-final");
                const originalText = finalButton.textContent;
                finalButton.disabled = true;
                finalButton.textContent = 'Submitting...';

                const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') ||
                    document.querySelector('input[name="_token"]')?.value;

                console.log('CSRF Token:', csrfToken);
                console.log('Car Data:', window.carData);

                const formData = new FormData();
                formData.append('_token', csrfToken);
                formData.append('sel-year', window.carData.year);
                formData.append('sel-make', window.carData.make);
                formData.append('sel-model', window.carData.model);
                formData.append('car_mileage', window.carData.mileage);
                formData.append('warranty', window.carData.warranty);
                formData.append('user-state', window.carData.state);
                formData.append('user-zip', window.carData.zip);
                formData.append('email', window.carData.email);
                formData.append('user-name', window.carData.name);
                formData.append('user-number', window.carData.phone);

                console.log('Form data being sent:');
                for (let [key, value] of formData.entries()) {
                    console.log(key, value);
                }

                const requiredFields = ['year', 'make', 'model', 'mileage', 'warranty', 'state', 'zip', 'email', 'name', 'phone'];
                const missingFields = requiredFields.filter(field => !window.carData[field]);

                if (missingFields.length > 0) {
                    alert('Missing required fields: ' + missingFields.join(', '));
                    finalButton.disabled = false;
                    finalButton.textContent = originalText;
                    return;
                }

                const submitUrl = '/lead-submit';

                fetch(submitUrl, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                    .then(response => {
                        console.log('Response status:', response.status);
                        console.log('Response headers:', response.headers);

                        const contentType = response.headers.get('content-type');

                        if (response.status === 422) {
                            return response.json().then(data => {
                                throw { status: 422, data: data };
                            });
                        }

                        if (!response.ok) {
                            return response.text().then(text => {
                                throw new Error(`HTTP ${response.status}: ${text}`);
                            });
                        }

                        if (contentType && contentType.includes('application/json')) {
                            return response.json();
                        } else {
                            return { success: true, redirect: response.url };
                        }
                    })
                    .then(data => {
                        console.log('Success response:', data);
                        document.getElementById('car-quiz').classList.remove('show');
                        showSuccessModal(data);

                        // ✅ Push custom event to GTM
                        if (window.dataLayer) {
                            window.dataLayer.push({
                                event: 'leadSubmission',
                                leadDestination: data.destination || 'Unknown'
                            });
                        }
                    })
                    .catch(error => {
                        console.error('Full error:', error);

                        if (error.status === 422 && error.data && error.data.errors) {
                            let errorMessage = 'Please fix the following errors:\n';
                            Object.keys(error.data.errors).forEach(key => {
                                errorMessage += `- ${error.data.errors[key][0]}\n`;
                            });
                            alert(errorMessage);
                        } else if (error.message) {
                            alert('Error: ' + error.message);
                        } else {
                            alert('Error: Failed to submit your information. Please check the console for details and try again.');
                        }
                    })
                    .finally(() => {
                        finalButton.disabled = false;
                        finalButton.textContent = originalText;
                    });
            }

            function showSuccessModal(responseData) {
                if (window.chaizSkipPressed) {
                    // Toggle visibility of sections
                    const modalRightSection = document.querySelector('.modal-right-section.d-none');
                    const carQuizLeft = document.querySelector('.car-quiz-left');
                    const carQuizModal = document.getElementById('car-quiz');

                    if (modalRightSection) {
                        modalRightSection.classList.remove('d-none');
                    }

                    if (carQuizLeft) {
                        carQuizLeft.classList.add('d-none');
                    }

                    if (carQuizModal) {
                        carQuizModal.style.display = 'flex';  // or 'flex' depending on your CSS
                    }

                    setLeadDestination(responseData.destination || 'Endurance API');
                    // Don't show the success modal or run the Chaiz script
                    return;
                }

                const successModal = document.getElementById('success-modal');
                if (!successModal) return;

                setLeadDestination(responseData.destination || 'Endurance API');
                successModal.style.display = 'flex';

                if (window.carData) {
                    const make = window.carData.make
                        ? window.carData.make.toLowerCase().replace(/\s+/g, '-')
                        : 'default-make';

                    const model = window.carData.model
                        ? window.carData.model.toLowerCase().replace(/\s+/g, '-')
                        : 'default-model';

                    const year = window.carData.year
                        ? parseInt(window.carData.year, 10)
                        : 2020;

                    const state = window.carData.state
                        ? window.carData.state.toUpperCase()
                        : 'NJ';

                    let mileage = 30000;
                    if (typeof window.carData.mileage === 'string') {
                        const digits = window.carData.mileage.replace(/\D/g, '');
                        if (digits) {
                            mileage = parseInt(digits, 10);
                        }
                    }

                    window.chaizWarrantySearchConfig = {
                        targetElementId: "search-results",
                        searchData: {
                            make,
                            model,
                            year,
                            state,
                            mileage,
                            userId: "96d8841b-6ae6-4cb6-9b43-401662e25560"
                        }
                    };

                    if (!document.querySelector('script[src="https://uat.warranty-search.chaiz.com/initialize.js"]')) {
                        const script = document.createElement('script');
                        script.src = 'https://uat.warranty-search.chaiz.com/initialize.js';
                        document.body.appendChild(script);
                    }
                }
            }


            function setLeadDestination(destination) {
                const destinationElements = document.querySelectorAll('.destination-name');
                if (!destinationElements.length) return;

                let destinationText = '';
                let destinationColor = '';

                switch (destination) {
                    case 'Endurance':
                        destinationText = 'Endurance';
                        destinationColor = '#ffc107';
                        break;
                    case 'American Dream':
                        destinationText = 'American Dream';
                        destinationColor = '#ffc107';
                        break;
                    case 'Submission Failed':
                        destinationText = '❌ Submission Failed';
                        destinationColor = '#dc3545';
                        break;
                    case 'System Error':
                        destinationText = '⚠️ System Error';
                        destinationColor = '#dc3545';
                        break;
                    default:
                        destinationText = '✅ Successfully Submitted';
                        destinationColor = '#28a745';
                }

                destinationElements.forEach((el) => {
                    el.textContent = destinationText;
                    el.style.color = destinationColor;
                });
            }

            function closeSuccessModal() {
                const successModal = document.getElementById('success-modal');
                if (successModal) {
                    successModal.remove();
                }
            }

            function showSuccessStep() {
                showSuccessModal({});
            }

            // Make functions available globally
            window.skipMyDetails = skipMyDetails;
            window.closeModal = closeSuccessModal;
            window.closeSuccessModal = closeSuccessModal;

            // Rest of your event listeners and initialization code...
            const skipButton = document.querySelector('button[onclick="skipMyDetails()"]');
            if (skipButton) {
                skipButton.removeAttribute('onclick');
                skipButton.addEventListener('click', skipMyDetails);
            }

            document.querySelectorAll('.vehicle-option').forEach(button => {
                button.addEventListener('click', () => {
                    document.getElementById('car-make').value = button.dataset.value;
                    const quizModal = document.getElementById('car-quiz');
                    quizModal.classList.remove('d-none');
                    quizModal.classList.add('show');
                    document.querySelector('.begin-btn').textContent = 'Continue';
                });
            });

            document.addEventListener('click', (event) => {
                if (event.target.matches('.match-cta-button')) {
                    openModal();
                }

                if (event.target.matches('.begin-btn')) {
                    openModal();
                    event.target.textContent = 'Continue';
                }
            });

            function openModal() {
                const quizModal = document.getElementById('car-quiz');
                if (quizModal) {
                    quizModal.classList.remove('d-none');
                    quizModal.classList.add('show');
                }
            }

            document.getElementById('car-quiz').addEventListener('click', (e) => {
                if (e.target.id === 'car-quiz') {
                    e.currentTarget.classList.remove('show');
                }
            });

            // Rest of your existing initialization code...
            const yearSelect = document.getElementById("sel_year");
            const makeSelect = document.getElementById("sel_make");
            const modelSelect = document.getElementById("sel_model");

            const currentYear = new Date().getFullYear();
            for (let y = currentYear; y >= 2005; y--) {
                const opt = document.createElement("option");
                opt.value = y;
                opt.textContent = y;
                yearSelect.appendChild(opt);
            }

            const vehicles = [
                "ACURA 2.3CL",

                "ACURA 3.0CL",
                "ACURA 3.2CL",
                "ACURA 3.2TL",
                "ACURA 3.5RL",
                "ACURA ILX",
                "ACURA INTEGRA",
                "ACURA MDX",
                "ACURA NSX",
                "ACURA RDX",
                "ACURA RL",
                "ACURA RLX",
                "ACURA RSX",
                "ACURA SLX",
                "ACURA TL",
                "ACURA TLX",
                "ACURA TSX",
                "ACURA ZDX",
                "ALFA ROMEO 4C",
                "ALFA ROMEO 8C COMPETIZIONE",
                "ALFA ROMEO GIULIA",
                "ALFA ROMEO STELVIO",
                "ALFA ROMEO TONALE",
                "ASTON MARTIN DB11",
                "ASTON MARTIN DB12",
                "ASTON MARTIN DB7",
                "ASTON MARTIN DB9",
                "ASTON MARTIN DBS",
                "ASTON MARTIN DBX",
                "ASTON MARTIN RAPIDE",
                "ASTON MARTIN V12 VANTAGE",
                "ASTON MARTIN V8",
                "ASTON MARTIN VALOUR",
                "ASTON MARTIN VANQUISH",
                "ASTON MARTIN VANTAGE",
                "ASTON MARTIN VIRAGE",
                "AUDI A3",
                "AUDI A4",
                "AUDI A4 ALLROAD",
                "AUDI A5",
                "AUDI A6",
                "AUDI A6 ALLROAD",
                "AUDI A7",
                "AUDI A8",
                "AUDI ALLROAD",
                "AUDI E-TRON",
                "AUDI E-TRON GT",
                "AUDI E-TRON S",
                "AUDI NEW S4",
                "AUDI Q3",
                "AUDI Q4 E-TRON",
                "AUDI Q5",
                "AUDI Q5 E",
                "AUDI Q7",
                "AUDI Q8",
                "AUDI Q8 E-TRON",
                "AUDI R8",
                "AUDI RS E-TRON GT",
                "AUDI RS Q8",
                "AUDI RS3",
                "AUDI RS4",
                "AUDI RS5",
                "AUDI RS6",
                "AUDI RS7",
                "AUDI S3",
                "AUDI S4",
                "AUDI S5",
                "AUDI S6",
                "AUDI S7",
                "AUDI S8",
                "AUDI SQ5",
                "AUDI SQ7",
                "AUDI SQ8",
                "AUDI SQ8 E-TRON",
                "AUDI TT",
                "AUDI TT RS",
                "AUDI TTS",
                "BENTLEY ARNAGE",
                "BENTLEY AZURE",
                "BENTLEY BENTAYGA",
                "BENTLEY BROOKLANDS",
                "BENTLEY CONTINENTAL",
                "BENTLEY FLYING SPUR",
                "BENTLEY MULSANNE",
                "BMW 128",
                "BMW 135",
                "BMW 1M",
                "BMW 228",
                "BMW 228I",
                "BMW 228XI",
                "BMW 230I",
                "BMW 230XI",
                "BMW 318",
                "BMW 320",
                "BMW 323",
                "BMW 325",
                "BMW 328",
                "BMW 330",
                "BMW 330E",
                "BMW 330I",
                "BMW 330XE",
                "BMW 330XI",
                "BMW 335",
                "BMW 340",
                "BMW 340XI",
                "BMW 428",
                "BMW 430I",
                "BMW 430XI",
                "BMW 435",
                "BMW 440I",
                "BMW 440XI",
                "BMW 525",
                "BMW 528",
                "BMW 530",
                "BMW 530E",
                "BMW 530XE",
                "BMW 535",
                "BMW 540",
                "BMW 540XD",
                "BMW 545",
                "BMW 550",
                "BMW 640",
                "BMW 645",
                "BMW 650",
                "BMW 740",
                "BMW 745",
                "BMW 745XE",
                "BMW 750",
                "BMW 760",
                "BMW 840I",
                "BMW 840XI",
                "BMW ACTIVE E",
                "BMW ACTIVEHYBRID 3",
                "BMW ACTIVEHYBRID 5",
                "BMW ACTIVEHYBRID 7",
                "BMW ALPINA B6",
                "BMW ALPINA B7",
                "BMW ALPINA B8",
                "BMW I3",
                "BMW I4",
                "BMW I4 EDRIVE35",
                "BMW I4 EDRIVE40",
                "BMW I4 M50",
                "BMW I4 XDRIVE40",
                "BMW I5",
                "BMW I7",
                "BMW I8",
                "BMW IX",
                "BMW M",
                "BMW M2",
                "BMW M235I",
                "BMW M235XI",
                "BMW M240I",
                "BMW M240XI",
                "BMW M3",
                "BMW M340I",
                "BMW M340XI",
                "BMW M4",
                "BMW M440I",
                "BMW M440XI",
                "BMW M5",
                "BMW M550XI",
                "BMW M6",
                "BMW M760",
                "BMW M8",
                "BMW M850XI",
                "BMW X1",
                "BMW X2",
                "BMW X3",
                "BMW X4",
                "BMW X5",
                "BMW X6",
                "BMW X7",
                "BMW XM",
                "BMW Z3",
                "BMW Z4",
                "BMW Z8",
                "BUICK CASCADA",
                "BUICK CENTURY",
                "BUICK ENCLAVE",
                "BUICK ENCORE",
                "BUICK ENCORE GX",
                "BUICK ENVISION",
                "BUICK ENVISTA",
                "BUICK LACROSSE",
                "BUICK LESABRE",
                "BUICK LUCERNE",
                "BUICK PARK AVENUE",
                "BUICK RAINIER",
                "BUICK REGAL",
                "BUICK REGAL TOURX",
                "BUICK RENDEZVOUS",
                "BUICK RIVIERA",
                "BUICK TERRAZA",
                "BUICK VERANO",
                "CADILLAC ATS",
                "CADILLAC ATS-V",
                "CADILLAC CATERA",
                "CADILLAC COMMERCIAL CHASSIS",
                "CADILLAC CT4",
                "CADILLAC CT4-V",
                "CADILLAC CT5",
                "CADILLAC CT5-V",
                "CADILLAC CT6",
                "CADILLAC CT6-V",
                "CADILLAC CTS",
                "CADILLAC CTS-V",
                "CADILLAC DEVILLE",
                "CADILLAC DTS",
                "CADILLAC ELDORADO",
                "CADILLAC ELR",
                "CADILLAC ESCALADE",
                "CADILLAC ESCALADE IQ",
                "CADILLAC ESCALADE V",
                "CADILLAC LYRIQ",
                "CADILLAC LYRIQ-V",
                "CADILLAC PROFESSIONAL CHASSIS",
                "CADILLAC SEVILLE",
                "CADILLAC SRX",
                "CADILLAC STS",
                "CADILLAC STS-V",
                "CADILLAC XLR",
                "CADILLAC XLR-V",
                "CADILLAC XT4",
                "CADILLAC XT5",
                "CADILLAC XT6",
                "CADILLAC XTS",
                "CHEVROLET ASTRO",
                "CHEVROLET AVALANCHE",
                "CHEVROLET AVEO",
                "CHEVROLET BLAZER",
                "CHEVROLET BOLT EUV",
                "CHEVROLET BOLT EV",
                "CHEVROLET CAMARO",
                "CHEVROLET CAPRICE",
                "CHEVROLET CAPTIVA",
                "CHEVROLET CAVALIER",
                "CHEVROLET CITY EXPRESS",
                "CHEVROLET CLASSIC",
                "CHEVROLET COBALT",
                "CHEVROLET COLORADO",
                "CHEVROLET CORVETTE",
                "CHEVROLET CRUZE",
                "CHEVROLET CRUZE LIMITED",
                "CHEVROLET EQUINOX",
                "CHEVROLET EQUINOX LIMITED",
                "CHEVROLET EXPRESS CUTAWAY",
                "CHEVROLET EXPRESS G1500",
                "CHEVROLET EXPRESS G2500",
                "CHEVROLET EXPRESS G3500",
                "CHEVROLET EXPRESS G4500",
                "CHEVROLET EXPRESS VAN",
                "CHEVROLET GEO PRIZM",
                "CHEVROLET GMT-400",
                "CHEVROLET HHR",
                "CHEVROLET IMPALA",
                "CHEVROLET IMPALA LIMITED",
                "CHEVROLET LUMINA",
                "CHEVROLET MALIBU",
                "CHEVROLET MALIBU LIMITED",
                "CHEVROLET METRO",
                "CHEVROLET MONTE CARLO",
                "CHEVROLET S TRUCK",
                "CHEVROLET S10",
                "CHEVROLET SILVERADO",
                "CHEVROLET SILVERADO LD",
                "CHEVROLET SILVERADO LTD",
                "CHEVROLET SONIC",
                "CHEVROLET SPARK",
                "CHEVROLET SPARK EV",
                "CHEVROLET SS",
                "CHEVROLET SSR",
                "CHEVROLET SUBURBAN",
                "CHEVROLET TAHOE",
                "CHEVROLET TRACKER",
                "CHEVROLET TRAILBLAZER",
                "CHEVROLET TRAVERSE",
                "CHEVROLET TRAVERSE LIMITED",
                "CHEVROLET TRAX",
                "CHEVROLET UPLANDER",
                "CHEVROLET VENTURE",
                "CHEVROLET VOLT",
                "CHRYSLER 200",
                "CHRYSLER 300",
                "CHRYSLER 300C",
                "CHRYSLER 300M",
                "CHRYSLER ASPEN",
                "CHRYSLER CIRRUS",
                "CHRYSLER CONCORDE",
                "CHRYSLER CROSSFIRE",
                "CHRYSLER GRAND VOYAGER",
                "CHRYSLER LHS",
                "CHRYSLER PACIFICA",
                "CHRYSLER PROWLER",
                "CHRYSLER PT CRUISER",
                "CHRYSLER SEBRING",
                "CHRYSLER TOWN & COUNTRY",
                "CHRYSLER VOYAGER",
                "DAEWOO LANOS",
                "DAEWOO LEGANZA",
                "DAEWOO NUBIRA",
                "DODGE AVENGER",
                "DODGE CALIBER",
                "DODGE CARAVAN",
                "DODGE CHALLENGER",
                "DODGE CHARGER",
                "DODGE DAKOTA",
                "DODGE DART",
                "DODGE DURANGO",
                "DODGE GRAND CARAVAN",
                "DODGE HORNET",
                "DODGE INTREPID",
                "DODGE JOURNEY",
                "DODGE MAGNUM",
                "DODGE NEON",
                "DODGE NITRO",
                "DODGE RAM 1500",
                "DODGE RAM 2500",
                "DODGE RAM 3500",
                "DODGE RAM SRT10",
                "DODGE RAM VAN",
                "DODGE RAM WAGON",
                "DODGE SPRINTER",
                "DODGE STRATUS",
                "DODGE VIPER",
                "FERRARI 12 CILINDRI",
                "FERRARI 296 GTS",
                "FERRARI 296GTB",
                "FERRARI 360",
                "FERRARI 430",
                "FERRARI 456",
                "FERRARI 458 ITALIA",
                "FERRARI 458 SPECIALE",
                "FERRARI 458 SPIDER",
                "FERRARI 488 GTB",
                "FERRARI 488 PISTA",
                "FERRARI 488 PISTA SPIDER",
                "FERRARI 488 SPIDER",
                "FERRARI 575",
                "FERRARI 599",
                "FERRARI 612",
                "FERRARI 812 COMPETIZIONE",
                "FERRARI 812 COMPETIZIONE A",
                "FERRARI 812 GTS",
                "FERRARI 812 SUPERFAST",
                "FERRARI CALIFORNIA",
                "FERRARI CALIFORNIA T",
                "FERRARI DAYTONA SP3",
                "FERRARI ENZO",
                "FERRARI F12 BERLINETTA",
                "FERRARI F12TDF",
                "FERRARI F164 BCB",
                "FERRARI F355",
                "FERRARI F430",
                "FERRARI F550",
                "FERRARI F575",
                "FERRARI F60 AMERICA",
                "FERRARI F8 SPIDER",
                "FERRARI F8 TRIBUTO",
                "FERRARI FF",
                "FERRARI GTC 4 LUSSO T",
                "FERRARI GTC4 LUSSO",
                "FERRARI LAFERRARI",
                "FERRARI PORTOFINO",
                "FERRARI PORTOFINO M",
                "FERRARI PUROSANGUE",
                "FERRARI ROMA",
                "FERRARI ROMA SPIDER",
                "FERRARI SF 90 SPIDER",
                "FERRARI SF 90 STRADALE",
                "FERRARI SF90 XX SPIDER",
                "FERRARI SF90 XX STRADALE",
                "FIAT 124 SPIDER",
                "FIAT 500",
                "FIAT 500L",
                "FIAT 500X",
                "FORD BRONCO",
                "FORD BRONCO SPORT",
                "FORD C-MAX",
                "FORD CONTOUR",
                "FORD CROWN VICTORIA",
                "FORD ECONOLINE",
                "FORD ECOSPORT",
                "FORD EDGE",
                "FORD ESCAPE",
                "FORD ESCORT",
                "FORD EXCURSION",
                "FORD EXPEDITION",
                "FORD EXPLORER",
                "FORD EXPLORER SPORT TRAC",
                "FORD F-150 HERITAGE",
                "FORD F150",
                "FORD F250",
                "FORD F350",
                "FORD F450",
                "FORD F550",
                "FORD FIESTA",
                "FORD FIVE HUNDRED",
                "FORD FLEX",
                "FORD FOCUS",
                "FORD FREESTAR",
                "FORD FREESTYLE",
                "FORD FUSION",
                "FORD GT",
                "FORD MAVERICK",
                "FORD MUSTANG",
                "FORD MUSTANG MACH-E",
                "FORD RANGER",
                "FORD TAURUS",
                "FORD TAURUS X",
                "FORD THINK NEIGHBOR",
                "FORD THUNDERBIRD",
                "FORD TRANSIT",
                "FORD TRANSIT CONNECT",
                "FORD WINDSTAR",
                "FREIGHTLINER SPRINTER",
                "GENESIS G70",
                "GENESIS G80",
                "GENESIS G90",
                "GENESIS GV60",
                "GENESIS GV70",
                "GENESIS GV80",
                "GMC ACADIA",
                "GMC ACADIA LIMITED",
                "GMC CANYON",
                "GMC DENALI",
                "GMC ENVOY",
                "GMC HUMMER PICKUP",
                "GMC HUMMER SUV",
                "GMC JIMMY",
                "GMC JIMMY / ENVOY",
                "GMC NEW SIERRA",
                "GMC SAFARI",
                "GMC SAVANA",
                "GMC SIERRA",
                "GMC SIERRA LIMITED",
                "GMC SONOMA",
                "GMC SUBURBAN",
                "GMC TERRAIN",
                "GMC YUKON",
                "GMC YUKON XL",
                "HONDA ACCORD",
                "HONDA ACCORD CROSSTOUR",
                "HONDA CIVIC",
                "HONDA CLARITY",
                "HONDA CR-V",
                "HONDA CR-Z",
                "HONDA CROSSTOUR",
                "HONDA ELEMENT",
                "HONDA EV PLUS",
                "HONDA FCX",
                "HONDA FCX CLARITY",
                "HONDA FIT",
                "HONDA FIT EV",
                "HONDA HR-V",
                "HONDA INSIGHT",
                "HONDA ODYSSEY",
                "HONDA PASSPORT",
                "HONDA PILOT",
                "HONDA PRELUDE",
                "HONDA PROLOGUE",
                "HONDA RIDGELINE",
                "HONDA S2000",
                "HUMMER H1",
                "HUMMER H1 ALPHA",
                "HUMMER H2",
                "HUMMER H2 SUT",
                "HUMMER H3",
                "HUMMER H3T",
                "HYUNDAI ACCENT",
                "HYUNDAI AZERA",
                "HYUNDAI ELANTRA",
                "HYUNDAI ELANTRA COUPE",
                "HYUNDAI ELANTRA GT",
                "HYUNDAI ELANTRA N",
                "HYUNDAI ELANTRA TOURING",
                "HYUNDAI ENTOURAGE",
                "HYUNDAI EQUUS",
                "HYUNDAI GENESIS",
                "HYUNDAI GENESIS COUPE",
                "HYUNDAI IONIQ",
                "HYUNDAI IONIQ 5",
                "HYUNDAI IONIQ 6",
                "HYUNDAI KONA",
                "HYUNDAI KONA N",
                "HYUNDAI NEXO",
                "HYUNDAI PALISADE",
                "HYUNDAI SANTA CRUZ",
                "HYUNDAI SANTA FE",
                "HYUNDAI SANTA FE SPORT",
                "HYUNDAI SANTA FE XL",
                "HYUNDAI SONATA",
                "HYUNDAI TIBURON",
                "HYUNDAI TUCSON",
                "HYUNDAI VELOSTER",
                "HYUNDAI VELOSTER N",
                "HYUNDAI VENUE",
                "HYUNDAI VERACRUZ",
                "HYUNDAI XG",
                "INFINITI EX35",
                "INFINITI EX37",
                "INFINITI FX35",
                "INFINITI FX37",
                "INFINITI FX45",
                "INFINITI FX50",
                "INFINITI G20",
                "INFINITI G25",
                "INFINITI G35",
                "INFINITI G37",
                "INFINITI I30",
                "INFINITI I35",
                "INFINITI JX35",
                "INFINITI M35",
                "INFINITI M35H",
                "INFINITI M37",
                "INFINITI M45",
                "INFINITI M56",
                "INFINITI Q40",
                "INFINITI Q45",
                "INFINITI Q50",
                "INFINITI Q60",
                "INFINITI Q70",
                "INFINITI Q70L",
                "INFINITI QX30",
                "INFINITI QX4",
                "INFINITI QX50",
                "INFINITI QX55",
                "INFINITI QX56",
                "INFINITI QX60",
                "INFINITI QX70",
                "INFINITI QX80",
                "ISUZU AMIGO",
                "ISUZU ASCENDER",
                "ISUZU AXIOM",
                "ISUZU HOMBRE",
                "ISUZU I-280",
                "ISUZU I-290",
                "ISUZU I-350",
                "ISUZU I-370",
                "ISUZU OASIS",
                "ISUZU RODEO",
                "ISUZU TROOPER",
                "ISUZU VEHICROSS",
                "JAGUAR E-PACE",
                "JAGUAR F-PACE",
                "JAGUAR F-TYPE",
                "JAGUAR I-PACE",
                "JAGUAR S-TYPE",
                "JAGUAR SUPER V8",
                "JAGUAR VANDENPLAS",
                "JAGUAR X-TYPE",
                "JAGUAR XE",
                "JAGUAR XF",
                "JAGUAR XJ",
                "JAGUAR XJ8",
                "JAGUAR XJL",
                "JAGUAR XJR",
                "JAGUAR XK",
                "JAGUAR XK8",
                "JAGUAR XKR",
                "JEEP CHEROKEE",
                "JEEP COMMANDER",
                "JEEP COMPASS",
                "JEEP GLADIATOR",
                "JEEP GRAND CHEROKEE",
                "JEEP GRAND WAGONEER",
                "JEEP LIBERTY",
                "JEEP PATRIOT",
                "JEEP RENEGADE",
                "JEEP WAGONEER",
                "JEEP WAGONEER S",
                "JEEP WRANGLER",
                "JEEP WRANGLER / TJ",
                "JEEP WRANGLER UNLIMITED",
                "KIA AMANTI",
                "KIA BORREGO",
                "KIA CADENZA",
                "KIA CARNIVAL",
                "KIA EV6",
                "KIA EV9",
                "KIA FORTE",
                "KIA K4",
                "KIA K5",
                "KIA K900",
                "KIA NEW SPORTAGE",
                "KIA NIRO",
                "KIA OPTIMA",
                "KIA RIO",
                "KIA RONDO",
                "KIA SEDONA",
                "KIA SELTOS",
                "KIA SEPHIA",
                "KIA SORENTO",
                "KIA SOUL",
                "KIA SOUL EV",
                "KIA SPECTRA",
                "KIA SPECTRA5",
                "KIA SPORTAGE",
                "KIA STINGER",
                "KIA TELLURIDE",
                "LAMBORGHINI AVENTADOR",
                "LAMBORGHINI DIABLO",
                "LAMBORGHINI GALLARDO",
                "LAMBORGHINI HURACAN",
                "LAMBORGHINI MURCIELAGO",
                "LAMBORGHINI REVUELTO",
                "LAMBORGHINI URUS",
                "LAMBORGHINI VENENO",
                "LAND ROVER DEFENDER",
                "LAND ROVER DISCOVERY",
                "LAND ROVER DISCOVERY II",
                "LAND ROVER DISCOVERY SPORT",
                "LAND ROVER FREELANDER",
                "LAND ROVER LR2",
                "LAND ROVER LR3",
                "LAND ROVER LR4",
                "LAND ROVER RANGE ROVER",
                "LAND ROVER RANGE ROVER EVOQUE",
                "LAND ROVER RANGE ROVER SPORT",
                "LAND ROVER RANGE ROVER VELAR",
                "LEXUS CT",
                "LEXUS ES",
                "LEXUS GS",
                "LEXUS GS-F",
                "LEXUS GX",
                "LEXUS HS",
                "LEXUS IS",
                "LEXUS IS-F",
                "LEXUS LC",
                "LEXUS LFA",
                "LEXUS LS",
                "LEXUS LX",
                "LEXUS NX",
                "LEXUS RC",
                "LEXUS RC-F",
                "LEXUS RX",
                "LEXUS RZ",
                "LEXUS SC",
                "LEXUS TX",
                "LEXUS UX",
                "LINCOLN AVIATOR",
                "LINCOLN BLACKWOOD",
                "LINCOLN CONTINENTAL",
                "LINCOLN CORSAIR",
                "LINCOLN LS",
                "LINCOLN MARK LT",
                "LINCOLN MKC",
                "LINCOLN MKS",
                "LINCOLN MKT",
                "LINCOLN MKX",
                "LINCOLN MKZ",
                "LINCOLN NAUTILUS",
                "LINCOLN NAVIGATOR",
                "LINCOLN TOWN CAR",
                "LINCOLN ZEPHYR",
                "LOTUS ELISE",
                "LOTUS EMIRA",
                "LOTUS ESPRIT",
                "LOTUS EVORA",
                "LOTUS EXIGE",
                "LUCID MOTORS AIR",
                "MASERATI COUPE",
                "MASERATI GHIBLI",
                "MASERATI GRANCABRIO",
                "MASERATI GRANSPORT",
                "MASERATI GRANTURISMO",
                "MASERATI GRECALE",
                "MASERATI LEVANTE",
                "MASERATI MC20",
                "MASERATI QUATTROPORTE",
                "MASERATI SPYDER",
                "MAYBACH MAYBACH",
                "MAZDA 3",
                "MAZDA 5",
                "MAZDA 6",
                "MAZDA 626",
                "MAZDA B2300",
                "MAZDA B2500",
                "MAZDA B3000",
                "MAZDA B4000",
                "MAZDA CX-3",
                "MAZDA CX-30",
                "MAZDA CX-5",
                "MAZDA CX-50",
                "MAZDA CX-7",
                "MAZDA CX-70",
                "MAZDA CX-9",
                "MAZDA CX-90",
                "MAZDA MAZDA2",
                "MAZDA MILLENIA",
                "MAZDA MPV",
                "MAZDA MX-30",
                "MAZDA MX-5 MIATA",
                "MAZDA PROTEGE",
                "MAZDA RX8",
                "MAZDA SPEED",
                "MAZDA TRIBUTE",
                "MCLAREN AUTOMOTIVE 540C",
                "MCLAREN AUTOMOTIVE 570GT",
                "MCLAREN AUTOMOTIVE 570S",
                "MCLAREN AUTOMOTIVE 600LT",
                "MCLAREN AUTOMOTIVE 620R",
                "MCLAREN AUTOMOTIVE 650S",
                "MCLAREN AUTOMOTIVE 675LT",
                "MCLAREN AUTOMOTIVE 720S",
                "MCLAREN AUTOMOTIVE 750S",
                "MCLAREN AUTOMOTIVE 765LT",
                "MCLAREN AUTOMOTIVE ARTURA",
                "MCLAREN AUTOMOTIVE ELVA",
                "MCLAREN AUTOMOTIVE GT",
                "MCLAREN AUTOMOTIVE GTS",
                "MCLAREN AUTOMOTIVE MP4-12C",
                "MCLAREN AUTOMOTIVE P1",
                "MCLAREN AUTOMOTIVE SENNA",
                "MCLAREN AUTOMOTIVE SENNA GTR",
                "MCLAREN AUTOMOTIVE SPEEDTAIL",
                "MERCEDES-BENZ A",
                "MERCEDES-BENZ AMG GT",
                "MERCEDES-BENZ B",
                "MERCEDES-BENZ C",
                "MERCEDES-BENZ CL",
                "MERCEDES-BENZ CLA",
                "MERCEDES-BENZ CLE",
                "MERCEDES-BENZ CLK",
                "MERCEDES-BENZ CLS",
                "MERCEDES-BENZ E",
                "MERCEDES-BENZ EQB",
                "MERCEDES-BENZ EQE SEDAN",
                "MERCEDES-BENZ EQE SUV",
                "MERCEDES-BENZ EQS SEDAN",
                "MERCEDES-BENZ EQS SUV",
                "MERCEDES-BENZ ESPRINTER",
                "MERCEDES-BENZ G",
                "MERCEDES-BENZ GL",
                "MERCEDES-BENZ GLA",
                "MERCEDES-BENZ GLB",
                "MERCEDES-BENZ GLC",
                "MERCEDES-BENZ GLC COUPE",
                "MERCEDES-BENZ GLE",
                "MERCEDES-BENZ GLE COUPE",
                "MERCEDES-BENZ GLK",
                "MERCEDES-BENZ GLS",
                "MERCEDES-BENZ METRIS",
                "MERCEDES-BENZ ML",
                "MERCEDES-BENZ R",
                "MERCEDES-BENZ S",
                "MERCEDES-BENZ SL",
                "MERCEDES-BENZ SLC",
                "MERCEDES-BENZ SLK",
                "MERCEDES-BENZ SLR",
                "MERCEDES-BENZ SLS",
                "MERCEDES-BENZ SPRINTER",
                "MERCURY COUGAR",
                "MERCURY GRAND MARQUIS",
                "MERCURY MARAUDER",
                "MERCURY MARINER",
                "MERCURY MILAN",
                "MERCURY MONTEGO",
                "MERCURY MONTEREY",
                "MERCURY MOUNTAINEER",
                "MERCURY MYSTIQUE",
                "MERCURY SABLE",
                "MERCURY TRACER",
                "MERCURY VILLAGER",
                "MINI COOPER",
                "MINI COOPER COUPE",
                "MINI COOPER ROADSTER",
                "MITSUBISHI 3000 GT",
                "MITSUBISHI DIAMANTE",
                "MITSUBISHI ECLIPSE",
                "MITSUBISHI ECLIPSE CROSS",
                "MITSUBISHI ENDEAVOR",
                "MITSUBISHI GALANT",
                "MITSUBISHI I MIEV",
                "MITSUBISHI LANCER",
                "MITSUBISHI MIRAGE",
                "MITSUBISHI MONTERO",
                "MITSUBISHI OUTLANDER",
                "MITSUBISHI OUTLANDER SPORT",
                "MITSUBISHI RAIDER",
                "NISSAN 350Z",
                "NISSAN 370Z",
                "NISSAN ALTIMA",
                "NISSAN ALTRA",
                "NISSAN ARIYA",
                "NISSAN ARMADA",
                "NISSAN CUBE",
                "NISSAN FRONTIER",
                "NISSAN GT-R",
                "NISSAN JUKE",
                "NISSAN KICKS",
                "NISSAN LEAF",
                "NISSAN MAXIMA",
                "NISSAN MURANO",
                "NISSAN NV",
                "NISSAN NV200",
                "NISSAN PATHFINDER",
                "NISSAN QUEST",
                "NISSAN ROGUE",
                "NISSAN ROGUE SELECT",
                "NISSAN ROGUE SPORT",
                "NISSAN SENTRA",
                "NISSAN TITAN",
                "NISSAN TITAN XD",
                "NISSAN VERSA",
                "NISSAN VERSA NOTE",
                "NISSAN XTERRA",
                "NISSAN Z",
                "OLDSMOBILE 88",
                "OLDSMOBILE ALERO",
                "OLDSMOBILE AURORA",
                "OLDSMOBILE BRAVADA",
                "OLDSMOBILE CUTLASS",
                "OLDSMOBILE INTRIGUE",
                "OLDSMOBILE LSS",
                "OLDSMOBILE SILHOUETTE",
                "PLYMOUTH BREEZE",
                "PLYMOUTH GRAND VOYAGER",
                "PLYMOUTH NEON",
                "PLYMOUTH PROWLER",
                "PLYMOUTH VOYAGER",
                "PONTIAC AZTEK",
                "PONTIAC BONNEVILLE",
                "PONTIAC FIREBIRD",
                "PONTIAC G3",
                "PONTIAC G5",
                "PONTIAC G6",
                "PONTIAC G8",
                "PONTIAC GRAND AM",
                "PONTIAC GRAND PRIX",
                "PONTIAC GTO",
                "PONTIAC MONTANA",
                "PONTIAC MONTANA / TRANS SPORT",
                "PONTIAC SOLSTICE",
                "PONTIAC SUNFIRE",
                "PONTIAC TORRENT",
                "PONTIAC VIBE",
                "PORSCHE 911",
                "PORSCHE 911 NEW GENERATION",
                "PORSCHE 918",
                "PORSCHE BOXSTER",
                "PORSCHE CARRERA",
                "PORSCHE CAYENNE",
                "PORSCHE CAYMAN",
                "PORSCHE MACAN",
                "PORSCHE PANAMERA",
                "PORSCHE TAYCAN",
                "RAM 1500",
                "RAM 1500 CLASSIC",
                "RAM 2500",
                "RAM 3500",
                "RAM PROMASTER 1500",
                "RAM PROMASTER 2500",
                "RAM PROMASTER 3500",
                "RAM PROMASTER CITY",
                "RAM TRADESMAN",
                "RIVIAN EDV",
                "RIVIAN R1S",
                "RIVIAN R1T",
                "RIVIAN RCV",
                "ROLLS-ROYCE CORNICHE",
                "ROLLS-ROYCE CULLINAN",
                "ROLLS-ROYCE DAWN",
                "ROLLS-ROYCE GHOST",
                "ROLLS-ROYCE PARK WARD",
                "ROLLS-ROYCE PHANTOM",
                "ROLLS-ROYCE SILVER SERAPH",
                "ROLLS-ROYCE SILVER SPUR",
                "ROLLS-ROYCE SPECTRE",
                "ROLLS-ROYCE WRAITH",
                "SAAB 9-2",
                "SAAB 9-3",
                "SAAB 9-4X",
                "SAAB 9-5",
                "SAAB 9-7X",
                "SATURN ASTRA",
                "SATURN AURA",
                "SATURN ION",
                "SATURN L100",
                "SATURN L200",
                "SATURN L300",
                "SATURN LS",
                "SATURN LS1",
                "SATURN LS2",
                "SATURN LW1",
                "SATURN LW2",
                "SATURN LW200",
                "SATURN LW300",
                "SATURN OUTLOOK",
                "SATURN RELAY",
                "SATURN SC1",
                "SATURN SC2",
                "SATURN SKY",
                "SATURN SL",
                "SATURN SL1",
                "SATURN SL2",
                "SATURN SW1",
                "SATURN SW2",
                "SATURN VUE",
                "SMART FORTWO",
                "SPRINTER 2500 SPRINTER",
                "SPRINTER 3500 SPRINTER",
                "SUBARU ASCENT",
                "SUBARU B9 TRIBECA",
                "SUBARU BAJA",
                "SUBARU BRZ",
                "SUBARU CROSSTREK",
                "SUBARU FORESTER",
                "SUBARU IMPREZA",
                "SUBARU LEGACY",
                "SUBARU OUTBACK",
                "SUBARU SOLTERRA",
                "SUBARU TRIBECA",
                "SUBARU WRX",
                "SUBARU XV CROSSTREK",
                "SUZUKI AERIO",
                "SUZUKI EQUATOR",
                "SUZUKI ESTEEM",
                "SUZUKI FORENZA",
                "SUZUKI GRAND VITARA",
                "SUZUKI KIZASHI",
                "SUZUKI RENO",
                "SUZUKI SWIFT",
                "SUZUKI SX4",
                "SUZUKI VERONA",
                "SUZUKI VITARA",
                "SUZUKI XL7",
                "TESLA CYBERTRUCK",
                "TESLA MODEL 3",
                "TESLA MODEL S",
                "TESLA MODEL X",
                "TESLA MODEL Y",
                "TESLA ROADSTER",
                "TOYOTA 4RUNNER",
                "TOYOTA 86",
                "TOYOTA AVALON",
                "TOYOTA BZ4X",
                "TOYOTA C-HR",
                "TOYOTA CAMRY",
                "TOYOTA CAMRY SOLARA",
                "TOYOTA CELICA",
                "TOYOTA COROLLA",
                "TOYOTA COROLLA CROSS",
                "TOYOTA COROLLA IM",
                "TOYOTA COROLLA MATRIX",
                "TOYOTA CROWN",
                "TOYOTA ECHO",
                "TOYOTA FJ CRUISER",
                "TOYOTA GR 86",
                "TOYOTA GR COROLLA",
                "TOYOTA GRAND HIGHLANDER",
                "TOYOTA HIGHLANDER",
                "TOYOTA LAND CRUISER",
                "TOYOTA MIRAI",
                "TOYOTA MR2",
                "TOYOTA PRIUS",
                "TOYOTA PRIUS C",
                "TOYOTA PRIUS PLUG-IN",
                "TOYOTA PRIUS PRIME",
                "TOYOTA PRIUS V",
                "TOYOTA RAV4",
                "TOYOTA RAV4 EV",
                "TOYOTA RAV4 HV",
                "TOYOTA RAV4 PRIME",
                "TOYOTA SCION",
                "TOYOTA SCION FR-S",
                "TOYOTA SCION IA",
                "TOYOTA SCION IM",
                "TOYOTA SCION IQ",
                "TOYOTA SCION TC",
                "TOYOTA SCION XA",
                "TOYOTA SCION XB",
                "TOYOTA SCION XD",
                "TOYOTA SEQUOIA",
                "TOYOTA SIENNA",
                "TOYOTA SUPRA",
                "TOYOTA TACOMA",
                "TOYOTA TUNDRA",
                "TOYOTA VENZA",
                "TOYOTA YARIS",
                "TOYOTA YARIS IA",
                "VOLKSWAGEN ARTEON",
                "VOLKSWAGEN ATLAS",
                "VOLKSWAGEN ATLAS CROSS SPORT",
                "VOLKSWAGEN BEETLE",
                "VOLKSWAGEN CABRIO",
                "VOLKSWAGEN CC",
                "VOLKSWAGEN E-GOLF",
                "VOLKSWAGEN EOS",
                "VOLKSWAGEN EUROVAN",
                "VOLKSWAGEN GLI",
                "VOLKSWAGEN GOLF",
                "VOLKSWAGEN GOLF ALLTRACK",
                "VOLKSWAGEN GOLF R",
                "VOLKSWAGEN GOLF SPORTWAGEN",
                "VOLKSWAGEN GTI",
                "VOLKSWAGEN ID.4",
                "VOLKSWAGEN JETTA",
                "VOLKSWAGEN NEW BEETLE",
                "VOLKSWAGEN NEW GTI",
                "VOLKSWAGEN NEW JETTA",
                "VOLKSWAGEN PASSAT",
                "VOLKSWAGEN PHAETON",
                "VOLKSWAGEN R32",
                "VOLKSWAGEN RABBIT",
                "VOLKSWAGEN ROUTAN",
                "VOLKSWAGEN TAOS",
                "VOLKSWAGEN TIGUAN",
                "VOLKSWAGEN TIGUAN LIMITED",
                "VOLKSWAGEN TOUAREG",
                "VOLKSWAGEN TOUAREG 2",
                "VOLVO C30",
                "VOLVO C40",
                "VOLVO C70",
                "VOLVO EC40",
                "VOLVO EX30",
                "VOLVO EX40",
                "VOLVO EX90",
                "VOLVO S40",
                "VOLVO S60",
                "VOLVO S60 CROSS COUNTRY",
                "VOLVO S70",
                "VOLVO S80",
                "VOLVO S90",
                "VOLVO V40",
                "VOLVO V50",
                "VOLVO V60",
                "VOLVO V60 CROSS COUNTRY",
                "VOLVO V70",
                "VOLVO V90",
                "VOLVO V90 CROSS COUNTRY",
                "VOLVO XC40",
                "VOLVO XC60",
                "VOLVO XC70",
                "VOLVO XC90",
            ];

            const makesModelsMap = {};
            vehicles.forEach(vehicle => {
                const [make, ...modelParts] = vehicle.split(" ");
                const model = modelParts.join(" ");
                if (!makesModelsMap[make]) makesModelsMap[make] = [];
                if (!makesModelsMap[make].includes(model)) {
                    makesModelsMap[make].push(model);
                }
            });

            makeSelect.innerHTML = `<option value="">Select Make</option>`;
            Object.keys(makesModelsMap).forEach(make => {
                const opt = document.createElement("option");
                opt.value = make;
                opt.textContent = make;
                makeSelect.appendChild(opt);
            });

            makeSelect.addEventListener("change", () => {
                const selectedMake = makeSelect.value;
                modelSelect.innerHTML = `<option value="">Select Model</option>`;
                if (makesModelsMap[selectedMake]) {
                    makesModelsMap[selectedMake].forEach(model => {
                        const opt = document.createElement("option");
                        opt.value = model;
                        opt.textContent = model;
                        modelSelect.appendChild(opt);
                    });
                }
            });

            document.getElementById("to-step2").addEventListener("click", function (e) {
                e.preventDefault();
                const year = yearSelect.value;
                const make = makeSelect.value;
                const model = modelSelect.value;

                if (!year || !make || !model) {
                    alert("Please fill out year, make & model.");
                    return;
                }

                window.carData = window.carData || {};
                window.carData.year = year;
                window.carData.make = make;
                window.carData.model = model;

                document.getElementById("quiz-step1").classList.add("d-none");
                document.getElementById("quiz-step2").classList.remove("d-none");
            });

            document.getElementById("to-step3").addEventListener("click", function (e) {
                e.preventDefault();
                const selectedMileage = document.querySelector('.mile-opt1.selected');

                if (!selectedMileage) {
                    alert("Please select your vehicle's mileage range.");
                    return;
                }

                window.carData = window.carData || {};
                window.carData.mileage = selectedMileage.dataset.value;
                document.getElementById('input-mileage').value = selectedMileage.dataset.value;

                document.getElementById("quiz-step2").classList.add("d-none");
                document.getElementById("quiz-step3").classList.remove("d-none");
            });

            document.getElementById("to-step4").addEventListener("click", function (e) {
                e.preventDefault();
                const selectedWarranty = document.querySelector('.warranty-urgency-opt1.selected');

                if (!selectedWarranty) {
                    alert("Please select your warranty preference.");
                    return;
                }

                window.carData = window.carData || {};
                window.carData.warranty = selectedWarranty.dataset.value;
                document.getElementById('warranty').value = selectedWarranty.dataset.value;

                document.getElementById("quiz-step3").classList.add("d-none");
                document.getElementById("quiz-step4").classList.remove("d-none");
            });

            document.getElementById("to-step5").addEventListener("click", function (e) {
                e.preventDefault();
                const state = document.getElementById("user-state").value.trim();

                if (!state) {
                    alert("Please enter your state.");
                    return;
                }

                window.carData = window.carData || {};
                window.carData.state = state;

                document.getElementById("quiz-step4").classList.add("d-none");
                document.getElementById("quiz-loading").classList.remove("d-none");

                setTimeout(() => {
                    document.getElementById("quiz-loading").classList.add("d-none");
                    document.getElementById("quiz-step5").classList.remove("d-none");
                }, 2700);
            });

            document.getElementById("to-step6").addEventListener("click", function (e) {
                e.preventDefault();
                const zip = document.getElementById("user-zip").value.trim();

                if (!/^\d{5}$/.test(zip)) {
                    alert("Please enter a valid 5-digit ZIP code.");
                    return;
                }

                window.carData = window.carData || {};
                window.carData.zip = zip;

                document.getElementById("quiz-step5").classList.add("d-none");
                document.getElementById("quiz-step6").classList.remove("d-none");
            });

            document.getElementById("to-step7").addEventListener("click", function (e) {
                e.preventDefault();
                const email = document.getElementById("user-email").value.trim();

                if (!email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                    alert("Please enter a valid email address.");
                    return;
                }

                window.carData = window.carData || {};
                window.carData.email = email;

                document.getElementById("quiz-step6").classList.add("d-none");
                document.getElementById("quiz-step7").classList.remove("d-none");
            });

            document.getElementById("to-step8").addEventListener("click", function (e) {
                e.preventDefault();
                const name = document.getElementById("user-name").value.trim();

                if (!name || !/^[a-zA-Z]+(?: [a-zA-Z]+)+$/.test(name)) {
                    alert("Please enter your full name (first and last name).");
                    return;
                }

                window.carData = window.carData || {};
                window.carData.name = name;

                document.getElementById("quiz-step7").classList.add("d-none");
                document.getElementById("quiz-step8").classList.remove("d-none");
            });

            const mileOptions = document.querySelectorAll('.mile-opt1');
            mileOptions.forEach(button => {
                button.addEventListener('click', () => {
                    mileOptions.forEach(btn => btn.classList.remove('selected'));
                    button.classList.add('selected');
                });
            });

            const warrantyOptions = document.querySelectorAll('.warranty-urgency-opt1');
            warrantyOptions.forEach(button => {
                button.addEventListener('click', () => {
                    warrantyOptions.forEach(btn => btn.classList.remove('selected'));
                    button.classList.add('selected');
                });
            });

            const finalButton = document.getElementById("to-card") || document.getElementById("to-final");
            if (finalButton) {
                finalButton.addEventListener("click", function (e) {
                    e.preventDefault();
                    const phone = document.getElementById("user-number").value.trim();

                    if (!phone || !/^\d{10}$/.test(phone.replace(/\D/g, ''))) {
                        alert("Please enter a valid 10-digit phone number.");
                        return;
                    }

                    window.carData = window.carData || {};
                    window.carData.phone = phone;

                    submitFormData();
                });
            }
        });
    </script>

    <!-- quiz modal end -->

    <section id="card-section">
        <div class="container">
            <h4 class="mt-5 mb-3" style="font-weight: 700;">Our providers</h4>

            <div class="mb-4">
                <!-- endurance card -->
                <div class="service-card">
                    <div class="top-rated-ribbon">TOP RATED</div>
                    <div class="card-header">
                        <div class="logo-section">
                            <div class="logo">
                                <a href="https://www.endurancewarranty.com/" target="_blank" rel="noopener noreferrer">
                                    <img src="/img/1.png" alt="">
                                </a>
                            </div>
                            <div class="promo-badge">
                                $300 off any new plan!
                            </div>
                            <div class="rating-section">
                                <div class="rating-score">9.9</div>
                                <div class="stars">★★★★★</div>
                            </div>
                            <div class="cta-section">
                                <a href="https://endurancewarranty.com/lp/czcw" class="get-quote-btn" target="_blank"
                                    rel="noopener noreferrer">Get a Quote</a>
                                <a href="tel:8005980082">
                                    <button class="phone-btn">800-598-0082</button>
                                </a>
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
                    <!-- <button class="learn-more-btn">Learn More</button> -->
                </div>


                <div class="mt-5 divider-line"></div>
                <h4 class="mt-5 mb-3" style="font-weight: 700;">Looking for a quick solution? Skip the wait and buy your
                    auto
                    warranty directly online in minutes.</h4>

                <div class="mb-4">
                    <!-- chaiz card -->
                    <div class="service-card">
                        <div class="top-rated-ribbon">BUY NOW</div>
                        <div class="card-header">
                            <div class="logo-section">
                                <div class="logo">
                                    <a href="https://www.chaiz.com/"
                                        target="_blank" rel="noopener noreferrer">
                                        <img src="/img/chaiz.png" alt="">
                                    </a>
                                </div>
                                <div class="chaiz-promo-badge">
                                    Buy directly online — No Email or Phone needed
                                </div>
                                <div class="rating-section">
                                    <div class="rating-score">9.9</div>
                                    <div class="stars">★★★★★</div>
                                </div>
                                <div class="cta-section">
                                    <a href="https://www.chaiz.com/?fpr=cworg&utm_source=sem&utm_medium=cps&utm_campaign=cworg&utm_content=article"
                                        class="get-quote-btn" target="_blank" rel="noopener noreferrer">Buy Now</a>
                                    <a href="tel:8339429249">
                                        <button class="phone-btn">833-942-9249</button>
                                    </a>
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
                        <!-- <button class="learn-more-btn">Learn More</button> -->
                    </div>
                </div>

                <!-- american dream card -->
                <div class="service-card">
                    <div class="card-header">
                        <div class="logo-section">
                            <div class="logo">
                                <a href="https://americandreamautoprotect.com/" target="_blank"
                                    rel="noopener noreferrer">
                                    <img src="/img/american-dream.png" alt="">
                                </a>
                            </div>
                            <div class="promo-badge">
                                $350 off + 3 months free!
                            </div>
                            <div class="rating-section">
                                <div class="rating-score">8.4</div>
                                <div class="stars">★★★★☆</div>
                            </div>
                            <div class="cta-section">
                                <a href="https://www.americandreamautoprotect.com/u7izFNKM9E" class="get-quote-btn"
                                    target="_blank" rel="noopener noreferrer">Get a Quote</a>
                                <a href="tel:8333640947">
                                    <button class="phone-btn">833-364-0947</button>
                                </a>
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
                    <!-- <button class="learn-more-btn">Learn More</button> -->
                </div>

                <!-- omega card -->
                <div class="service-card">
                    <div class="card-header">
                        <div class="logo-section">
                            <div class="logo">
                                <a href="https://omegaautocare.com/"
                                    target="_blank" rel="noopener noreferrer">
                                    <img src="/img/omega.png" alt="">
                                </a>
                            </div>
                            <div class="promo-badge">

                            </div>
                            <div class="rating-section">
                                <div class="rating-score">8.2</div>
                                <div class="stars">★★★★☆</div>
                            </div>
                            <div class="cta-section">
                                <a href="https://www.chaiz.com/p/omega?fpr=cworg&utm_source=sem&utm_medium=cps&utm_campaign=cworg&utm_content=article"
                                    class="get-quote-btn" target="_blank" rel="noopener noreferrer">Get a Quote</a>
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
                    <!-- <button class="learn-more-btn">Learn More</button> -->
                </div>

                <!-- naac card -->
                <div class="service-card">
                    <div class="card-header">
                        <div class="logo-section">
                            <div class="logo">
                                <a href="https://www.northamericanautocare.co/"
                                    target="_blank" rel="noopener noreferrer">
                                    <img src="/img/naac.png" alt="">
                                </a>
                            </div>
                            <div class="promo-badge">

                            </div>
                            <div class="rating-section">
                                <div class="rating-score">8.1</div>
                                <div class="stars">★★★★☆</div>
                            </div>
                            <div class="cta-section">
                                <a href="https://www.chaiz.com/p/naac?fpr=cworg&utm_source=sem&utm_medium=cps&utm_campaign=cworg&utm_content=article"
                                    class="get-quote-btn" target="_blank" rel="noopener noreferrer">Get a Quote</a>
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
                    <!-- <button class="learn-more-btn">Learn More</button> -->
                </div>
            </div>
        </div>
    </section>


    <section id="get-matched" style="padding: 40px 0;">
        <div class="container">
            <h1 class="match-title">How we connect you with the right provider</h1>

            <div class="match-steps-container">
                <div class="match-step">
                    <div class="match-step-icon">
                        <img src="/img/1icon.png" alt="">
                    </div>
                    <h3 class="match-step-title">Your vehicle details</h3>
                    <p class="match-step-description">Provide information about your vehicle and the coverage you require.
                    </p>
                </div>

                <div class="match-step">
                    <div class="match-step-icon">
                        <img src="/img/2icon.png" alt="">
                    </div>
                    <h3 class="match-step-title">Extensive provider network</h3>
                    <p class="match-step-description">We carefully review offers from leading warranty providers to identify
                        the best options for you.</p>
                </div>

                <div class="match-step">
                    <div class="match-step-icon">
                        <img src="/img/3icon.png" alt="">
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
                <img src="/img/4icon.png" alt="">
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

    {{-- <section class="advertising-disclosure container my-5">
        <div class="advertising-card border-light shadow-sm">
            <div class="advertising-card-body p-4">
                <h2 class="advertising-card-title h4 mb-3">Site Disclaimer and Privacy Notice</h2>
                <div class="advertising-card-text">
                    <p>comparewarranties.org is operated by Chaiz, Inc. and serves as a free resource to help you find
                        Vehicle Service Contract providers ("Products").</p>
                    <p>Unlike our main site at chaiz.com, we may receive advertising fees from some of the companies
                        featured here. These fees can influence the placement and order of Products shown. We also include
                        Products for which we do not receive compensation. This site does not include every Product
                        available on the market.
                    </p>

                    <div class="more-content d-none">
                        <p>When you click on links to Product providers, you consent to share your contact details (name,
                            address, email, and phone number) securely with those providers. This allows them to connect
                            with you about their services. In some cases, we receive a small referral fee for making this
                            introduction.</p>
                        <p>comparewarranties.org is an advertising platform only and does not sell or offer the Products
                            listed. We do not control the Products or services offered by these providers. If you prefer,
                            you may purchase Product coverage directly through our main site, chaiz.com.</p>
                        <p>Your use of this site is subject to the Terms of Use and Privacy Policy of Chaiz, Inc. as
                            outlined below.</p>
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
    </script> --}}
@endsection