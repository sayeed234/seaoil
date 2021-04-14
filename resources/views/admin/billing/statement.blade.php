@extends('admin.master')
@section('title')
 @php $world=DB::table('companies')->first(); @endphp
  Billing Statement|| {{$world->name}}
@endsection
@section('content')
<div class="card shadow">
    <div class="card-header ">
<form action="{{url('/partnerstatement')}}" method="get"> 
        @csrf 
     <div class="row">
                <div class="col-md-4 ">
                  <div class="row">
                      <div class="col-md-4">
                          <label style="float: center;">Partner:</label>
                      </div>
                  <div class="col-md-8">
                      <select class="form-control select2bs4" required name="partner">
                        <option class="form-control"   value="1">Select Partner</option>
                        @foreach($partner as $part)
                        <option class="form-control" value="{{$part->id}}">{{$part->name}} ({{$part->mobile}})</option>
                        @endforeach
                      </select>
                      </div>                    
                    </div>
                  </div>
                <div class="col-md-8">
                    <div class="row">
                     <div class="col-md-1">
                            <label style="float: center;">From:</label>
                        </div>
                        <div class="col-md-4" style="float: right;">
                            <input type="date"  required  name="fromDate" value="{{$fromDate}}" class="form-control "/>
                        </div>
                        <div class="col-md-1"><label>To:</label></div>
                        <div class="col-md-4 "><input type="date" value="<?php echo date('Y-m-d'); ?>"class="form-control" name="toDate"
                            /></div>
                        <div class="col-md-2 "><input type="submit" class="btn btn-success" value="Load"/>
                        </div>
                    </div>
                </div>
            </div>
            </form>  
    </div>    
    
  @if(!$bill)

  @else
 
  <div class="card-body">
    <div class="row ">
      <div class="col-sm-4" style="margin-top: -5px;"> 
        <img src="{{ asset($world->image) }}" alt="{{ $world->name }}" height="150" width="230" >
         <p style = "font-family:arial;">{{$world->address}} <br> {{$world->phone1}} {{$world->phone2}}</p>
      </div>   
      <div class="col-sm-4 text-center"> </div>
      <div class="col-sm-4 ">
        <br>  <br>  <br>
        <div class="table-responsive">
          <table class="table table-bordered  table-sm"> 
            <tr  >
              <th>Name</th>
              <td>{{$partss->name}}</td>
            </tr>
            <tr >
              <th>Mobile</th>
              <td>{{$partss->mobile}}</td>
            </tr>
            <tr >
              <th>Issue Date</th>
              <td><?php echo date('d-M-Y'); ?></td>
            </tr>
            <tr >
              <th>Created By</th>
              <td>{{Auth::user()->name}}</td>
            </tr>
          </table>
        </div>
      </div>
      <div class="col-sm-12 "> 
        <hr style="border:3px dashed rgb(6, 81, 219);">
      </div>
    </div>
<div class="row ">
    <div class="col-md-6">
 <div class="table-responsive">
    <table  class="table table-bordered table-sm">
     <thead>
        <tr>
            <td colspan="5" class="text-center"><b>Profit Report</b></td>
        </tr>
       <tr>
         <th>SL</th>
         <th>Billing</th>
         <th>Date</th>
         <th>Vessel</th>
         <th>Profit</th>
       </tr>
     </thead>
     <tbody>
     @php $k=1;  $total=0; @endphp
     @foreach($bill as $bill)
  @php 
     $invoice=DB::table('billings')->find($bill->billing);
  @endphp
       <tr> 
      <td>{{$k++}}</td>                        
      <td>#{{@$invoice->billing}}</td>                        
      <td>{{ date('d-M-Y', strtotime($bill->created_at)) }}</td>                                               
      <td>{{$bill->vessel}} <br> <span style="font-size:12px;">IMO:{{$bill->imo}}</span></td>
      <td>{{$bill->profit}} Tk</td>                                                                                              

     @php  $total=$total+$bill->profit; @endphp
      @endforeach 
      <tr>
      <td colspan="4"><b>Total Profit</b></td>     
      <td ><b>{{$total}} Tk</b></td>     
    </tr>    
     </tbody>
   </table>
   <form> 
    <input type="button" value="Print" 
           onclick="window.print()" /> 
</form>
 </div>
 </div>

 <div class="col-md-6">  
    <div class="table-responsive">
       <table  class="table table-bordered  table-sm">
        <thead>
            <tr>
                <td colspan="5" class="text-center"><b>Payment Report</b></td>
            </tr>
          <tr>
            <th>SL</th>
            <th>Date</th>
            <th>By</th>
            <th>Payment</th>
          </tr>
        </thead>
        <tbody>
        @php $k=1;  $paymentb=0;   @endphp
        @foreach($payment as $ex)
        @php $user=DB::table('users')->find($ex->user); @endphp
          <tr> 
         <td>{{$k++}}</td>                                             
         <td>{{ date('d-M-Y', strtotime($ex->created_at))}}  {{ date('h:i a', strtotime($ex->updated_at)) }}</td>                                               
         <td>{{@$user->name}}</td>                                                 
         <td>{{$ex->payment}} Tk</td>                                                 
         </tr>
        @php  $paymentb=$paymentb+$ex->payment;  @endphp
   
   
         @endforeach
         <tr>
             <td colspan="3"><b>Total</b></td>
             <td><b>{{$paymentb}} Tk</b></td>
   
         </tr>
         <tr>
          <td colspan="3"><b>Net Balance</b></td>
          <td><b>{{$total-$paymentb}} Tk</b></td>

      </tr>
        </tbody>
      </table>
    </div>
   </div>
 
</div>
</div>
@endif
  </div>  
  @endsection