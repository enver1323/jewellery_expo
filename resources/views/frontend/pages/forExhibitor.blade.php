@extends('layouts.app')
@section('header')
    <div class="poster poster-sm poster-cabinet">
        <div class="container">
            <div class="row page-title">
                <h1>
                    {{__('menus.forExhibitor')}}
                </h1>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="container">
        <div class="row my-5">
            <div class="col-12">
                <h4 class="my-3 indigo-text font-weight-bold">{{__('pages.titles.fairInfo.forExhibitor')}}</h4>
                <div class="list-group">
                    @foreach(__('pages.forExhibitor.steps') as $step)
                        <a href="{{$step['link']}}" class="list-group-item list-group-item-action">
                            {!! $step['name'] !!}
                        </a>
                    @endforeach
                </div>
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
        </div>
    </div>
@endsection
