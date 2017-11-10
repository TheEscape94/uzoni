@extends('layouts.app')

@section('content')
    <section class="pull-left full-width search-map">
        <div class="full-width pull-left">
            <div id="map_canvas"></div>
        </div>
    </section>
    <div class="clr"></div>
    <section class="pull-left full-width filters">
        <div class="container">
            <form>
                <div class="row">
                    <div class="col-sm-8 filters-left">
                        <div class="form-group">
                            
                            <select id="changeCategory">
                                <option value="" selected disabled>@lang('wy.chose_cat')</option>
                                @foreach($mainCategories as $cat)
                                    @if(\Illuminate\Support\Facades\App::getLocale() == 'en')
                                        <optgroup label="{{ $cat->name_en }}">
                                    @else
                                        <optgroup label="{{ $cat->name_rs }}">
                                    @endif
                                    @foreach($cat->subGroups as $subCat)
                                        <option value="{{ $subCat->id }}" {{$subCat->id == app('request')->input('category') ? "selected" : ""}}>
                                            @if(\Illuminate\Support\Facades\App::getLocale() == 'en')
                                                {{ $subCat->name_en }}
                                            @else
                                                {{ $subCat->name_rs }}
                                            @endif
                                        </option>
                                    @endforeach
                                    </optgroup>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4 filters-right">
                        <div class="form-group">
                            <span class="pull-right filter-select" id="filters-trigger">@lang('wy.filters')</span>
                            <select class="pull-right" id="changeCity">
                                <option value="" selected disabled>@lang('wy.chose_city')</option>
                                @foreach($towns as $town)
                                    <option value="{{ $town->id }}" {{$town->id == app('request')->input('town') ? "selected" : ""}}>
                                        @if(\Illuminate\Support\Facades\App::getLocale() == 'en')
                                            {{ $town->name_en }}
                                        @else
                                            {{ $town->name_rs }}
                                        @endif
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row filters-expand">
                    <div class="col-sm-8 filters-expand-left">
                        <div class="form-group">
                            <div class="form-group-checkbox">
                                <input type="checkbox" id="distanceSort" {{ (app('request')->input('distSort') == "true")? "checked" : ""}}/>
                                <label for="distanceSort">@lang('wy.distance')</label>
                            </div>
                            <div class="form-group-checkbox">
                                <input type="checkbox" id="chk2" />
                                <label for="chk2">Najpopularniji</label>
                            </div>
                            <div class="form-group-checkbox">
                                <input type="checkbox" id="chk3" />
                                <label for="chk3">Po oceni</label>
                            </div>
                            <div class="clr"></div>
                            <div class="form-group-checkbox">
                                <input type="checkbox" id="nonstop" />
                                <label for="nonstop">@lang('wy.247')</label>
                                <!--(app('request')->input('nonstop') == "true")? "checked" : ""/> -->
                            </div>
                            <div class="form-group-checkbox">
                                <input type="checkbox" id="delivery" />
                                <!--(app('request')->input('delivery') == "true")? "checked" : ""/>-->
                                <label for="delivery">@lang('wy.home_delivery')</label>
                            </div>
<!--
                            <div class="form-group-checkbox">
                                <input type="checkbox" id="onlineBanking" {{ (app('request')->input('online') == "true")? "checked" : ""}}/>
                                <label for="onlineBanking">@lang('wy.online_paying')</label>
                            </div>
