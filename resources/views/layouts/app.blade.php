@php($page = Request::segment(2))
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name', 'Browsr-Admin') }}</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    @if(in_array($page, ['sendnotification', 'emailnotification']))
    <link rel="stylesheet" href="{{ asset('css/notification.css')}}">
    @endif
    <link rel="stylesheet" href="{{ asset('css/custom.css')}}">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('css/skins/_all-skins.min.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
 <header class="main-header">
    <!-- Logo -->
    <a href="{{ url('admin/dashboard') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img style="width: 100%;
    height: 60px;" src="{{ asset('img/qwe.png')}}" class="img-fluid"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img style="width: 100%;
    height: 68px" src="{{ asset('img/logo.png')}}" class="img-fluid"></span>
    </a>
   
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
             <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="    height: 52px;">
              <i class="fa fa-bell"></i>
              <span class="hidden-xs"></span>
            </a>
            <div class="dropdown-menu" style="min-width: 330px; box-shadow: 0 3px 5px 0 rgba(149, 166, 181, 0.5);">
              <a href="" class="notification"><div class="col-sm-2"><i class="fa fa-exclamation-circle" aria-hidden="true"></i></div>
                  <div class="col-sm-10">
                     <p> <b>John doe </b>find somethin wrong in <b>Kristen Stewart</b> profile, kindly check and take suitable action.</p><span>02/13/2020 at 10:00 pm</span>
              </div></a>
              <div class="col-sm-12"><a href="notification.html" class="text-center" style="display:block;padding:8px;">See All</a></div>
                </div>
              </li>
          </li>
          <li class="user-menu">
              <p><img src="{{ asset('img/qwerfg.png')}}">Admin</p>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="height:52px;">
              <i class="fa fa-cog"></i>
              <span class="hidden-xs"></span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-footer">
                
                <div>
                  <a href="" data-toggle="modal" data-target="#myModal">Change Password</a>
                </div>
              </li>
              <li class="user-footer">
                
                <div>
                  <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">Logout</a>
                                                   <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                    </form>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        
        </ul>
      </div>
    </nav>
  </header>

<!-- Modal -->  
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-center">Change Password</h4>
      </div>
      <div class="modal-body ">
        <div class="card">
            <form class="form-horizontal" method="POST" action="{{ route('changePassword') }}">
            {{ csrf_field() }}
                <div>
                <label>Type Your Current Password</label>
                    <div class="input-group" id="show_hide_password">
                  <input class="form-control" type="password" name="current_password" required>
                  <div class="input-group-addon">
                    <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                  </div>
                </div>
                </div>
                <div>
                <label>Type Your New Password</label>
                    <div class="input-group" id="show_hide_password">
                  <input class="form-control" type="password" name="new_password" required>
                  <div class="input-group-addon">
                    <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                  </div>
                </div>
                </div>
                <div>
                <label>Type Your Confirm New Password</label>
                 <div class="input-group" id="show_hide_password">
                  <input class="form-control" type="password" name="confirm_password" required>
                  <div class="input-group-addon">
                    <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                  </div>
                </div>
                 <button type="submit" class="btn btn-change">CHANGE</button>
                </div>
            </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

    @guest

    @else
    <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <br>
      <br>
      <br>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
       <li class="{{ ($page == 'dashboard') ? 'active' : ''}}"><a href="{{ route('dashboard.index')}}"><i class="glyphicon glyphicon-dashboard"></i> <span>Dashboard</span></a></li>
        <li class="treeview">
          <li class="{{ ($page == 'user') ? 'active' : ''}}"><a href="{{ route('user.index')}}"><i class="glyphicon glyphicon-user"></i> <span>Users</span></a></li>
        </li>
        <li class="{{ ($page == 'sendnotification') ? 'active' : ''}}"><a href="{{ route('sendnotification.index')}}"><i class="glyphicon glyphicon-send"></i> <span>Sent Notification</span></a></li>

        <li class="{{ ($page == 'emailnotification') ? 'active' : ''}}"><a href="{{ route('emailnotification.index')}}"><i class="glyphicon glyphicon-send"></i> <span>Email Notification</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
    @endif
  <!-- Left side column. contains the logo and sidebar -->
 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   @yield('content')
  </div>
 <!-- /.content-wrapper -->
 <!-- jQuery 3 -->
 <script src="{{ asset('js/dist/jquery.min.js') }}"></script>
 <!-- Bootstrap 3.3.7 -->
 <script src="{{ asset('js/dist/bootstrap.min.js') }}"></script>
 <script src="{{ asset('js/dist/adminlte.min.js') }}"></script>

 @if($page == 'dashboard')
 <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>

<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
     type: 'line',
    data: {
        labels: ['{{ $prev6 }}', '{{ $prev5 }}', '{{ $prev4 }}', '{{ $prev3 }}', '{{ $prev2 }}', '{{ $prev1 }}', "{{ $today }}"],
        datasets: [{
            label: '# of Users',
            pointBackgroundColor: 'rgba(1, 244, 3, 1)',
            data: [{{ $user1Count }}, {{ $user2Count }}, {{ $user3Count }}, {{ $user4Count }}, {{ $user5Count }}, {{ $user6Count }}, {{ $user7Count }}],
            fill:'false',
            backgroundColor: [
                'rgba(1, 244, 3, 1)',
                'rgba(1, 244, 3, 1)',
                'rgba(1, 244, 3, 1)',
                'rgba(1, 244, 3, 1)',
                'rgba(1, 244, 3, 1)',
                'rgba(1, 244, 3, 1)'
            ],
            borderColor: [
                'rgba(1, 244, 3, 1)',
                'rgba(1, 244, 3, 1)',
                'rgba(1, 244, 3, 1)',
                'rgba(1, 244, 3, 1)',
                'rgba(1, 244, 3, 1)',
                'rgba(1, 244, 3, 1)'
            ],
            borderWidth: 4
        }]
    },
   options : {
      scales: {
        yAxes: [{
          scaleLabel: {
            display: true,
            labelString: ''
          }
        }]
      }
    }
});


