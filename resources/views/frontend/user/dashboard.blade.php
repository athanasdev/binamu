@extends('frontend.layouts.app')

@section('title')
<title> Personal Data | {{ config('app.name') }}  </title>
<meta name="csrf-token" content="{{csrf_token()}}">
@endsection

@section('content')    


<section class="personal-data-area">
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-6">


            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif

              <div class="personal-data-wrapper">
                  <div class="top">
                      <h3>Personal Data</h3>
                  </div>
                  <ul>
                      <li><strong>Account</strong> <span>#{{ $user->unique_id }}</span></li>
                      <li><strong>Balance</strong> <span>{{ $user->balance }} Coins</span></li>


                      <li>
                        <strong>Password</strong> 
                        <span style="cursor: pointer" data-bs-toggle="modal" data-bs-target="#passwordEditModal">Update 
                          <span>
                            <i class="fa-solid fa-edit" style="color: #252595"></i>
                          </span> 
                        </span>
                      </li>


                      <li>
                        <strong>Trade Password</strong> 
                        <span style="cursor: pointer" data-bs-toggle="modal" data-bs-target="#tradepasswordEditModal">Update 
                          <span>
                            <i class="fa-solid fa-edit" style="color: #252595"></i>
                          </span> 
                        </span>
                      </li>

                      <li>
                        <strong>Bank Receipt Information</strong> 
                        <span style="cursor: pointer" data-bs-toggle="modal" data-bs-target="#BankReceiptInformationEditModal">Update 
                          <span>
                            <i class="fa-solid fa-edit" style="color: #252595"></i>
                          </span> 
                        </span>
                      </li>


                      <li>
                        <strong>Virtual currency account</strong> 
                        <span style="cursor: pointer" data-bs-toggle="modal" data-bs-target="#VirtualcurrencyaccountditModal">Update 
                          <span>
                            <i class="fa-solid fa-edit" style="color: #252595"></i>
                          </span> 
                        </span>
                      </li>




                  </ul>


                  @if($user->account_holder_name && $user->payment_method_id && $user->account_no)

                    <div class="payment_method_data" style="    border: 1px solid #cbffc8; border-radius: 10px; margin: 10px;  background: #ecffec; ">
                      <ul>
                        <li><strong>Payment method: </strong> <span>{{ $user->online_payment_method->name ?? '' }}</span></li>
                        <li><strong>Collection name: </strong> <span> {{ substr($user->account_holder_name, 0, 3) . str_repeat('*', strlen($user->account_holder_name) - 3) }}
                        </span></li>
                        <li><strong>Payment account: </strong> <span>{{ substr($user->account_no, 0, 3) . str_repeat('*', strlen($user->account_no) - 3) }}</span></li>
                    </ul>

                    </div>


                  @else

                  <div class="payment_method_data" style="border: 1px solid #cbffc8; border-radius: 10px; margin: 10px;  background: #ecffec; ">
                    <ul>
                      <li><strong>Payment method: </strong> <span></span></li>
                      <li><strong>Collection name: </strong> <span> 
                      </span></li>
                      <li><strong>Payment account: </strong> <span></span></li>
                  </ul>

                  </div>

                  @endif




                  @if($user->digital_payment_method_id && $user->address_to_receive)

                    <div class="payment_method_data" style="    border: 1px solid #cbffc8; border-radius: 10px; margin: 10px;  background: #ecffec; ">
                      <ul>
                        <li><strong>Virtual currency network: </strong> <span>{{ $user->digital_payment_method->name ?? '' }}</span></li>
                        <li><strong>Address to receive: </strong> <span> {{ substr($user->address_to_receive, 0, 3) . str_repeat('*', strlen($user->address_to_receive) - 3) }}
                        </span></li>
                    </ul>

                    </div>


                  @else

                  <div class="payment_method_data" style="border: 1px solid #cbffc8; border-radius: 10px; margin: 10px;  background: #ecffec; ">
                    <ul>
                      <li><strong>Virtual currency network: </strong> <span></span></li>
                      <li><strong>Address to receive: </strong> <span> 
                      </span></li>
                  </ul>

                  </div>

                  @endif


              </div>
          </div>
      </div>
  </div>
</section>



<div class="modal fade" id="tradepasswordEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Trade Password</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="{{ route('update_trade_password') }}" method="post">
        @csrf

        <div class="modal-body edit-modal-body">
       
          <div class="form-group mb-2">
              <label for="">Old trade password</label>
              <input type="password" name="old_password" class="form-control shadow-none" placeholder="Password" required>
          </div>

          <div class="form-group mb-2">
              <label for="">New trade password</label>
              <input type="password" name="password" class="form-control shadow-none" placeholder="New password" required>
          </div>
     
          
          <div class="form-group mb-2">
            <label for="">Retype new trade password</label>
            <input type="password" name="password_confirmation" class="form-control shadow-none" placeholder="Retype New password" required>
        </div>

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn shadow-none">Update</button>
      </div>


      </form>

    </div>
  </div>
</div>


<div class="modal fade" id="passwordEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Password</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="{{ route('update_password') }}" method="post">
        @csrf

          <div class="modal-body edit-modal-body">
        
            <div class="form-group mb-2">
                <label for="">Old password</label>
                <input type="password" name="old_password" class="form-control shadow-none" placeholder="Password" required>
            </div>

            <div class="form-group mb-2">
                <label for="">New password</label>
                <input type="password" name="password" class="form-control shadow-none" placeholder="New password" required>
            </div>
      
            
            <div class="form-group mb-2">
              <label for="">Retype new password</label>
              <input type="password" name="password_confirmation" class="form-control shadow-none" placeholder="Retype New password" required>
          </div>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn shadow-none">Update</button>
        </div>

      </form>

    </div>
  </div>
</div>






<div class="modal fade" id="BankReceiptInformationEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Bank Receipt Information</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="{{ route('update_bank_receipt_information') }}" method="post">
        @csrf

        <div class="modal-body edit-modal-body">
       
          <div class="form-group mb-2">
              <label for="">Payment Method</label>
              <select name="payment_method_id" class="form-control" id="" required>
                <option value="">Select</option>

                @foreach($online_methods as $item)
                  <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach

              </select>
          </div>
          <div class="form-group mb-2">
              <label for="">Collection name</label>
              <input type="text" name="account_holder_name" class="form-control shadow-none" placeholder="Collection name">
          </div>

          <div class="form-group mb-2">
            <label for="">Payment account </label>
            <input type="text" name="account_no" class="form-control shadow-none" placeholder="Payment account">
        </div>
   
     
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn shadow-none">Update</button>
      </div>

      </form>

    </div>
  </div>
</div>




<div class="modal fade" id="VirtualcurrencyaccountditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Virtual currency account</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('update_virtual_currency_account') }}" method="post">
        @csrf

        <div class="modal-body edit-modal-body">
       
          <div class="form-group mb-2">
              <label for="">Virtual currency network</label>
              <select name="digital_payment_method_id" class="form-control" id="" required>
                <option value="">Select</option>

                @foreach($digital_methods as $item)
                  <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach

              </select>
          </div>


          <div class="form-group mb-2">
            <label for=""> Address to receive </label>
            <input type="text" name="address_to_receive" class="form-control shadow-none" placeholder="Address to receive" required>
        </div>
   
     
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn shadow-none">Update</button>
      </div>

      </form>
    </div>
  </div>
</div>







@stop