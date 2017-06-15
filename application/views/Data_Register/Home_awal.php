<?php
if ($_SERVER["SERVER_PORT"] != 443) {
    $redir = "Location: https://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
    header($redir);
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="<?php echo base_url()?>assets/images/TV.png"/>
  <title>Select Port ::</title>
  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url()?>assets/fonts/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo base_url()?>assets/css/animate.min.css" rel="stylesheet">
  <link href="<?php echo base_url()?>assets/css/style.css" rel="stylesheet">
  <!-- Custom styling plus plugins -->
  <link href="<?php echo base_url()?>assets/css/custom.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/maps/jquery-jvectormap-2.0.3.css" />
  <link href="<?php echo base_url()?>assets/css/icheck/flat/green.css" rel="stylesheet" />
  <link href="<?php echo base_url()?>assets/css/floatexamples.css" rel="stylesheet" type="text/css" />

  <script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
  <script src="<?php echo base_url()?>assets/js/nprogress.js"></script>

</head>
<body style="background:#f5f5f5;">

<!--div id="custom-bootstrap-menu" class="navbar navbar-default " role="navigation">
<div class="main_container">
  <div class="col-md-12 col-xs-12 col-sm-12" style="background:#004988;">
    <div class="container-fluid">
     <div class="navbar-header" style="background:none;"><a class="" href="<?php echo base_url();?>"><img class="col-md-offset-5 col-sm-offset-5 col-xs-offset-1" src="<?php echo base_url();?>assets/images/logo.png"></a>
       <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-menubuilder"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
       </button>
     </div>
     <div class="collapse navbar-collapse navbar-menubuilder">
      <ul class="nav navbar-nav navbar-right">
        <li style="background:#efefef;"><a href="<?php echo base_url();?>Login/Pegawai" style="color:#545454;font-size:15px;"><i class="fa fa-sign-in" aria-hidden="true" style="color:#545454;font-size:20px;"></i> Sign-In</a>
        </li>
      </ul>
     </div>
    </div>
  </div>
</div>
</div-->
<div class="col-middle"></div>
<div class="main_container">
  <div class="col-md-12 col-xs-12 col-sm-12">
    <div class="col-middle">
      <div class="text-center">
        <div class="">
        <img src="<?php echo base_url('assets/images/user_logo2.png');?>" class="img-circle" style="border:2px solid #fff;">
        </div>
        <p style="font-size:30px;">
          <i  class="fa fa-paper-plane" aria-hidden="true"></i> <small>Select your port</small>
        </p>
        <div class="col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4">
          <form method="post" action="<?php echo base_url().'Register'; ?>" class="">
            <div class="input-group">
              <select class="form-control" required name="port_select">
                <option value="">Select option..</option>
                <option value="Bali">Bali</option>
                <option value="Balikpapan">Balikpapan</option>
                <option value="Malang">Malang</option>
                <option value="Samarinda">Samarinda</option>
              </select>
              <span class="input-group-btn">
                <button class="btn btn-success">Sign Up</button>
              </span>
            </div>
          </form>
        </div>
      </div>
      <div class="text-center col-md-12  col-xs-12  col-sm-12">
        <!--a href="<?php echo base_url();?>Login/Pegawai" class="btn btn-primary"><i class="fa fa-sign-in"></i>&nbsp;&nbsp;Sign In</a-->
        <p>If you've signed up, please go to <b><a href="<?php echo base_url('Login');?>" style="">page login..</a></b></p>
      </div>
    </div>
  </div>
</div>



<!--div class="main_container">
  <div class="col-md-12 col-xs-12 col-sm-12">
    <div class="col-middle">
      <div class="text-center">
        <div class="mid_center">
        <img src="<?php echo base_url('assets/images/user_logo.png');?>" class="img-circle">
      </div>
        <p style="font-size:30px;">
          <i  class="fa fa-paper-plane" aria-hidden="true"></i> <small>Select your port</small>
        </p>
        <div class="mid_center">
          <form method="post" action="<?php echo base_url().'Register'; ?>">
          <div class="input-group">
            <select class="form-control" required name="port_select">
              <option value="">Select option..</option>
              <option value="Bali">Bali</option>
              <option value="Balikpapan">Balikpapan</option>
              <option value="Malang">Malang</option>
              <option value="Samarinda">Samarinda</option>
            </select>
            <span class="input-group-btn">
              <button class="btn btn-success">Go</button>
            </span>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div-->

  <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>

  <!-- gauge js -->
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/gauge/gauge.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/gauge/gauge_demo.js"></script>



  <script type="text/javascript" src="<?php echo base_url()?>assets/js/flot/jquery.flot.js"></script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/flot/jquery.flot.pie.js"></script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/flot/jquery.flot.orderBars.js"></script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/flot/jquery.flot.time.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/flot/date.js"></script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/flot/jquery.flot.spline.js"></script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/flot/jquery.flot.stack.js"></script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/flot/curvedLines.js"></script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/flot/jquery.flot.resize.js"></script>

  <!-- Datepicker jQuery Version 1.11.0 -->
  <script type="text/javascript" src="<?php echo base_url()?>assets/alat/date_picker_bootstrap/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/alat/date_picker_bootstrap/js/locales/bootstrap-datetimepicker.id.js"charset="UTF-8"></script>
  <!-- Fungsi datepickier yang digunakan -->
    <script type="text/javascript">
    $('.datepicker').datetimepicker({
        language:  'id',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
    });
    </script>

     <script type="text/javascript">
         function validepopupform2(nama_kendaraan, no_polisi){
                window.opener.document.form_laporan_kerusakan.nama_kendaraan.value=nama_kendaraan;
                window.opener.document.form_laporan_kerusakan.no_polisi.value=no_polisi;
           self.close();
              }
    </script>


  <script>
    $(document).ready(function() {
      // [17, 74, 6, 39, 20, 85, 7]
      //[82, 23, 66, 9, 99, 6, 2]
      var data1 = [
        [gd(2012, 1, 1), 17],
        [gd(2012, 1, 2), 74],
        [gd(2012, 1, 3), 6],
        [gd(2012, 1, 4), 39],
        [gd(2012, 1, 5), 20],
        [gd(2012, 1, 6), 85],
        [gd(2012, 1, 7), 7]
      ];

      var data2 = [
        [gd(2012, 1, 1), 82],
        [gd(2012, 1, 2), 23],
        [gd(2012, 1, 3), 66],
        [gd(2012, 1, 4), 9],
        [gd(2012, 1, 5), 119],
        [gd(2012, 1, 6), 6],
        [gd(2012, 1, 7), 9]
      ];
      $("#canvas_dahs").length && $.plot($("#canvas_dahs"), [
        data1, data2
      ], {
        series: {
          lines: {
            show: false,
            fill: true
          },
          splines: {
            show: true,
            tension: 0.4,
            lineWidth: 1,
            fill: 0.4
          },
          points: {
            radius: 0,
            show: true
          },
          shadowSize: 2
        },
        grid: {
          verticalLines: true,
          hoverable: true,
          clickable: true,
          tickColor: "#d5d5d5",
          borderWidth: 1,
          color: '#fff'
        },
        colors: ["rgba(38, 185, 154, 0.38)", "rgba(3, 88, 106, 0.38)"],
        xaxis: {
          tickColor: "rgba(51, 51, 51, 0.06)",
          mode: "time",
          tickSize: [1, "day"],
          //tickLength: 10,
          axisLabel: "Date",
          axisLabelUseCanvas: true,
          axisLabelFontSizePixels: 12,
          axisLabelFontFamily: 'Verdana, Arial',
          axisLabelPadding: 10
            //mode: "time", timeformat: "%m/%d/%y", minTickSize: [1, "day"]
        },
        yaxis: {
          ticks: 8,
          tickColor: "rgba(51, 51, 51, 0.06)",
        },
        tooltip: false
      });

      function gd(year, month, day) {
        return new Date(year, month - 1, day).getTime();
      }
    });
  </script>

  <!-- worldmap -->
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/maps/jquery-jvectormap-2.0.3.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/maps/gdp-data.js"></script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/maps/jquery-jvectormap-world-mill-en.js"></script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/maps/jquery-jvectormap-us-aea-en.js"></script>
  <!-- pace -->
  <script src="<?php echo base_url()?>assets/js/pace/pace.min.js"></script>

  <script type="text/javascript">
$(document).ready(function(){
  $('#email').on('submit',function(e) {
  $.ajax({
      url:'subscribe_act.php', //nama action script php sobat
      data:$(this).serialize(),
      type:'POST',
      success:function(data){
        console.log(data);
     swal("Success!", "Message sent!", "success");
      },
      error:function(data){
     swal("Oops...", "Something went wrong :(", "error");
      }
    });
    e.preventDefault();
  });
});
</script>



  <script>
    $(function() {
      $('#world-map-gdp').vectorMap({
        map: 'world_mill_en',
        backgroundColor: 'transparent',
        zoomOnScroll: false,
        series: {
          regions: [{
            values: gdpData,
            scale: ['#E6F2F0', '#149B7E'],
            normalizeFunction: 'polynomial'
          }]
        },
        onRegionTipShow: function(e, el, code) {
          el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
        }
      });
    });
  </script>
  <!-- skycons -->
  <script src="js/skycons/skycons.min.js"></script>
  <script>
    var icons = new Skycons({
        "color": "#73879C"
      }),
      list = [
        "clear-day", "clear-night", "partly-cloudy-day",
        "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
        "fog"
      ],
      i;

    for (i = list.length; i--;)
      icons.set(list[i], list[i]);

    icons.play();
  </script>

  <!-- dashbord linegraph -->
  <script>
    Chart.defaults.global.legend = {
      enabled: false
    };

    var data = {
      labels: [
        "Symbian",
        "Blackberry",
        "Other",
        "Android",
        "IOS"
      ],
      datasets: [{
        data: [15, 20, 30, 10, 30],
        backgroundColor: [
          "#BDC3C7",
          "#9B59B6",
          "#455C73",
          "#26B99A",
          "#3498DB"
        ],
        hoverBackgroundColor: [
          "#CFD4D8",
          "#B370CF",
          "#34495E",
          "#36CAAB",
          "#49A9EA"
        ]

      }]
    };

    var canvasDoughnut = new Chart(document.getElementById("canvas1"), {
      type: 'doughnut',
      tooltipFillColor: "rgba(51, 51, 51, 0.55)",
      data: data
    });
  </script>
  <!-- /dashbord linegraph -->
  <!-- datepicker -->
  <script type="text/javascript">
    $(document).ready(function() {

      var cb = function(start, end, label) {
        console.log(start.toISOString(), end.toISOString(), label);
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        //alert("Callback has fired: [" + start.format('MMMM D, YYYY') + " to " + end.format('MMMM D, YYYY') + ", label = " + label + "]");
      }

      var optionSet1 = {
        startDate: moment().subtract(29, 'days'),
        endDate: moment(),
        minDate: '01/01/2012',
        maxDate: '12/31/2015',
        dateLimit: {
          days: 60
        },
        showDropdowns: true,
        showWeekNumbers: true,
        timePicker: false,
        timePickerIncrement: 1,
        timePicker12Hour: true,
        ranges: {
          'Today': [moment(), moment()],
          'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days': [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month': [moment().startOf('month'), moment().endOf('month')],
          'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        opens: 'left',
        buttonClasses: ['btn btn-default'],
        applyClass: 'btn-small btn-primary',
        cancelClass: 'btn-small',
        format: 'MM/DD/YYYY',
        separator: ' to ',
        locale: {
          applyLabel: 'Submit',
          cancelLabel: 'Clear',
          fromLabel: 'From',
          toLabel: 'To',
          customRangeLabel: 'Custom',
          daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
          monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
          firstDay: 1
        }
      };
      $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
      $('#reportrange').daterangepicker(optionSet1, cb);
      $('#reportrange').on('show.daterangepicker', function() {
        console.log("show event fired");
      });
      $('#reportrange').on('hide.daterangepicker', function() {
        console.log("hide event fired");
      });
      $('#reportrange').on('apply.daterangepicker', function(ev, picker) {
        console.log("apply event fired, start/end dates are " + picker.startDate.format('MMMM D, YYYY') + " to " + picker.endDate.format('MMMM D, YYYY'));
      });
      $('#reportrange').on('cancel.daterangepicker', function(ev, picker) {
        console.log("cancel event fired");
      });
      $('#options1').click(function() {
        $('#reportrange').data('daterangepicker').setOptions(optionSet1, cb);
      });
      $('#options2').click(function() {
        $('#reportrange').data('daterangepicker').setOptions(optionSet2, cb);
      });
      $('#destroy').click(function() {
        $('#reportrange').data('daterangepicker').remove();
      });
    });
  </script>


  <script>
    NProgress.done();
  </script>
  <!-- /datepicker -->
  <!-- /footer content -->
</body>

</html>
