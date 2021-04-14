@extends('admin.master')
@section('title')
@php $world=DB::table('companies')->first(); @endphp
Dashboard || {{$world->name}}
@endsection
@section('content')
   <!-- Main content -->
    <section class="content" style="  background-image: url('https://images7.alphacoders.com/560/560824.jpg'); height:2500px;">
      <div class="container-fluid">
        <br> 
        @if(Auth::user()->role==1)
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box bg-info">
              <div class="info-box-content">
                <span class="info-box-text">Today Billing Sales</span>
                <span class="info-box-number">
                  {{$sale->total}} Tk.
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3 bg-success">
              <div class="info-box-content">
                <span class="info-box-text">Today Billing Supplier Purchase</span>
                <span class="info-box-number">{{$suppurchase->total}} Tk.</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3 bg-primary">
              <div class="info-box-content">
                <span class="info-box-text">Today Billing Ship Purchase</span>
                <span class="info-box-number">{{$shippurchase->total}} Tk.</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3 bg-danger">
              <div class="info-box-content ">
                <span class="info-box-text">Today Billing Expense</span>
                <span class="info-box-number">{{$expense->total}} Tk.</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box  bg-danger">
              <div class="info-box-content">
                <span class="info-box-text">Today Partner Payment</span>
                <span class="info-box-number">
                  {{$partnerpayment->total}} Tk.
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3 bg-warning">
              <div class="info-box-content ">
                <span class="info-box-text">Today Customer Sale</span>
                <span class="info-box-number">{{$customersale->total}} Tk.</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3 bg-secondary">
              <div class="info-box-content">
                <span class="info-box-text">Today Customer Recive Payment</span>
                <span class="info-box-number">{{$customerpayment->total}} Tk.</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3 bg-warning">
              <div class="info-box-content">
                <span class="info-box-text">Today Supplier Purchase</span>
                <span class="info-box-number">{{$supplierpurchase->total}} Tk.</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box bg-info">
              <div class="info-box-content">
                <span class="info-box-text">Today Supplier Payment</span>
                <span class="info-box-number">
                       {{$supllierpayment->total}} Tk.
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3 bg-primary">
              <div class="info-box-content">
                <span class="info-box-text">Today Company Expense</span>
                <span class="info-box-number">{{$companyexpense->total}} Tk.</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3 bg-success">
              <div class="info-box-content">
                <span class="info-box-text">Today Company Profit</span>
                <span class="info-box-number">{{$profit->company}} Tk.</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3 bg-secondary">
              <div class="info-box-content">
                <span class="info-box-text">Today Partner Profit</span>
                <span class="info-box-number">{{$profit->profit}} Tk</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
