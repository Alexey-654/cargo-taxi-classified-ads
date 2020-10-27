    <div class="row">
      <div class="col-12 col-md-3 pb-2 pb-md-0">
      @if (url()->current() === route('ads.show', $ad->id))
      <a href="/storage/{{$ad->photo}}">
      @endif
        <img class="img-fluid" src="/storage/thumbnails/{{$ad->photo}}" alt="Перевозчик - {{ $ad->firstname }}; номер объявления - {{ $ad->id }} | Грузовое такси">
      @if (url()->current() === route('ads.show', $ad->id))
      </a>
      @endif
        <div class="tag">
            <span class="badge badge-warning">{{ $ad->id }}</span>
        </div>
      </div>
      <div class="col-12 col-md-6 pb-2 pb-md-0">
        <h4>{{ $ad->title }} 
          @if ($ad->type === 'Premium')
          <i class="fa fa-thumbs-up text-warning"></i>
          @endif
        </h4>
        <p>{{ $ad->description }}</p>
        <a class="btn 
          @if ($ad->type === 'Premium')
          btn-outline-success
          @else 
          btn-outline-secondary
          @endif "
          rel="nofollow" href="tel:{{ $ad->phone }}" title="Позвонить водителю - {{ $ad->firstname }}">
          <span class="h3"><i class="fa fa-mobile"></i></span> 
          <span class="h4">
            {{ sprintf(
            "%s %s %s-%s-%s",
            substr($ad->phone, 0, 2),
            substr($ad->phone, 2, 3),
            substr($ad->phone, 5, 3),
            substr($ad->phone, 8, 2),
            substr($ad->phone, 10, 2)
            ) }}
          </span>
        </a>
      </div>
      <div class="col-12 col-md-3">
        <span>по городу 
          <span class="price">{{ $ad->city_price }} ₽/час</span>
        </span>
        <br>
        <span>межгород 
          <span class="price2">{{ $ad->out_of_town_price }}</span> ₽/км.
        </span>
        <br>
        <span class="small">длина {{ $ad->body_length }} м., ширина {{ $ad->body_width }} м., высота {{ $ad->body_height }} м.
        <br>
        Грузоподъемность: 
        <span class="load">{{ $ad->cargo_capacity }}</span> 
        т. Грузчики: {!! $ad->movers ? '&#10004;' : 'нет' !!}
        <br>
        Загрузка: 
        {{ $ad->back_door ? 'задняя; ' : '' }}
        {{ $ad->side_door ? 'боковая; ' : '' }}
        {{ $ad->up_door ? 'верхняя; ' : '' }}
        {{ $ad->open_door ? 'открытый кузов; ' : '' }}
        <br>
        Отзывы: {{ $ad->feedbacks->count() }}, 
        оценка: 
        @for ($i = 0; $i < $ad->feedbacks->avg('score'); $i++ )
        <i class="fa fa-star fa-lg text-warning"></i>
        @endfor
        </span>
        <br>
        <br>
        <div class="tagicon">
        <span class="small">Обновлено {{$ad->updated_at->diffForHumans()}}</span>
          @if (url()->current() !== route('ads.show', $ad->id))
          <a href="/ads/{{$ad->id}}"><i class="fa fa-address-card fa-lg myhover" data-toggle="tooltip" data-placement="top" title="перейти в карточку перевозчика"></i></a>
          @endif
        </div>
      </div>
    </div>