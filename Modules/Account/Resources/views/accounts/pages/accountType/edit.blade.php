@extends('backend.master')
@section('content')
<div class="container">
    <form action="{{ route('account.type.update',$accountType->id) }}" method="post" enctype="multipart/form-data"
        class="form-group">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="" class="form-label">Type Name</label>
            <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId"
                placeholder="Enter account type name" value="{{ $accountType->name }}">
            <p class="form-text text-danger">
                @error('name')
                {{ $message }}
                @enderror
            </p>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Type Status</label>
            <select name="status" id="status" class="form-control">
                <option value="0" {{ $accountType->status == 0?'selected':'' }}>Inactive</option>
                <option value="1" {{ $accountType->status == 1?'selected':'' }}>Active</option>
            </select>
            <p class="form-text text-danger">
                @error('status')
                {{ $message }}
                @enderror
            </p>
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div>
@endsection