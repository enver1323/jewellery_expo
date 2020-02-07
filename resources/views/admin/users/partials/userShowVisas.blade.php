<div class="card shadow">
    <div class="card-header">
        <h3>{{__('admin.visas')}}</h3>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead class="thead-dark">
            <tr>
                <th scope="col">{{__('admin.id')}}</th>
                <th scope="col">{{__('admin.name')}}</th>
                <th scope="col">{{__('admin.position')}}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($visas as $visa)
                <tr>
                    <th scope="row">{{ $visa->id }}</th>
                    <td>
                        <a href="{{route('admin.visas.show',$visa)}}">{{ $visa->name }}</a>
                    </td>
                    <td>{{ $visa->position }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
