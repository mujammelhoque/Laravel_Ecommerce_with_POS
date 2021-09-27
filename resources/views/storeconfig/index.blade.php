@extends('layout.main')
@section('title')
    Store Config
@endsection
@section('style')
@endsection


@section('content')
    <nav>
        <div class="nav nav-tabs " id="nav-tab config-nav-tab" role="tablist">
            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#Information"
                type="button" role="tab" aria-controls="nav-home" aria-selected="true">Information</button>
            <button class="nav-link " id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#general" type="button"
                role="tab" aria-controls="nav-profile" aria-selected="false">General</button>
            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#Localisation"
                type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Localisation</button>
            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#Barcode" type="button"
                role="tab" aria-controls="nav-barcode" aria-selected="false">Barcode </button>
            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#Stock" type="button"
                role="tab" aria-controls="nav-Stock" aria-selected="false">Stock </button>
            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#Receipt" type="button"
                role="tab" aria-controls="nav-Receipt" aria-selected="false">Receipt </button>
            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#Invoice" type="button"
                role="tab" aria-controls="nav-Invoice" aria-selected="false">Invoice </button>
            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#Email" type="button"
                role="tab" aria-controls="nav-Email" aria-selected="false">Email </button>
            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#Message" type="button"
                role="tab" aria-controls="nav-Message" aria-selected="false">Message </button>
        </div>
    </nav>

    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="Information" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="w-75">
                {{-- alert .Start --}}
                @if (session('success'))
                    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                        </symbol>

                    </svg>

                    <div class="alert alert-success d-flex align-items-center alert-dismissible" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                            <use xlink:href="#check-circle-fill" />
                        </svg>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <div>
                            {{ session('success') }}
                        </div>
                    </div>
                @endif
                @if (session('fail'))
                    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">


                        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                        </symbol>
                    </svg>

                    <div class="alert alert-danger alert-dismissible d-flex align-items-center" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                            <use xlink:href="#exclamation-triangle-fill" />
                        </svg>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <div>
                            {{ session('fail') }}
                        </div>
                    </div>
                    {{-- alert .End --}}
                @endif
                {{-- <form action="{{route('storedone.storeconf')}}" method="post" enctype="multipart/form-data"> --}}
                {!! Form::model($storedata, ['route' => 'storedone.storeconf', 'files' => true]) !!}
                {{-- @csrf --}}
                <div class="requerd mt-3">
                    <div class="row">
                        <div class="col-md-8 text-end fst-italic">Fields in red are required</div>
                        <div class="col-md-4 "></div>
                        <div class=" col-md-12 error_msg my-2"></div>
                    </div>
                </div>

                <div class="company mt-2 mb-2">
                    <div class="row">
                        <div class="col-md-2 p-1 fw-bold text-danger">
                            Company Name
                        </div>
                        <div class="col-md-10">
                            <div class=" input-group">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-home"></i></span>
                                {!! Form::text('company', null, ['class' => 'form-control']) !!}
                                {{-- <input type="text" name="company" {{ old('company') }} class="form-control"> --}}
                            </div>
                            @error('company')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="companylogo mb-2">
                    <div class="row">
                        <div class="col-md-2 p-1 ">
                            Company Logo
                        </div>
                        <div class="col-md-10">
                            {{-- <div class="fileinput-new thumbnail" style="width: 200px; height: 200px; background-color: gray"></div> --}}
                            @if ($storedata['companylogo'])
                                @isset($storedata['companylogo'])
                                    <div class="border-2">
                                        <img width="80px" src="{{ asset('uploads/logo/' . $storedata['companylogo']) }}"
                                            alt="" srcset="">
                                    </div>
                                @endisset

                            @endif

                            {{-- <input type="file" {{ old('companylogo') }} name="companylogo"> --}}
                            {!! Form::file('companylogo', ['class' => 'form-control']) !!}
                            <div>
                                @error('companylogo')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                    </div>
                </div>
                <div class="companyadd mb-2">
                    <div class="row">
                        <div class="col-md-2 p-1 fw-bold text-danger">
                            Company Address
                        </div>
                        <div class="col-md-10">
                            {!! Form::textarea('companyadd', null, ['class' => 'form-control', 'cols' => '8', 'rows' => '5']) !!}
                            {{-- <textarea name="companyadd" {{ old('companyadd') }} id="" cols="8" rows="5"
                                class="form-control">123 Nowhere street</textarea> --}}
                        </div>
                    </div>
                </div>
                <div class="web mt-2 mb-2">
                    <div class="row">
                        <div class="col-md-2 p-1 ">
                            Website
                        </div>
                        <div class="col-md-10">
                            <div class=" input-group">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-globe-europe"></i></span>
                                {!! Form::text('web', null, ['class' => 'form-control']) !!}
                                {{-- <input type="text" {{ old('web') }} name="web" class="form-control"> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="email mt-2 mb-2">
                    <div class="row">
                        <div class="col-md-2 p-1 ">
                            Email
                        </div>
                        <div class="col-md-10">
                            <div class=" input-group">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-envelope"></i></span>
                                {{-- <input type="text" {{ old('email') }} name="email" class="form-control"> --}}
                                {!! Form::text('email', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tele mt-2 mb-2">
                    <div class="row">
                        <div class="col-md-2 p-1 text-danger fw-bold">
                            Company Phone
                        </div>
                        <div class="col-md-10">
                            <div class=" input-group">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-tty"></i></span>
                                {{-- <input type="text" {{ old('phone') }} name="phone" class="form-control"> --}}
                                {!! Form::text('phone', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="fax mt-2 mb-2">
                    <div class="row">
                        <div class="col-md-2 p-1">
                            Fax
                        </div>
                        <div class="col-md-10">
                            <div class=" input-group">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-tty"></i></span>
                                {{-- <input type="text" {{ old('fax') }} name="fax" class="form-control"> --}}
                                {!! Form::text('fax', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="return mb-2">
                    <div class="row">
                        <div class="col-md-2 p-1 fw-bold text-danger">
                            Return Policy
                        </div>
                        <div class="col-md-10">
                            {!! Form::textarea('policy', null, ['class' => 'form-control', 'cols' => '8', 'rows' => '7']) !!}
                            {{-- <textarea name="" {{ old('companyadd') }} id="" cols="8" rows="7"
                                class="form-control">Test Policy</textarea> --}}
                        </div>
                    </div>
                </div>
                <div class="button mb-2">
                    <div class="row">
                        <div class="col-md-6">

                        </div>
                        <div class="col-md-6 text-end">
                            <input type="submit" value="Submit" class="btn btn-dark">
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
        <div class="tab-pane fade" id="general" role="tabpanel" aria-labelledby="nav-profile-tab">
            <div class="w-50">
                <div class="requerd mt-3">
                    <div class="row">
                        <div class="col-md-8 text-end fst-italic">Fields in red are required</div>
                        <div class="col-md-4 "></div>
                        <div class=" col-md-12 error_msg my-2"></div>
                    </div>
                </div>
                {{-- <form action="{{ route('storedone.storeconf') }}" method="post" enctype="multipart/form-data">
                    @csrf --}}
                {!! Form::model($storedata, ['route' => 'storedone.storeconf', 'files' => true]) !!}
                <div class="Theme mb-2 my-2">
                    <div class="row">
                        <div class="col-md-3 p-1 text-end">
                            Theme
                        </div>
                        <div class="col-md-9">
                            @php
                                $list = [
                                    'cerulean' => 'cerulean',
                                    'cosmo' => 'cosmo',
                                    'darkly' => 'darkly',
                                    'journal' => 'journal',
                                    'yeti' => 'yeti',
                                    'superhero' => 'superhero',
                                    'round45' => 'round45',
                                    'isdb' => 'isdb',
                                ];
                            @endphp
                            {!! Form::select('theme', $list, null, ['class' => 'form-control']) !!}


                        </div>
                    </div>
                </div>

                <div class="tax1 mb-2 mb-2">
                    <div class="row">
                        <div class="col-md-3 p-1 fw-bold text-danger text-end">
                            Tax Rate
                        </div>
                        <div class="col-md-9">
                            <div class=" input-group">
                                {{-- <input type="text" {{ old('tax1') }} name="tax1" class="form-control"> --}}
                                {!! Form::text('tax1', null, ['class' => 'form-control']) !!}
                                <span class="input-group-text" id="basic-addon1">%</span>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="text mt-2 mb-2">
                    <div class="row">
                        <div class="col-md-3  text-end">
                            Text Include
                        </div>
                        <div class="col-md-9">

                            {!! Form::checkbox('include_tax', '1', null, ['class' => 'form-control-checkbox']) !!}
                            {{-- <input type="checkbox" class="form-control-checkbox"> --}}
                        </div>
                    </div>
                </div>
                <div class="disc mb-2 mb-2">
                    <div class="row">
                        <div class="col-md-3 fw-bold text-danger text-end">
                            Default Sales Discount %
                        </div>
                        <div class="col-md-9">
                            <div class=" input-group">
                                {{-- <input type="number" name="cprice" placeholder="0.00" class="form-control"> --}}
                                {!! Form::text('cprice', null, ['class' => 'form-control']) !!}
                                <span class="input-group-text" id="basic-addon1">%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="calc mb-2 mb-2">
                    <div class="row">
                        <div class="col-md-3  text-end">
                            Calc avg. Price (Receiving)
                        </div>
                        <div class="col-md-9">
                            {!! Form::checkbox('calc_avg_price', '1', null, ['class' => 'form-control-checkbox']) !!}
                            {{-- <input type="checkbox" class="form-control-checkbox"> --}}
                        </div>
                    </div>
                </div>
                <div class="lea mb-2 mb-2">
                    <div class="row">
                        <div class="col-md-3 fw-bold text-danger  text-end">
                            Lines Per Page
                        </div>
                        <div class="col-md-9">
                            {!! Form::text('line_per_page', null, ['class' => 'form-control', 'placeholder' => '25']) !!}
                            {{-- <input type="number" value="25" class="form-control" name="" id=""> --}}
                        </div>
                    </div>
                </div>
                <div class="not mt-2">
                    <div class="row">
                        <div class="col-md-3 p-1  text-end">
                            Notification Popup Position
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-6">
                                    {!! Form::select('theme', ['top' => 'Top', 'bottom' => 'Bottom'], null, ['class' => 'form-control']) !!}
                                    {{-- <select name="area1" id="" class="form-control">
                                        <option value="top">Top</option>
                                        <option value="bottom">Bottom</option>
                                    </select> --}}
                                </div>
                                <div class="col-md-6">
                                    {!! Form::select('theme', ['left' => 'Left', 'center' => 'Canter', 'right' => 'Right'], null, ['class' => 'form-control']) !!}
                                    {{-- <select name="area2" id="" class="form-control">
                                        <option value="left">Left</option>
                                        <option value="center">Center</option>
                                        <option value="right">Right</option>
                                    </select> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="calc mb-2 mb-2">
                    <div class="row">
                        <div class="col-md-3  text-end">
                            Send statistics
                        </div>
                        <div class="col-md-9">
                            {{-- <input type="checkbox" class="form-control-checkbox"> --}}
                            {!! Form::checkbox('send_statistc', '1', null, ['class' => 'form-control-checkbox']) !!}
                            <i data-bs-toggle="tooltip" data-bs-placement="top" title="Send Statistic For Development"
                                class="fas fa-question"></i>
                        </div>
                    </div>
                </div>
                <div class="customfield mb-2 mb-2">
                    <div class="row">
                        <div class="col-md-3 pt-1 text-end">
                            Custom Field 1
                        </div>
                        <div class="col-md-9">
                            {!! Form::text('c1', null, ['class' => 'form-control']) !!}
                            {{-- <input type="text" name="c1" class="form-control"> --}}
                        </div>
                    </div>
                </div>
                <div class="customfield2 mb-2 mb-2">
                    <div class="row">
                        <div class="col-md-3 pt-1 text-end">
                            Custom Field 2
                        </div>
                        <div class="col-md-9">
                            {!! Form::text('c2', null, ['class' => 'form-control']) !!}
                            {{-- <input type="text" name="c12" class="form-control"> --}}
                        </div>
                    </div>
                </div>

                <div class="button mb-2">
                    <div class="row">
                        <div class="col-md-6">

                        </div>
                        <div class="col-md-6 text-end">
                            <input type="submit" value="Submit" class="btn btn-dark">
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
        <div class="tab-pane fade" id="Localisation" role="tabpanel" aria-labelledby="nav-contact-tab">
            <div class="w-50">
                <div class="requerd mt-3">
                    <div class="row">
                        <div class="col-md-8 text-end fst-italic">Fields in red are required</div>
                        <div class="col-md-4 "></div>
                        <div class=" col-md-12 error_msg my-2"></div>
                    </div>
                </div>
                {{-- <form action="{{ route('storedone.storeconf') }}" method="post" enctype="multipart/form-data">
                    @csrf --}}
                {!! Form::model($storedata, ['route' => 'storedone.storeconf', 'files' => true]) !!}

                <div class="Localisation mt-2">
                    <div class="row">
                        <div class="col-md-3 p-1  text-end">
                            Localisation
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-6">
                                    {!! Form::select('language', ['en_us' => 'en_US', 'bn' => 'BN'], null, ['class' => 'form-control']) !!}
                                    {{-- <input type="text" name="en" value="en_US" class="form-control"> --}}
                                </div>
                                {{-- <div class="col-md-6">
                                        <i data-bs-toggle="tooltip" data-bs-placement="top" title="Find A location" class="fas fa-question-circle text-danger"></i> &nbsp; $1,234,567,890.12
                                    </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text mt-2 mb-2">
                    <div class="row">
                        <div class="col-md-3 pt-1 text-end">
                            Thousands Separator
                        </div>
                        <div class="col-md-9">
                            {!! Form::checkbox('thousands_separator', '1', null, ['class' => 'form-control-checkbox']) !!}
                        </div>
                    </div>
                </div>
                <div class="symble mt-2">
                    <div class="row">
                        <div class="col-md-3 p-1  text-end">
                            Currency Symbol
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-6">
                                    {!! Form::text('symble', null, ['class' => 'form-control']) !!}

                                </div>
                                <div class="col-md-6">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cd mt-2">
                    <div class="row">
                        <div class="col-md-3 p-1  text-end">
                            Currency Decimals
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-6">
                                    {!! Form::select('currency_decimals', ['0' => '0', '1' => '1', '2' => '2'], null, ['class' => 'form-control']) !!}

                                </div>
                                <div class="col-md-6">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="td mt-2">
                    <div class="row">
                        <div class="col-md-3 p-1  text-end">
                            Tax Decimals
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-6">
                                    {!! Form::select('tax_decimals', ['0' => '0', '1' => '1', '2' => '2'], null, ['class' => 'form-control']) !!}

                                </div>
                                <div class="col-md-6">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cd mt-2">
                    <div class="row">
                        <div class="col-md-3 p-1  text-end">
                            Quantity Decimals
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-6">
                                    {!! Form::select('quantity_decimals', ['0' => '0', '1' => '1', '2' => '2', '3' => '3'], null, ['class' => 'form-control']) !!}
                                </div>
                                <div class="col-md-6">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="poo mt-2">
                    <div class="row">
                        <div class="col-md-3 p-1  text-end">
                            Payment Options Order
                        </div>
                        <div class="col-md-9">
                            {!! Form::select('payment_options_order', ['cashdebitcredit' => 'Cash / Debit Card / Credit Card', 'debitcreditcash' => 'Debit Card / Credit Card / Cash', 'debitcashcredit' => 'Debit Card / Cash / Credit Card'], null, ['class' => 'form-control']) !!}

                        </div>
                    </div>
                </div>
                <div class="ccode mt-2">
                    <div class="row">
                        <div class="col-md-3 p-1  text-end">
                            Country Codes
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-6">
                                    {!! Form::text('ccode', null, ['class' => 'form-control']) !!}


                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="lan mt-2">
                    <div class="row">
                        <div class="col-md-3 p-1  text-end">
                            Language
                        </div>
                        <div class="col-md-9">
                            @php
                                $list = [
                                    'en:english' => 'English',
                                    'es:spanish' => 'Spanish',
                                    'nl-BE:dutch' => 'Dutch (Belgium)',
                                    'de:german' => 'German (Germany)',
                                    'de-CH:german' => 'German (Swiss)',
                                    'fr:french' => 'French',
                                    'zh:simplified-chinese' => 'Chinese',
                                    'id:indonesian' => 'Indonesian',
                                    'th:thai' => 'Thai',
                                    'tr:turkish' => 'Turkish',
                                ];
                            @endphp
                            {!! Form::select('language', $list, null, ['class' => 'form-control']) !!}

                            </select>
                        </div>
                    </div>
                </div>
                <div class="timezone mt-2">
                    <div class="row">
                        <div class="col-md-3 p-1  text-end">
                            Timezone
                        </div>
                        <div class="col-md-9">
                            @php
                                $timezone = [
                                    'Pacific/Midway' => '(UTC-11:00) Midway',
                                    'Pacific/Niue' => '(UTC-11:00) Niue',
                                    'Pacific/Pago_Pago' => '(UTC-11:00) Pago Pago',
                                    'America/Adak' => '(UTC-10:00) Adak',
                                    'Pacific/Honolulu' => '(UTC-10:00) Honolulu',
                                    'Pacific/Johnston' => '(UTC-10:00) Johnston',
                                    'Pacific/Rarotonga' => '(UTC-10:00) Rarotonga',
                                    'Pacific/Tahiti' => '(UTC-10:00) Tahiti',
                                    'Pacific/Marquesas' => '(UTC-09:30) Marquesas',
                                    'America/Anchorage' => '(UTC-09:00) Anchorage',
                                    'Pacific/Gambier' => '(UTC-09:00) Gambier',
                                    'America/Juneau' => '(UTC-09:00) Juneau',
                                    'America/Nome' => '(UTC-09:00) Nome',
                                    'America/Sitka' => '(UTC-09:00) Sitka',
                                    'America/Yakutat' => '(UTC-09:00) Yakutat',
                                    'America/Dawson' => '(UTC-08:00) Dawson',
                                    'America/Los_Angeles' => '(UTC-08:00) Los Angeles',
                                    'America/Metlakatla' => '(UTC-08:00) Metlakatla',
                                    'Pacific/Pitcairn' => '(UTC-08:00) Pitcairn',
                                    'America/Santa_Isabel' => '(UTC-08:00) Santa Isabel',
                                    'America/Tijuana' => '(UTC-08:00) Tijuana',
                                    'America/Vancouver' => '(UTC-08:00) Vancouver',
                                    'America/Whitehorse' => '(UTC-08:00) Whitehorse',
                                    'America/Boise' => '(UTC-07:00) Boise',
                                    'America/Cambridge_Bay' => '(UTC-07:00) Cambridge Bay',
                                    'America/Chihuahua' => '(UTC-07:00) Chihuahua',
                                    'America/Creston' => '(UTC-07:00) Creston',
                                    'America/Dawson_Creek' => '(UTC-07:00) Dawson Creek',
                                    'America/Denver' => '(UTC-07:00) Denver',
                                    'America/Edmonton' => '(UTC-07:00) Edmonton',
                                    'America/Hermosillo' => '(UTC-07:00) Hermosillo',
                                    'America/Inuvik' => '(UTC-07:00) Inuvik',
                                    'America/Mazatlan' => '(UTC-07:00) Mazatlan',
                                    'America/Ojinaga' => '(UTC-07:00) Ojinaga',
                                    'America/Phoenix' => '(UTC-07:00) Phoenix',
                                    'America/Shiprock' => '(UTC-07:00) Shiprock',
                                    'America/Yellowknife' => '(UTC-07:00) Yellowknife',
                                    'America/Bahia_Banderas' => '(UTC-06:00) Bahia Banderas',
                                    'America/Belize' => '(UTC-06:00) Belize',
                                    'America/North_Dakota/Beulah' => '(UTC-06:00) Beulah',
                                    'America/Cancun' => '(UTC-06:00) Cancun',
                                    'America/North_Dakota/Center' => '(UTC-06:00) Center',
                                    'America/Chicago' => '(UTC-06:00) Chicago',
                                    'America/Costa_Rica' => '(UTC-06:00) Costa Rica',
                                    'Pacific/Easter' => '(UTC-06:00) Easter',
                                    'America/El_Salvador' => '(UTC-06:00) El Salvador',
                                    'Pacific/Galapagos' => '(UTC-06:00) Galapagos',
                                    'America/Guatemala' => '(UTC-06:00) Guatemala',
                                    'America/Indiana/Knox' => '(UTC-06:00) Knox',
                                    'America/Managua' => '(UTC-06:00) Managua',
                                    'America/Matamoros' => '(UTC-06:00) Matamoros',
                                    'America/Menominee' => '(UTC-06:00) Menominee',
                                    'America/Merida' => '(UTC-06:00) Merida',
                                    'America/Mexico_City' => '(UTC-06:00) Mexico City',
                                    'America/Monterrey' => '(UTC-06:00) Monterrey',
                                    'America/North_Dakota/New_Salem' => '(UTC-06:00) New Salem',
                                    'America/Rainy_River' => '(UTC-06:00) Rainy River',
                                    'America/Rankin_Inlet' => '(UTC-06:00) Rankin Inlet',
                                    'America/Regina' => '(UTC-06:00) Regina',
                                    'America/Resolute' => '(UTC-06:00) Resolute',
                                    'America/Swift_Current' => '(UTC-06:00) Swift Current',
                                    'America/Tegucigalpa' => '(UTC-06:00) Tegucigalpa',
                                    'America/Indiana/Tell_City' => '(UTC-06:00) Tell City',
                                    'America/Winnipeg' => '(UTC-06:00) Winnipeg',
                                    'America/Atikokan' => '(UTC-05:00) Atikokan',
                                    'America/Bogota' => '(UTC-05:00) Bogota',
                                    'America/Cayman' => '(UTC-05:00) Cayman',
                                    'America/Detroit' => '(UTC-05:00) Detroit',
                                    'America/Grand_Turk' => '(UTC-05:00) Grand Turk',
                                    'America/Guayaquil' => '(UTC-05:00) Guayaquil',
                                    'America/Havana' => '(UTC-05:00) Havana',
                                    'America/Indiana/Indianapolis' => '(UTC-05:00) Indianapolis',
                                    'America/Iqaluit' => '(UTC-05:00) Iqaluit',
                                    'America/Jamaica' => '(UTC-05:00) Jamaica',
                                    'America/Lima' => '(UTC-05:00) Lima',
                                    'America/Kentucky/Louisville' => '(UTC-05:00) Louisville',
                                    'America/Indiana/Marengo' => '(UTC-05:00) Marengo',
                                    'America/Kentucky/Monticello' => '(UTC-05:00) Monticello',
                                    'America/Montreal' => '(UTC-05:00) Montreal',
                                    'America/Nassau' => '(UTC-05:00) Nassau',
                                    'America/New_York' => '(UTC-05:00) New York',
                                    'America/Nipigon' => '(UTC-05:00) Nipigon',
                                    'America/Panama' => '(UTC-05:00) Panama',
                                    'America/Pangnirtung' => '(UTC-05:00) Pangnirtung',
                                    'America/Indiana/Petersburg' => '(UTC-05:00) Petersburg',
                                    'America/Port-au-Prince' => '(UTC-05:00) Port-au-Prince',
                                    'America/Thunder_Bay' => '(UTC-05:00) Thunder Bay',
                                    'America/Toronto' => '(UTC-05:00) Toronto',
                                    'America/Indiana/Vevay' => '(UTC-05:00) Vevay',
                                    'America/Indiana/Vincennes' => '(UTC-05:00) Vincennes',
                                    'America/Indiana/Winamac' => '(UTC-05:00) Winamac',
                                    'America/Caracas' => '(UTC-04:30) Caracas',
                                    'America/Anguilla' => '(UTC-04:00) Anguilla',
                                    'America/Antigua' => '(UTC-04:00) Antigua',
                                    'America/Aruba' => '(UTC-04:00) Aruba',
                                    'America/Asuncion' => '(UTC-04:00) Asuncion',
                                    'America/Barbados' => '(UTC-04:00) Barbados',
                                    'Atlantic/Bermuda' => '(UTC-04:00) Bermuda',
                                    'America/Blanc-Sablon' => '(UTC-04:00) Blanc-Sablon',
                                    'America/Boa_Vista' => '(UTC-04:00) Boa Vista',
                                    'America/Campo_Grande' => '(UTC-04:00) Campo Grande',
                                    'America/Cuiaba' => '(UTC-04:00) Cuiaba',
                                    'America/Curacao' => '(UTC-04:00) Curacao',
                                    'America/Dominica' => '(UTC-04:00) Dominica',
                                    'America/Eirunepe' => '(UTC-04:00) Eirunepe',
                                    'America/Glace_Bay' => '(UTC-04:00) Glace Bay',
                                    'America/Goose_Bay' => '(UTC-04:00) Goose Bay',
                                    'America/Grenada' => '(UTC-04:00) Grenada',
                                    'America/Guadeloupe' => '(UTC-04:00) Guadeloupe',
                                    'America/Guyana' => '(UTC-04:00) Guyana',
                                    'America/Halifax' => '(UTC-04:00) Halifax',
                                    'America/Kralendijk' => '(UTC-04:00) Kralendijk',
                                    'America/La_Paz' => '(UTC-04:00) La Paz',
                                    'America/Lower_Princes' => '(UTC-04:00) Lower Princes',
                                    'America/Manaus' => '(UTC-04:00) Manaus',
                                    'America/Marigot' => '(UTC-04:00) Marigot',
                                    'America/Martinique' => '(UTC-04:00) Martinique',
                                    'America/Moncton' => '(UTC-04:00) Moncton',
                                    'America/Montserrat' => '(UTC-04:00) Montserrat',
                                    'Antarctica/Palmer' => '(UTC-04:00) Palmer',
                                    'America/Port_of_Spain' => '(UTC-04:00) Port of Spain',
                                    'America/Porto_Velho' => '(UTC-04:00) Porto Velho',
                                    'America/Puerto_Rico' => '(UTC-04:00) Puerto Rico',
                                    'America/Rio_Branco' => '(UTC-04:00) Rio Branco',
                                    'America/Santiago' => '(UTC-04:00) Santiago',
                                    'America/Santo_Domingo' => '(UTC-04:00) Santo Domingo',
                                    'America/St_Barthelemy' => '(UTC-04:00) St. Barthelemy',
                                    'America/St_Kitts' => '(UTC-04:00) St. Kitts',
                                    'America/St_Lucia' => '(UTC-04:00) St. Lucia',
                                    'America/St_Thomas' => '(UTC-04:00) St. Thomas',
                                    'America/St_Vincent' => '(UTC-04:00) St. Vincent',
                                    'America/Thule' => '(UTC-04:00) Thule',
                                    'America/Tortola' => '(UTC-04:00) Tortola',
                                    'America/St_Johns' => '(UTC-03:30) St. Johns',
                                    'America/Araguaina' => '(UTC-03:00) Araguaina',
                                    'America/Bahia' => '(UTC-03:00) Bahia',
                                    'America/Belem' => '(UTC-03:00) Belem',
                                    'America/Argentina/Buenos_Aires' => '(UTC-03:00) Buenos Aires',
                                    'America/Argentina/Catamarca' => '(UTC-03:00) Catamarca',
                                    'America/Cayenne' => '(UTC-03:00) Cayenne',
                                    'America/Argentina/Cordoba' => '(UTC-03:00) Cordoba',
                                    'America/Fortaleza' => '(UTC-03:00) Fortaleza',
                                    'America/Godthab' => '(UTC-03:00) Godthab',
                                    'America/Argentina/Jujuy' => '(UTC-03:00) Jujuy',
                                    'America/Argentina/La_Rioja' => '(UTC-03:00) La Rioja',
                                    'America/Maceio' => '(UTC-03:00) Maceio',
                                    'America/Argentina/Mendoza' => '(UTC-03:00) Mendoza',
                                    'America/Miquelon' => '(UTC-03:00) Miquelon',
                                    'America/Montevideo' => '(UTC-03:00) Montevideo',
                                    'America/Paramaribo' => '(UTC-03:00) Paramaribo',
                                    'America/Recife' => '(UTC-03:00) Recife',
                                    'America/Argentina/Rio_Gallegos' => '(UTC-03:00) Rio Gallegos',
                                    'Antarctica/Rothera' => '(UTC-03:00) Rothera',
                                    'America/Argentina/Salta' => '(UTC-03:00) Salta',
                                    'America/Argentina/San_Juan' => '(UTC-03:00) San Juan',
                                    'America/Argentina/San_Luis' => '(UTC-03:00) San Luis',
                                    'America/Santarem' => '(UTC-03:00) Santarem',
                                    'America/Sao_Paulo' => '(UTC-03:00) Sao Paulo',
                                    'Atlantic/Stanley' => '(UTC-03:00) Stanley',
                                    'America/Argentina/Tucuman' => '(UTC-03:00) Tucuman',
                                    'America/Argentina/Ushuaia' => '(UTC-03:00) Ushuaia',
                                    'America/Noronha' => '(UTC-02:00) Noronha',
                                    'Atlantic/South_Georgia' => '(UTC-02:00) South Georgia',
                                    'Atlantic/Azores' => '(UTC-01:00) Azores',
                                    'Atlantic/Cape_Verde' => '(UTC-01:00) Cape Verde',
                                    'America/Scoresbysund' => '(UTC-01:00) Scoresbysund',
                                    'Africa/Abidjan' => '(UTC+00:00) Abidjan',
                                    'Africa/Accra' => '(UTC+00:00) Accra',
                                    'Africa/Bamako' => '(UTC+00:00) Bamako',
                                    'Africa/Banjul' => '(UTC+00:00) Banjul',
                                    'Africa/Bissau' => '(UTC+00:00) Bissau',
                                    'Atlantic/Canary' => '(UTC+00:00) Canary',
                                    'Africa/Casablanca' => '(UTC+00:00) Casablanca',
                                    'Africa/Conakry' => '(UTC+00:00) Conakry',
                                    'Africa/Dakar' => '(UTC+00:00) Dakar',
                                    'America/Danmarkshavn' => '(UTC+00:00) Danmarkshavn',
                                    'Europe/Dublin' => '(UTC+00:00) Dublin',
                                    'Africa/El_Aaiun' => '(UTC+00:00) El Aaiun',
                                    'Atlantic/Faroe' => '(UTC+00:00) Faroe',
                                    'Africa/Freetown' => '(UTC+00:00) Freetown',
                                    'Europe/Guernsey' => '(UTC+00:00) Guernsey',
                                    'Europe/Isle_of_Man' => '(UTC+00:00) Isle of Man',
                                    'Europe/Jersey' => '(UTC+00:00) Jersey',
                                    'Europe/Lisbon' => '(UTC+00:00) Lisbon',
                                    'Africa/Lome' => '(UTC+00:00) Lome',
                                    'Europe/London' => '(UTC+00:00) London',
                                    'Atlantic/Madeira' => '(UTC+00:00) Madeira',
                                    'Africa/Monrovia' => '(UTC+00:00) Monrovia',
                                    'Africa/Nouakchott' => '(UTC+00:00) Nouakchott',
                                    'Africa/Ouagadougou' => '(UTC+00:00) Ouagadougou',
                                    'Atlantic/Reykjavik' => '(UTC+00:00) Reykjavik',
                                    'Africa/Sao_Tome' => '(UTC+00:00) Sao Tome',
                                    'Atlantic/St_Helena' => '(UTC+00:00) St. Helena',
                                    'UTC' => '(UTC+00:00) UTC',
                                    'Africa/Algiers' => '(UTC+01:00) Algiers',
                                    'Europe/Amsterdam' => '(UTC+01:00) Amsterdam',
                                    'Europe/Andorra' => '(UTC+01:00) Andorra',
                                    'Africa/Bangui' => '(UTC+01:00) Bangui',
                                    'Europe/Belgrade' => '(UTC+01:00) Belgrade',
                                    'Europe/Berlin' => '(UTC+01:00) Berlin',
                                    'Europe/Bratislava' => '(UTC+01:00) Bratislava',
                                    'Africa/Brazzaville' => '(UTC+01:00) Brazzaville',
                                    'Europe/Brussels' => '(UTC+01:00) Brussels',
                                    'Europe/Budapest' => '(UTC+01:00) Budapest',
                                    'Europe/Busingen' => '(UTC+01:00) Busingen',
                                    'Africa/Ceuta' => '(UTC+01:00) Ceuta',
                                    'Europe/Copenhagen' => '(UTC+01:00) Copenhagen',
                                    'Africa/Douala' => '(UTC+01:00) Douala',
                                    'Europe/Gibraltar' => '(UTC+01:00) Gibraltar',
                                    'Africa/Kinshasa' => '(UTC+01:00) Kinshasa',
                                    'Africa/Lagos' => '(UTC+01:00) Lagos',
                                    'Africa/Libreville' => '(UTC+01:00) Libreville',
                                    'Europe/Ljubljana' => '(UTC+01:00) Ljubljana',
                                    'Arctic/Longyearbyen' => '(UTC+01:00) Longyearbyen',
                                    'Africa/Luanda' => '(UTC+01:00) Luanda',
                                    'Europe/Luxembourg' => '(UTC+01:00) Luxembourg',
                                    'Europe/Madrid' => '(UTC+01:00) Madrid',
                                    'Africa/Malabo' => '(UTC+01:00) Malabo',
                                    'Europe/Malta' => '(UTC+01:00) Malta',
                                    'Europe/Monaco' => '(UTC+01:00) Monaco',
                                    'Africa/Ndjamena' => '(UTC+01:00) Ndjamena',
                                    'Africa/Niamey' => '(UTC+01:00) Niamey',
                                    'Europe/Oslo' => '(UTC+01:00) Oslo',
                                    'Europe/Paris' => '(UTC+01:00) Paris',
                                    'Europe/Podgorica' => '(UTC+01:00) Podgorica',
                                    'Africa/Porto-Novo' => '(UTC+01:00) Porto-Novo',
                                    'Europe/Prague' => '(UTC+01:00) Prague',
                                    'Europe/Rome' => '(UTC+01:00) Rome',
                                    'Europe/San_Marino' => '(UTC+01:00) San Marino',
                                    'Europe/Sarajevo' => '(UTC+01:00) Sarajevo',
                                    'Europe/Skopje' => '(UTC+01:00) Skopje',
                                    'Europe/Stockholm' => '(UTC+01:00) Stockholm',
                                    'Europe/Tirane' => '(UTC+01:00) Tirane',
                                    'Africa/Tripoli' => '(UTC+01:00) Tripoli',
                                    'Africa/Tunis' => '(UTC+01:00) Tunis',
                                    'Europe/Vaduz' => '(UTC+01:00) Vaduz',
                                    'Europe/Vatican' => '(UTC+01:00) Vatican',
                                    'Europe/Vienna' => '(UTC+01:00) Vienna',
                                    'Europe/Warsaw' => '(UTC+01:00) Warsaw',
                                    'Africa/Windhoek' => '(UTC+01:00) Windhoek',
                                    'Europe/Zagreb' => '(UTC+01:00) Zagreb',
                                    'Europe/Zurich' => '(UTC+01:00) Zurich',
                                    'Europe/Athens' => '(UTC+02:00) Athens',
                                    'Asia/Beirut' => '(UTC+02:00) Beirut',
                                    'Africa/Blantyre' => '(UTC+02:00) Blantyre',
                                    'Europe/Bucharest' => '(UTC+02:00) Bucharest',
                                    'Africa/Bujumbura' => '(UTC+02:00) Bujumbura',
                                    'Africa/Cairo' => '(UTC+02:00) Cairo',
                                    'Europe/Chisinau' => '(UTC+02:00) Chisinau',
                                    'Asia/Damascus' => '(UTC+02:00) Damascus',
                                    'Africa/Gaborone' => '(UTC+02:00) Gaborone',
                                    'Asia/Gaza' => '(UTC+02:00) Gaza',
                                    'Africa/Harare' => '(UTC+02:00) Harare',
                                    'Asia/Hebron' => '(UTC+02:00) Hebron',
                                    'Europe/Helsinki' => '(UTC+02:00) Helsinki',
                                    'Europe/Istanbul' => '(UTC+02:00) Istanbul',
                                    'Asia/Jerusalem' => '(UTC+02:00) Jerusalem',
                                    'Africa/Johannesburg' => '(UTC+02:00) Johannesburg',
                                    'Europe/Kiev' => '(UTC+02:00) Kiev',
                                    'Africa/Kigali' => '(UTC+02:00) Kigali',
                                    'Africa/Lubumbashi' => '(UTC+02:00) Lubumbashi',
                                    'Africa/Lusaka' => '(UTC+02:00) Lusaka',
                                    'Africa/Maputo' => '(UTC+02:00) Maputo',
                                    'Europe/Mariehamn' => '(UTC+02:00) Mariehamn',
                                    'Africa/Maseru' => '(UTC+02:00) Maseru',
                                    'Africa/Mbabane' => '(UTC+02:00) Mbabane',
                                    'Asia/Nicosia' => '(UTC+02:00) Nicosia',
                                    'Europe/Riga' => '(UTC+02:00) Riga',
                                    'Europe/Simferopol' => '(UTC+02:00) Simferopol',
                                    'Europe/Sofia' => '(UTC+02:00) Sofia',
                                    'Europe/Tallinn' => '(UTC+02:00) Tallinn',
                                    'Europe/Uzhgorod' => '(UTC+02:00) Uzhgorod',
                                    'Europe/Vilnius' => '(UTC+02:00) Vilnius',
                                    'Europe/Zaporozhye' => '(UTC+02:00) Zaporozhye',
                                    'Africa/Addis_Ababa' => '(UTC+03:00) Addis Ababa',
                                    'Asia/Aden' => '(UTC+03:00) Aden',
                                    'Asia/Amman' => '(UTC+03:00) Amman',
                                    'Indian/Antananarivo' => '(UTC+03:00) Antananarivo',
                                    'Africa/Asmara' => '(UTC+03:00) Asmara',
                                    'Asia/Baghdad' => '(UTC+03:00) Baghdad',
                                    'Asia/Bahrain' => '(UTC+03:00) Bahrain',
                                    'Indian/Comoro' => '(UTC+03:00) Comoro',
                                    'Africa/Dar_es_Salaam' => '(UTC+03:00) Dar es Salaam',
                                    'Africa/Djibouti' => '(UTC+03:00) Djibouti',
                                    'Africa/Juba' => '(UTC+03:00) Juba',
                                    'Europe/Kaliningrad' => '(UTC+03:00) Kaliningrad',
                                    'Africa/Kampala' => '(UTC+03:00) Kampala',
                                    'Africa/Khartoum' => '(UTC+03:00) Khartoum',
                                    'Asia/Kuwait' => '(UTC+03:00) Kuwait',
                                    'Indian/Mayotte' => '(UTC+03:00) Mayotte',
                                    'Europe/Minsk' => '(UTC+03:00) Minsk',
                                    'Africa/Mogadishu' => '(UTC+03:00) Mogadishu',
                                    'Europe/Moscow' => '(UTC+03:00) Moscow',
                                    'Africa/Nairobi' => '(UTC+03:00) Nairobi',
                                    'Asia/Qatar' => '(UTC+03:00) Qatar',
                                    'Asia/Riyadh' => '(UTC+03:00) Riyadh',
                                    'Antarctica/Syowa' => '(UTC+03:00) Syowa',
                                    'Asia/Tehran' => '(UTC+03:30) Tehran',
                                    'Asia/Baku' => '(UTC+04:00) Baku',
                                    'Asia/Dubai' => '(UTC+04:00) Dubai',
                                    'Indian/Mahe' => '(UTC+04:00) Mahe',
                                    'Indian/Mauritius' => '(UTC+04:00) Mauritius',
                                    'Asia/Muscat' => '(UTC+04:00) Muscat',
                                    'Indian/Reunion' => '(UTC+04:00) Reunion',
                                    'Europe/Samara' => '(UTC+04:00) Samara',
                                    'Asia/Tbilisi' => '(UTC+04:00) Tbilisi',
                                    'Europe/Volgograd' => '(UTC+04:00) Volgograd',
                                    'Asia/Yerevan' => '(UTC+04:00) Yerevan',
                                    'Asia/Kabul' => '(UTC+04:30) Kabul',
                                    'Asia/Aqtau' => '(UTC+05:00) Aqtau',
                                    'Asia/Aqtobe' => '(UTC+05:00) Aqtobe',
                                    'Asia/Ashgabat' => '(UTC+05:00) Ashgabat',
                                    'Asia/Dushanbe' => '(UTC+05:00) Dushanbe',
                                    'Asia/Karachi' => '(UTC+05:00) Karachi',
                                    'Indian/Kerguelen' => '(UTC+05:00) Kerguelen',
                                    'Indian/Maldives' => '(UTC+05:00) Maldives',
                                    'Antarctica/Mawson' => '(UTC+05:00) Mawson',
                                    'Asia/Oral' => '(UTC+05:00) Oral',
                                    'Asia/Samarkand' => '(UTC+05:00) Samarkand',
                                    'Asia/Tashkent' => '(UTC+05:00) Tashkent',
                                    'Asia/Colombo' => '(UTC+05:30) Colombo',
                                    'Asia/Kolkata' => '(UTC+05:30) Kolkata',
                                    'Asia/Kathmandu' => '(UTC+05:45) Kathmandu',
                                    'Asia/Almaty' => '(UTC+06:00) Almaty',
                                    'Asia/Bishkek' => '(UTC+06:00) Bishkek',
                                    'Indian/Chagos' => '(UTC+06:00) Chagos',
                                    'Asia/Dhaka' => '(UTC+06:00) Dhaka',
                                    'Asia/Qyzylorda' => '(UTC+06:00) Qyzylorda',
                                    'Asia/Thimphu' => '(UTC+06:00) Thimphu',
                                    'Antarctica/Vostok' => '(UTC+06:00) Vostok',
                                    'Asia/Yekaterinburg' => '(UTC+06:00) Yekaterinburg',
                                    'Indian/Cocos' => '(UTC+06:30) Cocos',
                                    'Asia/Rangoon' => '(UTC+06:30) Rangoon',
                                    'Asia/Bangkok' => '(UTC+07:00) Bangkok',
                                    'Indian/Christmas' => '(UTC+07:00) Christmas',
                                    'Antarctica/Davis' => '(UTC+07:00) Davis',
                                    'Asia/Ho_Chi_Minh' => '(UTC+07:00) Ho Chi Minh',
                                    'Asia/Hovd' => '(UTC+07:00) Hovd',
                                    'Asia/Jakarta' => '(UTC+07:00) Jakarta',
                                    'Asia/Novokuznetsk' => '(UTC+07:00) Novokuznetsk',
                                    'Asia/Novosibirsk' => '(UTC+07:00) Novosibirsk',
                                    'Asia/Omsk' => '(UTC+07:00) Omsk',
                                    'Asia/Phnom_Penh' => '(UTC+07:00) Phnom Penh',
                                    'Asia/Pontianak' => '(UTC+07:00) Pontianak',
                                    'Asia/Vientiane' => '(UTC+07:00) Vientiane',
                                    'Asia/Brunei' => '(UTC+08:00) Brunei',
                                    'Antarctica/Casey' => '(UTC+08:00) Casey',
                                    'Asia/Choibalsan' => '(UTC+08:00) Choibalsan',
                                    'Asia/Chongqing' => '(UTC+08:00) Chongqing',
                                    'Asia/Harbin' => '(UTC+08:00) Harbin',
                                    'Asia/Hong_Kong' => '(UTC+08:00) Hong Kong',
                                    'Asia/Kashgar' => '(UTC+08:00) Kashgar',
                                    'Asia/Krasnoyarsk' => '(UTC+08:00) Krasnoyarsk',
                                    'Asia/Kuala_Lumpur' => '(UTC+08:00) Kuala Lumpur',
                                    'Asia/Kuching' => '(UTC+08:00) Kuching',
                                    'Asia/Macau' => '(UTC+08:00) Macau',
                                    'Asia/Makassar' => '(UTC+08:00) Makassar',
                                    'Asia/Manila' => '(UTC+08:00) Manila',
                                    'Australia/Perth' => '(UTC+08:00) Perth',
                                    'Asia/Shanghai' => '(UTC+08:00) Shanghai',
                                    'Asia/Singapore' => '(UTC+08:00) Singapore',
                                    'Asia/Taipei' => '(UTC+08:00) Taipei',
                                    'Asia/Ulaanbaatar' => '(UTC+08:00) Ulaanbaatar',
                                    'Asia/Urumqi' => '(UTC+08:00) Urumqi',
                                    'Australia/Eucla' => '(UTC+08:45) Eucla',
                                    'Asia/Dili' => '(UTC+09:00) Dili',
                                    'Asia/Irkutsk' => '(UTC+09:00) Irkutsk',
                                    'Asia/Jayapura' => '(UTC+09:00) Jayapura',
                                    'Pacific/Palau' => '(UTC+09:00) Palau',
                                    'Asia/Pyongyang' => '(UTC+09:00) Pyongyang',
                                    'Asia/Seoul' => '(UTC+09:00) Seoul',
                                    'Asia/Tokyo' => '(UTC+09:00) Tokyo',
                                    'Australia/Adelaide' => '(UTC+09:30) Adelaide',
                                    'Australia/Broken_Hill' => '(UTC+09:30) Broken Hill',
                                    'Australia/Darwin' => '(UTC+09:30) Darwin',
                                    'Australia/Brisbane' => '(UTC+10:00) Brisbane',
                                    'Pacific/Chuuk' => '(UTC+10:00) Chuuk',
                                    'Australia/Currie' => '(UTC+10:00) Currie',
                                    'Antarctica/DumontDUrville' => '(UTC+10:00) DumontDUrville',
                                    'Pacific/Guam' => '(UTC+10:00) Guam',
                                    'Australia/Hobart' => '(UTC+10:00) Hobart',
                                    'Asia/Khandyga' => '(UTC+10:00) Khandyga',
                                    'Australia/Lindeman' => '(UTC+10:00) Lindeman',
                                    'Australia/Melbourne' => '(UTC+10:00) Melbourne',
                                    'Pacific/Port_Moresby' => '(UTC+10:00) Port Moresby',
                                    'Pacific/Saipan' => '(UTC+10:00) Saipan',
                                    'Australia/Sydney' => '(UTC+10:00) Sydney',
                                    'Asia/Yakutsk' => '(UTC+10:00) Yakutsk',
                                    'Australia/Lord_Howe' => '(UTC+10:30) Lord Howe',
                                    'Pacific/Efate' => '(UTC+11:00) Efate',
                                    'Pacific/Guadalcanal' => '(UTC+11:00) Guadalcanal',
                                    'Pacific/Kosrae' => '(UTC+11:00) Kosrae',
                                    'Antarctica/Macquarie' => '(UTC+11:00) Macquarie',
                                    'Pacific/Noumea' => '(UTC+11:00) Noumea',
                                    'Pacific/Pohnpei' => '(UTC+11:00) Pohnpei',
                                    'Asia/Sakhalin' => '(UTC+11:00) Sakhalin',
                                    'Asia/Ust-Nera' => '(UTC+11:00) Ust-Nera',
                                    'Asia/Vladivostok' => '(UTC+11:00) Vladivostok',
                                    'Pacific/Norfolk' => '(UTC+11:30) Norfolk',
                                    'Asia/Anadyr' => '(UTC+12:00) Anadyr',
                                    'Pacific/Auckland' => '(UTC+12:00) Auckland',
                                    'Pacific/Fiji' => '(UTC+12:00) Fiji',
                                    'Pacific/Funafuti' => '(UTC+12:00) Funafuti',
                                    'Asia/Kamchatka' => '(UTC+12:00) Kamchatka',
                                    'Pacific/Kwajalein' => '(UTC+12:00) Kwajalein',
                                    'Asia/Magadan' => '(UTC+12:00) Magadan',
                                    'Pacific/Majuro' => '(UTC+12:00) Majuro',
                                    'Antarctica/McMurdo' => '(UTC+12:00) McMurdo',
                                    'Pacific/Nauru' => '(UTC+12:00) Nauru',
                                    'Antarctica/South_Pole' => '(UTC+12:00) South Pole',
                                    'Pacific/Tarawa' => '(UTC+12:00) Tarawa',
                                    'Pacific/Wake' => '(UTC+12:00) Wake',
                                    'Pacific/Wallis' => '(UTC+12:00) Wallis',
                                    'Pacific/Chatham' => '(UTC+12:45) Chatham',
                                    'Pacific/Apia' => '(UTC+13:00) Apia',
                                    'Pacific/Enderbury' => '(UTC+13:00) Enderbury',
                                    'Pacific/Fakaofo' => '(UTC+13:00) Fakaofo',
                                    'Pacific/Tongatapu' => '(UTC+13:00) Tongatapu',
                                    'Pacific/Kiritimati' => '(UTC+14:00) Kiritimati',
                                ];
                            @endphp
                            {!! Form::select('timezone', $timezone, null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="datetime mt-2">
                    <div class="row">
                        <div class="col-md-3 p-1  text-end">
                            Date and Time format
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-6">
                                    @php
                                        $dateformat = [
                                            'd/m/Y' => 'dd/mm/yyyy',
                                            'd.m.Y' => 'dd.mm.yyyy',
                                            'm/d/Y' => 'mm/dd',
                                            'Y/m/d' => 'yyyy/mm/dd',
                                            'd/m/y' => 'dd/mm/yy',
                                            'm/d/y' => 'mm/dd/yy',
                                            'y/m/d' => 'yy/mm/dd',
                                        ];
                                    @endphp
                                    {!! Form::select('dateformat', $dateformat, null, ['class' => 'form-control']) !!}
                                </div>
                                <div class="col-md-6">
                                    {!! Form::select('timeformat', ['H:i:s' => 'hh:mm:ss (24h)', 'h:i:s a' => 'hh:mm:ss am/pm', 'h:i:s A' => 'hh:mm:ss AM/PM'], null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="button mb-2">
                    <div class="row">
                        <div class="col-md-6">

                        </div>
                        <div class="col-md-6 text-end">
                            <input type="submit" value="Submit" class="btn btn-dark">
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
        <div class="tab-pane fade" id="Barcode" role="tabpanel" aria-labelledby="nav-contact-tab">
            <div class="w-70">
                <div class="requerd mt-3">
                    <div class="row">
                        <div class="col-md-8 text-end fst-italic">Fields in red are required</div>
                        <div class="col-md-4 "></div>
                        <div class=" col-md-12 error_msg my-2"></div>
                    </div>
                </div>
                {!! Form::model($storedata, ['route' => 'storedone.storeconf']) !!}
                <div class="bt mt-2">
                    <div class="row">
                        <div class="col-md-3 p-1  text-end">
                            Barcode Type
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-3">
                                    {!! Form::select('barcode_type', ['Code39' => 'Code 39', 'Code128' => 'Code 128', 'Ean8' => 'Ean 8', 'Ean13' => 'Ean 13'], null, ['class' => 'form-control']) !!}
                                </div>
                                <div class="col-md-9">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="qty mt-2">
                    <div class="row">
                        <div class="col-md-3 p-1 text-danger fw-bold text-end">
                            Quality (1-100)
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-3">
                                    {!! Form::number('qty', null, ['class' => 'form-control', 'placeholder' => '100']) !!}
                                </div>
                                <div class="col-md-9">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="width mt-2">
                    <div class="row">
                        <div class="col-md-3 p-1 text-danger fw-bold text-end">
                            Width (px)
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-3">
                                    {!! Form::number('width', null, ['class' => 'form-control', 'placeholder' => '250']) !!}
                                </div>
                                <div class="col-md-9">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="Height mt-2">
                    <div class="row">
                        <div class="col-md-3 p-1 text-danger fw-bold text-end">
                            Height (px)
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-3">
                                    {!! Form::number('weight', null, ['class' => 'form-control', 'placeholder' => '50']) !!}
                                </div>
                                <div class="col-md-9">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="Font mt-2">
                    <div class="row">
                        <div class="col-md-3 p-1 text-danger fw-bold text-end">
                            Font
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-3">
                                    {!! Form::select('barcode_font', ['0' => 'None', 'Arial.ttf' => 'Arial.ttf', 'b-de-bonita-shadow.ttf' => 'b-de-bonita-shadow.ttf', 'SansationLight.ttf' => 'SansationLight.ttf'], null, ['class' => 'form-control']) !!}

                                </div>
                                <div class="col-md-3">
                                    {!! Form::number('font', null, ['class' => 'form-control', 'placeholder' => '10']) !!}
                                </div>
                                <div class="col-md-6">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bc mt-2">
                    <div class="row">
                        <div class="col-md-3 p-1 text-end">
                            Barcode Content
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-8">
                                    <label class="radio-inline"><input type="radio" name="barcode_content" value="id"
                                            checked="checked">&nbsp; Item Id/Name</label>
                                    <label class="radio-inline"><input type="radio" name="barcode_content"
                                            value="number">&nbsp; UPC/EAN/ISBN</label>
                                    <label class="checkbox-inline"><input type="checkbox" name="barcode_generate_if_empty"
                                            value="barcode_generate_if_empty">&nbsp;
                                        Generate if empty </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">

                        </div>
                    </div>
                </div>
                <div class="bl mt-2">
                    <div class="row">
                        <div class="col-md-3 p-1 text-end">
                            Barcode Layout
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-sm row">
                                        <label class="form-control-label col-sm-1 pt1">Row 1 </label>
                                        <div class="col-sm-2">
                                            @php
                                                $list = [
                                                    'not_show' => 'none',
                                                    'name' => 'Item Name',
                                                    'category' => 'Category',
                                                    'cost_price' => 'Cost Price',
                                                    'unit_price' => 'Retail Price',
                                                    'company_name' => 'Company Name',
                                                ];
                                            @endphp
                                            {!! Form::select('barcode_first_row', $list, null, ['class' => 'form-control']) !!}

                                        </div>
                                        <label class="form-control-label col-sm-1 pt-1">Row 2 </label>
                                        <div class="col-sm-2">
                                            {!! Form::select('barcode_second_row', $list, null, ['class' => 'form-control']) !!}

                                        </div>
                                        <label class="form-control-label col-sm-1 pt-1">Row 3 </label>
                                        <div class="col-sm-2">
                                            {!! Form::select('barcode_third_row', $list, null, ['class' => 'form-control']) !!}

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="numrow mt-2">
                    <div class="row">
                        <div class="col-md-3 p-1 text-danger fw-bold text-end">
                            Number in row
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-3">
                                    {!! Form::text('numrow', null, ['class' => 'form-control']) !!}
                                </div>
                                <div class="col-md-9">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dpw mt-2">
                    <div class="row">
                        <div class="col-md-3 p-1 text-danger fw-bold text-end">
                            Display page width
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class=" input-group">
                                        {!! Form::text('dpw', null, ['class' => 'form-control']) !!}
                                        <span class="input-group-text" id="basic-addon1">%</span>
                                    </div>
                                </div>
                                <div class="col-md-9">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dpc mt-2">
                    <div class="row">
                        <div class="col-md-3 p-1 text-danger fw-bold text-end">
                            Display page cellspacing
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class=" input-group">
                                        {!! Form::text('dpc', null, ['class' => 'form-control']) !!}
                                        <span class="input-group-text" id="basic-addon1">PX</span>
                                    </div>
                                </div>
                                <div class="col-md-9">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="button mb-2">
                    <div class="row">
                        <div class="col-md-6">

                        </div>
                        <div class="col-md-6 text-end">
                            <input type="submit" value="Submit" class="btn btn-dark">
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
        <div class="tab-pane fade" id="Stock" role="tabpanel" aria-labelledby="nav-contact-tab">
            <div class="w-70">
                <div class="requerd mt-3">
                    <div class="row">
                        <div class="col-md-8 text-end fst-italic">Fields in red are required</div>
                        <div class="col-md-4 "></div>
                        <div class=" col-md-12 error_msg my-2"></div>
                    </div>
                </div>
                <form action="{{ route('storedone.storeconf') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="bt mt-2">
                        <div class="row">
                            <div class="col-md-3 p-1 text-danger fw-bold text-end">
                                <label for="Stocklocaion" id="stock_id"> Stock location 1</label>
                            </div>
                            <div class="col-md-3 tt">
                                <input type="text" id="stock" name="stock" class="form-control">
                            </div>
                            <div class="col-md-3 text-start">
                                <a id="plus" href="javascript:void(0)"><i class="fas fa-plus"></i></a> &nbsp;
                                <a id="minus" style="display: none" href="javascript:void(0)"><i
                                        class="fas fa-minus"></i></a> &nbsp;
                            </div>
                            <div class="col-md-6">
                            </div>

                        </div>
                    </div>
                    <div class="button mb-2">
                        <div class="row">
                            <div class="col-md-6">

                            </div>
                            <div class="col-md-6 text-end">
                                <input type="submit" value="Submit" class="btn btn-dark">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="tab-pane fade" id="Receipt" role="tabpanel" aria-labelledby="nav-contact-tab">
            <div class="w-70">
                <div class="requerd mt-3">
                    <div class="row">
                        <div class="col-md-8 text-end fst-italic">Fields in red are required</div>
                        <div class="col-md-4 "></div>
                        <div class=" col-md-12 error_msg my-2"></div>
                    </div>
                </div>
                <form action="{{ route('storedone.storeconf') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="rt mt-2">
                        <div class="row">
                            <div class="col-md-3 p-1  text-end">
                                Receipt Template
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-3">
                                        <select name="receipt_template" class="form-control input-sm" aria-invalid="false">
                                            <option value="receipt_default" selected="selected">Default</option>
                                            <option value="receipt_short">Short</option>
                                        </select>
                                    </div>
                                    <div class="col-md-9">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="st mt-2">
                        <div class="row">
                            <div class="col-md-3 text-end">
                                <label for="receipt_show_taxes"> Show Taxes</label>
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-3">
                                        <input type="checkbox" name="receipt_show_taxes" value="receipt_show_taxes"
                                            id="receipt_show_taxes">
                                    </div>
                                    <div class="col-md-9">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="std mt-2">
                        <div class="row">
                            <div class="col-md-3 text-end">
                                <label for="receipt_show_total_discount" class="form-control-label col-xs-2">Show Total
                                    Discount</label>
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-3">
                                        <input type="checkbox" name="receipt_show_total_discount"
                                            value="receipt_show_total_discount" checked="checked"
                                            id="receipt_show_total_discount">
                                    </div>
                                    <div class="col-md-9">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sd mt-2">
                        <div class="row">
                            <div class="col-md-3 text-end">
                                <label for="receipt_show_description" class="form-control-label col-xs-2">Show
                                    Description</label>
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-3">
                                        <input type="checkbox" name="receipt_show_description"
                                            value="receipt_show_description" checked="checked"
                                            id="receipt_show_description">
                                    </div>
                                    <div class="col-md-9">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ssn mt-2">
                        <div class="row">
                            <div class="col-md-3 text-end">
                                <label for="receipt_show_serialnumber" class="form-control-label col-xs-2">Show Serial
                                    Number</label>
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-3">
                                        <input type="checkbox" name="receipt_show_serialnumber"
                                            value="receipt_show_serialnumber" checked="checked"
                                            id="receipt_show_serialnumber">
                                    </div>
                                    <div class="col-md-9"> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="print_silently mt-2">
                        <div class="row">
                            <div class="col-md-3 text-end">
                                <label for="print_silently" class="form-control-label col-xs-2">Show Print Dialog</label>
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-3">
                                        <input type="checkbox" name="print_silently" value="print_silently"
                                            checked="checked" id="print_silently" disabled="">
                                    </div>
                                    <div class="col-md-9"> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="print_header mt-2">
                        <div class="row">
                            <div class="col-md-3 text-end">
                                <label for="print_header" class="form-control-label col-xs-2">Print Browser Header</label>
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-3">
                                        <input type="checkbox" name="print_header" value="print_header" id="print_header"
                                            disabled="">
                                    </div>
                                    <div class="col-md-9"> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="print_footer mt-2">
                        <div class="row">
                            <div class="col-md-3 text-end">
                                <label for="print_footer" class="form-control-label col-xs-2">Print Browser Footer</label>
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-3">
                                        <input type="checkbox" name="print_footer" value="print_footer" id="print_footer"
                                            disabled="">
                                    </div>
                                    <div class="col-md-9"> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="config_receipt_printer mt-2">
                        <div class="row">
                            <div class="col-md-3 p-1  text-end">
                                <label for="config_receipt_printer" class="form-form-control-label col-xs-2">Ticket
                                    Printer</label>
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-3">
                                        <select name="receipt_printer" id="receipt_printer" class="form-control"
                                            disabled="">
                                            <option value="na">N/A</option>
                                        </select>
                                    </div>
                                    <div class="col-md-9">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="config_invoice_printer mt-2">
                        <div class="row">
                            <div class="col-md-3 p-1  text-end">
                                <label for="config_invoice_printer" class="form-control-label col-xs-2">Invoice
                                    Printer</label>
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-3">
                                        <select name="invoice_printer" id="invoice_printer" class="form-control"
                                            disabled="">
                                            <option value="na">N/A</option>
                                        </select>
                                    </div>
                                    <div class="col-md-9">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="config_takings_printer mt-2">
                        <div class="row">
                            <div class="col-md-3 p-1  text-end">
                                <label for="config_takings_printer" class="form-control-label col-xs-2">Takings
                                    Printer</label>
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-3">
                                        <select name="takings_printer" id="takings_printer" class="form-control"
                                            disabled="">
                                            <option value="na">N/A</option>
                                        </select>
                                    </div>
                                    <div class="col-md-9">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt mt-2">
                        <div class="row">
                            <div class="col-md-3 p-1 text-danger fw-bold text-end">
                                Margin Top
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class=" input-group">
                                            <input type="text" name="mtop" disabled value="0" class="form-control">
                                            <span class="input-group-text" id="basic-addon1">PX</span>
                                        </div>
                                    </div>
                                    <div class="col-md-9">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ml mt-2">
                        <div class="row">
                            <div class="col-md-3 p-1 text-danger fw-bold text-end">
                                Margin Left
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class=" input-group">
                                            <input type="text" name="mleft" disabled value="0" class="form-control">
                                            <span class="input-group-text" id="basic-addon1">PX</span>
                                        </div>
                                    </div>
                                    <div class="col-md-9">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb mt-2">
                        <div class="row">
                            <div class="col-md-3 p-1 text-danger fw-bold text-end">
                                Margin Bottom
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class=" input-group">
                                            <input type="text" name="mb" disabled value="0" class="form-control">
                                            <span class="input-group-text" id="basic-addon1">PX</span>
                                        </div>
                                    </div>
                                    <div class="col-md-9">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mr mt-2">
                        <div class="row">
                            <div class="col-md-3 p-1 text-danger fw-bold text-end">
                                Margin Right
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class=" input-group">
                                            <input type="text" name="mr" disabled value="0" class="form-control">
                                            <span class="input-group-text" id="basic-addon1">PX</span>
                                        </div>
                                    </div>
                                    <div class="col-md-9">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="button mb-2">
                        <div class="row">
                            <div class="col-md-6">

                            </div>
                            <div class="col-md-6 text-end">
                                <input type="submit" value="Submit" class="btn btn-dark">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="tab-pane fade" id="Invoice" role="tabpanel" aria-labelledby="nav-contact-tab">
            <div class="w-70">
                <div class="requerd mt-3">
                    <div class="row">
                        <div class="col-md-8 text-end fst-italic">Fields in red are required</div>
                        <div class="col-md-4 "></div>
                        <div class=" col-md-12 error_msg my-2"></div>
                    </div>
                </div>
                <form action="{{ route('storedone.storeconf') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="EnableInvoicing mt-2">
                        <div class="row">
                            <div class="col-md-3 text-end">
                                <label for="receipt_show_total_discount" class="form-control-label col-xs-2">Enable
                                    Invoicing</label>
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-3">
                                        <input type="checkbox" name="receipt_show_total_discount"
                                            value="receipt_show_total_discount" checked="true" class="messageCheckbox"
                                            id="messageCheckbox">
                                    </div>
                                    <div class="col-md-9">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sales_invoice_format mt-2">
                        <div class="row">
                            <div class="col-md-3 text-end">
                                <label for="sales_invoice_format" class="form-control-label col-xs-2">Sales Invoice
                                    Format</label>
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-3">
                                        <input type="text" name="sales_invoice_format" value="$CO" id="sales_invoice_format"
                                            class="form-control input-sm" aria-invalid="false">
                                    </div>
                                    <div class="col-md-9"> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="recv_invoice_format mt-2">
                        <div class="row">
                            <div class="col-md-3 text-end">
                                <label for="recv_invoice_format" class="control-label col-xs-2">Receivings Invoice
                                    Format</label>
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-3">
                                        <input type="text" name="recv_invoice_format" value="$CO" id="recv_invoice_format"
                                            class="form-control input-sm" aria-invalid="false">
                                    </div>
                                    <div class="col-md-9"> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="invoice_default_comments mt-2">
                        <div class="row">
                            <div class="col-md-3 text-end">
                                <label for="invoice_default_comments" class="form-control-label col-xs-2">Default Invoice
                                    Comments</label>
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-6">
                                        <textarea name="invoice_default_comments" cols="40" rows="10"
                                            id="invoice_default_comments" class="form-control "
                                            value="This is a default comment"></textarea>
                                    </div>
                                    <div class="col-md-6"> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="invoice_email_message mt-2">
                        <div class="row">
                            <div class="col-md-3 text-end">
                                <label for="invoice_email_message" class="form-control-label col-xs-2">Invoice Email
                                    Template</label>
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-6">
                                        <textarea name="invoice_email_message" cols="40" rows="10"
                                            id="invoice_email_message" class="form-control "
                                            value="This is a default comment"></textarea>
                                    </div>
                                    <div class="col-md-6"> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="button mb-2">
                        <div class="row">
                            <div class="col-md-6">

                            </div>
                            <div class="col-md-6 text-end">
                                <input type="submit" value="Submit" class="btn btn-dark">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="tab-pane fade" id="Email" role="tabpanel" aria-labelledby="nav-contact-tab">
            <div class="w-70">
                <div class="requerd mt-3">
                    <div class="row">
                        <div class="col-md-8 text-end fst-italic">Fields in red are required</div>
                        <div class="col-md-4 "></div>
                        <div class=" col-md-12 error_msg my-2"></div>
                    </div>
                </div>
                <form action="{{ route('storedone.storeconf') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="Protocol mt-2">
                        <div class="row">
                            <div class="col-md-3 text-end">
                                <label for="protocol" class="form-control-label col-xs-2">Protocol</label>
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-3">
                                        <select name="protocol" class="form-control input-sm" id="protocol"
                                            aria-invalid="false">
                                            <option value="mail" selected="selected">mail</option>
                                            <option value="sendmail">sendmail</option>
                                            <option value="smtp">smtp</option>
                                        </select>
                                    </div>
                                    <div class="col-md-9">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="Sendmail mt-2">
                        <div class="row">
                            <div class="col-md-3 text-end">
                                <label for="mailpath" class="form-control-label col-xs-2">Path to Sendmail</label>
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" name="mailpath" value="/usr/sbin/sendmail" id="mailpath"
                                            class="form-control input-sm" disabled="">
                                    </div>
                                    <div class="col-md-6"> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="smtp_host mt-2">
                        <div class="row">
                            <div class="col-md-3 text-end">
                                <label for="smtp_host" class="form-control-label col-xs-2">SMTP Server</label>
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-3">
                                        <input type="text" name="smtp_host" value="" id="smtp_host"
                                            class="form-control input-sm" disabled="true">
                                    </div>
                                    <div class="col-md-9"> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="smtp_port mt-2">
                        <div class="row">
                            <div class="col-md-3 text-end">
                                <label for="smtp_port" class="form-control-label col-xs-2">SMTP Port</label>
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-3">
                                        <input type="text" name="smtp_port" value="465" id="smtp_port"
                                            class="form-control input-sm" disabled="true">
                                    </div>
                                    <div class="col-md-9"> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="smtp_crypto mt-2">
                        <div class="row">
                            <div class="col-md-3 text-end">
                                <label for="smtp_crypto" class="form-control-label col-xs-2">SMTP Encryption</label>
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-3">
                                        <input type="text" name="smtp_port" value="465" id="smtp_crypto"
                                            class="form-control input-sm" disabled="true">
                                    </div>
                                    <div class="col-md-9"> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="smtp_timeout mt-2">
                        <div class="row">
                            <div class="col-md-3 text-end">
                                <label for="smtp_timeout" class="form-control-label col-xs-2">SMTP Timeout (s)</label>
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-3">
                                        <input type="text" name="smtp_timeout" value="5" id="smtp_timeout"
                                            class="form-control input-sm" disabled="true">
                                    </div>
                                    <div class="col-md-9"> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="smtp_user mt-2">
                        <div class="row">
                            <div class="col-md-3 text-end">
                                <label for="smtp_user" class="form-control-label col-xs-2">SMTP Username</label>
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <span class="input-group-text" id="smtp_users"> <i
                                                    class="fas fa-user"></i></span>
                                            <input type="text" name="smtp_user" disabled="true" id="smtp_user"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6"> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="smtp_pass mt-2">
                        <div class="row">
                            <div class="col-md-3 text-end">
                                <label for="smtp_pass" class="form-control-label col-xs-2">SMTP Password</label>
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <span class="input-group-text" id="smtp_passs"> <i
                                                    class="fas fa-star-of-life"></i></span>
                                            <input type="text" disabled="true" name="smtp_user" id="smtp_pass"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6"> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="button mb-2">
                        <div class="row">
                            <div class="col-md-6">

                            </div>
                            <div class="col-md-6 text-end">
                                <input type="submit" value="Submit" class="btn btn-dark">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="tab-pane fade" id="Message" role="tabpanel" aria-labelledby="nav-contact-tab">
            <div class="w-70">
                <div class="requerd mt-3">
                    <div class="row">
                        <div class="col-md-8 text-end fst-italic">Fields in red are required</div>
                        <div class="col-md-4 "></div>
                        <div class=" col-md-12 error_msg my-2"></div>
                    </div>
                </div>
                <form action="{{ route('storedone.storeconf') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="msg_uid mt-2">
                        <div class="row">
                            <div class="col-md-3 text-end pt-1 text-danger fw-bold">
                                <label for="msg_uid" class="form-control-label col-xs-2 required"
                                    aria-required="true">SMS-API Username</label>
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <span class="input-group-text"> <i class="fas fa-user"></i></span>
                                            <input type="text" value="User" name="msg_uid" id="msg_uid"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6"> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="msg_pwd mt-2">
                        <div class="row">
                            <div class="col-md-3 text-end pt-1 text-danger fw-bold">
                                <label for="msg_pwd" class="control-label col-xs-2 required" aria-required="true">SMS-API
                                    Password</label>
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <span class="input-group-text"> <i class="fas fa-lock"></i></span>
                                            <input type="password" value="*******" name="msg_pwd" id="msg_pwd"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6"> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="msg_src mt-2">
                        <div class="row">
                            <div class="col-md-3 text-end pt-1 text-danger fw-bold">
                                <label for="msg_src" class="form-control-label col-xs-2 required"
                                    aria-required="true">SMS-API Sender ID</label>
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <span class="input-group-text"> <i class="fas fa-user"></i></span>
                                            <input type="text" value="Round-45 Point of sale" name="msg_src" id="msg_src"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6"> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="msg_msg mt-2">
                        <div class="row">
                            <div class="col-md-3 text-end pt-1 text-danger fw-bold">
                                <label for="msg_msg" class="control-label col-xs-2">Saved Text Message</label>
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-6">
                                        <textarea name="msg_msg" cols="40" rows="10" id="msg_msg"
                                            class="form-control input-sm"
                                            placeholder="If you wish to use a SMS template save your message here. Otherwise leave the box blank."></textarea>
                                    </div>
                                    <div class="col-md-6"> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="button mb-2">
                        <div class="row">
                            <div class="col-md-6">

                            </div>
                            <div class="col-md-6 text-end">
                                <input type="submit" value="Submit" class="btn btn-dark">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#plus').click(function() {
                $('#minus').show();
                $('.tt').append('<input type="text" id="stock" name="stock" class="form-control">');
            });
            $("#messageCheckbox").on('change', function() {
                if ($(this).is(':checked')) {
                    $('#sales_invoice_format').attr('disabled', false);
                    $('#recv_invoice_format').attr('disabled', false);
                    $('#invoice_default_comments').attr('disabled', false);
                    $('#invoice_email_message').attr('disabled', false);
                } else {
                    $('#sales_invoice_format').attr('disabled', true);
                    $('#recv_invoice_format').attr('disabled', true);
                    $('#invoice_default_comments').attr('disabled', true);
                    $('#invoice_email_message').attr('disabled', true);
                }
            });

            $("#protocol").on('change', function() {
                var value = $(this).val();

                if (value == 'mail') {
                    $('#mailpath').attr('disabled', true)
                    $('#smtp_host').attr('disabled', true)
                    $('#smtp_port').attr('disabled', true)
                    $('#smtp_crypto').attr('disabled', true)
                    $('#smtp_timeout').attr('disabled', true)
                    $('#smtp_user').attr('disabled', true)
                    $('#smtp_pass').attr('disabled', true)

                } else if (value == 'sendmail') {
                    $('#mailpath').attr('disabled', false)
                    $('#smtp_host').attr('disabled', true)
                    $('#smtp_port').attr('disabled', true)
                    $('#smtp_crypto').attr('disabled', true)
                    $('#smtp_timeout').attr('disabled', true)
                    $('#smtp_user').attr('disabled', true)
                    $('#smtp_pass').attr('disabled', true)

                } else {
                    $('#mailpath').attr('disabled', true)
                    $('#smtp_host').attr('disabled', false)
                    $('#smtp_port').attr('disabled', false)
                    $('#smtp_crypto').attr('disabled', false)
                    $('#smtp_timeout').attr('disabled', false)
                    $('#smtp_user').attr('disabled', false)
                    $('#smtp_pass').attr('disabled', false)
                }
            })

        });
    </script>
@endsection
