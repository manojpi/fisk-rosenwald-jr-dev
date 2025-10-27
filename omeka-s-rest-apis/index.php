<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Omeka S Items</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 900px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        h1 {
            color: #333;
        }
        .item {
            background-color: white;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 5px;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
            padding: 15px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h1>Omeka S Items</h1>

<?php

function makeReq($baseUrl){
    // Make API request
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $baseUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    // Check for errors
    if ($httpCode !== 200) {
        echo "<div class='error'>Error: Unable to fetch items (HTTP $httpCode)</div>";
        echo "<div class='error'>Response: " . htmlspecialchars($response) . "</div>";
    } else {
        $items = json_decode($response, true);
        
        // Check if JSON decoding was successful
        if ($items === null) {
            echo "<div class='error'>Error: Unable to decode JSON response</div>";
            echo "<div class='error'>Response: " . htmlspecialchars($response) . "</div>"; // htmlspecialchars -> converst html to text safely to avoid attacks
        } elseif (empty($items)) {
            echo "<p>No items found</p>";
        } else {
            echo "<p>Found " . count($items) . " items</p>";
            
            // Display each item
            foreach ($items as $item) {
                echo "<div class='item'>";
                echo "<strong>ID:</strong> " . $item['o:id'] . "<br>";
                
                if (isset($item['o:title'])) {
                    echo "<strong>Title:</strong> " . htmlspecialchars($item['o:title']) . "<br>";
                }
                
                if (isset($item['o:created']['@value'])) {
                    echo "<strong>Created:</strong> " . htmlspecialchars($item['o:created']['@value']);
                }
                
                echo "</div>";
            }
        }
    }
}

// urls for REST API Endpoints

$items_url = 'http://localhost:8081/api/items';
$item_set_url = 'http://localhost:8081/api/item_sets';
$media_url = 'http://localhost:8081/api/media';


makeReq($items_url);
makeReq($item_set_url);
makeReq($media_url);

?>

</body>
</html>