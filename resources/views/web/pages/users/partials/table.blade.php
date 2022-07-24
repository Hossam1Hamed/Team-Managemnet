<div class="table-responsive">
  <table class="table align-items-center mb-0">
    <thead>
      <tr>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">user</th>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">name</th>
        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">email</th>
        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">phone</th>
        <th class="text-secondary opacity-7"></th>
      </tr>
    </thead>
    <tbody>
      @foreach($users as $user)
      <tr>
        <td>
          <div class="d-flex px-2 py-1">
            <div>
              <img src="https://demos.creative-tim.com/soft-ui-design-system-pro/assets/img/team-2.jpg" class="avatar avatar-sm me-3">
            </div>
          </div>
        </td>
        <td>
          <p class="text-xs font-weight-bold mb-0">{{$user->name}}</p>
        </td>
        <td class="align-middle text-center text-sm">
          <span class="text-xs font-weight-bold mb-0">{{$user->email}}</span>
        </td>
        <td class="align-middle text-center">
          <span class="text-secondary text-xs font-weight-bold">{{$user->phone ? $user->phone : 'no Phone'}}</span>
        </td>
        <td class="align-middle">
          <a href="{{route('users.show',$user->id)}}" class="badge badge-sm badge-secondary" data-toggle="tooltip" data-original-title="Show user">
            show
          </a>
          <a href="{{route('users.edit',$user->id)}}" class="badge badge-sm badge-warning" data-toggle="tooltip" data-original-title="Edit user">
            Edit
          </a>
          <a href="{{route('users.destroy',$user->id)}}" class="badge badge-sm badge-danger show_confirm" data-toggle="tooltip" data-original-title="Delete user">
            delete
          </a>
          <div style="display:inline-block;">
            <form method="post" action="{{route('users.destroy',$user->id)}}" data-bs-toggle="tooltip" data-bs-original-title="Delete">
              @csrf
              {{ method_field('DELETE') }}
              <button class="badge badge-sm badge-danger border-none show_confirm">delete</button>
            </form>
          </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>