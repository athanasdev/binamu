    


    <div class="tab-pane active" id="siteInfo">

        <form class="form-horizontal" action="{{route('save-site-info')}}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="row">


                <div class="col-md-2">
                  <div class="form-group">
                      <label for="inputName" class="col-form-label">Site Name</label>
                      <input type="text" name="site_name" class="form-control" id="inputName" value="{{ $site_info->site_name ?? '' }}">
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                      <label for="inputName" class="col-form-label">Email</label>
                      <input type="text" name="email" class="form-control" id="inputName" value="{{ $site_info->email ?? '' }}">
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                      <label for="inputName" class="col-form-label">Min Bet</label>
                      <input type="text" name="min_bet" class="form-control" id="inputName" value="{{ $site_info->min_bet ?? '' }}">
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                      <label for="inputName" class="col-form-label">Rate ( 1 Coin = ? Taka )</label>
                      <input type="number" step="0.01" name="rate" class="form-control" id="inputName" value="{{ $site_info->rate ?? '1' }}">
                  </div>
                </div>



                <div class="col-md-2">
                  <div class="form-group">
                      <label for="inputName" class="col-form-label">Min Deposit ( Online - Coins )</label>
                      <input type="number" name="min_deposit_online" class="form-control" id="inputName" value="{{ $site_info->min_deposit_online ?? '' }}" required>
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                      <label for="inputName" class="col-form-label">Max Deposit ( Online - Coins )</label>
                      <input type="number" name="max_deposit_online" class="form-control" id="inputName" value="{{ $site_info->max_deposit_online ?? '' }}" required>
                  </div>
                </div>

          
                <div class="col-md-2">
                  <div class="form-group">
                      <label for="inputName" class="col-form-label">Min withdraw ( Online - Coins )</label>
                      <input type="number" name="min_withdraw_online" class="form-control" id="inputName" value="{{ $site_info->min_withdraw_online ?? '' }}" required>
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                      <label for="inputName" class="col-form-label">Max withdraw ( Online - Coins )</label>
                      <input type="number" name="max_withdraw_online" class="form-control" id="inputName" value="{{ $site_info->max_withdraw_online ?? '' }}" required>
                  </div>
                </div>



                <div class="col-md-2">
                  <div class="form-group">
                      <label for="inputName" class="col-form-label">Rate ( 1 Coin = ? USDT )</label>
                      <input type="number" step="0.01" name="rate_usdt" class="form-control" id="inputName" value="{{ $site_info->rate_usdt ?? '1' }}">
                  </div>
                </div>


                <div class="col-md-2">
                  <div class="form-group">
                      <label for="inputName" class="col-form-label">Min Deposit ( USDT  - Coins)</label>
                      <input type="number" name="min_deposit_usdt" class="form-control" id="inputName" value="{{ $site_info->min_deposit_usdt ?? '' }}" required>
                  </div>
                </div>


                <div class="col-md-2">
                  <div class="form-group">
                      <label for="inputName" class="col-form-label">Max Deposit ( USDT  - Coins)</label>
                      <input type="number" name="max_deposit_usdt" class="form-control" id="inputName" value="{{ $site_info->max_deposit_usdt ?? '' }}" required>
                  </div>
                </div>


                <div class="col-md-2">
                  <div class="form-group">
                      <label for="inputName" class="col-form-label">Min withdraw ( USDT  - Coins)</label>
                      <input type="number" name="min_withdraw_usdt" class="form-control" id="inputName" value="{{ $site_info->min_withdraw_usdt ?? '' }}" required>
                  </div>
                </div>


                <div class="col-md-2">
                  <div class="form-group">
                      <label for="inputName" class="col-form-label">Max withdraw ( USDT  - Coins)</label>
                      <input type="number" name="max_withdraw_usdt" class="form-control" id="inputName" value="{{ $site_info->max_withdraw_usdt ?? '' }}" required>
                  </div>
                </div>


                <div class="col-md-2">
                  <div class="form-group">
                      <label for="inputName" class="col-form-label">Depost 1st Level Commission</label>
                      <input type="number" name="first_level_commission" class="form-control" id="inputName" value="{{ $site_info->first_level_commission ?? '' }}" required>
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                      <label for="inputName" class="col-form-label">Depost 2nd Level Commission</label>
                      <input type="number" name="second_level_commission" class="form-control" id="inputName" value="{{ $site_info->second_level_commission ?? '' }}" required>
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                      <label for="inputName" class="col-form-label">Depost 3rd Level Commission</label>
                      <input type="number" name="third_level_commission" class="form-control" id="inputName" value="{{ $site_info->third_level_commission ?? '' }}" required>
                  </div>
                </div>


                <div class="col-md-2">
                  <div class="form-group">
                      <label for="inputName" class="col-form-label">Bet 1st Level Commission</label>
                      <input type="number" name="bet_first_level_commission" class="form-control" id="inputName" value="{{ $site_info->bet_first_level_commission ?? '' }}" required>
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                      <label for="inputName" class="col-form-label">Bet 2nd Level Commission</label>
                      <input type="number" name="bet_second_level_commission" class="form-control" id="inputName" value="{{ $site_info->bet_second_level_commission ?? '' }}" required>
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                      <label for="inputName" class="col-form-label">Bet 3rd Level Commission</label>
                      <input type="number" name="bet_third_level_commission" class="form-control" id="inputName" value="{{ $site_info->bet_third_level_commission ?? '' }}" required>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group">
                      <label for="inputName" class="col-form-label">Marquee</label>
                      <input type="text" name="marquee" class="form-control" id="inputName" value="{{ $site_info->marquee ?? '' }}">
                  </div>
                </div>


