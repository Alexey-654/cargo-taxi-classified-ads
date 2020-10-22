<div class="form-group">
  {{Form::label('firstname', 'Имя')}}
  {{Form::text('firstname', $ad->firstname, ['class' => 'form-control input', 'required', 'minlength' => 2])}}
</div>
<div class="form-group">
  {{Form::label('lastname', 'Фамилия')}}
  {{Form::text('lastname', '', ['class' => 'form-control input', 'required', 'minlength' => 3])}}
</div>
<div class="form-group">
  {{Form::label('email', 'Ваш email')}}
  {{Form::email('email', '', ['class' => 'form-control input', 'required', 'placeholder' => 'example@mail.ru'])}}
  <small id="emailHelp" class="form-text text-muted">Запомните адрес он может понадобиться для редактирования объявления.</small>
</div>

<div class="form-group">
  {{Form::label('phone', 'Телефон')}}
  {{Form::tel('phone', $ad->phone, ['class' => 'form-control input', 'required', 'maxlength' => 12, 'pattern' => "[+]{1}[0-9]{11}"])}}
  <small id="emailHelp" class="form-text text-muted">Формат +79180001122. Без скобок, пробелов и тире.</small>
</div>

<div class="form-group">
  {{Form::label('type', 'Выберите тип объявления')}}
  <br>
  <span>{{Form::radio('type', 'Standart', ['checked' => 'checked'])}} Стандарт</span>
  <span class="pl-3"><input name="type" type="radio" value="Premium" id="type" disabled> Премиум</span>
</div>

<div class="form-group">
{{Form::label('cargo_capacity', 'Грузоподъемность в тоннах')}}
{{Form::number('cargo_capacity', $ad->cargo_capacity, ['class' => 'form-control input', 'required', 'min' => 1, 'max' => 20, 'step' => 0.5])}}
</div>

<div class="form-group">
{{Form::label('body_length', 'Длина кузова')}}
{{Form::number('body_length', $ad->body_length, ['class' => 'form-control input', 'required', 'min' => 2.5, 'max' => 14, 'step' => 0.1])}}
</div>

<div class="form-group">
{{Form::label('body_width', 'Ширина кузова')}}
{{Form::number('body_width', $ad->body_width, ['class' => 'form-control input', 'required', 'min' => 1.5, 'max' => 3, 'step' => 0.1])}}
</div>

<div class="form-group">
{{Form::label('body_height', 'Высота кузова')}}
{{Form::number('body_height', $ad->body_height, ['class' => 'form-control input', 'required', 'min' => 1.5, 'max' => 3, 'step' => 0.1])}}
</div>

<div class="form-group">
{{Form::label('checkbox', 'Веберити тип загрузки (1 или больше вариантов)')}}
<br>
<div class="form-check form-check-inline">
    {{Form::checkbox('back_door', '1', true, ['class' => 'form-check-input'])}}
    {{Form::label('back_door', 'Задняя загрузка', ['class' => 'form-check-label'])}}
</div>
<div class="form-check form-check-inline">
    {{Form::checkbox('side_door', '1', null, ['class' => 'form-check-input'])}}
    {{Form::label('side_door', 'Боковая загрузка', ['class' => 'form-check-label'])}}
</div>
<div class="form-check form-check-inline">
    {{Form::checkbox('up_door', '1', null, ['class' => 'form-check-input'])}}
    {{Form::label('up_door', 'Верхняя загрузка', ['class' => 'form-check-label'])}}
</div>
<div class="form-check form-check-inline">
    {{Form::checkbox('open_door', '1', null, ['class' => 'form-check-input'])}}
    {{Form::label('open_door', 'Открытый кузов', ['class' => 'form-check-label'])}}
</div>
</div>

<div class="form-group">
  {{Form::label('movers', 'Услуги грузчиков')}}
  <br>
  <span>{{Form::radio('movers', '1', ['checked' => 'checked'])}} есть</span>
  <span class="pl-3">{{Form::radio('movers', '0')}} нет</span>
</div>

<div class="form-group">
{{Form::label('city_price', 'Цена по Краснодару за 1 час')}}
{{Form::number('city_price', $ad->city_price, ['class' => 'form-control input', 'required', 'min' => 450, 'max' => 2000, 'step' => 50])}}
</div>

<div class="form-group">
{{Form::label('out_of_town_price', 'Цена межгород за 1 км')}}
{{Form::number('out_of_town_price', $ad->out_of_town_price, ['class' => 'form-control input', 'required', 'min' => 25, 'max' => 100])}}
</div>

<div class="form-group">
  {{Form::label('title', 'Заголовок объявления')}}
  {{Form::text('title', $ad->title, ['class' => 'form-control input', 'required', 'minlength' => 20, 'title' => "Текст должен содержать как минимум 20 символов"])}}
</div>

<div class="form-group">
  {{Form::label('description', 'Текст объявления')}}
  {{Form::textarea('description', $ad->description, ['class' => 'form-control input', 'required', 'minlength' => 100, 'title' => "Текст должен содержать как минимум 100 символов"])}}
</div>

<div class="form-group">
  <label>Загрузите фото вашего автомобиля (PNG, JPG; до 1 Мбайта)</label>
  <div class="custom-file">
    {{Form::file('photo', ['accept' => ".png, .jpg, .jpeg"])}}
  </div>
</div>

<div class="form-group">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="approve" name="approve" required>
          <label class="form-check-label" for="approve">
            Согласен с <a href="/rules">пользовательским соглашением</a>
          </label>
        </div>
</div>
