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
                        <form action="{{ url('/update-profile') }}" method="post">
                            {{ csrf_field() }}
                            <h2>@lang('my.basic_info'):</h2>
                            <div class="form-group">
                                <input type="text" name="company_name" placeholder="@lang('my.company_name')" value="{{$companyDetail->company_name}}">
                            </div>
                            <div class="form-group">
                                <select name="category">
                                    <option selected disabled>@lang('my.category')</option>
                                    @foreach($mainCategories as $cat)
                                        @if(\Illuminate\Support\Facades\App::getLocale() == 'en')
                                            <optgroup label="{{ $cat->name_en }}">
                                        @else
                                            <optgroup label="{{ $cat->name_rs }}">
                                        @endif
                                        @foreach($cat->subGroups as $subCat)
                                            <option value="{{ $subCat->id }}" {{$subCat->id == $companyDetail->category ? "selected" : ""}}>
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
                            <div class="form-group">
                                <select name="category_2">
                                    <option selected disabled>@lang('my.category') 2</option>
                                    @if(isset($mainCategories) && !empty($mainCategories))
                                        @foreach($mainCategories as $cat)
                                            @if(\Illuminate\Support\Facades\App::getLocale() == 'en')
                                                <optgroup label="{{ $cat->name_en }}">
                                            @else
                                                <optgroup label="{{ $cat->name_rs }}">
                                            @endif

                                            @foreach($cat->subGroups as $subCat)
                                                <option value="{{ $subCat->id }}" {{$subCat->id == $companyDetail->category_2 ? "selected" : ""}}>
                                                    @if(\Illuminate\Support\Facades\App::getLocale() == 'en')
                                                        {{ $subCat->name_en }}
                                                    @else
                                                        {{ $subCat->name_rs }}
                                                    @endif
                                                </option>
                                            @endforeach
                                            </optgroup>
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                            <div class="form-group">
                                <select name="category_3">
                                    <option selected disabled>@lang('my.category') 3</option>
                                    @foreach($mainCategories as $cat)
                                        @if(\Illuminate\Support\Facades\App::getLocale() == 'en')
                                            <optgroup label="{{ $cat->name_en }}">
                                        @else
                                            <optgroup label="{{ $cat->name_rs }}">
                                        @endif
                                        @foreach($cat->subGroups as $subCat)
                                            <option value="{{ $subCat->id }}" {{$subCat->id == $companyDetail->category_3 ? "selected" : ""}}>
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
<!--                            new elements-->
                            <div class="form-group">
                                <h2 class="h2-line"><span>Adresa 1</span></h2>
                            </div>
                            <div class="form-group half pull-right">
                                <input type="text" name="address" class="autocomplete_first" placeholder="@lang('wy.address') 1" value="{{$companyDetail->address}}">
                                <input type="hidden" id="firstLat" name="first_lat" value="{{$companyDetail->first_lat ? $companyDetail->first_lat : 0}}">
                                <input type="hidden" id="firstLng" name="first_lng" value="{{$companyDetail->first_lng ? $companyDetail->first_lng : 0}}">
                            </div>
                            <div class="form-group half">
                                <select name="town">
                                    <option>@lang('my.town')</option>
                                    @foreach ($towns as $town)
                                        <option value="{{$town->id}}" {{$town->id == $companyDetail->town ? "selected" : ""}}>
                                            @if(\Illuminate\Support\Facades\App::getLocale() == 'en')
                                                {{ $town->name_en }}
                                            @else
                                                {{ $town->name_rs }}
                                            @endif
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" name="phone" placeholder="@lang('wy.phones')" value="{{$companyDetail->phone}}">
                            </div>
                            
                            <div class="form-group">
                                <h2 class="h2-line"><span>Adresa 2</span></h2>
                                    <img class="open-more set-2" src="/img/template-icons/dropdown-selector.png" />
                            </div>
                            <div class="form-group info-set-2">
                                <div class="form-group half">
                                <select name="town_2">
                                    <option>@lang('my.town') 2</option>
                                    @foreach ($towns as $town)
                                        <option value="{{$town->id}}" {{$town->id == $companyDetail->town_2 ? "selected" : ""}}>
                                            @if(\Illuminate\Support\Facades\App::getLocale() == 'en')
                                                {{ $town->name_en }}
                                            @else
                                                {{ $town->name_rs }}
                                            @endif
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group half pull-right">
                                <input type="text" name="address_2" class="autocomplete_second" placeholder="@lang('wy.address') 2" value="{{$companyDetail->address_2}}">
                                <input type="hidden" id="secondLat" name="second_lat" value="{{$companyDetail->second_lat ? $companyDetail->second_lat : 0}}">
                                <input type="hidden" id="secondLng" name="second_lng" value="{{$companyDetail->second_lng ? $companyDetail->second_lng : 0}}">
                            </div>
                            <div class="form-group">
                                <input type="text" name="phone_2" placeholder="@lang('wy.phones') 2" value="{{$companyDetail->phone_2}}">
                            </div>
                            </div>
                            <div class="form-group">
                                <h2 class="h2-line"><span>Adresa 3</span></h2>
                                 <img class="open-more set-3" src="/img/template-icons/dropdown-selector.png" />
                            </div>
                            <div class="form-group info-set-3">
                                <div class="form-group half">
                                <select name="town_3">
                                    <option>@lang('my.town') 3</option>
                                    @foreach ($towns as $town)
                                        <option value="{{$town->id}}" {{$town->id == $companyDetail->town_3 ? "selected" : ""}}>
                                            @if(\Illuminate\Support\Facades\App::getLocale() == 'en')
                                                {{ $town->name_en }}
                                            @else
                                                {{ $town->name_rs }}
                                            @endif
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group half pull-right">
                                <input type="text" name="address_3" class="autocomplete_third" placeholder="@lang('wy.address') 3" value="{{$companyDetail->address_3}}">
                                <input type="hidden" id="thirdLat" name="third_lat" value="{{$companyDetail->third_lat ? $companyDetail->third_lat : 0}}">
                                <input type="hidden" id="thirdLng" name="third_lng" value="{{$companyDetail->third_lng ? $companyDetail->third_lng : 0}}">
                            </div>
                            <div class="form-group">
                                <input type="text" name="phone_3" placeholder="@lang('wy.phones') 3" value="{{$companyDetail->phone_2}}">
                            </div>
                            </div>
                                <div class="form-group results-message">
                                    <a class="jcf-button" style="border-radius:0px" id="open-working-hours-popup" href="#">Unesite radno vreme</a>
                                </div>
                            <div class="clearfix"></div>
                            <div style="margin-bottom: 30px">
                                <label for="description" style="margin-bottom: 13px; color: #2d2d2d; font-size: 16px;">@lang("my.description")</label>
                                <textarea name="description" rows="7" cols="72">{{$companyDetail->description}}</textarea>
                            </div>
