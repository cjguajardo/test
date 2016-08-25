<!DOCTYPE html>
<html>
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>@yield('title')</title>
        <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css?family=Lato:400" rel="stylesheet" type="text/css">
        <script src="moment.js"></script>
        <script src="base.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" >
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js" ></script>

        <style>
            html, body {
                height: 100%;
            }
            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 400;
                font-family: 'Lato';
            }
            .title {
                font-size: 96px;
            }
            .error, .info{
              font-size: 14px;
              font-weight: bold;
              padding: 10px;
            }
            .error{
              color: rgb(128, 0, 0);
              /* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#fcc4c4+0,fe9090+45,ffa8a8+100 */
              background: #fcc4c4; /* Old browsers */
              background: -moz-linear-gradient(-45deg,  #fcc4c4 0%, #fe9090 45%, #ffa8a8 100%); /* FF3.6-15 */
              background: -webkit-linear-gradient(-45deg,  #fcc4c4 0%,#fe9090 45%,#ffa8a8 100%); /* Chrome10-25,Safari5.1-6 */
              background: linear-gradient(135deg,  #fcc4c4 0%,#fe9090 45%,#ffa8a8 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
              filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#fcc4c4', endColorstr='#ffa8a8',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */
            }
            .info{
              color: rgb(0, 0, 26);
              /* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#ffda77+0,fcd055+100 */
              background: #ffda77; /* Old browsers */
              background: -moz-linear-gradient(-45deg,  #ffda77 0%, #fcd055 100%); /* FF3.6-15 */
              background: -webkit-linear-gradient(-45deg,  #ffda77 0%,#fcd055 100%); /* Chrome10-25,Safari5.1-6 */
              background: linear-gradient(135deg,  #ffda77 0%,#fcd055 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
              filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffda77', endColorstr='#fcd055',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */
            }
            #ItemCnfrm, #ItemMsg{
              /* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#fcfff4+0,e9e9ce+100;Wax+3D+%232 */
              background: #fcfff4; /* Old browsers */
              background: -moz-linear-gradient(-45deg,  #fcfff4 0%, #e9e9ce 100%); /* FF3.6-15 */
              background: -webkit-linear-gradient(-45deg,  #fcfff4 0%,#e9e9ce 100%); /* Chrome10-25,Safari5.1-6 */
              background: linear-gradient(135deg,  #fcfff4 0%,#e9e9ce 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
              filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#fcfff4', endColorstr='#e9e9ce',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */

              display: inline-block;
              -webkit-box-sizing: content-box;
              -moz-box-sizing: content-box;
              box-sizing: content-box;
              padding: 10px 20px;
              border: 1px solid #b7b7b7;
              -webkit-border-radius: 7px;
              border-radius: 7px;
              font: normal 16px/normal "Times New Roman", Times, serif;
              color: rgba(0,142,198,1);
              -o-text-overflow: clip;
              text-overflow: clip;
              -webkit-box-shadow: 2px 2px 2px 0 rgba(0,0,0,0.2) ;
              box-shadow: 2px 2px 2px 0 rgba(0,0,0,0.2) ;
              text-shadow: 1px 1px 0 rgba(255,255,255,0.66) ;
              -webkit-transition: all 200ms cubic-bezier(0.42, 0, 0.58, 1);
              -moz-transition: all 200ms cubic-bezier(0.42, 0, 0.58, 1);
              -o-transition: all 200ms cubic-bezier(0.42, 0, 0.58, 1);
              transition: all 200ms cubic-bezier(0.42, 0, 0.58, 1);

              position:absolute;
              top:1;
              left:100;
              z-index:999;
              display: none;
            }
            .rowcontent{}
            .rowcontent:hover{
              /* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#feffe8+0,d6dbbf+100;Wax+3D+%231 */
              background: #feffe8; /* Old browsers */
              background: -moz-linear-gradient(top,  #feffe8 0%, #d6dbbf 100%); /* FF3.6-15 */
              background: -webkit-linear-gradient(top,  #feffe8 0%,#d6dbbf 100%); /* Chrome10-25,Safari5.1-6 */
              background: linear-gradient(to bottom,  #feffe8 0%,#d6dbbf 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
              filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#feffe8', endColorstr='#d6dbbf',GradientType=0 ); /* IE6-9 */
              cursor: pointer;
            }
            #TablaProveedores, #TablaCheques{
              font-size: 11px;
            }
            .loader{
              background-image: url("loader.gif");
              background-repeat: no-repeat;
              background-size: auto;
              height: 64px;
            }
            .dia-habil, .dia-feriado {
              text-align: center;
              font-size: 14px;
              font-weight: bold;
            }
            .dia-habil { width: 14.8%; }
            .dia-feriado { width: 13%; }
            .dia-cuadro {
              height: 70px;
              font-size: 30px;
            }
            #VentanaAgenda{
              position: absolute;
              top: 10px;
              left: 25%;
              width: 50%;
              height: 480px;
              background: #FFF;
              z-index:999;
              display: none;
            }
            .item-hora{
              text-align: center;
              padding: 2px;
              font-size: 20px;
              color: #000;
            }
            .item-hora:hover{
              color:#FFF;
              background: #2c539e;
              background: -moz-linear-gradient(top,  #2c539e 0%, #2c539e 100%);
              background: -webkit-linear-gradient(top,  #2c539e 0%,#2c539e 100%);
              background: linear-gradient(to bottom,  #2c539e 0%,#2c539e 100%);
              filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#2c539e', endColorstr='#2c539e',GradientType=0 );
            }
            .formulario-izquierdo{
              width: 100px;
              overflow-y: auto;
              overflow-x: hidden;
              height: 300px;
              background: #f7fbfc;
              background: -moz-linear-gradient(top,  #f7fbfc 0%, #d9edf2 40%, #add9e4 100%);
              background: -webkit-linear-gradient(top,  #f7fbfc 0%,#d9edf2 40%,#add9e4 100%);
              background: linear-gradient(to bottom,  #f7fbfc 0%,#d9edf2 40%,#add9e4 100%);
              filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f7fbfc', endColorstr='#add9e4',GradientType=0 );
              cursor: pointer;
            }
            .formulario-derecho{
              margin-top:-300px;
              margin-left: 120px;
            }
        </style>
    </head>
    <body>
        <div class="header no-printable">
          <nav class="navbar navbar-default">
            <div class="container-fluid">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">CGC</a>
              </div>

              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                  <li role="presentation" class="active"><a href="{{ url('/') }}">Inicio</a></li>
                  <li role="presentation" class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"
                    role="button" aria-haspopup="true" aria-expanded="false">
                    Proveedores <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                      <li role="presentation"><a href="{{ url ('Proveedores') }}">Ingresar proveedores</a></li>
                      <li role="presentation"><a href="{{ url ('ListadoProveedores') }}/{{ date('m') }}.{{ date('Y') }}">Listado por mes</a></li>
                      <li role="presentation"><a href="{{ url ('ChequesNulos') }}">Ingresar cheques nulos</a></li>
                    </ul>
                  </li>
                  <li role="presentation" class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"
                    role="button" aria-haspopup="true" aria-expanded="false">
                    Caja chica <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                      <li role="presentation"><a href="{{ url ('EgresoCajaChica') }}">Egresos</a></li>
                      <li role="presentation"><a href="{{ url ('ListadoEgresoCajaChica') }}">Listado de egresos</a></li>
                    </ul>
                  </li>
                  <li role="presentation"><a href="{{ url('/Citas') }}/{{ date('m') }}">Citas</a></li>
                </ul>
              </div>
            </div>
          </nav>
        </div>
        <div>
          @yield('content')
        </div>
    </body>
</html>
