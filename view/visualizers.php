<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A layout example that shows off a responsive pricing table.">
    <title>GeoVisualizer</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">

</head>
<body>
    <h1>Geographical Visualizer</h1>
    <h2>Collector</h2>
    <?php if (empty($geoPoints)): ?>
        <p>No geographical data found this time, <a href="#" onclick='location.reload(true); return false;'>search again?</a></p>
    <?php else: ?>
    <p>Collected the following:</p>
    <ul>
        <?php foreach ($geoPoints as $geoPoint): ?>
            <li><?php echo $geoPoint->getDescription(); ?></li>
        <?php endforeach; ?>
    </ul>
    <?php endif; ?>
    <h2>Visualizer</h2>
    <p>Select a method to visualize the geographical data previously collected</p>
    <ul>
        <?php foreach ($visualizers as $slug => $visualizerName): ?>
        <li><a href="visualizer/<?php echo $slug; ?>"><?php echo $visualizerName; ?></a></li>
        <?php endforeach; ?>
    </ul>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</body>
</html>
