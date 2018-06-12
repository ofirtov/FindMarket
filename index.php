<!DOCTYPE html>
<html>
<head>
    <title>Find the market with the best location next to you</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link type="text/css" rel="stylesheet" href="style.css">
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCGU0PK5ks0K4jqqAZ6l2A6FKWUknklPkM&libraries=places&callback=initAutocomplete"
            async defer></script>
    <!-- API keys
     AIzaSyDXvdByHYIUrNGQ9KyHjLAmc9lDePopXuU
    AIzaSyCGU0PK5ks0K4jqqAZ6l2A6FKWUknklPkM
    -->
</head>

<body>
<!--  Google autocomplete search form and display table -->
<div class="jumbotron">
    <div id="locationField" class="form-group">
        <form action="">
            <input id="autocomplete" class="form-control" placeholder="Enter your address"
                   onFocus="geolocate()" type="text">
            <button type="submit" id="submit" name="submit">Send location</button>
        </form>
    </div>

    <table id="address" class="table table-responsive" style="margin-top: 20px">
        <tr>
            <td class="label">Street address</td>
            <td class="slimField"><input class="field form-control" id="street_number" disabled="true"></td>
            <td class="wideField" colspan="2"><input class="field form-control" id="route" disabled="true"></td>
        </tr>
        <tr>
            <td class="label">City</td>
            <td class="wideField" colspan="3"><input class="field form-control" id="locality" disabled="true"></td>
        </tr>
        <tr>
            <td class="label">State</td>
            <td class="wideField"><input class="field form-control" id="administrative_area_level_1" disabled="true">
            </td>
            <td class="label">Zip code</td>
            <td class="slimField"><input class="field form-control" id="postal_code" disabled="true"></td>
        </tr>
        <tr>
            <td class="label">Country</td>
            <td class="wideField" colspan="3"><input class="field form-control" id="country" disabled="true"></td>
        </tr>
    </table>

    <!-- Get location Modal -->
    <div class="modal fade" id="locationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Check my location</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" id="modal_location_form">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="modal_address">Address</label>
                                    <input type="text" class="form-control" id="modal_address" name="address">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="modal_street_number">Street Number</label>
                                    <input type="text" class="form-control" id="modal_street_number"
                                           name="street_number">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="modal_city">City</label>
                                    <input type="text" class="form-control" id="modal_city" name="city">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="modal_zipcode">Zip Code</label>
                                    <input type="text" class="form-control" id="modal_zipcode" name="zipcode">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="modal_country">Country</label>
                                    <input type="text" class="form-control" id="modal_country" name="country">
                                </div>
                            </div>
                        </div>
                        <button id="updateLocationModal" type="submit" name="update" class="btn btn-info">Update
                            Location
                        </button>
                        <button id="reset" type="reset" name="reset" class="btn btn-danger">Reset</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <form action="" id="marketsForm">
        <button type="button" class="btn btn-primary sendLocation" id="submit" name="submit">Send Location</button>
        <button type="button" class="btn btn-success showMarkets" id="show" name="show">Show Available Markets</button>
    </form>

    <div id="marketsTable"></div>
    <div id="showMarketsHeading"></div>
    <div id="showAllMarkets"></div>

</div>

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<!-- JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
<script src="gPlaces.js"></script>

