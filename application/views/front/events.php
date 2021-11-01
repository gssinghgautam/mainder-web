<?php include('headerFront.php'); ?>
      <!-- start portfolio -->
      <section class="section-padding">
         <h2 class="section-title wow fadeInUp" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">Events</h2>
        
         <!-- /.section-detail -->
         <div class="portfolio gallery-section wow fadeInUp" data-wow-delay="0.6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp;">
           <div class="container">
               <!-- <div class="isotope-filters portfolio-filter">
                  <button class="button is-checked" data-sort-by="original-order">ALL</button>
                  <button data-filter=".janmasthami">Janmasthami</button>
                  <button data-filter=".karwachauth">Karwachauth</button>
                  <button data-filter=".diwali">Diwali</button>
                  <button data-filter=".jagran">Jagran</button>
               </div> -->
               <!-- end isotope filer -->
            </div>
            <!-- end container -->
            <div class="clearfix portfolio-item isotope-items isotope-masonry-items">
           <?php if(!empty($eventInfo))
                           {
                              foreach ($eventInfo as $rs)
                              {?>
                               <!-- <p><?php echo $rs->event_id ?></p>
                               <p><?php echo $rs->event_name ?></p>
                               <p><?php echo $rs->image_path ?></p>
                               <p><?php echo $rs->event_date_and_time ?></p>
                               <p><?php echo $rs->exp_date_time ?></p>
                               <p><?php echo $rs->short_desc ?></p>
                               <p><?php echo $rs->long_desc ?></p> -->
                               
                               <div class="item janmasthami  effect-oscar">
                                 <img width="800" height="717" src="<?php echo base_url() ."uploads/events/".$rs->image_path."";  ?>" class="attachment-gallery-thumb wp-post-image" alt="gallery30" />
                                 <div class="item-description">
                                    <div class="item-link">
                                       <a class="boxer" data-boxer-height="500" data-boxer-width="500" href="<?php echo base_url() ."uploads/events/".$rs->image_path."";  ?>">
                                       <i class="fa plus-sign"></i>                                      
                                       </a>
                                    </div>                                    
                                    <!-- /.item-link -->
                                 </div>
                                 
                                 <!-- end item description -->
                              </div>                             
                              <!-- end item -->                                                                          
                              <?php }  } ?>  
            </div>
            <!-- /.gallery-item -->
         </div>
         <!-- end portfolio -->
      </section>
      <!-- /.gallery-section -->
      <?php include('footerFront.php'); ?>