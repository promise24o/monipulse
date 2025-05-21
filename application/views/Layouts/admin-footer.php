<!-- SCRIPTS -->

<!-- BACK TO TOP -->
<a href="#top" id="back-to-top"><i class="fe fe-arrow-up"></i></a>

<!-- JQUERY JS -->
<script src="https://php.spruko.com/spruha/spruha/assets/plugins/jquery/jquery.min.js"></script>

<!-- BOOTSTRAP JS -->
<script src="https://php.spruko.com/spruha/spruha/assets/plugins/bootstrap/js/popper.min.js"></script>
<script src="https://php.spruko.com/spruha/spruha/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<!-- PERFECT SCROLLBAR JS -->
<script src="https://php.spruko.com/spruha/spruha/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>

<!-- SIDEMENU JS -->
<script src="https://php.spruko.com/spruha/spruha/assets/plugins/sidemenu/sidemenu.js" id="leftmenu"></script>

<!-- SIDEBAR JS -->
<script src="https://php.spruko.com/spruha/spruha/assets/plugins/sidebar/sidebar.js"></script>

<!-- SELECT2 JS -->
<script src="https://php.spruko.com/spruha/spruha/assets/plugins/select2/js/select2.min.js"></script>
<script src="https://php.spruko.com/spruha/spruha/assets/js/select2.js"></script>

<!-- Internal Chart.Bundle js-->
<script src="https://php.spruko.com/spruha/spruha/assets/plugins/chart.js/Chart.bundle.min.js"></script>

<!-- Peity js-->
<script src="https://php.spruko.com/spruha/spruha/assets/plugins/peity/jquery.peity.min.js"></script>

<!-- Internal Morris js -->
<script src="https://php.spruko.com/spruha/spruha/assets/plugins/raphael/raphael.min.js"></script>
<script src="https://php.spruko.com/spruha/spruha/assets/plugins/morris.js/morris.min.js"></script>

<!-- Circle Progress js-->
<script src="https://php.spruko.com/spruha/spruha/assets/plugins/circle-progress/circle-progress.min.js"></script>
<script src="https://php.spruko.com/spruha/spruha/assets/js/chart-circle.js"></script>

<!-- Internal Dashboard js-->
<script src="https://php.spruko.com/spruha/spruha/assets/js/index.js"></script>

<!-- STICKY JS -->
<script src="https://php.spruko.com/spruha/spruha/assets/js/sticky.js"></script>

<!-- COLOR THEME JS -->
<script src="https://php.spruko.com/spruha/spruha/assets/js/themeColors.js"></script>

<!-- CUSTOM JS -->
<script src="https://php.spruko.com/spruha/spruha/assets/js/custom.js"></script>

<!-- SWITCHER JS -->
<script src="https://php.spruko.com/spruha/spruha/assets/switcher/js/switcher.js"></script>

<!-- END SCRIPTS -->

<script src=" https://cdn.jsdelivr.net/npm/notiflix@3.2.6/dist/notiflix-aio-3.2.6.min.js "></script>


<!-- INTERNAL DATA TABLE JS -->
<script src="https://php.spruko.com/spruha/spruha/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script src="https://php.spruko.com/spruha/spruha/assets/plugins/datatable/js/dataTables.bootstrap5.js"></script>
<script src="https://php.spruko.com/spruha/spruha/assets/plugins/datatable/js/dataTables.buttons.min.js"></script>
<script src="https://php.spruko.com/spruha/spruha/assets/plugins/datatable/js/buttons.bootstrap5.min.js"></script>
<script src="https://php.spruko.com/spruha/spruha/assets/plugins/datatable/js/jszip.min.js"></script>
<script src="https://php.spruko.com/spruha/spruha/assets/plugins/datatable/pdfmake/pdfmake.min.js"></script>
<script src="https://php.spruko.com/spruha/spruha/assets/plugins/datatable/pdfmake/vfs_fonts.js"></script>
<script src="https://php.spruko.com/spruha/spruha/assets/plugins/datatable/js/buttons.html5.min.js"></script>
<script src="https://php.spruko.com/spruha/spruha/assets/plugins/datatable/js/buttons.print.min.js"></script>
<script src="https://php.spruko.com/spruha/spruha/assets/plugins/datatable/js/buttons.colVis.min.js"></script>
<script src="https://php.spruko.com/spruha/spruha/assets/plugins/datatable/dataTables.responsive.min.js"></script>
<script src="https://php.spruko.com/spruha/spruha/assets/plugins/datatable/responsive.bootstrap5.min.js"></script>
<script src="https://php.spruko.com/spruha/spruha/assets/js/table-data.js"></script>


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
