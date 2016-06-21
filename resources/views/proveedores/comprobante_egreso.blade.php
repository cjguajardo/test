<?php
  $data=$data[0];
 ?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>Comprobante de Egreso #{{ $data->number }}</title>
        <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css?family=Lato:400" rel="stylesheet" type="text/css">
        <script src="moment.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" >
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js" ></script>
<style type="text/css">
.num {
	padding: 5;
	right: 5px;
  align-content: center;
  text-align: center;
  font-size: 25px;
  font-weight: bold;
}
.documento{
  margin-left:30px;
  margin-right:30px;
}
body{
  max-width: 720px;
}
.cuadro{
  border: solid thin #CCC;
  margin: 10px;
}
</style>
</head>

<body>
  <!-- Copia 1 -->
  <div class="cuadro">
    <h1><center>COMPROBANTE DE EGRESO</center></h1>
    <div class="num">#{{ $data->number }}</div>
    <br/>
    <div class="documento">
      <span class="glyphicon glyphicon-{{ @($data->prov_doc_type=='BOLETA')?'check':'unchecked' }}" style="margin-right:40px"> BOLETA</span>
      <span class="glyphicon glyphicon-{{ @($data->prov_doc_type=='FACTURA')?'check':'unchecked' }}" style="margin-right:40px"> FACTURA</span>
      @if($data->prov_doc_type!='BOLETA' && $data->prov_doc_type!='FACTURA')
      <span class="glyphicon glyphicon-check" style="margin-right:40px"> OTRO: {{ $data->prov_doc_type }}</span>
      @else
      <span class="glyphicon glyphicon-unchecked" style="margin-right:40px"> OTRO: </span>
      @endif
      <br/>
      <span>NÚMERO: {{ $data->prov_doc_number }}</span><br/>
      <span>MONTO: ${{ number_format($data->prov_doc_value,0,',','.') }}.-</span>
      <span style="margin-left:200px">FECHA: {{ $data->prov_doc_date }}</span><br/>
      <span>PROVEEDOR: {{ $data->prov_name }}</span>
      <br/><br/>
      <span class="glyphicon glyphicon-{{ @($data->payment_type=='CHEQUE')?'check':'unchecked' }}" style="margin-right:40px"> CHEQUE</span>
      <span class="glyphicon glyphicon-{{ @($data->payment_type=='EFECTIVO')?'check':'unchecked' }}" style="margin-right:40px"> EFECTIVO</span>
      <span style="margin-left:200px">MONTO: ${{ number_format($data->check_value,0,',','.') }}.-</span>
      <span>FECHA PAGO: {{ $data->check_date }}</span><br/>
      @if($data->payment_type=='CHEQUE')
      <span style="width:200px;">NÚMERO: {{ number_format($data->check_number,0,',','.') }}</span>
      <span style="margin-left:100px;">BANCO: {{ $data->check_bank }}</span>
      @else
      <span>&nbsp;</span>
      @endif
      <br/><br/><br/><br/>
      <span>
        <center>
        _______________________________<br/>
        Firma encargado(a) ejecución pago<br/>Mirta Rivas Ramos
        </center>
      </span>
    </div>
    <br/>
  </div>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <br/>
  <!-- Copia 2 -->
  <div class="cuadro">
    <h1><center>COMPROBANTE DE EGRESO</center></h1>
    <div class="num">#{{ $data->number }}</div>
    <br/>
    <div class="documento">
      <span class="glyphicon glyphicon-{{ @($data->prov_doc_type=='BOLETA')?'check':'unchecked' }}" style="margin-right:40px"> BOLETA</span>
      <span class="glyphicon glyphicon-{{ @($data->prov_doc_type=='FACTURA')?'check':'unchecked' }}" style="margin-right:40px"> FACTURA</span>
      @if($data->prov_doc_type!='BOLETA' && $data->prov_doc_type!='FACTURA')
      <span class="glyphicon glyphicon-check" style="margin-right:40px"> OTRO: {{ $data->prov_doc_type }}</span>
      @else
      <span class="glyphicon glyphicon-unchecked" style="margin-right:40px"> OTRO: </span>
      @endif
      <br/>
      <span>NÚMERO: {{ $data->prov_doc_number }}</span><br/>
      <span>MONTO: ${{ number_format($data->prov_doc_value,0,',','.') }}.-</span>
      <span style="margin-left:200px">FECHA: {{ $data->prov_doc_date }}</span><br/>
      <span>PROVEEDOR: {{ $data->prov_name }}</span>
      <br/><br/>
      <span class="glyphicon glyphicon-{{ @($data->payment_type=='CHEQUE')?'check':'unchecked' }}" style="margin-right:40px"> CHEQUE</span>
      <span class="glyphicon glyphicon-{{ @($data->payment_type=='EFECTIVO')?'check':'unchecked' }}" style="margin-right:40px"> EFECTIVO</span>
      <span style="margin-left:200px">MONTO: ${{ number_format($data->check_value,0,',','.') }}.-</span>
      <span>FECHA PAGO: {{ $data->check_date }}</span><br/>
      @if($data->payment_type=='CHEQUE')
      <span style="width:200px;">NÚMERO: {{ number_format($data->check_number,0,',','.') }}</span>
      <span style="margin-left:100px;">BANCO: {{ $data->check_bank }}</span>
      @else
      <span>&nbsp;</span>
      @endif
      <br/><br/><br/><br/>
      <span>
        <center>
        _______________________________<br/>
        Firma encargado(a) ejecución pago<br/>Mirta Rivas Ramos
        </center>
      </span>
    </div>
    <br/>
  </div>
</body>
</html>
