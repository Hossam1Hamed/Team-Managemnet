@extends('web.layouts.base')
@section('content')

<div class="card">

    <div class="card-header pb-0">
        <div class="d-lg-flex">
            <div>

                <h3 class="mb-0">All Users</h3>

            </div>
            @if(auth()->user()->hasPermission('users_create'))
            <div class="ms-auto my-auto mt-lg-0 mt-4">
                <div class="ms-auto my-auto">
                    <a class="btn bg-gradient-primary btn-sm mb-0" href="{{route('users.create')}}">
                        +&nbsp; New User
                    </a>

                </div>
            </div>
            @endif
        </div>
        @if($users->count() > 0)
        <div class="row my-3">
            <form method="GET" action="{{ route('users.index') }}">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" name="search" class="form-control" placeholder="Please enter the user's email or name">

                    <button type="submit" class="btn btn-outline-primary mb-0" type="button" id="button-addon2">search</button>
                </div>
            </form>
        </div>
    </div>

    @include('web.pages.users.partials.table')

    @else
        <h3>no users found ... </h3>
    @endif

</div>

@endsection

@push('scripts')
<script>
$('.show_confirm').click(function(event) {
        var form = $(this).closest("form");
        var name = $(this).data("name");
        console.log(event);
        event.preventDefault();
        swal({
                title: `Are you sure you want to delete this record?`,
                text: "If you delete this, it will be gone forever.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
    });
</script>
<script>
    $("document").ready(function() {
        $(".alert").fadeTo(2000, 500).slideUp(500, function() {
            $(".alert").slideUp(500);
        });
    });
</script>
@endpush