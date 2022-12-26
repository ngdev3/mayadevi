<main class="main-content bgc-grey-100">
   <div id="mainContent">
      <?= get_flashdata(); ?>
      <h4 class="c-grey-900 mT-10 mB-30">Dashboard
         <i class="c-red-500 ti-eye show" id="clickToShow"></i>
         <i class="c-red-500 ti-slice hide" id="clickToHide"></i>
      </h4>
      <?php if (get_logical_data()->status) { ?>
         <div class="container">
            <div class="row hide" id="stats">
               <div class="col-1">KisanVahi Date</div>
               <div class="col-1">
                  <input type="" id="datepicker" name="activeKishan" class="form-control" placeholder="Latest KisanVahi">
               </div>

               <div class="col-2 " id="total_quant" style="font-size: 13px; font-weight: 600; color:blue"></div>
               <div class="col-2 " style="font-size: 13px; font-weight: 600; color:green">Total Kishan Vahi <?php echo number_format(@$totalrealtimeCenterSum, 2); ?></div>
               <div class="col-2  " style="font-size: 13px; font-weight: 600; color:orange">Pending Lot <?php
                                                                                                         $cal = @$status_report;
                                                                                                         echo  $cal['pending_lot']->pending_lot;;
                                                                                                         ?></div>
               <div class="col-2 " id="total_quant" style="font-size: 13px; font-weight: 600; color:black">Accepted Lot: <?php echo  $cal['accept_lot']->accept_lot; ?></div>
               <div class="col-2  " id="total_quant" style="font-size: 13px; font-weight: 600; color:red">Hold Lot: <?php echo  $cal['hold_lot']->hold_lot;; ?></div>
            </div>
         </div>
         <hr>
         <div class="container">
            <div class="row">

               <div style="display: inline-flex;">
                  <div class="col-4">
                     <a href="javascript:void(0)" style="text-decoration:underline">Last Active Parcha: <?php echo $ActiveParcha['activeParcha']; ?></a>

                  </div>

                  <div class="col-4">
                     <a href="<?php echo base_url('/admin/dashboard/mydata') ?>"><button type="button" class="btn btn-success  btn-lg "> Auto Sync </button></a>

                  </div>

                  <div class="col-4">
                     <a href="https://pages.razorpay.com/pl_K3QkvyJwwfFFeP/view" target="_blank"><button type="button" class="btn btn-danger  btn-lg "> Pay Now </button></a>

                  </div>
               </div>
            </div>
         </div>

         <hr>
         <div>
            <h5>Center Wise Lot System</h5>
         </div>
         <div id="mainContent">
            <div class="row gap-20 masonry pos-r">
               <div class="masonry-sizer col-md-6"></div>
               <div class="masonry-item w-100">
                  <div class="row gap-20">
                     <?php if (!empty($RealTimeLotStatus)) {
                        foreach ($RealTimeLotStatus as $x => $val) { ?>
                           <div class="col-md-3 text-center">
                              <a href="Javascript:void(0)">
                                 <div class="layers bd bgc-white p-20">

                                    <div class="layer w-100 mB-20">

                                       <h6 class="lh-1"><?php echo ($val->CenterName); ?></h6>

                                    </div>
                                    <div class="layer w-100">
                                       <div class="peers ai-sb fxw-nw">
                                          <!--<div class="peer peer-greed"><span id="sparklinedash3"></span></div>-->
                                          <div class="peer"><span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-purple-50 c-purple-500"><?php if (!empty($val->CenterName)) {
                                                                                                                                                      echo @$val->TotalLot;
                                                                                                                                                   } else {
                                                                                                                                                      echo "0";
                                                                                                                                                   } ?></span></div>
                                       </div>
                                    </div>
                                 </div>
                              </a>
                           </div>
                     <?php }
                     } ?>

                  </div>
               </div>
            </div>

            <hr>
            <div>
               <h5>Center Wise Paddy System</h5>
            </div>

            <div class="row gap-20 masonry pos-r">
               <div class="masonry-sizer col-md-6"></div>
               <div class="masonry-item w-100">
                  <div class="row gap-20">
                     <?php if (!empty($RealTimeDataCount)) {
                        foreach ($RealTimeDataCount['first'] as $x => $val) { ?>
                           <div class="col-md-3 text-center">
                              <a href="Javascript:void(0)">
                                 <div class="layers bd bgc-white p-20">

                                    <div class="layer w-100 mB-20">

                                       <h6 class="lh-1"><?php echo ($val->name); ?></h6>

                                    </div>
                                    <div class="layer w-100">
                                       <div class="peers ai-sb fxw-nw">
                                          <!--<div class="peer peer-greed"><span id="sparklinedash3"></span></div>-->
                                          <div class="peer"><span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-purple-50 c-purple-500"><?php if (!empty($val->name)) {
                                                                                                                                                      echo @$val->totalQuant;
                                                                                                                                                   } else {
                                                                                                                                                      echo "0";
                                                                                                                                                   } ?></span></div>
                                       </div>
                                    </div>
                                 </div>
                              </a>
                           </div>
                     <?php }
                     } ?>

                  </div>
               </div>
            </div>
            <div class="row gap-20 masonry pos-r">
               <div class="masonry-sizer col-md-6"></div>
               <div class="masonry-item w-100">
                  <div class="row gap-20" id="repeat">

                  </div>
               </div>
            </div>

         </div>
      <?php } ?>

