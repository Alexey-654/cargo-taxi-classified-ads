@extends('layouts.ad')

@section('metatag')
<title>Страница редактирования объявления грузотакси</title>
<meta name="description"  content="На этой странице вы сможете отредактировать описание, цены, информацию об автомобиле и контактные данные в объявлении на сайте - Грузовое Такси Краснодар."/>
<meta name="robots" content="noindex, nofollow"/>
@endsection

@section('preamble')

<h1>Поднять в выдаче, редактировать или удалить ваше объявление</h1>

<h2 class="h4 pt-4">Подвердить актуальность и поднять в выдаче</h2>
<p>Для поднятия в выдаче вашего объявления введите email адрес указанный при подаче объявления в форму ниже</p>

{{ Form::model($ad, ['url' => route('ads.updateTime', $ad), 'method' => 'PATCH', 'class' => 'form-inline py-3']) }}
    <div class="form-group mb-2">
      {{ Form::email('updateTimeEmail', '', ['class' => 'form-control input ' . ($errors->has('updateTimeEmail') ? 'is-invalid' : null), 'required', 'placeholder' => 'example@mail.ru']) }}
    </div>
    <div class="form-group mx-sm-3 mb-2">
      {{ Form::submit('Поднять', ['class' => 'btn btn-success']) }}
    </div>
{{ Form::close() }}

<h2 class="h4 pt-4">Изменить данные</h2>
<p>Для редактирования вашего объявления в форме ниже заполните email, измените поля где это необходимо и нажмите кнопку отправить</p>

{{ Form::model($ad, ['route' => ['ads.update', $ad->id], 'method' => 'patch', 'files' => true]) }}
    @include('ads.form')
    <div class="modal-footer">
      {{ Form::submit('Обновить', ['class' => 'btn btn-primary']) }}
    </div>
{{ Form::close() }}


<h2 class="h4 pt-4">Удалить</h2>
<p>Для удаления вашего объявления с сайта введите ваш email адрес указанный при подаче объявления.</p>

{{ Form::model($ad, ['url' => route('ads.destroy', $ad), 'method' => 'DELETE', 'class' => 'form-inline']) }}
    <div class="form-group mb-2">
      {{ Form::email('destroyEmail', '', ['class' => 'form-control input ' . ($errors->has('destroyEmail') ? 'is-invalid' : null), 'required', 'placeholder' => 'example@mail.ru']) }}
    </div>
    <div class="form-group mx-sm-3 mb-2">
      {{ Form::submit('Удалить объявление', ['class' => 'btn btn-danger']) }}
    </div>
{{ Form::close() }}

@endsection
