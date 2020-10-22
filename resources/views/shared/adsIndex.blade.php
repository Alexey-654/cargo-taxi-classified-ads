<ul class="list-unstyled list">
@foreach ($ads as $ad)
    <li class="border p-2">
    @include('shared.adShow')
    </li>
@endforeach
{{ $ads->links() }}
</ul>