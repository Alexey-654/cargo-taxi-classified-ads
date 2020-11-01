        <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark site-header">
          <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="переключатель меню">
              <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand p-0" href="/"><img src="/img/icon-truck.png" alt="Лого"></a>
            <div class="collapse navbar-collapse" id="navbarToggler">
               <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                  <li class="nav-item"><a class="nav-link" href="/feeds">ОТЗЫВЫ</a></li>
                  <li class="nav-item"><a class="nav-link" href="/ads/create">ПОДАТЬ ОБЪЯВЛЕНИЕ</a></li>
              </ul>
            </div>
          </div>
        </nav>
        </header>
        @if (session('message'))
        <div class="container">
        <div class="alert alert-success my-3" role="alert">
        {{session('message')}}
        </div>
        </div>
        @endif
        @if (session('error'))
        <div class="container">
        <div class="alert alert-danger my-3" role="alert">
        {{session('error')}}
        </div>
        </div>
        @endif
        @if ($errors->any())
          <div class="container">
              <div class="alert alert-danger my-3" role="alert">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          </div>
        @endif
