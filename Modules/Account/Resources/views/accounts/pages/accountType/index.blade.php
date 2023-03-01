@extends('account::accounts.layout.master')
@section('content')
<a href="{{ route('account.type.create') }}" class="btn btn-primary">Create</a>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Serial</th>
                <th scope="col">Type Name</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($accountTypes as $item)
            <tr class="">
                <td scope="row">{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->status== true ? 'Active':'Inactive' }}</td>
                <td>
                    <a href="{{ route('account.type.edit',$item->id) }}" class="btn btn-primary">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    </a>
                    <a href="{{ route('account.type.destroy',$item->id) }}" class="btn btn-danger">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
