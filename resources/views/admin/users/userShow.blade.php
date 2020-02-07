@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-12 col-lg-6">
            @include('admin.users.partials.userShowDetails', ['user' => $user])
        </div>
        <div class="col-12 col-lg-6">
            @include('admin.users.partials.userShowProfile', ['profile' => $user->profile])
        </div>
        @if(count($user->badges))
            <div class="col-12 col-lg-6">
                @include('admin.users.partials.userShowBadges', ['badges' => $user->badges])
            </div>
        @endif
        @if(count($user->visas))
            <div class="col-12 col-lg-6">
                @include('admin.users.partials.userShowVisas', ['visas' => $user->visas])
            </div>
        @endif
        @if(count($user->stalls))
            <div class="col-12 col-lg-6">
                @include('admin.users.partials.userShowStalls', ['stalls' => $user->stalls])
            </div>
        @endif
    </div>
@endsection
