 <!-- SCRIPTS -->

 <!-- JQUERY JS -->
 <script src="<?= base_url() ?>assets/auth/plugins/jquery/jquery.min.js"></script>

 <!-- BOOTSTRAP JS -->
 <script src="<?= base_url() ?>assets/auth/plugins/bootstrap/js/popper.min.js"></script>
 <script src="<?= base_url() ?>assets/auth/plugins/bootstrap/js/bootstrap.min.js"></script>

 <!-- PERFECT SCROLLBAR JS -->
 <script src="<?= base_url() ?>assets/auth/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>

 <!-- SELECT2 JS -->
 <script src="<?= base_url() ?>assets/auth/plugins/select2/js/select2.min.js"></script>
 <script src="<?= base_url() ?>assets/auth/js/select2.js"></script>



 <!-- COLOR THEME JS -->
 <script src="<?= base_url() ?>assets/auth/js/themeColors.js"></script>

 <!-- CUSTOM JS -->
 <script src="<?= base_url() ?>assets/auth/js/custom.js"></script>

 <!-- SWITCHER JS -->
 <script src="<?= base_url() ?>assets/auth/switcher/js/switcher.js"></script>

 <!-- END SCRIPTS -->

 <script src=" https://cdn.jsdelivr.net/npm/notiflix@3.2.6/dist/notiflix-aio-3.2.6.min.js "></script>
 <!-- END SCRIPTS -->

 <!-- SHOW TOASTR NOTIFIVATION -->
 <?php if ($this->session->flashdata('success_message') != "") : ?>
 	<script type="text/javascript">
 		Notiflix.Notify.success("<?php echo $this->session->flashdata("success_message"); ?>", {
 			timeout: 5923,
 			showOnlyTheLastOne: true,
 		});
 	</script>
 <?php endif; ?>
 <?php if ($this->session->flashdata('error_message') != "") : ?>
 	<script type="text/javascript">
 		Notiflix.Notify.failure("<?php echo $this->session->flashdata("error_message"); ?>", {
 			timeout: 5923,
 			showOnlyTheLastOne: true,
 		});
 	</script>
 <?php endif; ?>

 </body>

 </html>
