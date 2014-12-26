<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A layout example that shows off a responsive pricing table.">
    <title>Pricing Table &ndash; Google Maps</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">

</head>
<body>
<h1>Geographical Visualizer</h1>
<h2>Google Maps</h2>
<?php if (empty($geoPoints)): ?>
    <p>No geographical data was collected</p>
<?php else: ?>
    <p>Each geographical data point should be represented on the map below</p>
    <ul>
        <?php foreach ($geoPoints as $geoPoint): ?>
            <li><?php echo $geoPoint->getDescription(); ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</body>
</html>
