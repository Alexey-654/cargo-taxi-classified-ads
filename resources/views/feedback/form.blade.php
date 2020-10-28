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

<form method="POST" action="{{route('feeds.store')}}" accept-charset="UTF-8">
  @csrf

  <div class="form-group">
  <label for="email">Ваш email</label>
  <input 
    class="form-control input @error('email') is-invalid @enderror"
    required 
    placeholder="example@mail.ru" 
    name="email" 
    type="email" 
    value="{{ old('email') }}" 
    id="email"
  >
  </div>

  <div class="form-group">
  <label for="name">Ваше имя или название вашей компании</label>
  <input 
    class="form-control input @error('name') is-invalid @enderror" 
    required
    name="name"
    type="text"
    value="{{ old('name') }}" 
    id="name"
  >
  </div>

  <div class="form-group">
  <label for="score">Поставьте оценку</label>
  <br>
  <span><input name="score" type="radio" value="1" id="score"> 1</span>
  <span class="pl-3"><input name="score" type="radio" value="2" id="score"> 2</span>
  <span class="pl-3"><input name="score" type="radio" value="3" id="score"> 3</span>
  <span class="pl-3"><input name="score" type="radio" value="4" id="score"> 4</span>
  <span class="pl-3"><input checked="checked" name="score" type="radio" value="5" id="score"> 5</span>
  </div>

  <div class="form-group">
  <label for="ad_id">Укажите id водителя. Указанно на фотографии в объявлении</label>
  <input 
    class="form-control input input @error('ad_id') is-invalid @enderror"
    id="ad_id"
    required
    min="1"
    max="1000"
    name="ad_id"
    type="number"
    value="{{ old('ad_id') }}"
  >
  </div>

  <div class="form-group">
  <label for="message">Текст отзыва</label>
  <textarea 
    class="form-control input @error('message') is-invalid @enderror"
    id="message"
    required
    minlength="40"
    title="Соообщение должно содержать как минимум 40 символов"
    name="message"
    rows="5"
    cols="50"
  >{{ old('message') }}</textarea>

  </div>
  <div class="modal-footer">
  <input class="btn btn-primary" type="submit" value="Отправить">
  </div>
  </form>
 
</div>
</div>
<hr />
