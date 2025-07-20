<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>باحث الطقس</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url('https://images.unsplash.com/photo-1506744038136-46273834b3fb') no-repeat center center fixed;
            background-size: cover;
            color: white;
        }
        .weather-box {
            background: rgba(0, 0, 0, 0.6);
            padding: 30px;
            border-radius: 15px;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h1 class="text-center mb-4">🔍 باحث الطقس</h1>
    <form method="GET" class="mb-4 text-center">
        <input type="text" name="city" class="form-control w-50 d-inline" placeholder="اكتب اسم المدينة" required>
        <button type="submit" class="btn btn-success">بحث</button>
    </form>

    <?php
    if (isset($_GET['city'])) {
        $city =trim($_GET['city']);
        $apiKey = '639ccbd537d699419b1ba8838fea3b83';
        $apiUrl = "https://api.openweathermap.org/data/2.5/weather?q=$city&appid=$apiKey&lang=ar";

        $weatherData = file_get_contents($apiUrl);
        $weather = json_decode($weatherData);

        if ($weather && $weather->cod == 200) {
            echo '<div class="weather-box text-center mx-auto w-50">';
            echo "<h2>{$weather->name}</h2>";
            echo "<h4>{$weather->weather[0]->description}</h4>";
            echo "<p>درجة الحرارة: {$weather->main->temp}fh </p>";
            echo "<p>سرعة الرياح: {$weather->wind->speed} متر/ثانية</p>";
            echo "<p>شروق الشمس: " . date('h:i A', $weather->sys->sunrise) . "</p>";
            echo "<p>غروب الشمس: " . date('h:i A', $weather->sys->sunset) . "</p>";
            echo '</div>';
        } else {
            echo '<div class="alert alert-danger text-center w-50 mx-auto">المدينة غير موجودة!</div>';
        }
    }
    ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
