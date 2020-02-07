<div class="card shadow">
    <div class="card-header">
        <h3>{{__('admin.profile')}}</h3>
    </div>
    <div class="card-body">
        <div class="row mb-4">
            <div class="col">
                <strong>{{__('admin.company')}}: </strong>
                <span>{{$profile->company}}</span>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col">
                <strong>{{__('admin.phone')}}: </strong>
                <span>{{$profile->phone}}</span>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col">
                <strong>{{__('admin.country')}}: </strong>
                <span>{{$profile->getCountry()->name}}</span>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col">
                <strong>{{__('admin.position')}}: </strong>
                <span>{{$profile->position}}</span>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col">
                <strong>{{__('admin.gender')}}: </strong>
                <span>{{$profile->getGender()}}</span>
            </div>
        </div>
    </div>
</div>
