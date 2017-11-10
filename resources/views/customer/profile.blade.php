@extends('layouts.app')

@section('content')
    <section class="pull-left full-width user-profile">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 user-head">
                    <div class="user-image open-file">
                        @if(isset($user->user_image))
                            <img src="/{{$user->user_image}}" alt="">
                        @else
                            <img src="/img/user/user-default.png" alt="">
                        @endif
                    </div>
                    <div class="user-data">
                        <p>{{\Auth::user()->name}} {{\Auth::user()->lname}}</p>
                        <div class="clr"></div>
                        <span>@lang('my.user')</span>
                    </div>
                    <div class="user-data hide">
                        <form method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <span style="margin-bottom: 5px;">@lang('my.change_image')</span>
                            <input class="add-profile-img" type="file" name="userImage" onchange="this.form.submit()" placeholder="petar">
                        </form>
                    </div>
                </div>
            </div>
<!--
            <div class="row">
                <div class="col-xs-12 col-sm-7 user-selling">
                    <h4>@lang('my.shopping_list')</h4>
                    <ul>
                        <li class="date">Danas</li>
                        <li class="hour">15:43</li>
                        <li class="name">Vodoinstalater - <span>Ime Prezime</span></li>
                    </ul>
                    <ul>
                        <li class="date">28.11.2016</li>
                        <li class="hour">08:58</li>
                        <li class="name">Bravar - <span>Ime Prezime</span></li>
                    </ul>
                </div>
            </div>
-->
        </div>
    </section>

@endsection

