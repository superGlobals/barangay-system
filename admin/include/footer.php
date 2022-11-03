<!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy;BIS Copyright <strong><span><?= date('Y');?></span></strong>. 
    </div>
  </footer><!-- End Footer -->
<?php require 'brgyInfo_modal.php'; ?>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="assets/js/sweet.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- jquery datepicker -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <?php 
  if (isset($_SESSION['success']) && $_SESSION['success'] != ''):
   ?>
   <script type="text/javascript">
     Swal.fire({
    title: "<?php echo $_SESSION['success']; ?>",
    // text: "You clicked the button!",
    icon: "<?php echo $_SESSION['success_status']; ?>",
    button: "Okay!",
    timer: 2000,
  });
   </script>

   <?php 
   unset($_SESSION['success']);
    endif;
    ?>

<!-- auto compute bdate -->
  <script>
 $(function() {
    $("#bdate").datepicker({
    onSelect: function(value, ui) {
        var today = new Date(),
            age = today.getFullYear() - ui.selectedYear;
        $('#age').val(age);
    },
       
    dateFormat: 'M-d-yy',changeMonth: true,changeYear: true,yearRange:"c-100:c+"
    });
      
});
  </script>

  <script>
 function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
    }                    
</script>

    <script type="text/javascript">
    prevImg.onchange = evt => {
    const [file] = prevImg.files
    if (file) {
      bobohaha.src = URL.createObjectURL(file)
    }
  }
  </script>

  <script>
     var tab = sessionStorage.getItem("tab") ? sessionStorage.getItem("tab"): "#basic-info";

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

    <script>
    
    function checkUsername() {

      jQuery.ajax({
        url: "function/checkUsernameFunction.php",
        data: 'username='+$("#username").val(),
        type: "POST",
        success: function(data){
          $("#check-username").html(data);
        },
        error: function(){}
      });
    }
  </script>

      <script>
    
    function checkUserUsername() {

      jQuery.ajax({
        url: "function/checkUsernameFunction.php",
        data: 'user_username='+$("#user_username").val(),
        type: "POST",
        success: function(data){
          $("#check-username").html(data);
        },
        error: function(){}
      });
    }
  </script>

    <script>
    
    function checkEmail() {

      jQuery.ajax({
        url: "function/checkUsernameFunction.php",
        data: 'email='+$("#email").val(),
        type: "POST",
        success: function(data){
          $("#check-email").html(data);
        },
        error: function(){}
      });
    }
  </script>


  <script type="text/javascript">
$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
</script>

<script type="text/javascript">
$(document).ready(function() {
    $('.js-example-basic-multiples').select2();
});
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#bobo').select2();
});
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#bobo1').select2();
});
</script>

<!-- goback function in modal -->
  <script>
    function goBack() {
  window.history.go(-1);
}
  </script>

<!-- close modal -->
<?php if(!isset($_GET['closeModal'])){ ?>
            
<script>
    setTimeout(function(){ openModal(); }, 100);
</script>
<?php } ?>

<!-- auto open modal -->
<script>
   function openModal(){
      $('#payment').modal('show');
  }
</script>

<!-- force close modal -->
<script>
   $(document).ready(function () {
    $('#payment').modal({
           backdrop: 'static',
           keyboard: false
    })
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
  $(document).ready(function(){
    $("#qwe").on("click", function(){
      $.ajax({
        url: "qwe.php",
        success: function(res){
          console.log(res);
        }
      });
    });
  });

</script>

