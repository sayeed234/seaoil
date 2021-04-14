<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('layouts.login');
});

//Admin Dashboard ----------------------------------------------------------------------------------------------
Route::middleware(['auth:sanctum', 'verified','authadmin'])->group(function () {
    Route::group(["namespace"=>"App\Http\Controllers\Admin"],function() {
             Route::get('/refresh','DashboardController@refresh');
             Route::get('/dashboard', 'DashboardController@index')->name('admin.dashboard');
             Route::get('/profile', 'ProfileController@index')->name('admin.profile');
             Route::post('/password', 'ProfileController@password')->name('admin.password');
             //Company-----------------------------------------------------------------------
             Route::get('/company','ProfileController@company')->name('admin.company');
             Route::get('/company/edit/{id}','ProfileController@company_edit');
             Route::post('/comapny/update','ProfileController@company_update');
             Route::any('/capital','ProfileController@capital');
             Route::any('/capital_store','ProfileController@capital_store');
             Route::any('/capital_delete/{id}','ProfileController@capital_delete');



            //Users ..........................................................................................
             Route::get('/user','OutletController@outlet')->name('admin.outlet');
             Route::any('/user/store','OutletController@user_store')->name('admin.user.store');
             Route::any('/user/update','OutletController@user_update')->name('admin.user.update');
             Route::any('/user/edit/{id}','OutletController@user_edit')->name('admin.user.edit');
             Route::any('/user/delete/{id}','OutletController@user_delete')->name('admin.user.delete');
             Route::any('/user/salary/{id}','OutletController@user_salary')->name('admin.user.salary');
             //Expense Category----------------------------------------------------------------------------
             Route::any('/expense_category','OutletController@expense_category');
             Route::any('/expense_category_store','OutletController@expense_category_store');
             Route::any('/expense_category_edit/{id}','OutletController@expense_category_edit');
             Route::any('/expense_category_update','OutletController@expense_category_update');
             Route::any('/expense_category_delete/{id}','OutletController@expense_category_delete');
             //Company Expense------------------------------------------------------------------
             Route::any('/companyexpense','OutletController@companyexpense');
             Route::any('/companyexpense_store','OutletController@companyexpense_store');
             Route::any('/companyexpense_edit/{id}','OutletController@companyexpense_edit');
             Route::any('/companyexpense_update','OutletController@companyexpense_update');
             Route::any('/companyexpense_delete/{id}','OutletController@companyexpense_delete');
             Route::any('/dateexpense','OutletController@dateexpense');

            //Party----------------------------------------------------------------------------------------------
            Route::get('/party','PartyController@party');
            Route::post('/party_store','PartyController@party_store');
            Route::get('/party_edit/{id}','PartyController@party_edit');
            Route::post('/party_update','PartyController@party_update');
            Route::get('/party_delete/{id}','PartyController@party_delete');
            Route::get('/party_view/{id}','PartyController@party_view');
            // Product-------------------------------------------------------------------------------------------
            Route::get('/category','ProductController@category');
            Route::post('/category_store','ProductController@category_store');
            Route::get('/category_edit/{id}','ProductController@category_edit');
            Route::post('/category_update','ProductController@category_update');
            Route::get('/category_delete/{id}','ProductController@category_delete');

            Route::get('/product','ProductController@product');
            Route::post('/product_store','ProductController@product_store');
            Route::get('/product_edit/{id}','ProductController@product_edit');
            Route::post('/product_update','ProductController@product_update');
            Route::get('/product_delete/{id}','ProductController@product_delete');
            //Billing---------------------------------------------------------------------------------------------
            Route::any('/billing','BillingController@billing');
            Route::any('/confirm_bill','BillingController@confirm_bill');
            Route::any('/complete','BillingController@complete');
            Route::any('/billing_store','BillingController@billing_store');
            Route::any('/billing_edit/{id}','BillingController@billing_edit');
            Route::any('/billing_delete/{id}','BillingController@billing_delete');
            Route::any('/billing_update','BillingController@billing_update');
            Route::any('/returnbill/{id}','BillingController@returnbill');
            //-----------------------Expense---------------------------------------------------------------------
            Route::any('/billing_expense/{id}','BillingController@billing_expense');
            Route::any('/billing_expense_store','BillingController@billing_expense_store');
            Route::any('/billing_expense_edit/{id}','BillingController@billing_expense_edit');
            Route::any('/billing_expense_delete/{id}','BillingController@billing_expense_delete');
            Route::any('/billing_expense_update','BillingController@billing_expense_update');
            //-----------------------------------Purchase And Sale-----------------------------------------------
            Route::any('/sale/{id}/{hello}','BillingController@sale');
            Route::any('/cart','BillingController@cart');
            Route::any('/deletecart/{id}', 'BillingController@cartshow_delete');
            Route::any('/cartupdate', 'BillingController@cartshow_update');
            Route::any('/destroy', 'BillingController@destroy');
           //=======================Order==========================================================================
           Route::any('/order', 'BillingController@order');
           Route::any('/order_edit/{id}', 'BillingController@order_edit');
           Route::any('/order_delete/{id}', 'BillingController@order_delete');
           Route::any('/order_update', 'BillingController@order_update');
           Route::any('/view/{id}', 'BillingController@view');
           //=======================Payment======================================================================
           Route::any('/billing_payment/{id}','BillingController@billing_payment');
           Route::any('/billing_payment_store','BillingController@billing_payment_store');
           Route::any('/partnerpayment','BillingController@partnerpayment');
           Route::any('/partnerpayment_store','BillingController@partnerpayment_store');
           Route::any('/partnerpayment_edit/{id}','BillingController@partnerpayment_edit');
           Route::any('/partnerpayment_delete/{id}','BillingController@partnerpayment_delete');
           Route::any('/partnerpayment_update','BillingController@partnerpayment_update');
           //===========================Billing Report============================================================
           Route::any('/datewisebill','BillingController@datewisebill');
           Route::any('/partnerwisebill','BillingController@partnerwisebill');
           Route::any('/partnerstatement','BillingController@partnerstatement');
           Route::any('/partnerbalance','BillingController@partnerbalance');
          // Customer==========================================================================
          Route::any('/customer', 'CustomerController@customer');
          Route::any('/customer_store', 'CustomerController@customer_store');
          Route::any('/customer_edit/{id}', 'CustomerController@customer_edit');
          Route::any('/customer_update', 'CustomerController@customer_update');
          Route::any('/customer_delete/{id}', 'CustomerController@customer_delete');
          // ----------------------Sales-------------------------------------------------------
          Route::any('/customer_sale/{id}', 'CustomerController@customer_sale');
        //   Route::any('/customer_cart', 'CustomerController@customer_cart');
          Route::any('/corder', 'CustomerController@corder');
          Route::any('/corder_view/{id}', 'CustomerController@corder_view');
          Route::any('/corder_delete/{id}', 'CustomerController@corder_delete');
          //-----------------------All Sale-----------------------------------------------
          Route::any('/allsale', 'CustomerController@allsale');
          Route::any('/cpayment', 'CustomerController@cpayment');
          Route::any('/cpayment_store', 'CustomerController@cpayment_store');
          Route::any('/cpayment_update', 'CustomerController@cpayment_update');
          Route::any('/cpayment_edit/{id}', 'CustomerController@cpayment_edit');
          Route::any('/cpayment_delete/{id}', 'CustomerController@cpayment_delete');
          Route::any('/datewise', 'CustomerController@datewise');
          Route::any('/userwise', 'CustomerController@userwise');
          Route::any('/customerwise', 'CustomerController@customerwise');
          Route::any('/paymentreport', 'CustomerController@paymentreport');
          Route::any('/balance', 'CustomerController@balance');
         // Summary========================================================
         Route::get('/summary','OutletController@summary');

         //=============================Supplier------------------------------------------------
         Route::any('/supplier', 'SupplierController@supplier');
         Route::any('/supplier_store', 'SupplierController@supplier_store');
         Route::any('/supplier_edit/{id}', 'SupplierController@supplier_edit');
         Route::any('/supplier_update', 'SupplierController@supplier_update');
         Route::any('/supplier_delete/{id}', 'SupplierController@supplier_delete');
       //------------Purchase--------------------------------------------------------------------
         Route::any('/purchase/{id}', 'SupplierController@purchase');
         Route::any('/sorder', 'SupplierController@sorder');
         Route::any('/sorder_delete/{id}', 'SupplierController@sorder_delete');
         Route::any('/sorder_view/{id}', 'SupplierController@sorder_view');
       //----------------All Purchase-------------------------------------------------------
       Route::any('/allpurchase', 'SupplierController@allpurchase');
       Route::any('/spayment', 'SupplierController@spayment');
       Route::any('/spayment_store', 'SupplierController@spayment_store');
       Route::any('/spayment_update', 'SupplierController@spayment_update');
       Route::any('/spayment_edit/{id}', 'SupplierController@spayment_edit');
       Route::any('/spayment_delete/{id}', 'SupplierController@spayment_delete');
       Route::any('/datewisep', 'SupplierController@datewisep');
       Route::any('/userwisep', 'SupplierController@userwisep');
       Route::any('/supplierwise', 'SupplierController@supplierwise');
      Route::any('/ppaymentreport', 'SupplierController@ppaymentreport');
      Route::any('/sbalance', 'SupplierController@sbalance');  
 
});
});  

