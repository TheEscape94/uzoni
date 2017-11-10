@extends('layouts.app')

@section('content')
    <section class="pull-left full-width inbox">
        <div class="container-big">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4 inbox-search-wrapp">
                    <div class="inbox-search">
                        <input type="submit" name="" value="" class="message-search" />
                        <input type="text" name="" class="message-search" id="message-search" placeholder="Pretraži poruke..."  />
                        <?php /*using values for ajax DO NOT delete -- start --*/ ?>
                        <input type="hidden" name="show-inbox-messages" id="show-inbox-messages" value="@if(count($users) > 0){{$users[0]->id}}@endif" />
                        <input type="hidden" name="get-message-url" id="get-message-url" value="<?= url('/get-messages') ?>" />
                        <?php /*using values for ajax DO NOT delete -- end --*/ ?>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-8 col-md-8 messages-head">
                    <p>Poruke</p>
                </div>
            </div>
            <div class="row" id="tabs">
                <div class="col-xs-12 col-sm-4 col-md-4 tabs-sidebar">
                    <ul>
                        @foreach($users as $user)
                        <li class="msg-holder">
                            <a href="#" class="show-messages" data-friend="{{ $user->id }}">
                                @if(isset($user->user_image))
                                 <div class="inbox-image">
                                    <img src="/{{$user->user_image}}" alt="">
                                </div>
                                @else
                                 <div class="inbox-image">
                                    <img src="/img/user/user-default.png" alt="">
                                </div>
                                @endif
                                <div class="inbox-data">
                                    <p class="inbox-data-name">{{ $user->name }} {{ $user->lname }}</p>
                                    <div class="clr"></div>
                                    <p class="inbox-data-text"><span>{{ $lastMessage[$user->id]->message_text }}</span></p>
                                </div>
                                <div class="inbox-date">
                                    <abbr class="timeago" title="{{$lastMessage[$user->id]->created_at}}"></abbr>
                                </div>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-8 col-md-8 tabs-content-wrapp">
                    <div class="tabs-content">
                        <div id="tabs-1" class="tabs-content-box">
                            <ul id="read-messages-template" class="hide">
                                <li>
                                    <div class="pull-left full-width tabs-message">
                                        <a class="go-to-profile" href=""><div class="tabs-message-image"><img src="/img/template-icons/app-download.png" /></div></a>
                                        <div class="tabs-message-text">
                                            <a class="go-to-profile" href=""><p class="message-sender">Pera Detlic</p></a>
                                            <span class="message-text">Lorem ipsum dolor sit amet, vis choro facilis eu. Scripta dolores et his, cum et delenit facilis rationibus. Ex sea case appellantur, verear mandamus argumentum cum id. Justo harum an sed. Volutpat imperdiet ut quo, agam graeci explicari sit ut</span>
                                        </div>
                                        <div class="tabs-message-date message-time">
                                            <abbr class="timeago" title="">
                                            </abbr>
                        
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <ul id="read-messages"></ul>
                            <div class="tabs-content-chat">
                                <form role="form" method="POST" action="{{ url('/send/message/now') }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="to" id="to" class="pull-left to" />
                                    <input type="text" name="message" id="message" class="pull-left" />
                                    <div class="pull-right send-message"><button type="submit">@lang('wy.send_message')</button></div>
                                    <?php /* <div class="pull-right send-bid"><button type="button">Posalji Ponudu</button></div> */ ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection