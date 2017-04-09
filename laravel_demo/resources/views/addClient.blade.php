@extends('home')

@section('addfield')
            <!-- Inline Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Добавление клиента
                            </h2>
                            <p style="color: blue;"><b>{{ $data }}</b></p>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="{{ route('clients') }}">Список клиентов</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                        
                            <form style="padding-left: 200px;" method="POST" action="{{ route('addClient') }}">
                                <div class="row clearfix">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">person_pin</i>
                                        </span>
                                            <div class="form-line">
                                                <input type="text" name="name" class="form-control" placeholder="Имя">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">phone_iphone</i>
                                        </span>
                                            <div class="form-line">
                                                <input type="text" name="phone" class="form-control" placeholder="Телефон">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">email</i>
                                        </span>
                                            <div class="form-line">
                                                <input type="email" name="email" class="form-control" placeholder="E-mail">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                        <button type="submit" class="btn btn-primary btn-lg m-l-15 waves-effect">Добавить клиента</button>
                                    </div>
                                </div>
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Inline Layout -->
@endsection