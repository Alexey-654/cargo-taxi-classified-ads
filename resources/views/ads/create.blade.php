@extends('layouts.ad')

@section('metatag')
<title>Подать объявление о грузоперевозках в Краснодаре</title>
<meta name="description"  content="Грузовое такси в Краснодаре. Только проверенные перевозчики и реальные цены на услуги."/>
@endsection

@section('preamble')
    @if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

<div class="bd-callout bd-callout-info">
  <h1>Подать объявление о грузоперевозках в Краснодаре</h1>
  <p>Разместите объявление на главной странице нашего сайта — Грузовое такси Краснодар и получайте заказы уже сегодня.</p>
</div>

<div class="row">
  <div class="col-12 col-md-7">

{!! Form::model($ad, ['url' => 'ads/create', 'files' => true]) !!}
@include('ads.form')
<div class="modal-footer">
  {{Form::submit('Отправить', ['class' => 'btn btn-primary'])}}
</div>
{!! Form::close() !!}

</div>
</div>

<div class="row">
<div class="col-12 col-md-6"> 
<h3>Обычное объявление</h3>
<ul class="myul">
  <li>Бесплатно</li>
  <li>Объявление размещается под результатами Премиум объявлений.</li>
  <li>Если по объявлению не было изменений или поднятий, то через 90 дней оно будят снято с публикации.</li>
  <li>Объявления сортируются в выдаче по дате подачи или поднятия</li>
  <li>В случае нарушений правил сайта, задвойки контента, спама объявление может быть удаленно без вашего уведомления.</li>
</ul>
<h3>Премиум объявление</h3>
<ul class="myul">
  <li>Ваше объявление размещается над обычными объявлениями.</li>
  <li>Вы получаете отметку - <i class="fa fa-thumbs-up fa-lg text-warning"></i>, которая привлекает дополнительное внимание пользователей.</li>
  <li>Публикация на срок 90 дней.</li>
  <li>Стоимость  - 1 800 &#8381;</li>
  <li>Для размещения напишите, пож-та, через форму обратно связи.</li>
</ul>
</div>
<p class="pt-2">Ваши вопросы и предложения отправляйте через форму связаться с администратором сайта ниже.</p>
</div>
@endsection
