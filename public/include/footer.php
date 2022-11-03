  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; <?= date('Y') ?> <strong><span>Barangay <?= $brgy_info['brgy'] ?></span></strong>
      </div>
    </div>
  </footer><!-- End  Footer -->

  <!-- <div id="preloader"></div> -->
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="public/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="public/assets/vendor/aos/aos.js"></script>
  <script src="public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="public/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="public/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="public/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="public/assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="public/assets/vendor/php-email-form/validate.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="admin/assets/js/sweet.js"></script>
  <!-- <script type="text/javascript" src="public/assets/datatables/pdfmake-0.1.36/pdfmake.min.js"></script>
  <script type="text/javascript" src="public/assets/datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
  <script type="text/javascript" src="public/assets/datatables/datatables.min.js"></script> -->

  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.colVis.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>

  <!-- Template Main JS File -->
  <script src="public/assets/js/main.js"></script>
    <script src="public/assets/js/wow.min.js"></script>

      <?php 
  if (isset($_SESSION['success']) && $_SESSION['success'] != ''):
   ?>
   <script type="text/javascript">
     Swal.fire({
    title: "<?php echo $_SESSION['success']; ?>",
    // text: "You clicked the button!",
    icon: "<?php echo $_SESSION['success_status']; ?>",
    button: "Okay!",
    timer: 3000,
  });
   </script>

   <?php 
   unset($_SESSION['success']);
    endif;
    ?>

         <?php 
  if (isset($_SESSION['message']) && $_SESSION['message'] != ''):
   ?>
   <script type="text/javascript">
     Swal.fire({
    title: "<?php echo $_SESSION['message']; ?>",
    // text: "You clicked the button!",
    icon: "<?php echo $_SESSION['message_status']; ?>",
    button: "Okay!",
    // timer: 3000,
  });
   </script>

   <?php 
   unset($_SESSION['message']);
    endif;
    ?>

  <script type="text/javascript">
    prevImg.onchange = evt => {
    const [file] = prevImg.files
    if (file) {
      bobohaha.src = URL.createObjectURL(file)
    }
  }
  </script>

  <script>
 $(document).ready( function () {
    $('#myTable').DataTable();
} );
  </script>

  <script>
    jQuery(document).ready(function(){
        jQuery("#opt12").hide();
        

        jQuery("#payment_type").change(function(){ 
            var x = jQuery(this).val();         
            if(x == 'Cash on pick-up') {
                jQuery("#opt12").hide();
                $("#required").attr("required", false);
            } else if(x == 'Gcash') {
                jQuery("#opt12").show();
                $("#required").attr("required", true);

            } 
            else {
                jQuery("#opt11").hide();

     
            }
        });
        
    });
</script>


   <script>
     var tab = sessionStorage.getItem("tab") ? sessionStorage.getItem("tab"): "#profile";

  function show_tab(tab_name)
  {
    const someTabTriggerEl = document.querySelector(tab_name +"-tab");
    const tab = new bootstrap.Tab(someTabTriggerEl);

    tab.show();

  }

  function set_tab(tab_name)
  {
    tab = tab_name;
    sessionStorage.setItem("tab", tab_name);
  }

  window.onload = function(){

    show_tab(tab);
  }
  </script>


  <script type="module">
  import Swiper from 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.esm.browser.min.js'

  const swiper = new Swiper(...)
  const swiper = new Swiper('.swiper', {
  // Optional parameters
  direction: 'vertical',
  loop: true,

  // If we need pagination
  pagination: {
    el: '.swiper-pagination',
  },

  // Navigation arrows
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },

  // And if we need scrollbar
  scrollbar: {
    el: '.swiper-scrollbar',
  },
});
</script>

<!-- auto update notif in database -->
<script>
  $(document).ready(function(){
    $("#notifications").on("click", function(){
      $.ajax({
        url: "notifFunction.php",
        success: function(res){
          console.log(res);
        }
      });
    });
  });

</script>



 <script>
  function validate(){
    var pass = document.getElementById('pass1');
    var len = document.getElementById('length');
    var num = document.getElementById('number');
    var up = document.getElementById('upper');

    if(pass.value.length < 8){
      len.style.color = 'red';

    }else{
      len.style.color ='green';
    }

    if(pass.value.match(/[0-9]/)){
      num.style.color = 'green';

    }else{
      num.style.color ='red';
    }

    if(pass.value.match(/[A-Z]/)){
      up.style.color = 'green';

    }else{
      up.style.color ='red';
    }

  }
  </script>

   <script>
 $(function() {
    $("#bdate").datepicker({
    onSelect: function(value, ui) {
        var today = new Date(),
            age = today.getFullYear() - ui.selectedYear;
        $('#age').val(age);
    },
       
    dateFormat: 'mm-dd-yy',changeMonth: true,changeYear: true,yearRange:"c-100:c+"
    });
      
});
  </script>

    <script>
    $(".toggle-password").click(function() {

$(this).toggleClass("fa-eye fa-eye-slash");
var x = document.getElementById("pass1");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
});
  </script>


    <script>
    $(".toggle-password2").click(function() {

$(this).toggleClass("fa-eye fa-eye-slash");
var x = document.getElementById("pass2");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
});
  </script>

  <script>
  function lettersOnly(input){
    var regex = /[^a-z ]/gi;
    input.value = input.value.replace(regex, "");
  }
</script>

<!--letters and numbers only -->
<script>
  function letternumberssOnly(input){
    var regex = /[^a-z 0-9 _ . @]/gi;
    input.value = input.value.replace(regex, "");
  }
</script>

 <script>
 $(function() {
    $("#bdate").datepicker({
    onSelect: function(value, ui) {
        var today = new Date(),
            age = today.getFullYear() - ui.selectedYear;
        $('#age').val(age);
    },
       
    dateFormat: 'mm-dd-yy',changeMonth: true,changeYear: true,yearRange:"c-100:c+100"
    });
      
});
  </script>

</body>

</html>