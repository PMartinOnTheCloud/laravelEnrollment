<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
	    <meta charset="utf-8">
  	    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	    <title>Portal de matriculación</title>
	    <script src="https://kit.fontawesome.com/74ec47558a.js" crossorigin="anonymous"></script>
	    <link rel="stylesheet" type="text/css" href="css/main.css"/>
    </head>
    <body>
        <div class="cpage" id="">
            <div class="incpage" id="">
                <h3 id="incpagelanding">Proyecto de Matriculación</h3>
                <img src="images/esteve.jpeg"/>
            </div>
            <div class="incpage" id="incpagelanding">
                <p>El proyecto de matriculación consiste en una aplicación de matriculación de alumnos de FP Superior que permitirá agilizar y facilitar el proceso de matricular alumnos.</p>

            </div>
            <a href="{{ asset('/login') }}">Login</a>
        </div>
    </body>
</html>
