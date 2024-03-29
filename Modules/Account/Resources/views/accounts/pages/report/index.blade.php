@extends('account::accounts.layout.master')
@section('content')
<h4 class="text-center text-primary">Balance</h4>
<div class="row">
    @foreach ($accounts as $item)
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Account Name: <span class="text-danger">{{ $item->name }}</span></h4>
                <p class="card-text">Balance: {{ balance($item->id) }}</p>
            </div>
        </div>
    </div>
    @endforeach
</div>
<h4 class="text-center text-primary">Report</h4>
<form action="{{ route('account.index') }}" method="get" class="form-group">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-2">
            <label class="control-label" for="y"> Select Year</label>
            <select name="y" id="y" class="form-control">
                @foreach(array_combine(range(date("Y"), 1900), range(date("Y"), 1900)) as $year)
                <option value="{{ $year }}" @if($year===old('y', Request::get('y', date('Y')))) selected @endif>
                    {{ $year }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-2">
            <label class="control-label" for="m">Select Month</label>
            <select name="m" for="m" class="form-control">
                @foreach(cal_info(0)['months'] as $month)
                <option value="{{ $month }}" @if($month===old('m', Request::get('m', date('m')))) selected @endif>
                    {{ $month }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-2">
            <label for="Entity" class="form-label">Select Type</label>
            <select name="entity" id="" class="form-control">
                <option value="0">Cash Out</option>
                <option value="1">Cash In</option>
            </select>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-2">
            <button class="mt-4 btn btn-primary">Submit</button>
        </div>
    </div>
</form>
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
