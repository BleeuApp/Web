<ul class="nav nav-tabs nav-tabs-bordered" id="borderedTab" role="tablist">
<li class="nav-item" role="presentation">
<button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true"><img src="{{ Asset('upload/language/en.png') }}" style="width: 25px"> @lang('app.english')</button>
</li>

@foreach(DB::table('language')->where('status',0)->orderBy('sort_no','ASC')->get() as $l)

<li class="nav-item" role="presentation">
<button class="nav-link" id="home-{{ $l->id }}" data-bs-toggle="tab" data-bs-target="#l{{ $l->id }}" type="button" role="tab" aria-controls="home" aria-selected="true"><img src="{{ Asset('upload/language/'.$l->img) }}" style="width: 25px"> {{ $l->name }}</button>
</li>

@endforeach

</ul>