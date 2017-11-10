@extends('layouts.app')

@section('content')
    <section class="pull-left full-width tables-wrapp">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 tables-head">
                    <h1>PAKETI</h1>
                    <div class="clr"></div>
                    <p>Odaberite jedan od naša 3 paketa:</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 col-md-4 tables-wrapp-box">
                    <div class="tables-box">
                        <h3 class="table-title"><span>SILVER</span> PAKET</h3>
                        <p class="table-subtitle">Profil</p>
                        <ul>
                            <li>Logo</li>
                            <li>Broj telefona</li>
                            <li>Adresa</li>
                            <li>E-mail</li>
                            <li>Slike</li>
                            <li>Link ka vasem web sajtu</li>
                        </ul>
                        <p class="table-subtitle">3 Lokacije</p>
                        <div class="table-price">1000 rsd</div>
                        <a href="<?= "/" . \Illuminate\Support\Facades\App::getLocale() . "/izaberi-paket/1"?>" class="buy">KUPI</a>
                    </div>
                </div>
                <div class="col-sm-4 col-md-4 tables-wrapp-box">
                    <div class="tables-box">
                        <h3 class="table-title gold"><span>GOLD</span> PAKET</h3>
                        <p class="table-subtitle">Profil</p>
                        <ul>
                            <li>Logo</li>
                            <li>Broj telefona</li>
                            <li>Adresa</li>
                            <li>E-mail</li>
                            <li>Slike</li>
                            <li>Link ka vasem web sajtu</li>
                            <li>Linkovi vasih drustvenih mreza</li>
                            <li>Isticanje u podkategoriji</li>
                        </ul>
                        <p class="table-subtitle">4 Lokacije</p>
                        <div class="table-price">2000 rsd</div>
                        <a href="<?= "/" . \Illuminate\Support\Facades\App::getLocale() . "/izaberi-paket/2"?>" class="buy gold">KUPI</a>
                    </div>
                </div>
                <div class="col-sm-4 col-md-4 tables-wrapp-box">
                    <div class="tables-box">
                        <h3 class="table-title platinum"><span>PLATINUM</span> PAKET</h3>
                        <p class="table-subtitle">Profil</p>
                        <ul>
                            <li>Logo</li>
                            <li>Broj telefona</li>
                            <li>Adresa</li>
                            <li>E-mail</li>
                            <li>Slike</li>
                            <li>Link ka vasem web sajtu</li>
                            <li>Linkovi vasih drustvenih mreza</li>
                            <li>Istaknuti u gradu</li>
                            <li>Istaknuti u kategoriji</li>
                            <li>Istaknuti u podkategoriji</li>
                            <li>Istaknuti na mapi</li>
                        </ul>
                        <p class="table-subtitle">5 Lokacija</p>
                        <div class="table-price">5000 rsd</div>
                        <a href="<?= "/" . \Illuminate\Support\Facades\App::getLocale() . "/izaberi-paket/3"?>" class="buy platinum">KUPI</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="clr"></div>
    <section class="discount">
        <div class="pull-left full-width discount-background"></div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 discount-box">
                    <div class="discount-title">Popusti na pakete:</div>
                    <p class="discount-text">3 meseca unapred  - <span>10%</span></p>
                    <p class="discount-text">6 meseci unapred - <span>15%</span></p>
                    <p class="discount-text">12 meseci unapred - <span>20%</span></p>
                </div>
            </div>
        </div>
    </section>
@endsection