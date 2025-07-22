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
        <h2>Crop Recommendation Form</h2>
        <form action="{{ route('crop.recommend') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="N">Nitrogen (N)</label>
                <input type="number" name="N" id="N" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="P">Phosphorus (P)</label>
                <input type="number" name="P" id="P" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="K">Potassium (K)</label>
                <input type="number" name="K" id="K" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="temperature">Temperature (°C)</label>
                <input type="number" step="0.1" name="temperature" id="temperature" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="humidity">Humidity (%)</label>
                <input type="number" step="0.1" name="humidity" id="humidity" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="ph">Soil pH</label>
                <input type="number" step="0.1" name="ph" id="ph" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="rainfall">Rainfall (mm)</label>
                <input type="number" step="0.1" name="rainfall" id="rainfall" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success mt-3">Get Recommendation</button>
        </form>


    </div>


</body>

</html>