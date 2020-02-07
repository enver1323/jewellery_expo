@foreach ($errors->getBags() as $type => $error)
    <div class="alert alert-{{$type}} alert-dismissible" role="alert">
        {{ $errors->$type->first() }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endforeach
