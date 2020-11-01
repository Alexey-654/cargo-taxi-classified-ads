@component('mail::message')

# {{ $subject }}

@foreach ($fields as $key => $value)
- **{{ $key }}** - {{ $value }}
@endforeach

@component('mail::button', ['url' => url()->previous()])
Check Page
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
