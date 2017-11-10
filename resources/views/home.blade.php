@extends('layouts.app') @section('content')
<section class="pull-left full-width main-search">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2 col-md-8">
                <center>
                    <form class="pull-left full-width" method="GET" action="/{{\Illuminate\Support\Facades\App::getLocale()}}/osnovna-pretraga">
                        <input type="submit" name="" value=" " />
                        <input type="text" name="search" placeholder="@lang('my.search')..." />
                         <select name="town" class="open-main-search-dropdown">
                                @foreach ($towns as $town)
                                    <option class="hide" value="{{$town->id}}">
                                    @if(\Illuminate\Support\Facades\App::getLocale() == 'en')
                                        {{ $town->name_en }}
                                    @else
                                        {{ $town->name_rs }}
                                    @endif
                                    </option>
                                @endforeach
                            </select>
                        <div class="main-search-dropdown">
                             @foreach ($towns as $town)
                                    <p id="{{$town->id}}">
                                    @if(\Illuminate\Support\Facades\App::getLocale() == 'en')
                                        {{ $town->name_en }}
                                    @else
                                        {{ $town->name_rs }}
                                    @endif
                                    </p>
                                @endforeach
                        </div>
                    </form>
                </center>
            </div>
        </div>
    </div>
</section>
<div class="clr"></div>
<section class="pull-left full-width categories">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 categories-head">
                <div class="categories-star">
                    <i class="fa fa-star custom-star" aria-hidden="true"></i>
                </div>
                @if(\Illuminate\Support\Facades\App::getLocale() == 'en')
                <h1>Popular categories</h1>
                @else
                <h1>Popularne kategorije</h1>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-3 col-md-3 categories-box">
                <a href="/{{\Illuminate\Support\Facades\App::getLocale()}}/pretraga/1">
                    <h4 class="categories-title">Vodoinstalater</h4>
                    <div class="clr"></div>
                    <div class="categories-img">
                        <img src="/img/category1.jpg" alt="" />
                    </div>
                </a>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3 categories-box">
                <a href="/{{\Illuminate\Support\Facades\App::getLocale()}}/pretraga/8">
                    <h4 class="categories-title">Automehanicar</h4>
                    <div class="clr"></div>
                    <div class="categories-img">
                        <img src="/img/category2.jpg" alt="" />
                    </div>
                </a>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3 categories-box">
                <a href="/{{\Illuminate\Support\Facades\App::getLocale()}}/pretraga-po-kategorijama/5">
                    <h4 class="categories-title">Nekretnine</h4>
                    <div class="clr"></div>
                    <div class="categories-img">
                        <img src="/img/category3.jpg" alt="" />
                    </div>
                </a>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3 categories-box">
                <a href="/{{\Illuminate\Support\Facades\App::getLocale()}}/pretraga-po-kategorijama/2">
                    <h4 class="categories-title">Auto</h4>
                    <div class="clr"></div>
                    <div class="categories-img">
                        <img src="/img/category1.jpg" alt="" />
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
<div class="clr"></div>
<section class="pull-left full-width store">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-4">
                <div class="store-img">
                    <img src="/img/google-store.jpg" alt="" />
                </div>
            </div>
            <div class="col-xs-12 col-sm-8 col-md-8 store-text">
                @if(\Illuminate\Support\Facades\App::getLocale() == 'en')
                <h3>Download mobile application</h3>
                @else
                <h3>Preuzmite mobilnu aplikaciju</h3>
                @endif
                <div class="clr"></div>
                <p style="visibility: hidden;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <div class="clr"></div>
                @if(\Illuminate\Support\Facades\App::getLocale() == 'en')
                <a href="/en/404" class="store-download">Download here</a> @else
                <a href="/rs/404" class="store-download">Preuzmi ovde</a> @endif
                <img src="/img/google-store-logo.jpg" class="store-logo" alt="Google Store" />
            </div>
        </div>
    </div>
</section>
@endsection
