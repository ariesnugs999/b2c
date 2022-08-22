<div class="wraper container-fluid">
   <div class="row">
      <div class="col-md-6">
         <div class="page-title">
            <h3 class="title"><i class="fa fa-money"></i> Laporan Laba Produk</h3>
         </div>
      </div>
      <div class="col-md-6" style="text-align: right;" id="buttonPrint">
      </div>
   </div>
   <div class="row">
      <div class="col-md-3">
         <div class="portlet" style="border-top:solid 4px #12a89d;">
            <!-- /primary heading -->        
            <div id="portlet2" class="panel-collapse collapse in">
               <div class="portlet-body">
                  <div class="form-group">
                     <label>Date Start</label>
                     <div class="input-group date datepicker">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        <input type="text" class="form-control" placeholder="Date Start" id="dateStart" readonly>
                     </div>
                  </div>
                  <div class="form-group">
                     <label>Date End</label>
                     <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        <input type="text" class="form-control datepicker" placeholder="Date End" id="dateEnd" readonly>
                     </div>
                  </div>
                  <div class="form-group">
                     <button class="btn btn-success" style="width:100%;" id="viewReport"><i class="fa fa-search"></i> Submit</button>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-md-9">
         <div class="portlet" style="border-top:solid 4px #12a89d;">
            <!-- /primary heading -->        
            <div id="portlet2" class="panel-collapse collapse in">
               <div class="portlet-body table-responsive" id="dataReport">
                    <div class="alert alert-danger" style="text-align: center;">
                			--Belum ada data untuk ditampilkan--
                		</div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<!-- Page Content Ends -->
<link rel="stylesheet" href="<?= $assets ?>plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<script src="<?= $assets ?>plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>

<link rel="stylesheet" href="<?= $assets ?>plugins/datatables/datatables.min.css">
<script src="<?= $assets ?>plugins/datatables/datatables.min.js"></script>
        <script type="text/javascript">

            jQuery('.datepicker').datepicker({
                format: "yyyy-mm-dd",
                autoclose : true
            });
            // attendance date
            // $('.datepicker').datepicker({
            //   changeMonth: true,
            //   changeYear: true,
            //   dateFormat:'yy-mm-dd',
            //   yearRange: '1900:' + (new Date().getFullYear() + 15),
            //   beforeShow: function(input) {
            //     $(input).datepicker("widget").show();
            //   }
            // });

            $('#viewReport').on("click",function(){
                var dateStart = $('#dateStart').val();
                var dateEnd = $('#dateEnd').val();
                // var supplier = $('#supplier').val();
                // var status = $('#status').val();

                var urlLaporanPurchase = "<?php echo base_url('reports/viewReportProfitProducts'); ?>";

                var imageUrl = "<?php echo base_url('assets/Ellipsis-2s-80px.gif'); ?>";

                $.ajax({
                    method : "POST",
                    url : urlLaporanPurchase,
                    data : {dateStart : dateStart, dateEnd : dateEnd},
                    beforeSend : function(){
                        var imageUrl = "<?php echo base_url('assets/loading.gif'); ?>";
                        $('#dataReport').html("<table width='100%'><tr><td align='center'><img src='"+imageUrl+"'/?</td></tr></table>");
                        //$('#dataReport').html("<table width='100%'><tr><td colspan='12' align='center'><img src='"+imageUrl+"'/></td></tr></table>");
                    },
                    success : function(response){
                        var urlButton = "<?php echo base_url('laporan/buttonExport'); ?>";
                        $('#dataReport').html(response);
                        $('#buttonPrint').load(urlButton);
                    }
                });
            });
        </script>