<!--                 <div class="col-md-12">
                  <div class="form-group">
                      <label for="inputName" class="col-form-label">today_click</label>
                      <input type="text" name="today_click" class="form-control" id="inputName" value="{{ $site_info->today_click ?? '' }}">
                  </div>
                </div>



                <div class="col-md-4">
                  <div class="form-group">
                      <label for="inputName" class="col-form-label">coin_equal_taka</label>
                      <input type="number" name="coin_equal_taka" class="form-control" id="inputName" value="{{ $site_info->coin_equal_taka ?? '' }}">
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                      <label for="inputName" class="col-form-label">max_watch_ads</label>
                      <input type="number" name="max_watch_ads" class="form-control" id="inputName" value="{{ $site_info->max_watch_ads ?? '' }}">
                  </div>
                </div>


                <div class="col-md-4">
                  <div class="form-group">
                      <label for="inputName" class="col-form-label">max_lucky_spin</label>
                      <input type="number" name="max_lucky_spin" class="form-control" id="inputName" value="{{ $site_info->max_lucky_spin ?? '' }}">
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                      <label for="inputName" class="col-form-label">daily_checkin_bonus</label>
                      <input type="number" name="daily_checkin_bonus" class="form-control" id="inputName" value="{{ $site_info->daily_checkin_bonus ?? '' }}">
                  </div>
                </div>


                <div class="col-md-4">
                  <div class="form-group">
                      <label for="inputName" class="col-form-label">watch_and_earn</label>
                      <input type="number" name="watch_and_earn" class="form-control" id="inputName" value="{{ $site_info->watch_and_earn ?? '' }}">
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                      <label for="inputName" class="col-form-label">lucky_spin</label>
                      <input type="number" name="lucky_spin" class="form-control" id="inputName" value="{{ $site_info->lucky_spin ?? '' }}">
                  </div>
                </div> -->


<!--                 <div class="col-md-4">
                  <div class="form-group">
                      <label for="inputName" class="col-form-label">Slogan</label>
                      <input type="text" name="slogan" class="form-control" id="inputName" value="{{ $site_info->slogan ?? '' }}">
                  </div>
                </div>


                <div class="col-md-3">
                  <div class="form-group">
                      <label for="inputName" class="col-form-label">Contact Number</label>
                      <input type="text" name="contact_number" class="form-control" id="inputName" value="{{ $site_info->contact_number ?? '' }}">
                  </div>
                </div>
 -->





