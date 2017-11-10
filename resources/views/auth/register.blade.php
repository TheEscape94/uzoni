@extends('layouts.app')

@section('content')
    <section class="pull-left full-width register">
        <div class="full-width register-background"></div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="register-head">
                        <span class="register-dec"></span>
                        <div class="clr"></div>
                        <p>@lang('my.registration_registration') <br/><span>@lang('my.registration_user')</span></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="register-body">
                        <form role="form" method="POST" action="{{ url('/register') }}">
                            {{ csrf_field() }}
                            <h2>@lang('my.basic_info'):</h2>
                            <div class="form-group half">
                                <input type="text" name="name" value="{{ old('name') }}" placeholder="@lang('my.name')">
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="pull-right form-group half">
                                <input type="text" name="lname" value="{{ old('lname') }}" placeholder="@lang('my.lname')">
                                @if ($errors->has('lname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lname') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <select name="town">
                                    <option value="" disabled selected>@lang('my.town')</option>
                                    @foreach ($towns as $town)
                                        <option value="{{$town->id}}">
                                            @if(\Illuminate\Support\Facades\App::getLocale() == 'en')
                                                {{ $town->name_en }}
                                            @else
                                                {{ $town->name_rs }}
                                            @endif
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('town'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('town') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <h2>@lang('my.access_data'):</h2>
                            <div class="form-group">
                                <input type="text" name="email" value="{{ old('email') }}" placeholder="Email">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group half">
                                <input type="password" name="password" placeholder="@lang('my.password')">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="pull-right form-group half">
                                <input type="password" name="password_repeat" placeholder="@lang('my.password_repeat')">
                                @if ($errors->has('password_repeat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_repeat') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" value="@lang('my.register')">
                            </div>
                            <div class="register-note">
                                <p>@lang('my.register_note')</p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
