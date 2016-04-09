<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Game of code 2016</title>
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../bower_components/ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="../../assets/css/main.css">
  <script src="http://maps.googleapis.com/maps/api/js"></script>
  <script type="text/javascript" src="https://inorganik.github.io/countUp.js/dist/countUp.js"></script>
</head>

<body data-spy="scroll" data-target="#site-nav">
  <nav id="site-nav" class="navbar navbar-fixed-top navbar-custom">
    <div class="container">
      <div class="navbar-header">
        <!-- logo -->
        <div class="site-branding">
          <a class="logo" href="index.html">
            <!-- logo image  -->
            <!-- <img src="../../assets/images/logo.png" alt="Logo"> -->
            Game of code 2016
          </a>
        </div>
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-items" aria-expanded="false">
          <span class="sr-only">Test</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>
      <!-- /.navbar-header -->
      <div class="collapse navbar-collapse" id="navbar-items">
        <ul class="nav navbar-nav navbar-right">
          <!-- navigation menu -->
          <li class="active"><a data-scroll href="#about">Index</a></li>
          <li><a data-scroll href="#speakers">Truc</a></li>
        </ul>
      </div>
    </div>
    <!-- /.container -->
  </nav>
  <header id="site-header" class="site-header valign-center">
    <div class="intro">
      <h2><i class="ion-android-walk"></i> Walk ?  <i class="ion-android-bicycle"></i> Veloh ?  <i class="ion-android-bus"></i> Bus ?</h2>
      <h1>Find the best way to travel into Luxembourg</h1>
      <a class="btn btn-white" data-scroll href="#closestation">Test Now !</a>
    </div>
  </header>
  <section id="about" class="section about">
    <div class="container">
      <div class="row">
        <div class=".col-xs-4 .col-sm-8 .col-md-6 .col-md-offset-3">
          <h3 class="section-title multiple-title">What is Our Goal?</h3>
          <p class="text-center">Make your everyday life easier</p>
          <p class="text-center">
            <b>Find the closest and fastest way to travel.</b>
            <br>
            <b>Use your location to provide a plan to your destination.</b>
            <br>
            <b>Real time avaible Veloh per Station</b>
            <br>
            <b>Real time Bus timing</b>
            <br>
          </p>
        </div>
        <!-- /.col-sm-6 -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container -->
  </section>
  <section id="facts" class="section bg-image-1 facts text-center">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <i class="ion-android-bicycle"></i>
          <h3><div id="velo"></div><br>Veloh available</h3>
        </div>
        <div class="col-md-4">
          <i class="ion-ios-location"></i>
          <h3><div id="station"></div><br>Veloh station</h3>
        </div>
        <div class="col-md-4">
          <i class="ion-android-bus"></i>
          <h3><div id="bus"></div><br>Bus Stop</h3>
        </div>
        <script>
          var easingFn = function(t, b, c, d) {
            var ts = (t /= d) * t;
            var tc = ts * t;
            return b + c * (tc * ts + -5 * ts * ts + 10 * tc + -10 * ts + 5 * t);
          }
          var options = {
            useEasing: true,
              easingFn: easingFn,
              useGrouping: true,
              separator: ',',
              decimal: '.'
          }
          var velo = new CountUp("velo", 0, <?php echo get_all_velo(); ?>, 0, 2, options);
          var station = new CountUp("station", 0, <?php echo get_total_station(); ?>, 0, 2, options);
          var bus = new CountUp("bus", 0, 800, 0, 2, options);
          velo.start();
          station.start();
          bus.start();
        </script>
      </div>
      <!-- row -->
    </div>
    <!-- container -->
  </section>

  <section id="closestation" class="section registration">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h3 class="section-title">Find the closest station</h3>
        </div>
      </div>
      <form action="index.php#closestation" method="post" >
        <div class="row">
          <div class="col-md-12" id="registration-msg" style="display:none;">
            <div class="alert"></div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Latitude" id="llat" name="latitude" required>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Longitude" id="flong" name="longitude" required>
            </div>
          </div>
          <div class="text-center mt20">
            <button type="submit" class="btn btn-black" >Find</button>
	    </div>
	    </form>
	    </div>
	    <div class="container col-md-12">
	    <br>
