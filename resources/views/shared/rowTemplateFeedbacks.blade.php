@forelse ($feedbacks as $feed)
    <p style="font-weight: bold;">{{$feed->name}} | <time datetime="2019-03-19">{{$feed->created_at->format('d.m.Y')}}</time></p>
    @for ($i = 0; $i < $feed->score; $i++)
    <i class="fa fa-star fa-lg" style="color: #fed100;" aria-hidden="true"></i>
    @endfor
    <p>{{$feed->message}}</p>
    <hr />
@empty
    <p><span class="text-warning display-4">&#128542;</span> Еще никто не оставил отзывы по данному объявлению.</p>
@endforelse
{{ $feedbacks->links() }}