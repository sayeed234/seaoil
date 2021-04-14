@extends('admin.master')
@section('title')
@php $world=DB::table('companies')->first(); @endphp
All Sales || {{$world->name}}
@endsection
@section('content')
    <div class="card shadow">
        <div class="card-header ">
        <div class="row">
            <div class="col-md-12"><h5 class="m-0 font-weight-bold ">All Sale List</h5></div>   
        </div> 
        </div> 
        <div class="card-body">
          <div class="table-responsive">
           <table id="example" class="table table-bordered table-hover table-sm ">
              <thead>
                <tr>
                    <th scope="col"># </th>
                    <th scope="col" >Invoice</th>
                    <th scope="col">Customer</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Total</th>
                    <th scope="col">By</th>
                    <th scope="col">Payment</th>
                    <th scope="col">Action</th>
                  </tr>
              </thead>
              <tbody>
                @php $sl=1; @endphp
                @foreach($order as $item)
                @php $user=DB::table('users')->find($item->user); @endphp
                <tr>
                  <td>{{$sl++}}</td>
                  <td>{{$item->invoice}}</td>
                  <td>{{$item->name}} <br> <span style="font-size: 10px;">{{$item->mobile}}</span></td>
                  <td>{{$item->qty}} </td>
                  <td>{{$item->total}} Tk</td>
                  <td>{{@$user->name}}</td>
                  <td>{{$item->payment}} Tk</td>
                  <td>   
                    @if(Auth::user()->role==1)                 
                    <a class="btn btn-sm btn-danger" href="{{url('/corder_delete/'.$item->id)}}" onclick='return confirm("Confirm Delete ??")' ><i class="fas fa-trash-alt"></i></a>
                    @endif
                    <a  class="btn btn-sm btn-primary" target="_blank" href="{{url('/corder_view/'.$item->id)}}" ><i class="far fa-eye"></i></a>                    
                </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>  
        
@endsection