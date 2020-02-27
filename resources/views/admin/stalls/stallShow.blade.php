@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header">
                    <div class="d-flex flex-row mb-3">
                        <a href="{{ route('admin.stalls.edit', $stall) }}" class="btn btn-primary mr-1">
                            {{__('admin.edit')}}
                        </a>
                        <form action="{{route('admin.stalls.destroy', $stall)}}" method="POST" class="mr-1">
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
                            <span>{{$stall->id}}</span>
                        </div>
                    </div>
                    @if($stall->photo)
                        <div class="row mb-4">
                            <div class="col">
                                <strong>{{__('frontend.logo')}}: </strong>
                                <img src="{{$stall->photo->getUrl()}}" alt="" class="w-25 img-thumbnail">
                            </div>
                        </div>
                    @endif
                    <div class="row mb-4">
                        <div class="col">
                            <strong>{{__('admin.name')}}: </strong>
                            <span>{{$stall->name}}</span>
                        </div>
                    </div>
                    @if($stall->user_id)
                        <div class="row mb-4">
                            <div class="col">
                                <strong>{{__('admin.users')}}: </strong>
                                <a href="{{route('admin.users.show', $stall->user)}}">
                                    {{$stall->user->name}}
                                </a>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <strong>{{__('admin.company')}}: </strong>
                                <a href="{{route('admin.users.show', $stall->user)}}">
                                    {{$stall->user->profile->company}}
                                </a>
                            </div>
                        </div>
                    @endif
                    <div class="row mb-4">
                        <div class="col">
                            <strong>{{__('frontend.floor')}}: </strong>
                            <span>{{$stall->floor}}</span>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <strong>{{__('frontend.area')}}: </strong>
                            <span>{{$stall->area}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
