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