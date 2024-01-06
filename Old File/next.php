<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Captured Photos</title>
</head>
<body>
<h1>Captured Photos</h1>
<?php
if(isset($_POST['captured-images'])) {
    $capturedImages = explode('#', $_POST['captured-images']);
    foreach ($capturedImages as $index => $imageData) {
        $imageData = str_replace('data:image/png;base64,', '', $imageData);
        $imageData = str_replace(' ', '+', $imageData);
        $imageData = base64_decode($imageData);
        echo '<img src="data:image/jpg;charset=utf8;base64,';
        echo base64_encode($imageData) . '"alt = "">';
    }
}
?>
</body>
</html>
