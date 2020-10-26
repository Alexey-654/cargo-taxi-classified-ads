@extends('layouts.ad')

@section('metatag')
<title>{{Str::limit($ad['title'], 70)}}</title>
<meta name="description"  content="{{Str::limit($ad['description'], 150)}}"/>
@endsection

@section('preamble')
  <div class="bd-callout bd-callout-info">
    <h1>Объявление от частного перевозчика - {{$ad['firstname']}}</h1>
  </div>
  <ul class="list-unstyled list">
  <li class="border p-2">
  @include('shared.adShow')
  </li>
  </ul>

  <div class="clearfix">
    <a href="/ads/{{$ad->id}}/edit" class="btn btn-secondary btn-sm my-2 float-right text-uppercase">
      <i class="fa fa-pencil-square-o fa-lg mr-2" aria-hidden="true"></i>редактировать
    </a>
  </div>
@endsection


@section('feedback')
<div class="row">
<div class="col-12 pt-2"> 
<h3 class="py-4">Отзывы о перевозчике</h3>

@include('shared.rowTemplateFeedbacks')

</div>
</div>

@include('feedback.form')

@endsection
