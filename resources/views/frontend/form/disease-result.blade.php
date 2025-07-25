<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Disease Prediction Result</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #28a745; /* Success Green */
            --primary-dark: #218838;
            --secondary-color: #007bff; /* Primary Blue for actions/links */
            --text-dark: #343a40; /* Darker text for better contrast */
            --text-light: #6c757d;
            --bg-light: #f8f9fa; /* Light background */
            --card-bg: #ffffff;
            --border-color: #dee2e6;
            --shadow-light: rgba(0, 0, 0, 0.08);
            --shadow-medium: rgba(0, 0, 0, 0.12);
        }

        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 30px;
            background-color: var(--bg-light);
            color: var(--text-dark);
            display: flex;
            justify-content: center;
            align-items: flex-start; /* Align to top */
            min-height: 100vh;
            box-sizing: border-box;
        }

        .result-container {
            width: 100%;
            max-width: 960px; /* A bit wider for better content flow */
            background-color: var(--card-bg);
            border-radius: 12px;
            box-shadow: 0 10px 30px var(--shadow-medium);
            padding: 35px;
            animation: fadeIn 0.8s ease-out;
            margin-top: 20px; /* Space from top */
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        h2 {
            color: var(--primary-dark);
            text-align: center;
            margin-bottom: 30px;
            font-size: 2.2em;
            font-weight: 700;
            position: relative;
            padding-bottom: 15px;
        }

        h2::after {
            content: '';
            position: absolute;
            left: 50%;
            bottom: 0;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background-color: var(--primary-color);
            border-radius: 2px;
        }

        .general-info {
            margin-bottom: 30px;
            padding: 20px 0;
            border-bottom: 1px dashed var(--border-color);
            text-align: center;
            background-color: #e6ffe6; /* Light green background */
            border-radius: 8px;
            padding: 15px 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }

        .general-info p {
            margin: 8px 0;
            font-size: 1.15em;
            color: var(--text-dark);
        }

        .general-info strong {
            color: var(--primary-dark);
            font-weight: 700;
        }

        .language-section {
            display: grid; /* Use CSS Grid for more control */
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); /* Responsive 3-column layout */
            gap: 25px; /* More space between cards */
            margin-bottom: 30px;
        }

        .lang-card {
            background-color: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 4px 15px var(--shadow-light);
            text-align: left;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            display: flex;
            flex-direction: column;
        }

        .lang-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 20px var(--shadow-medium);
        }

        .lang-card h3 {
            color: var(--secondary-color);
            margin-top: 0;
            margin-bottom: 20px;
            font-size: 1.5em;
            font-weight: 600;
            border-bottom: 3px solid var(--secondary-color);
            padding-bottom: 10px;
        }

        .lang-card p {
            font-size: 0.98em;
            line-height: 1.7;
            margin-bottom: 12px;
            color: var(--text-light);
            flex-grow: 1; /* Allows content to push to bottom */
        }

        .lang-card p:last-child {
            margin-bottom: 0;
        }

        .lang-card strong {
            color: var(--text-dark);
            font-weight: 500;
        }

        .image-container {
            text-align: center;
            margin-top: 30px;
            background-color: #f1f1f1;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }

        .disease-image {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.15);
            transition: transform 0.3s ease;
        }

        .disease-image:hover {
            transform: scale(1.02);
        }

        .alert-warning {
            background-color: #fff3cd;
            color: #856404;
            padding: 15px;
            border: 1px solid #ffeeba;
            border-radius: 8px;
            text-align: center;
            font-size: 1.1em;
            margin-top: 20px;
            animation: slideIn 0.5s ease-out;
        }

        @keyframes slideIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .btn-back {
            display: block;
            width: fit-content;
            margin: 30px auto 0;
            padding: 12px 25px;
            background-color: var(--secondary-color);
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 1.05em;
            transition: background-color 0.3s ease, transform 0.2s ease;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .btn-back:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
            box-shadow: 0 6px 15px var(--shadow-medium);
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .result-container {
                padding: 25px;
                margin-top: 15px;
            }
            h2 {
                font-size: 1.8em;
            }
            .language-section {
                grid-template-columns: 1fr; /* Stack columns on smaller screens */
            }
            .general-info p {
                font-size: 1em;
            }
        }

        @media (max-width: 480px) {
            body {
                padding: 15px;
            }
            .result-container {
                padding: 20px;
            }
            h2 {
                font-size: 1.6em;
            }
            .lang-card {
                padding: 20px;
            }
            .btn-back {
                padding: 10px 20px;
                font-size: 1em;
            }
        }
    </style>
</head>
<body>

    <div class="result-container">
        <h2>Disease Prediction Result</h2>

        @if($disease)
            <div class="general-info">
                <p><strong>Detected Disease:</strong> {{ $disease->label ?? 'Unknown' }}</p>
                <p><strong>Confidence:</strong> {{ number_format($disease->confidence * 100 ?? 0, 2) }}%</p>
            </div>

            <div class="language-section">
                {{-- English Section --}}
                <div class="lang-card">
                    <h3>English</h3>
                    <p><strong>Title:</strong> {{ $fullInfoMultilingual['english']['title'] ?? 'N/A' }}</p>
                    <p><strong>Description:</strong> {{ $fullInfoMultilingual['english']['description'] ?? 'No description available.' }}</p>
                    <p><strong>Treatment:</strong> {{ $fullInfoMultilingual['english']['treatment'] ?? 'No treatment advice available.' }}</p>
                </div>

                {{-- Nepali Section --}}
                <div class="lang-card">
                    <h3>नेपाली</h3>
                    <p><strong>शीर्षक:</strong> {{ $fullInfoMultilingual['nepali']['title'] ?? 'N/A' }}</p>
                    <p><strong>विवरण:</strong> {{ $fullInfoMultilingual['nepali']['description'] ?? 'विस्तृत विवरण उपलब्ध छैन।' }}</p>
                    <p><strong>उपचार:</strong> {{ $fullInfoMultilingual['nepali']['treatment'] ?? 'उपचारको सल्लाह उपलब्ध छैन।' }}</p>
                </div>

                {{-- Bhojpuri Section --}}
                <div class="lang-card">
                    <h3>भोजपुरी</h3>
                    <p><strong>शीर्षक:</strong> {{ $fullInfoMultilingual['bhojpuri']['title'] ?? 'N/A' }}</p>
                    <p><strong>जानकारी:</strong> {{ $fullInfoMultilingual['bhojpuri']['description'] ?? 'कवनो खास जानकारी नइखे।' }}</p>
                    <p><strong>इलाज:</strong> {{ $fullInfoMultilingual['bhojpuri']['treatment'] ?? 'इलाज के सलाह नइखे।' }}</p>
                </div>
            </div>

            @if(isset($disease->image_path))
                <div class="image-container">
                    <img src="{{ asset($disease->image_path) }}" class="disease-image" alt="Predicted Disease Image">
                </div>
            @endif

            <a href="{{ url()->previous() }}" class="btn-back">
                &larr; Go Back / फर्कनुहोस्
            </a>

        @else
            <div class="alert-warning">
                No disease data found. Please try another prediction by uploading an image.
            </div>
             <a href="{{ url()->previous() }}" class="btn-back">
                &larr; Go Back / फर्कनुहोस्
            </a>
        @endif
    </div>

</body>
</html>