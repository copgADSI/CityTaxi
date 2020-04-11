<?php

 session_start();
 $_SESSION['idCliente'];

?>
<!DOCTYPE html>
<html>

<head lang="es">
    <title>Ruta-CityCab</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="google-site-verification" content="o6qYT6F0351v_gc3nZ2urC_Au3VfSG7eDayE12QM1BI" />
    <meta name="msvalidate.01" content="D08BF9E0465C0FD3D422D799F4CF6DE7" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="robots" content="index,follow" />
    <link rel="stylesheet" href="diseno.css">

    <link rel="apple-touch-icon-precomposed" href="/assets/css/img/favicon_iphone.png" />
    <link rel="alternate" href="https://www.mapsdirections.info/calcular-ruta.html" hreflang="es-es" />
    <link rel="alternate" href="https://www.mapsdirections.info/fr/planificateur-d-itineraire.htm" hreflang="fr-fr" />
    <link rel="alternate" href="https://www.mapsdirections.info/it/pianificare-un-tragitto.html" hreflang="it-it" />
    <link rel="alternate" href="https://www.mapsdirections.info/de/routenplaner.htm" hreflang="de-de" />
    <link rel="alternate" href="https://www.mapsdirections.info/ru/pассчитать-время-расстояние.htm" hreflang="ru-ru" />
    <link rel="alternate" href="https://www.mapsdirections.info/nl/routeplanner.htm" hreflang="nl-nl" />
    <link rel="alternate" href="https://www.mapsdirections.info/en/journey-planner.htm" hreflang="en" />
    <link rel="alternate" href="https://www.mapsdirections.info/pt/planejador-de-rotas.htm" hreflang="pt-pt" />
    <link rel="alternate" href="https://www.mapsdirections.info/pl/wyznaczanie-trasy.htm" hreflang="pl-pl" />
    <link rel="alternate" href="https://www.mapsdirections.info/ro/planificare-ruta.htm" hreflang="ro-ro" />
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="/assets/css/img/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/assets/css/img/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/assets/css/img/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/assets/css/img/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon-precomposed" sizes="60x60" href="/assets/css/img/apple-touch-icon-60x60.png" />
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="/assets/css/img/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon-precomposed" sizes="76x76" href="/assets/css/img/apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="/assets/css/img/apple-touch-icon-152x152.png" />
    <link rel="icon" type="image/png" href="/assets/css/img/favicon-196x196.png" sizes="196x196" />
    <link rel="icon" type="image/png" href="/assets/css/img/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/png" href="/assets/css/img/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="/assets/css/img/favicon-16x16.png" sizes="16x16" />
    <link rel="icon" type="image/png" href="/assets/css/img/favicon-128.png" sizes="128x128" />
    <meta name="application-name" content="&nbsp;" />
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="/assets/css/img/mstile-144x144.png" />
    <meta name="msapplication-square70x70logo" content="/assets/css/img/mstile-70x70.png" />
    <meta name="msapplication-square150x150logo" content="/assets/css/img/mstile-150x150.png" />
    <meta name="msapplication-wide310x150logo" content="/assets/css/img/mstile-310x150.png" />
    <meta name="msapplication-square310x310logo" content="/assets/css/img/mstile-310x310.png" />
    <link rel="stylesheet" href="https://bootswatch.com/4/yeti/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/fonts.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="assets/css/responsive.css" />
    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.js"></script>  <![endif]-->
    <script type="text/javascript" src="assets/js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/main.js"></script>

    <script>
        var mymap = null;
        var default_lat = 5.6278979;
        var default_lng = -72.8268617;
        var default_zoom = 10;
        var map_div = "map_canvas";
        var rStart = '',
            rVia = '',
            rEnd = '';
        var engine, engineReverse1, engineReverse2, engineReverse3;
        var startAddress = '',
            viaAddress = '',
            endAddress = '';
        var routeLine = null;
        var startMarker, viaMarker, endMarker;
        var signIcon = {
            '-98': 'u_turn_left.png',
            '-7': 'keep_left.png',
            '-3': 'slight_left.png',
            '-2': 'left.png',
            '-1': 'slight_left.png',
            '0': '',
            '1': 'slight_right.png',
            '2': 'right.png',
            '3': 'sharp_right.png',
            '4': 'marker-icon-red.png',
            '5': 'marker-icon-blue.png',
            '6': 'roundabout.png',
            '7': 'keep_right.png',
            '98': 'u_turn_right.png'
        };

        $(document).ready(function() {
            var osmUrl = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
                osmAttrib = '&copy; <a href="http://openstreetmap.org/copyright">OpenStreetMap</a> contributors';
            osm = L.tileLayer(osmUrl, {
                maxZoom: 18,
                attribution: osmAttrib
            });
            // var satelliteURL = 'http://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}',
            //     satelliteAttrib = '&copy; <a href="http://www.esri.com/">Esri</a>, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community';
            //     satellite = L.tileLayer(satelliteURL, {maxZoom: 18, attribution: satelliteAttrib});
            hybrid = L.esri.basemapLayer('ImageryLabels');
            satellite = L.esri.basemapLayer('Imagery');
            var sHybrid = L.layerGroup([satellite, hybrid]);

            mymap = L.map(map_div, {
                center: new L.LatLng(default_lat, default_lng),
                zoom: default_zoom,
                layers: [osm]
            });
            var drawnItems = L.featureGroup().addTo(mymap);

            var baseLayers = {
                "Satellite": satellite,
                "Hybrid": sHybrid,
                "Map": osm
            };
            L.control.layers(baseLayers, {}, {
                position: 'topright',
                collapsed: false
            }).addTo(mymap);

            engine = new PhotonAddressEngine({
                url: 'https://photon.komoot.de',
                lang: 'en',
            });
            var engineStart = new PhotonAddressEngine({
                url: 'https://photon.komoot.de',
                lang: 'en',
            });
            var engineVia = new PhotonAddressEngine({
                url: 'https://photon.komoot.de',
                lang: 'en',
            });
            var engineEnd = new PhotonAddressEngine({
                url: 'https://photon.komoot.de',
                lang: 'en',
            });
            engineReverse1 = new PhotonAddressEngine({
                url: 'https://photon.komoot.de',
                lang: 'en',
            });
            engineReverse2 = new PhotonAddressEngine({
                url: 'https://photon.komoot.de',
                lang: 'en',
            });
            engineReverse3 = new PhotonAddressEngine({
                url: 'https://photon.komoot.de',
                lang: 'en',
            });

            $('#routeStart').typeahead({
                hint: false,
                highlight: true,
                minLength: 3
            }, {
                source: engineStart.ttAdapter(),
                displayKey: 'description'
            });
            $('#routeVia').typeahead({
                hint: false,
                highlight: true,
                minLength: 3
            }, {
                source: engineVia.ttAdapter(),
                displayKey: 'description'
            });
            $('#routeEnd').typeahead({
                hint: false,
                highlight: true,
                minLength: 3
            }, {
                source: engineEnd.ttAdapter(),
                displayKey: 'description'
            });
            $(engine).bind('addresspicker:selected', function(event, selectedPlace) {
                $('#routeStart').val(selectedPlace.description);
                // startAddress = selectedPlace.description;
            });
            engineStart.bindDefaultTypeaheadEvent($('#routeStart'));
            $(engineStart).bind('addresspicker:predictions', showPredictionsStart);
            $(engineStart).bind('addresspicker:selected', showSelectedStart);

            engineVia.bindDefaultTypeaheadEvent($('#routeVia'));
            $(engineVia).bind('addresspicker:predictions', showPredictionsVia);
            $(engineVia).bind('addresspicker:selected', showSelectedVia);

            engineEnd.bindDefaultTypeaheadEvent($('#routeEnd'));
            $(engineEnd).bind('addresspicker:predictions', showPredictionsEnd);
            $(engineEnd).bind('addresspicker:selected', showSelectedEnd);

            $(engineReverse1).bind('addresspicker:selected', function(event, selectedPlace) {
                startAddress = selectedPlace.description;
                setTimeout(function() {
                    calcRoute();
                }, 1000);
            });
            $(engineReverse2).bind('addresspicker:selected', function(event, selectedPlace) {
                viaAddress = selectedPlace.description;
                setTimeout(function() {
                    calcRoute();
                }, 1000);
            });
            $(engineReverse3).bind('addresspicker:selected', function(event, selectedPlace) {
                endAddress = selectedPlace.description;
                setTimeout(function() {
                    calcRoute();
                }, 1000);
            });

            function showPredictionsStart(event, predictions) {
                if (predictions.length == 0) {
                    $('#resultsStart').html('No results found');
                } else {
                    $('#resultsStart').html('');
                }
            }

            function showPredictionsVia(event, predictions) {
                if (predictions.length == 0) {
                    $('#').html('No results found');
                } else {
                    $('#resultsVia').html('');
                }
            }

            function showPredictionsEnd(event, predictions) {
                if (predictions.length == 0) {
                    $('#resultsEnd').html('No results found');
                } else {
                    $('#resultsEnd').html('');
                }
            }

            function showSelectedStart(event, selected) {
                document.getElementById("routeStart").value = selected.description;
                rStart = selected.geometry.coordinates[1] + ',' + selected.geometry.coordinates[0];
                startAddress = selected.description;
            }

            function showSelectedVia(event, selected) {
                document.getElementById("routeVia").value = selected.description;
                rVia = selected.geometry.coordinates[1] + ',' + selected.geometry.coordinates[0];
                viaAddress = selected.description;
            }

            function showSelectedEnd(event, selected) {
                document.getElementById("routeEnd").value = selected.description;
                rEnd = selected.geometry.coordinates[1] + ',' + selected.geometry.coordinates[0];
                endAddress = selected.description;
            }

            $("#directionsPanel").on("click", '#startMInstr', function() {
                startMarker.openPopup();
            });
            $("#directionsPanel").on("click", '#viaMInstr', function() {
                viaMarker.openPopup();
            });
            $("#directionsPanel").on("click", '#endMInstr', function() {
                endMarker.openPopup();
            });
            $("#travelMode").change(function() {
                if ($(this).val() != 1) {
                    $("#highways").val(1);
                    $("#highways").prop('disabled', true);
                    $("#tolls").val(1);
                    $("#tolls").prop('disabled', true);
                } else {
                    $("#highways").prop('disabled', false);
                    $("#tolls").prop('disabled', false);
                }
            });
        });

        function getAddressByLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                alert("Geolocalización no es compatible con este navegador.");
            }
        }

        function showPosition(position) {
            engine.reverseGeocode([position.coords.latitude, position.coords.longitude]);
        }

        function getRoute() {

            var startInput = $("#routeStart").val();
            var viaInput = $("#routeVia").val();
            var endInput = $("#routeEnd").val();
            if (startInput == '' || endInput == '') {
                alert("Rellene los campos 'De' y 'Para'");
                return;
            } else {
                if ((startInput == startAddress) && (viaInput == viaAddress) && (endInput == endAddress)) {
                    calcRoute();
                } else {
                    var si = new URLSearchParams(startInput);
                    $.getJSON('https://photon.komoot.de/api/?q=' + si + '&limit=1', function(data) {
                        rStart = data.features[0].geometry.coordinates[1] + ',' + data.features[0].geometry.coordinates[0];

                        startAddress = startInput;
                    }).fail(function() {
                        alert('Origen no es una ubicación válida');
                        return;
                    });

                    if (viaInput != '') {
                        var vi = new URLSearchParams(viaInput);
                        $.getJSON('https://photon.komoot.de/api/?q=' + vi + '&limit=1', function(data) {
                            rVia = data.features[0].geometry.coordinates[1] + ',' + data.features[0].geometry.coordinates[0];
                            viaAddress = viaInput;
                        }).fail(function() {
                            alert('VIA no es una ubicación válida');
                            return;
                        });
                    } else {
                        rVia = '';
                        viaAddress = '';
                    }
                    var ei = new URLSearchParams(endInput);
                    $.getJSON('https://photon.komoot.de/api/?q=' + ei + '&limit=1', function(data) {
                        rEnd = data.features[0].geometry.coordinates[1] + ',' + data.features[0].geometry.coordinates[0];
                        endAddress = endInput;
                        calcRoute();
                    }).fail(function() {
                        alert('Destino no es una ubicación válida');
                        return;
                    });
                }
            }
        }

        function calcRoute() {
            console.log(startAddress + ',' + endAddress);
            var vehicle;
            var avoid = '';
            if (rStart != '' && rEnd != '') {
                $('#directionsPanel').html('<span class="noprint">Enter your journey details above and click "Calculate Route".</span>');

                var rPoints = 'point=' + rStart;
                if (rVia != '') {
                    rPoints += '&point=' + rVia;
                }
                rPoints += '&point=' + rEnd;
                if ($("#travelMode").val() == 1) {
                    vehicle = 'car';

                    //supported only for cars
                    if ($("#highways").val() == 2) {
                        avoid += '&ch.disable=true&avoid=motorway';
                        if ($("#tolls").val() == 2) {
                            avoid += ';toll';
                        }
                    } else if ($("#tolls").val() == 2) {
                        avoid += '&ch.disable=true&avoid=toll';
                    }
                } else if ($("#travelMode").val() == 2) {
                    vehicle = 'bike';
                } else if ($("#travelMode").val() == 3) {
                    vehicle = 'foot';
                }

                var jsstring = 'https://graphhopper.com/api/1/route?' + rPoints + '&points_encoded=false&vehicle=' + vehicle + '&locale=en' + avoid + '&key=fa79433e-c782-49aa-8495-f6b3308a4f1e';
                $.getJSON(jsstring, function(data) {
                    drawRoute(data.paths[0]);
                    $('#directionsPanel').html(displayInstructions(data.paths[0]));
                }).fail(function(e) {
                    var arr = JSON.parse(e.responseText);
                    // if(arr["hints"][0]["message"] != '') {
                    //     // alert(arr["hints"][0]["message"]);
                    // }
                    // else {
                    alert("No se pudo encontrar la ruta entre el origen y el destino");
                    // }
                });
            } else {
                alert("Por lo menos uno de los orígenes, destinos, o referencias no ha podido ser geocodificado.");
            }
        }

        function drawRoute(data) {
            if (routeLine != null) {
                mymap.removeLayer(routeLine);
                routeLine = null;
                if (startMarker != null) {
                    mymap.removeLayer(startMarker);
                    // startMarker.removeFrom(mymap);
                    startMarker = null;
                }
                if (viaMarker != null) {
                    mymap.removeLayer(viaMarker);
                    // viaMarker.removeFrom(mymap);
                    viaMarker = null;
                }
                if (endMarker != null) {
                    mymap.removeLayer(endMarker);
                    // endMarker.removeFrom(mymap);
                    endMarker = null;
                }
            }
            var startIcon = L.icon({
                iconUrl: 'assets/css/img/marker-icon-green.png',
                iconSize: [25, 41],
                iconAnchor: [12.5, 41],
            });
            var viaIcon = L.icon({
                iconUrl: 'assets/css/img/marker-icon-red.png',
                iconSize: [25, 41],
                iconAnchor: [12.5, 41],
            });
            var endIcon = L.icon({
                iconUrl: 'assets/css/img/marker-icon-blue.png',
                iconSize: [25, 41],
                iconAnchor: [12.5, 41],
            });
            var snappedMarkers = data.snapped_waypoints.coordinates;
            if (snappedMarkers.length == 3) {
                startMarker = L.marker([snappedMarkers[0][1], snappedMarkers[0][0]], {
                    icon: startIcon,
                    draggable: "true",
                });
                viaMarker = L.marker([snappedMarkers[1][1], snappedMarkers[1][0]], {
                    icon: viaIcon,
                    draggable: "true",
                });
                endMarker = L.marker([snappedMarkers[2][1], snappedMarkers[2][0]], {
                    icon: endIcon,
                    draggable: "true",
                });
                startMarker.addTo(mymap), viaMarker.addTo(mymap), endMarker.addTo(mymap);
                startMarker.bindPopup(startAddress);
                viaMarker.bindPopup(viaAddress);
                endMarker.bindPopup(endAddress);

                startMarker.on('moveend', function(e) {
                    var slat = startMarker.getLatLng().lat;
                    var slng = startMarker.getLatLng().lng;
                    rStart = slat + ',' + slng;
                    engineReverse1.reverseGeocode([slat, slng]);
                });
                viaMarker.on('moveend', function(e) {
                    var vlat = viaMarker.getLatLng().lat;
                    var vlng = viaMarker.getLatLng().lng;
                    rVia = vlat + ',' + vlng;
                    engineReverse2.reverseGeocode([vlat, vlng]);
                });
                endMarker.on('moveend', function(e) {
                    var elat = endMarker.getLatLng().lat;
                    var elng = endMarker.getLatLng().lng;
                    rEnd = elat + ',' + elng;
                    engineReverse3.reverseGeocode([elat, elng]);
                });
            } else if (snappedMarkers.length == 2) {
                startMarker = L.marker([snappedMarkers[0][1], snappedMarkers[0][0]], {
                    icon: startIcon,
                    draggable: "true",
                });
                endMarker = L.marker([snappedMarkers[1][1], snappedMarkers[1][0]], {
                    icon: endIcon,
                    draggable: "true",
                });
                startMarker.addTo(mymap), endMarker.addTo(mymap);
                startMarker.bindPopup(startAddress);
                endMarker.bindPopup(endAddress);

                startMarker.on('moveend', function(e) {
                    var slat = startMarker.getLatLng().lat;
                    var slng = startMarker.getLatLng().lng;
                    rStart = slat + ',' + slng;
                    // changeMarkerAddress(1, slat, slng);
                    engineReverse1.reverseGeocode([slat, slng]);
                    calcRoute();
                });
                endMarker.on('moveend', function(e) {
                    var elat = endMarker.getLatLng().lat;
                    var elng = endMarker.getLatLng().lng;
                    rEnd = elat + ',' + elng;
                    engineReverse3.reverseGeocode([elat, elng]);
                    // changeMarkerAddress(3, elat, elng);
                    calcRoute();
                });
            }
            var pLatLng = new Array();
            $.each(data.points.coordinates, function(key, val) {
                pLatLng.push([val[1], val[0]]);
            });
            routeLine = L.polyline(pLatLng, {
                color: 'red'
            }).addTo(mymap);
            mymap.fitBounds(routeLine.getBounds());
        }

        function correctDistance(distance, fc) {
            if ($("#unit").val() == 1) {
                if (distance > 100) {
                    //document.getElementById("distancia").value = distance = (distance / 1000).toFixed(3);

                    distance = (distance / 1000).toFixed(fc);



                } else {
                    distance = distance.toFixed(0) + ' m';
                }
            } else if ($("#unit").val() == 2) {

                // document.getElementById("distancia").value = distance = (distance * 0.000621371192).toFixed(fc) + ' ml';

                distance = (distance * 0.000621371192).toFixed(fc);

            }
            return distance;
        }

        function correctTime(time) {
            var rTime = '';
            var d, h, m, s;
            s = Math.floor(time / 1000);
            m = Math.floor(s / 60);
            s = s % 60;
            h = Math.floor(m / 60);
            m = m % 60;
            d = Math.floor(h / 24);
            h = h % 24;
            if (d != 0) {
                if (d > 1) {
                    rTime += d + ' dias ';
                } else {
                    rTime += d + ' dia ';
                }
            }
            if (h != 0) {
                if (h > 1) {
                    rTime += h + ' horas ';
                } else {
                    rTime += h + ' hora ';
                }
            }
            if (m != 0) {
                if (m > 1) {
                    rTime += m + ' minutos ';
                } else {
                    rTime += m + ' min ';
                }
            }
            return rTime;
        };

        function displayInstructions(instr) {
            var instrTable = '<table>';
            instrTable += '<tr class="instr_point"><td class="instr_icon_marker"><img src="assets/css/img/marker-icon-green.png" /></td><td colspan="4"><div id="startMInstr">' + startAddress + '</div></td><td class="instr_icon_marker"></td></tr>';
            instrTable += '<tr class="instr_row"><td></td><td colspan="4">' + correctDistance(instr.distance, 0) + '. Aproximadamente ' + correctTime(instr.time) + '</td><td></td></tr>';
            var tiempo = document.querySelector('#tiempo').value = correctTime(instr.time) + ' Aprox.';
            var distnacia = document.querySelector('#distancia').value = correctDistance(instr.distance, 0);

            $.each(instr.instructions, function(key, val) {
                if (val.sign == 5) {
                    instrTable += '<tr class="instr_point"><td class="instr_icon_marker"><img src="assets/css/img/marker-icon-red.png" /></td><td colspan="4"><div id="viaMInstr">' + viaAddress + '</div></td><td class="instr_icon_marker"></td></tr>';
                } else if (val.sign == 4) {
                    instrTable += '<tr class="instr_point"><td class="instr_icon_marker"><img src="assets/css/img/marker-icon-blue.jpg" /></td><td colspan="4"><div id="endMInstr">' + endAddress + '</div></td><td class="instr_icon_marker"></td></tr>';
                } else if (val.sign == 0) {
                    instrTable += '<tr class="instr_row"><td></td><td></td><td>' + (parseInt(key) + 1) + '.</td><td>' + val.text + '</td><td>' + correctDistance(val.distance, 1) + '</td><td></td></tr>';
                } else {
                    instrTable += '<tr class="instr_row"><td></td><td class="instr_icon_col"><img src="assets/css/img/' + signIcon[val.sign] + '" /></td><td>' + (parseInt(key) + 1) + '.</td><td>' + val.text + '</td><td>' + correctDistance(val.distance, 1) + '</td><td></td></tr>';
                }
            });
            instrTable += '</table>';
            return instrTable;
        }
    </script>
    <style>
        .instr_point {
            background: #eee;
            border: 1px solid silver;
            margin: 10px 0;
            font-weight: bold;
        }

        .instr_icon_marker,
        .instr_icon_marker img {
            width: 25px;
            height: 41px;
        }

        .instr_icon_col img {
            height: 24px;
        }

        .instr_row td {
            border-top: 1px solid #cdcdcd;
            margin: 0;
            padding: 10px 5px;
            vertical-align: top;
        }

        #startMInstr,
        #viaMInstr,
        #endMInstr {
            cursor: pointer;
        }

        .tt-menu {
            z-index: 9999 !important;
        }
    </style>
    <style>
        @media print {
            .noprint {
                display: none;
            }

            img {
                max-width: none !important;
            }
        }
    </style>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({
            google_ad_client: "ca-pub-3593449959602413",
            enable_page_level_ads: true
        });
    </script>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({
            google_ad_client: "ca-pub-3593449959602413",
            enable_page_level_ads: true
        });




        /**/
    </script>
    <div id="sidebar">
        <div class="toggle-btn">
            <span>&#9776</span>
        </div>
        <ul>

            <li>
                <img src="../partials/img/logo1.png" alt="Logo " class="logo">
            </li>
            <li>
                <a style="width:40px;height:38px" value="Buscar mi ubicación" class="btn btn-dark" onclick="getAddressByLocation();">
                    <i class="fas fa-map-marker-alt"></i>
                </a>
                <a href="Index.html" style="width:40px;height:38px" class="btn btn-dark">
                    <i class="fas fa-map-marker-edit"></i>
                </a>
                <a href="Index.html" style="width:40px;height:38px" class="btn btn-dark">
                    <i class="fas fa-redo-alt"></i>
                </a>

            </li>
            <li>




                <form onSubmit="getRoute();return false;" id="routeForm" class="form-horizontal" role="form">


                    <input type="submit" style="width:200px;height:30px" name="positionbtn" id="positionbtn" value="Calcular Ruta" class="btn btn-dark">

                </form>
                <form action="ConsumoDatos.php" method="POST">

                    <input type="text" id="routeStart" class="form-control" name="origen" placeholder="Ingrese Origen" style="width:200px;height:30px" autocomplete="off">
                    <br />
                    <input type="text" id="routeEnd" class="form-control" name="destino" placeholder="Ingrese Destino" style="width:200px;height:30px" autocomplete="off">
                    <br />
                    <input type="text" id="routeVia" class="form-control" name="routeVia" placeholder="Vía Opcional" style="width:200px;height:30px" autocomplete="off" />
                    <br /> <br />
                    <?php
                    require("../Datos/Conexion.php");
                    $response = $conn->prepare("SELECT * FROM tarifa");
                    $response->execute();
                    ?>

                    <select name="TipoVehiculo" id="TipoVehiculo" onchange="dato(this);" style="width:200px;height:30px" class="form-control">
                        <option Selected value="Selecciona">Selecciona Tarifa...</option>
                        <?php
                        foreach ($response as $r) {

                            echo "<option  disabled class='text-success'  >" . $r['TipoVehiculo'] . ":" . "</option>";
                            echo  "
                                <option class='text-danger' value=" . $r[0] . "  >" . $r['TasaBasica'] . "</option>";
                        } ?>
                    </select>
                    <br>
                    <div class="input-group">
                        <div class="input-group-append">
                            <input type="text" id="distancia" name="distancia" placeholder="Distancia" readonly class="form-control" style="width:172px;height:30px" onkeyup="sum()" class="form-control" aria-label="Amount (to the nearest dollar)">

                            <span class="input-group-text">km</span>
                        </div>
                    </div>
                    <input type="hidden" id="tarifa" name="tarifa" class="form-control" style="width:200px;height:30px" onkeyup="sum()">
                    <input type="hidden" id="totalP">

                    <input type="text" name="tiempo" id="tiempo" placeholder="Tiempo " readonly class="form-control" style="width:200px;height:30px"><br />
                    <input type="datetime-local" id="datetime" name="datetime" style="width:200px;height:30px">


                    <br><br>
                    <input type="submit" style="width:200px;height:30px" value="Tomar Ruta" class="btn btn-dark">



                </form>

            </li>
            <li>
                <a href="CrudRuta/DetallesRuta.php" class="btn btn-warning">IR A ÚLTIMA RESERVA
                    <i class="fas fa-calendar-plus"></i></a>
            </li>

        </ul>


    </div>
    <!--llenar un input por medio de un select -->
    <script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script type="text/javascript">
        function dato(inputSelect) {
            document.getElementById("tarifa").value = inputSelect.options[inputSelect.selectedIndex].text;
         

        }
    </script>


    <script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script type="text/javascript">
        function sum() {
            var distancia = document.getElementById("distancia").value;
            var tarifa = document.getElementById("tarifa").value;
            var result = parseInt(distancia) * parseInt(tarifa);
            if (!isNaN(result)) {
                document.getElementById("totalP").value = result;
            }else{
                alert(ERRROR);
            }
        }
    </script>




    <div class="col-md-12" style="font-size: 18px; margin-bottom: 12px; margin-top: 10px">
        <div id="d_dist" style="margin-bottom: 5px"></div>
        <div id="d_time"></div>
    </div>
    <div id="map_container" style="height:1800px; width:1000px;">

       
            <div id="map_canvas" style="height:550px; width:1037px;"></div>
        </div>
    </div>
    <div class="info">
        <div class="col-md-12" style="text-align: center">
            <div id="directionsPanel">
                <span class="noprint">Ingresa los detalles de tu viaje aquí arriba y haz clic en "Calcular Ruta".</span>
            </div>
        </div>
        <div align="center" style="margin-bottom: 15px">
            <input class="noprint" type="button" onClick="window.print()" value="Imprimir Direcciones" id="printDir" />
        </div>
        <section>
    </div>

    <div class="contenidoP">



        <br />
        <h5 style="color:#000;">Ajustes:</h5>
        <select id="unit" class="form-control" style="width:200px;height:30px">
            <option selected="selected" value="1">Kilómetro</option>
            <option value="2">Millas</option>
        </select>
        <select id="highways" class="form-control" style="width:200px;height:30px">
            <option selected="selected" value="1">De acuerdo</option>
            <option value="1">Evitar</option>
        </select>
        <select id="tolls" class="form-control" style="width:200px;height:30px">
            <option selected="selected" value="1">De acuerdo</option>
            <option value="2">Evitar</option>
        </select>

        <select id="travelMode" class="form-control" style="width:200px;height:30px">
            <option selected="selected" value="1">Conduciendo</option>
            <option value="2">En bicicleta</option>
            <option value="3">Caminando</option>
        </select>


    </div>




    <script src="assets/js/leaflet.js"></script>
    <link rel="stylesheet" href="assets/css/leaflet.css" />
    <script src="assets/js/esri-leaflet.js"></script>
    <link rel="stylesheet" href="assets/css/typeaheadjs.css" />
    <script src="assets/js/typeahead.bundle.js"></script>
    <script src="assets/js/typeahead-address-photon.min.js"></script>
    <script src="assets/js/url-search-params.js"></script>
    <!-- Go to www.addthis.com/dashboard to customize your tools
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5713eebbca8e7775"></script>-->

    <style>
        body {
            /*colocar imagen en un body */
            /* background-image: url(assets/img/slider2.jpg);

        */
            background: #fff;
        }

        #travelMode {
            position: relative;
            right: -1000px;
            top: -133px;
        }

        #map_container {
            position: relative;
            top: -3px;
            right: -270px;
            background: #fff;
            width: 700px;
        }

        #mover {
            position: relative;
            top: -918px;
            right: -98px;
        }

        .info {
            position: absolute;
            top: 722px;
            left: 330px;
        }

        * {
            margin: 0px;
            padding: 0px;
        }

        #sidebar {
            position: fixed;
            width: 220px;
            height: 100%;
            background: #fff;
            left: -220px;
            transition: all 500ms linear;
        }

        #sidebar.active {
            left: 0px;
        }

        #sidebar ul li {
            color: rgba(230, 230, 230, .9);
            list-style: none;
            padding: 15px 10px;
            border-bottom: 1px solid rgba(100, 100, 100, .3);
            text-align: center;
        }

        .logo {
            display: block;
            margin: 0 auto;
        }

        #sidebar .toggle-btn {
            position: absolute;
            left: 230px;
            top: 20px;
            cursor: pointer;
        }

        #sidebar .toggle-btn span {
            display: block;
            width: 40px;
            text-align: center;
            font-size: 30px;
            border: 3px solid #000;
        }
    </style>

    <script type="text/javascript">
        // sidebar toggle
        const btnToggle = document.querySelector('.toggle-btn');

        btnToggle.addEventListener('click', function() {
            console.log('clik')
            document.getElementById('sidebar').classList.toggle('active');
            console.log(document.getElementById('sidebar'))
        });
    </script>