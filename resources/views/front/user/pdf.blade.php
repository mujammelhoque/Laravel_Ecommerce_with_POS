<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>MyStore!</title>

    <style type="text/css">
        * {
            font-family: Verdana, Arial, sans-serif;
            font-size: 20px;
        }

        table {
            font-size: x-small;
        }

        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }

        .gray {
            background-color: lightgray
        }

    </style>

</head>

<body>

    <table width="100%">
        <tr>
            <td width="25%" valign="top"><img alt=""
                    src="data:image/png;base64,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" />
            </td>
            <td width="50%" align="center" style="font-size: 50px;">Invoice</td>
            <td align="right">
                <strong>Ecompos Store</strong> <br>
                Address: 218/4 (5th floor), Begum Rokeya Sharani, West Kafrul, Dhaka 1207
            </td>
        </tr>

    </table>

    <table>
        <tr>
            <td width="70%">
                <h3>Shipping Details</h3>
                <strong>Name:</strong> {{ $shiping_details->full_name }} .<strong>Company Name:</strong>
                {{ $shiping_details->company_name }} .<strong>Email:</strong> {{ $shiping_details->email }} .
                <strong>Phone:</strong> {{ $shiping_details->phone }}. <strong>Address:</strong>
                {{ $shiping_details->address }} , {{ $shiping_details->city }} , {{ $shiping_details->state }} ,
                {{ $shiping_details->country }}
            </td>
            <td>
                <strong>Invoice Id: </strong> <br>
                <span style="background-color:#FFFF00">{{ $sales->invoice_id }}</span>
            </td>
        </tr>
    </table>

    <br />

    <table width="100%">
        <thead style="background-color: lightgray; font-size: 30px">
            <tr>
                <th>#</th>
                <th>Item</th>
                <th>Quantity</th>
                <th>Unit Price $</th>
                <th>Total $</th>
            </tr>
        </thead>
        <tbody style="font-size: 18px">
            @php
                $sl = 1;
            @endphp
            @foreach ($sales_items as $order)


                <tr>
                    <th scope="row">{{ $sl++ }}</th>
                    <td>{{ $order->item->name }}</td>
                    <td align="right">{{ $order->quantity }}</td>
                    <td align="right">{{ $order->unit_price }}</td>
                    <td align="right">{{ $order->quantity * $order->unit_price }}</td>
                </tr>
            @endforeach
        </tbody>

        <tfoot style="border-top: 2px solid">
            <tr>
                <td colspan="3"></td>
                <td style="font-size: 20px" align="right">Total :</td>
                <td style="font-size: 15px" align="right">{{ $sales->total }}</td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td style="font-size: 20px" align="right">Discount :</td>
                <td style="font-size: 15px" align="right">{{ $sales->discount }}</td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td style="font-size: 20px" align="right">Subtotal:</td>
                <td style="font-size: 15px" align="right" class="gray">{{ $sales->finaltotal }}</td>
            </tr>
        </tfoot>
    </table>

</body>

</html>
