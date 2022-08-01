<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="example-text-input" class="form-control-label">name</label>
            @error('name')
            <br><label style="color: red">{{ $message }}</label>
            @enderror
            <input value="{{ $role[0]->name ?? '' }}" class="form-control" type="text" id="example-text-input" name="name">
        </div>
    </div>
    <div class="card">
        
        @php
        $models = ['users'];
        $maps = ['create','read','update','delete'];
        if(isset($role[0])){
            foreach($role[0]->permissions as $permission)
            {
                $permissions[]=$permission;
            }
        }
        @endphp
        <div class="form-group">
            <label>Permissions</label>
            <div class="card">
                <div class="card-header p-0">
                    <ul class="nav nav-tabs ml-auto p-2">
                        @foreach($models as $index=>$model)
                        <li class="{{$index==0?'active':''}}"><a href="#{{$model}}" data-toggle="tab">{{$model}}</a></li>
                        @endforeach
                    </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content">
                        @foreach($models as $index=>$model)
                        <div class="tab-pane {{$index==0?'active':''}}" id="{{$model}}">
                            @foreach($maps as $key=>$map)
                            <label><input type="checkbox" name="permissions[]" 
                                @if(isset($role[0])){
                                    @foreach($permissions as $permission)
                                        {{$permission->name ==  $model. '_' .$map ? 'checked' : '' }}
                                    @endforeach
                                @endif
                                value="{{$model .'_'. $map}}"> {{$map}}</label>
                            @endforeach
                        </div>
                        @endforeach
                    </div>
                    <!-- /.tab-content -->
                </div><!-- /.card-body -->
            </div>
        </div>
    </div>
</div>