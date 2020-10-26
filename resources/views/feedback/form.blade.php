<h3 class="py-4">Оставить отзыв</h3>
<div class="row">
<div class="col-12 col-md-6 pt-2"> 
<h4>Чтобы написать хороший отзыв укажите</h4>
<ul class="myul">
 	<li>Фото и описание автомобиля соответствовали факту?</li>
 	<li>Водитель прибыл к назначенному времени?</li>
 	<li>Насколько легко было взаимодействовать с водителем и грузчиками?</li>
 	<li>Укажите другие плюсы, минусы и особенности с которыми вы столкнулись</li>
 	<li>Укажите дату и время вашей поездки, а так же уникальный номер объявления.</li>
</ul>
</div>
<div class="col-12 col-md-6 pt-2">

<h4>Заполните форму чтобы оставить отзыв</h4>
  {!! Form::open(['url' => '/feeds/create']) !!}
  <div class="form-group">
  {{Form::label('email', 'Ваш email')}}
  {{Form::email('email', '', ['class' => 'form-control input', 'required', 'placeholder' => 'example@mail.ru'])}}
  </div>
  <div class="form-group">
  {{Form::label('name', 'Ваше имя или название вашей компании')}}
  {{Form::text('name', '', ['class' => 'form-control input', 'required'])}}
  </div>
  <div class="form-group">
  {{Form::label('score', 'Поставьте оценку')}}
  <br>
  <span>{{Form::radio('score', '1')}} 1</span>
  <span class="pl-3">{{Form::radio('score', '2')}} 2</span>
  <span class="pl-3">{{Form::radio('score', '3')}} 3</span>
  <span class="pl-3">{{Form::radio('score', '4')}} 4</span>
  <span class="pl-3">{{Form::radio('score', '5', ['checked' => 'checked'])}} 5</span>
  </div>
  <div class="form-group">
  {{Form::label('ad_id', 'Укажите id водителя. Указанно на фотографии в объявлении')}}
  {{Form::number('ad_id', "", ['class' => 'form-control input', 'required', 'min' => 1, 'max' => 1000])}}
  </div>
  <div class="form-group">
  {{Form::label('message', 'Текст отзыва')}}
  {{Form::textarea('message', '', ['class' => 'form-control input', 'rows' => 5, 'required', 'minlength' => 45, 'title' => "Соообщение должно содержать как минимум 45 символов"])}}
  </div>
  <div class="modal-footer">
  {{Form::submit('Отправить', ['class' => 'btn btn-primary'])}}
  </div>
  {!! Form::close() !!}
</div>
</div>
<hr />
