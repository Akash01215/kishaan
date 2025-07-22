<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
        color: #333;
    }

    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
    }

    h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    label {
        display: block;
        margin-bottom: 5px;
    }

    input[type="number"],
    input[type="text"] {
        width: 100%;
        padding: 8px;
        box-sizing: border-box;
    }

    button {
        display: block;
        width: 100%;
        padding: 10px;
        background-color: #28a745;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    button:hover {
        background-color: #218838;
    }
    .btn {
        display: inline-block;
        padding: 10px 20px;
        background-color: #007bff;
        color: white;
        text-decoration: none;
        border-radius: 5px;
    }   
</style>
<body>
    <div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-success text-white">
            <h4>Fertilizer Suggestion Result</h4>
        </div>
        <div class="card-body">
            @if(count($recommendations) > 0)
                <ul class="list-group">
                    @foreach($recommendations as $rec)
                        <li class="list-group-item">
                            <strong>English:</strong> {{ $rec['en'] }} <br>
                            <strong>नेपाली:</strong> {{ $rec['np'] }}
                        </li>
                    @endforeach
                </ul>
            @else
                <div class="alert alert-warning">
                    No recommendations found. Please try again.
                </div>
            @endif
            <a href="{{ url()->previous() }}" class="btn btn-secondary mt-3">← Go Back / फर्कनुहोस्</a>
        </div>
    </div>
</div>
</body>
</html>

