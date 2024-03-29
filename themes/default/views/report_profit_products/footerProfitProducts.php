 <!-- Page Content Ends -->
            <!-- ================== -->

            <!-- Footer Start -->
            <footer class="footer">
                <?php echo $footer; ?>
            </footer>
            <!-- Footer Ends -->
        </section>
        <!-- js placed at the end of the document so the pages load faster -->
        <script src="<?php echo base_url('assets'); ?>/js/jquery.js"></script>
        <script src="<?php echo base_url('assets'); ?>/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url('assets'); ?>/js/modernizr.min.js"></script>
        <script src="<?php echo base_url('assets'); ?>/js/pace.min.js"></script>
        <script src="<?php echo base_url('assets'); ?>/js/wow.min.js"></script>
        <script src="<?php echo base_url('assets'); ?>/js/jquery.scrollTo.min.js"></script>
        <script src="<?php echo base_url('assets'); ?>/js/jquery.nicescroll.js" type="text/javascript"></script>
        <script src="<?php echo base_url('assets'); ?>/assets/chat/moment-2.2.1.js"></script>

        <!-- Counter-up -->
        <script src="<?php echo base_url('assets'); ?>/js/waypoints.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url('assets'); ?>/js/jquery.counterup.min.js" type="text/javascript"></script>

        <!-- sweet alerts -->
        <script src="<?php echo base_url('assets'); ?>/assets/sweet-alert/sweet-alert.min.js"></script>
        <script src="<?php echo base_url('assets'); ?>/assets/sweet-alert/sweet-alert.init.js"></script>

        <script src="<?php echo base_url('assets'); ?>/js/jquery.app.js"></script>
        <script src="<?php echo base_url('assets'); ?>/assets/notifications/notify.min.js"></script>
        <script src="<?php echo base_url('assets'); ?>/assets/notifications/notify-metro.js"></script>
        <script src="<?php echo base_url('assets'); ?>/assets/notifications/notifications.js"></script>

        <!-- Todo -->
        <script src="<?php echo base_url('assets'); ?>/assets/select2/select2.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url('assets'); ?>/assets/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url('assets'); ?>/assets/datatables/dataTables.bootstrap.js"></script>
        <script src="<?php echo base_url('assets'); ?>/assets/timepicker/bootstrap-datepicker.js"></script>
        <script type="text/javascript">
            jQuery(".select2").select2({
                width: '100%'
            });

            // jQuery('.datepicker').datepicker({
            //     format: "yyyy-mm-dd",
            //     autoclose : true
            // });
            // attendance date
            $('.datepicker').datepicker({
              changeMonth: true,
              changeYear: true,
              dateFormat:'yy-mm-dd',
              yearRange: '1900:' + (new Date().getFullYear() + 15),
              beforeShow: function(input) {
                $(input).datepicker("widget").show();
              }
            });

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
    </body>
</html>
