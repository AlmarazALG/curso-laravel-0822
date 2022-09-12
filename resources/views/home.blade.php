@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    

                    <div>
                        {{trans('app.home.logged_in')}}
                    </div>
                        <br>
                    <div>
                        <a href="{{route('empleado.index')}}" class="btn btn-info btn-block" > {{trans('app.home.go_to_employes')}}</a>
                    </div>
                        <br>
                    <div>
                        <a href="{{ route('datoContacto.index') }}" class="btn btn-info btn-block" >{{trans('app.home.go_to_contact_info')}}</a>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
