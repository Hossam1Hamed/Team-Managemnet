@extends('web.layouts.base')
@section('content')

<form action="{{route('users.update',$user->id)}}" method="POST">
    
    @csrf
    {{ method_field('PUT') }}

    @include('web.pages.users.partials.form')

    <div class="form-group">
        <a href="{{route('users.index')}}" class="btn bg-gradient-secondary">Cancel</button>
            <button type="submit" id="" class="btn bg-gradient-primary">Update</button>
    </div>
</form>

@endsection