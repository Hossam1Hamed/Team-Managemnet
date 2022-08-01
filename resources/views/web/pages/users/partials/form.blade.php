<!-- Name -->
<div>
    <label> {{ __('Name') }}</label>
    @error('name')
    <br><label style="color: red">{{ $message }}</label>
    @enderror
    <input class="form-control mb-0" id="name" type="text" name="name" value="{{ isset($user) ? $user->name : old('name') }}" required autofocus />

</div>

<!-- Email Address -->
<div>
    <label> {{ __('Email') }}</label>
    @error('email')
    <br><label style="color: red">{{ $message }}</label>
    @enderror
    <input class="form-control mb-0" id="email" type="email" name="email" value="{{ isset($user) ? $user->email : old('email') }}" required />

</div>

<!-- Phone -->
<div>
    <label> {{ __('Phone') }}</label>
    @error('name')
    <br><label style="color: red">{{ $message }}</label>
    @enderror
    <input class="form-control mb-0" id="phone" type="text" name="phone" value="{{ isset($user) ? $user->phone : old('phone') }}" />

</div>

<!-- Password -->
<div class="mt-4">
    <label> {{ __('Password') }}</label>
    @error('password')
    <br><label style="color: red">{{ $message }}</label>
    @enderror
    <input id="password" class="form-control mb-0" type="password" name="password" required autocomplete="current-password" />
</div>

<!-- Password Confirmation -->
<div class="mt-4">
    <label> {{ __('Confirm Password') }}</label>
    @error('password')
    <br><label style="color: red">{{ $message }}</label>
    @enderror
    <input id="password-confirm" type="password" class="form-control mb-0" name="password_confirmation" required autocomplete="current-password" />
</div>

<!-- detect role -->
<div class="mt-4">
    <label>{{ __('Select Role') }}</label>
    @error('role')
        <br><label style="color: red">{{ $message }}</label>
    @enderror
    <select class="form-control" name="role">
    <option value="" >...</option>
        @foreach ($roles as $role)
            <option value="{{$role->id}}" {{$user->roles[0]->id == $role->id ? 'selected' : ''}}>{{$role->name}}</option>
        @endforeach
    </select>
</div>

<!-- Select user type -->
<div class="mt-4">
    <label> {{ __('Select User\'s Type') }}</label>
    @error('type')
    <br><label style="color: red">{{ $message }}</label>
    @enderror
    <!-- <div class="form-group">
<div class="btn-group dropup mt-7"> -->
    <select class="form-control btn bg-gradient-warning" id="selectSpec" name="type" required>
        <option value="">...</option>

        <option value="2" {{ isset($user) && $user->type==2 ? 'selected' : ''}}>empolyee</option>
        <option value="3" {{ isset($user) && $user->type==3 ? 'selected' : ''}}>user</option>
    </select>

</div>

<!-- detect status -->
<!-- <div class="mt-4">
    <label> {{ __('Detect User\'s Status') }}</label>
    @error('status')
    <br><label style="color: red">{{ $message }}</label>
    @enderror -->
    <!-- <div class="form-check form-switch" style="display:inline-block;"> -->
    <!-- <input class="form-check-input" type="checkbox" role="switch" data-bs-original-title="Active" checked> -->
    <!-- <input data-id="" name="status" class="form-check-input toggle-class" type="checkbox" role="switch" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="1" data-off="0" checked> -->
    <!-- <input type="checkbox" id="toggle-two" data-toggle="toggle" data-on="Enabled" data-off="Disabled">
                        <input type="checkbox" id="toggle-two"> -->
<!-- </div>
</div> -->