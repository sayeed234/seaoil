@extends('admin.master')
@section('title')
@php $world=DB::table('companies')->first(); @endphp
Customer || {{$world->name}}
@endsection
@section('content')

<div class="page-content fade-in-up">
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog   modal-dialog-centered" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Create Customer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form enctype="multipart/form-data" action="{{url('/customer_store')}}" method="post">
      @csrf
        <div class="modal-body">
            <div class="row">     
                <div class="col-sm-12 form-group">
                    <label>Name</label>
                    <input class="form-control" placeholder="Name"  required type="text"  name="name">
                </div> 
                <div class="col-sm-12 form-group">
                    <label>Mobile </label>
                    <input class="form-control"  required type="number" min="0" placeholder="Mobile Number"  name="mobile">
                </div>
                <div class="col-sm-12 form-group">
                    <label>Address</label>
                    <input class="form-control" required  type="text" placeholder="Address"  name="address">
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
          <form enctype="multipart/form-data" action="{{url('/customer_update')}}" method="post" >
            @csrf
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-12 form-group">
                    <label>Name</label>
                    <input class="form-control name"   required type="text"  name="name">
                    <input class="cId" type="hidden" name="id" id="id">
                </div> 
                <div class="col-sm-12 form-group">
                    <label>Mobile </label>
                    <input class="form-control mobile"  required type="number" min="0" placeholder="Mobile Number"  name="mobile">
                </div>

                <div class="col-sm-12 form-group">
                    <label>Address</label>
                    <input class="form-control address" required  type="text" placeholder="Address"  name="address">
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
            <div class="col-md-6"><h5 class="m-0 font-weight-bold ">Customer List</h5></div>   
            <div class="col-md-6">
                    <button type="button" class="btn btn-info btn-sm fa-pull-right" data-toggle="modal" data-target="#exampleModalCenter" >
                        New Customer
                </button>
            </div>
        </div> 
        </div> 
        <div class="card-body">
          <div class="table-responsive">
           <table id="example" class="table table-bordered table-hover ">
              <thead>
                <tr>
                  <th>SL</th>
                  <th>Name</th>
                  <th>Mobile</th>
                  <th>Address</th>
                  <th>Join</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                  @php $f=1; @endphp
          @foreach($customer as $party)
             <tr>               
              <td>{{$f++}} </td>
              <td>{{$party->name}} </td>
              <td>{{$party->mobile}}</td>
              <td>{{$party->address}}</td>
              <td>{{ date('d-M-Y', strtotime($party->created_at)) }} {{ date('h:i a', strtotime($party->created_at)) }}</td>
              <td>                  
                <a class="btn btn-sm btn-danger" href="{{url('/customer_delete/'.$party->id)}}" onclick='return confirm("Confirm Delete ??")' ><i class="fas fa-trash-alt"></i></a>
             <a  class="btn btn-sm btn-primary" href="" onclick= 'edit({{$party->id}});' data-toggle="modal" id="edit" 
                        data-target="#exampleModalCenter_edit"><i class="far fa-edit"></i></a>
    
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
                  url:"{{url('/customer_edit')}}/"+x,
                  success:function(response){
                      console.log(response);
                      $('.name').val(response.name);
                      $('.mobile').val(response.mobile);
                      $('.address').val(response.address);            
                      $('.cId').val(response.id);
               
                  },
                      
              });
          }
      
      </script>
      
@endsection