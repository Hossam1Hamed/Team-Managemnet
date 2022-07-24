@extends('web.layouts.base')
@section('content')

<div class="card">

    <div class="card-header pb-0">
        <div class="d-lg-flex">
            <div>

                <h3 class="mb-0">All Users</h3>

            </div>
            <div class="ms-auto my-auto mt-lg-0 mt-4">
                <div class="ms-auto my-auto">
                    <a class="btn bg-gradient-primary btn-sm mb-0" href="{{route('users.create')}}">
                        +&nbsp; New User
                    </a>

                </div>
            </div>
        </div>
    </div>

    @include('web.pages.users.partials.table')

</div>

@endsection