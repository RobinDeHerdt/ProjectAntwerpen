@extends('layout')

@section('title')
  Bewerk profiel
@stop

@section('content')
<div class="container">
    <div class="row centered-form">
        <div class="col-md-8 col-md-offset-2">
            <div class="returnlink">
                <a href="/profiel">Terug naar profiel</a>
            </div>
            <div class="panel panel-default loginform">
                <div class="panel-heading">Bewerken</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/bewerkprofiel') }}" enctype="multipart/form-data">
                            {!! csrf_field() !!}

                            <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Voornaam*</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="firstname" value="{{ $user->firstname}}">

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
                                    <input type="text" class="form-control" name="lastname" value="{{ $user->lastname}}">

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
                                    <input type="email" class="form-control" name="email" value="{{ $user->email }}">

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
                                    <input type="number" name="age" id="age" class="form-control input-md" alt="vul je leeftijd in" value="{{ $user->age }}">
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
                                    <input type="number" name="postalcode" id="postcode" class="form-control input-md" alt="vul je postcode in" value="{{ $user->postalcode }}">@if ($errors->has('postalcode'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('postalcode') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-4 control-label">Geslacht</label>

                                <div class="col-md-6">
                                    <select class="c-select form-control input-md" name="gender" id="gender" alt="Duid je geslacht aan" value="{{ $user->gender_1male_2female }}">
                                        <option value="0"></option>
                                        <option value="1" alt="Man">Man</option>
                                        <option value="2" alt="Vrouw">Vrouw</option>
                                    </select>
                                    @if ($errors->has('gender'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('gender') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Profielfoto</label>
                                <div class="col-md-6">
                                    <p>Dit is je huidige profielfoto: </p>
                                	<img src="{{$user->profileimage}}" class="btn-block">
                                	<p>Je kan hier een andere profielfoto uploaden: </p>
                                    <input type="file" name="profileimage">

                                    @if ($errors->has('profileimage'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('profileimage') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        <i class="fa fa-btn"></i>Wijzigingen opslaan
                                    </button>
                                </div>
                            </div>
                            <p class="col-md-6 col-md-offset-4">Velden met een * zijn verplicht in te vullen.</p>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    document.getElementById("gender").value = "{{$user->gender_1male_2female}}";
</script>
@endsection
