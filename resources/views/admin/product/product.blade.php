@extends('admin.master')
@section('title')
@php $world=DB::table('companies')->first(); @endphp
Product List || {{$world->name}}
@endsection
@section('content')

<div class="page-content fade-in-up">
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog   modal-dialog-centered" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Create Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form enctype="multipart/form-data" action="{{url('product_store')}}" method="post">
      @csrf
        <div class="modal-body">
            <div class="row">  
                <div class="col-sm-12 form-group">
                    <label>Product Categoy</label>
                    <select name="category"   class="form-control select2bs4" required style="width: 100%;">
                        <option value="">Select Category</option>
                        @foreach ($category as $item)                        
                        <option value="{{$item->id}}">{{$item->category}}</option>
                       @endforeach               
                      </select>

                </div>   
                <div class="col-sm-8 form-group">
                    <label>Product Name</label>
                    <input class="form-control" placeholder="Name"  required type="text"  name="name">
                </div> 
                @php $m=rand(00000,99999); @endphp
                <div class="col-sm-4 form-group">
                    <label>Product Code</label>
                    <input class="form-control"  readonly value="{{$m}}" type="number"  name="code">
                </div>
                <div class="col-sm-6 form-group">
                    <label>Unit</label>
                    <select name="unit"   class="form-control" required style="width: 100%;">
                        <option value="">Select Unit</option>
                        <option value="Piece">Piece</option>
                        <option value="Drum">Drum</option>
                        <option value="KG">KG</option>
                        <option value="Ltr">Ltr</option>
                       </select>
                </div>
                <div class="col-sm-6 form-group">
                    <label>Price</label>
                    <input class="form-control"  required  type="number" placeholder="100"  name="price">
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
          <form enctype="multipart/form-data" action="{{url('/product_update')}}" method="post" >
            @csrf
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-12 form-group">
                    <label>Product Categoy</label>
                    <select name="category"   class="form-control select2bs4 category" style="width: 100%;">
                        <option value="">Select Category</option>
                        @foreach ($category2 as $item)
                        <option value="{{$item->id}}">{{$item->category}}</option>
                       @endforeach               
                      </select>
                    <input class="cId" type="hidden" name="id" id="id">

                </div>
                <div class="col-sm-12 form-group">
                    <label>Product Name</label>
                    <input class="form-control name" placeholder="Name"  required type="text"  name="name">
                </div> 
       
                <div class="col-sm-6 form-group">
                    <label>Unit</label>
                    <select name="unit"   class="form-control unit" required style="width: 100%;">
                        <option value="">Select Unit</option>
                        <option value="Piece">Piece</option>
                        <option value="Drum">Drum</option>
                        <option value="KG">KG</option>
                        <option value="Ltr">Ltr</option>
                       </select>
                </div>
                <div class="col-sm-6 form-group">
                    <label>Price</label>
                    <input class="form-control price"  required  type="number" placeholder="100"  name="price">
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
            <div class="col-md-6"><h5 class="m-0 font-weight-bold ">Product List</h5></div>   
            <div class="col-md-6">
                <button type="button" class="btn btn-info btn-sm fa-pull-right" data-toggle="modal" data-target="#exampleModalCenter" >
                    Add Product
                </button>
            </div>
        </div> 
        </div> 
        <div class="card-body">
          <div class="table-responsive">
           <table id="example" class="table table-bordered table-hover ">
              <thead>
                <tr>
                  <th>Sl</th>
                  <th>Date</th>
                  <th>Category</th>
                  <th>Name</th>
                  <th>Code</th>
                  <th>Unit</th>
                  <th>Price</th>               
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                  @php $sl=1; @endphp
              @foreach($product as $blog)
             <tr>
              <td>{{$sl++}}</td>
              <td>{{ date('d-M-Y', strtotime($blog->created_at)) }}</td>
              <td>{{$blog->category}}</td>
              <td>{{$blog->name}}</td>
              <td>{{$blog->code}}</td>
              <td>{{$blog->unit}}</td>            
              <td>{{$blog->price}} Tk.</td>
              <td> <div class="dropdown show">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    </a>
    
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="" onclick= 'edit({{$blog->id}});' data-toggle="modal" id="edit" 
                            data-target="#exampleModalCenter_edit"> Edit</a>                   
                       <a  class="dropdown-item"  href="{{url('product_delete/'.$blog->id)}}" onclick='return confirm("Confirm Delete ??")' >Delete</a>
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
                  url:"{{url('/product_edit')}}/"+x,
                  success:function(response){
                      console.log(response);
                      $('.category').val(response.category);
                      $('.name').val(response.name);
                      $('.price').val(response.price);
                      $('.unit').val(response.unit); 
    
                      $('.cId').val(response.id);
               
                  },
                      
              });
          }
      
      </script>
      
@endsection