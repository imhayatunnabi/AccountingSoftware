@extends('account::accounts.layout.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h5>Payable: <span class="text-danger">{{ $transaction->payable }}</span></h5>
        </div>
        <div class="col-md-6">
            <h5>Account: <span class="text-danger">{{ $transaction->account->name }}</span></h5>
        </div>
        <div class="col-md-4">
            <h5>Account Number: <span class="text-danger">{{ $transaction->account->number }}</span></h5>
        </div>
        <div class="col-md-4">
            <h5>Transaction For: <span class="text-danger">{{ $transaction->transactionType->name }}</span></h5>
        </div>
        <div class="col-md-4">
            <h5>Transaction Type: <span class="text-danger">{{ $transaction->status == true ? 'Cash In':'cash Out'
                    }}</span></h5>
        </div>
    </div>

    <div class="row form-group">
        @foreach ($transaction->transactionDetails as $key=>$item)
        <div class="col-md-4">
            <div class="mb-3">
                <label for="" class="form-label">Item Name
                    <span class="text-danger">
                        <i class="fa fa-asterisk" aria-hidden="true"></i>
                    </span>
                </label>
                <input type="text" class="form-control" name="item_name" id="item_name" aria-describedby="helpId"
                    placeholder="Enter item name" value="{{ $item->item_name }}" disabled>
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
                <input type="text" class="form-control" name="item_price" id="item_price" aria-describedby="helpId"
                    placeholder="Enter item name" value="{{ $item->item_price }}" disabled>
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
                <input type="text" class="form-control" name="quantity" id="quantity" aria-describedby="helpId"
                    placeholder="Item quantity" value="{{ $item->quanity }}" disabled>
                <p class="form-text text-danger">
                    @error('quantity')
                    {{ $message }}
                    @enderror
                </p>
            </div>
        </div>
        <div class="col-md-2">
            <div class="mt-4">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#exampleModal{{ $item->id }}">
                    <i class="fa fa-pencil" aria-hidden="true"></i>
                </button>
            </div>
        </div>
        <div class="modal" id="exampleModal{{ $item->id }}" tabindex="1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit {{ $item->item_name}}</h5>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('account.transaction.editDetails',$item->id) }}" method="post"
                            class="form-group">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Item Name
                                            <span class="text-danger">
                                                <i class="fa fa-asterisk" aria-hidden="true"></i>
                                            </span>
                                        </label>
                                        <input type="text" class="form-control" name="item_name" id="item_name"
                                            aria-describedby="helpId" placeholder="Enter item name"
                                            value="{{ $item->item_name }}">
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
                                        <input type="text" class="form-control" name="item_price" id="item_price"
                                            aria-describedby="helpId" placeholder="Enter item name"
                                            value="{{ $item->item_price }}">
                                        <p class="form-text text-danger">
                                            @error('item_price')
                                            {{ $message }}
                                            @enderror
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Item Quantity
                                            <span class="text-danger">
                                                <i class="fa fa-asterisk" aria-hidden="true"></i>
                                            </span>
                                        </label>
                                        <input type="text" class="form-control" name="quantity" id="quantity"
                                            aria-describedby="helpId" placeholder="Item quantity"
                                            value="{{ $item->quanity }}">
                                        <p class="form-text text-danger">
                                            @error('quantity')
                                            {{ $message }}
                                            @enderror
                                        </p>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <button class="btn btn-primary" type="button" id="addNew">New Transaction</button>
    <form action="{{ route('account.transaction.addDetails',$transaction->id) }}" method="post"
        id="newAddedTransactionType" class="form-group mt-3">
        @csrf
        @if ($errors->any())
        <div class="">
            @foreach ($errors->all() as $error)
            <p class="text-danger">
                {{$error}} <span class="text-danger"><i class="fa fa-asterisk" aria-hidden="true"></i></span>
            </p>
            @endforeach
        </div>
        @endif
        <div class="row" id="appendInputFields"></div>
        <button type="submit" class="btn btn-primary">Add New</button>
    </form>
</div>
<script>
    $(document).ready(function () {
        $("#addNew").click(function (e) {
            e.preventDefault();
            var newAddedTransactionType = document.getElementById("newAddedTransactionType");
            console.log(newAddedTransactionType);
            $("#appendInputFields").append(`
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="" class="form-label">Item Name
                        <span class="text-danger">
                            <i class="fa fa-asterisk" aria-hidden="true"></i>
                        </span>
                    </label>
                    <input type="text" class="form-control" name="new_item_name[]" id="item_name" aria-describedby="helpId"
                        placeholder="Enter item name">
                    <p class="form-text text-danger">
                        @error('new_item_name')
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
                    <input type="text" class="form-control" name="new_item_price[]" id="item_price" aria-describedby="helpId"
                        placeholder="Enter item name">
                    <p class="form-text text-danger">
                        @error('new_item_price')
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
                    <input type="text" class="form-control" name="new_quantity[]" id="quantity" aria-describedby="helpId"
                        placeholder="Item quantity">
                    <p class="form-text text-danger">
                        @error('new_quantity')
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
