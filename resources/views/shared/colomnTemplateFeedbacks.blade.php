<article>
    <div class="row py-3">
        <div class="col-auto">
            <h2 id="feeds">Отзывы</h2>
        </div>
        <div class="col pl-0 d-none d-lg-block">
            <hr class="hrhead">
        </div>
    </div> 
    <div class="row">
        @forelse ($feedbacks as $feedback)
        <div class="col-12 col-md-4">
            <p style="font-weight: bold;">{{ $feedback->name }}</p>
            <p>
                @for ($i = 0; $i < $feedback->score; $i++)
                <i class="fa fa-star fa-lg text-warning"></i>
                @endfor
                <time datetime="{{ $feedback->created_at->format('Y.m.d') }}">{{ $feedback->created_at->format('d.m.Y') }}</time>
            </p>
            <p>{{ $feedback->message }}</p>
        </div>
            @empty
                <p><span class="text-warning display-4">&#128542;</span> Еще никто не оставил отзывы по данному объявлению.</p>
            @endforelse
    </div>
    <div class="d-flex justify-content-center py-4">
        <a class="btn btn-primary" href="/feeds" role="button">Все отзывы</a>
    </div>
</article>