-->
                        </div>
                    </div>
                    <div class="col-sm-4 filters-expand-right">
                        <div class="form-group">
                            <input type="range" value="{{ (app('request')->input('distFilter'))? app('request')->input('distFilter') : "500"}}" id="distanceFilter" min="0" max="10000" list="filters-range" data-jcf='{"orientation": "horizontal", "range": "min"}' onchange="advancedSearch()" oninput="showVal(this.value)">
                            <div class="clr"></div>
                            <div class="pull-left" id="range">
                                {{ (app('request')->input('distFilter'))? app('request')->input('distFilter') : "500"}}
                            </div>
                            <div class="pull-right">10km</div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <div class="clr"></div>
    <section class="full-width pull-left results">
        @foreach ($data as $item)
            <div class="results-box results-type-one">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <a href="/{{\Illuminate\Support\Facades\App::getLocale()}}/profil/{{$item->id}}/{{$item->company_name}}" style="text-decoration: none;">
                                <div class="user-image" id="c_img_{{ $item->company_id }}">
                                @if(isset($item->user->user_image))
                                    <img src="/{{$item->user->user_image}}" alt="">
                                @else
                                    <img src="/img/user/user-default.png" alt="">
                                @endif
                                <div class="user-level">
                                    <img src="/img/user/level-gold.png"  alt="" />
                                </div>
                                </div></a>
                            <div class="results-user-data">
                                <a href="/{{\Illuminate\Support\Facades\App::getLocale()}}/profil/{{$item->id}}/{{$item->company_name}}" style="text-decoration: none;">
                                    <h4 id="c_name_{{ $item->company_id }}">{{$item->company_name}}</h4>
                                </a>
                                <div class="clr"></div>
                                {{--<div class="rate">--}}
                                    {{--<ul>--}}
                                        {{--<li class="rated"></li>--}}
                                        {{--<li class="rated"></li>--}}
                                        {{--<li class="rated"></li>--}}
                                        {{--<li class="rated"></li>--}}
                                        {{--<li class=""></li>--}}
                                    {{--</ul>--}}
                                {{--</div>--}}
                                <div class="clr"></div>
                                <p class="results-job" id="c_prof_{{ $item->company_id }}">{{$item->categoryRelation->name_rs}}</p>
                            </div>
                            <div class="results-user">
                                <ul class="results-user-list">
                                    @if($item->nonstop)
                                        <li><img src="/img/user/time-icon.jpg" alt="" /></li>
                                    @endif
                                    @if($item->home_delivery)
                                        <li><img src="/img/user/delivery-icon.jpg" alt="" /></li>
                                    @endif
                                    {{--@if($item->online_banking)--}}
                                            {{--<li><img src="/img/user/pay-icon.png" alt="" /></li>--}}
                                    {{--@endif--}}
                                    {{--<li><img src="/img/user/quality-icon.jpg" alt="" /></li>--}}
                                </ul>

                                @if(!empty($item->hours))
                                    @if($item->nonstop)
                                        <?php $text = 'wy.openedAtm'; ?>
                                    @else
                                    <?php $text = 'wy.closedAtm'; ?>
                                    @foreach($item->hours as $hour)
                                        @if($hour->weekday == $day && $time > $hour->working_from && $time < $hour->working_to)
                                            <?php $text = 'wy.openedAtm'; ?>
                                        @endif
                                    @endforeach
                                    @endif
                                    <p class="results-user-active" id="@lang($text)">@lang($text)</p>
                                @endif
                                {{--<div class="clr"></div>--}}
                                {{--<span class="results-user-range">700m</span>--}}
                            </div>
                            <div class="results-contacts">
                                @if($item->address)
                                    <div class="results-address-expand-box">
                                        <div class="results-address-box">
                                            <div class="full-width pull-left results-address-icon"></div>
                                            <div class="clr"></div>
                                            <p class="special-address">{{$item->address}},</p>
                                            <p>{{$item->townRelation->name_rs}}</p>
                                        </div>
                                        <div class="results-address-box">
                                            <div class="full-width pull-left results-address-icon phone"></div>
                                            <div class="clr"></div>
                                            <p>{{$item->phone}}</p>
                                        </div>
                                    </div>
                                @endif
                                <div class="results-address-expand">
                                    @if($item->address_2)
                                        <div class="results-address-expand-box">
                                            <div class="results-address-box">
                                                <div class="full-width pull-left results-address-icon"></div>
                                                <div class="clr"></div>
                                                <p class="special-address">{{$item->address_2}},</p>
                                                <p>{{$item->town2Relation->name_rs}}</p>
                                            </div>
                                            <div class="results-address-box">
                                                <div class="full-width pull-left results-address-icon phone"></div>
                                                <div class="clr"></div>
                                                <p>{{$item->phone_2}}</p>
                                            </div>
                                        </div>
                                    @endif
                                    @if($item->address_3)
                                        <div class="results-address-expand-box">
                                            <div class="results-address-box">
                                                <div class="full-width pull-left results-address-icon"></div>
                                                <div class="clr"></div>
                                                <p class="special-address">{{$item->address_3}},</p>
                                                <p>{{$item->town3Relation->name_rs}}</p>
                                            </div>
                                            <div class="results-address-box">
                                                <div class="full-width pull-left results-address-icon phone"></div>
                                                <div class="clr"></div>
                                                <p>{{$item->phone_3}}</p>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                @if($item->address_2 || $item->address_3)
                                    <div class="results-address-trigger"></div>
                                @endif
                            </div>
                            @if(Auth::user() != null && Auth::user()->id != $item->user->id)
                                <div class="pull-right results-message">
                                    <a href="#" class="open-send-message" data-sender="{{ $item->company_id }}">@lang('wy.send_message')</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        {{--<div class="row full-width pagination">--}}
            {{--<div class="col-xs-12">--}}
                {{--<ul class="pull-left full-width">--}}
                    {{--<li class="active"><a href="#">1</a></li>--}}
                    {{--<li><a href="#">2</a></li>--}}
                    {{--<li><a href="#">3</a></li>--}}
                    {{--<li><a href="#">4</a></li>--}}
                    {{--<li><a href="#">5</a></li>--}}
                {{--</ul>--}}
            {{--</div>--}}
        {{--</div>--}}
        <input type="hidden" id="usersLat" value="0">
        <input type="hidden" id="usersLng" value="0">
    </section>
    <script>
        var usersLat;
        var usersLng;

        @if(app('request')->input('town') != "" && app('request')->input('town') != null)
                usersLat = {{$towns[app('request')->input('town') - 1]->lat}};
                usersLng = {{$towns[app('request')->input('town') - 1]->lng}};

                var userLocationData = { 'lat': usersLat, 'lng': usersLng, 'city': true };

                localStorage.setItem('userLocationData', JSON.stringify(userLocationData));

                setTimeout(function(){initMap();}, 500);
        @else
                setTimeout(function(){saveUserCoordinates();}, 500);
        @endif

        function initMap() {
            var uluru = {lat: Number(usersLat), lng: Number(usersLng)};
            var infowindow = new google.maps.InfoWindow();
            var marker, i;
            var locations = [];
            
            locations.push(["User location", usersLat, usersLng, true]);

            @foreach ($data as $item)
                var pinIcon = '{{isset($item->categoryRelation->map_pin) ? $adminUrl . "/" . $item->categoryRelation->map_pin : "http://maps.google.com/mapfiles/ms/icons/blue-dot.png"}}';

                var popup = '<div class="popup-custom-content"><h1>{{$item->company_name}}</h1>';
                popup += '<h3>{{isset($item->categoryRelation->name_rs) ? $item->categoryRelation->name_rs : ""}}</h3>';
                popup += '<ul><li><p><span>Adresa</span></p><p>{{$item->address}}</p></li>';
                popup += '<li><p><span>Telefon</span></p><p>{{$item->phone}}</p></li></ul>';
                popup += '<a href="/{{\Illuminate\Support\Facades\App::getLocale()}}/profil/{{$item->id}}/{{$item->company_name}}">Detaljnije</a></div>';


                @if($item->first_lat != null)
                    locations.push([popup, "{{$item->first_lat}}", "{{$item->first_lng}}", false, pinIcon]);
                @endif
                @if($item->second_lat != null)
                    locations.push([popup, "{{$item->second_lat}}", "{{$item->second_lng}}", false, pinIcon]);
                @endif
                @if($item->third_lat != null)
                    locations.push([popup, "{{$item->third_lat}}", "{{$item->third_lng}}", false, pinIcon]);
                @endif
            @endforeach

            var map = new google.maps.Map(document.getElementById('map_canvas'), {
                zoom: 7,
                center: uluru,
                scrollwheel: false
            });

            for (i = 0; i < locations.length; i++) {
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                    map: map
                });

                if(!locations[i][3]){
                    marker.setIcon(locations[i][4]);
                }
                
                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                        infowindow.setContent(locations[i][0]);
                        infowindow.open(map, marker);
                    }
                })(marker, i));
                var default_r = parseInt(document.getElementById('range').innerHTML);
                if(i == 0){
                    // Add circle overlay and bind to marker
                    var circle = new google.maps.Circle({
                      map: map,
                      radius: default_r,    // 10 miles in metres
                      strokeColor: '#FF0000',
                        strokeOpacity: 0.35,
                        strokeWeight: 1,
                        fillColor: '#FF0000',
                        fillOpacity: 0.35
                    });
                    circle.bindTo('center', marker, 'position');
                }
            }
        }

        function locationHandler(position) {
            usersLat = position.coords.latitude;
            usersLng = position.coords.longitude;

            var userLocationData = { 'lat': usersLat, 'lng': usersLng, 'city': false };
            
            localStorage.setItem('userLocationData', JSON.stringify(userLocationData));
            
            initMap();
        }

        function saveUserCoordinates(){
            var userLocationData = localStorage.getItem('userLocationData');
                userLocationData = JSON.parse(userLocationData);

            if(userLocationData){
                if(!userLocationData.city){
                    usersLat = userLocationData.lat;
                    usersLng = userLocationData.lng;
                }
                else{
                    navigator.geolocation.getCurrentPosition(locationHandler,
                        function (error) {
                            if (error.code == error.PERMISSION_DENIED) {
                                usersLat = 44.808156;
                                usersLng = 20.456343;
                            }
                        });
                }
            }
            else{
                navigator.geolocation.getCurrentPosition(locationHandler,
                    function (error) {
                        if (error.code == error.PERMISSION_DENIED){
                            usersLat = 44.808156;
                            usersLng = 20.456343;
                        }
                    });
            }
            setTimeout(function(){initMap();}, 500);

        }
        
    </script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBirnZ7HNdfWrk3VePYb6ottoRPwgrtQrQ">
    </script>
@endsection