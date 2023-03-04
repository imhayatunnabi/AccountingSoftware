@extends('account::accounts.layout.master')
@section('content')
<div class="container">
    <form action="{{ route('account.setup.update',$account->id) }}" method="post" enctype="multipart/form-data"
        class="form-group">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Account Name</label>
            <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId"
                placeholder="Enter account name" value="{{ $account->name }}">
            <p class="form-text text-danger">
                @error('name')
                {{ $message }}
                @enderror
            </p>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Type </label>
            <select name="type" id="type" class="form-control">
                @foreach ($accountTypes as $item)
                <option value="{{ $item->id }}" {{ $item->id == $account->account_type_id ? 'selected':'' }}>{{
                    $item->name }}</option>
                @endforeach
            </select>
            <p class="form-text text-danger">
                @error('type')
                {{ $message }}
                @enderror
            </p>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Account Number</label>
            <input type="text" class="form-control" name="number" id="number" aria-describedby="helpId"
                placeholder="Enter account number" value="{{ $account->number }}">
            <p class="form-text text-danger">
                @error('number')
                {{ $message }}
                @enderror
            </p>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Type Status</label>
            <select name="status" id="status" class="form-control">
                <option value="0" {{ $item->status == $account->status ? 'selected':'' }}>Inactive</option>
                <option value="1" {{ $item->status == $account->status ? 'selected':'' }}>Active</option>
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