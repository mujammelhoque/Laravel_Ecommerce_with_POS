@extends('layout.main')
@section('title')
    Add Items
@endsection
@section('style')
@endsection


@section('content')
    <div class="card m-auto" style="width: 50%">
        <div class="card-header text-center bg-success text-white"> Add New Items</div>
        <div class="card-body">
            <form action="">
                @csrf
                <div class="uei">
                    <div class="row">
                        <div class="col-md-3 p-1">
                            UPC/EAN/ISBN
                        </div>
                        <div class="col-md-9">
                            <div class=" input-group">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-barcode"></i></span>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item mt-2">
                    <div class="row">
                        <div class="col-md-3 p-1 ">
                            Item Name
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="item" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="cat mt-2">
                    <div class="row">
                        <div class="col-md-3 p-1">
                            Category
                        </div>
                        <div class="col-md-9">
                            <div class=" input-group">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-tag"></i></span>
                                <input type="text" name="category" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="supp mt-2">
                    <div class="row">
                        <div class="col-md-3 p-1 ">
                            Supplier
                        </div>
                        <div class="col-md-9">
                            <select name="supplier" id="" class="form-control">
                                <option value="">None</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="cprice mt-2">
                    <div class="row">
                        <div class="col-md-3 p-1">
                            Cost Price
                        </div>
                        <div class="col-md-9">
                            <div class=" input-group">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-dollar-sign"></i></span>
                                <input type="text" name="cprice" placeholder="0.00" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="rprice mt-2">
                    <div class="row">
                        <div class="col-md-3 p-1">
                            Retail Price
                        </div>
                        <div class="col-md-9">
                            <div class=" input-group">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-dollar-sign"></i></span>
                                <input type="text" name="rprice" placeholder="0.00" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tax1 mt-2">
                    <div class="row">
                        <div class="col-md-3 p-1 ">
                            Tax 1
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-6"><input type="text" name="tax" class="form-control"></div>
                                <div class="col-md-6">
                                    <div class=" input-group">
                                        <input type="text" name="taxpercent" class="form-control">
                                        <span class="input-group-text" id="basic-addon1">%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tax2 mt-2">
                    <div class="row">
                        <div class="col-md-3 p-1 ">
                            Tax 2
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-6"><input type="text" name="tax2" class="form-control"></div>
                                <div class="col-md-6">
                                    <div class=" input-group">
                                        <input type="text" name="taxpercent2" class="form-control">
                                        <span class="input-group-text" id="basic-addon1">%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="quantity mt-2">
                    <div class="row">
                        <div class="col-md-3 p-1 ">
                            Quantity Stock
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="qyts" placeholder="0" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="receving mt-2">
                    <div class="row">
                        <div class="col-md-3 p-1 ">
                            Receiving Quantity
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="rqty" placeholder="0" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="render mt-2">
                    <div class="row">
                        <div class="col-md-3 p-1 ">
                            Render Level
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="rlevel" placeholder="0" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="description mt-2">
                    <div class="row">
                        <div class="col-md-3 p-1 ">
                            Description
                        </div>
                        <div class="col-md-9">
                            <textarea name="description" id="" cols="6" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class="avatar mt-2">
                    <div class="row">
                        <div class="col-md-3 p-1 ">
                            Avatar
                        </div>
                        <div class="col-md-9">
                            <input type="file" name="avatar" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="allowalt mt-2">
                    <div class="row">
                        <div class="col-md-3 p-1 ">
                            Allow Alt Description
                        </div>
                        <div class="col-md-9">
                            <input type="checkbox" class="form-control-checkbox">
                        </div>
                    </div>
                </div>
                <div class="item serial mt-2">
                    <div class="row">
                        <div class="col-md-3 p-1 ">
                            Item has Serial Number
                        </div>
                        <div class="col-md-9">
                            <input type="checkbox" class="form-control-checkbox">
                        </div>
                    </div>
                </div>
                <div class="delete mt-2">
                    <div class="row">
                        <div class="col-md-3 p-1 ">
                            Delete
                        </div>
                        <div class="col-md-9">
                            <input type="checkbox" class="form-control-checkbox">
                        </div>
                    </div>
                </div>
                <div class="button mt-2">
                    <div class="row">
                        <div class="col-md-3 p-1 ">

                        </div>
                        <div class="col-md-9 text-end">
                            <input type="submit" name="submit" class="btn btn-dark">
                            <input type="submit" name="new" value="New" class="btn btn-secondary">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
@section('script')
@endsection
