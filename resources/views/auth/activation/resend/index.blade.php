@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Resend activation email.</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{route('activation.resend.store')}}">
                        {{csrf_field()}}

                        <div class="form-group{{$errors->has('email') ? ' has-error' : ''}}">
                            <label for="email" class="col-md-8 control-label"> E-mail Address</label>
                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control" name="email" value="{{old('email')}}">
                                @if($errors->has('email'))
                                    <span class="help-block">
                                    <stron>{{$errors->first('email')}}</stron>
                                </span>
                                @endif

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary"> Resend</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
