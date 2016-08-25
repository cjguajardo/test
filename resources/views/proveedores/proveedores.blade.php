@extends('layouts.base')
@section('title')
Proveedores
@endsection
@section('content')
<div id="MSG"></div>
<form name="frm-proveedores" id="frm-proveedores" method="post" action="{{ url('AgregarProveedor') }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="_method" id="_method" value="STORE">
    <table style="width:80%; align-content:right; border:thin solid #CCC;" id="tabla">
      <tr>
        <td colspan="3">
          <div class="input-group">
            <h2><span >Número de Comprobante</span>
            <span class="label label-info" id="last-number">{{ $last_number }}</span></h2>
            <input type="hidden" name="number" id="number" value="{{ $last_number }}">
          </div>
        </td>
      </tr>
      <tr><td colspan="3">&nbsp;</td></tr>
      <tr><td colspan="3">DATOS COMPROBANTE DE COMPRA</td></tr>
      <tr>
        <td>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2" style="width:150px;">Número</span>
            <input type="text" class="form-control" placeholder="Número de documento" aria-describedby="sizing-addon2" name="prov_doc_number" id="prov_doc_number" value="">
          </div>
        </td>
        <td>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2" style="width:150px;">Tipo</span>
            <select class="form-control" aria-describedby="sizing-addon2" name="prov_doc_type" id="prov_doc_type" style="width:150px;">
              <option value="FACTURA" selected="selected">FACTURA</option>
              <option value="BOLETA">BOLETA</option>
              <option value="OTRO">OTRO</option>
              <option value="VALE">VALE</option>
          </div>
        </td>
        <td>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2" style="width:150px;">Fecha</span>
            <div class='input-group date' id='datetimepickerprovdate'>
                <input type='text' class="form-control" aria-describedby="sizing-addon2" name="prov_doc_date" id="prov_doc_date" />
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
          </div>
        </td>
      </tr>
      <tr>
        <td colspan="3">
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2" style="width:150px;">Proveedor</span>
            <input type="text" class="form-control" aria-describedby="sizing-addon2" name="prov_name" id="prov_name" style="width:600px" />
          </div>
        </td>
      </tr>
      <tr>
        <td colspan="3">
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2" style="width:150px;">Detalle egreso</span>
            <input type="text" class="form-control" aria-describedby="sizing-addon2" name="prov_doc_detalle"  id="prov_doc_detalle" style="width:600px" />
          </div>
        </td>
      </tr>
      <tr>
        <td colspan="3">
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2" style="width:150px;">Monto Dcto.</span>
            <input type="text" class="form-control" aria-describedby="sizing-addon2" name="prov_doc_value" id="prov_doc_value" />
          </div>
        </td>
      </tr>
      <tr><td colspan="3">&nbsp;</td></tr>
      <tr><td colspan="3">DATOS PAGO</td></tr>
      <tr>
        <td colspan="3">
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2" style="width:150px;">
              Efectivo
              <input type="radio" class="form-control" aria-describedby="sizing-addon2" name="payment_type" value="EFECTIVO" />
            </span>
            <span class="input-group-addon" id="sizing-addon2" style="width:150px;">
              Cheque
              <input type="radio" class="form-control" aria-describedby="sizing-addon2" name="payment_type" value="CHEQUE" />
            </span>
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2" style="width:150px;">Num. Cheque</span>
            <input type="text" class="form-control" aria-describedby="sizing-addon2" name="check_number" id="check_number" />
          </div>
        </td>
        <td>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2" style="width:150px;">Fecha Pago</span>
            <div class='input-group date' id='datetimepickercheckdate'>
                <input type='text' class="form-control" aria-describedby="sizing-addon2" name="check_date" id="check_date" />
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
          </div>
        </td>
        <td>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2" style="width:150px;">Banco</span>
            <input type="text" class="form-control" aria-describedby="sizing-addon2" name="check_bank" id="check_bank" style="width:200px" />
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2" style="width:150px;">Monto</span>
            <input type="text" class="form-control" aria-describedby="sizing-addon2" name="check_value" id="check_value" />
          </div>
        </td>
        <td  colspan="2">
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2" style="width:150px;">Observación</span>
            <input type="text" class="form-control" aria-describedby="sizing-addon2" name="comment" id="comment" style="width:573px" />
          </div>
        </td>
      </tr>
      <tr>
        <td colspan="3" align=center><input type="submit" name="guardar-proveedor" id="guardar-proveedor" value="Guardar" class="btn btn-primary" /></td>
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
            <option value="prov_doc_number">N° Documento</option>
            <option value="check_number">N° Cheque</option>
            <option value="number">N° Correlativo</option>
            <option value="prov_name">Proveedor</option>
          </select>
          <input type="text" class="form-control" placeholder="Search" id="filtro" name="filtro">
        </div>
        <button type="submit" class="btn btn-default" id="btn-buscar-item" name="btn-buscar-item">Buscar</button>
      </form>
      <span id="resultado-busqueda" class="loader"></span>
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
  <!-- Table -->
  <div style="overflow:scroll; max-height:640px">
    <table class="table" id="TablaProveedores">
      <tbody>
        <tr>
          <td>#</td>
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
          <td>Acción</td>
        </tr>
        @foreach($data as $d)
        <tr class="rowcontent">
          <td class="number{{ $d->number }}" number="{{ $d->number }}">{{ $d->number }}</td>
          <td>{{ $d->prov_doc_type }}</td>
          <td class="prov_doc_number{{ $d->prov_doc_number }}" prov_doc_number="{{ $d->prov_doc_number }}">{{ $d->prov_doc_number }}</td>
          <td class="prov_name{{ $d->prov_name }}" prov_name="{{ $d->prov_name }}">{{ $d->prov_name }}</td>
          <td>{{ $d->prov_doc_detalle }}</td>
          <td align=right>${{ number_format($d->prov_doc_value,0,',','.') }}&nbsp;&nbsp;</td>
          <td class="check_number{{ $d->check_number }}" check_number="{{ $d->check_number }}">{{ $d->check_number }}</td>
          <td>{{ $d->check_bank }}</td>
          <td>{{ $d->check_date }}</td>
          <td align=right>${{ number_format($d->check_value,0,',','.') }}&nbsp;&nbsp;</td>
          <td>{{ $d->comment }}</td>
          <td>
            <button class="glyphicon glyphicon-print" onclick="javascript: imprimir({{ $d->id }});"></button>
            <button class="glyphicon glyphicon-trash" onclick="javascript: eliminar({{ $d->id }});"></button>
            <button class="glyphicon glyphicon-pencil" onclick="javascript: editar({{ $d->id }});"></button>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
