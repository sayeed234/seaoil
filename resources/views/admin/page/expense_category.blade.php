@extends('admin.master')
@section('title')
@php $world=DB::table('companies')->first(); @endphp
Category List || {{$world->name}}
@endsection
@section('content')

<div class="page-content fade-in-up">
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Create Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form enctype="multipart/form-data" action="{{url('expense_category_store')}}" method="post">
      @csrf
        <div class="modal-body">
            <div class="row">     
                <div class="col-sm-12 form-group">
                    <label>Name</label>
                    <input class="form-control" placeholder="Category Name"  required type="text"  name="expense_category">
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
          <form enctype="multipart/form-data" action="{{url('expense_category_update')}}" method="post" >
            @csrf
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-12 form-group">
                    <label>Name</label>
                    <input class="form-control expense_category"   required type="text"  name="expense_category">
                    <input class="cId" type="hidden" name="id" id="id">
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
            <div class="col-md-6"><h5 class="m-0 font-weight-bold ">Expense Category List</h5></div>   
            <div class="col-md-6">
                    <button type="button" class="btn btn-info btn-sm fa-pull-right" data-toggle="modal" data-target="#exampleModalCenter" >
                        Add Category
                </button>
            </div>
        </div> 
        </div> 
        <div class="card-body">
          <div class="table-responsive">
           <table id="example" class="table table-bordered table-hover table-sm">
              <thead>
                <tr>
                  <th>SL</th>
                  <th>Name</th>
                  <th>Date</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @php $sl=1; @endphp
                @foreach($data as $blog)
               <tr>  
                <td>{{$sl++}}</td>             
              <td>{{$blog->expense_category}}</td>
              <td>{{ date('d-M-Y', strtotime($blog->created_at)) }} {{ date('h:i a', strtotime($blog->updated_at)) }}</td>
              <td> <div class="dropdown show">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    </a>    
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="" onclick= 'edit({{$blog->id}});' data-toggle="modal" id="edit" 
                            data-target="#exampleModalCenter_edit"> Edit</a>                   
                       <a  class="dropdown-item"  href="{{url('expense_category_delete/'.$blog->id)}}" onclick='return confirm("Confirm Delete ??")' >Delete</a>
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
                  url:"{{url('/expense_category_edit')}}/"+x,
                  success:function(response){
                      console.log(response);
                      $('.expense_category').val(response.expense_category);        
    
                      $('.cId').val(response.id);
               
                  },
                      
              });
          }
      
      </script>
      
@endsection