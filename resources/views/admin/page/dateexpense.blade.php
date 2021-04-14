@extends('admin.master')
@section('title')
 @php $world=DB::table('companies')->first(); @endphp
Date Wise Billing || {{$world->name}}
@endsection
@section('content')
<div class="card shadow">
    <div class="card-header ">
<form action="{{url('/dateexpense')}}" method="get"> 
        @csrf 
     <div class="row">
                <div class="col-md-4 ">
                  <div class="row">
                      <div class="col-md-4">
                          <label style="float: center;">User:</label>
                      </div>
                  <div class="col-md-8">
                      <select class="form-control select2bs4"  name="user">
                        <option class="form-control" value="0">Select Partner</option>
                        @foreach($user as $part)
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
    
  @if(!$expense)

  @else
  <div class="card-body">
    <div class="row ">
      <div class="col-md-2 text-right">
        <img src="{{ asset($world->image) }}" alt="{{ $world->name }}" height="110" width="140" >
      </div>
   <div class="col-md-6">
     <br>
  <h3 class="d-flex justify-content-left" style = "font-family:courier,arial,helvetica;"><b>{{$world->name}}</b></h3>
  <h6 class="d-flex justify-content-left" style = "font-family:arial;">{{$world->address}}</h6>
  <h6 class="d-flex justify-content-left" style = "font-family:arial;">{{$world->phone1}}, {{$world->phone2}}</h6>
  </div>
   <div class="col-md-4 vl ">
     <br>
       <h4 class="d-flex justify-content-left">{{$parts}}</h4>
       <h6 class="d-flex justify-content-left"> Issue: <?php echo date('d-M-Y'); ?></h5>
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
         <th>Date</th>
         <th>Total</th>
       </tr>
     </thead>
     <tbody>
     @php $k=1;  $total=0; @endphp
     @foreach($expense as $bill)
       <tr> 
      <td>{{$k++}}</td>                        
      <td>{{ date('d-M-Y', strtotime($bill->created_at)) }}</td>                                               
      <td>{{$bill->total}} Tk</td>
      @php $total=$total+$bill->total; @endphp                      
    </tr> 
      @endforeach  
         <tr>
             <td colspan="2"><b>Total Expense</b></td>
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
@endif
  </div>  
  @endsection