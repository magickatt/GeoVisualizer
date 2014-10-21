<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A layout example that shows off a responsive pricing table.">
    <title>Pricing Table &ndash; </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">

</head>
<body>
    <h1>Geographical Visualizer</h1>
    <h2>Collector</h2>
    <p>Select a method to collect geographical data (which can then be visualized)</p>
    <ul>
        <?php foreach ($collectors as $collector): ?>
        <li><a href=""><?php echo $collector; ?></a></li>
        <?php endforeach; ?>
    </ul>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</body>
</html>
