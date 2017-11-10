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
                        <p>@lang('my.registration_registration') <br/><span>@lang('my.registration_company')</span></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="register-body">
                        <form action="{{ url('/register') }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="is_company" value="1">
                            <h2>@lang('my.basic_info'):</h2>
                            <div class="form-group">
                                <input type="text" name="company_name" value="{{ old('company_name') }}" placeholder="@lang('my.company_name')">
                                @if ($errors->has('company_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('company_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <select name="category">
                                    <option selected disabled>@lang('my.category')</option>
                                    @foreach($mainCategories as $categry)
                                        <option value="{{ $categry->id }}">
                                            @if(\Illuminate\Support\Facades\App::getLocale() == 'en')
                                                {{ $categry->name_en }}
                                            @else
                                                {{ $categry->name_rs }}
                                            @endif
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('category'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </span>
                                @endif
                            </div>
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
                            <div class="form-group half">
                                <input type="text" name="phone" value="{{ old('phone') }}" placeholder="@lang('my.phone')">
                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <style>
                                .optional-input input::-webkit-input-placeholder { /* WebKit, Blink, Edge */
                                    color: #a8a8a8;
                                }
                            </style>
                            <div class="pull-right form-group half optional-input">
                                <input type="text" name="fax" value="{{ old('fax') }}" placeholder="@lang('my.fax_optional')">
                            </div>
                            <div class="form-group">
                                <input type="text" name="address" value="{{ old('address') }}" placeholder="@lang('my.address')">
                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group two-third">
                                <select name="town">
                                    <option>@lang('my.town')</option>
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
                            <div class="pull-right form-group one-third">
                                <input type="text" name="zip" value="{{ old('zip') }}" placeholder="@lang('my.zip')">
                                @if ($errors->has('zip'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('zip') }}</strong>
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
                                <input type="submit" name="register" value="@lang('my.register')">
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
