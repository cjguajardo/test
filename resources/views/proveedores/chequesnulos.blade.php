@extends('layouts.base')

@section('title')
Cheques Nulos
@endsection

@section('content')
<div id="MSG"></div>
<form name="frm-cheque-nulo" id="frm-cheque-nulo" method="post" action="{{ url('GuardarChequeNulo') }}">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="hidden" name="_method" id="_method" value="STORE">
  <table style="width:720px; align-content:right; border:thin solid #CCC;" id="tabla" align="center">
    <tr>
      <td>
        <div class="input-group">
          <span class="input-group-addon" id="sizing-addon2" style="width:150px;">Num. Cheque</span>
          <input type="text" class="form-control" aria-describedby="sizing-addon2" name="check_number" id="check_number" />
        </div>
      </td>
      <td>
        <div class="input-group">
          <span class="input-group-addon" id="sizing-addon2" style="width:150px;">Banco</span>
          <input type="text" class="form-control" aria-describedby="sizing-addon2" name="check_bank" id="check_bank" style="width:200px" />
        </div>
      </td>
    </tr>
    <tr><td colspan="2">&nbsp;</td></tr>
    <tr>
      <td colspan="2" align="center">
        <input type="submit" name="guardar-proveedor" id="guardar-proveedor" value="Guardar" class="btn btn-primary" />
      </td>
    </tr>
  </table>
</form>

<p>&nbsp;</p>
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
      <form class="navbar-form navbar-left" role="search" id="frm-buscar-item" name="frm-buscar-item">
        <div class="form-group">
          <select class="form-control" name="buscarpor" id="buscarpor">
            <option value="check_number">N° Cheque</option>
            <option value="check_bank">Banco</option>
          </select>
          <input type="text" class="form-control" placeholder="Search" id="filtro" name="filtro">
        </div>
        <button type="submit" class="btn btn-default" id="btn-buscar-item" name="btn-buscar-item">Buscar</button>
      </form>
      <span id="resultado-busqueda"></span>
    </div>
  </div>
</nav>

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
  <table class="table" id="TablaCheques">
    <tbody>
      <tr>
        <td>#</td>
        <td>Número de cheque</td>
        <td>Banco</td>
        <td>Observaciones</td>
        <td>Acciones</td>
      </tr>
      @if(count($data)>0)
        <?php $i=0; ?>
        @foreach($data as $d)
        <tr id="fila_{{ $d->id }}" class="rowcontent">
          <td>{{ ++$i }}</td>
          <td check_number="{{ $d->check_number }}">{{ $d->check_number }}</td>
          <td check_bank="{{ $d->check_bank }}">{{ $d->check_bank }}</td>
          <td>{{ $d->comment }}</td>
          <td>
            <button class="glyphicon glyphicon-print" onclick="javascript: imprimir('{{ $d->id }}');"></button>
            <button type="submit" class="glyphicon glyphicon-trash" onclick="javascript: eliminar('{{ $d->id }}');"></button>
            <button class="glyphicon glyphicon-pencil" onclick="javascript: editar('{{ $d->id }}');"></button>
          </td>
        </tr>
        @endforeach
      @endif
    </tbody>
  </table>
</div>
<script type="text/javascript">
$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
//Organizar objetos
var w = $(document.body)[0].clientWidth;
$(document).ready(function(){
  $("#frm-cheque-nulo").on('submit', function(e){
    e.preventDefault();
    var formData = {
      check_number  : $("#check_number").val(),
      check_bank    : $("#check_bank").val(),
    };
    $.ajax({
      type    : "POST",
      url     : $("#frm-cheque-nulo").attr("action"),
      cache   : false,
      data    : formData,
      success : function(d){
        if(d.result_code==400){
          $("#MSG").html(d.result_content).removeClass('info').addClass('error');
        }else if(d.result_code==201){
          //$("#MSG").html(d.result_content).removeClass('error').addClass('info');
          ShowItemMsg(d.result_content);
          resetForm();
        }
        ActualizarTablaCheques();
      },
      fail    : function(d){
        $("#MSG").html(d).removeClass('error').addClass('info');
      }
    });
    return false;
  });
  $("#btn-buscar-item").on('click', function(e){
    var buscarpor = $("#buscarpor :selected").val();
    var filtro    = $("#filtro").val();
    var elementos = $("#TablaCheques").find("tr.rowcontent");
    var cantidad_elementos=0;
    var encontrado= false;
    $.each(elementos, function(i, item){
      $(item).hide('fast');
      var x = $(item).find("td");
      $.each(x, function(ii, td){
        var v = $(td).attr(buscarpor);
        if(v==filtro){
          $(item).show('fast');
          encontrado=true;
          cantidad_elementos++;
        }
      });
    });
  });
});
function resetForm(){
  $("#check_number").val('');
  $("#check_bank").val('');
}
function ActualizarTablaCheques(){
  $.ajax({
    type    : 'GET',
    url     : "{{ url('ObtenerChequesNulos') }}",
    cache   : false,
    success : function(d){
      if(d.result_code==400){
        ShowItemMsg(d.result_content);
      }else if(d.result_code==201){
        console.log(d.result_content);
        $("#TablaCheques").find("tr.rowcontent").remove();
        for (var i = 0; i < d.result_content.length; i++) {
          var dd = d.result_content[i];
          var row = '<tr id="fila_' + dd.id + '" class="rowcontent">' +
            '<td>' + (i+1) + '</td>' +
            '<td check_number="' + dd.check_number + '">' + dd.check_number + '</td>' +
            '<td check_bank="'+ dd.check_bank +'">' + dd.check_bank + '</td>' +
            '<td>' + dd.comment + '</td>' +
            '<td>' +
            '  <button class="glyphicon glyphicon-print" onclick="javascript: imprimir(' + dd.id + ');"></button>' +
            '  <button class="glyphicon glyphicon-trash" onclick="javascript: eliminar(' + dd.id + ');"></button>' +
            '  <button class="glyphicon glyphicon-pencil" onclick="javascript: editar(' + dd.id + ');"></button>' +
            '</td>' +
          '</tr>';
          $("#TablaCheques").append(row);
        }
      }
    },
    fail    : function(d){
      ShowItemMsg("Ha ocurrido un error y no se ha podido obtener el registro");
    }
  });
}
function eliminar(_id){
  var formData = {
    id  : _id,
  };
  $.ajax({
    type    : 'POST',
    url     : '{{ url("/EliminarNulo")}}/' + _id,
    cache   : false,
    data    : formData,
    success : function(d){
      if(d.result_code==400){
        ShowItemMsg(d.result_content);
      }else if(d.result_code==201){
        //console.log(d.result_content);
        ShowItemMsg(d.result_content);
        ActualizarTablaCheques();
      }
    },
    fail    : function(d){
      ShowItemMsg("Ha ocurrido un error y no se ha podido obtener el registro");
    }
  });
}
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
</script>
@endsection
