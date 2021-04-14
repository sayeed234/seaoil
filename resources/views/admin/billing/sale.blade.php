@extends('admin.master')
@section('title')
@php $world=DB::table('companies')->first(); @endphp
Billing #{{$bill->billing}} || {{$world->name}}
@endsection
@section('content')
<div class="container-fluid">
<div class="card shadow">
    <div class="row" style="padding:0px;">
        <div class="col-md-12">       
                <div class="card-header ">
                <div class="row bg-secondary" style="padding: 3px;">               
                        <div class="col-md-3"><h5 class="m-0 font-weight-bold ">Product Purchase & Sale</h5></div>  
                        <div class="col-md-3"><h6 class="m-0 font-weight-bold ">Partner: </h6> {{$bill->name}}</div>   
                        <div class="col-md-3"><h6 class="m-0 font-weight-bold ">Vessel: </h6>{{$bill->vessel}}</div>   
                        <div class="col-md-3"><h6 class="m-0 font-weight-bold ">IMO : </h6>{{$bill->imo}}</div>                                  
                </div>         
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header ">
                <div class="row">
                    <a href="{{url('sale/'.$bill->id.'/0')}}" class="ml-2"><button class="btn btn-primary btn-sm mt-2">All</button></a> 
                    @foreach($category as $cat)                 
                       <a href="{{url('sale/'.$bill->id.'/'.$cat->id)}}" class="ml-2"><button class=" mt-2">{{$cat->category}}</button></a>            
                    @endforeach
                </div> 
                <hr>
                <div class="card-body">
                    <div class="row">
            @foreach($product as $product)
                        <div class="col-md-4 col-lg-4 col-12 col-xl-4 col-sm-4">
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
        <div class="col-md-6">
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

                                  {{-- <td>{{$cartProduct->options->unit}}</td> --}}
                
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
                          <b>Regular Sales & Purchase</b> 
                        </button>
                      </h5>
                    </div>                
                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                      <div class="card-body">
                          <div class="ibox-body">
                                    <form method="POST" action="{{url('order')}}">
                                    @csrf
                                <div class="row">
                                  <div class="col-sm-6 form-group">
                                    <label>Select Type</label><br>
                                    <select name="type"  required class="form-control select2bs4"   style="width: 100%;">
                                     <option value="">Select Type</option>
                                     <option value="1">Ship Purchase</option>
                                     <option value="2">Supplier Purchase</option>
                                     <option value="3">Ship Sales</option>                        
                                    </select>
                                </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Note</label>
                                        <input class="form-control" type="text" name="note"   placeholder="comments">
                                    </div> 
                                    <hr> 
                                      <div class="col-sm-5 form-group">
                                        <label>Subtotal</label>
                                        <input class="form-control" type="text" name="subtotal" value="{{$subtotal}}" readonly >
                                    </div> 
                                     
                                    <input  type="hidden" name="billing" value="{{$bill->id}}">
                                    <input  type="hidden" name="billno" value="{{$bill->billing}}">
                                    <input  type="hidden" name="partner" value="{{$bill->partner}}">
                                    <div class="col-sm-4 form-group text-center">
                                    <br> 
                                   <button class="btn btn-info"  type="submit">Confirm</button>             
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
          <h3 class="text-center">Ship Purchase</h1>
          <table class="table">
          <thead>
          <tr class="btn-danger">
              <th scope="col"># </th>
              <th scope="col" >Product Name</th>
              <th scope="col">Rate</th>
              <th scope="col">Qty</th>
              <th scope="col">Total</th>
              <th scope="col">Action</th>
          </tr>
          </thead>
          <tbody>
            @php $sl=1; @endphp
            @foreach($shippurchase as $item)
            <tr>
              <td>{{$sl++}}</td>
              <td>{{$item->pname}}</td>
              <td>{{$item->rate}}</td>
              <td>{{$item->qty}} {{$item->unit}}</td>
              <td>{{$item->total}}</td>
              <td>                    
                <a class="btn btn-sm btn-danger" href="{{url('/order_delete/'.$item->id)}}" onclick='return confirm("Confirm Delete ??")' ><i class="fas fa-trash-alt"></i></a>
                <a  class="btn btn-sm btn-primary" href="" onclick= 'edit({{$item->id}});' data-toggle="modal" id="edit" 
                    data-target="#exampleModalCenter_edit"><i class="far fa-edit"></i></a> 
               
          </td>
            </tr>
            @endforeach
          </tbody>
          </table>
        </div>
      </div>
      </div>
    </div>
    <div class="card shadow">
      <div class="row" style="padding:0px;">     
          <div class="col-md-12">       
            <div class="table-responsive">
              <h3 class="text-center">Supplier Purchase</h1>
              <table class="table">
              <thead>
              <tr class="btn-danger">
                <th scope="col"># </th>
                <th scope="col" >Product Name</th>
                <th scope="col">Rate</th>
                <th scope="col">Qty</th>
                <th scope="col">Total</th>
                <th scope="col">Action</th>
              </tr>
              </thead>
              <tbody>
                @php $sli=1; @endphp
                @foreach($supplierpurchase as $item)
                <tr>
                  <td>{{$sli++}}</td>
                  <td>{{$item->pname}}</td>
                  <td>{{$item->rate}}</td>
                  <td>{{$item->qty}} {{$item->unit}}</td>
                  <td>{{$item->total}}</td>
                  <td>                    
                    <a class="btn btn-sm btn-danger" href="{{url('/order_delete/'.$item->id)}}" onclick='return confirm("Confirm Delete ??")' ><i class="fas fa-trash-alt"></i></a>
                    <a  class="btn btn-sm btn-primary" href="" onclick= 'edit({{$item->id}});' data-toggle="modal" id="edit" 
                        data-target="#exampleModalCenter_edit"><i class="far fa-edit"></i></a> 
                   
              </td>
                </tr>
                @endforeach
              </tbody>
              </table>
            </div>
          </div>
          </div>
        </div>
        <div class="card shadow">
          <div class="row" style="padding:0px;">     
              <div class="col-md-12">       
                <div class="table-responsive">
                  <h3 class="text-center">Ship Sales</h1>
                  <table class="table">
                  <thead>
                  <tr class="btn-success">
                    <th scope="col"># </th>
                    <th scope="col" >Product Name</th>
                    <th scope="col">Rate</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Total</th>
                    <th scope="col">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php $slii=1; @endphp
                    @foreach($shipsale as $item)
                    <tr>
                      <td>{{$slii++}}</td>
                      <td>{{$item->pname}}</td>
                      <td>{{$item->rate}}</td>
                      <td>{{$item->qty}} {{$item->unit}}</td>
                      <td>{{$item->total}}</td>
                      <td>                    
                        <a class="btn btn-sm btn-danger" href="{{url('/order_delete/'.$item->id)}}" onclick='return confirm("Confirm Delete ??")' ><i class="fas fa-trash-alt"></i></a>
                        <a  class="btn btn-sm btn-primary" href="" onclick= 'edit({{$item->id}});' data-toggle="modal" id="edit" 
                            data-target="#exampleModalCenter_edit"><i class="far fa-edit"></i></a> 
                       
                  </td>
                    </tr>
                    @endforeach
                  </tbody>
                  </table>
                </div>
              </div>
              </div>
            </div>
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
        <form enctype="multipart/form-data" action="{{url('/order_update')}}" method="post" >
          @csrf
      <div class="modal-body">
          <div class="row">       
           
              <input class="cId" type="hidden" name="id" id="id">
              <div class="col-sm-12 form-group">
                <label>Product</label>
                <input class="form-control pname" readonly type="text" min="1" name="pname">             
            </div>
           <div class="col-sm-6 form-group">
              <label>Qty</label>
              <input class="form-control qty" required type="number" min="1" name="qty">             
          </div> 
            <div class="col-sm-6 form-group">
              <label>Rate</label>
              <input class="form-control rate"  required type="number" min="1" name="rate">              
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