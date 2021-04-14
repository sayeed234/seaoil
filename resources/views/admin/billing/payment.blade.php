@extends('admin.master')
@section('title')
@php $world=DB::table('companies')->first(); @endphp
Billing #{{$bill->billing}} || {{$world->name}}
@endsection
@section('content')
<div class="container-fluid">
    <form enctype="multipart/form-data" action="{{url('/billing_payment_store')}}" method="post">
        @csrf 
              <div class="row">     
                <div class="col-sm-4 form-group">
                    <label>Select Type</label><br>
                    <select name="type"  required class="form-control select2bs4"   style="width: 100%;">
                     <option value="">Select Type</option>
                     <option value="cashin">Cash in</option>
                     <option value="cashout">Cash out</option>
                     
                    </select>
                </div>
               <div class="col-sm-3 form-group">
                  <label>Payment</label>
                  <input class="form-control "  required placeholder="Payment Amount" type="number" min="0" name="payment">             
              </div> 
                <div class="col-sm-5 form-group">
                  <label>Note</label>
                  <input class="form-control " placeholder="Note Payment"  type="text"name="note">              
              </div> 
              <input  type="hidden" name="billing" value="{{$bill->id}}">
              <input  type="hidden" name="billno" value="{{$bill->billing}}">
         </div>        
          <div class="modal-footer">
              <button type="submit" class="btn btn-success">Submit</button>
          </div>
      </form>
    </div> 
    <div class="modal fade" id="exampleModalCenter_edit" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"> Update</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
          <form enctype="multipart/form-data" action="{{url('/billing_expense_update')}}" method="post" >
            @csrf
        <div class="modal-body">
                <div class="row">        
            
             <div class="col-sm-6 form-group">
                <label>Qty</label>
                <input class="form-control qty" required type="number" min="1" name="qty">             
            </div> 
              <div class="col-sm-6 form-group">
                <label>Rate</label>
                <input class="form-control rate"  required type="number" min="1" name="rate">              
            </div>          
                </div>
               </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Update</button>
        </div>
    </form>
    </div>
    </div>
    </div>
    <br> 
    <div class="card shadow">
        <div class="card-header ">
        <div class="row">
            <div class="col-md-3"><h5 class="m-0 font-weight-bold ">Expense List</h5></div>  
            <div class="col-md-3"><h6 class="m-0 font-weight-bold ">Partner: </h6> {{$bill->name}}</div>   
            <div class="col-md-3"><h6 class="m-0 font-weight-bold ">Vessel: </h6>{{$bill->vessel}}</div>   
            <div class="col-md-3"><h6 class="m-0 font-weight-bold ">IMO : </h6>{{$bill->imo}}</div>   
            
        </div> 
        </div> 
        <div class="card-body">
          <div class="table-responsive">
           <table class="table table-bordered table-sm ">
              <thead>
                <tr >
                  <th>Sl</th>
                  <th>Date</th>
                  <th>Type</th>
                  <th>Amount</th>              
                  <th>Total</th>
                  <th>Action</th>
           
                </tr>
              </thead>
              <tbody>
                  @php $k=1; $total=0;  @endphp
                  @foreach($payment as $sale)
             <tr>
                <td>{{$k++}}</td>             
                <td>{{ date('d-M-Y', strtotime($sale->created_at)) }}</td>
                <td>{{$sale->type}}</td>
                @if($sale->type=='cashin')
                <td>+{{$sale->payment}} Tk</td>
                @else  
                <td>-{{$sale->payment}} Tk</td>
                @endif
                <td>{{$sale->note}}</td>
                <td>                    
                    <a class="btn btn-sm btn-danger" href="{{url('/billing_expense_delete/'.$sale->id)}}" onclick='return confirm("Confirm Delete ??")' ><i class="fas fa-trash-alt"></i></a>                   
              </td>
             </tr>
             @php $total=$total+$sale->total @endphp
             @endforeach
             <tr>              
                 <td colspan="4"><b>Total Expense</b></td>  
                 <td colspan="2"><b>{{$total}} TK.</b></td>

             </tr>
              </tbody>
            </table>
          </div>
        </div>
        <script>
          function edit(id) {
                  var x =id;
                  
                  $.ajax({
                      type:'GET',
                      url:"{{url('/billing_expense_edit')}}/"+x,
                      success:function(response){
                          console.log(response);
                          $('.operation').val(response.operation);        
                          $('.qty').val(response.qty);                
                          $('.rate').val(response.rate);                                             
                          $('.cId').val(response.id);
                   
                      },
                          
                  });
              }
          
          </script>

@endsection