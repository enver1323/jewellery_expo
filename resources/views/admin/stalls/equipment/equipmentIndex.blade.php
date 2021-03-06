@extends('layouts.admin')

@section('content')
    <div class="card shadow">
        <div class="card-header">
            <a href="{{route('admin.stallEquipment.create')}}" class="btn btn-primary mr-1">{{__('admin.create')}}</a>
        </div>
        <div class="card-body">
            <form action="?" method="GET" class="form-inline">
                <div class="form-group mx-1 mb-1">
                    <label for="id" class="sr-only">{{__('admin.id')}}</label>
                    <input type="number" class="form-control" id="id" name="id" placeholder="ID"
                           value="{{request('id')}}">
                </div>
                <div class="form-group mx-1 mb-1">
                    <label for="name" class="sr-only">{{__('admin.name')}}</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="{{__('admin.name')}}"
                           value="{{request('name')}}">
                </div>
                <div class="mx-1 mb-1">
                    <button class="btn btn-secondary" type="submit"><i class="fa fa-search"></i> {{__('admin.search')}}
                    </button>
                </div>

            </form>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{__('admin.name')}}</th>
                    <th scope="col">{{__('admin.price')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($equipment as $item)
                    <tr>
                        <th scope="row">{{ $item->id }}</th>
                        <td>
                            <a href="{{route('admin.stallEquipment.show', $item)}}">{{ $item->name }}</a>
                        </td>
                        <td>
                            {{$item->price}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer d-flex justify-content-between">
            {{$equipment->links()}}
            <span class="align-self-center">views: {{$equipment->count()}}, total: {{$equipment->total()}}</span>
        </div>
    </div>
@endsection
