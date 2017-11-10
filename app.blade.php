<!DOCTYPE html>
<html>
<head>
    <title>Packs</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

    <link rel="stylesheet" type="text/css" href="/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="/css/normalize.css" />
    <link rel="stylesheet" href="/css/jcf.css">
    <link rel="stylesheet" type="text/css" href="/css/main.css" />
    <link rel="stylesheet" type="text/css" href="/css/responsive.css" />
    <link rel="stylesheet" type="text/css" href="/css/jquery.datetimepicker.min.css"/>
    <link rel="stylesheet" href="/dist/css/lightbox.min.css">


    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <link rel="shortcut icon" href="/img/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/img/favicon.ico" type="image/x-icon">
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-75853062-2', 'auto');
        ga('send', 'pageview');
    </script>
</head>
<body class="light">
<div class="body-container">
    <header class="full-width pull-left top-menu">
        <div class="container-big">
            <div class="row">
                <div class="col-xs-12">
                    <a href="@lang('my.logo')" class="pull-left logo"><img src="/img/logo.jpg" /></a>
                    <div class="pull-right profile">
                        <div class="profile-search">
                            <div class="profile-search-trigger"></div>
                            <div class="profile-search-form">
                                <form method="GET" action="/{{\Illuminate\Support\Facades\App::getLocale()}}/osnovna-pretraga" >
                                    <input type="submit" name="" />
                                    <input type="text" name="search" />
                                </form>
                            </div>
                        </div>
                        <a href="/404" class="app-download">
                            @lang('my.mobile_app')<img src="/img/template-icons/app-download.png" />
                        </a>
                        <div class="profile-notifications profile-notifications-color">
                            @if(Auth::check())
                                <span id="notification-trigger" class="numOfMsg">0<img src="/img/template-icons/notification-arrow-green.png"></span>
                            @endif
                            <div class="profile-notifications-dropdown">
                                <div class="pull-left full-width profile-notifications-arrow">
                                    <img src="/img/template-icons/notifications-dropdown.png" />
                                </div>
                                <h1 class="pull-left full-width profile-notifications-title">Poruke ( <span class="numOfMsg">1</span> )</h1>
                                <div class="clr"></div>
                                <ul class="pull-left full-width profile-notifications-list hide">
                                    <li>
                                        <a href="/poruke">
                                            <div class="profile-notifications-image">
                                                <img src="/img/template-icons/app-download.png" />
                                            </div>
                                            <div class="profile-notifications-text">
                                                <h5 class="message-sender">Pera Detlic</h5>
                                                <p><span class="message-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span></p>
                                            </div>
                                            <div class="profile-notifications-time message-time">16:39</div>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="pull-left full-width profile-notifications-list" id="profile-notifications-list">
                                </ul>
                                <div class="clr"></div>
                                <div class="pull-left full-width profile-notifications-all">
                                    <a href="/poruke">@lang('wy.messages')</a>
                                </div>
                            </div>
                        </div>

                        @if(Auth::check())
                            <div class="profile-user">
                                <div class="full-width user">
                                    <span class="profile-name">{{\Auth::user()->name}} {{\Auth::user()->lname}}</span>
                                    <div class="profile-dropdown">
                                        <div class="data">
                                            <div class="data-image">
                                                <img src="/img/template-icons/app-download.png" alt="" />
                                            </div>
                                            <div class="data-name">{{\Auth::user()->name}} {{\Auth::user()->lname}}</div>
                                            <span id="profile-dropdown-close">
                                                <img src="/img/template-icons/dropdown-selector-close.png">
                                            </span>
                                        </div>
                                        <ul>
                                            <li>
                                                <?php if(\Illuminate\Support\Facades\Auth::user()->is_company){ ?>
                                                    <?php if(\Illuminate\Support\Facades\App::getLocale() == 'en'){ ?>
                                                        <a href="/en/profil-kompanije"><span>Profile Preview</span></a>
                                                        <a href="/en/profil-kompanije/izmena-podataka"><span>Profile Settings</span></a>
                                                        {{--<a href="/en/profil-kompanije/izmena-slika"><span>Image Settings</span></a>--}}
                                                    <?php } else { ?>
                                                        <a href="/rs/profil-kompanije"><span>Pregled Profila</span></a>
                                                        <a href="/rs/profil-kompanije/izmena-podataka"><span>Podesavanje Profila</span></a>
                                                        {{--<a href="/rs/profil-kompanije/izmena-slika"><span>Promena Slika</span></a>--}}
                                                    <?php } ?>
                                                <?php } else { ?>
                                                    <?php if(\Illuminate\Support\Facades\App::getLocale() == 'en'){ ?>
                                                        <a href="/en/profil-korisnika"><span>Profile Preview</span></a>
                                                    <?php } else { ?>
                                                        <a href="/rs/profil-korisnika"><span>Pregled Profila</span></a>
                                                    <?php } ?>
                                                <?php } ?>
                                            </li>
                                            <li class="logout">
                                                <a href="/logout">
                                                    <span>@lang('my.logout')</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="profile-user">
                                <div class="full-width user">
                                    <span class="profile-name open-login-popup" style="background: none;">
                                        @lang('my.login_registration')
                                    </span>
                                </div>
                            </div>
                        @endif
                        <div class="language">
                            <ul>
                                <?php
                                    if(\Illuminate\Support\Facades\App::getLocale() == 'en'){
                                ?>
                                    <li><a href="/en/pocetna" class="active">En</a></li>
                                    <li><a href="/rs/pocetna">Sr</a></li>
                                <?php
                                    }else{
                                ?>
                                    <li><a href="/en/pocetna">En</a></li>
                                    <li><a href="/rs/pocetna" class="active">Sr</a></li>
                                <?php
                                }?>

                            </ul>
                        </div>
                        <div class="social-network">
                            <ul>
                                <li>
                                    <a href="https://www.facebook.com/uzoni.rs/" title="Facebook" target="_blank">
                                        <img src="/img/template-icons/facebook.png"/>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/UzoniRs" title="Twitter" target="_blank">
                                        <img src="/img/template-icons/twitter.png"/>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.linkedin.com/company-beta/18029261/" title="LinkedIn" target="_blank">
                                        <img src="/img/template-icons/linkedin.png"/>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="clr"></div>
    <section class="pull-left full-width navigation">
        <div class="container-big">
            <div class="navigation-trigger">
                <p>@lang('my.toggle_navigation')</p>
                <div class="clr"></div>
                <span></span>
                <div class="clr"></div>
                <span></span>
            </div>
            <div class="row navigation-wrapper">
                <div class="col-xs-12">
                    @foreach($mainCategories as $mainCategory)
                        <div class="navigation-box">
                            <a href="/{{\Illuminate\Support\Facades\App::getLocale()}}/pretraga-po-kategorijama/{{$mainCategory->id}}" class="navigation-box-wrapp">
                                <div class="navigation-image">
                                    <img src="{{$adminUrl}}/{{$mainCategory->icon}}">
                                </div>
                                @if(\Illuminate\Support\Facades\App::getLocale() == 'en')
                                    <span>{{ $mainCategory->name_en }}</span>
                                @else
                                    <span>{{ $mainCategory->name_rs }}</span>
                                @endif
                                <div class="navigation-dropdown-dec"></div>
                            </a>
                            <div id="drop_{{$mainCategory->id}}" class="navigation-dropdown">
                                    <ul>
                                    @foreach($mainCategory->subGroups as $subGroup)
                                        <li>
                                            <a href="/{{\Illuminate\Support\Facades\App::getLocale()}}/pretraga/{{$subGroup->id}}">
                                                <div class="navigation-dropdown-img">
                                                   <img src="{{$adminUrl}}/{{$subGroup->icon}}">
                                                    <!-- <img src="/images-hard/servis-racunara.png" />-->
                                                </div>
                                                @if(\Illuminate\Support\Facades\App::getLocale() == 'en')
                                                    <span>{{ $subGroup->name_en }}</span>
                                                @else
                                                    <span>{{ $subGroup->name_rs }}</span>
                                                @endif
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <div class="clr"></div>

    @yield('content')


    <div class="clr"></div>
    <section class="pull-left full-width footer-navigation">
        <div class="container-big">
            <div class="row">
                <div class="col-xs-12">
                    <ul>
                        @foreach($mainCategories as $mainCategory)
                            @if(\Illuminate\Support\Facades\App::getLocale() == 'en')
                                <li><a href="/{{\Illuminate\Support\Facades\App::getLocale()}}/pretraga-po-kategorijama/{{$mainCategory->id}}">{{ $mainCategory->name_en }}</a></li>
                            @else
                                <li><a href="/{{\Illuminate\Support\Facades\App::getLocale()}}/pretraga-po-kategorijama/{{$mainCategory->id}}">{{ $mainCategory->name_rs }}</a></li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <div class="clr"></div>
    <section class="pull-left full-width footer-subnavigation">
        <div class="container-big">
            <div class="row">
                <div class="col-xs-12">
                    @foreach($mainCategories as $mainCategory)
                        <ul>
                            @foreach($mainCategory->subGroups as $subGroup)
                                @if(\Illuminate\Support\Facades\App::getLocale() == 'en')
                                    <li><a href="/{{\Illuminate\Support\Facades\App::getLocale()}}/pretraga/{{$subGroup->id}}">{{$subGroup->name_en}}</a></li>
                                @else
                                    <li><a href="/{{\Illuminate\Support\Facades\App::getLocale()}}/pretraga/{{$subGroup->id}}">{{$subGroup->name_rs}}</a></li>
                                @endif
                            @endforeach
                        </ul>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <div class="clr"></div>
    <footer>
        <div class="pull-left full-width footer-wrapp">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-md-3 footer-block">
                        <h5>@lang('my.contact')</h5>
                        <div class="clr"></div>
                            <span class="line-dec"></span>
                        <div class="clr"></div>
                        <ul>
                            <li><a href="mailto:kontakt@uzoni.ts">kontakt@uzoni.rs</a></li>
                            <li><p>+000 123 4567</p></li>
                        </ul>
                    </div>
                    <div class="col-sm-4 col-md-3 footer-block">
                        <h5>@lang('my.about_us')</h5>
                        <div class="clr"></div>
                            <span class="line-dec"></span>
                        <div class="clr"></div>
                        <ul>
                            <li><a href="/{{\Illuminate\Support\Facades\App::getLocale()}}/uslovi-koriscenja">@lang('my.terms')</a></li>
                            {{--<li><a href="/404">@lang('my.payment_method')</a></li>--}}
                            {{--<li><a href="/404">@lang('my.packages')</a></li>--}}
                        </ul>
                    </div>
                    <div class="col-sm-4 col-md-3 footer-block">
                        <h5>@lang('my.social_networks')</h5>
                        <div class="clr"></div>
                            <span class="line-dec"></span>
                        <div class="clr"></div>
                        <ul>
                            <li>
                                <a href="https://www.facebook.com/uzoni.rs/" title="Facebook" target="_blank">Facebook</a>
                            </li>
                            <li>
                                <a href="https://twitter.com/UzoniRs" title="Twitter" target="_blank">Twitter</a>
                            </li>
                            <li>
                                <a href="https://www.linkedin.com/company-beta/18029261/" title="LinkedIn" target="_blank">Linkedin</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row copyrights">
                    <div class="col-xs-12">
                        <p>@<?= date("Y") ?> uzoni.rs</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