<script type="text/javascript">
  $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
</script>
<script type="text/javascript">
$(document).ready(function(){
  function resetForm(lidx){
    $("#number").val("");
    $("#prov_doc_number").val("");
    $("#prov_name").val("");
    $("#prov_doc_detalle").val("");
    $("#prov_doc_value").val("");
    $("#prov_doc_date").val("");
    $("#check_number").val("");
    $("#check_value").val("");
    $("#check_bank").val("");
    $("#check_date").val("");
    $("#comment").val("");
  }
  resetForm();
  $("#frm-proveedores").on('submit', function(e){
    e.preventDefault();
    var formData = {
      number          : $("#number").val(),
      prov_doc_number : $("#prov_doc_number").val(),
      prov_name       : $("#prov_name").val(),
      prov_doc_detalle: $("#prov_doc_detalle").val(),
      prov_doc_type   : $("#prov_doc_type :selected").val(),
      prov_doc_value  : $("#prov_doc_value").val(),
      prov_doc_date   : $("#prov_doc_date").val(),
      check_number    : $("#check_number").val(),
      check_value     : $("#check_value").val(),
      check_bank      : $("#check_bank").val(),
      check_date      : $("#check_date").val(),
      comment         : $("#comment").val(),
      payment_type    : ($(":radio[value=EFECTIVO]").attr('checked')==true)?'EFECTIVO':'CHEQUE',
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
          $("#number").attr("value", d.result_lastindex);
          $("#last-number").html(d.result_lastindex);
        }
        ActualizarTablaProveedores();
      },
      error   : function(result){
        $("div.footer").html(result.responseText);
      }
    });
    return false;
  });
  $("#btn-buscar-item").on('click', function(e){
    e.preventDefault();
    $("#resultado-busqueda").addClass('loader');
    var buscarpor = $("#buscarpor :selected").val();
    var filtro    = $("#filtro").val().toLowerCase();
    var elementos = $("#TablaProveedores").find("tr.rowcontent");
    if(filtro==''){
      $(elementos).show('fast');
    }else{
      $(elementos).hide('fast');
      var cantidad_elementos=0;
      var encontrado= false;
      var el = $(elementos).find("." + buscarpor + filtro);
      if(el!=undefined){
        cantidad_elementos = el.length;
        encontrado=true;
        if(cantidad_elementos>1){
          $.each(el, function(i, item){
            $(item.parentElement).show('fast');
          });
        }else{
          $(el[0].parentElement).show('fast');
        }
        $("#resultado-busqueda").html('Se encontraron ' + cantidad_elementos + ' resultados.');
      }
      //Si no se encuentra ningún elemento se vuelven a mostrar toda la tabla.
      if(!encontrado){
        $("#resultado-busqueda").html('No se han encontrado resultados.');
        $.each(elementos, function(i, item){ $(item).show('fast'); });
      }
    }

    $("#resultado-busqueda").removeClass('loader');
    return false;
  });
  $(":radio").on('click', function(e){
    var v = $(this).val();
    if(v=='EFECTIVO'){
      $("#check_number").prop("readonly", true);
      $("#check_bank").prop("readonly", true);
    }else{
      $("#check_number").prop("readonly", false);
      $("#check_bank").prop("readonly", false);
    }
  });

  $('#datetimepickerprovdate').datetimepicker();
  $('#datetimepickercheckdate').datetimepicker();
  $("#datetimepickerprovdate").on("dp.change", function (e) {
      $('#prov_doc_date').val(moment(e.date).format("DD/MM/YYYY"));
  });
  $("#datetimepickercheckdate").on("dp.change", function (e) {
      $('#check_date').val(moment(e.date).format("DD/MM/YYYY"));
  });
  function ActualizarTablaProveedores(){
    $.ajax({
      type    : 'GET',
      url     : "{{ url('ObtenerTodos') }}",
      cache   : false,
      success : function(d){
        if(d.result_code==400){
          ShowItemMsg(d.result_content);
        }else if(d.result_code==201){
          console.log(d.result_content);
          $("#TablaProveedores").find("tr.rowcontent").remove();
          for (var i = 0; i < d.result_content.length; i++) {
            var dd = d.result_content[i];
            var row = '<tr id="fila_' + dd.id + '" class="rowcontent">' +
              '<td>' + dd.number + '</td>' +
              '<td>' + dd.prov_doc_type + '</td>' +
              '<td prov_doc_number="' + dd.prov_doc_number + '">' + dd.prov_doc_number + '</td>' +
              '<td prov_name="' + dd.prov_name + '">' + dd.prov_name + '</td>' +
              '<td>' + dd.prov_doc_detalle + '</td>' +
              '<td align=right>$' + number_format(dd.prov_doc_value) + '</td>' +
              '<td check_number="' + dd.check_number + '">' + dd.check_number + '</td>' +
              '<td>' + dd.check_bank + '</td>' +
              '<td>' + dd.check_date + '</td>' +
              '<td align=right>$' + number_format(dd.check_value) + '</td>' +
              '<td>' + dd.comment + '</td>' +
              '<td>' +
              '  <button class="glyphicon glyphicon-print" onclick="javascript: imprimir(' + dd.id + ');"></button>' +
              '  <button class="glyphicon glyphicon-trash" onclick="javascript: eliminar(' + dd.id + ');"></button>' +
              '  <button class="glyphicon glyphicon-pencil" onclick="javascript: editar(' + dd.id + ');"></button>' +
              '</td>' +
            '</tr>';
            $("#TablaProveedores").append(row);
          }
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



  //Organizar objetos
  var w = $(document.body)[0].clientWidth;
  var w2 = $("#tabla").css("width").replace('px','');
  w2 = (w - w2)/2;
  $("#tabla").css("margin-left", w2);
});

function imprimir(_id){
  if(_id!='' && _id!=undefined){
    var formData = { id: _id };
    var url = 'ImprimirComprobante/' + _id;
    var mywndws = window.open(url, '', 'width=720');
    mywndws.document.close();
    mywndws.focus();
    mywndws.print();
  }
}

function eliminar(_id){
  if(_id!='' && _id!=undefined){
    var formData = { id: _id };
    if(confirm("¿Está seguro(a) que desea eliminar el registro?")==true){
      $.ajax({
        type    : 'GET',
        url     : 'EliminarRegistroProveedor/' + _id,
        data    : formData,
        cache   : false,
        success : function(d){
          if(d.result_code==400){
            ShowItemMsg(d.result_content);
          }else if(d.result_code==201){
            ShowItemMsg(d.result_content);
            $("#fila_" + _id).hide('fast');
          }
        },
        error   : function(d){
          alert("Ha ocurrido un error y no se ha podido eliminar el registro");
        }
      });
    }
  }
}

function editar(_id){
  var formData = { id: _id };
  if(_id!='' && _id!=undefined){
    $.ajax({
      type    : 'GET',
      url     : 'ObtenerRegistroProveedor/' + _id,
      data    : formData,
      cache   : false,
      success : function(d){
        if(d.result_code==400){
          ShowItemMsg(d.result_content);
        }else if(d.result_code==201){
          var dd = d.result_content[0];
          $("#number").val(dd.number);
          $("#number").attr("value", dd.number);
          $("#last-number").html(dd.number);
          $("#_method").val("UPDATE");
          $("#prov_doc_number").val(dd.prov_doc_number);
          $("#prov_name").val(dd.prov_name);
          $("#prov_doc_detalle").val(dd.prov_doc_detalle);
          $("#prov_doc_value").val(dd.prov_doc_value);
          $("#prov_doc_date").val(dd.prov_doc_date);
          $("#check_number").val(dd.check_number);
          $("#check_value").val(dd.check_value);
          $("#check_bank").val(dd.check_bank);
          $("#check_date").val(dd.check_date);
          $("#comment").val(dd.comment);
          if(dd.payment_type=='EFECTIVO'){
            $(":radio[value=EFECTIVO]").attr('checked', true);
          }else if(dd.payment_type=='CHEQUE'){
            $(":radio[value=CHEQUE]").attr('checked', true);
          }
          $("#frm-proveedores").attr("action", "{{ url('ModificarProveedor') }}/"+_id);
          $("#frm-proveedores").focus();
        }
      },
      error   : function(d){
        ShowItemMsg("Ha ocurrido un error y no se ha podido obtener el registro");
      }
    });
  }
}
</script>
@endsection
