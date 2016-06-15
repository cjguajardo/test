@extends('layouts.base')

@section('content')

<form name="registro" id="registro" action="{{ url('RegistrarUsuario') }}" method="post">
  <div style="width:400px; align-content:right; border:thin solid #CCC;">
    {{ csrf_field() }}
    <table width="400px">
    <tr>
      <td><label for="username">Nombre de Usuario</label>
      <td><input type="text"   name="username"  id="username" /></td>
    </tr>
    <tr>
      <td><label for="password1">Contraseña</label></td>
      <td><input type="text"   name="password1" id="password1" /></td>
    </tr>
    <tr>
      <td><label for="password2">Confirma tu contraseña</label></td>
      <td><input type="text"   name="password2" id="password2" /></td>
    </tr>
    <tr>
      <td colspan=2><input type="submit" name="enviar" value="Registrar"  /></td>
    </tr>
    </table>
  </div>
</form>

@stop
