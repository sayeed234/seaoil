@extends('admin.master')
@section('title')
@php $world=DB::table('companies')->first(); @endphp
Purchase #{{$order->invoice}} || {{$world->name}}
@endsection
@section('content')
@php $user=DB::table('users')->find($order->user); @endphp
<div class="container-fluid">
  <div class="row ">
  <div class="col-md-4">
    <img src="{{ asset($world->image) }}" alt="{{ $world->name }}" height="150" width="230" >
    <h6 class="d-flex justify-content-left" style = "font-family:arial;">{{$world->address}}</h6>
<h6 class="d-flex justify-content-left" style = "font-family:arial;">{{$world->phone1}}, {{$world->phone2}}</h6>
  </div>
<div class="col-md-4">
 <br> <br> <br> <br><h4 > <span style="border:5px solid rgb(17, 165, 185); padding:10px;">INVOICE#{{$order->invoice}}</span></h4>
</div>
<div class="col-md-4  ">
  <br>  <br>  <br>
  <div class="table-responsive">
    <table class="table table-bordered  table-sm"> 
      <tr  >
        <th>Name</th>
        <td>{{$order->name}}</td>
      </tr>
      <tr >
        <th>Mobile</th>
        <td>{{$order->mobile}}</td>
      </tr>
      <tr >
        <th>Company</th>
        <td>{{$order->company}}</td>
      </tr>
      <tr >
        <th>Address</th>
        <td>{{$order->address}}</td>
      </tr>
    </table>
  </div>
</div>
    <div class="col-sm-12 "> 
      <hr style="border:2px dashed rgb(6, 81, 219);">
      </div>
    <div class="col-sm-4">Purchase Date: {{ date('d-M-Y', strtotime($order->created_at)) }} </div>
    <div class="col-sm-4">Issue Date: <?php echo date('Y-m-d'); ?>  </div>
    <div class="col-sm-4">Biller Name: {{$user->name}} </div>
    <div class="col-sm-12 "> 
      <hr style="border:2px dashed rgb(6, 81, 219);">
      </div>
    <div class="col-sm-12 ">
        <div class="table-responsive">
            <table class="table table-bordered  table-sm">
               <thead>
                <tr >
                       <td colspan="5" class="text-center"><b>Purchase Details</b></td>
                   </tr>
                 <tr>
                   <th>Sl</th>
                   <th>Name</th>
                   <th>Rate</th>
                   <th>Qty</th>
                   <th>Total</th>
                 </tr>
               </thead>
               <tbody>
               @php $sl=1; $sum=0; @endphp
               @foreach($details as $p)
               <tr>
               <td>{{$sl++}}</td>
               <td>{{$p->name}}</td>
               <td>{{$p->rate}} Tk</td>
               <td>{{$p->qty}} {{$p->unit}}</td>
               <td>{{$p->total}} Tk</td>
               </tr>
               @php  $sum=$sum+$p->total; @endphp
               @endforeach
               <tr>
                   <td colspan="4" class="text-right"><b>Total Purchase</b></td>
                   <td  ><b>{{$sum}} Tk.</b></td>
               </tr>
               <tr>
                <td colspan="4" class="text-right"><b>Total Payment</b></td>
                <td >@if($payment)<b>{{$payment->payment}} Tk @else  <b>0000 Tk.</b> @endif</b></td>
              </tr>
              <tr>
                <td colspan="4" class="text-right"><b>Payable Amount</b></td>
                <td > @if($payment)<b>{{$sum-$payment->payment}} Tk @else <b>{{$sum}} Tk.</b>  @endif</b></td>
              </tr>
               </tbody>
            </table>
        </div>
        <br><br>
<br>
<br>
<br>
    </div>
<br>

<div class="col-sm-3 text-center">
 <u>Prepared By</u> <br>{{$user->name}}
</div>
<div class="col-sm-3 text-center">
 <u>Director</u> <br>{{$world->owner}}
</div>
<div class="col-sm-3 text-center">
  <u>Accountant</u>
</div>
<div class="col-sm-3 text-center">
 <u>Customer</u> <br>{{$order->name}}
</div>
<br>
<br>
<br>
<br>
<br>
<br>

  <form> 
    <input type="button" value="Print" 
           onclick="window.print()" /> 
  </form>


  </div>
</div>






@endsection