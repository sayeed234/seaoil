@extends('admin.master')
@section('title')
 @php $world=DB::table('companies')->first(); @endphp
Balance Statement || {{$world->name}}
@endsection
@section('content')
<div class="card shadow">
<div class="card-body">
  <div class="row ">
 <div class="col-md-6">
<h5 class="d-flex justify-content-left">{{$world->name}}</h5>
<h6 class="d-flex justify-content-left">{{$world->address}}</h6>
<h6 class="d-flex justify-content-left">{{$world->phone1}}, {{$world->phone2}}</h6>
</div>
 <div class="col-md-6">    

     <h5 class="d-flex justify-content-left">Partners Balance Statement</h5>
     <h6> Issue: <?php echo date('d-M-Y'); ?></h5>
</div>
</div>
 <div class="table-responsive">
    <table  class="table table-bordered table-sm">
     <thead>
       <tr>
         <th>SL</th>
         <th>Partner</th>
         <th>Mobile</th>
         <th>Total Profit</th>
         <th>Total Payment</th>
         <th>Net Balance</th>
       </tr>
     </thead>
     <tbody>
     @php $k=1;  $total=0; @endphp
     @foreach($partner as $bill)
  @php 
     $sale=DB::table('orders')
           ->where('partner',$bill->id)
           ->where('type',3)
           ->select(DB::raw('SUM(total) as total'))
           ->first();

     $suppurchase=DB::table('orders')
           ->where('partner',$bill->id)
           ->where('type',2)
           ->select(DB::raw('SUM(total) as total'))
           ->first();
    $shippurchase=DB::table('orders')
           ->where('partner',$bill->id)
           ->where('type',1)
           ->select(DB::raw('SUM(total) as total'))
           ->first();
  $expense=DB::table('expenses')
          ->where('partner',$bill->id)
           ->select(DB::raw('SUM(total) as total'))
           ->first();   
           $a=@$sale->total;
           $b=@$suppurchase->total;
           $c=@$shippurchase->total;
           $d=@$expense->total;
           $e=$a-($b+$c+$d);
      $com=DB::table('billings')->where('partner',$bill->id)->select(DB::raw('SUM(com) as t'))->first(); 
        //dd($com);
        $partnerm=0;
        if($e>0){
          $partnerm=$e*$com->t/100;
        }  
      // dd($partnerm);
        $total=$e-$partnerm;
    dd($total);
  $paymentp=DB::table('partnerpayments')
          ->where('partner',$bill->id)
           ->select(DB::raw('SUM(payment) as total'))
           ->first();  

  @endphp
       <tr> 
      <td>{{$k++}}</td>                        
      <td>{{$bill->name}}</td>                        
      <td>{{$bill->mobile}}</td>                                                                                                           
      <td>{{$total}}</td>                                                                                                           
      <td>{{@$paymentp->total}}</td>                                                                                                           
      <td>{{$total-@$paymentp->total}}</td>                                                                                                          
       </tr>
      @endforeach     
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