<?php 

require "include/header.php";
require "include/time_ago.php";
?>
<style type="text/css">


</style>

    <?php if(isset($_SESSION['unique_id'])): ?>
    <section class="hero-area" style="background-color: #1977cc;">

        <div class="hero-inner">
            <div class="container">

               
              
              <div class="row justify-content-center">

                <div class="card maangas col-sm-12 col-md-12 col-lg-5 mt-5">
                  <div class="card-header" style="background: #fff">
                  <a class="btn btn-primary btn-sm mt-2" href="home">Back</a>
                  <p class="float-end mt-3">Notification</p>
                </div>
                   
                  <?php if ($count_total > 0): ?>
                    <?php foreach($notif_results as $row): 
                  $date = $row['date'];?>
                  <a href="<?= $row['link'] ?>">
                    <div class="row icon-box2 mt-2 mb-2">
                      <div class="col-2">
                        <?php if($row['status_icon'] == 'completed'): ?>
                      <i class="fa-solid fa-circle-check fs-2 mt-2 text-success"></i>
                    <?php elseif($row['status_icon'] == 'ready to pickup'): ?>
                      <i class="fa-solid fa-truck-pickup fs-2 mt-2 text-primary"></i>
                    <?php elseif($row['status_icon'] == 'in process'): ?>
                      <i class="fa-solid fa-file-signature fs-2 mt-2 text-secondary"></i>
                    <?php elseif($row['status_icon'] == 'verified'): ?>
                      <i class="fa-solid fa-circle-check fs-2 mt-2 text-primary"></i>
                    <?php elseif($row['status_icon'] == 'declined'): ?>
                      <i class="fa-solid fa-circle-xmark fs-2 mt-2 text-danger"></i>
                    <?php endif; ?>
                    </div>
                    <div class="col-10" style="text-align: left;">
                      
                      <h4 class="mb-0"><?= $row['notification'] ?></h4>
                      <span class="mt-0 fw-bold" style="font-size: 12px;"><?= $row['decline_mess'] ?></span>
                      <?php require_once 'include/time_ago.php'; ?> 
                        <p class="text-xs mt-2">
                          <i class="fa fa-clock"></i>
                           <?php echo facebook_time_ago($date); ?>
                        </p>
                    </div>
                  </div>
                    </a>
                    
                     <?php endforeach; ?>
                     <?php else: ?>
                    <div class="icon-box2 mt-2 mb-2">
                      
                      <h4>NO NOTIFICATION</h4>
                      
                    </div>
                  <?php endif; ?>
                  </div>
              </div>
               
              </div>
              
            </div>
        </div>
        <!--/ End Single Slider -->
    </section>

<?php endif; ?>


<?php require "include/footer.php" ?>