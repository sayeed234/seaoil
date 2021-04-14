@extends('admin.master')
@section('title')
@php $world=DB::table('companies')->first(); @endphp
Billing List || {{$world->name}}
@endsection
@section('content')


    <div class="card shadow">
        <div class="card-header ">
        <div class="row">
            <div class="col-md-6"><h5 class="m-0 font-weight-bold ">Completed Billing List</h5></div>   
            <div class="col-md-6">
              
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
 
                       <a  class="dropdown-item"  href="{{url('returnbill/'.$blog->id)}}" onclick='return confirm("Confirm Return Process This Billing ??")' >Return Billing</a>
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

      
@endsection