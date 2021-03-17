
<!DOCTYPE html>
<html lang="en" id="landingbody">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Kobloard</title>

    <!--<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">-->
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
    <!--<link href="{{asset('css/style.css')}}" rel="stylesheet">-->
    <link href="{{asset('css/main.css')}}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/74ec47558a.js" crossorigin="anonymous"></script>

  </head>
  <body id="landingbody">

    <div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="row ">

					<img src="{{ asset('images/esteveterradasbanner_landing.jpg') }}" class='mx-auto d-block img-fluid'>

			</div>
			<br>
			<div class="row">
                <div class="col-md-1">
                </div>
				<div class="col-md-10 text-center landingp">
					<p>
						El proyecto de matriculación consiste en una aplicación de matriculación de alumnos de FP Superior que permitirá agilizar y facilitar el proceso de matricular alumnos.
					</p>
					<a href="{{ asset('/login') }}" class="btn btn-primary">Login</a>
				</div>
                <div class="col-md-1">
                </div>
			</div>
		</div>
	</div>
</div>
<footer id="landingfoot">

        <p ><?php echo date('Y'); ?> &copy; Kobloard</p>

  </footer>

    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/scripts.js')}}"></script>
  </body>
</html>



<!--<!DOCTYPE html>
	<head>
		<title>LEP</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="{{ asset('css/landing.css') }}">
  	    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	    <script src="https://kit.fontawesome.com/74ec47558a.js" crossorigin="anonymous"></script>
	</head>
	<body id="landing">
		<div id="main_landing">
			<img id="banner_landing" src="{{ asset('images/esteveterradasbanner_landing.jpg') }}">
			<a href="/login" id="login_landing">Iniciar Sesión</a>
		</div>
	</body>
</html>-->
