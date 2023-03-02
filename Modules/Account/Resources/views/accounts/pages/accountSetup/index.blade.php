@extends('account::accounts.layout.master')
@section('content')
<a href="{{ route('account.setup.create') }}" class="btn btn-primary">Setup Account</a>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Serial</th>
                <th scope="col">Name</th>
                <th scope="col">Account Type</th>
                <th scope="col">Account Number</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($accounts as $item)
            <tr class="">
                <td scope="row">{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->accountType->name }}</td>
                <td>{{ $item->number }}</td>
                <td>{{ $item->status == true?'Active':'Inactive' }}</td>
                <td>
                    <a href="{{ route('account.setup.edit',$item->id) }}" class="btn btn-primary">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    </a>
                    <a href="{{ route('account.setup.destroy',$item->id) }}" class="btn btn-danger">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
