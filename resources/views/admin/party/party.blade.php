@extends('admin.master')
@section('title')
@php $world=DB::table('companies')->first(); @endphp
Partner || {{$world->name}}
@endsection
@section('content')

<div class="page-content fade-in-up">
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog   modal-dialog-centered" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Create Partner</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form enctype="multipart/form-data" action="{{url('/party_store')}}" method="post">
      @csrf
        <div class="modal-body">
            <div class="row">     
                <div class="col-sm-6 form-group">
                    <label>Name</label>
                    <input class="form-control" placeholder="Name"  required type="text"  name="name">
                </div> 
                <div class="col-sm-6 form-group">
                    <label>Mobile </label>
                    <input class="form-control"  required type="number" min="0" placeholder="Mobile Number"  name="mobile">
                </div>
                <div class="col-sm-6 form-group">
                    <label>Email </label>
                    <input class="form-control"   type="email" placeholder="Email Address"  name="email">
                </div>
                <div class="col-sm-6 form-group">
                    <label>NID</label>
                    <input class="form-control"   type="number" min="0" placeholder="2483473534"  name="nid">
                </div>
                <div class="col-sm-12 form-group">
                    <label>Address</label>
                    <input class="form-control" required  type="text" placeholder="Address"  name="address">
                </div>   
                <div class="col-sm-6 form-group">
                    <label>Bank Name</label>
                    <input class="form-control"   type="text" placeholder="DBBL"  name="bank">
                </div>
                 <div class="col-sm-6 form-group">
                    <label>Bank ACC</label>
                    <input class="form-control"   type="number" min="0" placeholder="823475643"  name="acc">
                </div>
                <div class="col-sm-6 form-group">
                    <label>Gender</label>
                    <select name="gender"   class="form-control  " style="width: 100%;">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                       </select>
                </div>
                 <div class="col-sm-6 form-group">
                    <label>Photo</label>
                    <input class="form-control"  required  type="file" name="image">
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
          <form enctype="multipart/form-data" action="{{url('/party_update')}}" method="post" >
            @csrf
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-6 form-group">
                    <label>Name</label>
                    <input class="form-control name"   required type="text"  name="name">
                    <input class="cId" type="hidden" name="id" id="id">
                </div> 
                <div class="col-sm-6 form-group">
                    <label>Mobile </label>
                    <input class="form-control mobile"  required type="number" min="0" placeholder="Mobile Number"  name="mobile">
                </div>
                <div class="col-sm-6 form-group">
                    <label>Email </label>
                    <input class="form-control email"   type="email" placeholder="Email Address"  name="email">
                </div>
                <div class="col-sm-6 form-group">
                    <label>NID</label>
                    <input class="form-control nid"   type="number" min="0" placeholder="2483473534"  name="nid">
                </div>
                <div class="col-sm-12 form-group">
                    <label>Address</label>
                    <input class="form-control address" required  type="text" placeholder="Address"  name="address">
                </div>   
                <div class="col-sm-6 form-group">
                    <label>Bank Name</label>
                    <input class="form-control bank"   type="text" placeholder="DBBL"  name="bank">
                </div>
                 <div class="col-sm-6 form-group">
                    <label>Bank ACC</label>
                    <input class="form-control acc"   type="number" min="0" placeholder="823475643"  name="acc">
                </div>
                <div class="col-sm-6 form-group">
                    <label>Gender</label>
                    <select name="gender"   class="form-control gender " style="width: 100%;">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                       </select>
                </div>
                 <div class="col-sm-6 form-group">
                    <label>Photo</label>
                    <input class="form-control"   type="file" name="image">
                </div> 
                <div class="col-sm-6 form-group">
                    <label>Status</label>
                    <select name="status"   class="form-control status " style="width: 100%;">
                        <option value="1">Active</option>
                        <option value="2">Deactive</option>
                       </select>
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
            <div class="col-md-6"><h5 class="m-0 font-weight-bold ">Partner List</h5></div>   
            <div class="col-md-6">
                    <button type="button" class="btn btn-info btn-sm fa-pull-right" data-toggle="modal" data-target="#exampleModalCenter" >
                        Add New Partner
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
                  <th>ID</th>
                  <th>Name</th>
                  <th>Mobile</th>
                  <th>Address</th>
                  <th>Gender</th>                
                  <th>Join Date</th>
                  <th>Status</th>
                  <th>Balance</th>
                  <th>Photo</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                  @php $f=1; @endphp
         @foreach($party as $party)
             <tr>
               
              <td>{{$f++}} </td>
              <td>{{$party->pid}} </td>
              <td>{{$party->name}} </td>
              <td>{{$party->mobile}}</td>
              <td>{{$party->address}}</td>
              <td>{{$party->gender}}</td>
              <td>{{ date('d-M-Y', strtotime($party->created_at)) }} {{ date('h:i a', strtotime($party->created_at)) }}</td>
              <td>@if($party->status==1) <span style="color:green">Active</span> @else <span style="color:rgb(206, 10, 10)">Deactive</span>  @endif</td>
              <td> {{$party->balance}}</td>
              <td> <img src="{{ asset($party->image) }}" alt="{{ $party->name }}" height="50" width="50" ></td>
              <td> <div class="dropdown show">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    </a>
    
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a  class="dropdown-item"  href="{{url('/party_view/'.$party->id)}}" target="blank" >View</a>
                    <a class="dropdown-item" href="" onclick= 'edit({{$party->id}});' data-toggle="modal" id="edit" 
                            data-target="#exampleModalCenter_edit"> Edit</a>                   
                       <a  class="dropdown-item"  href="{{url('/party_delete/'.$party->id)}}" onclick='return confirm("Confirm Delete ??")' >Delete</a>
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
                  url:"{{url('/party_edit')}}/"+x,
                  success:function(response){
                      console.log(response);
                      $('.name').val(response.name);
                      $('.mobile').val(response.mobile);
                      $('.email').val(response.email);
                      $('.address').val(response.address);
                      $('.nid').val(response.nid);
                      $('.bank').val(response.bank);
                      $('.acc').val(response.acc);
                      $('.gender').val(response.gender);
                      $('.status').val(response.status);
            
                      $('.cId').val(response.id);
               
                  },
                      
              });
          }
      
      </script>
      
@endsection