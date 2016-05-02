@extends('layout')

@section('title')
  Home
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                            {!! csrf_field() !!}

                            <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Voornaam*</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="firstname" value="{{ old('firstname') }}">

                                    @if ($errors->has('firstname'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('firstname') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Achternaam*</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="lastname" value="{{ old('lastname') }}">

                                    @if ($errors->has('lastname'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('lastname') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">E-Mail*</label>

                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-4 control-label">Leeftijd</label>
                                <div class="col-md-6">
                                    <input type="number" name="age" id="age" class="form-control input-md" alt="vul je leeftijd in" value="{{ old('age') }}">
                                     @if ($errors->has('age'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('age') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                                    
                                    
                            <div class="form-group">
                                <label class="col-md-4 control-label">Postcode</label>

                                <div class="col-md-6">
                                    <input type="number" name="postalcode" id="postcode" class="form-control input-md" alt="vul je postcode in" value="{{ old('postalcode') }}">@if ($errors->has('postalcode'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('postalcode') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                                    
                                
                            <div class="form-group">
                                <label class="col-md-4 control-label">Geslacht</label>

                                <div class="col-md-6">
                                    <select class="c-select form-control input-md" name="gender" alt="Duid je geslacht aan" value="{{old('gender')}}">
                                        <option value="1" alt="Man"     >Man</option>
                                        <option value="2" alt="Vrouw"   >Vrouw</option>
                                    </select>
                                    @if ($errors->has('gender'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('gender') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Wachtwoord*</label>

                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password">

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Bevestig wachtwoord*</label>

                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password_confirmation">

                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-user"></i>Register
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
