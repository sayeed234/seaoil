@extends('admin.master')
@section('title')
@php $world=DB::table('companies')->first(); @endphp
Suppliers Payment || {{$world->name}}
@endsection
@section('content')
<div class="container-fluid">
    <form enctype="multipart/form-data" action="{{url('/spayment_store')}}" method="post">
        @csrf 
              <div class="row">     
                <div class="col-sm-4 form-group">
                    <label>Select Supplier</label><br>
                    <select name="supplier"  required class="form-control select2bs4"   style="width: 100%;">
                     <option value="">Select Supplier</option>
                     @foreach($customer as $customer)
                     <option value="{{$customer->id}}">{{$customer->name}} ( {{$customer->mobile}} )</option>
                     @endforeach                     
                    </select>
                </div>
               <div class="col-sm-3 form-group">
                  <label>Payment</label>
                  <input class="form-control "  required placeholder="Payment Amount" type="number" min="0" name="payment">             
              </div>             
              <div class="col-sm-4 form-group">
                <label>Note</label>
                <input class="form-control "   placeholder="Payment Note"  name="note">             
            </div> 
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
          <form enctype="multipart/form-data" action="{{url('/spayment_update')}}" method="post" >
            @csrf
        <div class="modal-body">
            <div class="row">           
                <div class="col-sm-12 form-group">
                    <label>Select Supplier</label><br>
                    <select name="supplier"  required class="form-control select2bs4 supplier"   style="width: 100%;">
                     <option value="">Select Supplier</option>
                     @foreach($customer2 as $customer)
                     <option value="{{$customer->id}}">{{$customer->name}} ( {{$customer->mobile}} )</option>
                     @endforeach
                     <input class="cId" type="hidden" name="id" id="id">
                    </select>
                </div>
             <div class="col-sm-12 form-group">
                <label>Payment Amount</label>
                <input class="form-control payment" required type="number" min="1" name="payment">             
            </div>  
            <div class="col-sm-12 form-group">
                <label>Note</label>
                <input class="form-control note"   placeholder="Payment Note"  name="note">             
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
            <h5 class="text-center">Supplier Payment List</h5>
        </div> 
        <div class="card-body">
          <div class="table-responsive">
           <table id="example" class="table table-bordered table-sm ">
              <thead>
                <tr >
                  <th>Sl</th>
                  <th>Supplier</th>
                  <th>Mobile</th>
                  <th>Date</th>
                  <th>By</th>
                  <th>Amount</th>              
                  <th>Note</th>              
                  <th>Action</th>           
                </tr>
              </thead>
              <tbody>
                  @php $k=1;  @endphp
                  @foreach($payment as $sale)
                  @php $user=DB::table('users')->find($sale->user); @endphp
             <tr>
                <td>{{$k++}}</td>  
                <td>{{$sale->name}}</td>
                <td>{{$sale->mobile}}</td>
                <td>{{ date('d-M-Y', strtotime($sale->created_at)) }} {{ date('h:i a', strtotime($sale->updated_at)) }}</td>
                <td>{{@$user->name}}</td>
                <td>{{$sale->payment}} Tk</td>
                <td>{{$sale->free2}}</td>
                <td>                    
                    <a  class="btn btn-sm btn-primary" href="" onclick= 'edit({{$sale->id}});' data-toggle="modal" id="edit" 
                        data-target="#exampleModalCenter_edit"><i class="far fa-edit"></i></a> 
                    <a class="btn btn-sm btn-danger" href="{{url('/spayment_delete/'.$sale->id)}}" onclick='return confirm("Confirm Delete ??")' ><i class="fas fa-trash-alt"></i></a>                   
              </td>
             </tr>
           
             @endforeach
         
              </tbody>
            </table>
          </div>
        </div>
        <script>
          function edit(id) {
                  var x =id;
                  
                  $.ajax({
                      type:'GET',
                      url:"{{url('/spayment_edit')}}/"+x,
                      success:function(response){
                          console.log(response);
                          $('.supplier').val(response.supplier);        
                          $('.payment').val(response.payment);                                                         
                          $('.note').val(response.free2);                                                         
                          $('.cId').val(response.id);
                   
                      },
                          
                  });
              }
          
          </script>

@endsection