@if(Request::path() != "rs/profil-kompanije" && Request::path() != "en/profil-kompanije")
    <div class="popup-overlay" style="display: none;"></div>
@endif
<div class="login login-popup-wrapp">
    <form role="form" method="POST" action="{{ url('/login') }}">
        {{ csrf_field() }}
        <div class="close close-login-popup">
            <img src="/img/template-icons/close.png"/>
        </div>
        <div class="pull-left full-width form-group-wrapp">
            <div class="pull-left full-width form-group">
                <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="Email" required>
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <div class="pull-left full-width form-group">
                <input id="password" type="password" name="password" placeholder="@lang('my.password')" required>
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <div class="pull-left full-width form-group">
                <input type="submit" name="" value="@lang('my.login_registration')" />
            </div>
            <div class="pull-left full-width form-group password">
                <a href="#" class="forgot-password">@lang('my.password_reset')</a>
                <div class="form-group-checkbox pull-right">
                    <input type="checkbox" id="chk1" />
                    <label title="Unchecked state" for="chk1">@lang('my.remember_me')</label>
                </div>
            </div>
        </div>
        <div class="pull-left full-width create-options">
            @if (session('socialStatus'))
                <div class="alert alert-danger" style="margin: 20px 0 -10px;">
                    {{ session('socialStatus') }}
                </div>
            @endif
            <a href="#" onclick="toggleSignins()" id="create-account">@lang('my.social_signin')</a>
            <ul class="login-list pull-left full-width">
                @if(\Illuminate\Support\Facades\App::getLocale() == 'en')
                    <li>
                        <a href="/en/registracija-firme">
                            As <br/><span>EMPLOYER</span>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="/en/registracija">
                            As<br/><span>USER</span>
                        </a>
                    </li>
                @else
                    <li>
                        <a href="/rs/registracija-firme">
                            Kao <br/><span>POSLODAVAC</span>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="/rs/registracija">
                            Kao <br/><span>KORISNIK</span>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
        <div class="pull-left full-width social-account" style="display: none;">
            <a href="#" onclick="toggleSignins()" id="create-account">@lang('my.create_account')</a>
            <p class="pull-left full-width social-account-text">Prijavi se preko društvene mreže:</p>
            <ul class="login-list pull-left full-width">
                <li>
                    <a href="/socialRedirect/facebook">
                        <img src="/img/template-icons/facebook-login.png" alt="Facebook" />
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="/socialRedirect/google">
                        <img src="/img/template-icons/google-login.png" alt="Google" />
                    </a>
                </li>
            </ul>
        </div>
    </form>
