@extends('layout.main')
@section('title')
    Item Kits
@endsection
@section('style')
@endsection


@section('content')
<div class="row">
<div class="container">
    <div class="col-12">
        <div class="btn-toolbar d-md-flex justify-content-md-end  ">
            <a href="{{url('itemkits/new')}}" class="fa fa-archive btn btn-info text-white">&nbsp; New Item kit</a>
        </div>
    </div>
</div>
</div>
<div class="row mt-5">
    <div class="col-3">
        <button type="button" class="btn btn-secondary fa fa-trash-alt disabled">&nbsp; Delete</button>
        <button type="button" class="btn btn-secondary fa fa-barcode disabled">&nbsp; Gener-Barcodes</button>
    </div>
   <div class="col-6">

    </div>
   <div class="col-3 d-flexd-md-flex justify-content-md-end">
        <div class="row">

           <div class="col-8">
            <div class="search">
                <input type="text" name="" id="" placeholder="Search">
            </div>
           </div>
           <div class="col-2">
               <div class="col bt1">
                   <div class="btn-group" role="group">
                    <button id="btnGroupDrop1" type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">

                        <i class="fas fa-th"></i>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                        <li><input type="checkbox" name="" id="">&nbsp;Kit Id</li>
                        <li><input type="checkbox" name="" id="">&nbsp;Item Kit Name</li>
                        <li><input type="checkbox" name="" id="">&nbsp;Item Kit Discription</li>
                        <li><input type="checkbox" name="" id="">&nbsp;Cost Price</li>
                        <li><input type="checkbox" name="" id="">&nbsp;Retail Price</li>

                    </ul>
                   </div>
               </div>
           </div>
           <div class="col-2">
               <div class="col bt2">
                   <div class="btn-group" role="group">
                    <button id="btnGroupDrop1" type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-external-link-alt"></i>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                        <li><a class="dropdown-item" href="javascript:void (0)" onclick="$('table').tableExport({type:'json'});">Json</a></li>
                        <li><a class="dropdown-item" href="#">XML</a></li>
                        <li><a class="dropdown-item" href="javascript:void (0)" onclick="$('table').tableExport({type:'csv'});">CSV</a></li>
                        <li><a class="dropdown-item" href="javascript:void (0)" onclick="$('table').tableExport({type:'pdf'});">PDF</a></li>
                        <li><a class="dropdown-item" href="javascript:void (0)" onclick="$('table').tableExport({type:'doc'});">Doc</a></li>
                        <li><a class="dropdown-item" href="javascript:void (0)" onclick="$('table').tableExport({type:'json'});">Json</a> </li>
                        <li><a class="dropdown-item" href="javascript:void (0)" onclick="$('table').tableExport({type:'sql'});">SQL</a></li>
                        <li><a class="dropdown-item" href="javascript:void (0)" onclick="$('table').tableExport({type:'txt'});">TXT</a></li>
                        <li><a class="dropdown-item" href="javascript:void (0)" onclick="$('table').tableExport({type:'xml'});">XML </a></li>
                        <li><a class="dropdown-item" href="javascript:void (0)" onclick="$('table').tableExport({type:'xlsx'});">Xlsx </a></li>
                        <li> <a class="dropdown-item" href="javascript:void (0)" onclick="$('table').tableExport({type:'xls'});">MS Excel </a></li>
                    </ul>
                   </div>
               </div>
           </div>
        </div>
    </div>

