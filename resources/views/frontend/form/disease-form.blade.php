<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plant Disease Detection</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2ECC71; /* Vibrant Green */
            --primary-dark: #27AE60;
            --accent-color: #3498DB; /* Blue for contrast */
            --text-dark: #2C3E50; /* Darker text for readability */
            --text-light: #BDC3C7; /* Lighter text for small messages */
            --transparent-form-bg: rgba(255, 255, 255, 0.2); /* Semi-transparent white for form background */
            --transparent-input-bg: rgba(255, 255, 255, 0.7); /* More opaque white for input fields */
            --border-color-transparent: rgba(255, 255, 255, 0.4); /* Transparent border for inputs */
            --input-focus-border: rgba(52, 152, 219, 0.8); /* Stronger blue for focus */
            --shadow-light: rgba(0, 0, 0, 0.1);
            --shadow-medium: rgba(0, 0, 0, 0.2);
            --shadow-strong: rgba(0, 0, 0, 0.3);
        }

        body {
            font-family: 'Montserrat', sans-serif;
            margin: 0;
            padding: 15px; /* Consistent padding */
            color: var(--text-dark);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            box-sizing: border-box;

            /* Full page background image */
            background-image: url("{{ asset('frontend/img/paddy01.jpg') }}"); /* Your specific image */
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
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
            max-width: 500px;
            /* Transparent background for the main form container */
            background-color: var(--transparent-form-bg);
            backdrop-filter: blur(5px); /* Frosted glass effect */
            -webkit-backdrop-filter: blur(5px); /* Safari support */
            border-radius: 12px; /* Slightly smaller radius for consistency */
            box-shadow: 0 10px 25px var(--shadow-medium); /* Adjusted shadow */
            overflow: hidden;
            animation: fadeInScale 0.8s ease-out forwards;
            padding: 0;
        }

        @keyframes fadeInScale {
            from { opacity: 0; transform: translateY(20px) scale(0.98); }
            to { opacity: 1; transform: translateY(0) scale(1); }
        }

        .form-header {
            background-image: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            color: white;
            padding: 28px 25px; /* Adjusted padding */
            text-align: center;
            font-size: 1.8em;
            font-weight: 700;
            border-bottom: 4px solid rgba(0,0,0,0.1); /* Adjusted border */
            position: relative;
            letter-spacing: 0.4px; /* Adjusted letter spacing */
        }

        .form-header::before {
            content: '🌿';
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 1.5em; /* Adjusted emoji size */
            opacity: 0.9;
        }

        .form-header::after {
            content: '🔬';
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 1.5em; /* Adjusted emoji size */
            opacity: 0.9;
        }

        .form-body {
            padding: 25px; /* Adjusted padding */
        }

        .form-group {
            margin-bottom: 20px; /* Adjusted margin */
        }

        label {
            display: block;
            margin-bottom: 8px; /* Adjusted margin */
            font-weight: 600;
            color: white; /* Labels will be white for contrast */
            text-shadow: 0 1px 2px rgba(0,0,0,0.4); /* Subtle shadow for better legibility */
            font-size: 0.95em; /* Adjusted font size */
        }

        input[type="file"] {
            display: block;
            width: 100%;
            padding: 10px 12px; /* Adjusted padding */
            border: 2px dashed var(--border-color-transparent); /* Transparent dashed border */
            border-radius: 10px;
            background-color: var(--transparent-input-bg); /* Semi-transparent input background */
            color: var(--text-dark); /* Input text color remains dark */
            font-size: 1em;
            cursor: pointer;
            transition: border-color 0.3s ease, background-color 0.3s ease, box-shadow 0.3s ease;
        }

        input[type="file"]::-webkit-file-upload-button {
            visibility: hidden;
        }
        input[type="file"]::before {
            content: 'Choose Image'; /* Updated button text for clarity */
            display: inline-block;
            background: var(--accent-color);
            color: white;
            border-radius: 5px;
            padding: 8px 15px;
            outline: none;
            white-space: nowrap;
            -webkit-user-select: none;
            cursor: pointer;
            font-weight: 500;
            font-size: 0.9em;
            margin-right: 10px;
            transition: background-color 0.2s ease;
        }
        input[type="file"]:hover::before {
            background-color: #2980B9;
        }
        input[type="file"]:active::before {
            background-color: #1F618D;
        }

        input[type="file"]:hover {
            border-color: var(--input-focus-border); /* Focus color on hover */
            background-color: rgba(255, 255, 255, 0.85); /* Slightly more opaque on hover */
            box-shadow: 0 0 0 4px rgba(52, 152, 219, 0.2); /* Blue shadow on hover */
        }

        .text-light { /* For the small description text */
            color: rgba(255, 255, 255, 0.9); /* White with slight transparency */
            font-size: 0.85em;
            margin-top: 5px;
            display: block; /* Ensure it's on its own line */
            text-shadow: 0 1px 2px rgba(0,0,0,0.3); /* Shadow for legibility */
        }

        .btn-submit {
            display: block;
            width: 100%;
            padding: 16px;
            background-image: linear-gradient(to right, var(--primary-color), var(--primary-dark));
            color: white;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-size: 1.25em;
            font-weight: 700;
            letter-spacing: 0.5px;
            transition: transform 0.2s ease, box-shadow 0.2s ease, background-image 0.3s ease;
            box-shadow: 0 6px 15px rgba(46, 204, 113, 0.3);
        }

        .btn-submit:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(46, 204, 113, 0.4);
            background-image: linear-gradient(to right, var(--primary-dark), var(--primary-color));
        }

        .btn-submit:active {
            transform: translateY(0);
            box-shadow: 0 4px 10px rgba(46, 204, 113, 0.2);
        }

        /* Responsive adjustments */
        @media (max-width: 600px) {
            body {
                padding: 10px;
            }
            .container {
                border-radius: 10px;
                max-width: 95%; /* Allow it to be slightly wider on smaller screens */
            }
            .form-header {
                font-size: 1.5em;
                padding: 25px 15px;
            }
            .form-header::before, .form-header::after {
                font-size: 1.3em;
            }
            .form-body {
                padding: 20px;
            }
            label {
                font-size: 0.9em;
            }
            input[type="file"] {
                padding: 8px 10px;
                font-size: 0.95em;
            }
            input[type="file"]::before {
                font-size: 0.85em;
                padding: 6px 12px;
            }
            .text-light {
                font-size: 0.8em;
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
            Plant Disease Detection
        </div>
        <div class="form-body">
            <form action="{{ route('disease.detect') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="image">Upload Leaf Image:</label>
                    <input type="file" name="image" id="image" accept="image/*" required>
                    <small class="text-light">Upload a clear image of the affected plant leaf.</small>
                </div>
                <button type="submit" class="btn-submit">Detect Disease</button>
            </form>
        </div>
    </div>
</body>
</html>