</div>
<div class="popup-wrapp" id="send-message" >
    <div class="close close-popup"><img src="/img/template-icons/close.png" alt="" /></div>
    <div class="popup-body">
        <form id="sendMessageForm" role="form" method="POST" data-url="{{ url('/send') }}">
            <div class="alert alert-danger" style="display: none;">
                <strong>Error </strong>
            </div>
            <div class="pull-left full-width form-group">
                <input type="hidden" name="to" id="to" value="">
                <div class="form-group-results long">
                    <textarea class="form-control" rows="5" name="message" id="message"></textarea>
                </div>
            </div>
            <div class="pull-right form-group bid-choose">
                <span class="accept"><input type="button" name="sendMessage" id="sendMessage" value="@lang('wy.send_message')" /></span>
            </div>
        </form>
    </div>
</div>
<div class="popup-wrapp" id="bid-offer" >
    <div class="close close-popup"><img src="/img/template-icons/close.png" alt="" /></div>
    <div class="popup-body">
        <form>
            <div class="form-group ammount">
                <div class="form-group-results">1000</div>
                <span>RSD</span>
            </div>
            <div class="pull-left form-group time">
                <div class="form-group-results">17:00 h</div>
            </div>
            <div class="pull-right form-group date">
                <input type="text" name="" placeholder="06/01/2017" class="datepicker">
            </div>
            <div class="clr"></div>
            <div class="pull-left full-width form-group">
                <div class="form-group-results long">Lorem ipsum dolor sit amet, suas semper nostrud has at. Mei ad purto porro, mei debitis sententiae ut. Quod magna at eum. Vel facer quaerendum theophrastus te. Quod possim necessitatibus cu pri, labore officiis an mel, purto harum graecis ea nam. Sed id harum indoctum principes, ut laboramus consequat persecuti per, verear blandit</div>
            </div>
            <div class="pull-left popup-price">
                <h4>Ukupno:</h4>
                <p>1000 <span>rsd</span></p>
            </div>
            <div class="pull-right form-group bid-choose">
                <span class="accept"><input type="submit" name="" value="Prihvati" /></span>
                <span class="decline"><input type="button" name="" value="Odbij" /></span>
            </div>
        </form>
    </div>
