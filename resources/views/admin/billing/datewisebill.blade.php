@extends('admin.master')
@section('title')
 @php $world=DB::table('companies')->first(); @endphp
Date Wise Billing || {{$world->name}}
@endsection
@section('content')
<div class="card shadow">
    <div class="card-header ">
<form action="{{url('/datewisebill')}}" method="get"> 
        @csrf 
     <div class="row">
                <div class="col-md-12 ">
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
        <th colspan="2" class="text-center"><h5>Billing Report</h5></th>
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

<div class="col-sm-12 "> 
  <hr style="border:3px dashed rgb(6, 81, 219);">
  </div>
</div>
     <div class="table-responsive" style="font-size: 12px;">
    <table  class="table table-bordered table-sm">
     <thead>
       <tr>
         <th>SL</th>
         <th>Date</th>
         <th>Partner</th>
         <th>Vessel</th>
         <th>Sale</th>
         <th>Sup.Purchase</th>
         <th>Ship Purchase</th>
         <th>Expense</th>
         <th>Profit</th>
         <th>Company</th>
         <th>Partner</th>
       </tr>
     </thead>
     <tbody>
     @php $k=1;  $total=0; @endphp
     @foreach($bill as $bill)
  @php 
     $sale=DB::table('orders')
           ->where('billing',$bill->id)
           ->where('type',3)
           ->select(DB::raw('SUM(total) as total'))
           ->first();
     $suppurchase=DB::table('orders')
           ->where('billing',$bill->id)
           ->where('type',2)
           ->select(DB::raw('SUM(total) as total'))
           ->first();
    $shippurchase=DB::table('orders')
           ->where('billing',$bill->id)
           ->where('type',1)
           ->select(DB::raw('SUM(total) as total'))
           ->first();
  $expense=DB::table('expenses')
          ->where('billing',$bill->id)
           ->select(DB::raw('SUM(total) as total'))
           ->first();
   

  @endphp
       <tr> 
      <td>{{$k++}}</td>
      <td>{{ date('d-M-Y', strtotime($bill->date)) }}</td>                          
      <td>{{$bill->name}} ({{$bill->com}}%) <br> <span style="font-size:12px;">{{$bill->mobile}}</span></td>                                                 
      <td>{{$bill->vessel}} <br> <span style="font-size:12px;">IMO:{{$bill->imo}}</span></td>                                                 
      <td>{{$a=@$sale->total}} Tk</td>                                                 
      <td>{{$b=@$suppurchase->total}} Tk</td>                                                 
      <td>{{$c=@$shippurchase->total}} Tk</td>                                                 
      <td>{{$d=@$expense->total}} Tk</td>                                                 
      <td> {{$e=$a-($b+$c+$d)}} Tk</td> 
      @php 
      $partner=0;
      if($e>0){
        $partner=$e*$bill->com/100;
      }           
      @endphp                                                                                               
      <td>{{$e-$partner}} Tk</td>                                                 
      <td>{{$partner}} Tk</td>                                                 
      </tr>
     @php  $total=$total; @endphp
      @endforeach     
     </tbody>
   </table>
   <form> 
    <input type="button" value="Print" 
           onclick="window.print()" /> 
</form>
 </div>
</div>
@endif
  </div>  
  @endsection