@endif
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Daily  Report</h5>
    
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                          
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th scope="col">User</th>
                          <th scope="col">Sale</th>
                          <th scope="col">Purchase</th>
                          <th scope="col">Expense</th>
                          <th scope="col">Recive Payment</th>
                          <th scope="col">Payment</th>
                          <th scope="col">Due Balance</th>
                             <th scope="col">Payable</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($user as $user)
                        @php 
                        $date = new DateTime("now");
                        $customersale=DB::table('corders')  
                                  ->whereDate('corders.created_at', '=', $date) 
                                  ->where('user',$user->id)    
                                  ->select(DB::raw('SUM(total) as total'))
                                  ->first();
                        $customerpayment=DB::table('cpayments') 
                                  ->whereDate('cpayments.created_at', '=', $date) 
                                  ->where('user',$user->id)      
                                   ->select(DB::raw('SUM(payment) as total'))
                                  ->first();
                          $supplierpurchase=DB::table('sorders') 
                                  ->whereDate('sorders.created_at', '=', $date) 
                                  ->where('user',$user->id)      
                                  ->select(DB::raw('SUM(total) as total'))
                                  ->first();
                          $supllierpayment=DB::table('spayments') 
                                  ->whereDate('spayments.created_at', '=', $date) 
                                  ->where('user',$user->id)      
                                  ->select(DB::raw('SUM(payment) as total'))
                                  ->first();
                        $companyexpense=DB::table('companyexpenses') 
                                  ->whereDate('companyexpenses.created_at', '=', $date) 
                                  ->where('user',$user->id)      
                                  ->select(DB::raw('SUM(total) as total'))
                                  ->first();
                          @endphp
                        <tr>
                          
                          <td>{{$user->name}} <br> {{$user->mobile}}</td>
                          <td>{{$customersale->total}} Tk.</td>
                          <td>{{$supplierpurchase->total}} Tk.</td>
                          <td>{{$companyexpense->total}} Tk.</td>
                          <td>{{$customerpayment->total}} Tk.</td>
                          <td>{{$supllierpayment->total}} Tk.</td>
                          <td><b>{{($customersale->total-$customerpayment->total)}} Tk.</b></td>
                          <td><b>{{$supplierpurchase->total-$supllierpayment->total}} Tk</b></td>
                        </tr>
                     @endforeach
                      </tbody>
                    </table>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
              @if(Auth::user()->role==1)
              <div class="card-footer">
                <h6>Billing Section</h6>
                <div class="row">                 
                  <div class="col-sm-2 col-6">
                    <div class="description-block border-right text-success">
                      <h5 class="description-header">{{$a=$sale1->total}} Tk.</h5>
                      <span class="description-text">TOTAL SALE</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-2 col-6">
                    <div class="description-block border-right text-danger">
                      <h5 class="description-header">{{$b=$suppurchase1->total+$shippurchase1->total}} Tk.</h5>
                      <span class="description-text">TOTAL PURCHASE </span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-2 col-6">
                    <div class="description-block border-right text-danger">
                      <h5 class="description-header">{{$c=$expense1->total}} Tk.</h5>
                      <span class="description-text">TOTAL EXPENSE</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-2 col-6">
                    <div class="description-block border-right text-primary">
                      <h5 class="description-header">{{$totalprofit->profit+$totalprofit->company}} Tk.</h5>
                      <span class="description-text">TOTAL PROFIT</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <div class="col-sm-2 col-6">
                    <div class="description-block border-right text-info">
                      <h5 class="description-header">{{$totalprofit->company}} Tk.</h5>
                      <span class="description-text">COMAPNY PROFIT</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-2 col-6">
                    <div class="description-block text-warning">
                      <h5 class="description-header">{{$totalprofit->profit}} Tk.</h5>
                      <span class="description-text">PARTNER PROFIT</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                </div>
                <!-- /.row -->
              </div>
              <div class="card-footer">
                <h6>Customer & Supplier</h6>
                <div class="row">
                  <div class="col-sm-3 col-6">
                    <div class="description-block border-right text-warning">
                      <h5 class="description-header">{{$customersale1->total}} Tk.</h5>
                      <span class="description-text">TOTAL CUSTOMER SALE</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 col-6">
                    <div class="description-block border-right text-info">
                    <h5 class="description-header">{{$customerpayment1->total}} Tk.</h5>
                      <span class="description-text">TOTAL CUSTOMER PAYMENT</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-2 col-6">
                    <div class="description-block border-right text-success">
                      <h5 class="description-header">{{$supplierpurchase1->total}} Tk.</h5>
                      <span class="description-text">TOTAL SUPPLIER PURCHASE</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <div class="col-sm-2 col-6">
                    <div class="description-block border-right text-danger">
                      <h5 class="description-header">{{$supllierpayment1->total}} Tk.</h5>
                      <span class="description-text">TOTAL SUPPLIER R.PAYMENT</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-2 col-6">
                    <div class="description-block text-danger">
                      <h5 class="description-header">{{$companyexpense1->total}} Tk.</h5>
                      <span class="description-text">TOTAL COMPANY EXPENSE</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                </div>
                <!-- /.row -->
              </div>