<!--	    <script>
	    var myCenter = new google.maps.LatLng(<?php echo $_POST['latitude'].', '.$_POST['longitude']; ?>);
var station = new google.maps.LatLng(<?php echo $data[0]['latitude'].', '.$data[0]['longitude']; ?>);

          function initialize() {
            var mapProp = {
              center: myCenter,
              zoom: 12,
              mapTypeId: google.maps.MapTypeId.ROADMAP
            };

            var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);

            var marker = new google.maps.Marker({
              position: myCenter,
            });
            var marker2 = new google.maps.Marker({
              position: station,
            });

            marker.setMap(map);
            marker2.setMap(map);
          }

          google.maps.event.addDomListener(window, 'load', initialize);
        </script>
        <div id="googleMap" style="width:100%;height:450px;"></div>-->
        <div id="map"></div>
        <script>
      function initMap() {
        var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer;
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 7,
          center: {lat: 6.85, lng: 46.65}
        });
        directionsDisplay.setMap(map);

        var onChangeHandler = function() {
          calculateAndDisplayRoute(directionsService, directionsDisplay);
        };
        /*document.getElementById('start').addEventListener('change', onChangeHandler);
        document.getElementById('end').addEventListener('change', onChangeHandler);*/
      }

      function calculateAndDisplayRoute(directionsService, directionsDisplay) {
        directionsService.route({
          origin: google.maps.LatLng(6.85,46.65),
          destination: google.maps.LatLng(6.86, 46.65),
          travelMode: google.maps.TravelMode.DRIVING
        }, function(response, status) {
          if (status === google.maps.DirectionsStatus.OK) {
            directionsDisplay.setDirections(response);
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDyASVb6Re14qqRDWDxs7PJ3mmouNCxIfs&callback=initMap">
    </script>
      </div>
  </section>
  <section id="contribution" class="section bg-image-2 contribution">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h3 class="text-uppercase mt0 font-400">Health</h3>

          <p>For 1 miles using a car: 0.099 kg/km CO2 rejected, using a bus: 0.014 kg/km CO2 rejected</p>
          <p>Using VeloH you loose approximately 40 calories per miles</p>

        </div>
      </div>
    </div>
  </section>

  <section id="schedule" class="section schedule">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h3 class="section-title">Event Schedule</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 col-sm-6">
          <div class="schedule-box">
            <div class="time">
              <time datetime="09:00">09:00 am</time> -
              <time datetime="22:00">10:00 am</time>
            </div>
            <h3>Welcome and intro</h3>
            <p>Mustafizur Khan, SD Asia</p>
          </div>
        </div>
        <div class="col-md-4 col-sm-6">
          <div class="schedule-box">
            <div class="time">
              <time datetime="10:00">10:00 am</time> -
              <time datetime="22:00">10:00 am</time>
            </div>
            <h3>Tips and share</h3>
            <p>Mustafizur Khan, SD Asia</p>
          </div>
        </div>
        <div class="col-md-4 col-sm-6">
          <div class="schedule-box">
            <div class="time">
              <time datetime="10:00">10:00 am</time> -
              <time datetime="22:00">10:00 am</time>
            </div>
            <h3>View from the top</h3>
            <p>Mustafizur Khan, SD Asia</p>
          </div>
        </div>
      </div>
  </section>

  <section id="partner" class="section partner">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h3 class="section-title">Event Partner</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3">
          <a class="partner-box partner-box-1"></a>
        </div>
        <div class="col-sm-3">
          <a class="partner-box partner-box-2"></a>
        </div>
        <div class="col-sm-3">
          <a class="partner-box partner-box-3"></a>
        </div>
        <div class="col-sm-3">
          <a class="partner-box partner-box-4"></a>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-3">
          <a class="partner-box partner-box-5"></a>
        </div>
        <div class="col-sm-3">
          <a class="partner-box partner-box-6"></a>
        </div>
        <div class="col-sm-3">
          <a class="partner-box partner-box-7"></a>
        </div>
        <div class="col-sm-3">
          <a class="partner-box partner-box-8"></a>
        </div>
      </div>
  </section>

  <section id="faq" class="section faq">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h3 class="section-title">Event FAQs</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

            <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="headingOne">
                <h4 class="panel-title">
                                    <a class="faq-toggle collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne"> What is the price of the ticket ?</a>
                                </h4>
              </div>

              <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
                  <h3>Hello</h3>
                  <p>Lorem Ipsum</p>
                </div>
              </div>
            </div>

            <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="headingTwo">
                <h4 class="panel-title">
                                    <a class="faq-toggle collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"> What is included in my ticket ?</a>
                                </h4>
              </div>

              <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                <div class="panel-body">Hello</div>
              </div>
            </div>

            <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="headingThree">
                <h4 class="panel-title">
                                    <a class="faq-toggle collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree"> Office address ?</a>
                                </h4>
              </div>

              <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                <div class="panel-body">Hello</div>
              </div>
            </div>

            <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="headingFour">
                <h4 class="panel-title">
                                    <a class="faq-toggle collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour"> How should I dress ?</a>
                                </h4>
              </div>

              <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                <div class="panel-body">Hello</div>
              </div>
            </div>

            <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="headingFive">
                <h4 class="panel-title">
                                    <a class="faq-toggle collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive"> I have specific questions that are not addressed here. Who can help me ?</a>
                                </h4>
              </div>

              <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
                <div class="panel-body">Hello</div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </section>

  <section id="photos" class="section photos">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h3 class="section-title">Photos</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <ul class="grid">

            <li class="grid-item grid-item-sm-6">
              <img alt="" class="img-responsive center-block" src="assets/images/photos/photos-1.jpg">
            </li>

            <li class="grid-item grid-item-sm-3">
              <img alt="" class="img-responsive center-block" src="assets/images/photos/photos-2.jpg">
            </li>

            <li class="grid-item grid-item-sm-3">
              <img alt="" class="img-responsive center-block" src="assets/images/photos/photos-3.jpg">
            </li>

            <li class="grid-item grid-item-sm-3">
              <img alt="" class="img-responsive center-block" src="assets/images/photos/photos-5.jpg">
            </li>

            <li class="grid-item grid-item-sm-3">
              <img alt="" class="img-responsive center-block" src="assets/images/photos/photos-6.jpg">
            </li>

            <li class="grid-item grid-item-sm-3">
              <img alt="" class="img-responsive center-block" src="assets/images/photos/photos-7.jpg">
            </li>

            <li class="grid-item grid-item-sm-3">
              <img alt="" class="img-responsive center-block" src="assets/images/photos/photos-8.jpg">
            </li>

            <li class="grid-item grid-item-sm-3">
              <img alt="" class="img-responsive center-block" src="assets/images/photos/photos-2.jpg">
            </li>

            <li class="grid-item grid-item-sm-3">
              <img alt="" class="img-responsive center-block" src="assets/images/photos/photos-3.jpg">
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <section id="location" class="section location">
    <div class="container">
      <div class="row">
        <div class="col-sm-3">
          <h3 class="section-title">Event Location</h3>
          <address>
                        <p>Eardenia<br> The Grand Hall<br> House # 08, Road #52, Street<br> Phone: +1159t3764<br> Email: example@mail.com</p>
                    </address>
        </div>
        <div class="col-sm-9">
          <!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d96706.50013548559!2d-78.9870674333782!3d40.76030630398601!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited+States!5e0!3m2!1sen!2sbd!4v1436299406518"
            width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>-->
        </div>
      </div>
    </div>
  </section>

  <footer class="site-footer">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <p class="site-info">Designed and
            <br> Developed by <a href="http://technextit.com">Technext Limited</a></p>
          <ul class="social-block">
            <li><a href=""><i class="ion-social-twitter"></i></a></li>
            <li><a href=""><i class="ion-social-facebook"></i></a></li>
            <li><a href=""><i class="ion-social-linkedin-outline"></i></a></li>
            <li><a href=""><i class="ion-social-googleplus"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>

  <!-- script -->
  <script src="bower_components/jquery/dist/jquery.min.js"></script>
  <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="bower_components/smooth-scroll/dist/js/smooth-scroll.min.js"></script>
  <script src="assets/js/main.js"></script>
</body>

</html>
