@extends('layouts.cabinet')
@section('tab_content')
    <a href="{{route('cabinet.stalls.create')}}" class="btn btn-block btn-success btn-rounded mb-4">
        {{sprintf('%s %s', __('frontend.create'), __('frontend.stall'))}}
    </a>

    @if(count($stalls))
        <div class="card">
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead class="mdb-color darken-3">
                    <tr class="text-white">
                        <th>#</th>
                        <th>{{__('frontend.name')}}</th>
                        <th>{{__('frontend.position')}}</th>
                        <th>{{__('frontend.approved')}}</th>
                        <th>{{__('frontend.options')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($stalls as $stall)
                        <tr>
                            <th scope="row">{{$loop->index + 1}}</th>
                            <td>{{$stall->name}}</td>
                            <td>{{$stall->position}}</td>
                            @if($stall->isApproved())
                                <td class="text-success"><i class="fas fa-check fa-lg"></i></td>
                            @else
                                <td class="text-warning"><i class="fas fa-hourglass-start fa-lg"></i></td>
                            @endif
                            <td>
                                <a href="{{route('cabinet.stalls.show', $stall)}}"
                                   class="btn-floating btn-sm btn-primary">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{route('cabinet.stalls.edit', $stall)}}"
                                   class="btn-floating btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{route('cabinet.stalls.destroy', $stall)}}"
                                      class="d-inline" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-floating btn-sm btn-danger m-0">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection
