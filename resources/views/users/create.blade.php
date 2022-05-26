@extends('layouts.main', ['activePage' => 'usuarios', 'titlePage' => 'Nuevo Usuario'])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="{{route('users.store')}}" method="post" class="form-horizontal">
                    @csrf
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-tittle">Crear Usuario</h4>
                            <p class="card-category">Ingresar datos</p>
                        </div>
                        {{ $errors }}
                        <div class="card-body">
                          {{--  @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif--}}
                            <div class="row">
                                <div class="col-12 text-right">
                                    <a href="{{ url()->previous() }}" class="btn btn-facebook"><i class="material-icons">arrow_back</i></a>
                                </div>
                            </div>
                            <div class="row">
                                <label for="name" class="col-sm-2 col-form-label">Nombre</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="name" placeholder="Ingrese el nombre" value="{{old('name')}}" autofocus>
                                    @if ($errors->has('name'))
                                        <span class="error text-danger" for="input-name">{{$errors -> first('name')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="rut" class="col-sm-2 col-form-label">RUT</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="rut" placeholder="Ingrese el RUT" value="{{old('rut')}}">
                                    @if ($errors->has('rut'))
                                        <span class="error text-danger" for="input-rut">{{$errors -> first('rut')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="email" class="col-sm-2 col-form-label">Correo</label>
                                <div class="col-sm-7">
                                    <input type="email" class="form-control" name="email" placeholder="Ingrese el correo" value="{{old('email')}}">
                                    @if ($errors->has('email'))
                                        <span class="error text-danger" for="input-email">{{$errors -> first('email')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="password" class="col-sm-2 col-form-label">Contraseña</label>
                                <div class="col-sm-7">
                                    <input type="password" class="form-control" name="password" placeholder="Contraseña">
                                    @if ($errors->has('password'))
                                        <span class="error text-danger" for="input-password">{{$errors -> first('password')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="rol" class="col-sm-2 col-form-label">Establecimiento</label>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <select class="form-control selectpicker" data-style="btn btn-link" id="exampleFormControlSelect1" name="establecimiento">
                                          @foreach ( $establecimiento as $establecimiento )
                                            <option value="{{ $establecimiento->id }}">{{ $establecimiento->establecimiento }}</option>
                                          @endforeach
                                        </select>
                                      </div>
                                </div>
                            </div>
                            <div class="row">
                                <label for="subrogante" class="col-sm-2 col-form-label">Subrogante</label>
                                <div class="col-sm-7">
                                    <input type="subrogante" class="form-control" name="subrogante" placeholder="Subrogante del referente (en caso de no tener, dejar vacio)">
                                    @if ($errors->has('subrogante'))
                                        <span class="error text-danger" for="input-subrogante">{{$errors -> first('subrogante')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="correo_subrogante" class="col-sm-2 col-form-label">Correo subrogante</label>
                                <div class="col-sm-7">
                                    <input type="correo_subrogante" class="form-control" name="correo_subrogante" placeholder="Correo de la persona subrogante (en caso de no tener, dejar vacio)">
                                    @if ($errors->has('correo_subrogante'))
                                        <span class="error text-danger" for="input-correo_subrogante">{{$errors -> first('correo_subrogante')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="rol" class="col-sm-2 col-form-label">Subdireccion</label>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <select class="form-control selectpicker" data-style="btn btn-link" id="exampleFormControlSelect1" name="id_subdireccion">
                                          @foreach ( $subdirecciones as $subdireccion )
                                            <option value="{{ $subdireccion->id }}">{{ $subdireccion->nombre_subdireccion }}</option>
                                          @endforeach
                                        </select>
                                      </div>
                                </div>
                            </div>
                            <div class="row">
                                <label for="rol" class="col-sm-2 col-form-label">Departamento</label>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <select class="form-control selectpicker" data-style="btn btn-link" id="exampleFormControlSelect1" name="id_departamento">
                                          @foreach ( $departamentos as $departamento )
                                            <option value="{{ $departamento->id }}">{{ $departamento->nombre_departamento }}</option>
                                          @endforeach
                                        </select>
                                      </div>
                                </div>
                            </div>
                            <div>
                                <label for="roles" class="col-sm-2 col-form-label">Roles</label>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <div class="tab-content">
                                            <div class="tab-pane active">
                                                <table class="table">
                                                    <tbody>
                                                        @foreach($roles as $id => $role)
                                                        <tr>
                                                            <td>
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input" type="checkbox" name="roles[]"
                                                                            value="{{ $id }}">
                                                                        <span class="form-check-sign">
                                                                            <span class="check"></span>
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                {{ $role }}
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--footer-->
                        <div class="card-footer ml-auto mr-auto">
                            <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
                        </div>
                        <!--End footer-->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
