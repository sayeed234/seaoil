@extends('admin.master')
@section('title')
@php $world=DB::table('companies')->first(); @endphp
Billing #{{$bill->billing}} || {{$world->name}}
@endsection
@section('content')
@php $user=DB::table('users')->find($bill->user); @endphp

<div class="container-fluid">
  <div class="row ">
    <div class="col-sm-4" style="margin-top: -5px;"> 
      <img src="{{ asset($world->image) }}" alt="{{ $world->name }}" height="150" width="230" >
       <p style = "font-family:arial;">{{$world->address}} <br> {{$world->phone1}} {{$world->phone2}}</p>
    </div>   
    <div class="col-sm-4 text-center"> <br><br><br> <br><h4 > <span style="border:5px solid rgb(136, 169, 173); padding:10px;">INVOICE#{{$bill->billing}}</span></h4> </div>
    <div class="col-sm-4 ">
      <br>  <br>  <br>
      <div class="table-responsive">
        <table class="table table-bordered  table-sm"> 
          <tr  >
            <th>Name</th>
            <td>{{$bill->name}}</td>
          </tr>
          <tr >
            <th>Mobile</th>
            <td>{{$bill->mobile}}</td>
          </tr>
          <tr >
            <th>Vessel</th>
            <td>{{$bill->vessel}}</td>
          </tr>
          <tr >
            <th>IMO</th>
            <td>{{$bill->imo}}</td>
          </tr>
        </table>
      </div>
    </div>
    <div class="col-sm-12 "> 
      <hr style="border:3px dashed rgb(6, 81, 219);">
    </div>
    <div class="col-sm-4">Billing Date: {{ date('d-M-Y', strtotime($bill->date)) }} </div>
    <div class="col-sm-4">Issue Date: <?php echo date('d-M-Y'); ?>  </div>
    <div class="col-sm-4">Biller Name: {{$user->name}} </div>
    <div class="col-sm-12 "> 
      <hr style="border:3px dashed rgb(6, 81, 219);">
      </div>
    <div class="col-sm-6 ">
        <div class="table-responsive">
            <table class="table table-bordered  table-sm ">
               <thead>
                <tr>
                  <td colspan="5" class="text-center"><b>Ship Purchase</b></td>
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
               @foreach($shippurchase as $p)
               <tr>
               <td>{{$sl++}}</td>
               <td>{{$p->pname}}</td>
               <td>{{$p->rate}} Tk</td>
               <td>{{$p->qty}} {{$p->unit}}</td>
               <td>{{$p->total}} Tk</td>
               </tr>
               @php  $sum=$sum+$p->total; @endphp
               @endforeach
               <tr>
                   <td colspan="4"><b>Total Ship To Purchase</b></td>
                   <td ><b>{{$a=$sum}} Tk.</b></td>
               </tr>
               </tbody>
            </table>
        </div>
    </div>
    <div class="col-sm-6 ">
        <div class="table-responsive">
            <table class="table table-bordered  table-sm">
               <thead>
                <tr >
                       <td colspan="5" class="text-center"><b>Supplier Purchase</b></td>
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
               @foreach($supplierpurchase as $p)
               <tr>
               <td>{{$sl++}}</td>
               <td>{{$p->pname}}</td>
               <td>{{$p->rate}} Tk</td>
               <td>{{$p->qty}} {{$p->unit}}</td>
               <td>{{$p->total}} Tk</td>
               </tr>
               @php  $sum=$sum+$p->total; @endphp
               @endforeach
               <tr>
                   <td colspan="4"><b>Total Suppliers To Purchase</b></td>
                   <td ><b>{{$b=$sum}} Tk</b></td>
               </tr>
               </tbody>
            </table>
        </div>
    </div>
    <div class="col-sm-6 ">
        <div class="table-responsive">
            <table class="table table-bordered  table-sm">
               <thead>
                <tr >
                       <td colspan="5" class="text-center"><b> Sales</b></td>
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
               @foreach($shipsale as $p)
               <tr>
               <td>{{$sl++}}</td>
               <td>{{$p->pname}}</td>
               <td>{{$p->rate}} Tk</td>
               <td>{{$p->qty}} {{$p->unit}}</td>
               <td>{{$p->total}} Tk</td>
               </tr>
               @php  $sum=$sum+$p->total; @endphp
               @endforeach
               <tr>
                   <td colspan="4"><b>Total Ship Sales</b></td>
                   <td ><b>{{$c=$sum}} Tk</b></td>
               </tr>
               </tbody>
            </table>
        </div>
    </div>
    <div class="col-sm-6 ">
        <div class="table-responsive">
            <table class="table table-bordered  table-sm">
               <thead>
                   <tr >
                       <td colspan="5" class="text-center"><b>Expenses</b></td>
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
               @php $sl=1; $sum=0; $pp=0; @endphp
               @foreach($expensebill as $p)
               <tr>
               <td>{{$sl++}}</td>
               <td>{{$p->expense_category}}</td>
               <td>{{$p->rate}} Tk</td>
               <td>{{$p->qty}}</td>
               <td>{{$p->total}} Tk</td>
               </tr>
               @php  $sum=$sum+$p->total;  @endphp
               @endforeach
               <tr>
                   <td colspan="4"><b>Total Expenses</b></td>
                   <td ><b>{{$d=$sum}} Tk.</b></td>
               </tr>
               </tbody>
            </table>
        </div>
    </div>
    <div class="col-sm-6 ">
      <div class="table-responsive">
          <table class="table table-bordered  table-sm">
             <thead>
                 <tr >
                     <td colspan="2" class="text-center"><b>Avarage Profit / Loss</b></td>
                 </tr>
             </thead>
             <tbody>            
             <tr>
                 <td><b>Total Cash In</b> </td>
                 <td><b>{{$c}} Tk.</b></td>
             </tr>
             <tr>
              <td><b>Total Cash Out</b> </td>
              <td><b>{{$e=$a+$b+$d}} Tk.</b></td>
            </tr>
       
            @if($c-$e>0)
            <tr >
            <td><b>Total Profit </b> </td>
            <td style="color:rgb(22, 6, 236);"><b>{{$pp=$c-$e}} Tk.</b></td>
          </tr>
           @else  
           <tr >
            <td><b>Total Loss </b> </td>
            <td style="color:red;"><b>{{$e-$c}} Tk.</b></td>
          </tr>
           @endif

             </tbody>
          </table>
      </div>
  </div>
  <div class="col-sm-6 ">
    <div class="table-responsive">
        <table class="table table-bordered  table-sm">
           <thead>
               <tr >
                   <td colspan="2" class="text-center"><b> Profit Share </b></td>
               </tr>
           </thead>
           <tbody> 
       
             @php 
                $com=($pp*$bill->com)/100;          
               
              @endphp  
                 
           <tr>
               <td><b>Company Profit</b> </td>
               <td><b>{{$companyprofit=$pp-$com}} Tk.</b></td>
           </tr>
           <tr>
            <td><b>Partner Share ({{$bill->com}}%)</b> </td>
            <td><b>{{$com}} Tk.</b></td>
          </tr>    
     

           </tbody>
        </table>
    </div>
    
<br>
<br>
<br>
<br>
</div>
<br><br>
<br>
<br>
<br>
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
 <u>Partner</u> <br>{{$bill->name}}
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<div class="col-sm-3 text-center"></div>
<div class="col-sm-3 text-center">
  <form> 
    <input type="button" value="Print" 
           onclick="window.print()" /> 
  </form>
</div>
@php $profit=DB::table('pprofits')->where('billing',$bill->id)->first(); @endphp
<div class="col-sm-3 text-center">
  @if(!$profit)
  <form action="{{url('/confirm_bill')}}" method="post">
      @csrf 
    <input type="hidden" value="{{$com}}" name="partnerprofit">
    <input type="hidden" value="{{$companyprofit}}" name="companyprofit">
    <input type="hidden" value="{{$bill->id}}" name="bill">
  <input type="submit" class="btn btn-info" onclick='return confirm("Confirm  This Billing  Finish??")'value="Confirm Billing"/>

</form>
@endif
<br>
<br></div>

<div class="col-sm-3 text-center"></div>

  </div>
</div>






@endsection