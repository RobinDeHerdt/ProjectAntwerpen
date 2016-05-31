@extends('layout')

@section('title')
  Bewerk project
@stop

@section('scripts')
@stop
@section('content')
        <div class="col-md-6 col-md-offset-3">
        <div class="returnlink">
            <a href="/profiel">Profiel</a>
            <a href="/overzicht">Overzicht</a>
        </div>
            <div class="panel panel-default loginform">
                <div class="panel-heading">Profielfoto</div>
                <div class="panel-body">
                    <span>Dit is je huidige profielfoto: </span>
                    <br>
                    <img src="{{$user->profileimage}}" class="profielfoto">
                    <br>
                    <span>Je kan hier een nieuwe profielfoto toevoegen:</span>
                    <form class="form-horizontal uploadimage" role="form" method="POST" action="" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <div class="col-md-6">
                                <input type="file" name="profileimage">
                                @if ($errors->has('profileimage'))
                                    <span class="help-block">
                                        <strong class="validationerror">{{ $errors->first('profileimage') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        <i class="fa fa-btn btn-clock"></i>Bevestigen
                                    </button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
@stop
        