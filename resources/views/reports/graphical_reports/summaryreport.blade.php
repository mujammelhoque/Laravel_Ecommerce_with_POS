@extends('layout.main')
@section('title')
   Summary
@endsection
@section('style')
@endsection


@section('content')
<div class="text-end mb-2">
  
    <a href="javascript:void (0)" id="print" class=" btn mybtn-info fw-light"><i class="fas fa-print"></i> &nbsp; Print</a>
  </div>

    @isset($customers)

<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Email</th>
        <th scope="col">phone</th>
        <th scope="col">city</th>
        <th scope="col">country</th>
        <th scope="col">company</th>
      </tr>
    </thead>
    <tbody>
        @forelse ($customers as $item)
        <tr>
            <th scope="row">1</th>
            <td>{{$item->first_name}}</td>
            <td>{{$item->last_name}}</td>
            <td>{{$item->email}}</td>
            <td>{{$item->phone}}</td>
            <td>{{$item->city}}</td>
            <td>{{$item->country}}</td>
            <td>{{$item->company}}</td>
  
          </tr>
        @empty
            
        @endforelse
     
    </tbody>
  </table>

  @endisset

  @isset($employees)
    
<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Email</th>
        <th scope="col">phone</th>
      
      </tr>
    </thead>
    <tbody>
        @forelse ($employees as $item)
        <tr>
            <th scope="row">1</th>
            <td>{{$item->first_name}}</td>
            <td>{{$item->last_name}}</td>
            <td>{{$item->email}}</td>
            <td>{{$item->phone}}</td>
        
  
          </tr>
        @empty
            
        @endforelse
     
    </tbody>
  </table>
  @endisset

  
@endsection