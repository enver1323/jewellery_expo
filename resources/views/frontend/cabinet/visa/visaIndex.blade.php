@extends('layouts.cabinet')
@section('tab_content')
    <a href="{{route('cabinet.visas.create')}}" class="btn btn-block btn-success btn-rounded mb-4">
        {{sprintf('%s %s', __('frontend.create'), __('frontend.visa'))}}
    </a>

    @if(count($visas))
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
                    @foreach($visas as $visa)
                        <tr>
                            <th scope="row">{{$loop->index + 1}}</th>
                            <td>{{$visa->name}}</td>
                            <td>{{$visa->position}}</td>
                            @if($visa->isApproved())
                                <td class="text-success"><i class="fas fa-check fa-lg"></i></td>
                            @else
                                <td class="text-warning"><i class="fas fa-hourglass-start fa-lg"></i></td>
                            @endif
                            <td>
                                <a href="{{route('cabinet.visas.show', $visa)}}"
                                   class="btn-floating btn-sm btn-primary">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{route('cabinet.visas.edit', $visa)}}"
                                   class="btn-floating btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{route('cabinet.visas.destroy', $visa)}}"
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
