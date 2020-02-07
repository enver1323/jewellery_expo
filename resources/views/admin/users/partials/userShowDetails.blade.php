<div class="card shadow">
    <div class="card-header">
        <div class="d-flex flex-row mb-3">
            <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-primary mr-1">
                {{__('admin.edit')}}
            </a>
            <form action="{{route('admin.users.destroy', $user)}}" method="POST" class="mr-1">
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
                <span>{{$user->id}}</span>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col">
                <strong>{{__('admin.name')}}: </strong>
                <span>{{$user->name}}</span>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col">
                <strong>{{__('admin.email')}}: </strong>
                <span>{{$user->email}}</span>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col">
                <strong>{{__('admin.role')}}: </strong>
                @admin
                <span class="badge badge-success">{{$user->role}}</span>
                @elseadmin
                @exhibitor
                <span class="badge badge-info">{{$user->role}}</span>
                @elseexhibitor
                <span class="badge badge-info">{{$user->role}}</span>
                @endexhibitor
                @endadmin
            </div>
        </div>
    </div>
</div>
