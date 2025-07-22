
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
    <h2 class="mb-4">Fertilizer Recommendation Form</h2>
    <form id="fertilizerForm" action="{{ route('fertilizer.suggest') }}" method="POST">
       
        @csrf
        <div class="form-group">
            <label for="crop">Select Crop:</label>
            <select class="form-control" name="crop" id="crop" required>
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
            <label for="N">Nitrogen (N):</label>
            <input type="number" class="form-control" id="N" name="N" required>
        </div>
        <div class="form-group">
            <label for="P">Phosphorus (P):</label>
            <input type="number" class="form-control" id="P" name="P" required>
        </div>
        <div class="form-group">
            <label for="K">Potassium (K):</label>
            <input type="number" class="form-control" id="K" name="K" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Get Recommendation</button>
    </form>
</div>
</body>
</html>


