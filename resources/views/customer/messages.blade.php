@extends('layouts.app')

@section('content')
    <section class="pull-left full-width inbox">
        <div class="container-big">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4 inbox-search-wrapp">
                    <div class="inbox-search">
                        <input type="submit" name="" value=" " />
                        <input type="text" name="" placeholder="Pretrazi poruke..."  />
                    </div>
                </div>
                <div class="col-xs-12 col-sm-8 col-md-8 messages-head">
                    <p>Poruke</p>
                </div>
            </div>
            <div class="row" id="tabs">
                <div class="col-xs-12 col-sm-4 col-md-4 tabs-sidebar">
                    <ul>
                        <li>
                            <a href="#tabs-1">
                                <div class="inbox-image"><img src="/img/template-icons/app-download.png" /></div>
                                <div class="inbox-data">
                                    <p class="inbox-data-name">Pera Detlic</p>
                                    <div class="clr"></div>
                                    <p class="inbox-data-text"><span>Cu eam corpora epicuri mediocrem, id prompta deterruisset mel. Ei nominati appellantur cum, te case</span></p>
                                </div>
                                <div class="inbox-date">16:39</div>
                            </a>
                        </li>
                        <li>
                            <a href="#tabs-2">
                                <div class="inbox-image"><img src="/img/template-icons/app-download.png" /></div>
                                <div class="inbox-data">
                                    <p class="inbox-data-name">Pera Detlic</p>
                                    <div class="clr"></div>
                                    <p class="inbox-data-text"><span>Cu eam corpora epicuri mediocrem, id prompta deterruisset mel. Ei nominati appellantur cum, te case</span></p>
                                </div>
                                <div class="inbox-date">16:39</div>
                            </a>
                        </li>
                        <li>
                            <a href="#tabs-3">
                                <div class="inbox-image"><img src="/img/template-icons/app-download.png" /></div>
                                <div class="inbox-data">
                                    <p class="inbox-data-name">Pera Detlic</p>
                                    <div class="clr"></div>
                                    <p class="inbox-data-text"><span>Cu eam corpora epicuri mediocrem, id prompta deterruisset mel. Ei nominati appellantur cum, te case</span></p>
                                </div>
                                <div class="inbox-date">16:39</div>
                            </a>
                        </li>
                        <li>
                            <a href="#tabs-4">
                                <div class="inbox-image"><img src="/img/template-icons/app-download.png" /></div>
                                <div class="inbox-data">
                                    <p class="inbox-data-name">Pera Detlic</p>
                                    <div class="clr"></div>
                                    <p class="inbox-data-text"><span>Cu eam corpora epicuri mediocrem, id prompta deterruisset mel. Ei nominati appellantur cum, te case</span></p>
                                </div>
                                <div class="inbox-date">16:39</div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-8 col-md-8 tabs-content-wrapp">
                    <div class="tabs-content">
                        <div id="tabs-1" class="tabs-content-box">
                            <ul>
                                <li>
                                    <div class="pull-left full-width tabs-message">
                                        <div class="tabs-message-image"><img src="/img/template-icons/app-download.png" /></div>
                                        <div class="tabs-message-text">
                                            <p>Pera Detlic</p>
                                            <span>Lorem ipsum dolor sit amet, vis choro facilis eu. Scripta dolores et his, cum et delenit facilis rationibus. Ex sea case appellantur, verear mandamus argumentum cum id. Justo harum an sed. Volutpat imperdiet ut quo, agam graeci explicari sit ut</span>
                                        </div>
                                        <div class="tabs-message-date">16:39</div>
                                    </div>
                                </li>
                                <li>
                                    <div class="pull-left full-width tabs-message">
                                        <div class="tabs-message-image"><img src="/img/template-icons/app-download.png" /></div>
                                        <div class="tabs-message-text">
                                            <p>Pera Detlic</p>
                                            <span>Lorem ipsum dolor sit amet, vis choro facilis eu. Scripta dolores et his, cum et delenit facilis rationibus. Ex sea case appellantur, verear mandamus argumentum cum id. Justo harum an sed. Volutpat imperdiet ut quo, agam graeci explicari sit ut</span>
                                        </div>
                                        <div class="tabs-message-date">16:39</div>
                                    </div>
                                </li>
                                <li>
                                    <div class="pull-left full-width tabs-message">
                                        <div class="tabs-message-image"><img src="/img/template-icons/app-download.png" /></div>
                                        <div class="tabs-message-text">
                                            <p>Petar Petrovic</p>
                                            <span>Lorem ipsum dolor sit amet, vis choro facilis eu. Scripta dolores et his, cum et delenit facilis.</span>
                                        </div>
                                        <div class="tabs-message-date">16:39</div>
                                    </div>
                                </li>
                                <li>
                                    <div class="pull-left full-width tabs-message">
                                        <div class="tabs-message-image"><img src="/img/template-icons/app-download.png" /></div>
                                        <div class="tabs-message-text">
                                            <p>Pera Detlic</p>
                                            <span>Lorem ipsum dolor sit amet, vis choro facilis eu. Scripta dolores et his, cum et delenit facilis.</span>
                                        </div>
                                        <div class="tabs-message-date">16:39</div>
                                    </div>
                                </li>
                                <li>
                                    <div class="pull-left full-width tabs-message">
                                        <div class="tabs-message-image"><img src="/img/template-icons/app-download.png" /></div>
                                        <div class="tabs-message-text">
                                            <p>Petar Petrovic Detlic</p>
                                            <a href="#" class="bid">Ponuda 0312453</a>
                                        </div>
                                        <div class="tabs-message-date">16:39</div>
                                    </div>
                                </li>
                                <li>
                                    <div class="pull-left full-width tabs-message">
                                        <div class="tabs-message-image"><img src="/img/template-icons/app-download.png" /></div>
                                        <div class="tabs-message-text">
                                            <p>Pera Detlic</p>
                                            <div class="pull-left bid-wrapp">
                                                <a href="#" class="bid bid-accepted">je prihvaio Vasu ponudu 0312453</a>
                                                <a href="#" class="bid bid-declined">je odbio Vasu ponudu 0312453</a>
                                            </div>
                                            <div class="pull-right bid-options bid-false">
                                                <button>Posao nije obavljen</button>
                                            </div>
                                            <div class="pull-right bid-options bid-true">
                                                <button>Posao Obavljen</button>
                                            </div>
                                        </div>
                                        <div class="tabs-message-date">16:39</div>
                                    </div>
                                </li>
                            </ul>
                            <div class="tabs-content-chat">
                                <input type="text" name="" class="pull-left" />
                                <div class="pull-right send-message"><button type="submit">Posalji Poruku</button></div>
                                <div class="pull-right send-bid"><button type="button">Posalji Ponudu</button></div>
                            </div>
                        </div>
                        <div id="tabs-2" class="tabs-content-box">
                            <ul>
                                <li>
                                    <div class="pull-left full-width tabs-message">
                                        <div class="tabs-message-image"><img src="/img/template-icons/app-download.png" /></div>
                                        <div class="tabs-message-text">
                                            <p>Pera Detlic</p>
                                            <span>Lorem ipsum dolor sit amet, vis choro facilis eu. Scripta dolores et his, cum et delenit facilis rationibus. Ex sea case appellantur, verear mandamus argumentum cum id. Justo harum an sed. Volutpat imperdiet ut quo, agam graeci explicari sit ut</span>
                                        </div>
                                        <div class="tabs-message-date">16:39</div>
                                    </div>
                                </li>
                                <li>
                                    <div class="pull-left full-width tabs-message">
                                        <div class="tabs-message-image"><img src="/img/template-icons/app-download.png" /></div>
                                        <div class="tabs-message-text">
                                            <p>Petar Petrovic</p>
                                            <span>Lorem ipsum dolor sit amet, vis choro facilis eu. Scripta dolores et his, cum et delenit facilis.</span>
                                        </div>
                                        <div class="tabs-message-date">16:39</div>
                                    </div>
                                </li>
                                <li>
                                    <div class="pull-left full-width tabs-message">
                                        <div class="tabs-message-image"><img src="/img/template-icons/app-download.png" /></div>
                                        <div class="tabs-message-text">
                                            <p>Pera Detlic</p>
                                            <span>Lorem ipsum dolor sit amet, vis choro facilis eu. Scripta dolores et his, cum et delenit facilis.</span>
                                        </div>
                                        <div class="tabs-message-date">16:39</div>
                                    </div>
                                </li>
                                <li>
                                    <div class="pull-left full-width tabs-message">
                                        <div class="tabs-message-image"><img src="/img/template-icons/app-download.png" /></div>
                                        <div class="tabs-message-text">
                                            <p>Petar Petrovic Detlic</p>
                                            <a href="#" class="bid">Ponuda 0312453</a>
                                        </div>
                                        <div class="tabs-message-date">16:39</div>
                                    </div>
                                </li>
                                <li>
                                    <div class="pull-left full-width tabs-message">
                                        <div class="tabs-message-image"><img src="/img/template-icons/app-download.png" /></div>
                                        <div class="tabs-message-text">
                                            <p>Pera Detlic</p>
                                            <div class="pull-left bid-wrapp">
                                                <a href="#" class="bid bid-accepted">je prihvaio Vasu ponudu 0312453</a>
                                                <a href="#" class="bid bid-declined">je odbio Vasu ponudu 0312453</a>
                                            </div>
                                            <div class="pull-right bid-options bid-false">
                                                <button>Posao nije obavljen</button>
                                            </div>
                                            <div class="pull-right bid-options bid-true">
                                                <button>Posao Obavljen</button>
                                            </div>
                                        </div>
                                        <div class="tabs-message-date">16:39</div>
                                    </div>
                                </li>
                            </ul>
                            <div class="tabs-content-chat">
                                <input type="text" name="" class="pull-left" />
                                <div class="pull-right send-message"><button type="submit">Posalji Poruku</button></div>
                                <div class="pull-right send-bid"><button type="button">Posalji Ponudu</button></div>
                            </div>
                        </div>
                        <div id="tabs-3" class="tabs-content-box">
                            <ul>
                                <li>
                                    <div class="pull-left full-width tabs-message">
                                        <div class="tabs-message-image"><img src="/img/template-icons/app-download.png" /></div>
                                        <div class="tabs-message-text">
                                            <p>Pera Detlic</p>
                                            <span>Lorem ipsum dolor sit amet, vis choro facilis eu. Scripta dolores et his, cum et delenit facilis rationibus. Ex sea case appellantur, verear mandamus argumentum cum id. Justo harum an sed. Volutpat imperdiet ut quo, agam graeci explicari sit ut</span>
                                        </div>
                                        <div class="tabs-message-date">16:39</div>
                                    </div>
                                </li>
                                <li>
                                    <div class="pull-left full-width tabs-message">
                                        <div class="tabs-message-image"><img src="/img/template-icons/app-download.png" /></div>
                                        <div class="tabs-message-text">
                                            <p>Petar Petrovic</p>
                                            <span>Lorem ipsum dolor sit amet, vis choro facilis eu. Scripta dolores et his, cum et delenit facilis.</span>
                                        </div>
                                        <div class="tabs-message-date">16:39</div>
                                    </div>
                                </li>
                                <li>
                                    <div class="pull-left full-width tabs-message">
                                        <div class="tabs-message-image"><img src="/img/template-icons/app-download.png" /></div>
                                        <div class="tabs-message-text">
                                            <p>Pera Detlic</p>
                                            <span>Lorem ipsum dolor sit amet, vis choro facilis eu. Scripta dolores et his, cum et delenit facilis.</span>
                                        </div>
                                        <div class="tabs-message-date">16:39</div>
                                    </div>
                                </li>
                                <li>
                                    <div class="pull-left full-width tabs-message">
                                        <div class="tabs-message-image"><img src="/img/template-icons/app-download.png" /></div>
                                        <div class="tabs-message-text">
                                            <p>Petar Petrovic Detlic</p>
                                            <a href="#" class="bid">Ponuda 0312453</a>
                                        </div>
                                        <div class="tabs-message-date">16:39</div>
                                    </div>
                                </li>
                                <li>
                                    <div class="pull-left full-width tabs-message">
                                        <div class="tabs-message-image"><img src="/img/template-icons/app-download.png" /></div>
                                        <div class="tabs-message-text">
                                            <p>Pera Detlic</p>
                                            <div class="pull-left bid-wrapp">
                                                <a href="#" class="bid bid-accepted">je prihvaio Vasu ponudu 0312453</a>
                                                <a href="#" class="bid bid-declined">je odbio Vasu ponudu 0312453</a>
                                            </div>
                                            <div class="pull-right bid-options bid-false">
                                                <button>Posao nije obavljen</button>
                                            </div>
                                            <div class="pull-right bid-options bid-true">
                                                <button>Posao Obavljen</button>
                                            </div>
                                        </div>
                                        <div class="tabs-message-date">16:39</div>
                                    </div>
                                </li>
                            </ul>
                            <div class="tabs-content-chat">
                                <input type="text" name="" class="pull-left" />
                                <div class="pull-right send-message"><button type="submit">Posalji Poruku</button></div>
                                <div class="pull-right send-bid"><button type="button">Posalji Ponudu</button></div>
                            </div>
                        </div>
                        <div id="tabs-4" class="tabs-content-box">
                            <ul>
                                <li>
                                    <div class="pull-left full-width tabs-message">
                                        <div class="tabs-message-image"><img src="/img/template-icons/app-download.png" /></div>
                                        <div class="tabs-message-text">
                                            <p>Pera Detlic</p>
                                            <span>Lorem ipsum dolor sit amet, vis choro facilis eu. Scripta dolores et his, cum et delenit facilis rationibus. Ex sea case appellantur, verear mandamus argumentum cum id. Justo harum an sed. Volutpat imperdiet ut quo, agam graeci explicari sit ut</span>
                                        </div>
                                        <div class="tabs-message-date">16:39</div>
                                    </div>
                                </li>
                            </ul>
                            <div class="tabs-content-chat">
                                <input type="text" name="" class="pull-left" />
                                <div class="pull-right send-message"><button type="submit">Posalji Poruku</button></div>
                                <div class="pull-right send-bid"><button type="button">Posalji Ponudu</button></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
