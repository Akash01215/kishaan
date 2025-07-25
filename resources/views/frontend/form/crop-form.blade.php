<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crop Recommendation Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2ECC71; /* Vibrant Green */
            --primary-dark: #27AE60;
            --accent-color: #3498DB; /* Blue for contrast/focus */
            --text-dark: #2C3E50; /* Darker text for readability - for elements inside transparent form */
            --text-light: #7F8C8D;
            --transparent-form-bg: rgba(255, 255, 255, 0.2); /* Semi-transparent white for form background */
            --transparent-input-bg: rgba(255, 255, 255, 0.7); /* More opaque white for input fields */
            --border-color-transparent: rgba(255, 255, 255, 0.4); /* Transparent border for inputs */
            --input-focus-border: rgba(52, 152, 219, 0.8); /* Stronger blue for focus */
            --shadow-light: rgba(0, 0, 0, 0.1);
            --shadow-medium: rgba(0, 0, 0, 0.2);
        }

        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 15px;
            color: var(--text-dark); /* Default text color for the page, but form elements will override */
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            box-sizing: border-box;

            /* Full page background image */
            background-image: url("{{ asset('frontend/img/maize1.webp') }}");
            background-size: cover;
            background-position: center;
            background-attachment: fixed; /* Keep image fixed during scroll */
            position: relative; /* Needed for the background overlay */
        }

        /* Darker overlay on the background image for better text contrast */
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.3); /* Slightly dark overlay to make form stand out */
            z-index: -1; /* Place it behind the form */
        }

        .container {
            width: 100%;
            max-width: 580px;
            /* Transparent background for the main form container */
            background-color: var(--transparent-form-bg);
            backdrop-filter: blur(5px); /* Frosted glass effect for modern feel */
            -webkit-backdrop-filter: blur(5px); /* Safari support */
            border-radius: 12px;
            box-shadow: 0 10px 25px var(--shadow-medium); /* Still want a subtle shadow */
            overflow: hidden;
            animation: fadeInScale 0.8s ease-out forwards;
            padding: 0; /* No padding on the container itself, controlled by form-body */
        }

        @keyframes fadeInScale {
            from { opacity: 0; transform: translateY(20px) scale(0.98); }
            to { opacity: 1; transform: translateY(0) scale(1); }
        }

        .form-header {
            /* Header remains solid for strong visual identity */
            background-image: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            color: white;
            padding: 28px 25px;
            text-align: center;
            font-size: 1.8em;
            font-weight: 700;
            border-bottom: 4px solid rgba(0,0,0,0.1);
            position: relative;
            letter-spacing: 0.4px;
        }

        .form-header::before {
            content: '🌾';
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 1.2em;
            opacity: 0.9;
        }

        .form-header::after {
            content: '🌱';
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 1.2em;
            opacity: 0.9;
        }

        .form-body {
            padding: 25px; /* Padding for the content inside the transparent form */
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            font-weight: 500; /* Slightly bolder for readability on transparent background */
            color: white; /* Labels will be white to contrast with dark background image */
            text-shadow: 0 1px 2px rgba(0,0,0,0.4); /* Subtle shadow for better legibility */
            font-size: 0.9em; /* Slightly larger labels for clarity */
        }

        input[type="number"] {
            width: 100%;
            padding: 10px 12px;
            background-color: var(--transparent-input-bg); /* Semi-transparent input background */
            border: 1px solid var(--border-color-transparent); /* Transparent border */
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 1em;
            color: var(--text-dark); /* Input text color remains dark */
            transition: background-color 0.3s ease, border-color 0.3s ease, box-shadow 0.3s ease;
            -moz-appearance: textfield;
        }

        input[type="number"]::-webkit-outer-spin-button,
        input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type="number"]:focus {
            background-color: rgba(255, 255, 255, 0.9); /* Slightly more opaque on focus */
            border-color: var(--input-focus-border); /* Stronger blue border */
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.3); /* Clearer focus glow */
            outline: none;
        }

        .btn-submit {
            display: block;
            width: 100%;
            padding: 14px;
            background-image: linear-gradient(to right, var(--primary-color), var(--primary-dark));
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1.1em;
            font-weight: 700;
            letter-spacing: 0.4px;
            transition: transform 0.2s ease, box-shadow 0.2s ease, background-image 0.3s ease;
            box-shadow: 0 5px 12px rgba(46, 204, 113, 0.25);
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 7px 18px rgba(46, 204, 113, 0.35);
            background-image: linear-gradient(to right, var(--primary-dark), var(--primary-color));
        }

        .btn-submit:active {
            transform: translateY(0);
            box-shadow: 0 3px 8px rgba(46, 204, 113, 0.15);
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .container {
                max-width: 95%;
            }
            .form-header {
                font-size: 1.6em;
                padding: 25px 20px;
            }
            .form-header::before, .form-header::after {
                font-size: 1.4em;
            }
            .form-body {
                padding: 20px;
            }
        }

        @media (max-width: 480px) {
            body {
                padding: 10px;
            }
            .container {
                border-radius: 8px;
            }
            .form-header {
                font-size: 1.3em;
                padding: 20px 10px;
            }
            .form-header::before, .form-header::after {
                font-size: 1.1em;
                left: 8px;
                right: 8px;
            }
            .form-body {
                padding: 15px;
            }
            .form-group {
                margin-bottom: 12px;
            }
            label {
                font-size: 0.85em;
            }
            input[type="number"] {
                font-size: 0.9em;
                padding: 8px 10px;
            }
            .btn-submit {
                font-size: 1em;
                padding: 12px;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="form-header">
            Optimal Crop Finder
        </div>
        <div class="form-body">
            <form action="{{ route('crop.recommend') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="N">Nitrogen (N) Content (ppm):</label>
                    <input type="number" name="N" id="N" placeholder="e.g., 90" required min="0" step="any">
                </div>
                <div class="form-group">
                    <label for="P">Phosphorus (P) Content (ppm):</label>
                    <input type="number" name="P" id="P" placeholder="e.g., 42" required min="0" step="any">
                </div>
                <div class="form-group">
                    <label for="K">Potassium (K) Content (ppm):</label>
                    <input type="number" name="K" id="K" placeholder="e.g., 43" required min="0" step="any">
                </div>
                <div class="form-group">
                    <label for="temperature">Temperature (°C):</label>
                    <input type="number" step="0.1" name="temperature" id="temperature" placeholder="e.g., 25.5" required>
                </div>
                <div class="form-group">
                    <label for="humidity">Humidity (%):</label>
                    <input type="number" step="0.1" name="humidity" id="humidity" placeholder="e.g., 75.2" required min="0" max="100">
                </div>
                <div class="form-group">
                    <label for="ph">Soil pH:</label>
                    <input type="number" step="0.1" name="ph" id="ph" placeholder="e.g., 6.5" required min="0" max="14">
                </div>
                <div class="form-group">
                    <label for="rainfall">Rainfall (mm):</label>
                    <input type="number" step="0.1" name="rainfall" id="rainfall" placeholder="e.g., 200.3" required min="0">
                </div>
                <button type="submit" class="btn-submit">Find Best Crop</button>
            </form>
        </div>
    </div>

</body>
</html>