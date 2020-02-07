@extends('layouts.admin')

@section('content')
    <div class="card shadow">
        <div class="card-header">
            <a href="{{route('admin.stalls.create')}}" class="btn btn-primary mr-1">{{__('admin.create')}}</a>
        </div>
        <div class="card-body">
            <form action="?" method="GET" class="form-inline">
                <div class="form-group mx-1 mb-1">
                    <label for="id" class="sr-only">{{__('admin.id')}}</label>
                    <input type="number" class="form-control" id="id" name="id" placeholder="ID"
                           value="{{request('id')}}">
                </div>
                <div class="form-group mx-1 mb-1">
                    <label for="floor" class="sr-only">{{__('frontend.floor')}}</label>
                    <input type="number" class="form-control" id="floor" name="floor" placeholder="{{__('frontend.floor')}}"
                           value="{{request('floor')}}">
                </div>
                <div class="form-group mx-1 mb-1">
                    <label for="name" class="sr-only">{{__('admin.name')}}</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="{{__('admin.name')}}"
                           value="{{request('name')}}">
                </div>
                <div class="mx-1 mb-1">
                    <label for="user" class="sr-only">{{__('admin.users')}}</label>
                    <select class="custom-select" name="user_id" id="user">
                        <option selected disabled hidden>{{sprintf("%s %s", __('All'), __('admin.users'))}}</option>
                        @if(request('user_id'))

                        @endif
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
                    <th scope="col">{{__('frontend.floor')}}</th>
                    <th scope="col">{{__('admin.name')}}</th>
                    <th scope="col">{{__('admin.users')}}</th>
                    <th scope="col">{{__('admin.area')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($stalls as $stall)
                    <tr>
                        <th scope="row">{{ $stall->id }}</th>
                        <td>{{ $stall->floor }}</td>
                        <td>
                            <a href="{{route('admin.stalls.show', $stall)}}">{{ $stall->name }}</a>
                        </td>
                        @if($stall->user_id)
                            <td><a href="{{route('admin.users.show', $stall->user)}}">{{ $stall->user->name }}</a></td>
                        @else
                            <td>{{__('admin.vacant')}}</td>
                        @endif
                        <td>
                            {{$stall->area}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer d-flex justify-content-between">
            {{$stalls->links()}}
            <span class="align-self-center">views: {{$stalls->count()}}, total: {{$stalls->total()}}</span>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{mix('js/apiSelect.js')}}"></script>
    <script type="text/javascript">
        window.addEventListener('DOMContentLoaded', function (event) {
            new APISelect("#user", "{{route('api.ajax.exhibitors')}}", "email");
        })
    </script>
@endpush
