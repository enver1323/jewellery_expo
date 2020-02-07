@extends('layouts.app')
@section('header')
    <div class="poster poster-sm poster-cabinet">
        <div class="container">
            <div class="row page-title">
                <h1>
                    {{__('menus.productSections')}}
                </h1>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="container">
        <div class="row my-5">
            <div class="col-12">
                <ul class="list-group list-group-flush">
                    @foreach($industries as $industry)
                        <li class="list-group-item justify-content-between align-items-center d-flex">
                            {{str_repeat("~", $industry->depth).$industry->name}}
                            <span class="badge badge-primary badge-pill">{{$industry->users_count}}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
