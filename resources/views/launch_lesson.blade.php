
@extends('layouts.student_menu')

@section('content')

    <div class="container" style="background-color: rgba(255,255,255,0.5); ">
        <iframe src="http://blcg.innov8lcc.co.uk/storage/{{ $subject }}/{{ $lesson }}/story.html" id="iframe" width="100%" height="95%" scrolling="no" style="overflow:hidden; border: 0;"></iframe>
    </div>

@endsection

{{--@extends('layouts.launch_lesson')--}}

{{--@section('content')--}}

    {{--<div class="container" style="background-color: rgba(255,255,255,0.5); ">--}}
        {{--<div class="" style="margin: 50px; padding: 50px;">--}}
            {{--<div class="card text-center" style="margin: 50px; padding: 50px;">--}}
                {{--<h1 class="shadow">Blended Learning Consortium</h1>--}}
                {{--<h2 class=""><strong>G-Suite Edition</strong></h2>--}}
                {{--<div class="shadow" align="center" style="padding: 30px;">--}}
                    {{--<img src="/img/banners/BLC-banner-purple.jpg" class="img-fluid rounded" alt="" style="">--}}
                {{--</div>--}}
                {{--<a href="http://blcg.innov8lcc.co.uk/lessons/{{ $subject }}/{{ $lesson  }}">--}}
                    {{--<div class="btn btn-blue-grey btn-large btn-rounded"><h3>Start Your Lesson   <i class="fas fa-play-circle"></i></h3></div>--}}
                {{--</a>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

{{--@endsection--}}
