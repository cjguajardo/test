<?php
$meses = array('Todos'=>'00', 'Enero'=>'01', 'Febrero'=>'02', 'Marzo'=>'03', 'Abril'=>'04', 'Mayo'=>'05', 'Junio'=>'06',
'Julio'=>'07', 'Agosto'=>'08', 'Septiembre'=>'09', 'Octubre'=>'10', 'Noviembre'=>'11', 'Diciembre'=>'12');
$meses_nombre = array(0=>'Todos', 1=>'Enero', 2=>'Febrero', 3=>'Marzo', 4=>'Abril', 5=>'Mayo', 6=>'Junio',
7=>'Julio', 8=>'Agosto', 9=>'Septiembre', 10=>'Octubre', 11=>'Noviembre', 12=>'Diciembre');
$total=0;
 ?>
@extends('layouts.base')
@section('title')
Listado de Proveedores {{ $meses_nombre[number_format($actual,0)] }}
@endsection
@section('content')
<!-- Menú meses -->
<div class="meses no-printable">
  <ul class="nav nav-pills">
    <li role="presentation" class="{{ ($anio==2016)?'active':'' }}"><a href="{{ url('ListadoProveedores').'/'.$actual.'.2016' }}">2016</a></li>
    <li role="presentation" class="{{ ($anio==2015)?'active':'' }}"><a href="{{ url('ListadoProveedores').'/'.$actual.'.2015' }}">2015</a></li>
  </ul>
  <ul class="nav nav-tabs">
    @foreach($meses as $key => $m)
    <li role="presentation" class="{{ ($actual==$m)?'active':'' }}"><a href="{{ url('ListadoProveedores').'/'.$m.'.'.$anio }}">{{ $key }}</a></li>
    @endforeach
    @if(count($data))
    <li><a class="label label-success glyphicon glyphicon-print" href="javascript: imprimir();">  Imprimir</a></li>
    @endif
  </ul>
</div>
@if(count($data))
<div id="Datos">
<table class="table" id="TablaProveedores">
  <tbody>
    <tr>
      <td>Comprobante</td>
      <td>Tipo Doc.</td>
      <td>Num. Doc.</td>
      <td>Proveedor</td>
      <td>Detalle</td>
      <td>Monto</td>
      <td>Cheque</td>
      <td>Banco</td>
      <td>Fecha Cheque</td>
      <td>Monto Cheque</td>
      <td>Observación</td>
    </tr>
    @foreach($data as $d)
    <tr class="rowcontent">
      <td>{{ $d->number }}</td>
      <td>{{ $d->prov_doc_type }}</td>
      <td>{{ $d->prov_doc_number }}</td>
      <td>{{ $d->prov_name }}</td>
      <td>{{ $d->prov_doc_detalle }}</td>
      <td align=right>${{ number_format($d->prov_doc_value,0,',','.') }}&nbsp;&nbsp;</td>
      <td>{{ $d->check_number }}</td>
      <td>{{ $d->check_bank }}</td>
      <td>{{ $d->check_date }}</td>
      <td align=right>${{ number_format($d->check_value,0,',','.') }}&nbsp;&nbsp;</td>
      <td>{{ $d->comment }}</td>
    </tr>
    <?php $total+=$d->check_value ?>
    @endforeach
    <tr>
      <td colspan="8">&nbsp;</td>
      <td align=right><h4><bold>Total: &nbsp;</bold></h4></td>
      <td align=right><h4><bold>${{ number_format($total,0,',','.') }}</bold></h4></td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
</div>
@else
<span>No existen registros para el mes seleccionado</span>
@endif

<script type="text/javascript">
function imprimir(){
  var d = $(".no-printable");
  $.each(d, function(i, item){
    $(item).css('display', 'none');
  });

  window.print();

  $.each(d, function(i, item){
    $(item).css('display', 'block');
  });
}
</script>
@endsection
