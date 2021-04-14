@extends('admin.master')
@section('title')
 @php $world=DB::table('companies')->first(); @endphp
Supplier  Wise || {{$world->name}}
@endsection
@section('content')
<div class="card shadow">
    <div class="card-header ">
<form action="{{url('/supplierwise')}}" method="get"> 
        @csrf 
     <div class="row">
         <div class="col-md-4 ">
                    <div class="row">
                         <div class="col-md-4">
                        <label style="float: center;">Supplier:</label>
                        </div>
                        <div class="col-md-8" style="float: right;">                     
                            <select name="user" required class="form-control select2bs4" style="width: 100%;">
                             <option value="">Select Supplier</option>
                             @foreach($user as $user)
                             <option value="{{$user->id}}">{{$user->name}} ( {{$user->mobile}} )</option> 
                             @endforeach 
                            </select>           
                        </div>                       
                    </div>
                </div>
                <div class="col-md-8 ">
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
    
    
@if(!$order==0)
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
  <br>  <br>  <br> 
  <div class="table-responsive">
    <table class="table table-bordered  table-sm">
      <tr >
        <th>Name</th>
        <td>{{$users->name}}</td>
      </tr> 
      <tr >
        <th>Mobile</th>
        <td>{{$users->mobile}}</td>
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


<div class="row ">
    <div class="col-md-6">  
 <div class="table-responsive">
    <table  class="table table-bordered  table-sm">
     <thead>
         <tr>
             <td colspan="5"class="text-center"><b>Purchase Report</b></td>
         </tr>
       <tr>
         <th>SL</th>
         <th>Date</th>
         <th>Invoice</th>
         <th>Total Purchase</th>
       </tr>
     </thead>
     <tbody>
     @php $k=1;  $total=0;   @endphp
     @foreach($order as $ex)
       <tr> 
      <td>{{$k++}}</td>                      
      <td>{{ date('d-M-Y', strtotime($ex->created_at))}}  {{ date('h:i a', strtotime($ex->updated_at)) }}</td>                                                  
      <td>#{{$ex->invoice}}</td>
      <td>{{$ex->total}} Tk</td>                                                                          
      </tr>
     @php  $total=$total+$ex->total; @endphp



      @endforeach
      <tr>
          <td colspan="3"><b>Total</b></td>
          <td><b>{{$total}} Tk</b></td>

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
            <th>Payment</th>
          </tr>
        </thead>
        <tbody>
        @php $k=1;  $payment=0;   @endphp
        @foreach($payments as $ex)
          <tr> 
         <td>{{$k++}}</td>                                             
         <td>{{ date('d-M-Y', strtotime($ex->created_at))}}  {{ date('h:i a', strtotime($ex->updated_at)) }}</td>                                               
         <td>{{$ex->payment}} Tk.</td>                                                 
         </tr>
        @php  $payment=$payment+$ex->payment;  @endphp
   
   
         @endforeach
         <tr>
             <td colspan="2"><b>Total</b></td>
             <td><b>{{$payment}} Tk.</b></td>
   
         </tr>
         <tr>
          <td colspan="2"><b>Total Purchase</b></td>
          <td><b>{{$total}} Tk</b></td>  
      </tr>
      <tr>
        <td colspan="2"><b>Due Balance</b></td>
        <td><b>{{$total-$payment}} Tk</b></td>  
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