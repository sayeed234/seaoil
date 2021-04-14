@extends('admin.master')
@section('title')
@php $world=DB::table('companies')->first(); @endphp
Loan List || {{$world->name}}
@endsection
@section('content')

<div class="page-content fade-in-up">
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Create Loan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form enctype="multipart/form-data" action="" method="post">
      @csrf
        <div class="modal-body">
            <div class="row">     
                <div class="col-sm-12 form-group">
                    <label>Name</label>
                    <input class="form-control" placeholder="Bank / People Name"  required type="text"  name="name">
                </div> 
                <div class="col-sm-12 form-group">
                    <label>Mobile / ACC</label>
                    <input class="form-control"  required type="number" placeholder="ACC / Mobile Number"  name="mobile">
                </div>
                <div class="col-sm-12 form-group">
                    <label>Address</label>
                    <input class="form-control"   type="text" placeholder="Address / Bank Details"  name="address">
                </div>           
            <div class="col-sm-7 form-group">
                <label>Status</label>
                <select name="status"   class="form-control  " style="width: 100%;">
                    <option value="1">Cash in</option>
                    <option value="2">Cash out</option>
                   </select>
            </div>          
            <div class="col-sm-5 form-group">
                <label>Amount</label>
                <input class="form-control " required  type="number" min="0"  name="amount">
            </div>
            </div>
           </div>
        <div class="modal-footer">
            <button type="reset" class="btn btn-primary" >Clear</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </form>
    </div>
    </div>
    </div>
    
    {{-- Edit slider Modal --}}
    
    <div class="modal fade" id="exampleModalCenter_edit" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"> Update</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
          <form enctype="multipart/form-data" action="" method="post" >
            @csrf
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-12 form-group">
                    <label>Name</label>
                    <input class="form-control name"   required type="text"  name="name">
                    <input class="cId" type="hidden" name="id" id="id">
                </div> 
                <div class="col-sm-12 form-group">
                    <label>Mobile</label>
                    <input class="form-control mobile"  required type="number"  name="mobile">
                </div>
                <div class="col-sm-12 form-group">
                    <label>Address</label>
                    <input class="form-control address"   type="text"  name="address">
                </div>          
                <div class="col-sm-7 form-group">
                    <label>Status</label>
                    <select name="status"   class="form-control status " style="width: 100%;">
                        <option value="1">Cash in</option>
                        <option value="2">Cash out</option>
                       </select>
                </div>          
                <div class="col-sm-5 form-group">
                    <label>Amount</label>
                    <input class="form-control amount" required  type="number" min="0"  name="amount">
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
    </div>
    <div class="card shadow">
        <div class="card-header ">
        <div class="row">
            <div class="col-md-6"><h5 class="m-0 font-weight-bold ">Expense List</h5></div>   
            <div class="col-md-6">
                    <button type="button" class="btn btn-info btn-sm fa-pull-right" data-toggle="modal" data-target="#exampleModalCenter" >
                        Add Expense
                </button>
            </div>
        </div> 
        </div> 
        <div class="card-body">
          <div class="table-responsive">
           <table id="example" class="table table-bordered table-hover ">
              <thead>
                <tr>
                  <th>Created</th>
                  <th>Name</th>
                  <th>Mobile</th>
                  <th>Address</th>
                  <th>Updated</th>                
                  <th>Status</th>
                  <th>Amount</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                  @php $sl=1; @endphp
              @foreach($data as $blog)
             <tr>

              <td>{{$sl++}}</td>
              <td>{{$blog->name}}</td>
              <td>{{$blog->mobile}}</td>
              <td>{{$blog->address}}</td>
              <td>{{ date('d-M-Y', strtotime($blog->updated_at)) }} {{ date('h:i a', strtotime($blog->updated_at)) }}</td>
              <td>@if($blog->status==1) <span style="color:green">Cash In</span> @else <span style="color:rgb(206, 10, 10)">Cash Out</span>  @endif</td>
              <td>{{$blog->amount}}</td>
              <td> <div class="dropdown show">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    </a>
    
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="" onclick= 'edit({{$blog->id}});' data-toggle="modal" id="edit" 
                            data-target="#exampleModalCenter_edit"> Edit</a>                   
                       <a  class="dropdown-item"  href="{{url('admin/loan_delete/'.$blog->id)}}" onclick='return confirm("Confirm Delete ??")' >Delete</a>
                    </div>
                    </div>
                </td>
               </tr>
             </tr>
             @endforeach
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
                  url:"{{url('/loan_edit')}}/"+x,
                  success:function(response){
                      console.log(response);
                      $('.name').val(response.name);
                      $('.mobile').val(response.mobile);
                      $('.address').val(response.address);
                      $('.amount').val(response.amount);
                      $('.status').val(response.status);
    
                      $('.cId').val(response.id);
               
                  },
                      
              });
          }
      
      </script>
      
@endsection