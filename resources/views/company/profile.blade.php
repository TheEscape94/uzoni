@extends('layouts.app') @section('content')
    <section class="pull-left full-width user-profile">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 user-head">
                    <div class="user-image add-profile-img">
                        @if(isset($companyDetail->user->user_image))
                            <img src="/{{$companyDetail->user->user_image}}" alt=""> @else
                            <img style="border: 2px solid #22b25b;" src="/img/user/user-default.png" alt=""> @endif
                        <div class="user-level"><img src="/img/user/level-gold.png" alt=""/></div>
                    </div>
                    <!--                    add company profile img-->
                    <form class="hide" method="post" enctype="multipart/form-data"
                          action="/{{\Illuminate\Support\Facades\App::getLocale()}}/profil-kompanije/izmena-slika">
                        {{ csrf_field() }}
                        <label>@lang('my.change_image')</label><br>
                        
                        @if(Auth::check() && $companyDetail->company_id == \Illuminate\Support\Facades\Auth::user()->id)
                         <input type="file" id="add-profile-img" name="userImage"
                               onchange="this.form.submit()"> @if(isset($companyDetail->user->user_image))
                            <img src="/{{$companyDetail->user->user_image}}" style="margin: -45px 0 0 50px;"> @endif
                        @endif
                        
                    </form>
                    <div class="user-data">
                        <p>{{$companyDetail->company_name}}</p>
                        <div class="clr"></div>
                        <span>@if(isset($companyDetail->categoryRelation)){{$companyDetail->categoryRelation->name_rs}}@endif</span>
                        <div class="clr"></div>
                        <ul>
                            @if(isset($companyDetail->category2Relation))
                                <li>{{$companyDetail->category2Relation->name_rs}}</li>@endif @if(isset($companyDetail->category3Relation))
                                <li>{{$companyDetail->category3Relation->name_rs}}</li>@endif
                        </ul>
                    </div>
                    {{--
                    <div class="rate">--}} {{--
                    <ul>--}} {{--
                        <li class="rated"></li>--}} {{--
                        <li class="rated"></li>--}} {{--
                        <li class="rated"></li>--}} {{--
                        <li class="rated"></li>--}} {{--
                        <li class=""></li>--}} {{--
                    </ul>--}} {{--
                    <div class="clr"></div>--}} {{--
                    <span>4.0</span>--}} {{--
                </div>--}} @if(Auth::user() != null && Auth::user()->id != $companyDetail->user->id)
                        <div class="pull-right send-message">
                            <a href="#" class="open-send-message"
                               data-sender="{{ $companyDetail->company_id }}">@lang('wy.send_message')</a>
                        </div>
                    @endif
                </div>
            </div>
            <div class="row user-contacts">
                <div class="col-sm-4 col-md-4 address">
                    <h5>@lang("my.contact")</h5>
                    <div class="clr"></div>
                    <ul>
                        <li>
                            <p>
                                <span>@if(isset($companyDetail->townRelation)){{$companyDetail->townRelation->name_rs}}@endif</span>
                            </p>
                            <p>{{$companyDetail->address}}</p>
                            <p><span>{{$companyDetail->phone}}</span></p>
                        </li>
                    </ul>
                    <ul>
                        <li>
                            <p>
                                <span>@if(isset($companyDetail->town2Relation)){{$companyDetail->town2Relation->name_rs}}@endif</span>
                            </p>
                            <p>{{$companyDetail->address_2}}</p>
                            <p><span>{{$companyDetail->phone_2}}</span></p>
                        </li>
                    </ul>
                    <ul>
                        <li>
                            <p>
                                <span>@if(isset($companyDetail->town3Relation)){{$companyDetail->town3Relation->name_rs}}@endif</span>
                            </p>
                            <p>{{$companyDetail->address_3}}</p>
                            <p><span>{{$companyDetail->phone_3}}</span></p>
                        </li>
                    </ul>
                </div>
                <div class="col-md-8 col-md-8 text">
                    <h2><span>@lang('wy.info')</span></h2>
                    <p>{{$companyDetail->description}}</p>
                </div>
            </div>
            <div class="row user-map">
                <div class="col-xs-12">
                    <div id="map"></div>
                </div>
            </div>
            <div class="row user-data-list">
                <div class="col-sm-4 col-md-4 user-data-list-box">
                    <h5>@lang("my.website")</h5>
                    <ul>
                        <li><a href="https://{{$companyDetail->website}}"
                               target="_blank">{{$companyDetail->website}}</a></li>
                    </ul>
                </div>
                <div class="col-sm-4 col-md-4 social user-data-list-box">
                    <h5>@lang("my.social_networks")</h5>
                    <ul>
                        <li>
                            @if(isset($companyDetail->facebook) && $companyDetail->facebook != "")
                                <a href="https://www.facebook.com/{{$companyDetail->facebook}}" target="_blank">
                                    <img src="/img/template-icons/facebook.png" alt="Facebook">
                                </a>
                            @endif
                        </li>
                        <li>
                            @if(isset($companyDetail->twitter) && $companyDetail->twitter != "")
                                <a href="https://www.twitter.com/{{$companyDetail->twitter}}" target="_blank">
                                    <img src="/img/template-icons/twitter.png" alt="Twitter">
                                </a>
                            @endif
                        </li>
                    </ul>
                </div>
                <div class="col-sm-4 col-md-4 user-data-list-box">
                    <h5>@lang("my.working_hours")</h5>
                    @if(!$companyDetail->nonstop)
                        @if(empty($companyDetail->hours))
                            <p>Ne postoji informacija o radnom vremenu</p>
                        @else
                            <ul>
                                @foreach($companyDetail->hours as $hour)
                                    <?php
                                    $working_from = '';
                                    $working_to = '';
                                    if (!empty($hour->working_from)) {
                                        $working_from = explode(':', $hour->working_from);
                                        $working_from = $working_from[0] . ':' . $working_from[1];
                                    }
                                    if (!empty($hour->working_to)) {
                                        $working_to = explode(':', $hour->working_to);
                                        $working_to = $working_to[0] . ':' . $working_to[1];
                                    }
                                    ?>
                                    <li>
                                        <p>@lang($weekdays[$hour->weekday])</p>
                                        <span>{{$working_from}} - {{$working_to}}</span>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    @else
                        <ul>
                            <li>
                                <p>@lang("wy.monday")</p>
                                <span>00 - 24</span>
                            </li>
                            <li>
                                <p>@lang("wy.tuesday")</p>
                                <span>00 - 24</span>
                            </li>
                            <li>
                                <p>@lang("wy.wednesday")</p>
                                <span>00 - 24</span>
                            </li>
                            <li>
                                <p>@lang("wy.thursday")</p>
                                <span>00 - 24</span>
                            </li>
                            <li>
                                <p>@lang("wy.friday")</p>
                                <span>00 - 24</span>
                            </li>
                            <li>
                                <p>@lang("wy.saturday")</p>
                                <span>00 - 24</span>
                            </li>
                            <li>
                                <p>@lang("wy.sunday")</p>
                                <span>00 - 24</span>
                            </li>
                        </ul>
                    @endif
                </div>
            </div>
            <!--        add optional img-->
            <div class="row user-media-head">
                <div class="col-xs-12">
                    <h3 class="pull-left">@lang("my.gallery")</h3>
                    {{--
                    <p class="pull-left user-media-count">(4/20)</p>--}} @if(Auth::check() && $companyDetail->company_id == \Illuminate\Support\Facades\Auth::user()->id)
                        <a class="pull-right user-media-add" href=""
                           id="add-images-click">@lang('wy.add_image')</a> @endif

                    <form class="hide" method="post" enctype="multipart/form-data"
                          action="/{{\Illuminate\Support\Facades\App::getLocale()}}/profil-kompanije/izmena-slika">
                        {{ csrf_field() }}
                        <label>@lang('my.add_images')</label><br>
                        <input type="file" id="optionalImage" name="optionalImage" onchange="this.form.submit()">
                    </form>
                </div>
            </div>
            @if(count($optionalImages) > 0)
                <div class="row user-media-body">
                    @foreach($optionalImages as $image)
                        <div class="col-xs-12 col-sm-3 col-md-3 user-media-body-image">
                            @if(Auth::check() && $companyDetail->company_id == \Illuminate\Support\Facades\Auth::user()->id)
                                <div class="user-media-image">
                                    <img src="/{{$image->user_image}}" class="remove-image">
                                    <span class="remove-image-span" data-imageid="{{$image->id}}"></span>
                                </div>
                            @else
                                <div class="user-media-image">
                                    <a href="/{{$image->user_image}}" data-lightbox="main-set" data-title="">
                                        <img src="/{{$image->user_image}}">
                                    </a>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            @endif
            <div class="clr"></div>
            @if(isset($companyDetail->youtube_1) || isset($companyDetail->youtube_2))
                <div class="row user-media-head">
                    <div class="col-xs-12">
                        <h3 class="pull-left">Video</h3>
                        {{--
                        <p class="pull-left user-media-count">(4/20)</p>--}} {{--
                <a class="pull-right user-media-add" href="#">Dodaj video</a>--}}
                    </div>
                </div>
                <div class="row user-media-body">
                    <div class="col-xs-12 col-sm-6 col-md-6 user-media-body-image">
                        @if(isset($companyDetail->youtube_1))
                            <iframe width="100%" height="255" src="{{$companyDetail->youtube_1}}" frameborder="0"
                                    allowfullscreen></iframe> @endif
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 user-media-body-image">
                        @if(isset($companyDetail->youtube_1))
                            <iframe width="100%" height="255" src="{{$companyDetail->youtube_2}}" frameborder="0"
                                    allowfullscreen></iframe> @endif
                    </div>
                </div>
            @endif {{--
        <div class="row user-reviews">--}} {{--
            <div class="col-xs-12">--}} {{--
                <h3 class="pull-left">Ocene korisnika</h3>--}} {{--
                <div class="clr"></div>--}} {{--
                <form class="pull-left full-width">--}} {{--
                    <input type="text" name="" placeholder="Napisi komentar..." />--}} {{--
                </form>--}} {{--
                <div class="pull-left full-width review-box">--}} {{--
                    <div class="review-img">--}} {{--
                        <img src="/img/template-icons/search-icon.png" alt="" />--}} {{--
                    </div>--}} {{--
                    <div class="review-data">--}} {{--
                        <p class="pull-left full-width review-name">Pera Detlic</p>--}} {{--
                        <span class="pull-left full-width review-date">24.10.2016</span>--}} {{--
                        <div class="pull-left full-width review-text">Lorem ipsum dolor sit amet, iriure erroribus et cum, te sit debet utroque. At blandit dissentiunt vituperatoribus eum, an eos quaeque mediocritatem. Ne prompta tacimates abhorreant eos, pro ei magna fugit, ut tollit utinam incorrupte usu. Et nominavi expetenda intellegebat sed, reque numquam ex sit.</div>--}} {{--
                    </div>--}} {{--
                    <div class="pull-right rate">--}} {{--
                        <ul>--}} {{--
                            <li class="rated"></li>--}} {{--
                            <li class="rated"></li>--}} {{--
                            <li class="rated"></li>--}} {{--
                            <li class="rated"></li>--}} {{--
                            <li class=""></li>--}} {{--
                        </ul>--}} {{--
                    </div>--}} {{--
                </div>--}} {{--
                <div class="pull-left full-width review-box">--}} {{--
                    <div class="review-img">--}} {{--
                        <img src="/img/template-icons/search-icon.png" alt="" />--}} {{--
                    </div>--}} {{--
                    <div class="review-data">--}} {{--
                        <p class="pull-left full-width review-name">Pera Detlic</p>--}} {{--
                        <span class="pull-left full-width review-date">24.10.2016</span>--}} {{--
                        <div class="pull-left full-width review-text">Lorem ipsum dolor sit amet, iriure erroribus et cum, te sit debet utroque. At blandit dissentiunt vituperatoribus eum, an eos quaeque mediocritatem. Ne prompta tacimates abhorreant eos, pro ei magna fugit, ut tollit utinam incorrupte usu. Et nominavi expetenda intellegebat sed, reque numquam ex sit. Meis verear mei at. Lorem ipsum dolor sit amet, iriure erroribus et cum, te sit debet utroque. At blandit dissentiunt vituperatoribus eum, an eos quaeque mediocritatem. Ne prompta tacimates abhorreant eos, pro ei magna fugit, ut tollit utinam incorrupte usu. Et nominavi expetenda intellegebat sed, reque numquam ex sit. Meis verear mei at.<span class="review-read-more"><br/>+ Procitaj vise iliti klikni da vidis funckionalnost<br/></span><span class="review-text-hidden">Lorem ipsum dolor sit amet, iriure erroribus et cum, te sit debet utroque. At blandit dissentiunt vituperatoribus eum, an eos quaeque mediocritatem. Ne prompta tacimates abhorreant eos, pro ei magna fugit, ut tollit utinam incorrupte usu. Et nominavi expetenda intellegebat sed, reque numquam ex sit. Meis verear mei at. Lorem ipsum dolor sit amet, iriure erroribus et cum, te sit debet utroque. At blandit dissentiunt vituperatoribus eum, an eos quaeque mediocritatem. Ne prompta tacimates abhorreant eos, pro ei magna fugit, ut tollit utinam incorrupte usu. Et nominavi expetenda intellegebat sed, reque numquam ex sit. Meis verear mei at.</span><span class="review-read-less"><br/>- Sakri text<br/></span></div>--}} {{--


                    </div>--}} {{--
                    <div class="pull-right rate">--}} {{--
                        <ul>--}} {{--
                            <li class="rated"></li>--}} {{--
                            <li class="rated"></li>--}} {{--
                            <li class="rated"></li>--}} {{--
                            <li class="rated"></li>--}} {{--
                            <li class=""></li>--}} {{--
                        </ul>--}} {{--
                    </div>--}} {{--
                </div>--}} {{--
                <div class="pull-left full-width review-box">--}} {{--
                    <div class="review-img">--}} {{--
                        <img src="/img/template-icons/search-icon.png" alt="" />--}} {{--
                    </div>--}} {{--
                    <div class="review-data">--}} {{--
                        <p class="pull-left full-width review-name">Pera Detlic</p>--}} {{--
                        <span class="pull-left full-width review-date">24.10.2016</span>--}} {{--
                        <div class="pull-left full-width review-text">Lorem ipsum dolor sit amet, iriure erroribus et cum, te sit debet utroque. At blandit dissentiunt vituperatoribus eum, an eos quaeque mediocritatem. Ne prompta tacimates abhorreant eos, pro ei magna fugit, ut tollit utinam incorrupte usu. Et nominavi expetenda intellegebat sed, reque numquam ex sit.</div>--}} {{--
                    </div>--}} {{--
                    <div class="pull-right rate">--}} {{--
                        <ul>--}} {{--
                            <li class="rated"></li>--}} {{--
                            <li class="rated"></li>--}} {{--
                            <li class="rated"></li>--}} {{--
                            <li class="rated"></li>--}} {{--
                            <li class=""></li>--}} {{--
                        </ul>--}} {{--
                    </div>--}} {{--
                </div>--}} {{--
            </div>--}} {{--
        </div>--}} {{--
        <div class="row full-width pagination">--}} {{--
            <div class="col-xs-12">--}} {{--
                <ul class="pull-left full-width">--}} {{--
                    <li class="active"><a href="#">1</a></li>--}} {{--
                    <li><a href="#">2</a></li>--}} {{--
                    <li><a href="#">3</a></li>--}} {{--
                    <li><a href="#">4</a></li>--}} {{--
                    <li><a href="#">5</a></li>--}} {{--
                </ul>--}} {{--
            </div>--}} {{--
        </div>--}}
        </div>
    </section>
    <div class="popup-overlay-open" style="display: none;"></div>
    <div class="popup-wrapp" id="add-images-pop">
    <div class="close close-popup"><img src="/img/template-icons/close.png" alt="" /></div>
    <div class="popup-body">
        <div class="row">
            <div class="col-xs-12">
                <div class="register-body">
                    <h3>Da li ste sigurni da želite da obrišete fotografiju?</h3>
                    <br><br>
                    <center>
                        <button class="close-popup">Odustani</button>
                        <button class="remove-image-action-btn">Potvrdi</button>
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBirnZ7HNdfWrk3VePYb6ottoRPwgrtQrQ">
    </script>
    <script>
        var uluru = {lat: Number({{($companyDetail->first_lat + $companyDetail->second_lat + $companyDetail->third_lat) / 3}}),
            lng: Number({{($companyDetail->first_lng + $companyDetail->second_lng + $companyDetail->third_lng) / 3}})};

        var pinIcon = '{{isset($companyDetail->categoryRelation->map_pin) ? $adminUrl . "/" . $companyDetail->categoryRelation->map_pin : "http://maps.google.com/mapfiles/ms/icons/blue-dot.png"}}';

        var popup = '<div class="popup-custom-content"><h1>{{$companyDetail->company_name}}</h1>';
        popup += '<h3>@if(isset($companyDetail->categoryRelation)){{$companyDetail->categoryRelation->name_rs}}@endif</h3>';
        popup += '<ul><li><p><span>Adresa</span></p><p>{{$companyDetail->address}}</p></li>';
        popup += '<li><p><span>Telefon</span></p><p>{{$companyDetail->phone}}</p></li></ul>';
         popup += '<a href="/{{\Illuminate\Support\Facades\App::getLocale()}}/profil/{{$companyDetail->id}}/{{$companyDetail->company_name}}">Detaljnije</a></div>';
        
        var locations = [];
        locations.push([popup, "{{$companyDetail->first_lat}}", "{{$companyDetail->first_lng}}", false, pinIcon]);
        locations.push([popup, "{{$companyDetail->second_lat}}", "{{$companyDetail->second_lng}}", false, pinIcon]);
        locations.push([popup, "{{$companyDetail->third_lat}}", "{{$companyDetail->third_lng}}", false, pinIcon]);

        setTimeout(function(){initMap();}, 500);

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: uluru,
                scrollwheel: false
            });

            var bounds = new google.maps.LatLngBounds();
            var infowindow = new google.maps.InfoWindow();
            var marker, i;

            for (i = 0; i < locations.length; i++) {
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                    map: map
                });

                if(!locations[i][3]){
                    marker.setIcon(locations[i][4]);
                }

                bounds.extend(marker.position);

                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                        infowindow.setContent(locations[i][0]);
                        infowindow.open(map, marker);
                    }
                })(marker, i));
            }

            map.fitBounds(bounds);

//            var listener = google.maps.event.addListener(map, "idle", function () {
//                map.setZoom(12);
//                google.maps.event.removeListener(listener);
//            });
        }
    </script>
    <script>
        lightbox.option({
            'resizeDuration': 200,
            'wrapAround': true
        })
    </script>
    @if (Session::has('uploaded_image'))
        <script>
            setTimeout(function () {
                $('#add-images-click').click();
            }, 500);
        </script>
    @endif
@endsection