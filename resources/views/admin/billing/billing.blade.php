@extends('admin.master')
@section('title')
@php $world=DB::table('companies')->first(); @endphp
Billing List || {{$world->name}}
@endsection
@section('content')

<div class="page-content fade-in-up">
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog   modal-dialog-centered" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Start Billing</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form enctype="multipart/form-data" action="{{url('billing_store')}}" method="post">
      @csrf
        <div class="modal-body">
            <div class="row">  
                <div class="col-sm-10 form-group">
                    <label>Partner </label>
                    <select name="partner"   class="form-control select2bs4" required style="width: 100%;">
                        <option value="">Select Partner</option>
                        @foreach ($partner as $item)                        
                        <option value="{{$item->id}}">{{$item->name}} ({{$item->mobile}})</option>
                       @endforeach               
                      </select>

                </div> 
                <div class="col-sm-2 form-group">
                    <label>Com.</label>
                    <input class="form-control"  required  type="number" min="0" name="com">
                </div>
                @php $m=rand(0000000,9999999); @endphp
                <div class="col-sm-6 form-group">
                    <label>Billing</label>
                    <input class="form-control"  readonly value="{{$m}}" type="number"  name="billing">
                </div>
                <div class="col-sm-6 form-group">
                    <label>Date</label>
                    <input class="form-control" placeholder="Name"  value="<?php echo date('Y-m-d'); ?>" required type="date"  name="date">
                </div>
                <div class="col-sm-12 form-group">
                    <label>Vessel  Name</label>
                    <input class="form-control" placeholder="Vessel Name"  required type="text"  name="vessel">
                </div> 
                <div class="col-sm-12 form-group">
                    <label>IMO</label>
                    <input class="form-control" placeholder="IMO Number"  required type="text"  name="imo">
                </div>
                <div class="col-sm-12 form-group">
                    <label>Agent Name</label>
                    <input class="form-control"  required  type="text" placeholder="Agent Name"  name="agent">
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
          <form enctype="multipart/form-data" action="{{url('/billing_update')}}" method="post" >
            @csrf
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-10 form-group">
                    <label>Partner</label>
                    <select name="partner"   class="form-control select2bs4 partner" style="width: 100%;">
                        <option value="">Select Partner</option>
                        @foreach ($partner as $item)
                        <option value="{{$item->id}}">{{$item->name}} ({{$item->mobile}})</option>
                       @endforeach               
                      </select>
                    <input class="cId" type="hidden" name="id" id="id">

                </div>
                <div class="col-sm-2 form-group">
                    <label>Com.</label>
                    <input class="form-control com"  required  type="number" min="0" name="com">
                </div>
                {{-- <div class="col-sm-6 form-group">
                    <label>Status</label>
                    <select name="status"   class="form-control status"  style="width: 100%;">
                        <option value="0">Pending</option>
                        <option value="1">Paid</option>
                       </select>
                </div> --}}
                <div class="col-sm-6 form-group">
                    <label>Date</label>
                    <input class="form-control date" placeholder="Name"  value="<?php echo date('Y-m-d'); ?>" required type="date"  name="date">
                </div>
                <div class="col-sm-6 form-group">
                    <label>Vessel  Name</label>
                    <input class="form-control vessel" placeholder="Vessel Name"  required type="text"  name="vessel">
                </div> 
                <div class="col-sm-12 form-group">
                    <label>IMO</label>
                    <input class="form-control imo" placeholder="IMO Number"  required type="text"  name="imo">
                </div>
                <div class="col-sm-12 form-group">
                    <label>Agent Name</label>
                    <input class="form-control agent"  required  type="text" placeholder="Agent Name"  name="agent">
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
            <div class="col-md-6"><h5 class="m-0 font-weight-bold ">Current Billing List</h5></div>   
            <div class="col-md-6">
                <button type="button" class="btn btn-info btn-sm fa-pull-right" data-toggle="modal" data-target="#exampleModalCenter" >
                    Add Billing
                </button>
            </div>
        </div> 
        </div> 
        <div class="card-body">
          <div class="table-responsive">
           <table id="example" class="table table-bordered table-hover table-sm">
              <thead>
                <tr>
                  <th>Billing</th>
                  <th>Date</th>
                  <th>Partner</th>
                  <th>Vessel</th>
                  <th>IMO</th>
                  <th>Agent</th>
                  <th>Summary</th>               
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              @foreach($bill as $blog)
             <tr>
              <td>#{{$blog->billing}}</td>
              <td>{{ date('d-M-Y', strtotime($blog->date)) }}</td>
              <td>{{$blog->name}} ({{$blog->com}}) <br> <span style="font-size: 10px;">{{$blog->mobile}}</span></td>
              <td>{{$blog->vessel}}</td>
              <td>{{$blog->imo}}</td>
              <td>{{$blog->agent}}</td>            
              <td>                  
                <div class="dropdown show">
                    <a class="btn btn-info" target="_blank" href="{{url('/view/'.$blog->id)}}" role="button"   aria-haspopup="true" aria-expanded="false"><i class="fas fa-eye"></i>
                    </a>
                    </div>
                </td>
              <td> <div class="dropdown show">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    </a>
    
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a  target="_blank" class="dropdown-item"  href="{{url('sale/'.$blog->id.'/0')}}">Purchase & Sale</a>
                        <a  target="_blank" class="dropdown-item"  href="{{url('billing_expense/'.$blog->id)}}">Expense</a>
                        {{-- <a  target="_blank"  class="dropdown-item"  href="{{url('billing_payment/'.$blog->id)}}">Payment</a> --}}
                    <a class="dropdown-item" href="" onclick= 'edit({{$blog->id}});' data-toggle="modal" id="edit" 
                            data-target="#exampleModalCenter_edit"> Edit</a> 
                       <a  class="dropdown-item"  href="{{url('billing_delete/'.$blog->id)}}" onclick='return confirm("Confirm Delete This Billing ??")' >Delete</a>
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
                  url:"{{url('/billing_edit')}}/"+x,
                  success:function(response){
                      console.log(response);
                      $('.partner').val(response.partner);
                      $('.date').val(response.date);
                      $('.vessel').val(response.vessel);
                      $('.imo').val(response.imo); 
                      $('.agent').val(response.agent); 
                      $('.status').val(response.status); 
                      $('.com').val(response.com); 
    
                      $('.cId').val(response.id);
               
                  },
                      
              });
          }
      
      </script>
      
@endsection