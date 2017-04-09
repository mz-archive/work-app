@extends('home')

@section('editfield')

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">

                            <div class="header">
                                @foreach($data as $client)
                                    <h2>Редактрование клиента: <b>{{ $client->name }}</b></h2>
                                @endforeach
                                <p style="color: green;"><b>{{ $msg }}</b></p>

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

                            <form style="padding-left: 200px; padding-top: 20px;" method="POST" action="{{ route('editrecord') }}">
                                <div class="row clearfix">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">person_pin</i>
                                        </span>
                                            <div class="form-line">
                                            @foreach($data as $client)
                                                <input type="text" value="{{ $client->name }}" name="name"  class="form-control">
                                            @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">phone_iphone</i>
                                        </span>
                                            <div class="form-line">
                                            @foreach($data as $client)
                                                <input onFocus="mask();" type="text" value="{{ $client->phone }}" name="phone" placeholder="+7 (000) 000-00-00" class="form-control mobile-phone-number">
                                            @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">email</i>
                                        </span>
                                            <div class="form-line">
                                            @foreach($data as $client)
                                                <input type="email" value="{{ $client->email }}" name="email" class="form-control">
                                            @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                    @foreach($data as $client)
                                        <button type="submit" name="id_btn" value="{{ $client->id }}" class="btn btn-primary btn-lg m-l-15 waves-effect">Сохранить</button>
                                    @endforeach
                                    </div>
                                </div>
                                {{ csrf_field() }}
                            </form>

                        </div>
                    </div>
                </div>

                <script type="text/javascript">
                    function mask(){
                         $(".mobile-phone-number").inputmask("999-9999999");
                    }
                </script>

@endsection