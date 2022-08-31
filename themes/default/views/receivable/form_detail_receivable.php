<?php
	foreach($details_receivable->result() as $row){
?>
<div class="form-group">
	<input type="text" class="form-control" placeholder="Receipt" id="no_receipt" value="<?php echo $row->receipt_no; ?>"/>
</div>

<?php } ?>

<!-- <script type="text/javascript">

	$(document).on("click",".edit-receivable-sql",function(){
		nama 		= $('#no_receipt').val();

		id 		= $('#id_receivable_edit').val();
		receivable    = "<?php echo base_url('receivable/data_receivable'); ?>";

		url 	= "<?php echo base_url('receivable/edit_receivable_sql'); ?>";

		$.ajax({
					method : "POST",
					url : url,
					data : {email : email, nama : nama, kontak : kontak, alamat : alamat, id : id, no_rekening : no_rekening, bank : bank, atas_nama : atas_nama},
					success : function(data){

			                $.Notification.notify('success', 'top right', 'receivable', 'receivable Berhasil Diedit');
			                $('#edit-receivable-modal').modal('hide');
							$('#data-receivable').load(receivable);
							$('.modal-backdrop').hide();
			            
					}
		});
	});
</script> -->