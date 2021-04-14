@extends('admin.master')
@section('title')
@php $world=DB::table('companies')->first(); @endphp
Company Expense || {{$world->name}}
@endsection
@section('content')
<div class="container-fluid">
    <form enctype="multipart/form-data" action="{{url('/companyexpense_store')}}" method="post">
        @csrf 
              <div class="row">     
              <div class="col-sm-3 form-group">
                  <label>Expense Type</label><br>
                  <select name="type"  required class="form-control select2bs4"   style="width: 100%;">
                   <option value="">Select Type</option>
                 @foreach($expense as $expense)
                   <option  value="{{$expense->id}}">{{$expense->expense_category}}</option>
                   @endforeach
                  </select>
              </div>
               <div class="col-sm-3 form-group">
                  <label>Qty</label>
                  <input class="form-control "  required placeholder="Qty" type="number" min="1" name="qty">             
              </div> 
                <div class="col-sm-3 form-group">
                  <label>Rate</label>
                  <input class="form-control " placeholder="Rate" required type="number" min="1" name="rate">              
              </div> 
              <div class="col-sm-3 form-group">
                <label>Note</label>
                <input class="form-control " placeholder="Note"  type="text" name="note">              
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
          <form enctype="multipart/form-data" action="{{url('/companyexpense_update')}}" method="post" >
            @csrf
        <div class="modal-body">
            <div class="row">           
              <div class="col-sm-12 form-group">
                <label>Expense Type</label><br>
                <select name="type"  required class="form-control select2bs4 type"   style="width: 100%;">
                 <option value="">Select Type</option>
               @foreach($expense2 as $service)
               <option  value="{{$service->id}}">{{$service->expense_category}}</option>
                 @endforeach
                </select>
                <input class="cId" type="hidden" name="id" id="id">
            </div>
             <div class="col-sm-6 form-group">
                <label>Qty</label>
                <input class="form-control qty" required type="number" min="1" name="qty">             
            </div> 
              <div class="col-sm-6 form-group">
                <label>Rate</label>
                <input class="form-control rate"  required type="number" min="1" name="rate">              
            </div>  
            <div class="col-sm-12 form-group">
              <label>Note</label>
              <input class="form-control note" placeholder="Note"  type="text" name="note">              
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
        <div class="card-body">
            <h5 class="text-center">Company Expenses List</h5>
          <div class="table-responsive">
           <table id="example" class="table table-bordered table-sm ">
              <thead>
                <tr >
                  <th>Sl</th>
                  <th>Type</th>
                  <th>Qty</th>
                  <th>Rate</th>              
                  <th>Total</th>
                  <th>Note</th>
                  <th>By</th>
                  <th>Action</th>
           
                </tr>
              </thead>
              <tbody>
            @php $k=1; $total=0;  @endphp
             @foreach($result as $sale)
             @php $user=DB::table('users')->find($sale->user); @endphp
             <tr>
                <td>{{$k++}}</td>             
                <td>{{$sale->expense_category}}</td>
                <td>{{$sale->qty}}</td>
                <td>{{$sale->rate}} Tk</td>
                <td>{{$sale->total}} Tk</td>
                <td>{{$sale->free1}}</td>
                <td>{{@$user->name}}</td>
                <td>                    
                    <a class="btn btn-sm btn-danger" href="{{url('/companyexpense_delete/'.$sale->id)}}" onclick='return confirm("Confirm Delete ??")' ><i class="fas fa-trash-alt"></i></a>
                    <a  class="btn btn-sm btn-primary" href="" onclick= 'edit({{$sale->id}});' data-toggle="modal" id="edit" 
                        data-target="#exampleModalCenter_edit"><i class="far fa-edit"></i></a> 
                   
              </td>
             </tr>
             @php $total=$total+$sale->total @endphp
             @endforeach
             @if(Auth::user()->role==2)
             <tr>              
                 <td colspan="4"><b>Total Expense</b></td>  
                 <td colspan="3"><b>{{$total}} Tk</b></td>

             </tr>
             @endif
              </tbody>
            </table>
          </div>
        </div>
    </div>
        <script>
          function edit(id) {
                  var x =id;
                  
                  $.ajax({
                      type:'GET',
                      url:"{{url('/companyexpense_edit')}}/"+x,
                      success:function(response){
                          console.log(response);
                          $('.type').val(response.type);        
                          $('.qty').val(response.qty);                
                          $('.rate').val(response.rate);                                             
                          $('.note').val(response.free1);                                             
                          $('.cId').val(response.id);
                   
                      },
                          
                  });
              }
          
          </script>

@endsection