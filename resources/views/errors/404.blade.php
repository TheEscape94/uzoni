@extends('layouts.app')

@section('content')
    <section class="pull-left full-width not-found">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 not-found-wrapp">
                    <div class="not-found-background"><img src="/img/not-found.png" alt="" /></div>
                    <div class="not-found-icon"><img src="/img/template-icons/not-found.png" alt="" /></div>
                    <div class="clr"></div>
                    <h3 class="relative">404</h3>
                    <div class="clr"></div>
                    @if(\Illuminate\Support\Facades\App::getLocale() == "rs")
                        <p class="relative">Trazena stranica nije pronadjena...</p>
                        <div class="clr"></div>
                        <a class="relative" href="/rs/pocetna">Pocetna strana</a>
                    @else
                        <p class="relative">Page has not been found...</p>
                        <div class="clr"></div>
                        <a class="relative" href="/rs/pocetna">Home page</a>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
