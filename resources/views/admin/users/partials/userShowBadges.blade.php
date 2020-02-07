<div class="card shadow">
    <div class="card-header">
        <h3>{{__('admin.badges')}}</h3>
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
            @foreach($badges as $badge)
                <tr>
                    <th scope="row">{{ $badge->id }}</th>
                    <td>
                        <a href="{{route('admin.badges.show',$badge)}}">{{ $badge->name }}</a>
                    </td>
                    <td>{{ $badge->position }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
