@extends('backend.master')
@section('content')
<h4 class="mt-2 text-primary text-center">Users Create</h4>
<form action="{{ route('backend.user.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3 form-group">
                <label for="Name" class="form-label"> Name <span class="mr-2 text-danger"><i
                            class="fa-solid fa-asterisk"></i></span></label>
                <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId"
                    placeholder="Enter  Name" required>
                <p class="form-text text-danger">
                    @error('name')
                    {{ $message }}
                    @enderror
                </p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3 form-group">
                <label for="Name" class="form-label"> Email <span class="mr-2 text-danger"><i
                            class="fa-solid fa-asterisk"></i></span></label>
                <input type="email" class="form-control" name="email" id="email" aria-describedby="helpId"
                    placeholder="Enter  Email" required>
                <p class="form-text text-danger">
                    @error('email')
                    {{ $message }}
                    @enderror
                </p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3 form-group">
                <label for="Phone" class="form-label">Phone
                    <span class="mr-2 text-danger"><i class="fa-solid fa-asterisk"></i></span>
                </label>
                <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter Phone Number">
                <p class="form-text text-danger">
                    @error('phone')
                    {{ $message }}
                    @enderror
                </p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3 form-group">
                <label for="Name" class="form-label"> Status <span class="mr-2 text-danger"><i
                            class="fa-solid fa-asterisk"></i></span></label>
                <select name="status" id="status" class="form-control">
                    <option value="0">Inactive</option>
                    <option value="1">Active</option>
                </select>
                <p class="form-text text-danger">
                    @error('status')
                    {{ $message }}
                    @enderror
                </p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3 form-group">
                <label for="DOB" class="form-label">Date of Birth
                    <span class="mr-2 text-danger"><i class="fa-solid fa-asterisk"></i></span>
                </label>
                <input type="date" class="form-control" name="dob" id="dob">
                <p class="form-text text-danger">
                    @error('dob')
                    {{ $message }}
                    @enderror
                </p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="mb-3 form-group">
                <label for="Name" class="form-label"> Address <span class="mr-2 text-danger"><i
                            class="fa-solid fa-asterisk"></i></span></label>
                <input type="text" class="form-control" name="address" id="address" aria-describedby="helpId"
                    placeholder="Enter  Address" required>
                <p class="form-text text-danger">
                    @error('address')
                    {{ $message }}
                    @enderror
                </p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3 form-group">
                <label for="role" class="form-label">Role
                    <span class="mr-2 text-danger"><i class="fa-solid fa-asterisk"></i></span>
                </label>
                <select name="role_id" id="role_id" class="form-control">
                    @foreach (roles() as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                <p class="form-text text-danger">
                    @error('role_id')
                    {{ $message }}
                    @enderror
                </p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3 form-group">
                <label for="Image" class="form-label">Image
                    <span class="mr-2 text-danger"><i class="fa-solid fa-asterisk"></i></span>
                </label>
                <input type="file" class="form-control" name="image" id="image" placeholder="Enter Image Number">
                <p class="form-text text-danger">
                    @error('image')
                    {{ $message }}
                    @enderror
                </p>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
