<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crop Recommendation Result</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2ECC71; /* Vibrant Green */
            --primary-dark: #27AE60;
            --accent-color: #3498DB; /* Blue for contrast/focus */
            --text-dark: #2C3E50; /* Darker text for readability */
            --text-light: #7F8C8D;
            --bg-overlay: rgba(236, 240, 241, 0.85); /* Light grey overlay for background image */
            --card-bg: #FFFFFF;
            --border-color: #BDC3C7;
            --shadow-light: rgba(0, 0, 0, 0.1);
            --shadow-medium: rgba(0, 0, 0, 0.2);
        }

        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 20px;
            background-color: var(--bg-overlay); /* Fallback or initial overlay */
            color: var(--text-dark);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            box-sizing: border-box;
            background-image: url('https://source.unsplash.com/random/1920x1080/?harvest,farm,crops'); /* Dynamic harvest background */
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-blend-mode: overlay;
        }

        .result-container {
            width: 100%;
            max-width: 700px; /* Good width for results */
            background-color: var(--card-bg);
            border-radius: 15px;
            box-shadow: 0 12px 30px var(--shadow-medium);
            padding: 35px;
            text-align: center;
            animation: fadeInScale 0.8s ease-out forwards;
            position: relative; /* For the background elements */
            overflow: hidden; /* Ensure rounded corners */
        }

        @keyframes fadeInScale {
            from { opacity: 0; transform: translateY(30px) scale(0.95); }
            to { opacity: 1; transform: translateY(0) scale(1); }
        }

        /* Decorative background elements */
        .result-container::before,
        .result-container::after {
            content: '';
            position: absolute;
            width: 150px;
            height: 150px;
            border-radius: 50%;
            opacity: 0.1;
            filter: blur(50px);
            z-index: 0;
        }

        .result-container::before {
            background-color: var(--primary-color);
            top: -50px;
            left: -50px;
        }

        .result-container::after {
            background-color: var(--accent-color);
            bottom: -50px;
            right: -50px;
        }


        h2 {
            color: var(--primary-dark);
            margin-bottom: 25px;
            font-size: 2.5em; /* Larger title */
            font-weight: 700;
            position: relative;
            padding-bottom: 15px;
            z-index: 1; /* Ensure text is above pseudo-elements */
        }

        h2::after {
            content: '';
            position: absolute;
            left: 50%;
            bottom: 0;
            transform: translateX(-50%);
            width: 100px; /* Wider underline */
            height: 5px;
            background-color: var(--primary-color);
            border-radius: 3px;
        }

        .result-message {
            font-size: 1.6em; /* Larger, more impactful message */
            color: var(--text-dark);
            margin-bottom: 40px; /* More space before button */
            line-height: 1.6;
            font-weight: 500;
            z-index: 1;
            position: relative;
        }

        .btn-back {
            display: inline-block; /* Allows text to wrap naturally */
            padding: 15px 30px; /* Larger padding */
            background-image: linear-gradient(to right, var(--accent-color), #0056b3); /* Blue gradient */
            color: white;
            text-decoration: none;
            border-radius: 10px;
            font-weight: 600;
            font-size: 1.15em;
            transition: transform 0.2s ease, box-shadow 0.2s ease, background-image 0.3s ease;
            box-shadow: 0 6px 15px rgba(52, 152, 219, 0.3); /* Blue shadow */
            z-index: 1;
            position: relative;
        }

        .btn-back:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(52, 152, 219, 0.4);
            background-image: linear-gradient(to right, #0056b3, var(--accent-color)); /* Slight gradient shift */
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .result-container {
                max-width: 90%;
                padding: 25px;
            }
            h2 {
                font-size: 2em;
            }
            .result-message {
                font-size: 1.4em;
            }
            .btn-back {
                padding: 12px 25px;
                font-size: 1.1em;
            }
        }

        @media (max-width: 480px) {
            body {
                padding: 15px;
            }
            .result-container {
                border-radius: 10px;
                padding: 20px;
            }
            h2 {
                font-size: 1.8em;
            }
            h2::after {
                width: 80px;
                height: 4px;
            }
            .result-message {
                font-size: 1.2em;
                margin-bottom: 30px;
            }
            .btn-back {
                font-size: 1em;
                padding: 10px 20px;
            }
             .result-container::before,
             .result-container::after {
                width: 100px;
                height: 100px;
                filter: blur(30px);
            }
        }
    </style>
</head>
<body>

    <div class="result-container">
        <h2>Your Crop Recommendation</h2>
        <p class="result-message">{{ $result }}</p>
        <a href="{{ route('crop.form') }}" class="btn-back">Go Back to Form</a>
    </div>

</body>
</html>