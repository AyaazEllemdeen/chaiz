@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <!-- Hero Banner Section -->
    <section class="position-relative" style="height: 80vh;">
        <img src="{{ asset('img/banner3.jpg') }}" alt="Banner" class="object-fit-cover banner-img">

        <div class="banner-text-container">
            <h1 class="fw-bold text-shadow text-start banner-texts">
                Best Extended Car Warranty<br>Companies of 2025
            </h1>
        </div>
    </section>

    <!-- Quiz Card Overlapping the Banner -->
    <div class="quiz-modal-content-box">
        <div id="car-quiz" class="p-0 mb-0">
            <div class="mb-3 text-start">
                <h2 class="quiz-heading">Compare Alternatives</h2>
                <p class="quiz-subtext">
                    Take our short quiz to find an Auto Warranty suited to you.
                </p>
            </div>

            <div class="quiz-content-box">
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
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" fill="none" viewBox="0 0 25 24">
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
    @if(session('success'))
        <script>
            alert("{{ session('success') }}");
        </script>
    @endif

    @if(session('error'))
        <script>
            alert("{{ session('error') }}");
        </script>
    @endif

    <div id="quiz-modal-wrapper">
        <!-- LEFT: Quiz -->
        <form id="quiz-form" method="POST" action="{{ route('lead.submit') }}">
            @csrf
            <div id="quiz-modal-left">
                <div id="quiz-modal" class="form-content1" role="dialog" aria-modal="true" aria-labelledby="quiz-title"
                    aria-describedby="quiz-desc">
                    <button id="close-modal" class="close-btn1" aria-label="Close quiz modal">&times;</button>

                    <div id="step1" class="modal-step1 active">
                        <h3 class="modal-question1" id="quiz-title">What is the year, make & model of your vehicle?</h3>
                        <select id="sel_year" name="sel-year" class="modal-dropdown1" aria-describedby="quiz-desc">
                            <option value="">Select Year</option>
                        </select>
                        <select id="sel_make" name="sel-make" class="modal-dropdown1">
                            <option value="">Select Make</option>
                        </select>
                        <select id="sel_model" name="sel-model" class="modal-dropdown1">
                            <option value="">Select Model</option>
                        </select>
                        <button id="to-step2" class="to-step-btn1">Continue</button>
                    </div>

                    <div id="step2" class="modal-step1">
                        <h3 class="modal-question1">Roughly, how many miles are on the vehicle?</h3>
                        <div class="options-grid1">
                            <button type="button" class="mile-opt1" data-value="<100000">Less than 100k</button>
                            <button type="button" class="mile-opt1" data-value="130000">100-140k</button>
                            <button type="button" class="mile-opt1" data-value="180000">140-200k</button>
                            <button type="button" class="mile-opt1" data-value=">200000">More than 200k</button>
                        </div>
                        <button id="to-step3" class="to-step-btn1">Continue</button>
                    </div>
                    <input type="hidden" name="car_mileage" id="input-mileage" value="">

                    <div id="step3" class="modal-step1">
                        <h3 class="modal-question1">How soon do you want your new auto warranty?</h3>
                        <div class="options-grid1">
                            <button type="button" class="warranty-urgency-opt1" data-value="As soon as possible">As soon as
                                possible</button>
                            <button type="button" class="warranty-urgency-opt1" data-value="1-2 weeks">1-2 weeks</button>
                            <button type="button" class="warranty-urgency-opt1" data-value="3-4 weeks">3-4 weeks</button>
                            <button type="button" class="warranty-urgency-opt1" data-value="4+ weeks">4+ weeks</button>
                            <button type="button" class="warranty-urgency-opt1" data-value="Unsure">Unsure</button>
                        </div>
                        <button id="to-step4" class="to-step-btn1">Continue</button>
                    </div>
                    <input type="hidden" name="warranty" id="warrenty" value="">

                    <div id="step4" class="modal-step1">
                        <h3 class="modal-question1">What state do you live in?</h3>
                        <input type="text" id="user-state" name="user-state" class="modal-dropdown1"
                            placeholder="Enter your state" required />
                        <button id="to-step5" class="to-step-btn1">Continue</button>
                    </div>

                    <div id="step5Loading" class="modal-step1">
                        <h3 class="modal-question1">Gathering information...</h3>
                        <div class="loader1"></div>
                    </div>

                    <div id="step5" class="modal-step1">
                        <h3 class="modal-question1">What's your ZIP code?</h3>
                        <input type="text" name="user-zip" id="user-zip" class="modal-dropdown1"
                            placeholder="Enter your ZIP code" maxlength="5" pattern="\d{5}" inputmode="numeric" required />
                        <button id="to-step6" class="to-step-btn1">Continue</button>
                    </div>

                    <div id="step6" class="modal-step1">
                        <h3 class="modal-question1">What's your Email Address?</h3>
                        <input type="email" name="email" id="user-email" class="modal-dropdown1"
                            placeholder="Enter your Email" required />
                        <button id="to-step7" class="to-step-btn1">Continue</button>
                    </div>

                    <div id="step7" class="modal-step1">
                        <h3 class="modal-question1">What's your Full Name?</h3>
                        <input type="text" name="user-name" id="user-name" class="modal-dropdown1"
                            placeholder="Enter your name" required />
                        <button id="to-step8" class="to-step-btn1">Continue</button>
                    </div>

                    <div id="step8" class="modal-step1">
                        <h3 class="modal-question1">What's your Phone Number?</h3>
                        <input type="text" name="user-number" id="user-number" name="number" class="modal-dropdown1"
                            placeholder="Enter your number" required />
                        <button type="submit" id="submit-quiz" class="to-step-btn1">Submit</button>
                    </div>
                </div>
            </div>
        </form>

        <!-- RIGHT: Logo + Info -->
        <div id="quiz-modal-right">
            <img src="{{ asset('img/logo.png') }}" alt="Company Logo" />
            <h2>Best Extended Auto Warranty in May 2025</h2>
            <p>Continue our short quiz to get matched to an auto warranty provider suited to you.</p>
        </div>
    </div>
    @if(session('chaiz_search_data'))
        <div id="response-modal" class="response-modal-overlay">
            <div class="response-modal-wrapper">
                <button id="response-modal-close" class="response-modal-close" aria-label="Close">
                    ×
                </button>
                <div id="chaiz-search-results" class="response-search-results"></div>
            </div>
        </div>

        <script>
            window.chaizWarrantySearchConfig = {
                targetElementId: "chaiz-search-results",
                searchData: @json(session('chaiz_search_data'))
            };
        </script>
        <script src="https://uat.warranty-search.chaiz.com/initialize.js"></script>

        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const modal = document.getElementById('response-modal');
                const closeBtn = document.getElementById('response-modal-close');
                if (modal) {
                    modal.style.display = 'flex';
                    closeBtn.addEventListener('click', () => {
                        modal.style.display = 'none';
                    });
                }
            });
        </script>
    @endif

    <script>
        document.querySelectorAll('.mile-opt1').forEach(button => {
            button.addEventListener('click', () => {
                document.getElementById('input-mileage').value = button.dataset.value;
            });
        });
        document.querySelectorAll('.warranty-urgency-opt1').forEach(button => {
            button.addEventListener('click', () => {
                document.getElementById('warrenty').value = button.dataset.value;
            });
        });

    </script>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const vehicleButtons = document.querySelectorAll(".vehicle-option");
            const modalWrapper = document.getElementById("quiz-modal-wrapper");
            const modal = document.getElementById("quiz-modal-wrapper");
            const carMakeInput = document.getElementById("car-make");
            const closeBtn = document.getElementById("close-modal");

            vehicleButtons.forEach((btn) => {
                btn.addEventListener("click", () => {
                    const selectedVehicle = btn.getAttribute("data-value") || "";
                    if (carMakeInput) {
                        carMakeInput.value = selectedVehicle;
                    }

                    sessionStorage.setItem("car_type", selectedVehicle);

                    if (modalWrapper) {
                        modalWrapper.style.display = "flex";
                    }
                });
            });


            if (closeBtn && modalWrapper) {
                closeBtn.addEventListener("click", () => {
                    modalWrapper.style.display = "none";
                });
            }
            const yearSelect = document.getElementById("sel_year");
            const makeSelect = document.getElementById("sel_make");
            const modelSelect = document.getElementById("sel_model");

            // Populate years dropdown (current year to 2005)
            const currentYear = new Date().getFullYear();
            for (let y = currentYear; y >= 2005; y--) {
                const opt = document.createElement("option");
                opt.value = y;
                opt.textContent = y;
                yearSelect.appendChild(opt);
            }

            // Example vehicle data (make and models)
            const vehicles = [
                "ACURA 2.3CL",
                "VOLVO XC90"
            ];

            // Build make → models map
            const makesModelsMap = {};
            vehicles.forEach(vehicle => {
                const [make, ...modelParts] = vehicle.split(" ");
                const model = modelParts.join(" ");
                if (!makesModelsMap[make]) makesModelsMap[make] = [];
                if (!makesModelsMap[make].includes(model)) {
                    makesModelsMap[make].push(model);
                }
            });

            // Populate make dropdown
            makeSelect.innerHTML = `<option value="">Select Make</option>`;
            Object.keys(makesModelsMap).forEach(make => {
                const opt = document.createElement("option");
                opt.value = make;
                opt.textContent = make;
                makeSelect.appendChild(opt);
            });

            // When make changes, populate model dropdown
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

            // Steps elements
            const step1 = document.getElementById("step1");
            const step2 = document.getElementById("step2");
            const step3 = document.getElementById("step3");
            const step4 = document.getElementById("step4");
            const step5Loading = document.getElementById("step5Loading");
            const step5 = document.getElementById("step5");
            const step6 = document.getElementById("step6");
            const step7 = document.getElementById("step7");
            const step8 = document.getElementById("step8");

            // Buttons
            const btnTo2 = document.getElementById("to-step2");
            const btnTo3 = document.getElementById("to-step3");
            const btnTo4 = document.getElementById("to-step4");
            const btnTo5 = document.getElementById("to-step5");
            const btnTo6 = document.getElementById("to-step6");
            const btnTo7 = document.getElementById("to-step7");
            const btnTo8 = document.getElementById("to-step8");

            // Mileage and warranty hidden inputs
            const inputMileage = document.getElementById("input-mileage");
            const inputWarranty = document.getElementById("warrenty");

            // Handle Step 1 → Step 2
            btnTo2.addEventListener("click", e => {
                e.preventDefault();
                const year = yearSelect.value;
                const make = makeSelect.value;
                const model = modelSelect.value;
                if (!year || !make || !model) {
                    alert("Please fill out year, make & model.");
                    return;
                }
                sessionStorage.setItem("car_year", year);
                sessionStorage.setItem("car_make", make);
                sessionStorage.setItem("car_model", model);

                step1.style.display = "none";
                step2.style.display = "block";
            });

            // Helper function to handle choice steps (Step2 & Step3)
            function setupChoiceStep(stepElement, btnClass, continueBtn, storageKey, nextStep) {
                const buttons = stepElement.querySelectorAll(`.${btnClass}`);
                buttons.forEach(btn => {
                    btn.addEventListener("click", () => {
                        buttons.forEach(b => b.classList.remove("selected"));
                        btn.classList.add("selected");
                    });
                });

                continueBtn.addEventListener("click", e => {
                    e.preventDefault();
                    const selected = stepElement.querySelector(`.${btnClass}.selected`);
                    if (!selected) {
                        alert("Please make a selection.");
                        return;
                    }
                    sessionStorage.setItem(storageKey, selected.dataset.value);
                    // Also update hidden inputs if applicable
                    if (storageKey === "car_mileage") inputMileage.value = selected.dataset.value;
                    if (storageKey === "warranty") inputWarranty.value = selected.dataset.value;

                    stepElement.style.display = "none";
                    nextStep.style.display = "block";
                });
            }

            // Setup Step 2 mileage choices
            setupChoiceStep(step2, "mile-opt1", btnTo3, "car_mileage", step3);
            // Setup Step 3 warranty urgency choices
            setupChoiceStep(step3, "warranty-urgency-opt1", btnTo4, "warranty", step4);

            // Step 4 → Step 5 Loading (with validation)
            btnTo5.addEventListener("click", e => {
                e.preventDefault();
                const state = document.getElementById("user-state").value.trim();
                if (!state) {
                    alert("Please enter your state.");
                    return;
                }
                sessionStorage.setItem("user-state", state);

                step4.style.display = "none";
                step5Loading.style.display = "block";

                setTimeout(() => {
                    step5Loading.style.display = "none";
                    step5.style.display = "block";
                }, 2000);
            });

            // Step 5 → Step 6 ZIP code validation
            btnTo6.addEventListener("click", e => {
                e.preventDefault();
                const zip = document.getElementById("user-zip").value.trim();
                if (!/^\d{5}$/.test(zip)) {
                    alert("Please enter a valid 5-digit ZIP code.");
                    return;
                }
                sessionStorage.setItem("user-zip", zip);

                step5.style.display = "none";
                step6.style.display = "block";
            });

            // Step 6 → Step 7 Email validation
            btnTo7.addEventListener("click", e => {
                e.preventDefault();
                const email = document.getElementById("user-email").value.trim();
                if (!email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                    alert("Please enter a valid email address.");
                    return;
                }
                sessionStorage.setItem("email", email);

                step6.style.display = "none";
                step7.style.display = "block";
            });

            // Step 7 → Step 8 Full name validation (first and last)
            btnTo8.addEventListener("click", e => {
                e.preventDefault();
                const name = document.getElementById("user-name").value.trim();
                if (!name || !/^[a-zA-Z]+(?: [a-zA-Z]+)+$/.test(name)) {
                    alert("Please enter your full name (first and last name).");
                    return;
                }
                sessionStorage.setItem("user-name", name);

                step7.style.display = "none";
                step8.style.display = "block";
            });

        });
    </script>

    <div class="container">
        <!-- Endurance Section -->
        <section class="endurance-section">
            <div class="endurance-wrapper">
                <!-- Logo in Card -->
                <div class="endurance-logo-card">
                    <img src="{{ asset('img/1.png') }}" alt="Endurance Logo">
                </div>

                <!-- Text + Buttons -->
                <div class="endurance-content">
                    <p class="description">
                        <strong>Endurance offers flexibility to choose your certified mechanic, and a 30-day money-back
                            guarantee for peace of mind.</strong>
                        Also, get a free Year of Elite Benefits featuring 24/7 Roadside Assistance, Complete Tire Coverage,
                        Key Replacement, and more!
                    </p>
                    <ul class="features">
                        <li>Covers cars up to 20 years old/200K miles</li>
                        <li>1 year of FREE Elite Benefits</li>
                        <li>Flexible down payment to fit your budget</li>
                        <li>6 coverage plans to choose from</li>
                        <li>No obligation fast quote</li>
                        <li>30-day money back guarantee</li>
                        <li>Quick and easy claims process</li>
                    </ul>

                    <div class="bottom-row">
                        <div class="rating">
                            <span class="score">9.9</span>
                            <p class="label">Best Overall</p>
                        </div>
                        <div class="actions">
                            <a href="#" class="btn yellow">Get A Quote</a>
                            <a href="#" class="btn black">Visit Website</a>
                            <a href="#" class="btn border">Call Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection