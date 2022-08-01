@extends('web.layouts.base')
@section('content')

<div class="card">

    <div class="card-header pb-0">
        <div class="d-lg-flex">
            <div>

                <h3 class="mb-0">All Roles</h3>

            </div>
            <div class="ms-auto my-auto mt-lg-0 mt-4">
                <div class="ms-auto my-auto">
                    <a class="btn bg-gradient-primary btn-sm mb-0" href="{{route('roles.create')}}">
                        +&nbsp; New Role
                    </a>

                </div>
            </div>
        </div>

    </div>
    @if($roles->count() > 0)

    @include('web.pages.roles.partials.table')

    @else
     <h3>no roles found ... </h3>
    @endif
</div>

@endsection