<?php
$meses = array('Enero'=>'01', 'Febrero'=>'02', 'Marzo'=>'03', 'Abril'=>'04', 'Mayo'=>'05', 'Junio'=>'06',
'Julio'=>'07', 'Agosto'=>'08', 'Septiembre'=>'09', 'Octubre'=>'10', 'Noviembre'=>'11', 'Diciembre'=>'12');
$actual=date("m");
 ?>
@extends('layouts.base')
@section('title')
Citas y Reuniones
@endsection
@section('content')
<div class="meses no-printable">
  <ul class="nav nav-tabs">
    @foreach($meses as $key => $m)
    <li role="presentation" class="{{ ($actual==$m)?'active':'' }}"><a href="{{ url('citas.citas').'/'.$m }}">{{ $key }}</a></li>
    @endforeach
  </ul>
</div>
No desarrollado aún
@endsection
