@extends('backend.master')
@section('content')
<form action="{{ route('backend.role-permission.store') }}" method="post">
    @csrf
    <div class="mb-3">
        <label for="" class="form-label">Role Name <span class="text-danger"><i
                    class="fa-solid fa-asterisk"></i></span></label>
        <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId"
            placeholder="Enter a role name">
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
            <div class="flex items-center">
                <h6 class="font-medium text-primary">{{ucfirst($module->name)}}<span class="text-danger ml-1"><i
                            class="fa-solid fa-asterisk"></i></span></h6>
            </div>
            @foreach($module->permissions as $permission)
            <div style="margin-left: 50px; margin-top: 5px">
                <input type="checkbox" name="permission_ids[]" value="{{$permission->id}}" multiple />
                <span style="font-size: 15px;margin-top: 2px">{{ucwords(Str::replace(".","
                    ",$permission->name))}}</span>
            </div>
            @endforeach
        </div>
        @endforeach
    </div>
    <a href="{{ route('backend.role-permission.index') }}" class="btn btn-danger">Cancel</a><span>
        <button type="submit" class="btn btn-primary">
            Create
        </button></span>
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
