@extends('backend.master')
@section('content')
<form action="{{ route('backend.role-permission.update',$role->id) }}" method="post">
    @csrf
    <div class="mb-3">
        <label for="" class="form-label">Role Name <span class="text-danger"><i
                    class="fa-solid fa-asterisk"></i></span></label>
        <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId"
            placeholder="Enter a role name" value="{{ $role->name }}">
        <p class="form-text text-danger mt-3">
            @error('name')
            {{ $message }}
            @enderror
        </p>
    </div>
    <h4 class="text-center text-primary">Permission List</h4>
    <div class="form-check">
        <input class="form-check-input" name="" id="select-all" type="checkbox" value="checkedValue"
            aria-label="Text for screen reader" onchange="checkAll(this)">
        <span class="font-weight-bold text-danger font-size-large">Select All/Unselect All</span>
    </div>
    <div class="mt-5">
        @foreach($modules as $module)
        <div class="mb-4">
            <h6 class="font-weight-medium text-primary">{{ucwords($module->name)}}<span class="text-danger ml-1"><i
                        class="fa-solid fa-asterisk"></i></span></h6>
            @foreach($module->permissions as $permission)
            <div style="margin-left: 50px; margin-top: 5px">
                <input type="checkbox" {{(in_array($permission->id,$role->permissions->pluck('id')->toArray())) ?
                'checked' : ''}} name="permission_ids[]" value="{{$permission->id}}" multiple />
                <span style="font-size: 15px;margin-top: 2px">{{ucwords(Str::replace(".","
                    ",$permission->name))}}</span>
            </div>
            @endforeach
        </div>
        @endforeach
    </div>
    <div class="mb-3">
        <a href="{{ route('backend.role-permission.index') }}" class="btn btn-danger">Cancel</a><span>
            <button type="submit" class="btn btn-primary">
                Update
            </button></span>
    </div>
</form>
<script>
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    function checkAll(myCheckbox) {
        if (myCheckbox.checked == true) {
            checkboxes.forEach(function (checkbox) {
                checkbox.checked = true;

            })
        } else {
            checkboxes.forEach(function (checkbox) {
                checkbox.checked = false;
            })
        }
    }
</script>
@endsection