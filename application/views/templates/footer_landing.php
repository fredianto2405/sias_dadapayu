 <!-- Argon Scripts -->
 <!-- Core -->
 <script src="<?php echo base_url(); ?>assets/vendor/jquery/dist/jquery.min.js"></script>
 <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
 <script src="<?php echo base_url(); ?>assets/vendor/js-cookie/js.cookie.js"></script>
 <script src="<?php echo base_url(); ?>assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
 <script src="<?php echo base_url(); ?>assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
 <script src="<?php echo base_url(); ?>/assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
 <!-- Argon JS -->
 <script src="<?php echo base_url(); ?>assets/js/argon.min.js"></script>

 <script>
   // Autocomplete
   $('form').attr('autocomplete', 'off');

   // Datepicker
   $('#tanggal_lahir').datepicker({
     format: 'yyyy-mm-dd',
   });
 </script>
 </body>

 </html>