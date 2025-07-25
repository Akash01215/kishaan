<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fertilizer Recommendation</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #4CAF50;
            /* Green for success/growth */
            --primary-dark: #388E3C;
            --secondary-color: #2196F3;
            /* Blue for info */
            --text-dark: #333;
            --text-light: #666;
            --bg-light: #f8f9fa;
            --card-bg: #ffffff;
            --border-color: #e0e0e0;
            --shadow-light: rgba(0, 0, 0, 0.08);
            --shadow-strong: rgba(0, 0, 0, 0.15);
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--bg-light);
            color: var(--text-dark);
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            box-sizing: border-box;
        }

        .container {
            width: 100%;
            max-width: 850px;
            /* Slightly wider for better card spacing */
            margin: 0 auto;
            background-color: var(--card-bg);
            border-radius: 12px;
            box-shadow: 0 8px 25px var(--shadow-light);
            overflow: hidden;
            /* Ensures border-radius applies */
            animation: fadeIn 0.8s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .card-header {
            background-color: var(--primary-color);
            color: white;
            padding: 25px 30px;
            text-align: center;
            font-size: 1.8em;
            font-weight: 600;
            border-bottom: 4px solid var(--primary-dark);
            position: relative;
        }

        .card-header::after {
            content: '🌿';
            /* Leaf emoji for visual appeal */
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 1.5em;
            opacity: 0.8;
        }

        .card-body {
            padding: 30px;
        }

        .recommendation-list {
            list-style: none;
            padding: 0;
            margin: 0;
            display: grid;
            /* Use CSS Grid for a modern layout */
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            /* Responsive columns */
            gap: 20px;
            /* Space between grid items */
        }

        .recommendation-item {
            background-color: #f9f9f9;
            border: 1px solid var(--border-color);
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .recommendation-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 15px var(--shadow-strong);
        }

        .recommendation-item strong {
            color: var(--primary-color);
            font-weight: 600;
            margin-bottom: 5px;
            /* Space below strong tag */
            display: block;
            /* Ensures it takes full width */
            font-size: 1.05em;
        }

        .recommendation-item .lang-content {
            margin-bottom: 10px;
            color: var(--text-light);
            line-height: 1.6;
        }

        .recommendation-item .lang-content:last-child {
            margin-bottom: 0;
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
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
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
            background-color: #1976D2;
            /* Darker blue */
            transform: translateY(-2px);
            box-shadow: 0 6px 15px var(--shadow-strong);
        }

        /* Responsive adjustments */
        @media (max-width: 600px) {
            .card-header {
                font-size: 1.5em;
                padding: 20px;
            }

            .card-body {
                padding: 20px;
            }

            .recommendation-list {
                grid-template-columns: 1fr;
                /* Single column on small screens */
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card-header">
            Fertilizer Recommendation Result
        </div>
        <div class="card-body">
            @if(count($recommendations) > 0)
            <ul class="recommendation-list">
                @foreach($recommendations as $rec)
                <li class="recommendation-item">
                    <div class="lang-content">
                        <strong>English:</strong> {{ $rec['en'] ?? 'No suggestion available.' }}
                    </div>
                    <div class="lang-content">
                        <strong>नेपाली:</strong> {{ $rec['np'] ?? 'कुनै सिफारिस उपलब्ध छैन।' }}
                    </div>
                </li>
                @endforeach
            </ul>
            @else
            <div class="alert-warning">
                Sorry, we couldn't find any specific fertilizer recommendations for your input. Please try again with different parameters.
            </div>
            @endif

            <a href="{{ url()->previous() }}" class="btn-back">
                &larr; Go Back / फर्कनुहोस्
            </a>
        </div>
    </div>
</body>

</html>