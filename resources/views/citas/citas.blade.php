<?php
$meses = array('Enero'=>'01', 'Febrero'=>'02', 'Marzo'=>'03', 'Abril'=>'04', 'Mayo'=>'05', 'Junio'=>'06',
'Julio'=>'07', 'Agosto'=>'08', 'Septiembre'=>'09', 'Octubre'=>'10', 'Noviembre'=>'11', 'Diciembre'=>'12');
if(!isset($actual)) $actual=date("m");
$dias = array('000', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo');

/* Crear calendario */
for($i=1; $i<=42; $i++) $cuadro[$i]='';
$d = mktime(0, 0, 0, $actual, 1, date("Y"));
$dia=1;
for($i=date("N", $d); $i<=42; $i++){
  $d = mktime(0, 0, 0, $actual, $dia, date("Y"));
  //$cuadro[$i]=['Num'=>date("j", $d), 'Nom'=>$dias[date("N", $d)]];
  $cuadro[$i]=date("j", $d);
  $dia++;
  if($dia>date("t", $d)) break;
}
$horas=NULL;
$ha='07';
$hm='00';
while($ha.':'.$hm!='20:00'){
  $horas[]=$ha.':'.$hm;
  $hm=number_format($hm,0) + 10;
  if(number_format($hm,0)>=60){
    $ha++;
    $hm='00';
    if($ha<10) $ha='0'.$ha;
  }
}
 ?>
@extends('layouts.base')
@section('title')
Citas y Reuniones
@endsection
@section('content')
<!-- Ventana emergente -->
<div id="VentanaAgenda" class="panel panel-primary">
  <span id="TituloVentanaAgenda"><h3><center>titulo</center></h3></span>
  <div>
    <form id="frm-agenda" action="{{ url('/Agendar') }}" method="post">
      <div class="input-group">
        <span class="input-group-addon" id="basic-addon1" style="width:150px;">Agendar a </span>
        <select class="form-control" id="who_ask" aria-describedby="basic-addon1" style="width:350px;">
          <option value="">Persona1</option>
          <option value="">Persona2</option>
        </select>
      </div>
      <input type="submit"/>
    </form>
  </div>
  <div id="ContenidoVentanaAgenda" class="panel-body">
    <form id="frm-agenda" action="{{ url('/Agendar') }}" method="post">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input type="hidden" name="_method" id="_method" value="STORE">
      <div class="formulario-izquierdo">
        @foreach($horas as $hora)
        <div class="item-hora">{{ $hora }}</div>
        @endforeach
      </div>
      <div class="formulario-derecho">
        <div class="input-group">
          <span class="input-group-addon" id="basic-addon1" style="width:150px;">Quien solicita</span>
          <input type="text" class="form-control" placeholder="Nombre de solicitante" id="who_ask" aria-describedby="basic-addon1" style="width:350px;">
        </div>
        <div class="input-group">
          <span class="input-group-addon" id="basic-addon1" style="width:150px;">Motivo</span>
          <input type="text" class="form-control" placeholder="Motivo de reunión/entrevista" id="what_for" aria-describedby="basic-addon1" style="width:350px;">
        </div>
        <div class="input-group">
          <span class="input-group-addon" id="basic-addon1" style="width:150px;">Observación</span>
          <input type="text" class="form-control" placeholder="Comentarios extras" id="comment" aria-describedby="basic-addon1" style="width:350px;">
        </div>
      </div>
    </form>
  </div>
</div>
<!-- Menú meses -->
<div class="meses no-printable">
  <ul class="nav nav-tabs">
    @foreach($meses as $key => $m)
    <li role="presentation" class="{{ ($actual==$m)?'active':'' }}"><a href="{{ url('Citas').'/'.$m }}">{{ $key }}</a></li>
    @endforeach
  </ul>
</div>
<br/>
<table width="99%" border="1" align="center">
  <!-- Días de la semana Header -->
  <tr>
    <td class="dia-habil">Lunes</td>
    <td class="dia-habil">Martes</td>
    <td class="dia-habil">Miércoles</td>
    <td class="dia-habil">Jueves</td>
    <td class="dia-habil">Viernes</td>
    <td class="dia-feriado">Sábado</td>
    <td class="dia-feriado">Domingo</td>
  </tr>
@for($i=1; $i<=42; $i+=7)
<?php if($cuadro[$i]=="" && $i>35) break; ?>
  <tr class="dia-cuadro">
    <td class="dia-habil dia-cuadro">
      @if($cuadro[$i]!="") <a href="javascript: mostrar_agenda({{ $cuadro[$i+0] }})">{{ $cuadro[$i+0] }}</a>
      @else {{ $cuadro[$i+0] }}
      @endif
    </td>
    <td class="dia-habil dia-cuadro"  >
      @if($cuadro[$i+1]!="") <a href="javascript: mostrar_agenda({{ $cuadro[$i+1] }})">{{ $cuadro[$i+1] }}</a>
      @else {{ $cuadro[$i+1] }}
      @endif
    </td>
    <td class="dia-habil dia-cuadro"  >
      @if($cuadro[$i+2]!="") <a href="javascript: mostrar_agenda({{ $cuadro[$i+2] }})">{{ $cuadro[$i+2] }}</a>
      @else {{ $cuadro[$i+2] }}
      @endif
    </td>
    <td class="dia-habil dia-cuadro"  >
      @if($cuadro[$i+3]!="") <a href="javascript: mostrar_agenda({{ $cuadro[$i+3] }})">{{ $cuadro[$i+3] }}</a>
      @else {{ $cuadro[$i+3] }}
      @endif
    </td>
    <td class="dia-habil dia-cuadro"  >
      @if($cuadro[$i+4]!="") <a href="javascript: mostrar_agenda({{ $cuadro[$i+4] }})">{{ $cuadro[$i+4] }}</a>
      @else {{ $cuadro[$i+4] }}
      @endif
    </td>
    <td class="dia-feriado dia-cuadro">
      @if($cuadro[$i+5]!="") <a href="javascript: mostrar_agenda({{ $cuadro[$i+5] }})">{{ $cuadro[$i+5] }}</a>
      @else {{ $cuadro[$i+5] }}
      @endif
    </td>
    <td class="dia-feriado dia-cuadro">
      @if($cuadro[$i+6]!="") <a href="javascript: mostrar_agenda({{ $cuadro[$i+6] }})">{{ $cuadro[$i+6] }}</a>
      @else {{ $cuadro[$i+6] }}
      @endif
    </td>
  </tr>
@endfor
</table>
<script type="text/javascript">
var mes_actual = {{ number_format($actual,0) }};
var meses_nombre = ['Todos', 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

function mostrar_agenda(dia){
  $("#TituloVentanaAgenda").html('<h3><center>' + dia + ' de ' + meses_nombre[{{ number_format($actual,0) }}] + '</center></h3>');
  $("#VentanaAgenda").show('fast');
}
</script>
@endsection
