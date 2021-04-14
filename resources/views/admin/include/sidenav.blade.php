<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
<a href="{{route('admin.dashboard')}}" class="brand-link">
   @php $company=DB::table('companies')->first(); @endphp
      <img src="{{asset($company->image)}}" alt="{{$company->name}}" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">{{$company->name}}</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset(Auth::user()->profile_photo_path)}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
        <a href="{{route('admin.profile')}}" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div> 
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false"> 
          <li class="nav-item">
            <a href="{{url('refresh')}}" class="nav-link">
              <i class="fas fa-asterisk"></i>
              <p>Refresh</p>
            </a>
          </li>
          @if(Auth::user()->role==1)  
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-list"></i>
              <p>
                Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.company')}}" class="nav-link">
                  <i class=" nav-icon fas fa-building"></i>
                    <p>
                     My Company           
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('capital')}}" class="nav-link">
                    <i class="fas fa-balance-scale"></i>
                      <p>
                       My Capital           
                      </p>
                    </a>
                  </li>
                <li class="nav-item">
                  <a href="{{route('admin.outlet')}}" class="nav-link">
                      <i class="nav-icon fas fa-th"></i>
                      <p>
                       User List
                        <span class="right badge badge-info">HM</span>
                      </p>
                    </a>
                  </li>  
                  <li class="nav-item">
                    <a href="{{url('party')}}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                          Partner List
                        </p>
                      </a>
                 </li> 
                 <li class="nav-item">
                  <a href="{{url('customer')}}" class="nav-link">
                      <i class="nav-icon fas fa-users"></i>
                      <p>
                        Customer List
                      </p>
                    </a>
               </li>
               <li class="nav-item">
                <a href="{{url('supplier')}}" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                      Supplier List
                    </p>
                  </a>
             </li>
            </ul>
          </li> 
          @endif     
          <li class="nav-header"> Product Division</li>        
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-list"></i>
              <p>
                 Products
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('category')}}" class="nav-link">                 
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('product')}}" class="nav-link">                 
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product List</p>
                </a>
              </li>
              {{-- <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product Purchase</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/preport')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Purchase Report</p>
                </a>
              </li> --}}
            </ul>
          </li>  
          <li class="nav-header">Billing  & Sales & Purchase</li>      
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-money-bill-alt"></i>
              <p>
                Billing
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('billing')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Start Billing</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{url('partnerpayment')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Partner Payment</p>
                </a>
              </li>
              @if(Auth::user()->role==1) 
              <li class="nav-item">
                <a href="{{url('complete')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Complete Bill</p>
                </a>
              </li> 
              <li class="nav-item">
                <a href="{{url('datewisebill')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Date Wise Bill</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('partnerwisebill')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Partner Wise Bill</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('partnerstatement')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Partner Statement</p>
                </a>
              </li>
              {{-- <li class="nav-item">
                <a href="{{url('partnerbalance')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Partner Balance</p>
                </a>
              </li> --}}
              @endif
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-coins"></i>
              <p>
                Sales
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('customer_sale/0')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Sale</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('allsale')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All  Sales</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('cpayment')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Recive Payment</p>
                </a>
              </li>
              @if(Auth::user()->role==1)  
              <li class="nav-item">
                <a href="{{url('/datewise')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Date Wise Sale</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/userwise')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User Wise Sale</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/customerwise')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Customer Report</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/paymentreport')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Recive Payment Report</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/balance')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Customer Balance</p>
                </a>
              </li>
              @endif
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-cart-plus"></i>
              <p>
                 Purchase
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('purchase/0')}}" class="nav-link">                 
                  <i class="far fa-circle nav-icon"></i>
                  <p>Purchase</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('allpurchase')}}" class="nav-link">                 
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Purchase</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('spayment')}}" class="nav-link">                 
                  <i class="far fa-circle nav-icon"></i>
                  <p>Supplier Payment</p>
                </a>
              </li>
              @if(Auth::user()->role==1)  
          <li class="nav-item">
            <a href="{{url('/datewisep')}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Date Wise Purchase</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('/userwisep')}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>User Wise Purchase</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('/supplierwise')}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Supplier Report</p>
            </a>
          </li>
        <li class="nav-item">
            <a href="{{url('/ppaymentreport')}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Payment Report</p>
            </a>
          </li>
            <li class="nav-item">
            <a href="{{url('/sbalance')}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Supplier Balance</p>
            </a>
          </li>
          @endif

            </ul>
          </li>
          

          <li class="nav-header">Expense Module</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-user-minus"></i>
              <p>
                Expense History
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('expense_category')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Expense Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('companyexpense')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Company Expense </p>
                </a>
              </li>
              @if(Auth::user()->role==1)
              <li class="nav-item">
                <a href="{{url('dateexpense')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Date Wise Expense</p>
                </a>
              </li>
              @endif
            </ul>
          </li>
          @if(Auth::user()->role==1)
          <li class="nav-header">Report Module</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-hourglass-half"></i>
              <p>
               Report Sheet
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('summary')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Summary Report </p>
                </a>
              </li>
            </ul>
          </li> 
          @endif
        </ul>
      </nav>    
    </div>
  </aside>