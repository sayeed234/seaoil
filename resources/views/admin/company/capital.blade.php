@extends('admin.master')
@section('title')
@php $world=DB::table('companies')->first(); @endphp
My Capital || {{$world->name}}
@endsection
@section('content')
<div class="container-fluid">
    <form enctype="multipart/form-data" action="{{url('/capital_store')}}" method="post">
        @csrf 
              <div class="row">     
              <div class="col-sm-3 form-group">
                  <label>Capital Type</label><br>
                  <select name="type"  required class="form-control "   style="width: 100%;">
                   <option value="">Select Type</option>
                   <option  value="1">Cash in</option>
                   <option  value="0">Cash Out</option>
   
                  </select>
              </div>
               <div class="col-sm-3 form-group">
                  <label>Amount</label>
                  <input class="form-control "  required placeholder="Amount" type="number" min="0" name="amount">             
              </div> 
                <div class="col-sm-3 form-group">
                  <label>Note</label>
                  <input class="form-control " placeholder="Note"  type="text"  name="note">              
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
          <form enctype="multipart/form-data" action="{{url('/billing_expense_update')}}" method="post" >
            @csrf
        <div class="modal-body">
            <div class="row">           
              <div class="col-sm-12 form-group">
                <label>Capital Type</label><br>
                  <select name="type"  required class="form-control type"   style="width: 100%;">
                   <option value="">Select Type</option>
                   <option  value="1">Cash in</option>
                   <option  value="0">Cash Out</option>
                </select>
                <input class="cId" type="hidden" name="id" id="id">
            </div>
            <div class="col-sm-3 form-group">
                <label>Amount</label>
                <input class="form-control amount "  required placeholder="Amount" type="number" min="0" name="amount">             
            </div> 
              <div class="col-sm-3 form-group">
                <label>Note</label>
                <input class="form-control note" placeholder="Note"  type="text"  name="note">              
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
            <h5 class="text-center">@php $capital=DB::table('companies')->first(); @endphp Total Capital= <b> {{$capital->balance}} Tk</b></h5>
          <div class="table-responsive">
           <table id="example" class="table table-bordered table-sm ">
              <thead>
                <tr >
                  <th>Sl</th>
                  <th>Type</th>
                  <th>Amount</th>
                  <th>Note</th>
                  <th>Date</th>
                  <th>Action</th>           
                </tr>
              </thead>
              <tbody>
                  @php $k=1; $total=0;  @endphp
                  @foreach($result as $sale)
             <tr>
                <td>{{$k++}}</td>             
                <td>@if($sale->type==1) <span style="color:royalblue">Cash In</span> @else  <span style="color:rgb(230, 30, 11)">Cash Out</span> @endif</td>
                <td>{{$sale->amount}}</td>
                <td>{{$sale->note}}</td>
                <td>{{ date('d-M-Y', strtotime($sale->created_at)) }} {{ date('h:i a', strtotime($sale->updated_at)) }}</td> 
                <td>                    
                    <a class="btn btn-sm btn-danger" href="{{url('/capital_delete/'.$sale->id)}}" onclick='return confirm("Confirm Delete ??")' ><i class="fas fa-trash-alt"></i></a>
                                      
              </td>
             </tr>            
             @endforeach

              </tbody>
            </table>
          </div>
        </div>
       
@endsection