</div>
<div class="row mt-5">
    <div class="container">

        <div class="col-12">
            @if (session('success'))
             <div class="alert alert-success">{{(session('success'))}}</div>
            @endif
            <table id="itemkitstable" class="table table-striped table-bordered">
                <thead class="bg-secondary text-white">
                  <tr>
                    <th scope="col"><input type="checkbox" name="" id=""></th>
                    <th scope="col">Kit Id</th>
                    <th scope="col">Item Kit Name</th>
                    <th scope="col">Item Kit Description</th>
                    <th scope="col">Image</th>
                  </tr>
                </thead>
                <tbody>
                @forelse($item_kits as $kit)
                  <tr>
                     <th scope="col"><input type="checkbox" name="" id="{{$kit->id}}"></th>
                    <th scope="row">{{$kit->id}}</th>
                    <td>{{$kit->name}}</td>
                    <td>{{$kit->description}}</td>
                    <td><img width="60px" height="60px" src="{{asset('uploads/item_kits/'.$kit->baseimage)}}" alt=""></td>
                  </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-danger text-center"> No Kit Items Found</td>
                    </tr>
                @endforelse
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script type="text/javascript">

        // CSRF Token
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $(document).ready(function(){
            $( "#item_search" ).autocomplete({
                source: function( request, response ) {
                    // Fetch data
                    $.ajax({
                        url:"{{route('salesItems')}}",
                        type: 'post',
                        dataType: "json",
                        data: {
                            _token: CSRF_TOKEN,
                            search: request.term
                        },
                        success: function( data ) {
                            response( data );
                            console.log(data);
                        }
                    });
                },
                select: function (event, ui) {
                    // save selected id to input
                    $('table#items tbody').append('<tr><td><a class="btn btn-danger" href="#"><i class="fas fa-trash"></i> </a><input type="hidden" name="product_id[]" class="product_id" value="'+ui.item.id+'"></td><td data_id="'+ui.item.id+'">'+ui.item.name+'</td><td id="cost" data-cost="'+ui.item.cost+'">'+ui.item.cost+'<input type="hidden" name="id[]" id="id" class="ids" value="'+ui.item.id+'"></td><td width="10%"><input tabindex="4" name="qty[]" class="qty" style="width: 100%" type="text" id="qty" value="1"></td><td>Dis</td><td class="tot" id="total">'+ui.item.cost * 1+'</td></tr>'); // save selected id to input

                    // Calculate Value Start
                    if (items= document.getElementsByClassName('tot')){
                        console.log(items.length)
                        var total=0;
                        for(let i = 0; i < items.length; i++)
                        {
                            total +=parseFloat(items[i].textContent)
                        }
                        document.querySelector('th#total').textContent=total.toFixed(2)
                        $("input#old").val(total)
                        var discount= document.querySelector('table th.dis').textContent
                        document.querySelector('table th#subtotal').textContent = (total-discount).toFixed(2)
                    }
                    // Calculate Value End
                    return false;
                }
            });

            $("table#items").on('keyup','input#qty',function(){
                $("td#cost").attr('data-cost');
                $("#qty").val();
                var cost=  $(this).parent().parent().children().eq(2).text();
                var qty= $(this).val();
                $(this).val(qty);
                var d= $(this).parent().parent().children().eq(5).text(cost*qty);
                // console.log($(this).parent().parent().parent());
                $('table#employee th#total').text(cost*qty);

                // Calculate Total  Start
                if (items= document.getElementsByClassName('tot')){
                    console.log(items.length)
                    var total=0;
                    for(let i = 0; i < items.length; i++)
                    {
                        total +=parseFloat(items[i].textContent)
                        // console.log(items[i].textContent)
                    }
                    document.querySelector('th#total').textContent=total.toFixed(2)
                    $("input#old").val(total)
                    var discount= document.querySelector('table th.dis').textContent
                    document.querySelector('table th#subtotal').textContent = (total-discount).toFixed(2)
                }
                // Calculate Total  END

            });

            $('table#items').on("click","tr td a",function(){
                $(this).parent().parent().hide();
            });

            // Search Employee
            $( "#search_supplier" ).autocomplete({
                source: function( request, response ) {
                    // Fetch data
                    $.ajax({
                        url:"{{route('receiving.supplier')}}",
                        type: 'post',
                        dataType: "json",
                        data: {
                            _token: CSRF_TOKEN,
                            search: request.term
                        },
                        success: function( data ) {
                            response( data );
                        }
                    });
                },
                select: function (event, ui) {
                    $('#search_employee').val(ui.item.label)
                    $('span#employee').html('<span>'+ui.item.company_name+'</span><input type="hidden" name="supplier_id" id="supplier_id" value="'+ui.item.id+'">'); // save selected id to input
                    return false;
                }
            });
            // Quantity Increase Decrease  Start
            $("input#discount").on('keyup',function (){
                console.log($(this).val())
                if ($(this).val()){
                    var totalprice= document.querySelector('th#total').textContent
                    var   disscount= document.querySelector('table th.dis').textContent = $(this).val()
                    document.querySelector('table th#subtotal').textContent = (totalprice - disscount).toFixed(2)

                }else {
                    document.querySelector('th#total').textContent = $("input#old").val()
                    document.querySelector('table th.dis').textContent = 0
                    document.querySelector('table th#subtotal').textContent=$("input#old").val()
                }

            });
            // Quantity Increase Decrease  End


            // Submit
            $('button#submit').click(function (){
                var receiving_mode= $("select#receiving_mode").val();
                var payment_type= $("select#payment_type").val();
                var employee= $("select#employee").val();
                var supplier_id= $('input#supplier_id').val();
                // var payment_status= $("select#payment_status").val();
                var ids= document.getElementsByClassName('ids')
                var input = document.getElementsByName('product_id[]');
                var ids=[];
                for (var i = 0; i < input.length; i++) {
                    var a = input[i];
                    // qty = qty + a.value;
                    ids.push(a.value)
                }
                var quantity = document.getElementsByName('qty[]');
                var qty = [];
                for (var i = 0; i < quantity.length; i++) {
                    var a = quantity[i];
                    // qty = qty + a.value;
                    qty.push(a.value)
                }

                var discount =document.querySelector('table th.dis').textContent;
                var total =document.querySelector('table th#total').textContent;
                var subtotal =document.querySelector('table th#subtotal').textContent;
                var comment= $('textarea#comment').val();

                // console.log(receiving_mode);
                // console.log(payment_type);
                // console.log(employee);
                // console.log(supplier_id);
                // console.log(ids);
                // console.log(qty);
                // console.log(total);
                // console.log(discount);
                // console.log(subtotal);
                // console.log(comment);
                // Validation
                if (comment.length <1){
                    $('span#comment_error').html(`Comment Field must be required and atlas 5 character required`);
                }
                if (!supplier_id){
                    $("span#supplier_error").html("Select a Customer");
                }
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url:"{{route('receiving.store')}}",
                    type: 'post',
                    data: {
                        receiving_mode: receiving_mode,
                        payment_type:payment_type,
                        ids:ids,
                        qty:qty,
                        discount:discount,
                        total:total,
                        subtotal:subtotal,
                        supplier_id :supplier_id,
                        employee :employee,
                        comment:comment,
                    },
                    success: function( response ) {
                        console.log(response);
                        // location.reload();
                    }
                });

            });


        });
    </script>
@endsection
