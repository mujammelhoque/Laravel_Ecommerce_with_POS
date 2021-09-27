@extends('layout.main')
@section('title')
   New Employee
@endsection
@section('style')
@endsection


@section('content')

    <div class="card m-auto" style="width: 50%">
        <div class="card-header text-center bg-success text-white"> Add New Employees</div>
        <div class="card-body">
            {!! Form::open(['url' => 'employees/store','method'=>'POST','files'=>true]) !!}
            @include('employees.form')
            <div class="text-center mt-3">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            {!! Form::close() !!}

        </div>
    </div>


@endsection
@section('script')
    <script>
        $(document).ready(function (){
            $('#items').on('change',function (){
                if ($(this).is(':checked')){
                    $('#stock').attr('disabled',false);
                }else {
                    $('#stock').attr('disabled',true);
                }
            });
            $('#report').on('change',function (){
                if ($(this).is(':checked')){
                    $('#cat').attr('disabled',false);
                    $('#cus').attr('disabled',false);
                    $('#dis').attr('disabled',false);
                    $('#emp').attr('disabled',false);
                    $('#inv').attr('disabled',false);
                    $('#itm').attr('disabled',false);
                    $('#pay').attr('disabled',false);
                    $('#rec').attr('disabled',false);
                    $('#sale').attr('disabled',false);
                    $('#supp').attr('disabled',false);
                    $('#tax').attr('disabled',false);
                }else {
                    $('#cat').attr('disabled',true);
                    $('#cus').attr('disabled',true);
                    $('#dis').attr('disabled',true);
                    $('#emp').attr('disabled',true);
                    $('#inv').attr('disabled',true);
                    $('#itm').attr('disabled',true);
                    $('#pay').attr('disabled',true);
                    $('#rec').attr('disabled',true);
                    $('#sale').attr('disabled',true);
                    $('#supp').attr('disabled',true);
                    $('#tax').attr('disabled',true);
                }
            });
            $('#rece').on('change',function (){
                if ($(this).is(':checked')){
                    $('#recStock').attr('disabled',false);
                }else {
                    $('#recStock').attr('disabled',true);
                }
            });
            $('#sal').on('change',function (){
                if ($(this).is(':checked')){
                    $('#saleStock').attr('disabled',false);
                }else {
                    $('#saleStock').attr('disabled',true);
                }
            });
        });
    </script>
@endsection
