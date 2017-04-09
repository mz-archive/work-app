@extends('home')

@section('table')
            
            <!-- Basic Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Клиенты
                                <small>Список всех клиентов зарегистрированных в системе</small>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="{{ route('addClient') }}">Добавить клиента</a></li>
                                        <li><a href="javascript:void(0);">Удалить всех</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body table-responsive">

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>№</th>
                                        <th>Имя</th>
                                        <th>Телефон</th>
                                        <th>E-mail</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <!-- Цикл foreach -->

                                @foreach ($clients as $key => $client)
                                    <tr>
                                        <th scope="row">{{$key+1}}</th>
                                        <td>{{ $client->name }}</td>
                                        <td>{{ $client->phone }}</td>
                                        <td>{{ $client->email }}</td>
                                        <td>

                                        <form style="float: left; margin-right: 5px;" method="POST" action="<?php echo route('editclient', ['id' => $client->id]); ?>">
                                            <button type="submit" name="id_edit" value="{{$client->id}}" class="btn btn-danger btn-circle waves-effect waves-circle waves-float">
                                                <i class="material-icons">mode_edit</i>
                                            </button>
                                            {{ csrf_field() }}
                                        </form>

                                        <form method="POST" action="<?php echo route('delrecord', ['id' => $client->id]); ?>">

                                            <button type="submit" name="id_del" value="{{$client->id}}" class="btn btn-warning btn-circle waves-effect waves-circle waves-float">
                                                <i class="material-icons">delete_forever</i>
                                            </button>
                                            {{ csrf_field() }}
                                        </form>

                                        </td>
                                    </tr>
                                @endforeach
                                

                                </tbody>
                            </table>
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Table -->
@endsection
