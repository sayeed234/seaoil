@extends('admin.master')
@section('title')
@php $world=DB::table('companies')->first(); @endphp
Product Purchase || {{$world->name}}
@endsection
@section('content')
<div class="container-fluid">
<div class="card shadow">
    <div class="row" style="padding:0px;">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header ">
                <div class="row">
                    <a href="{{url('purchase/0')}}" class="ml-2"><button class="btn btn-info btn-sm mt-2">All</button></a> 
                    @foreach($category as $cat)                 
                       <a href="{{url('purchase/'.$cat->id)}}" class="ml-2"><button class="mt-2">{{$cat->category}}</button></a>            
                    @endforeach
                </div> 
                <hr>
                <div class="card-body">
                    <div class="row">
            @foreach($product as $product)
                        <div class="col-md-3 col-lg-3 col-12 col-xl-3 col-sm-3">
                        <div class="card" >
                        <form action="{{url('cart')}}" method="post" >
                            @csrf
                        <div class="card-body">
                           <h6><b>{{$product->name}}</b></h6>
                           <h6>Price: {{$product->price}} Tk </h6>
                           <input type="hidden" name="id" value="{{$product->id }}"/>
                           <input type="hidden" name="qty" value="1"/>          
                           <button type="submit" class="btn btn-primary btn-sm btn-block">Add To Cart</button>
                        </div>
                    </form>
                      </div>
                </div>
            @endforeach
            
                </div>
                
            </div>
              </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card-body ">
            <div class="page-content fade-in-up">
                <div class="col-md-12">
                        <div class="ibox">                  
                            <div class="ibox-body">
                                <div class="row">
                              <div class="table-responsive">
                                <table class="table">
                                <thead>
                                <tr class="btn-info">
                                    <th scope="col"># </th>
                                    <th scope="col" >Product Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Qty</th>
                                    <th scope="col">Unit</th>
                                    <th scope="col">Update</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i=1; ?>
                                <?php $subtotal=0; ?>
                                <?php $total=0; ?>
                                @foreach($cartProduct as $cartProduct)
                                <tr>
                                    <th scope="row">{{$i++}}</th>
                                    <td><b>{{$cartProduct->name}}</b><br>
                                    </td>
                
                                    <form action="{{url('/cartupdate')}}">
                                          @csrf
                                    <td><input type="text"  name="price" value="{{$cartProduct->price}}"style="width:75px;" /></td>                                               
                                  
                
                                  <td> <input type="number" max="" min="1"  name="qty" value="{{$cartProduct->qty}}"style="width:75px;" /></td>
                                  
                                  <td>
                                    <select name="unit"   class="form-control" style="width: 100%;">
                                      <option value="{{$cartProduct->options->unit}}">{{$cartProduct->options->unit}}</option>
                                      <option value="Piece">Piece</option>
                                      <option value="Drum">Drum</option>
                                      <option value="KG">KG</option>
                                      <option value="Ltr">Ltr</option>
                                     </select>
  
                                    </td>
                
                                <input type="hidden" name="rowId" value="{{$cartProduct->rowId}}" />                           
                              <td><button class="btn btn-success btn-sm" type="submit" name="btn"><i class="far fa-edit"></i></button> </td>
                                      </form>
                
                                    <td>{{$total=$cartProduct->price*$cartProduct->qty}} TK.</td>
                                    <td><a href="{{ url('/deletecart',['rowId'=>$cartProduct->rowId]) }}" onclick="return confirm('Confirm Remove This Product ?');" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a></td>
                                </tr>
                                <?php $subtotal=$subtotal+$total ?>
                
                                @endforeach
                                <tr>
                                    <td colspan="6" class="text-right"><b>Subtotal = </b></td>
                                    <td colspan="3" class="text-left"><b>{{$subtotal}} TK.</b></td>
                                <?php 
                                  Session::put('subtotal',$subtotal);
                                  ?>
                                </tr>
                                </tbody>
                                </table>
                                </div>
                            </div>
                          </div>
                      </div>
                  </div>
                </div>
                <div class="row">               
                    <div class="col-md-3"><a href="{{url('destroy')}}"><button class="btn btn-danger btn-sm">All Clear Cart</button></a></div>                   
                </div>
                <hr>
                <div class="page-content fade-in-up">
                        <div class="col-md-12">
                 <div id="accordion">
                  <div class="card">
                    <div class="card-header " id="headingOne" data-toggle="collapse" data-target="#collapseOne">
                      <h5 class="mb-0">
                        <button class="btn btn-link "  aria-expanded="true" aria-controls="collapseOne">
                          <b>Supplier Purchase </b> 
                        </button>
                      </h5>
                    </div>                
                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                      <div class="card-body">
                          <div class="ibox-body">
                            <form method="POST" action="{{url('sorder')}}">
                                    @csrf
                                <div class="row">
                                  
                                  <div class="col-sm-4 form-group">
                                    <label>Select Supplier</label><br>
                                    <select name="supplier"  required class="form-control select2bs4"   style="width: 100%;">
                                     <option value="">Select Supplier</option>
                                     @foreach($supplier as $customer)
                                     <option value="{{$customer->id}}">{{$customer->name}} ( {{$customer->mobile}} )</option>
                                      @endforeach              
                                    </select>
                                </div>
                                      <div class="col-sm-4 form-group">
                                        <label>Subtotal</label>
                                        <input class="form-control" type="text" name="subtotal" value="{{$subtotal}}" readonly >
                                    </div> 
                                      <div class="col-sm-4 form-group">
                                        <label>Payment</label>
                                        <input class="form-control" required type="number" max="{{$subtotal}}" min="0" value="0" name="payment">
                                    </div> 
                                    <div class="col-sm-4 form-group">
                                        <button type="button" class="btn btn-secondary btn-sm fa-pull-right" data-toggle="modal" data-target="#exampleModalCenter" >
                                            <i class="fas fa-user-plus"></i>
                                    </button>
                                    </div>
                                    <div class="col-sm-4 form-group text-center"></div>
                                    <div class="col-sm-4 form-group text-center">
                                     <br> 
                                   <button class="btn btn-info" onclick='return confirm("Confirm Purchase All Product ??")'   type="submit">Confirm Purchase</button>             
                                        </div>
                                        </div>
                                    </form>
                            </div>
                      </div>
                    </div>
                  </div>
                </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
        <div class="card shadow">
          <div class="row" style="padding:0px;">     
              <div class="col-md-12">       
                <div class="table-responsive">
                  <h3 class="text-center">Today Purchase</h1>
                  <table class="table">
                  <thead>
                  <tr class="btn-success">
                    <th scope="col"># </th>
                    <th scope="col" >Invoice</th>
                    <th scope="col">Supplier</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Total</th>
                    <th scope="col">Payment</th>
                    <th scope="col">By</th>
                    <th scope="col">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php $sl=1; $sum=0; $sum2=0; @endphp
                    @foreach($order as $item)
                    @php $user=DB::table('users')->find($item->user) @endphp

                    <tr>
                      <td>{{$sl++}}</td>
                      <td>{{$item->invoice}}</td>
                      <td>{{$item->name}} <br> <span style="font-size: 10px;">{{$item->mobile}}</span></td>
                      <td>{{$item->qty}} </td>
                      <td>{{$item->total}} Tk</td>
                      <td>{{$item->payment}} Tk</td>
                      <td>{{@$user->name}}</td>
                      <td>                    
                        <a class="btn btn-sm btn-danger" href="{{url('/sorder_delete/'.$item->id)}}" onclick='return confirm("Confirm Delete ??")' ><i class="fas fa-trash-alt"></i></a>
                        <a  class="btn btn-sm btn-primary" target="_blank" href="{{url('/sorder_view/'.$item->id)}}" ><i class="far fa-eye"></i></a> 
                       
                  </td>
                    </tr>
                    @php $sum2=$sum2+$item->total; @endphp
                    @php $sum=$sum+$item->payment; @endphp
                    
                    @endforeach
                    <tr>
                      <td colspan="4"><b>Total Today Sale</b></td>
                      <td ><b>{{$sum2}} Tk</b></td>
                      <td colspan="3"><b>{{$sum}} Tk</b></td>
                    </tr>
                  </tbody>
                  </table>
                </div>
              </div>
              </div>
            </div>
  </div>

                                 {{-- Add Customer--}}
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog   modal-dialog-centered" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Create Supplier</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form enctype="multipart/form-data" action="{{url('/supplier_store')}}" method="post">
    @csrf
        <div class="modal-body">
            <div class="row">     
                <div class="col-sm-12 form-group">
                    <label>Name</label>
                    <input class="form-control" placeholder="Name"  required type="text"  name="name">
                </div> 
                <div class="col-sm-12 form-group">
                    <label>Company Name</label>
                    <input class="form-control" placeholder="Company Name"   type="text"  name="company">
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
     {{-- Add Customer--}}
   <script>
    function edit(id) {
            var x =id;
            
            $.ajax({
                type:'GET',
                url:"{{url('/order_edit')}}/"+x,
                success:function(response){
                    console.log(response);
                    $('.pname').val(response.pname);        
                    $('.qty').val(response.qty);                
                    $('.rate').val(response.rate);                                             
                    $('.cId').val(response.id);
             
                },
                    
            });
        }
    
    </script>

@endsection