<!--                            social-->
                            <div class="form-group half social-input">
                                <input style="padding-left: 10px;" type="text" name="website" placeholder="Website" value="{{$companyDetail->website}}">
                            </div>
                            <div class="form-group half pull-right social-input">
                                <span>www.facebook.com/</span>
                                <input style="padding-left: 145px;" type="text" name="facebook" value="{{$companyDetail->facebook}}">
                            </div>
                            <div class="form-group half social-input">
                                <span>www.twitter.com/</span>
                                <input style="padding-left: 130px;" type="text" name="twitter" value="{{$companyDetail->twitter}}">
                            </div>
                            <div class="form-group half pull-right social-input">
                                <span>www.plus.google.com/</span>
                                <input style="padding-left: 160px;" type="text" name="google+" value="">
                            </div>
                            
                            <div class="form-group">
                                <input type="text" name="youtube_1" placeholder="Youtube video 1" >
                            </div>
                            <div class="form-group">
                                <input type="text" name="youtube_2" placeholder="Youtube video 2" >
                            </div>
                            <div class="form-group half">
                                
                                <input class="" type="checkbox" name="nonstop" id="addNonstop" value="1" @if($companyDetail->nonstop) checked @endif>
                                <label for="nonstop">@lang('wy.247')</label>
                            </div>
                            <div class="form-group half">
                                <input type="checkbox" name="home_delivery" id="addHomeDelivery" value="1" @if($companyDetail->home_delivery) checked @endif>
                                
                                 <label for="home_delivery">@lang('wy.home_delivery')</label>
                            </div>
                            {{--<div class="form-group one-third pull-right">--}}
                                {{--<label for="addOnlineBanking">Online payment</label>--}}
                                {{--<br>--}}
                                <input type="hidden" name="online_banking" id="addOnlineBanking" value="0">
                            {{--</div>--}}

                            <div class="form-group">
                                <input type="submit" name="register" value="Azuriraj profil">
                            </div>
                            <div class="register-note">
                                <p></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="popup-overlay-open" style="display: none;"></div>
    <div class="popup-wrapp" id="working-hours-popup">
        <?php
        $working_hours_from = array();
        $working_hours_to = array();
        $disabled = " disabled";
        ?>
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

            $working_hours_from[$hour->weekday] = $working_from;
            $working_hours_to[$hour->weekday] = $working_to;
            ?>
        @endforeach
        <?php
            if(!empty($working_hours_from)){
                $working_hours_from = (object)$working_hours_from;
                $working_hours_to = (object)$working_hours_to;
            }
            else {
                $working_hours_from = false;
                $working_hours_to = false;
            }
        ?>
        <div class="close close-popup"><img src="/img/template-icons/close.png" alt="" /></div>
         <div class="popup-body">
            <div class="row text-center working-hours">
                <div class="col-md-12" style="margin-bottom: 15px;">
                    <h3>@lang('wy.working_hours')</h3><br><Br>
                </div>
                <div class="alert alert-danger" style="display: none;">
                    <strong>Error!</strong>
                </div>
                <form action="#" method="post" id="working-hours-form">
                    <section class="form-group working-hours-head clearfix">
                        <div class="col-md-1">
                            <p>&nbsp;</p>
                        </div>
                        <div class="checkbox-holder">
                            <input type="checkbox" class="mon" id="mon" value="1" {{$working_hours_from->mon ? "checked" : ""}}       />
                            <br>
                            <label for="mon">@lang('wy.monday')</label>
                        </div>
                        <div class="checkbox-holder">
                            <input type="checkbox" name="tue" id="tue" value="1" {{$working_hours_from->tue ? "checked" : ""}} />
                            <br>
                            <label for="tue">@lang('wy.tuesday')</label>
                        </div>
                        <div class="checkbox-holder">
                            <input type="checkbox" name="wed" id="wed" value="1" {{$working_hours_from->wed ? "checked" : ""}} />
                            <br>
                            <label for="wed">@lang('wy.wednesday')</label>
                        </div>
                        <div class="checkbox-holder">
                            <input type="checkbox" name="thu" id="thu" value="1" {{$working_hours_from->thu ? "checked" : ""}} />
                            <br>
                            <label for="thu">@lang('wy.thursday')</label>
                        </div>
                        <div class="checkbox-holder">
                            <input type="checkbox" name="fri" id="fri" value="1" {{$working_hours_from->fri ? "checked" : ""}} />
                            <br>
                            <label for="fri">@lang('wy.friday')</label>
                        </div>
                        <div class="checkbox-holder">
                            <input type="checkbox" name="sat" id="sat" value="1" {{$working_hours_from->sat ? "checked" : ""}} />
                            <br>
                            <label for="sat">@lang('wy.saturday')</label>
                        </div>
                        <div class="checkbox-holder">
                            <input type="checkbox" name="sun" id="sun" value="1" {{$working_hours_from->sun ? "checked" : ""}} />
                            <br>
                            <label for="sun">@lang('wy.sunday')</label>
                        </div>
                        <div style="clear: both"></div>
                    </section>
                    <section class="form-group working-hours-input clearfix">
                        <div class="col-md-1 hours-head">
                            <p>@lang('wy.from_to')</p>
                        </div>
                        <input type="text" name="mon-from" id="mon-from" value="{{$working_hours_from ? $working_hours_from->mon : ""}}" <?php
                            if($working_hours_from->mon){
                                echo "style='background: #f1f1f1;'";
                            } else {
                                echo 'disabled';
                            }    
                        ?>          
                               />
                        <input type="text" name="tue-from" id="tue-from" value="{{$working_hours_from ? $working_hours_from->tue : ""}}" 
                        <?php
                            if($working_hours_from->tue){
                                echo "style='background: #f1f1f1;'";
                            } else {
                                echo 'disabled';
                            }    
                        ?>   
                               />
                        <input type="text" name="wed-from" id="wed-from" value="{{$working_hours_from ? $working_hours_from->wed : ""}}" 
                        <?php
                            if($working_hours_from->wed){
                                echo "style='background: #f1f1f1;'";
                            } else {
                                echo 'disabled';
                            }    
                        ?>          
                        />
                        <input type="text" name="thu-from" id="thu-from" value="{{$working_hours_from ? $working_hours_from->thu : ""}}" 
                        <?php
                            if($working_hours_from->thu){
                                echo "style='background: #f1f1f1;'";
                            } else {
                                echo 'disabled';
                            }    
                        ?>          
                        />
                        <input type="text" name="fri-from" id="fri-from" value="{{$working_hours_from ? $working_hours_from->fri : ""}}" <?php
                            if($working_hours_from->fri){
                                echo "style='background: #f1f1f1;'";
                            } else {
                                echo 'disabled';
                            }    
                        ?>    
                        />
                        <input type="text" name="sat-from" id="sat-from" value="{{$working_hours_from ? $working_hours_from->sat : ""}}" 
                        <?php
                            if($working_hours_from->sat){
                                echo "style='background: #f1f1f1;'";
                            } else {
                                echo 'disabled';
                            }    
                        ?>          
                        />
                        <input type="text" name="sun-from" id="sun-from" value="{{$working_hours_from ? $working_hours_from->sun : ""}}" <?php
                            if($working_hours_from->sun){
                                echo "style='background: #f1f1f1;'";
                            } else {
                                echo 'disabled';
                            }    
                        ?>    
                        />
                    </section>
                    <section class="form-group working-hours-input clearfix">
                        <div class="col-md-1 hours-head">
                            <p>@lang('wy.to_from')</p>
                        </div>
                        <input type="text" name="mon-to" id="mon-to" value="{{$working_hours_from ? $working_hours_from->mon : ""}}" 
                        <?php
                            if($working_hours_to->mon){
                                echo "style='background: #f1f1f1;'";
                            } else {
                                echo 'disabled';
                            }    
                        ?>   
                               />
                        <input type="text" name="tue-to" id="tue-to" value="{{$working_hours_from ? $working_hours_from->tue : ""}}" 
                        <?php
                            if($working_hours_to->tue){
                                echo "style='background: #f1f1f1;'";
                            } else {
                                echo 'disabled';
                            }    
                        ?>   
                               />
                        <input type="text" name="wed-to" id="wed-to" value="{{$working_hours_from ? $working_hours_from->wed : ""}}"  <?php
                            if($working_hours_to->wed){
                                echo "style='background: #f1f1f1;'";
                            } else {
                                echo 'disabled';
                            }    
                        ?>   
                               />
                        <input type="text" name="thu-to" id="thu-to" value="{{$working_hours_from ? $working_hours_from->thu : ""}}" 
                        <?php
                            if($working_hours_to->thu){
                                echo "style='background: #f1f1f1;'";
                            } else {
                                echo 'disabled';
                            }    
                        ?>   
                               />
                        <input type="text" name="fri-to" id="fri-to" value="{{$working_hours_from ? $working_hours_from->fri : ""}}"  <?php
                            if($working_hours_to->fri){
                                echo "style='background: #f1f1f1;'";
                            } else {
                                echo 'disabled';
                            }    
                        ?>   
                               />
                        <input type="text" name="sat-to" id="sat-to" value="{{$working_hours_from ? $working_hours_from->sat : ""}}" <?php
                            if($working_hours_to->sat){
                                echo "style='background: #f1f1f1;'";
                            } else {
                                echo 'disabled';
                            }    
                        ?>   
                               />
                        <input type="text" name="sun-to" id="sun-to" value="{{$working_hours_from ? $working_hours_from->sun : ""}}" <?php
                            if($working_hours_to->sun){
                                echo "style='background: #f1f1f1;'";
                            } else {
                                echo 'disabled';
                            }    
                        ?>   
                               />
                    </section>
                    <center>
                      <div class="form-group bid-choose">
                        <span class="accept">
                            <input type="button" name="save-working-hours" id="save-working-hours" value="@lang('wy.save_hours')"/>
                          </span>
                    </div>
                    </center>
                  
                </form>

            </div>
        </div>
    </div>

    <script>
        function initAutocomplete() {
            autocomplete_first = new google.maps.places.Autocomplete(
                    (document.getElementsByClassName('autocomplete_first')[0]),
                    {types: ['geocode']});

            autocomplete_first.addListener('place_changed', fillInFirst);


            autocomplete_second = new google.maps.places.Autocomplete(
                    (document.getElementsByClassName('autocomplete_second')[0]),
                    {types: ['geocode']});

            autocomplete_second.addListener('place_changed', fillInSecond);


            autocomplete_third = new google.maps.places.Autocomplete(
                    (document.getElementsByClassName('autocomplete_third')[0]),
                    {types: ['geocode']});

            autocomplete_third.addListener('place_changed', fillInThird);
        }

        function fillInFirst() {
            // Get the place details from the autocomplete object.
            var place = autocomplete_first.getPlace();

            document.getElementById("firstLat").value = place.geometry.location.lat();
            document.getElementById("firstLng").value = place.geometry.location.lng();
        }

        function fillInSecond() {
            // Get the place details from the autocomplete object.
            var place = autocomplete_second.getPlace();
            console.log(place);
            document.getElementById("secondLat").value = place.geometry.location.lat();
            document.getElementById("secondLng").value = place.geometry.location.lng();
        }

        function fillInThird() {
            // Get the place details from the autocomplete object.
            var place = autocomplete_third.getPlace();

            document.getElementById("thirdLat").value = place.geometry.location.lat();
            document.getElementById("thirdLng").value = place.geometry.location.lng();
        }
        <?php
            if($working_hours_from->mon){
                echo "$('#mon').click()";
            }
        ?>
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCDaJFvQ0HSUcobxJ09pJo_apVccpmqMiU&libraries=places&callback=initAutocomplete"
            async defer></script>
@endsection