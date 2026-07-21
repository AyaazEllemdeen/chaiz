@php $home = url('/'); @endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, follow">
    <meta http-equiv="refresh" content="5;url={{ $home }}">
    <title>Page not found &middot; Compare Warranties</title>

    <style>
        * {
            box-sizing: border-box;
        }

        html,
        body {
            margin: 0;
            height: 100%;
            width: 100%;
            overflow-x: hidden;
        }

        body {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI",
                Roboto, Helvetica, Arial, sans-serif;
            background-color: #f6f8f7;
            color: #0d0d0d;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1.25rem;
        }

        /* soft green wash so a light bg still feels on-brand */
        body::before {
            content: "";
            position: fixed;
            inset: 0;
            background:
                radial-gradient(60% 55% at 82% 12%, rgba(29, 209, 161, 0.14), transparent 70%),
                radial-gradient(50% 50% at 8% 92%, rgba(29, 209, 161, 0.10), transparent 70%);
            pointer-events: none;
            z-index: 0;
        }

        .error-card {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 620px;
            text-align: center;
            background: #ffffff;
            border-radius: 16px;
            border-top: 6px solid #1dd1a1;
            box-shadow: 0 18px 50px rgba(0, 0, 0, 0.10);
            padding: 3rem 2.5rem 2.75rem;
        }

        .error-logo {
            height: 46px;
            width: auto;
            margin-bottom: 2rem;
        }

        .error-code {
            font-size: 6.5rem;
            font-weight: 800;
            line-height: 1;
            letter-spacing: -2px;
            margin: 0;
            color: #000000;
        }

        /* recolour the middle zero green for a bit of brand pop */
        .error-code span {
            color: #1dd1a1;
        }

        .error-heading {
            font-size: 1.6rem;
            font-weight: 700;
            margin: 1.25rem 0 0.5rem;
            color: #0d0d0d;
        }

        .error-text {
            font-size: 1.05rem;
            line-height: 1.6;
            color: #555b58;
            margin: 0 auto 2rem;
            max-width: 440px;
        }

        .error-btn {
            display: inline-block;
            background-color: #1dd1a1;
            border: none;
            border-radius: 8px;
            color: #000000;
            padding: 15px 28px;
            font-size: 1rem;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .error-btn:hover {
            background-color: #18b889;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(29, 209, 161, 0.3);
        }

        .error-countdown {
            font-size: 0.9rem;
            color: #8a908d;
            margin: 1.5rem 0 0;
        }

        .error-countdown span {
            color: #1dd1a1;
            font-weight: 700;
        }

        @media (max-width: 520px) {
            .error-card {
                padding: 2.25rem 1.5rem;
            }

            .error-code {
                font-size: 5rem;
            }

            .error-heading {
                font-size: 1.35rem;
            }

            .error-text {
                font-size: 1rem;
            }
        }
    </style>
</head>

<body>
    <main class="error-card">
        <img src="{{ asset('img/logo/logo.png') }}" alt="Compare Warranties" class="error-logo">

        <p class="error-code">4<span>0</span>4</p>

        <h1 class="error-heading">This page took a wrong turn</h1>

        <p class="error-text">
            The page you're looking for doesn't exist, has moved, or the link may be broken. Let's get you back on the
            road.
        </p>

        <a href="{{ $home }}" class="error-btn">Back to home</a>

        <p class="error-countdown">
            Redirecting you home in <span id="count">5</span> seconds&hellip;
        </p>
    </main>

    <script>
        (function() {
            var home = @json($home);
            var seconds = 5;
            var el = document.getElementById('count');

            var timer = setInterval(function() {
                seconds -= 1;
                if (el) el.textContent = seconds;
                if (seconds <= 0) {
                    clearInterval(timer);
                    window.location.href = home;
                }
            }, 1000);
        })();
    </script>
</body>

</html>
