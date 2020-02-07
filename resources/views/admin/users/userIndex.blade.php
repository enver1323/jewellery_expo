@extends('layouts.admin')

@section('content')
    <div class="card shadow">
        <div class="card-header">
            <a href="{{route('admin.users.create')}}" class="btn btn-primary mr-1">{{__('admin.create')}}</a>
        </div>
        <div class="card-body">
            <form action="?" method="GET" class="form-inline">
                <div class="form-group mx-1 mb-1">
                    <label for="id" class="sr-only">{{__('admin.id')}}</label>
                    <input type="number" class="form-control" id="id" name="id" placeholder="ID"
                           value="{{request('id')}}">
                </div>
                <div class="form-group mx-1 mb-1">
                    <label for="Name" class="sr-only">{{__('admin.name')}}</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="{{__('frontend.name')}}"
                           value="{{request('name')}}">
                </div>
                <div class="form-group mx-1 mb-1">
                    <label for="email" class="sr-only">{{__('admin.email')}}</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="{{__('admin.email')}}"
                           value="{{request('email')}}">
                </div>
                <div class="mx-1 mb-1">
                    <label for="role" class="sr-only">{{__('admin.role')}}</label>
                    <select class="custom-select" name="role" id="role">
                        <option selected disabled hidden>{{__('All')}}</option>
                        @foreach($roles as $role)
                            <option value="{{ $role }}" {{request('role') === $role ? 'selected' : ''}}>
                                {{ ucfirst($role) }}
                            </option>
                        @endforeach
                    </select>

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
                    <th scope="col">{{__('admin.country')}}</th>
                    <th scope="col">{{__('admin.role')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as$user)
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>
                            <a href="{{route('admin.users.show',$user)}}">{{ $user->name }}</a>
                        </td>
                        <td>{{ $user->email }}</td>
                        <td>
                            {{$user->profile->getCountry()->name}}
                        </td>
                        <td>
                            @admin
                            <span class="badge badge-success">{{$user->getRole()}}</span>
                            @elseadmin
                            @exhibitor
                            <span class="badge badge-info">{{$user->getRole()}}</span>
                            @elseexhibitor
                            <span class="badge badge-info">{{$user->getRole()}}</span>
                            @endexhibitor
                            @endadmin
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer d-flex justify-content-between">
            {{$users->links()}}
            <span class="align-self-center">views: {{$users->count()}}, total: {{$users->total()}}</span>
        </div>
    </div>
@endsection