<!-- jQuery scripts, can be in a separate .js file -->
<!-- Pass data to Modal inputs -->
<script>
    $(document).ready(function () {
        $(document).on('click', '.sendLocation', function () {
            var address = $('#route').val();
            var street_number = $('#street_number').val();
            var city = $('#locality').val();
            var zipcode = $('#postal_code').val();
            var country = $('#country').val();

            $('#modal_address').val(address);
            $('#modal_street_number').val(street_number);
            $('#modal_city').val(city);
            //$('#modal_location_id').text(id);
            $('#modal_zipcode').val(zipcode);
            $('#modal_country').val(country);
            $('#locationModal').modal('toggle');

            $(document).on('click', '#updateLocationModal', function (e) {
                e.preventDefault();
                var modal_address = $('#modal_address').val();
                var modal_street_number = $('#modal_street_number').val();
                var modal_city = $('#modal_city').val();
                var modal_country = $('#modal_country').val();
                var current_location = modal_address + ' ' + modal_street_number + ' ' + modal_city + ' ' + modal_country;
                console.log("Current location: ", current_location);

                $.ajax({
                    url: 'getMarketLocation.php',
                    method: 'POST',
                    dataType: "json",

                    success: function (data) {
                        $('#locationModal').modal('hide');

                        /**  start of distance calculation **/

                        // Calculate distance
                        function calculateDistance() {
                            var origin = current_location;
                            var allDestination = [];
                            for (var i = 0; i < data.length; i++) {
                                allDestination.push(data[i].name + ' ' + data[i].address + ' ' + data[i].street_number + ' ' + data[i].city);
                            }
                            //console.log(allDestination);
                            var service = new google.maps.DistanceMatrixService();
                            service.getDistanceMatrix(
                                {
                                    origins: [origin],
                                    destinations: allDestination,
                                    travelMode: google.maps.TravelMode.DRIVING,
                                    // unitSystem: google.maps.UnitSystem.IMPERIAL, // miles and feet.
                                    unitSystem: google.maps.UnitSystem.metric, // kilometers and meters.
                                    avoidHighways: false,
                                    avoidTolls: false
                                }, callback);
                        }

                        // Get distance results
                        function callback(response, status) {
                            if (status != google.maps.DistanceMatrixStatus.OK) {
                                $('#result').html(status);
                            } else {
                                var origin = response.originAddresses[0];
                                var destination = response.destinationAddresses[0];
                                if (response.rows[0].elements[0].status === "ZERO_RESULTS") {
                                    $('#result').html("Better get on a plane. There are no roads between " + origin + " and " + destination);
                                } else {
                                    // Enter all distances to an array
                                    var distanceArray = [];
                                    var distanceAndName = [];
                                    var megaDistance = 0;
                                    var shufersalDistance = 0;
                                    var ramileviDistance = 0;
                                    var victoryDistance = 0;
                                    for (var j = 0; j < data.length; j++) {
                                        distanceArray.push(response.rows[0].elements[j]);
                                        //Check the cumulative distance of each market brand
                                        distanceAndName[j] = {
                                            name: data[j]["name"],
                                            distance: response.rows[0].elements[j],
                                            address: data[j].address,
                                            street_number: data[j].street_number,
                                            city: data[j].city
                                        };
                                        if (distanceAndName[j].name === "MEGA") {
                                            megaDistance += distanceAndName[j].distance.distance.value;
                                        }
                                        else if (distanceAndName[j].name === "Shufersal") {
                                            shufersalDistance += distanceAndName[j].distance.distance.value;
                                        }
                                        else if (distanceAndName[j].name === "Rami Levy") {
                                            ramileviDistance += distanceAndName[j].distance.distance.value;
                                        }
                                        else if (distanceAndName[j].name === "Victory") {
                                            victoryDistance += distanceAndName[j].distance.distance.value;
                                        }
                                    }
                                    var totalDistance = [
                                        {name: "MEGA", distance: megaDistance},
                                        {name: "Shufersal", distance: shufersalDistance},
                                        {name: "Rami_Levi", distance: ramileviDistance},
                                        {name: "Victory", distance: victoryDistance}
                                    ];
                                    totalDistance.sort(function (a, b) {
                                        return a.distance - b.distance
                                    });
                                    console.log(totalDistance);

                                    //Arrange distance array in Ascending order and display in a Table
                                    var sortedDistance = distanceAndName.sort(function (a, b) {
                                        return a.distance.distance.value - b.distance.distance.value
                                    });
                                    var marketsTable = '<div class="alert alert-warning">' +
                                        '<div class="row">' +
                                        '<div class="col-md-8">' +
                                        "The closest market to your location is: " + '<strong>' + sortedDistance[0].name + '</strong>' +
                                        " The distance is " + '<strong>' + sortedDistance[0].distance.distance.text + '</strong>' + " " +
                                        "Takes approx. " + '<strong>' + sortedDistance[0].distance.duration.text + '</strong>' + " by car" +
                                        '</div>' +
                                        '</div>' +
                                        '</div>' +
                                        '<div class="alert alert-primary">' +
                                        '<div class="row">' +
                                        '<div class="col-md-8">' +
                                        "The market with the best branch distribution in your area is: " + '<strong>' + totalDistance[0].name + '</strong>' +
                                        '</div>' +
                                        '</div>' +
                                        '</div>' +
                                        '<table class="table table-bordered table-striped table-responsive">' +
                                        '<thead class="thead-dark">' +
                                        '<tr>' +
                                        '<th>Name</th>' +
                                        '<th>Address</th>' +
                                        '<th>street Number</th>' +
                                        '<th>City</th>' +
                                        '<th>Distance</th>' +
                                        '</tr>' +
                                        '</thead>';

                                    for (var x = 0; x < sortedDistance.length; x++) {
                                        console.log(sortedDistance[x]);
                                        marketsTable += '<tr>' +
                                            '<td>' + sortedDistance[x].name + '</td>' +
                                            '<td>' + sortedDistance[x].address + '</td>' +
                                            '<td>' + sortedDistance[x].street_number + '</td>' +
                                            '<td>' + sortedDistance[x].city + '</td>' +
                                            '<td>' + sortedDistance[x].distance.distance.text + '</td>' +
                                            '</tr>'

                                    }
                                    marketsTable += '</table>';
                                    $('#marketsTable').html(marketsTable);
                                    console.log("The closest market is " + sortedDistance[0].name + " The distance is ", sortedDistance[0].distance.distance.text + " " + "Takes approx. ", sortedDistance[0].distance.duration.text);
                                }
                            }
                        }

                        calculateDistance();

                        /** End of distance calculation **/
                    }
                });
            });
        });

        // Show all Markets from DB in a table
        $(document).on('click', '#show', function () {
            $('#showMarketsHeading').append('<h1>Market List</h1>');
            $('#showAllMarkets').load('showMarkets.php');
        });
    });
</script>
</body>
</html>