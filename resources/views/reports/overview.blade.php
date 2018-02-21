@extends('layouts.admin_menu')

<style>
    body {
        background-image: url("img/wallpapers/topBanner.jpg");
        background-attachment: fixed;
        background-repeat:no-repeat;
        background-size:cover;
    }

    .form-light .font-small {
        font-size: 0.8rem; }

    .form-light [type="radio"] + label,
    .form-light [type="checkbox"] + label {
        font-size: 0.8rem; }

    .form-light [type="checkbox"] + label:before {
        top: 2px;
        width: 15px;
        height: 15px; }

    .form-light input[type="checkbox"] + label:before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 17px;
        height: 17px;
        z-index: 0;
        border-radius: 1px;
        margin-top: 2px;
        -webkit-transition: 0.2s;
        transition: 0.2s; }

    .form-light input[type="checkbox"]:checked + label:before {
        top: -4px;
        left: -3px;
        width: 12px;
        height: 22px;
        border-style: solid;
        border-width: 2px;
        border-color: transparent #EB3573 #EB3573 transparent;
        -webkit-transform: rotate(40deg);
        -ms-transform: rotate(40deg);
        transform: rotate(40deg);
        -webkit-backface-visibility: hidden;
        -webkit-transform-origin: 100% 100%;
        -ms-transform-origin: 100% 100%;
        transform-origin: 100% 100%; }

    .form-light .footer {
        border-bottom-left-radius: .3rem;
        border-bottom-right-radius: .3rem; }
</style>

@section('content')

    <div class="container" style="background-color: rgba(255,255,255,0.5); padding-top: 40px; min-height: 80%; ">
        @if ($errors->any())
            <div class="col-md-8" style="padding: 10px;">
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
        @if(session()->has('message.level'))
            <div class="col-md-8" style="padding: 10px;">
                <div class="alert alert-{{ session('message.level') }}">
                    {!! session('message.content') !!}
                </div>
            </div>
        @endif

        <div class="row">

            <div class="col-md-12" >

                <div class="card card-cascade narrower" style="margin-bottom: 20px;">

                    <!--Card image-->
                    <div class="view gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">

                        <div>
                            <span class='white-text mx-3'><h1>College Overview Report</h1></span>
                        </div>

                    </div>
                    <!--/Card image-->

                    <div class="row" style="margin-bottom: 40px; padding: 20px;">
                        <div class="col-md-4" style="padding: 20px;">
                            <div class="card">
                                {!! $totalHours->html() !!}
                                {!! Charts::scripts() !!}
                                {!! $totalHours->script() !!}
                            </div>
                        </div>
                        <div class="col-md-4" style="padding: 20px;">
                            <div class="card">
                                {!! $totalPass->html() !!}
                                {!! Charts::scripts() !!}
                                {!! $totalPass->script() !!}
                            </div>
                        </div>
                        <div class="col-md-4" style="padding: 20px;">
                            <div class="card">
                                {!! $totalFail->html() !!}
                                {!! Charts::scripts() !!}
                                {!! $totalFail->script() !!}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

@endsection
