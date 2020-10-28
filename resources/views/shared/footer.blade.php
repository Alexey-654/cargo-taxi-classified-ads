<footer class="bg-dark text-light">
  <div class="container">
  <div class="row pt-5 pb-4 mt-5 justify-content-around">

  <div class="col-12 col-md-4 pt-3">
  <p class="lgfont">Связаться с администратором сайта:</p>

  <form method="POST" action="/to-admin" accept-charset="UTF-8">
    @csrf

  <div class="form-group">
    <label for="adminFormEmail">Ваш email</label>
    <input 
      class="form-control input @error('adminFormEmail') is-invalid @enderror"
      required
      placeholder="example@mail.ru"
      name="adminFormEmail"
      type="email"
      value="{{ old('adminFormEmail') }}"
      id="adminFormEmail"
    >
  </div>

  <div class="form-group">
    <label for="adminFormMessage">Текст сообщения</label>
    <textarea
      class="form-control input @error('adminFormMessage') is-invalid @enderror"
      rows="3"
      required
      minlength="30"
      title="Соообщение должно содержать как минимум 30 символов"
      name="adminFormMessage"
      cols="50"
      id="adminFormMessage"
    >{{ old('adminFormMessage') }}</textarea>
  </div>
  <div class="modal-footer">
    <input class="btn btn-primary" type="submit" value="Отправить">
  </div>
  </form>
  </div>
  
  <div class="col-12 col-md-3 pt-3 lgfont">	
  <p>Услуги перевозок</p>
  <nav>
    <ul>
      <li><a href="/">Грузовое такси</a></li>
      <li><a href="/perevozka-mebeli">Перевозка мебели</a></li>
      <li><a href="/pereezdy">Квартирный переезд</a></li>
      <li><a href="/gruzchiki">Грузотакси с грузчиками</a></li>
      <li><a href="/equip">Перевозка оборудования</a></li>
      <li><a href="/carrying">Перевозка вещей</a></li>
    </ul>
  </nav>
  </div>
  <div class="col-12 col-md-3 pt-3 lgfont">
  <p>Сервисы и услуги сайта</p>
  <nav>
  <ul>
  <li><a href="/ads/create">Подать объявление</a></li>
  <li><a href="/feeds">Оставить отзыв</a></li>
  <li><a href="/job">Вакансии</a></li>
  <li><a href="/faq">Часто задаваемые вопросы</a></li>
  <li><a href="/contacts">Контакты</a></li>
  </ul>
  </nav>
  </div>
  </div>
  <div class="row">
  <div class="col">
  
  </div>
  </div>	
  </div>	
  <div class="container-fluid">	
  <hr class="border-primary">	
  </div>
  <div class="container">
  <div class="row justify-content-between py-2">
      <div class="col-md-auto">
        <p><a href="/rules">Пользовательское соглашение</a></p>
        <p class="blockquote-footer">© Грузовое такси Краснодар, 2016-{{\Carbon\Carbon::now()->get('year') }}</p>
      </div>
      <div class="col-md-auto">

        <p><a class="text-light" rel="nofollow" target="_blank" href="https://github.com/Alexey-654"><i class="fa fa-github fa-2x" aria-hidden="true"></i>
</a></p>
      </div>
    </div>	
  </div>			
</footer>

<!-- ya metrica -->
    <script type='text/javascript'>
        (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
        m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");
        ym(50621374, "init", {
             clickmap:true,
             trackLinks:true,
             accurateTrackBounce:true,
             webvisor:true
        });
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/50621374" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- ya metrica -->
<script type='text/javascript' src='//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script type='text/javascript' src='//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'></script>