</main>
<script>
   $(document).ready(function() {


      $(function() {
         $("#datepicker").datepicker({

            dateFormat: "dd-mm-yy",
            "setDate": '01-11-2020'
         });
         var today = new Date();
         var dd = String(today.getDate()).padStart(2, '0');
         var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
         var yyyy = today.getFullYear();
         today = dd + '-' + mm + '-' + yyyy;
         $("#datepicker").val(today);

         $('#datepicker').trigger("change");
      });

      $("#datepicker").change(() => {



         $.ajax({
            url: "<?php echo base_url(); ?>admin/dashboard/getmylatestkisanvahi",
            type: "POST",
            data: {
               activeKishan: $('#datepicker').val()
            }, //our data
            dataType: 'json',
            success: function(a) {
               var html = '';
               $('#repeat').html(html)
               var totalquant = 0;
               $.each(a, function(key, value) {
                  //For example
                  console.log(value)
                  html += ` 
                           <div class="col-md-3 text-center">
                               <a href="Javascript:void(0)">
                                    <div class="layers bd bgc-white p-20">
                              
                                    <div class="layer w-100 mB-20">
                                    
                                    <h6 class="lh-1">` + value.name + ` </h6>
                                    <h6 class="lh-1">( ` + $('#datepicker').val() + ` )</h6>
          
                                    </div>
                                    <div class="layer w-100">
                                          <div class="peers ai-sb fxw-nw">
                                          <div class="peer"><span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-purple-50 c-purple-500">` + value.quant + `</span></div>
                                          <div class="peer"><span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-purple-50 c-purple-500">` + value.totalKisan + `</span></div>
                                          </div>
                                    </div>
                                    </div>
                                 </a>
                              </div>
                           `;

                  totalquant += parseFloat(value.quant);
                  $('#repeat').html(html);
               })
               $('#total_quant').text("Today Total Kishan  " + totalquant.toFixed(2))
               console.log(totalquant)
            },
            error: function() {
               alert("Error");
            }
         });

      });

      $('#clickToShow').click(
         () => {
            $('#stats').removeClass('hide').addClass('show')
            $('#clickToShow').addClass('hide')
            $('#clickToHide').removeClass('hide').addClass('show')
         }
      );
      $('#clickToHide').click(
         () => {
            $('#stats').removeClass('show').addClass('hide');
            $('#clickToHide').addClass('hide')
            $('#clickToShow').removeClass('hide').addClass('show')
         }
      );
      $("#contactInfo_next").click(function() {
         $(".info-tab-contianer:nth-child(1) p").css("border-bottom", "none");
         $(".info-tab-contianer:nth-child(2) p").css("border-bottom", "2px solid #2196f3");
         $(".alpha_num_a").hide();
         $(".alpha_num_b").show();
      });
      $("#companyInfo_back").click(function() {
         $(".info-tab-contianer:nth-child(2) p").css("border-bottom", "none");
         $(".info-tab-contianer:nth-child(1) p").css("border-bottom", "2px solid #2196f3");
         $(".alpha_num_b").hide();
         $(".alpha_num_a").show();
      });
   });
</script>