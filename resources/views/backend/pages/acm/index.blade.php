@extends('backend.master')
@section('content')
<a href="{{ route('backend.role-permission.create') }}" class="btn btn-primary">
    Create Roles
</a>
<h4 class="text-center text-primary my-3">Current Roles List</h4>
<div class="table-responsive">
    <table class="table" id="pagination">
        <thead>
            <tr>
                <th scope="col">Role Id</th>
                <th scope="col">Role Name</th>
                <th scope="col">Role Slug</th>
                <th scope="col">Role Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $item)
            <tr class="">
                <td scope="row">{{ $item->id }}</td>
                <td scope="row">{{ $item->name }}</td>
                <td>{{ $item->slug }}</td>
                <td>
                    <a href="{{ route('backend.role-permission.edit',$item->slug) }}" class="btn btn-primary">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                    <a href="{{ route('backend.role-permission.destroy',$item->slug) }}" class="btn btn-danger">
                        <i class="fa-solid fa-trash-can"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<h4 class="text-center text-primary my-3">Available Permission List</h4>
<div class="table-responsive">
    <table class="table" id="datatables">
        <thead>
            <tr>
                <th scope="col">Permission ID</th>
                <th scope="col">Permission Name</th>
                <th scope="col">Permission Slug</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($permissions as $item)
            <tr class="">
                <td scope="row">{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->slug }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>



@endsection
