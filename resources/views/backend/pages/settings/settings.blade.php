@extends('backend.master')
@section('content')
<form action="{{ route('backend.settings.update',settings()->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="row">
        <div class="col-md-4">
            <div class="mb-3 form-group">
                <label for="name" class="form-label">Company Name
                    <span class="text-danger">
                        <i class="fa-solid fa-asterisk"></i>
                    </span>
                </label>
                <input type="text" class="form-control" name="name" id="name" value="{{ settings()->name }}"
                    placeholder="Enter clinic name">
                <p class="form-text text-danger">
                    @error('name')
                    {{ $message }}
                    @enderror
                </p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3 form-group">
                <label for="email" class="form-label">Company Email
                    <span class="text-danger">
                        <i class="fa-solid fa-asterisk"></i>
                    </span>
                </label>
                <input type="email" class="form-control" name="email" id="email" value="{{ settings()->email }}"
                    placeholder="Enter clinic email">
                <p class="form-text text-danger">
                    @error('email')
                    {{ $message }}
                    @enderror
                </p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3 form-group">
                <label for="phone" class="form-label">Company Phone
                    <span class="text-danger">
                        <i class="fa-solid fa-asterisk"></i>
                    </span>
                </label>
                <input type="text" class="form-control" name="phone" id="phone" value="{{ settings()->phone }}"
                    placeholder="Enter clinic phone">
                <p class="form-text text-danger">
                    @error('phone')
                    {{ $message }}
                    @enderror
                </p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="mb-3 form-group">
                <label for="address" class="form-label">Company Address
                    <span class="text-danger">
                        <i class="fa-solid fa-asterisk"></i>
                    </span>
                </label>
                <input type="address" class="form-control" name="address" id="address" value="{{ settings()->address }}"
                    placeholder="Enter clinic address">
                <p class="form-text text-danger">
                    @error('address')
                    {{ $message }}
                    @enderror
                </p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3 form-group">
                <label for="linkedin" class="form-label">Company Linkedin
                    <span class="text-danger">
                        <i class="fa-solid fa-asterisk"></i>
                    </span>
                </label>
                <input type="linkedin" class="form-control" name="linkedin" id="linkedin"
                    value="{{ settings()->linkedin }}" placeholder="Enter clinic linkedin">
                <p class="form-text text-danger">
                    @error('linkedin')
                    {{ $message }}
                    @enderror
                </p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3 form-group">
                <label for="facebook" class="form-label">Company Facebook
                    <span class="text-danger">
                        <i class="fa-solid fa-asterisk"></i>
                    </span>
                </label>
                <input type="facebook" class="form-control" name="facebook" id="facebook"
                    value="{{ settings()->facebook }}" placeholder="Enter clinic facebook">
                <p class="form-text text-danger">
                    @error('facebook')
                    {{ $message }}
                    @enderror
                </p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="mb-3 form-group">
                <label for="logo" class="form-label">Company Logo
                    <span class="text-danger">
                        <i class="fa-solid fa-asterisk"></i>
                    </span>
                </label>
                <input type="file" class="form-control" name="logo" id="logo" placeholder="Enter clinic logo">
                <p class="form-text text-danger">
                    @error('logo')
                    {{ $message }}
                    @enderror
                </p>
            </div>
        </div>
        <div class="col-md-2">
            <img style="width: 150px;border-radius:10px;" src="{{ url('/uploads/settings/',settings()->logo) }}" alt=""
                srcset="">
        </div>
        <div class="col-md-4">
            <div class="mb-3 form-group">
                <label for="favicon" class="form-label">Company Favicon
                    <span class="text-danger">
                        <i class="fa-solid fa-asterisk"></i>
                    </span>
                </label>
                <input type="file" class="form-control" name="favicon" id="favicon" placeholder="Enter clinic favicon">
                <p class="form-text text-danger">
                    @error('favicon')
                    {{ $message }}
                    @enderror
                </p>
            </div>
        </div>
        <div class="col-md-2">
            <img style="width: 150px;border-radius:10px;" src="{{ url('/uploads/settings/',settings()->favicon) }}"
                alt="" srcset="">
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection