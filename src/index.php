<!DOCTYPE html>
<html>
<head>
    <title>Interopérabilité</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../src/public/assets/materialize/css/materialize.min.css">
    <link rel="stylesheet" href="../src/public/assets/leaflet/leaflet.css">

    <script src="../src/public/assets/jquery/jquery-3.3.1.min.js"></script>
    <script src="../src/public/assets/materialize/js/materialize.min.js"></script>
    <script src="../src/public/assets/leaflet/leaflet.js"></script>
    <script src="../src/public/assets/app/app.js"></script>
</head>
<body>


    <nav>
        <div class="nav-wrapper blue">
            <a href="#" class="brand-logo center">Interopérabilité</a>
        </div>
    </nav>



    <div class="container">
        <p>Liste des membres :</p>
        <ul>
            <li>Baier Geoffrey</li>
            <li>Dubois Morgan</li>
            <li>Wilmouth Steven</li>
        </ul>
        <div class="divider"></div>
        <br />
        <div id="map" class="col l12" style="height: 400px; width: auto">

        </div>
    </div>
</body>
<script type="text/javascript">
    $(() => {
        Interoperabilite.init(<?php echo (file_get_contents('http://api.loire-atlantique.fr/opendata/1.0/traficevents?filter=Tous')); ?>, <?php echo (file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address=Nantes,+FR&key=AIzaSyB-ysu90cG51yoVR6TePOk9sYM_1WqqnVI')); ?>);
    });
</script>
</html>
