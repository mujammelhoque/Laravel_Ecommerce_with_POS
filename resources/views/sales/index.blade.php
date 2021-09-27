@extends('layout.main')
@section('title')
    Sales
@endsection
@section('style')
@endsection


@section('content')

    <div class="row">
        <div class="col-md-8 ">
            <div class="card" style="background-color: #ddc">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <label for=""> <b>Register Mode</b> </label> <br>
                            <select name="register_mode" class="form-control" id="register_mode" tabindex="1">
                                <option value="sale" selected>Sale</option>
                                <option value="return">Return</option>
                            </select>
                        </div>
                        <div class="col-md-3 ">
                            <label for=""> <b>Payment Type</b> </label>
                            <select name="payment_type" id="payment_type" class="form-control" tabindex="2">
                                <option value="cash" selected>Cash</option>
                                <option value="bkash">Bkash</option>
                                <option value="nagad">Nagad</option>
                                <option value="ucash">Ucash</option>
                                <option value="rocket">Rocket</option>
                            </select>
                        </div>
                        <div class="col-md-5 text-end ">
                            <a class="btn btn-dark text-white" href="{{ url('sales/manage') }}"><i
                                    class="far fa-list-alt"></i> &nbsp; Invoice</a>

                        </div>
                    </div>

                </div>
            </div>
            <div class="card my-1" style="background-color: #dde">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Find/Scan Item</label>
                        </div>
                        <div class="col-md-4"> <input tabindex="3" type="text" class="form-control" id="item_search"
                                name="item" placeholder="Start Typing item's name or scan barcode..."></div>
                        {{-- <div class="col-md-4 text-end">
                            <a href="{{ url('sales/newitem') }}" class="btn btn-info"> <i class="fas fa-tag"></i>
                                New
                                Items</a>
                        </div> --}}
                    </div>

                </div>
            </div>
            <table id="items" class="table table-striped">
                <thead class="bg-secondary text-white">
                    <tr>
                        <th>Delete</th>
                        <th>Item Name</th>
                        <th>Cost</th>
                        <th>Qty.</th>
                        <th>Dis %</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
            <div class="comment-submit">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="comment">Comment</label>
                        <textarea name="comment" id="comment" class="form-control" cols="30" rows="5"
                            tabindex="8"></textarea>
                        <span id="comment_error" class="text-danger"></span>
                    </div>
                    <div class="col-md-12 text-center">
                        <button type="button" class="btn btn-secondary" id="submit" tabindex="9">Submit</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-supplier">
                <div class="card-header text-center fw-bold"> Select Customer (Optional)</div>
                <div class="card-body">
                    <div class="form-group" is="select-customar">
                        <input type="text" id="search_employee" class="form-control"
                            placeholder="Start Typing Customer's name.." tabindex="5" autocomplete="off">
                        <span class="text-danger" id="employee_error"></span>
                        <div>Customer: <span id="employee"></span></div>
                    </div>
                    <div class="form-group" is="select-employee">
                        <label for="employee">Employee Name</label>
                        <select name="employee" id="employee" class="form-control" tabindex="7">
                            @foreach ($employee as $em)
                                <option value="{{ $em->id }}">{{ $em->first_name . ' ' . $em->last_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <hr>
                    <table id="employee" class="table table-striped">
                        <tr>
                            <th>Disscount</th>
                            <th><input tabindex="6" type="text" id="discount"> <input type="hidden" id="old" value="0"></th>
                        </tr>
                        <tr>
                            <th>Total</th>
                            <th id="total" style="text-align: right">0.00</th>
                        </tr>
                        <tr>
                            <th>Dis %</th>
                            <th class="dis" style="text-align: right">-0</th>
                        </tr>
                        <tr>
                            <th>subtotal</th>
                            <th id="subtotal" style="text-align: right">0</th>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <label for=""> <b>Payment Status</b> </label>
                                <select name="payment_status" id="payment_status" class="form-control" tabindex="7">
                                    <option value="complete" selected>complete</option>
                                    <option value="incomplete">Incomplete</option>
                                    <option value="partial">Partial</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                    {{-- <div class="new-supplier text-center">
                        <a class="btn btn-info" href="{{ url('sales/new_customer') }}"><i class="fas fa-user-tie"></i>
                            New
                            Customer</a>
                    </div> --}}
                </div>
            </div>
        </div>

    </div>
@endsection
@section('script')
    <!-- Script -->
    <script type="text/javascript">
        // CSRF Token
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $(document).ready(function() {
            $("#item_search").autocomplete({
                source: function(request, response) {
                    // Fetch data
                    $.ajax({
                        url: "{{ route('salesItems') }}",
                        type: 'post',
                        dataType: "json",
                        data: {
                            _token: CSRF_TOKEN,
                            search: request.term
                        },
                        success: function(data) {
                            response(data);
                            console.log(data);
                        }
                    });
                },
                select: function(event, ui) {
                    // save selected id to input
                    $('table#items tbody').append(
                        '<tr><td><a class="btn btn-danger" href="#"><i class="fas fa-trash"></i> </a><input type="hidden" name="product_id[]" class="product_id" value="' +
                        ui.item.id + '"></td><td data_id="' + ui.item.id + '">' + ui.item.name +
                        '</td><td id="cost" data-cost="' + ui.item.cost + '">' + ui.item.cost +
                        '<input type="hidden" name="id[]" id="id" class="ids" value="' + ui.item
                        .id +
                        '"></td><td width="10%"><input tabindex="4" name="qty[]" class="qty" style="width: 100%" type="text" id="qty" value="1"></td><td>Dis</td><td class="tot" id="total">' +
                        ui.item.cost * 1 + '</td></tr>'); // save selected id to input

                    // Calculate Value Start
                    if (items = document.getElementsByClassName('tot')) {
                        console.log(items.length)
                        var total = 0;
                        for (let i = 0; i < items.length; i++) {
                            total += parseFloat(items[i].textContent)
                        }
                        document.querySelector('th#total').textContent = total.toFixed(2)
                        $("input#old").val(total)
                        var discount = document.querySelector('table th.dis').textContent
                        document.querySelector('table th#subtotal').textContent = (total - discount)
                            .toFixed(2)
                    }
                    // Calculate Value End
                    return false;
                }
            });

            $("table#items").on('keyup', 'input#qty', function() {
                $("td#cost").attr('data-cost');
                $("#qty").val();
                var cost = $(this).parent().parent().children().eq(2).text();
                var qty = $(this).val();
                $(this).val(qty);
                var d = $(this).parent().parent().children().eq(5).text(cost * qty);
                // console.log($(this).parent().parent().parent());
                $('table#employee th#total').text(cost * qty);

                // Calculate Total  Start
                if (items = document.getElementsByClassName('tot')) {
                    console.log(items.length)
                    var total = 0;
                    for (let i = 0; i < items.length; i++) {
                        total += parseFloat(items[i].textContent)
                        // console.log(items[i].textContent)
                    }
                    document.querySelector('th#total').textContent = total.toFixed(2)
                    $("input#old").val(total)
                    var discount = document.querySelector('table th.dis').textContent
                    document.querySelector('table th#subtotal').textContent = (total - discount).toFixed(2)
                }
                // Calculate Total  END

            });

            $('table#items').on("click", "tr td a", function() {
                $(this).parent().parent().hide();
            });

            // Search Employee
            $("#search_employee").autocomplete({
                source: function(request, response) {
                    // Fetch data
                    $.ajax({
                        url: "{{ route('sales_employee') }}",
                        type: 'post',
                        dataType: "json",
                        data: {
                            _token: CSRF_TOKEN,
                            search: request.term
                        },
                        success: function(data) {
                            response(data);
                        }
                    });
                },
                select: function(event, ui) {
                    $('#search_employee').val(ui.item.label)
                    $('span#employee').html('<span>' + ui.item.name +
                        '</span><input type="hidden" name="employee_id" id="employee_id" value="' +
                        ui.item.id + '">'); // save selected id to input
                    return false;
                }
            });
            // Quantity Increase Decrease  Start
            $("input#discount").on('keyup', function() {
                console.log($(this).val())
                if ($(this).val()) {
                    var totalprice = document.querySelector('th#total').textContent
                    var disscount = document.querySelector('table th.dis').textContent = $(this).val()
                    document.querySelector('table th#subtotal').textContent = (totalprice - disscount)
                        .toFixed(2)

                } else {
                    document.querySelector('th#total').textContent = $("input#old").val()
                    document.querySelector('table th.dis').textContent = 0
                    document.querySelector('table th#subtotal').textContent = $("input#old").val()
                }

            });
            // Quantity Increase Decrease  End


            // Submit
            $('button#submit').click(function() {
                var register_type = $("select#register_mode").val();
                var employee = $("select#employee").val();
                var payment_type = $("select#payment_type").val();
                var payment_status = $("select#payment_status").val();
                var ids = document.getElementsByClassName('ids')
                // console.log(register_type + payment_type)
                var input = document.getElementsByName('product_id[]');
                var ids = [];
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

                var discount = document.querySelector('table th.dis').textContent;
                var total = document.querySelector('table th#total').textContent;
                var subtotal = document.querySelector('table th#subtotal').textContent;
                var customer_id = $('input#employee_id').val();
                var comment = $('textarea#comment').val();

                // Validation
                if (comment.length < 1) {
                    $('span#comment_error').html(
                        `Comment Field must be required and atlas 5 character required`);
                }
                if (!employee_id) {
                    $("span#employee_error").html("Select a Customer");
                }
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{ url('sales/store') }}",
                    type: 'post',
                    data: {
                        register_type: register_type,
                        payment_status: payment_status,
                        payment_type: payment_type,
                        ids: ids,
                        qty: qty,
                        discount: discount,
                        total: total,
                        subtotal: subtotal,
                        customer_id: customer_id,
                        employee: employee,
                        comment: comment,
                    },
                    success: function(response) {
                        // console.log(response);
                        if (response == 'Done') {
                            toastr.success('Salse approved')
                        } else {
                            toastr.danger('Salse Not approved')
                        }
                        setInterval(() => {
                            location.reload();
                        }, 800);

                    }
                });

            });

        });
    </script>
@endsection
