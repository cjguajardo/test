<?php
$cnumber=0;
$data=NULL;
?>
@extends('layouts.base')

@section('title')
Egresos caja chica
@endsection

@section('content')
<div id="MSG"></div>
<form name="frm-cajachica" id="frm-cajachica" method="post" action="{{ url('AgregarRendicion') }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="_method" id="_method" value="STORE">
    <table style="width:80%; align-content:right; border:thin solid #CCC;" id="tabla">
      <tr>
        <td colspan="3">
          <div class="input-group">
            <h2><span >N° Rendición</span>
            <span class="label label-info" id="last-number">{{ $cnumber }}</span></h2>
            <input type="hidden" name="cnumber" id="cnumber" value="{{ $cnumber }}">
          </div>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2" style="width:150px;">Fecha</span>
            <div class='input-group date' id='datetimepickercdate'>
                <input type='text' class="form-control" aria-describedby="sizing-addon2" name="cdate" id="cdate" />
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
          </div>
        </td>
      </tr>
      <tr><td colspan="3">&nbsp;</td></tr>
      <tr><td colspan="3">DATOS RENDICIÓN</td></tr>
      <tr>
        <td>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2" style="width:150px;">Responsable</span>
            <input type="text" class="form-control" placeholder="Persona a cargo"
            aria-describedby="sizing-addon2" name="cincharge" id="cincharge" value=""vstyle="width:300px;">
          </div>
        </td>
        <td colspan="2">
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2" style="width:150px;">Objetivo</span>
            <input type="text" class="form-control" placeholder="Objetivo del egreso"
            aria-describedby="sizing-addon2" name="cobjective" id="cobjective" value="" style="width:500px;">
          </div>
        </td>
      </tr>
      <tr><td colspan="3">&nbsp;</td></tr>
      <tr><td colspan="3">DETALLE RENDICIÓN</td></tr>
      <tr>
        <td>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2" style="width:150px;">Fecha</span>
            <div class='input-group date' id='datetimepickersdate'>
                <input type='text' class="form-control"
                aria-describedby="sizing-addon2" name="sdate" id="sdate" />
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
          </div>
        </td>
        <td>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2" style="width:150px;">Tipo</span>
            <select class="form-control"
            aria-describedby="sizing-addon2" name="stype" id="stype" style="width:150px;">
              <option value="FACTURA" selected="selected">FACTURA</option>
              <option value="BOLETA">BOLETA</option>
              <option value="OTRO">OTRO</option>
          </div>
        </td>
        <td>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2" style="width:150px;">Número Dcto.</span>
            <input type="text" class="form-control"
            aria-describedby="sizing-addon2" name="snumber" id="snumber" />
          </div>
        </td>
      </tr>
      <tr>
        <td colspan="3">
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2" style="width:150px;">Proveedor</span>
            <input type="text" class="form-control"
            aria-describedby="sizing-addon2" name="sprovider" id="sprovider" style="width:600px" />
          </div>
        </td>
      </tr>
      <tr>
        <td colspan="3">
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2" style="width:150px;">Concepto</span>
            <input type="text" class="form-control"
            aria-describedby="sizing-addon2" name="sconcept"  id="sconcept" style="width:600px" />
          </div>
        </td>
      </tr>
      <tr>
        <td colspan="3">
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2" style="width:150px;">Monto</span>
            <input type="text" class="form-control" aria-describedby="sizing-addon2" name="samount" id="samount" />
          </div>
        </td>
      </tr>
      <tr>
        <td colspan="3" align=center>
          <input type="button" name="guardar-detalle" id="guardar-detalle" value="Guardar detalle" class="btn btn-info" />
        </td>
      </tr>
      <tr><td colspan="3"><p>&nbsp;</p></td></tr>
      <tr>
        <td colspan="3">
          <div class="panel-body">
            <div id="ItemMsg">
              <center><h3 id="ItemMsg_text"></h3></center>
              <p align="center">
                <button class="glyphicon glyphicon-remove" onclick="$('#ItemMsg').hide();">Cerrar</button>
              </p>
            </div>
            <div id="ItemCnfrm">
              <center><h3 id="ItemCnfrm_title"></h3></center>
              <br/>
              <p align="center">
                <button id="ItemCnfrm_yes" class="glyphicon glyphicon-thumbs-up">  Si</button>
                <button id="ItemCnfrm_no" class="glyphicon glyphicon-thumbs-down">  No</button>
              </p>
            </div>
            <!-- Table -->
            <div>
              <table class="table" id="TablaEgresos">
                <tbody>
                  <th>
                    <td>Fecha</td>
                    <td>Tipo</td>
                    <td>Número</td>
                    <td>Proveedor</td>
                    <td>Concepto</td>
                    <td>Monto($)</td>
                    <td>Opciones</td>
                  </th>
                </tbody>
              </table>
            </div>
        </td>
      </tr>
      <!-- _____Espacio en blanco_____  -->
      <tr><td colspan="3"><p>&nbsp;</p></td></tr>
      <tr>
        <td colspan="3" align="center">
          <input type="submit" name="guardar-rendicion" id="guardar-rendicion" value="Guardar Rendición" class="btn btn-primary" />
        </td>
      </tr>
    </table>
