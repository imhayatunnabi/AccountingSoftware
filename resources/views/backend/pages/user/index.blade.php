@extends('backend.master')
@section('content')
<h4 class="mt-2 text-primary text-center">Users List</h4>
<a href="{{ route('backend.user.create') }}" class="btn btn-primary">Create User</a>
<div class="table-responsive mt-4">
    <table class="table" id="datatables">
        <thead>
            <tr>
                <th scope="col">User ID</th>
                <th scope="col">User Name</th>
                <th scope="col">User Role</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $item)
            <tr class="">
                <td scope="row">{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->role->name }}</td>
                <td>
                    <a href="{{ route('backend.user.edit',$item->id) }}" class="btn btn-primary"><i
                            class="fa-solid fa-pen-to-square"></i></a>
                    <a href="{{ route('backend.user.destroy',$item->id) }}" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
