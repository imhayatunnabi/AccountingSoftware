@extends('account::accounts.layout.master')
@section('content')
<a href="{{ route('account.transaction.create') }}" class="btn btn-primary">Create</a>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Serial</th>
                <th scope="col">Payable</th>
                <th scope="col">Account</th>
                <th scope="col">Transaction Type</th>
                <th scope="col">Paid</th>
                <th scope="col">Due</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $item)
            <tr class="">
                <td scope="row">{{ $item->id }}</td>
                <td>{{ $item->payable }}</td>
                <td>{{ $item->account->name }}</td>
                <td>{{ $item->transactionType->name }}</td>
                <td>{{ $item->amount }}</td>
                <td>{{ $item->due>0 ? $item->due : 'No Due' }}</td>
                <td>{{ $item->status == true?'Cash In':'Cash Out' }}</td>
                <td>
                    <a href="{{ route('account.transaction.edit',$item->id) }}" class="btn btn-primary">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    </a>
                    <a href="{{ route('account.transaction.destroy',$item->id) }}" class="btn btn-danger">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection
