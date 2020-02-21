@extends('layouts.admin')

@section('content')
    <div class="card shadow">
        <div class="card-body">
            <form action="?" method="GET" class="form-inline">
                <div class="form-group mx-1 mb-1">
                    <label for="id" class="sr-only">{{__('admin.id')}}</label>
                    <input type="number" class="form-control" id="id" name="id" placeholder="{{__('admin.id')}}"
                           value="{{request('id')}}">
                </div>
                <div class="form-group mx-1 mb-1">
                    <label for="name" class="sr-only">{{__('admin.name')}}</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="{{__('admin.name')}}"
                           value="{{request('name')}}">
                </div>
                <div class="form-group mx-1 mb-1">
                    <label for="email" class="sr-only">{{__('admin.email')}}</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="{{__('admin.email')}}"
                           value="{{request('email')}}">
                </div>
                <div class="form-group mx-1 mb-1">
                    <label for="message" class="sr-only">{{__('admin.message')}}</label>
                    <input type="text" class="form-control" id="message" name="message" placeholder="{{__('admin.message')}}"
                           value="{{request('message')}}">
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
                    <th scope="col">{{__('admin.email')}}</th>
                    <th scope="col">{{__('admin.message')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($comments as$comment)
                    <tr>
                        <th scope="row">{{ $comment->id }}</th>
                        <td>{{ $comment->name }}</td>
                        <td>{{ $comment->email }}</td>
                        <td>{{ $comment->message }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer d-flex justify-content-between">
            {{$comments->links()}}
            <span class="align-self-center">views: {{$comments->count()}}, total: {{$comments->total()}}</span>
        </div>
    </div>
@endsection