var ctx1 = document.getElementById('myChart1').getContext('2d');
var myChart1 = new Chart(ctx1, {
    type: 'bar',
    data: {
        labels: ['{{$prevM5}}', '{{$prevM4}}', '{{$prevM3}}', '{{$prevM2}}', '{{$prevM1}}', '{{$month}}'],
        datasets: [{
            label: '# of Users',
            data: [{{$userMon6Count}}, {{$userMon5Count}}, {{$userMon4Count}},{{$userMon3Count}},{{$userMon2Count}},{{$userMon1Count}}],
            backgroundColor: [
                'rgba(1, 244, 3, 1)',
                'rgba(1, 244, 3, 1)',
                'rgba(1, 244, 3, 1)',
                'rgba(1, 244, 3, 1)',
                'rgba(1, 244, 3, 1)',
                'rgba(1, 244, 3, 1)'
            ],
            borderColor: [
                'rgba(1, 244, 3, 1)',
                'rgba(1, 244, 3, 1)',
                'rgba(1, 244, 3, 1)',
                'rgba(1, 244, 3, 1)',
                'rgba(1, 244, 3, 1)',
                'rgba(1, 244, 3, 1)'
            ],
            borderWidth: 0
        }]
    },
    options : {
      scales: {
        yAxes: [{
          scaleLabel: {
            display: false,
            labelString: 'probability'
          }
        }]
      }
    }
});

$(function(){

  //get the doughnut chart canvas
  var ctx1 = $("#doughnut-chartcanvas-1");
  var ctx2 = $("#doughnut-chartcanvas-2");

  //doughnut chart data
   var data1 = {
    labels: ["Users, Who are using subscription", "Users, Who are not using subscription"],
    datasets: [
      {
        label: "TeamB Score",
        data: [20, 35],
        backgroundColor: [
          "#01f403",
          "#e2ebf5"
        ],
        borderColor: [
          "#01f403",
          "#e2ebf5"
        ],
        borderWidth: [1, 1]
      }
    ]
  };

  //doughnut chart data
  var data2 = {
    labels: ["Registered Users {{ $registerUsers }}", "Male Users {{$maleUsers}}", "Female Users {{$femaleUsers}}"],
    datasets: [
      {
        label: "TeamB Score",
        data: [{{$registerUsers}}, {{$maleUsers}}, {{$femaleUsers}}],
        backgroundColor: [
          "#01f403",
          "#474747",
          "#e2ebf5"
        ],
        borderColor: [
          "#01f403",
          "#474747",
          "#e2ebf5"
        ],
        borderWidth: [1, 1, 1]
      }
    ]
  };

  //options
  var options = {
    responsive: true,
    title: {
      display: false,
      position: "top",
      text: "Doughnut Chart",
      fontSize: 18,
      fontColor: "#111"
    },
    legend: {
      display: true,
      position: "right",
      labels: {
        fontColor: "#333",
        fontSize: 13
      }
    }
  };

  //create Chart class object
  var chart1 = new Chart(ctx1, {
    type: "doughnut",
    data: data1,
    options: options
  });

  //create Chart class object
  var chart2 = new Chart(ctx2, {
    type: "doughnut",
    data: data2,
    options: options
  });
});
</script>
<script>
    // progressbar.js@1.0.0 version is used
// Docs: http://progressbarjs.readthedocs.org/en/1.0.0/

var bar = new ProgressBar.Circle(maleprogress, {
  color: '#FFEA82',
  trailColor: '#eee',
  trailWidth: 20,
  duration: 1400,
  easing: 'bounce',
  strokeWidth: 6,
  from: {color: '#01f403', a:0},
  to: {color: '#01f403', a:1},
  // Set default step function for all animate calls
  step: function(state, circle) {
    circle.path.setAttribute('stroke', state.color);
  }
});

bar.animate(0.5);  // Number from 0.0 to 1.0



var bar1 = new ProgressBar.Circle(femaleprogress, {
  color: '#FFEA82',
  trailColor: '#eee',
  trailWidth: 20,
  duration: 1400,
  easing: 'bounce',
  strokeWidth: 6,
  from: {color: '#01f403', a:0},
  to: {color: '#01f403', a:1},
  // Set default step function for all animate calls
  step: function(state, circle) {
    circle.path.setAttribute('stroke', state.color);
  }
});

bar1.animate(0.7);  // Number from 0.0 to 1.0
</script>
@endif
</body>
</html>
