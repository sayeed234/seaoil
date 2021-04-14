@extends('admin.master')
@section('title')
 @php $world=DB::table('companies')->first(); @endphp
Balance  Report || {{$world->name}}
@endsection
@section('content')
<div class="card shadow">   
  <div class="card-body">
    <div class="row ">
      <div class="col-md-4 text-left">
        <img src="{{ asset($world->image) }}" alt="{{ $world->name }}" height="150" width="230" >
        <h6 class="d-flex justify-content-left" style = "font-family:arial;">{{$world->address}}</h6>
       <h6 class="d-flex justify-content-left" style = "font-family:arial;">{{$world->phone1}}, {{$world->phone2}}</h6>
      </div>
      <div class="col-md-4">
      </div>
   <div class="col-md-4 "> 
    <br>  <br>  <br><br>  
    <div class="table-responsive">
      <table class="table table-bordered  table-sm"> 
        <tr  >
          <th colspan="2" class="text-center"><h5>Balance Report</h5></th>
        </tr>
        <tr >
          <th>Issue Date</th>
          <td><?php echo date('d-M-Y'); ?></td>
        </tr>
        <tr >
          <th>Created By</th>
          <td>{{Auth::user()->name}} </td>
        </tr>
      </table>
    </div> 
  </div>
  </div>
  <div class="col-sm-12 "> 
    <hr style="border:2px dashed rgb(6, 81, 219);">
    </div>
 
 <div class="table-responsive">
    <table  class="table table-bordered table-sm">
     <thead>
       <tr>
         <th>SL</th>
         <th>Name</th>
         <th>Mobile</th>
         <th>Total Sale</th>
         <th>Received  Payment</th>
         <th>Net Balance</th>
       </tr>
     </thead>
     <tbody>
     @php $k=1;  $total=0; $re=0; @endphp
     @foreach($balance as $ex)
       @php
         $payment=DB::table('cpayments')      
                ->where('customer',$ex->id)         
                ->select(DB::raw('SUM(payment) as total'))
                ->first();        
       @endphp
       <tr> 
      <td>{{$k++}}</td>                      
      <td>{{$ex->name}}</td>                                                 
      <td>{{$ex->mobile}}</td>                                                 
      <td>{{$ex->total}} Tk</td>                                                 
      <td>{{@$payment->total}} Tk</td>                                                 
      <td>{{$ex->total-@$payment->total}} Tk</td>                                              
                                              
      </tr>
     @php  $total=$total+$ex->total; @endphp
     @php  $re=$re+@$payment->total; @endphp

      @endforeach
      <tr>
          <td colspan="3"><b>Total</b></td>
          <td><b>{{$total}} TK</b></td>
          <td><b>{{$re}} TK</b></td>
          <td><b>{{$total-$re}} TK</b></td>

      </tr>
     </tbody>
   </table>
   <form> 
    <input type="button" value="Print" 
           onclick="window.print()" /> 
</form>
 </div>
</div>

  </div>  
  @endsection