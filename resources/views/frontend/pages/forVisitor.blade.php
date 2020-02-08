@extends('layouts.app')
@section('header')
    <div class="poster poster-sm poster-cabinet">
        <div class="container">
            <div class="row page-title">
                <h1>
                    {{__('menus.forVisitor')}}
                </h1>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="container">
        <div class="row my-5">
            <div class="col-12">
                <h4 class="my-3 indigo-text font-weight-bold">{{__('pages.titles.fairInfo.forVisitor')}}</h4>
                <div class="list-group">
                    @foreach(__('pages.forVisitor.steps') as $step)
                        <a href="{{$step['link']}}" class="list-group-item list-group-item-action">
                            {!! $step['name'] !!}
                        </a>
                    @endforeach
                </div>
                <hr>
            </div>
            <div class="col-12">
                <h4 class="my-3 indigo-text font-weight-bold d-block"> {{__('pages.titles.fairInfo.downloads')}}</h4>
                <ul class="list-group list-group-horizontal-sm">
                    @foreach($documents->files as $document)
                        <li class="list-group-item">
                            <h6 class="d-inline">{{__($document->name)}}</h6>
                            <a href="{{asset($documents->path."/".$document->file.ucfirst(app()->getLocale()).".".$document->ext)}}">
                                <i class="ml-2 fas fa-download"></i>
                            </a>
                        </li>
                    @endforeach
                </ul>
                <hr>
            </div>
        </div>
        <div class="row my-5" id="exhibitorList">
            <div class="col-12">
                <h4 class="my-3 indigo-text font-weight-bold">{{__('pages.forVisitor.exhibitorList')}}</h4>
                <form action="?" method="GET" class="form-inline">
                    <div class="md-form">
                        <i class="fas fa-building prefix"></i>
                        <input type="text" id="company" class="form-control"
                               aria-describedby="companyErr" name="company">
                        <label for="company">{{ __('auth.yourCompany') }}</label>
                        @error('company')
                        <small id="companyErr" class="form-text red-text">
                            <strong>{{ $message }}</strong>
                        </small>
                        @enderror
                    </div>

                    <div class="md-form">
                        <select class="browser-default custom-select" id="country" required
                                name="country_code" aria-describedby="countryErr">
                            <option selected disabled hidden>
                                {{__('auth.yourCountry')}}
                            </option>
                        </select>
                        @error('country_code')
                        <small id="countryErr" class="form-text red-text">
                            <strong>{{ $message }}</strong>
                        </small>
                        @enderror
                    </div>
                    <div class="mx-1 mb-1">
                        <button class="btn btn-primary" type="submit"><i
                                class="fa fa-search"></i> {{__('admin.search')}}
                        </button>
                    </div>
                </form>
                <table class="table table-striped table-hover">
                    <thead class="primary-color-dark white-text">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{__('admin.company')}}</th>
                        <th scope="col">{{__('admin.country')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($exhibitors as $exhibitor)
                        <tr>
                            <th scope="row">{{$loop->index + 1}}</th>
                            <td>{{$exhibitor->profile->company}}</td>
                            <td>{{$exhibitor->profile->getCountry()->name}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-around">
                    {!! $exhibitors->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript" src="{{mix('js/apiSelect.js')}}"></script>
    <script type="text/javascript">
        window.addEventListener('DOMContentLoaded', function (event) {
            new APISelect('#country', "{{route('api.ajax.countries')}}");
        })
    </script>
@endpush
