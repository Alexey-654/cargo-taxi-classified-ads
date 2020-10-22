@extends('layouts.ad')

@section('metatag')
<title>Объявления от частных водителей грузотакси в Краснодаре</title>
<meta name="description"  content="Грузовое такси в Краснодаре. Только проверенные перевозчики и реальные цены на услуги."/>
@endsection

@section('preamble')
    <div class="bd-callout bd-callout-info">
    <h1>Все объявления от частных водителей грузового такси Краснодара</h1>
    </div>

    @include('shared.adsIndex')

@endsection
