@extends('layout.main')
@section('title')
    Item Kits
@endsection
@section('style')
@endsection


@section('content')

    <div class="card m-auto" style="width: 50%">
        <div class="card-header text-center bg-info text-white"> New Items Kits</div>
        <div class="card-body">
            <form action="{{url('itemkits/store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="itemkits">
                    <div class="row">
                        <div class="col-md-3 p-1">
                          Item Kits Name
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="name" class="form-control" value="{{old('name')}}">
                            @error('name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="des mt-2">
                    <div class="row">
                        <div class="col-md-3 p-1 ">
                           Item Kit Description
                        </div>
                        <div class="col-md-9">
                            <textarea class="form-control" placeholder=" Description here" id="floatingTextarea" name="description"></textarea>
                            @error('description')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="des mt-2">
                    <div class="row">
                        <div class="col-md-3 p-1 ">
                          Base Image
                        </div>
                        <div class="col-md-9">
                            <input type="file" name="baseimage" class="form-control">
                            @error('baseimage')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="fname mt-2">
                    <div class="row">
                        <div class="col-md-3 p-1 ">
                           Add Item
                        </div>
                        <div class="col-md-9">
                            <input type="text" id="item_search" name="item" class="form-control">
                        </div>
                    </div>
                </div>
                 <div class="delete mt-2 ">
                    <div class="row  text-white">
                        <table id="items" class="table table-bordered">
                            <thead class="bg-secondary text-white">
                            <th>Delete</th>
                            <th>Item</th>
                            <th>Quantity</th>
                            </thead>
                            <tbody>


                            </tbody>
                        </table>
                    </div>
                </div>
                 <div class="button mt-2">
                    <div class="row">
                        <div class="col-md-3 p-1 ">

                        </div>
                        <div class="col-md-9 text-end">
                            <input type="submit" name="submit" class="btn btn-dark">
                        </div>
                    </div>
                </div>
            </form>
        </div>
      </div>







@endsection
@section('script')
    <script>
        $(document).ready(function () {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $(document).ready(function () {
                $("#item_search").autocomplete({
                    source: function (request, response) {
                        // Fetch data
                        $.ajax({
                            url: "{{route('salesItems')}}",
                            type: 'post',
                            dataType: "json",
                            data: {
                                _token: CSRF_TOKEN,
                                search: request.term
                            },
                            success: function (data) {
                                response(data);
                                console.log(data);
                            }
                        });
                    },
                    select: function (event, ui) {
                        // save selected id to input
                        $('table#items tbody').append('<tr><td><a href="#"><i class="fas fa-times-circle"></i> </a></td> <td><input type="hidden" name="ids[]" value="'+ui.item.id+'">'+ui.item.name+'</td><td><input type="number" name="qty[]" id="qty" value="1"></td></tr>'); // save selected id to input

                        return false;
                    }
                });
                $('table#items').on("click","tr td a",function(){
                    $(this).parent().parent().hide();
                });
            });
        });
    </script>
@endsection


