@extends('web.layouts.base')
@section('content')

<form action="{{route('roles.update',$role[0]->id)}}" method="POST">
    @csrf
    {{ method_field('PUT') }}

    @include('web.pages.roles.partials.form')

    <div class="form-group">
        <a href="{{route('roles.index')}}" class="btn bg-gradient-secondary">Cancel</button>
            <button type="submit" id="" class="btn bg-gradient-primary">Update</button>
    </div>
</form>

@endsection