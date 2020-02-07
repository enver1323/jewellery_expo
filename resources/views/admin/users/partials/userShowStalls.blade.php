<div class="card shadow">
    <div class="card-header">
        <h3>{{__('admin.stalls')}}</h3>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead class="thead-dark">
            <tr>
                <th scope="col">{{__('admin.id')}}</th>
                <th scope="col">{{__('admin.name')}}</th>
                <th scope="col">{{__('admin.area')}}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($stalls as $stall)
                <tr>
                    <th scope="row">{{ $stall->id }}</th>
                    <td>
                        <a href="{{route('admin.stalls.show',$stall)}}">{{ $stall->name }}</a>
                    </td>
                    <td>{{ $stall->area }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
