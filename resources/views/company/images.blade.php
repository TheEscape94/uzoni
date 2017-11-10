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
                        @if(\Illuminate\Support\Facades\App::getLocale() == 'en')
                            <p>Profile <br/><span>Settings</span></p>
                        @else
                            <p>Podesavanje <br/><span>Profila</span></p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="register-body">
                        <div class="form-group">
                            <form method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <label>@lang('my.change_image')</label><br>
                                <input type="file" name="userImage" onchange="this.form.submit()">
                                @if(isset($companyDetail->user->user_image))
                                    <img src="/{{$companyDetail->user->user_image}}" style="margin: -45px 0 0 50px;">
                                @endif
                            </form>
                        </div>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <div class="form-group">
                            <form method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <label>@lang('my.add_images')</label><br>
                                <input type="file" name="optionalImage" onchange="this.form.submit()">
                                <br>
                                <br>
                                @foreach($images as $image)
                                    <img width="96" src="/{{$image->user_image}}">
                                @endforeach
                            </form>
                        </div>

                        <div class="register-note">
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection