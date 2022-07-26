@extends('web.layouts.base')
@section('content')

<form action="{{route('roles.store')}}" method="POST">
    @csrf

    @include('web.pages.roles.partials.form')

    <div class="form-group">
        <a href="{{route('users.index')}}" class="btn bg-gradient-secondary">Cancel</button>
        <button type="submit" id="" class="btn bg-gradient-primary">Save</button>
    </div>
</form>
@endsection