@endif

              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->


        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <div class="col-md-8">       
            <!-- /.card -->
            <div class="row">
              <div class="col-md-6">
                <!-- DIRECT CHAT -->
                <div class="card direct-chat direct-chat-warning">
                  <div class="card-header">
                    <h3 class="card-title">Direct Chat</h3>

                    <div class="card-tools">
                      <span title="3 New Messages" class="badge badge-warning">3</span>
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" title="Contacts" data-widget="chat-pane-toggle">
                        <i class="fas fa-comments"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <!-- Conversations are loaded here -->
                    <div class="direct-chat-messages">
                      <!-- Message. Default to the left -->
                      <div class="direct-chat-msg">
                        <div class="direct-chat-infos clearfix">
                          <span class="direct-chat-name float-left">Alexander Pierce</span>
                          <span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
                        </div>
                        <!-- /.direct-chat-infos -->
                        <img class="direct-chat-img" src="https://cdn3.iconfinder.com/data/icons/avatars-flat/33/man_5-512.png" alt="message user image">
                        <!-- /.direct-chat-img -->
                        <div class="direct-chat-text">
                          Is this template really for free? That's unbelievable!
                        </div>
                        <!-- /.direct-chat-text -->
                      </div>
                      <!-- /.direct-chat-msg -->

                      <!-- Message to the right -->
                      <div class="direct-chat-msg right">
                        <div class="direct-chat-infos clearfix">
                          <span class="direct-chat-name float-right">Sarah Bullock</span>
                          <span class="direct-chat-timestamp float-left">23 Jan 2:05 pm</span>
                        </div>
                        <!-- /.direct-chat-infos -->
                        <img class="direct-chat-img" src="https://cdn3.iconfinder.com/data/icons/avatars-flat/33/man_5-512.png" alt="message user image">
                        <!-- /.direct-chat-img -->
                        <div class="direct-chat-text">
                          You better believe it!
                        </div>
                        <!-- /.direct-chat-text -->
                      </div>
                      <!-- /.direct-chat-msg -->

                      <!-- Message. Default to the left -->
                      <div class="direct-chat-msg">
                        <div class="direct-chat-infos clearfix">
                          <span class="direct-chat-name float-left">Alexander Pierce</span>
                          <span class="direct-chat-timestamp float-right">23 Jan 5:37 pm</span>
                        </div>
                        <!-- /.direct-chat-infos -->
                        <img class="direct-chat-img" src="https://cdn3.iconfinder.com/data/icons/avatars-flat/33/man_5-512.png" alt="message user image">
                        <!-- /.direct-chat-img -->
                        <div class="direct-chat-text">
                          Working with AdminLTE on a great new app! Wanna join?
                        </div>
                        <!-- /.direct-chat-text -->
                      </div>
                      <!-- /.direct-chat-msg -->

                      <!-- Message to the right -->
                      <div class="direct-chat-msg right">
                        <div class="direct-chat-infos clearfix">
                          <span class="direct-chat-name float-right">Sarah Bullock</span>
                          <span class="direct-chat-timestamp float-left">23 Jan 6:10 pm</span>
                        </div>
                        <!-- /.direct-chat-infos -->
                        <img class="direct-chat-img" src="https://cdn3.iconfinder.com/data/icons/avatars-flat/33/man_5-512.png" alt="message user image">
                        <!-- /.direct-chat-img -->
                        <div class="direct-chat-text">
                          I would love to.
                        </div>
                        <!-- /.direct-chat-text -->
                      </div>
                      <!-- /.direct-chat-msg -->

                    </div>
                    <!--/.direct-chat-messages-->

                    <!-- Contacts are loaded here -->
                    <div class="direct-chat-contacts">
                      <ul class="contacts-list">
                        <li>
                          <a href="#">
                            <img class="contacts-list-img" src="https://cdn3.iconfinder.com/data/icons/avatars-flat/33/man_5-512.png" alt="User Avatar">

                            <div class="contacts-list-info">
                              <span class="contacts-list-name">
                                Count Dracula
                                <small class="contacts-list-date float-right">2/28/2015</small>
                              </span>
                              <span class="contacts-list-msg">How have you been? I was...</span>
                            </div>
                            <!-- /.contacts-list-info -->
                          </a>
                        </li>
                        <!-- End Contact Item -->
                        <li>
                          <a href="#">
                            <img class="contacts-list-img" src="https://cdn3.iconfinder.com/data/icons/avatars-flat/33/man_5-512.png" alt="User Avatar">

                            <div class="contacts-list-info">
                              <span class="contacts-list-name">
                                Sarah Doe
                                <small class="contacts-list-date float-right">2/23/2015</small>
                              </span>
                              <span class="contacts-list-msg">I will be waiting for...</span>
                            </div>
                            <!-- /.contacts-list-info -->
                          </a>
                        </li>
                        <!-- End Contact Item -->
                        <li>
                          <a href="#">
                            <img class="contacts-list-img" src="https://cdn3.iconfinder.com/data/icons/avatars-flat/33/man_5-512.png" alt="User Avatar">

                            <div class="contacts-list-info">
                              <span class="contacts-list-name">
                                Nadia Jolie
                                <small class="contacts-list-date float-right">2/20/2015</small>
                              </span>
                              <span class="contacts-list-msg">I'll call you back at...</span>
                            </div>
                            <!-- /.contacts-list-info -->
                          </a>
                        </li>
                        <!-- End Contact Item -->
                        <li>
                          <a href="#">
                            <img class="contacts-list-img" src="https://cdn3.iconfinder.com/data/icons/avatars-flat/33/man_5-512.png" alt="User Avatar">

                            <div class="contacts-list-info">
                              <span class="contacts-list-name">
                                Nora S. Vans
                                <small class="contacts-list-date float-right">2/10/2015</small>
                              </span>
                              <span class="contacts-list-msg">Where is your new...</span>
                            </div>
                            <!-- /.contacts-list-info -->
                          </a>
                        </li>
                        <!-- End Contact Item -->
                        <li>
                          <a href="#">
                            <img class="contacts-list-img" src="https://cdn3.iconfinder.com/data/icons/avatars-flat/33/man_5-512.png" alt="User Avatar">

                            <div class="contacts-list-info">
                              <span class="contacts-list-name">
                                John K.
                                <small class="contacts-list-date float-right">1/27/2015</small>
                              </span>
                              <span class="contacts-list-msg">Can I take a look at...</span>
                            </div>
                            <!-- /.contacts-list-info -->
                          </a>
                        </li>
                        <!-- End Contact Item -->
                        <li>
                          <a href="#">
                            <img class="contacts-list-img" src="https://cdn3.iconfinder.com/data/icons/avatars-flat/33/man_5-512.png" alt="User Avatar">

                            <div class="contacts-list-info">
                              <span class="contacts-list-name">
                                Kenneth M.
                                <small class="contacts-list-date float-right">1/4/2015</small>
                              </span>
                              <span class="contacts-list-msg">Never mind I found...</span>
                            </div>
                            <!-- /.contacts-list-info -->
                          </a>
                        </li>
                        <!-- End Contact Item -->
                      </ul>
                      <!-- /.contacts-list -->
                    </div>
                    <!-- /.direct-chat-pane -->
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <form action="#" method="post">
                      <div class="input-group">
                        <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                        <span class="input-group-append">
                          <button type="button" class="btn btn-warning">Send</button>
                        </span>
                      </div>
                    </form>
                  </div>
                  <!-- /.card-footer-->
                </div>
                <!--/.direct-chat -->
              </div>
              <!-- /.col -->

              <div class="col-md-6">
                <!-- USERS LIST -->
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">User & Admin</h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <ul class="users-list clearfix">
                      @foreach($userlist as $user)
                      <li>
                        <img src="{{asset($user->profile_photo_path)}}" style="height: 70px; width:70px;"  alt="User Image">
                        <a class="users-list-name" href="#">{{$user->name}}</a>
                        <span class="users-list-date">{{$user->mobile}}</span>
                      </li>
                       @endforeach
                    </ul>
                    <!-- /.users-list -->
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer text-center">
                    <a href="{{url('user')}}">View All Users</a>
                  </div>
                  <!-- /.card-footer -->
                </div>
                <!--/.card -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- TABLE: LATEST ORDERS -->
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Latest Orders</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>Bill No</th>
                      <th>Partner</th>
                      <th>Status</th>
                      <th>Vessel</th>
                      <th>Imo</th>
                      <th>View</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach($bill as $bill)
                    <tr>
                      <td><a href="{{url('view/'.$bill->id)}}" target="_blank">{{$bill->billing}}</a></td>
                      <td>{{$bill->name}}</td>
                      <td> @if($bill->status==0)<span class="badge badge-danger">Process</span> @else <span class="badge badge-success">Shipped</span> @endif</td>
                      <td>
                        <div class="sparkbar" data-color="#00a65a" data-height="20">{{$bill->vessel}}</div>
                      </td>
                      <td>
                        <div class="sparkbar" data-color="#00a65a" data-height="20">{{$bill->imo}}</div>
                      </td>
                      <td><a href="{{url('view/'.$bill->id)}}" target="_blank"> <i class="fas fa-grin-hearts"></i></a></td>
                    </tr>
                       @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <a href="{{url('billing')}}" class="btn btn-sm btn-info float-left">Place Billing</a>
                <a href="{{url('complete')}}" class="btn btn-sm btn-secondary float-right">View All Completed</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->

          <div class="col-md-4">
            <!-- Info Boxes Style 2 -->
            <div class="info-box mb-3 bg-secondary">
              <span class="info-box-icon"><i class="fas fa-database"></i></span>
              @php $capital=DB::table('companies')->first(); @endphp 
              <div class="info-box-content">
                <span class="info-box-text">Company Balance</span>
                <span class="info-box-number">{{($capital->balance+$totalprofit->company)-$companyexpense1->total}} Tk</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-success">
              <span class="info-box-icon"><i class="far fa-heart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Partner Payable</span>
                <span class="info-box-number">{{$totalprofit->profit-$partnerpayment1->total}} Tk</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-danger">
              <span class="info-box-icon"><i class="fas fa-cloud-download-alt"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Partner Payment</span>
                <span class="info-box-number">{{$partnerpayment1->total}} Tk</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-info">
              <span class="info-box-icon"><i class="far fa-comment"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Partner</span>
                <span class="info-box-number">{{$totalpartner}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            @if(Auth::user()->role==1)
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">User Activation</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              @php 
              $users = DB::table('users')->where('id','>',1)->where('type',1)->get();
            @endphp
          <div class="card-footer bg-light p-0">
            <ul class="nav nav-pills flex-column">
              @foreach ($users as $users) 
                @if (Cache::has('user-is-online-' . $users->id))
              <li class="nav-item">
                <a href="#" class="nav-link">
                  {{$users->name}}
                  <span class="float-right text-success">
                    <i class="far fa-circle text-success"></i>
                  </span>
                </a>
              </li>
              @else 
              <li class="nav-item">
                <a href="#" class="nav-link">
                  {{$users->name}}
                  <span class="float-right text-warning">
                    <i class="far fa-circle text-danger"></i>
                  </span>
                </a>
              </li>
           @endif
            @endforeach
              
            </ul>
          </div>
          <!-- /.footer -->
        </div>
          @endif
            <!-- /.card -->

            <!-- PRODUCT LIST -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Recently Added Products</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <ul class="products-list product-list-in-card pl-2 pr-2">
                 @foreach($recentpro as $re)
                  <li class="item">
                    <div class="product-info">
                      <a href="javascript:void(0)" class="product-title">{{$re->name}}
                        <span class="badge badge-warning float-right">{{$re->price}} Tk.</span></a>
                      <span class="product-description">
                        This Product Code #{{$re->code}} and Unit {{$re->unit}}
                      </span>
                    </div>
                  </li>
               @endforeach

                </ul>
              </div>
              <!-- /.card-body -->
              <div class="card-footer text-center">
                <a href="{{url('product')}}" class="uppercase">View All Products</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->


@endsection