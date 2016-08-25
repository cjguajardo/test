@extends('layouts.base')
@section('title')
Listado de egresos caja chica
@endsection

@section('content')
@if(count($data))
<div id="Datos">
<table class="table" id="TablaEgresos">
  <tbody>
    <th>
      <td># Rendición</td>
      <td>Fecha</td>
      <td>Responsable</td>
      <td>Objetivo</td>
      <td>Total</td>
    </th>
    @foreach($data as $d)
    <tr class="rowcontent" onclick="$('#detalle_{{ $d['capture']->cnumber }}').toggle('fast');">
      <td></td>
      <td>{{ $d['capture']->cnumber }}</td>
      <td>{{ $d['capture']->cdate }}</td>
      <td>{{ $d['capture']->cincharge }}</td>
      <td>{{ $d['capture']->cobjective }}</td>
      <td>{{ $d['capture']->stotal }}</td>
    </tr>
    <tr id="detalle_{{ $d['capture']->cnumber }}" style="display:none">
      <td colspan="6">
        <h4>DETALLE RENDICIÓN</h4>
        <table class="table" width="720px" align="center">
          <tr>
            <td>N°</td>
            <td>Fecha</td>
            <td>Tipo</td>
            <td>Número</td>
            <td>Proveedor</td>
            <td>Concepto</td>
            <td>Monto ($)</td>
          </tr>
          <?php $i=0; ?>
          @foreach($d['spend'] as $ds)
          <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $ds['sdate'] }}</td>
            <td>{{ $ds['stype'] }}</td>
            <td>{{ $ds['snumber'] }}</td>
            <td>{{ $ds['sprovider'] }}</td>
            <td>{{ $ds['sconcept'] }}</td>
            <td>{{ $ds['samount'] }}</td>
          </tr>
          @endforeach
          <tr>
            <td colspan="6"><center><bold>Total gasto</bold></center></td>
            <td><bold>{{ $d['capture']->stotal }}</bold></td>
          </tr>
        </table>
        <br><br>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
@else
<span>No existen registros para el mes seleccionado</span>
@endif

<script type="text/javascript">
function mostrar_detalle(id){

}
</script>
@endsection
