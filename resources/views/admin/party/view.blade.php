@extends('admin.master')
@section('title')
@php $world=DB::table('companies')->first(); @endphp
{{$result->name}} || {{$world->name}}
@endsection
@section('content')
<div class="container">
        <table class="table table-bordered">
        <tbody>
          <tr>
            <th colspan="2" class="text-center"><img src="{{asset($result->image)}}" style="height:=100px; width:100px;"></th>
          </tr>
          <tr >
            <td> Partner ID</td>
           <td> <b>{{$result->pid}} </b></td>
           </tr>
          <tr>
            <td> Name</td>
           <td> <b>{{$result->name}}</b></td>
           </tr>
           <tr>
            <td>Mobile</td>
           <td>{{$result->mobile}}</td>
           </tr>
           <tr>
            <td>Address</td>
           <td>{{$result->address}}</td>
           </tr>
           <tr>
            <td>Email</td>
           <td>{{$result->email}} Tk.</td>
           </tr>
           <tr>
            <td>Bank</td>
           <td>{{$result->bank}}</td>
           </tr>
           <tr>
            <td>ACC</td>
           <td>{{$result->acc}}</td>
           </tr>
           <tr>
            <td>NID</td>
           <td>{{$result->nid}}</td>
           </tr>
           <tr>
            <td>Gender</td>
           <td>{{$result->gender}}</td>
           </tr>            
        </tbody>
      </table>      
    </div>
    @endsection