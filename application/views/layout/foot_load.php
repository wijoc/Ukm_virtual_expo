<!-- Core JS Goes here -->
	<!-- jQuery -->
	<script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- AdminLTE App -->
	<script src="<?php echo base_url() ?>assets/dist/js/adminlte.min.js"></script>

<!-- Additional library needed -->
	<!-- DataTables -->
	<?php if(in_array('datatables',$assets)){ ?>
		<script src="<?php echo base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="<?php echo base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
		<script src="<?php echo base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
		<script>
			$(".table").DataTable({
				"responsive": true,
				"autoWidth": false,
			});
		</script>
	<?php } ?>

	<!-- SweetAlert 2 -->
	<?php if(in_array('sweetalert2',$assets)){ ?>
		<script src="<?php echo base_url() ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
	<?php } ?>
	
<!-- additional Page script goes here -->
	<!-- Page Data Kategori -->
		<script src="<?php echo base_url() ?>assets/dist/js/pages/admin_ktgr.js"></script>

	<!-- Page tambah toko -->
	<?php if(in_array('tambah_toko_page',$assets)){ ?>
		<script src="<?php echo base_url() ?>assets/dist/js/pages/admin_toko.js"></script>
	<?php } ?>

	<!-- Page Konfirmasi Delete -->
	<?php if(in_array('func_confirm', $assets)){ ?>
		<script type="text/javascript" src="<?php echo base_url() ?>assets/dist/js/pages/f_confirm.js"></script>
	<?php } ?>

<!-- Untuk session input -->
<?php if($this->session->flashdata('flashStatus')){ ?>
	<script type="text/javascript">
		var flashStatus = "<?php echo $this->session->flashdata('flashStatus') ;?>";
		var flashMsg = "<?php echo ($this->session->flashdata('flashMsg'))? $this->session->flashdata('flashMsg') : '' ;?>";
		<?php if($this->session->flashdata('flashInput')){ ?> // Khusus page kategori & Satuan 
			var flashInput = "<?php echo $this->session->flashdata('flashInput') ?>";
		<?php } ?>
		<?php if($this->session->flashdata('flashRedirect')){ ?> // Khusus page kategori & Satuan 
			var site_url = "<?php echo site_url($this->session->flashdata('flashRedirect')) ?>";
		<?php } ?>
	</script>
<?php } ?>