</div>
<div class="popup-wrapp" id="success-message">
    <div class="close close-popup"><img src="/img/template-icons/close.png" alt="" /></div>
    <div class="popup-body">
        <div class="alert alert-success fade in alert-dismissable">
            <strong>@lang('wy.success')</strong>
        </div>
    </div>
</div>
<div class="popup-wrapp" id="error-message">
    <div class="close close-popup"><img src="/img/template-icons/close.png" alt="" /></div>
    <div class="popup-body">
        <div class="alert alert-danger">
            <strong>Danger!</strong> Indicates a dangerous or potentially negative action.
        </div>
    </div>
</div>

<script>
    function toggleSignins(){
        $(".social-account").toggle();
        $(".create-options").toggle();
    }

    @if (session('socialStatus') || $errors->has('email'))
        setTimeout(function(){$( ".login-popup-wrapp" ).slideDown();}, 500)
    @endif
</script>

<script type="text/javascript" src="/js/jquery.js"></script>
<script src="/dist/js/lightbox-plus-jquery.min.js"></script>
<script type="text/javascript" src="/js/main.js"></script>
<script src="/js/jcf.js"></script>
<script src="/js/jcf.file.js"></script>
<script src="/js/jcf.radio.js"></script>
<script src="/js/jcf.range.js"></script>
<script src="/js/jcf.button.js"></script>
<script src="/js/jcf.number.js"></script>
<script src="/js/jcf.select.js"></script>
<script src="/js/jcf.checkbox.js"></script>
<script src="/js/jcf.textarea.js"></script>
<script src="/js/jcf.scrollable.js"></script>
<script src="/js/jquery.datetimepicker.full.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){

        // Send messages
        $('#sendMessage').click(function(event){
            event.preventDefault();
            
            var form = $(this),
                message = $('#message').val(),
                offer = $('#offer').val(),
                to = $('#to').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '<?= csrf_token() ?>'
                }
            });

            $.ajax({
                url: '<?= url('/send/message/now') ?>',
                data: {'to': to, 'message': message, 'offer': offer},
                type: 'POST',
                datatype: 'JSON',
                success: function (response) {
                    // TODO:: print errors/success
                    if(response.success) {
                        $( "#send-message" ).slideUp();
                        successMessagePopup(response.message);
                        setTimeout(function() {
                            window.location.href = "/poruke";
                        }, 3000);
                    } else {
                        $('.alert-danger').append(response.message);
                        $('.alert-danger').fadeIn();
                    }
                    
                },
                error: function (response) {
                    // TODO:: set default
                    //console.error(response)
                
                }
            });
        })

        $('.message-search').click(function(event){
            event.preventDefault();
            
            var message = $('#message-search').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '<?= csrf_token() ?>'
                }
            });


            $.ajax({
                url: '<?= url('/send/message/message-search') ?>',
                data: {'message': message},
                type: 'POST',
                datatype: 'JSON',
                success: function (response) {
                    // TODO:: print errors/success
                    // $('#read-messages').empty();
                    // if(response.messages.length > 0) {
                    //     $.each(response.messages, function(i, item) {
                    //         var clone = $('#read-messages-template li').clone();
                    //         var template = populateTemplate(clone, item, response.user.id);
                    //         template.attr('data-id', item.id)
                    //         $('#read-messages').append(template);
                    //     });
                    //     getUnreadMessage();
                    // } else {
                    //     $('#read-messages').empty();
                    // }
                    
                },
                error: function (response) {
                    // TODO:: set default
                    //console.error(response)
                
                }
            });
        })

        // Get messages if inbox page    
        if($('#show-inbox-messages').length > 0) {
            var initialItem = $('#show-inbox-messages').val();
            getMessages(initialItem);
        }

        // Show messages in inbox
        $('.show-messages').click(function(){
            var that = $(this),
                friend = that.data('friend');

            getMessages(friend);
        });

        // Save working hours 
        $('#save-working-hours').click(function(event){
            event.preventDefault();
            var that = $(this);

            saveWorkingHours();
        });   

        $('.workday-to, .workday-from, #working-hours-form input:text').datetimepicker({
            datepicker:false,
            format:'H:i',
            step:5
        });    

        getUnreadMessage(); 
    })

    // ajax call show messages
    function getMessages(friend) {
        var url = $('#get-message-url').val();

         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '<?= csrf_token() ?>'
            }
        });

        $.ajax({
            url: url,
            data: {'friend': friend },
            type: 'POST',
            datatype: 'JSON',
            success: function (response) {
                $('#read-messages').empty();
                $('.to').val(friend);
                $.each(response.messages, function(i, item) {
                    var clone = $('#read-messages-template li').clone();
                    var template = populateTemplate(clone, item, response.user.id);
                    template.attr('data-id', item.id)
                    $('#read-messages').append(template);
                });
                getUnreadMessage();
            },
            error: function (response) {
               // console.error(response)
            }
        });
    }

    function populateTemplate(template, message, userId) {

        var date = message.created_at;
        var dateSplit = date.split(" ");
        var dateSplit2 = dateSplit[1].split(":");
        var formattedDate = dateSplit2[0] + ':' + dateSplit2[1];
         
        template.find('.message-sender').text(message.sender.name + ' ' + message.sender.lname);
        template.find('.message-text').text(message.message_text);
        template.find('.message-time').text(formattedDate);
        return template;
    }

    function successMessagePopup(message) {
        $('#success-message').slideDown();
        setTimeout(function() {
            $('#success-message').slideUp();
            $( ".popup-overlay" ).slideUp();
        }, 2500);
    }

    function saveWorkingHours() {
        var form = $('#working-hours-form');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '<?= csrf_token() ?>'
            }
        });

        $.ajax({
            url: '<?= url('/save/working-hours') ?>',
            data: form.serialize(),
            type: 'POST',
            datatype: 'JSON',
            success: function (response) {
                if(response.success) {
                    $('#working-hours-popup').slideUp();
                    successMessagePopup("@lang('wy.success')");
                } else {
                    $('.alert-danger').append(response.message);
                    $('.alert-danger').fadeIn();
                }
            },
            error: function (response) {
                //console.error(response)
            }
        });
    }

    function getUnreadMessage() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '<?= csrf_token() ?>'
            }
        });

        $.ajax({
            url: '<?= url('/messages/unread') ?>',
            type: 'POST',
            data: { 'to': 'to'},
            datatype: 'JSON',
            success: function (response) {
                $('.numOfMsg').text(response.messages.length);
                $('#profile-notifications-list').empty();
                $.each(response.messages, function(i, item) {
                    var clone = $('.profile-notifications-list li').clone();
                    var template = populateTemplate(clone, item, item.id);
                    template.attr('data-id', item.id)
                    $('#profile-notifications-list').append(template);
                });
            },
            error: function (response) {
                //console.error(response)
            }
        });
    }

</script>
</body>
</html>
