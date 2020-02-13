@extends('layouts.admin')
@section('content')
    <div class="card shadow">
        <div class="card-header">
            <div class="d-flex flex-row mb-4">
                <a href="{{ route('admin.slides.edit', $slide) }}" class="btn btn-primary mr-1">
                    {{__('admin.edit')}}
                </a>
                <form action="{{route('admin.slides.destroy', $slide)}}" method="POST" class="mr-1">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">{{__('admin.delete')}}</button>
                </form>
            </div>
        </div>
        <div class="card-body">
            <div class="row mb-4">
                <div class="col">
                    <strong>{{__('admin.id')}}: </strong>
                    <span>{{$slide->id}}</span>
                </div>
            </div>
            <hr>
            <div class="row ml-1">
                @isset($slide->photo)
                    <div class="image-resizable-container mr-3">
                        <img src="{{$slide->photo->getUrl()}}" class="img-thumbnail" alt="">
                    </div>
                @endisset
            </div>
            <hr>
            <div>
                <div class="mb-4">
                    <strong>{{__('admin.description')}}: </strong>
                </div>
                @foreach($slide->getTranslations('description') as $language => $entry)
                    <div class="mb-4">
                        <span>{{ucfirst($language)}}  {{__('admin.language')}}: </span>
                        <span>{{$entry}}</span>
                    </div>
                @endforeach
            </div>
            <div class="row mb-4">
                <div class="col">
                    <strong>{{__('admin.link')}}: </strong>
                    <span>{{$slide->link}}</span>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col">
                    <strong>{{__('admin.order')}}: </strong>
                    <span>{{$slide->order}}</span>
                </div>
            </div>
            <hr>
        </div>
    </div>
@endsection