</form>
<script type="text/javascript">
var arrdetalle = new Array();
var edit_idx = -1;
$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
$(document).ready(function(){
  function resetFormEgreso(lidx){
    //$("#sdate").val("");
    $("#snumber").val("");
    $("#sprovider").val("");
    $("#sconcept").val("");
    $("#samount").val("");
  }
  $("#guardar-detalle").on('click', function(e){
    var formData = {
      sdate     : $("#sdate").val(),
      stype     : $("#stype :selected").val(),
      snumber   : $("#snumber").val(),
      sprovider : $("#sprovider").val(),
      sconcept  : $("#sconcept").val(),
      samount   : $("#samount").val(),
    };
    //Validación
    var error_txt = '';
    $.each(formData, function(key, value){ if(value==''){error_txt += '<div>'+ obtener_mensaje(key) +'</div>';} });
    if(error_txt!=''){$("#MSG").html(error_txt).show('fast');}
    else{//Agregar a la tabla y al arreglo.
      if(edit_idx >= 0){ //Guardar cambios de item editado
        arrdetalle[edit_idx] = formData;
        edit_idx = -1;
        actualizar();
      }else{ //Guardar item nuevo
        arrdetalle.push(formData);
        $("#TablaEgresos tr:last").after(
        '<tr class="rowcontent"><td>'+(arrdetalle.length)+'</td>' +
        '<td>'+formData["sdate"]+'</td>' +
        '<td>'+formData["stype"]+'</td>' +
        '<td>'+formData["snumber"]+'</td>' +
        '<td>'+formData["sprovider"]+'</td>' +
        '<td>'+formData["sconcept"]+'</td>' +
        '<td>$'+number_format(formData["samount"])+'</td>' +
        '<td>' +
        '  <button class="glyphicon glyphicon-trash" onclick="javascript: eliminar(' + (arrdetalle.length-1) + ');"></button>' +
        '  <button class="glyphicon glyphicon-pencil" onclick="javascript: editar(' + (arrdetalle.length-1) + ');"></button>' +
        '</td>' +
        '</tr>');
      }
      resetFormEgreso();
    }
  });
  function obtener_mensaje(key){
    if(key=='sdate'){
      return 'Debe ingresar la fecha de pago';
    }else if(key=='stype'){
      return 'Debe seleccionar el tipo de documento';
    }else if(key=='snumber'){
      return 'Debe ingresar el número del documento';
    }else if(key=='sprovider'){
      return 'Debe ingresar el proveedor';
    }else if(key=='sconcept'){
      return 'Debe ingresar el concepto de la compra';
    }else if(key=='samount'){
      return 'Debe ingresar el valor de la compra';
    }
  }
  $("#frm-cajachica").on('submit', function(e){
    e.preventDefault();
    //Guardar toda la información
    var formData = {
      cnumber          : $("#cnumber").val(),
      cincharge        : $("#cincharge").val(),
      cobjective       : $("#cobjective").val(),
      cdate            : $("#cdate").val(),
      spend            : arrdetalle,
    };
    $.ajax({
      type    : 'POST',
      url     : $(this).attr('action'),
      data    : formData,
      cache   : false,
      success : function(d){
        if(d.result_code==400){
          $("#MSG").html(d.result_content).removeClass('info').addClass('error');
        }else if(d.result_code==201){
          $("#MSG").html(d.result_content).removeClass('error').addClass('info');
          resetForm();
          $("#number").val(d.result_lastindex);
          $("#last-number").html(d.result_lastindex);
        }
      },
      error   : function(result){
        $("div.footer").html(result.responseText);
      }
    });
    return false;
  });
  $('#datetimepickercdate').datetimepicker();
  $('#datetimepickersdate').datetimepicker();
  $("#datetimepickersdate").on("dp.change", function (e) { $('#sdate').val(moment(e.date).format("DD/MM/YYYY")); });
  $("#datetimepickercdate").on("dp.change", function (e) { $('#cdate').val(moment(e.date).format("DD/MM/YYYY")); });
  function ShowItemCnfrm(title){
    $("#ItemCnfrm_title").html(title);
    var w2 = w / 2;
    $("#ItemCnfrm").css("width", w2);
    $("#ItemCnfrm").css("margin-left", w2 / 2);
    $("#ItemCnfrm").show('fast');
  }
  function ShowItemMsg(text){
    $("#ItemMsg_text").html(text);
    var w2 = w / 2;
    $("#ItemMsg").css("width", w2);
    $("#ItemMsg").css("margin-left", w2 / 2);
    $("#ItemMsg").show('fast');
  }
  //Organizar objetos
  var w = $(document.body)[0].clientWidth;
  var w2 = $("#tabla").css("width").replace('px','');
  w2 = (w - w2)/2;
  $("#tabla").css("margin-left", w2);
});
function actualizar(){
  $("#TablaEgresos .rowcontent").remove();
  $.each(arrdetalle, function(i, item){
    if(item!=undefined)
      $("#TablaEgresos tr:last").after(
      '<tr class="rowcontent"><td>'+(i+1)+'</td>' +
      '<td>'+item["sdate"]+'</td>' +
      '<td>'+item["stype"]+'</td>' +
      '<td>'+item["snumber"]+'</td>' +
      '<td>'+item["sprovider"]+'</td>' +
      '<td>'+item["sconcept"]+'</td>' +
      '<td>$'+number_format(item["samount"])+'</td>' +
      '<td>' +
      '  <button class="glyphicon glyphicon-trash" onclick="javascript: eliminar(' + (i) + ');"></button>' +
      '  <button class="glyphicon glyphicon-pencil" onclick="javascript: editar(' + (i) + ');"></button>' +
      '</td>' +
      '</tr>');
  });
}
function eliminar(_id){
  if(_id!='' && _id!=undefined){
    if(confirm("¿Está seguro(a) que desea eliminar el registro?")==true){
      var tmp = new Array();
      $.each(arrdetalle, function(i, item){ if(_id!=i) tmp.push(item); });
      arrdetalle=tmp;
      actualizar();
    }
  }
}
function editar(_id){
  var formData = { id: _id };
  if(_id!='' && _id!=undefined){
      var dd = arrdetalle[_id];
      $("#sdate").val(dd['sdate']);
      $("#snumber").val(dd['snumber']);
      $("#sprovider").val(dd['sprovider']);
      $("#sconcept").val(dd['sconcept']);
      $("#samount").val(dd['samount']);
      $("#sdate").focus();
      edit_idx = _id;
  }
}
</script>
@endsection
