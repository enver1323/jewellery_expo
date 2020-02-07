@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header">
                    <div class="d-flex flex-row mb-3">
                        <a href="{{ route('admin.stallEquipment.edit', $equipment) }}" class="btn btn-primary mr-1">
                            {{__('admin.edit')}}
                        </a>
                        <form action="{{route('admin.stallEquipment.destroy', $equipment)}}" method="POST" class="mr-1">
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
                            <span>{{$equipment->id}}</span>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <strong>{{__('admin.name')}}: </strong>
                            <span>{{$equipment->name}}</span>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <strong>{{__('admin.price')}}: </strong>
                            <span>{{$equipment->price}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
