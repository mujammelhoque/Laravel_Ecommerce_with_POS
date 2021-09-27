@extends('layout.main')

@section('title')
    Items
@endsection

@section('style')
<style>
.text{
  text-align: center;
}
td div{
    display: block;
    margin-left: auto;
    margin-right: auto;

}
</style>
@endsection
@section('content')
<div class="text-end mb-2">
  
  <a href="javascript:void (0)" id="print" class=" btn mybtn-info fw-light"><i class="fas fa-print"></i> &nbsp; Print</a>
</div>
<div>
  {{-- <a id="print_it" href="javascript:void(0)" data-id="{{$item_SKU}}" >print</a> --}}
</div>
<table class="table table-bordered">

    <tbody>
        @for ($i = 0; $i < 10; $i++)     
   <tr>
       @for ($r = 0; $r < 4; $r++)
       <td class="text">
        <div>
         
          {!!  '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($item_SKU, "C128") . '" alt="barcode"   />' !!}
          <p >sku-{{$item_SKU}}</p>
        </div>
       

     
        
    {{-- </div> --}}
  </td>
       @endfor
      </tr>
      @endfor
    
      </tr>

    </tbody>
  </table>
    
@endsection
@section('script')
    <script>
      $(document).ready(function(){
        $("a#print_it").click(funciton(){
          alert("sku")
        var sku=  $(this).attr('data-id');
        alert(sku)

        });
      });
    </script>
@endsection