<!-- 
                 <div class="col-md-4">
                  <div class="form-group">
                      <label for="inputName" class="col-form-label">Refer commission ( Coins )</label>
                      <input type="text" name="refer_commission" class="form-control" id="inputName" value="{{ $site_info->refer_commission ?? '' }}">
                  </div>
                </div>


                 <div class="col-md-4">
                  <div class="form-group">
                      <label for="inputName" class="col-form-label">rating</label>
                      <input type="text" name="rating" class="form-control" id="inputName" value="{{ $site_info->rating ?? '' }}">
                  </div>
                </div>


                 <div class="col-md-4">
                  <div class="form-group">
                      <label for="inputName" class="col-form-label">app_share_link</label>
                      <input type="text" name="app_share_link" class="form-control" id="inputName" value="{{ $site_info->app_share_link ?? '' }}">
                  </div>
                </div> -->



<!--                 <div class="col-md-12">
                  <div class="form-group">
                      <label for="inputName" class="col-form-label">Address</label>
                      <input type="text" name="address" class="form-control" id="inputName" value="{{ $site_info->address ?? '' }}">
                  </div>
                </div> -->

                <hr>


                <div class="col-md-12">
                  <div class="form-group">
                      <label for="inputName" class="col-form-label" style="font-size: 25px;"><u>Social Links</u></label>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                      <label for="inputName" class="col-form-label">Facebook</label>
                      <input type="text" name="facebook" class="form-control" id="inputName" value="{{ $site_info->facebook ?? '' }}">
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                      <label for="inputName" class="col-form-label">Whatsapp</label>
                      <input type="text" name="whatsapp" class="form-control" id="inputName" value="{{ $site_info->whatsapp ?? '' }}">
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                      <label for="inputName" class="col-form-label">Youtube</label>
                      <input type="text" name="youtube" class="form-control" id="inputName" value="{{ $site_info->youtube ?? '' }}">
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                      <label for="inputName" class="col-form-label">Insta</label>
                      <input type="text" name="insta" class="form-control" id="inputName" value="{{ $site_info->insta ?? '' }}">
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                      <label for="inputName" class="col-form-label">Linkedin</label>
                      <input type="text" name="linkedin" class="form-control" id="inputName" value="{{ $site_info->linkedin ?? '' }}">
                  </div>
                </div>



                <div class="col-md-4">
                  <div class="form-group">
                      <label for="inputName" class="col-form-label">Online Service link</label>
                      <input type="text" name="one_line_service_link" class="form-control" id="inputName" value="{{ $site_info->one_line_service_link ?? '' }}">
                  </div>
                </div>


                <div class="col-md-12">
                  <div class="form-group">
                      <label for="inputName" class="col-form-label">Notice</label>

                      <textarea name="notice" class="summernote" cols="30" rows="10">{!! $site_info->notice ?? '' !!}</textarea>
                  </div>
                </div>

 
                <div class="col-md-12">
                  <div class="form-group">
                      <label for="inputName" class="col-form-label">Recharge Note</label>

                      <textarea name="privacy" class="summernote" cols="30" rows="10">{!! $site_info->privacy ?? '' !!}</textarea>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group">
                      <label for="inputName" class="col-form-label">About Us</label>

                      <textarea name="about_us" class="summernote" cols="30" rows="10">{!! $site_info->about_us ?? '' !!}</textarea>
                  </div>
                </div>

                {{-- <div class="col-md-12">
                  <div class="form-group">
                      <label for="inputName" class="col-form-label">contact_us</label>

                      <textarea name="contact_us" class="summernote" cols="30" rows="10">{!! $site_info->contact_us ?? '' !!}</textarea>
                  </div>
                </div>  --}}

                <div class="col-md-12">
                  <div class="form-group">
                      <button type="submit" class="btn btn-primary" style="float: right;">Submit</button>
                  </div>
                </div>



            </div>



      </form>
    </div>