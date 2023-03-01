@extends('account::accounts.layout.master')
@section('content')
<div class="container">
    <form action="{{ route('account.transaction.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 form-group">
            <label for="" class="form-label">Payable
                <span class="text-danger">
                    <i class="fa fa-asterisk" aria-hidden="true"></i>
                </span>
            </label>
            <input type="text" class="form-control" name="payable" id="payable" aria-describedby="helpId"
                placeholder="Enter payable name">
            <p class="form-text text-danger">
                @error('payable')
                {{ $message }}
                @enderror
            </p>
        </div>
        <div class="mb-3 form-group">
            <label for="" class="form-label">Transaction Account
                <span class="text-danger">
                    <i class="fa fa-asterisk" aria-hidden="true"></i>
                </span>
            </label>
            <select name="account_id" id="account_id" class="form-control">
                @foreach ($accounts as $item)
                <option value="{{ $item->id }}">Account:{{ $item->name }}
                    <span class="text-danger">
                        Balance:{{ remainingBalance($item->id)}}
                    </span>
                </option>
                @endforeach
            </select>
            <p class="form-text text-danger">
                @error('status')
                {{ $message }}
                @enderror
            </p>
        </div>
        <div class="mb-3 form-group">
            <label for="" class="form-label">Status
                <span class="text-danger">
                    <i class="fa fa-asterisk" aria-hidden="true"></i>
                </span>
            </label>
            <select name="status" id="status" class="form-control">
                <option value="0">Cash Out</option>
                <option value="1">Cash In</option>
            </select>
            <p class="form-text text-danger">
                @error('status')
                {{ $message }}
                @enderror
            </p>
        </div>
        <div class="row form-group" id="render">
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="" class="form-label">Item Name
                        <span class="text-danger">
                            <i class="fa fa-asterisk" aria-hidden="true"></i>
                        </span>
                    </label>
                    <input type="text" class="form-control" name="item_name[]" id="item_name" aria-describedby="helpId"
                        placeholder="Enter item name">
                    <p class="form-text text-danger">
                        @error('item_name')
                        {{ $message }}
                        @enderror
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="" class="form-label">Item Price
                        <span class="text-danger">
                            <i class="fa fa-asterisk" aria-hidden="true"></i>
                        </span>
                    </label>
                    <input type="text" class="form-control" name="item_price[]" id="item_price"
                        aria-describedby="helpId" placeholder="Enter item name">
                    <p class="form-text text-danger">
                        @error('item_price')
                        {{ $message }}
                        @enderror
                    </p>
                </div>
            </div>
            <div class="col-md-2">
                <div class="mb-3">
                    <label for="" class="form-label">Item Quantity
                        <span class="text-danger">
                            <i class="fa fa-asterisk" aria-hidden="true"></i>
                        </span>
                    </label>
                    <input type="text" class="form-control" name="quantity[]" id="quantity" aria-describedby="helpId"
                        placeholder="Item quantity">
                    <p class="form-text text-danger">
                        @error('quantity')
                        {{ $message }}
                        @enderror
                    </p>
                </div>
            </div>
            <div class="col-md-2">
                <div class="mt-4">
                    <button class="btn btn-primary" type="button" id="addButton">
                        <i class="fa fa-plus"></i>
                    </button>
                    <button class="btn btn-danger" type="button" id="removeButton">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<script>
    $(document).ready(function(){
        $("#addButton").click(function(){
            console.log('clicked');
            var doc = document.getElementById("render");
            console.log(doc);
            $("#render").append(`
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="" class="form-label">Item Name
                        <span class="text-danger">
                            <i class="fa fa-asterisk" aria-hidden="true"></i>
                        </span>
                    </label>
                    <input type="text" class="form-control" name="item_name[]" id="item_name" aria-describedby="helpId"
                        placeholder="Enter item name">
                    <p class="form-text text-danger">
                        @error('item_name')
                        {{ $message }}
                        @enderror
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="" class="form-label">Item Price
                        <span class="text-danger">
                            <i class="fa fa-asterisk" aria-hidden="true"></i>
                        </span>
                    </label>
                    <input type="text" class="form-control" name="item_price[]" id="item_price" aria-describedby="helpId"
                        placeholder="Enter item name">
                    <p class="form-text text-danger">
                        @error('item_price')
                        {{ $message }}
                        @enderror
                    </p>
                </div>
            </div>
            <div class="col-md-2">
                <div class="mb-3">
                    <label for="" class="form-label">Item Quantity
                        <span class="text-danger">
                            <i class="fa fa-asterisk" aria-hidden="true"></i>
                        </span>
                    </label>
                    <input type="text" class="form-control" name="quantity[]" id="quantity" aria-describedby="helpId"
                        placeholder="Item quantity">
                    <p class="form-text text-danger">
                        @error('quantity')
                        {{ $message }}
                        @enderror
                    </p>
                </div>
            </div>
            <div class="col-md-2">
                <div class="mt-4">
                    <button class="btn btn-primary" type="button" id="addButton">
                        <i class="fa fa-plus"></i>
                    </button>
                    <button class="btn btn-danger" type="button" id="removeButton">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            `);
        });
    });
</script>
@endsection
