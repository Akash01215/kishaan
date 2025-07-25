<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fertilizer Recommendation Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #4CAF50; /* Green for growth/agriculture */
            --primary-dark: #388E3C;
            --secondary-color: #2196F3; /* Blue for contrast/buttons */
            --text-dark: #2C3E50; /* Darker text for readability inside inputs */
            --text-light: #F8F9F9; /* Very light text for labels on dark background */
            --transparent-form-bg: rgba(255, 255, 255, 0.2); /* Semi-transparent white for form background */
            --transparent-input-bg: rgba(255, 255, 255, 0.7); /* More opaque white for input/select fields */
            --border-color-transparent: rgba(255, 255, 255, 0.4); /* Transparent border for inputs */
            --input-focus-border: rgba(33, 150, 243, 0.8); /* Stronger blue for focus */
            --shadow-light: rgba(0, 0, 0, 0.1);
            --shadow-medium: rgba(0, 0, 0, 0.2);
            --shadow-strong: rgba(0, 0, 0, 0.3);
        }

        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 15px; /* Consistent padding */
            color: var(--text-dark); /* Default text color */
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            box-sizing: border-box;

            /* Full page background image */
            background-image: url("{{ asset('frontend/img/a.jpg') }}"); /* Your specific image */
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            position: relative; /* Needed for the background overlay */
            overflow-y: auto; /* Allow scrolling if content is long */
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
            max-width: 600px;
            /* Transparent background for the main form container */
            background-color: var(--transparent-form-bg);
            backdrop-filter: blur(5px); /* Frosted glass effect */
            -webkit-backdrop-filter: blur(5px); /* Safari support */
            border-radius: 12px;
            box-shadow: 0 10px 25px var(--shadow-medium); /* Adjusted shadow */
            overflow: hidden;
            animation: fadeIn 0.8s ease-out;
            padding: 0;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .form-header {
            /* Header remains solid for strong visual identity */
            background-color: var(--primary-color);
            color: white;
            padding: 25px 30px;
            text-align: center;
            font-size: 1.8em;
            font-weight: 600;
            border-bottom: 4px solid var(--primary-dark);
            position: relative;
        }

        .form-header::before {
            content: '🌱'; /* Sprout emoji for visual appeal */
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 1.5em;
            opacity: 0.8;
        }

        .form-body {
            padding: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--text-light); /* Labels are white for contrast */
            text-shadow: 0 1px 2px rgba(0,0,0,0.4); /* Subtle shadow for better legibility */
            font-size: 0.95em;
        }

        input[type="number"],
        select {
            width: 100%;
            padding: 12px 15px;
            background-color: var(--transparent-input-bg); /* Semi-transparent input/select background */
            border: 1px solid var(--border-color-transparent); /* Transparent border */
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 1em;
            color: var(--text-dark); /* Input/select text color remains dark */
            transition: border-color 0.3s ease, box-shadow 0.3s ease, background-color 0.3s ease;
            -moz-appearance: textfield; /* For number inputs */
        }

        input[type="number"]::-webkit-outer-spin-button,
        input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type="number"]:focus,
        select:focus {
            background-color: rgba(255, 255, 255, 0.9); /* Slightly more opaque on focus */
            border-color: var(--input-focus-border); /* Stronger blue border */
            box-shadow: 0 0 0 3px rgba(33, 150, 243, 0.3); /* Blue glow on focus */
            outline: none;
        }

        /* Style for the select arrow in transparent design */
        select {
            -webkit-appearance: none; /* Remove default arrow on WebKit browsers */
            -moz-appearance: none; /* Remove default arrow on Firefox */
            appearance: none; /* Remove default arrow */
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%23666' %3E%3Cpath d='M7 10l5 5 5-5z'/%3E%3C/svg%3E"); /* Custom SVG arrow */
            background-repeat: no-repeat;
            background-position: right 10px center;
            background-size: 20px;
            padding-right: 30px; /* Make space for the custom arrow */
        }

        .btn-submit {
            display: block;
            width: 100%;
            padding: 15px;
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1.15em;
            font-weight: 600;
            transition: background-color 0.3s ease, transform 0.2s ease, box-shadow 0.2s ease;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .btn-submit:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 6px 15px var(--shadow-strong);
        }

        /* Responsive adjustments */
        @media (max-width: 600px) {
            body {
                padding: 10px;
            }
            .container {
                margin: 0; /* Remove margin for full width on small screens */
                border-radius: 10px;
                max-width: 95%; /* Allow it to be slightly wider on smaller screens */
            }
            .form-header {
                font-size: 1.5em;
                padding: 20px;
            }
            .form-body {
                padding: 20px;
            }
            label {
                font-size: 0.9em;
            }
            input[type="number"],
            select {
                padding: 10px 12px;
                font-size: 0.95em;
            }
            .btn-submit {
                font-size: 1.1em;
                padding: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-header">
            Fertilizer Recommendation Form
        </div>
        <div class="form-body">
            <form id="fertilizerForm" action="{{ route('fertilizer.suggest') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="crop">Select Crop:</label>
                    <select id="crop" name="crop" required>
                        <option value="">-- Select Crop --</option>
                        <option value="rice">Rice</option>
                        <option value="wheat">Wheat</option>
                        <option value="maize">Maize</option>
                        <option value="jute">Jute</option>
                        <option value="paddy">Paddy</option>
                        <option value="barley">Barley</option>
                        <option value="cotton">Cotton</option>
                        <option value="potato">Potato</option>
                        <option value="tomato">Tomato</option>
                        <option value="sugarcane">Sugarcane</option>
                        <option value="soybean">Soybean</option>
                        <option value="mango">Mango</option>
                        <option value="banana">Banana</option>
                        <option value="apple">Apple</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="N">Nitrogen (N) Content:</label>
                    <input type="number" id="N" name="N" placeholder="Enter Nitrogen content (e.g., 90)" required min="0" step="any">
                </div>
                <div class="form-group">
                    <label for="P">Phosphorus (P) Content:</label>
                    <input type="number" id="P" name="P" placeholder="Enter Phosphorus content (e.g., 42)" required min="0" step="any">
                </div>
                <div class="form-group">
                    <label for="K">Potassium (K) Content:</label>
                    <input type="number" id="K" name="K" placeholder="Enter Potassium content (e.g., 43)" required min="0" step="any">
                </div>
                <button type="submit" class="btn-submit">Get Recommendation</button>
            </form>
        </div>
    </div>
</body>
</html>