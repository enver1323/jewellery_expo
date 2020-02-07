@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header">
                    <div class="d-flex flex-row mb-3">
                        <a href="{{ route('admin.industries.edit', $industry) }}" class="btn btn-primary mr-1">
                            {{__('admin.edit')}}
                        </a>
                        <form action="{{route('admin.industries.destroy', $industry)}}" method="POST" class="mr-1">
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
                            <span>{{$industry->id}}</span>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <strong>{{__('admin.name')}}: </strong>
                            <span>{{$industry->name}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
