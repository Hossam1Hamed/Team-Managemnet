<div class="table-responsive">
  <table class="table align-items-center mb-0">
    <thead>
      <tr>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">name</th>
        <th class="text-secondary opacity-7"></th>
      </tr>
    </thead>
    <tbody>
      @foreach($roles as $role)
      <tr>
        <td>
          <p class="text-xs font-weight-bold mb-0">{{$role->name}}</p>
        </td>
        <td class="align-middle">
          <a href="{{route('roles.show',$role->id)}}" class="badge badge-sm badge-secondary" data-toggle="tooltip" data-original-title="Show user">
            show
          </a>
          <a href="{{route('roles.edit',$role->id)}}" class="badge badge-sm badge-warning" data-toggle="tooltip" data-original-title="Edit user">
            Edit
          </a>
          <form method="post" action="{{route('roles.destroy',$role->id)}}" style="display: inline-block;" data-bs-toggle="tooltip" data-bs-original-title="Delete">
            @csrf
            {{ method_field('DELETE') }}
            <button class="badge badge-sm badge-danger show_confirm">delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>