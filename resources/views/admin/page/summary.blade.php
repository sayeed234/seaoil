@extends('admin.master')
@section('title')
@php $world=DB::table('companies')->first(); @endphp
Summary Report || {{$world->name}}
@endsection
@section('content')
<div class="container" style="background-image: url('https://i.pinimg.com/originals/62/63/5b/62635bfd6f5c20e3666f27e015191bde.jpg');">
    <div class="card-header ">
        <form action="{{url('summary')}}" method="get"> 
                @csrf 
             <div class="row">
                        <div class="col-md-12">
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
        <table class="table table-bordered">
        <tbody>
          <tr>
            <th colspan="2" class="text-center"><b><h3>Summary Report</h3></b></th>
          </tr>
          <tr>
            <th colspan="2" class="text-center"><b>Billing Division</b></th>
          </tr>
          <tr >
            <td><b>Total Sale Amount</b></td>
           <td> <b>{{$sale->total}} Tk</b></td>
           </tr> 
           <tr >
            <td><b>Total Supplier Purchase Amount</b></td>
           <td> <b>{{$suppurchase->total}} Tk</b></td>
           </tr>          
           <tr >
            <td><b>Total Ship Purchase Amount</b></td>
           <td> <b>{{$shippurchase->total}} Tk</b></td>
           </tr>
           <tr >
            <td><b>Total Billing Expense Amount</b></td>
           <td> <b>{{$expense->total}} Tk</b></td>
           </tr>
           <tr >
            <td><b>Total Profit Amount</b></td>
            <td> <b>{{$net=$sale->total-($expense->total+$shippurchase->total+$suppurchase->total)}} Tk</b></td>
           </tr>
           <tr >
            <td><b>Total Partner Payment</b></td>
           <td> <b>{{$partnerpayment->total}} Tk</b></td>
           </tr>
           <tr >
            <td><b>Total Company Net Balance</b></td>
           <td> <b>{{$net-$partnerpayment->total}} Tk</b></td>
           </tr>
           <tr>
            <th colspan="2" class="text-center"><b>Sales Division</b></th>
          </tr>
          <tr >
            <td><b>Total Customer Sales Amount</b></td>
           <td> <b>{{$customersale->total}} Tk</b></td>
           </tr>
           <tr >
            <td><b>Total Customer Payment</b></td>
           <td> <b>{{$customerpayment->total}} Tk</b></td>
           </tr>
           <tr >
            <td><b>Total Net Balance</b></td>
           <td> <b>{{$customersale->total-$customerpayment->total}} Tk</b></td>
           </tr>
           <tr>
            <th colspan="2" class="text-center"><b>Purchase Division</b></th>
          </tr>
          <tr >
            <td><b>Total Supplier Purchase Amount</b></td>
           <td> <b>{{$supplierpurchase->total}} Tk</b></td>
           </tr>
           <tr >
            <td><b>Total Supplier Payment</b></td>
           <td> <b>{{$supllierpayment->total}} Tk</b></td>
           </tr>
           <tr >
            <td><b>Total Net Balance</b></td>
           <td> <b>{{$supplierpurchase->total-$supllierpayment->total}} Tk</b></td>
           </tr>           
           <tr>
            <th colspan="2" class="text-center"><b>Expense Division</b></th>
          </tr>
          <tr >
            <td><b>Total Company Expense Amount</b></td>
           <td> <b>{{$companyexpense->total}} Tk</b></td>
           </tr>       
        </tbody>        
      </table>
      <br> <br> <br>
      <form> 
        <input type="button" value="Print" 
               onclick="window.print()" /> 
      </form> 
      <br> <br> <br>     
    </div>
    @endsection