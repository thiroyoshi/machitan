<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
<script type="text/javascript">
    var directionsDisplay;
    var directionsService = new google.maps.DirectionsService();
    var map;

function initialize() {
  directionsDisplay = new google.maps.DirectionsRenderer();
  var center = new google.maps.LatLng(35.5643,139.654);
  var mapOptions = {
    zoom: 9,
    center: center
  }
  map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
  directionsDisplay.setMap(map);
}

function calcRoute() {
  var start = '<?php echo $start_lat . "," . $start_lng ?>';
  var end = '<?php echo $end_lat . "," . $end_lng ?>';
  var waypts = [];
      <?php
      for ($i = 0; $i < $num_of_waypoints ; $i++){
      echo "waypts.push({";
      echo "      location: '$waypoints[$i]',";
      echo "      stopover:true";
      echo "});";
      }
      ?>
      
  var request = {
      origin: start,
      destination: end,
      waypoints: waypts,
      optimizeWaypoints: true,
      travelMode: google.maps.TravelMode.DRIVING
  };
  directionsService.route(request, function(response, status) {
    if (status == google.maps.DirectionsStatus.OK) {
      directionsDisplay.setDirections(response);
      /*
        var route = response.routes[0];
      var summaryPanel = document.getElementById('directions_panel');
      summaryPanel.innerHTML = '';
      // For each route, display summary information.
      for (var i = 0; i < route.legs.length; i++) {
        var routeSegment = i + 1;
        summaryPanel.innerHTML += '<b>Route Segment: ' + routeSegment + '</b><br>';
        summaryPanel.innerHTML += route.legs[i].start_address + ' to ';
        summaryPanel.innerHTML += route.legs[i].end_address + '<br>';
        summaryPanel.innerHTML += route.legs[i].distance.text + '<br><br>';
      }*/
    }
  });
 }

    google.maps.event.addDomListener(window, 'load', initialize);

    $(document).ready(function () {
        setTimeout(function(){calcRoute()},500);
    
    });
    
    window.onload = function(){
     /*
        var mapHight = document.write(window.innerHight) * 0.8;
        var mapWidth = document.write(window.innerWidth) * 0.8;
        
        //document.getElementById('map-canvas').style.hight = mapHight;
        //document.getElementById('map-canvas').style.width = mapWidth;
        
        alert(mapHight);
        $('div#map-canvas').attr('width', 100);
       */
    }
    
    var showedAlert = false;
    $(window).on('load resize', function(){
        var w = $(window).width() * 0.9;
        $('div#map-canvas').attr('width', w);
        
        if(!showedAlert){
            sweetAlert("ゴールに到着しました！", "おめでとうございます！ツアーの結果を確認しましょう！", "success");
            showedAlert = true;
        }
    });
    
</script>
<div class="container">

    <div class="panel panel-info" id="about-info">
        <div class="panel-heading"><span class="glyphicon glyphicon-info-sign"></span>　今のお散歩コース</div>
        <div class="panel-body">
               <div id="map-canvas" style="height:400px;"></div>
        </div>
    </div>
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-info" id="about-info">
            <div class="panel-heading"><span class="glyphicon glyphicon-info-sign"></span>　今回のぶらりスコア</div>
            <div class="panel-body" style="text-align:center">
            <h3><?php echo $direction_score;?></h3>
            </div>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="panel panel-info" id="about-info">
            <div class="panel-heading"><span class="glyphicon glyphicon-info-sign"></span>　今回の総移動距離</div>
            <div class="panel-body" style="text-align:center">
            <h3><?php echo $total_distance;?>m</h3>
            </div>
        </div>
    </div>
</div>

    <!--
    <div class="panel panel-info" id="about-info">
        <div class="panel-heading"><span class="glyphicon glyphicon-info-sign"></span>　今のお散歩コースはいかがでしたか？</div>
        <div class="panel-body">
            <p>5（最高！）〜1（おもしろくなかった…）で評価してください</p>
        <div class="basic" data-average="12" data-id="1"></div>
        </div>
    </div>
    -->

    <div style="text-align:center;">
        <a class="btn btn-info btn-lg" href="/" style="width:100%;">もう一度ぶらりする</a>
    </div>
    <br>

</div>
