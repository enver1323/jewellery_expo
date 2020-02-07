@extends('layouts.app')
@section('header')
    <div class="poster poster-sm poster-cabinet">
        <div class="container">
            <div class="row page-title">
                <h1>
                    {{__('menus.aboutFair')}}
                </h1>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="container">
        <div class="row my-5">
            <div class="col-12">
                <h4 class="mb-3 indigo-text font-weight-bold">{{__('pages.titles.fairInfo.general')}}</h4>
                {!! __('pages.fairInfo.general') !!}
                <hr class="my-2">
            </div>
            <div class="col-12">
                <h4 class="my-3 indigo-text font-weight-bold">{{__('pages.titles.fairInfo.purpose')}}</h4>
                <ul>
                    @foreach(__('pages.fairInfo.purpose') as $purpose)
                        <li>{!! $purpose !!}</li>
                    @endforeach
                </ul>
                <hr class="my-2 border-top-primary">
            </div>
            <div class="col-12">
                <h4 class="my-3 indigo-text font-weight-bold d-block"> {{__('pages.titles.fairInfo.downloads')}}</h4>
                <ul class="list-group list-group-horizontal-sm">
                    @foreach($documents->files as $document)
                        <li class="list-group-item">
                            <h6 class="d-inline">{{__($document->name)}}</h6>
                            <a href="{{asset($documents->path."/".$document->file.ucfirst(app()->getLocale()).".".$document->ext)}}">
                                <i class="ml-2 fas fa-download"></i>
                            </a>
                        </li>
                    @endforeach
                </ul>
                <hr>
            </div>
            <div class="col-12">
                <h4 class="my-3 indigo-text font-weight-bold">{{__('pages.titles.fairInfo.dateAndPlace')}}</h4>
                <div class="row">
                    <div class="col-12 col-md-6">
                        {!! __('pages.fairInfo.dateAndPlace') !!}
                    </div>
                    <div class="col-12 col-md-6">
                        <div style="overflow:hidden;width: 100%;height: 400px;position: relative;">
                            <iframe width="100%" height="100%"
                                    src="https://maps.google.com/maps?hl=en&amp;q=yoshlar ijod +()&amp;ie=UTF8&amp;t=&amp;z=15&amp;iwloc=B&amp;output=embed"
                                    frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                            <div
                                style="position: absolute;width: 80%;bottom: 10px;left: 0;right: 0;margin-left: auto;margin-right: auto;color: #000;text-align: center;">
                                <small style="line-height: 1.8;font-size: 2px;background: #fff;">Map by <a
                                        href="https://www.googlemapsembed.net/">Embed Google Maps</a></small></div>
                            <style>#gmap_canvas img {
                                    max-width: none !important;
                                    background: none !important
                                }</style>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript">(new Image).src = "//googlemapsembed.net/get?r" + escape(document.referrer);</script>
    <script type="text/javascript" src="https://googlemapsembed.net/embed"></script>
@endpush
