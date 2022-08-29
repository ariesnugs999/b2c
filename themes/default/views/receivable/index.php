<?php (defined('BASEPATH')) OR exit('No direct script access allowed'); ?>

<!-- Datatables -->
<!-- <link href="<?= $assets ?>plugins/datatables/jquery.dataTables-1.12.1.min.css" rel="stylesheet" type="text/css" /> -->
<link href="<?= $assets ?>plugins/datatables/buttons.dataTables-2.2.3.min.css" rel="stylesheet" type="text/css" />
<!-- <script src="<?= $assets ?>plugins/jQuery/jquery-3.5.1.js"></script> -->
<!-- <script src="<?= $assets ?>plugins/datatables/jquery-1.10.2.js"></script> -->
<!-- <script src="<?= $assets ?>plugins/datatables/jquery-1.11.3.min.js"></script> -->
<!-- Datatables -->
<!-- <script src="<?= $assets ?>plugins/datatables/jquery.dataTables-1.12.1.min.js"></script>
<script src="<?= $assets ?>plugins/datatables/dataTables.buttons-2.2.3.min.js"></script>
<script src="<?= $assets ?>plugins/datatables/jszip-3.1.3.min.js"></script>
<script src="<?= $assets ?>plugins/datatables/pdfmake-0.1.53.min.js"></script>
<script src="<?= $assets ?>plugins/datatables/vfs_fonts-0.1.53.js"></script>
<script src="<?= $assets ?>plugins/datatables/buttons.html5-2.2.3.min.js"></script>
<script src="<?= $assets ?>plugins/datatables/buttons.print-2.2.3.min.js"></script> -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#RTable').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        } );
    } );
</script>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-danger">
                <div class="box-header">
                    <h6 class="box-title card-title"><?= lang('receivable_debt'); ?></h6>
                    <h7 class="box-tittle card-title"><?= $this->session->userdata('account_customer'); ?> - GOPPAR</h7>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="RTable" class="table table-striped table-bordered table-condensed table-hover display nowrap">
                            <thead>
                                <tr>
                                    <th class="text-center" colspan="2"><?php echo lang('Sales Invoice'); ?></th>
                                    <th class="text-center" colspan="2"><?php echo lang('Sales Receipt'); ?></th>
                                    <th class="text-center" rowspan="2" style="vertical-align: top;"><?php echo lang('Due Date'); ?></th>
                                    <th class="text-center" rowspan="2" style="vertical-align: top;"><?php echo lang('TOP'); ?></th>
                                    <th class="text-center" colspan="3"><?php echo lang('Amount'); ?></th>
                                    <th class="text-center" rowspan="2" style="vertical-align: top;"><?php echo lang('Status'); ?></th>
                                </tr>
                                <tr>
                                    <th class="text-center"><?php echo lang('No'); ?></th>
                                    <th class="text-center"><?php echo lang('Date'); ?></th>
                                    <th class="text-center"><?php echo lang('No'); ?></th>
                                    <th class="text-center"><?php echo lang('Date'); ?></th>
                                    <th class="text-center"><?php echo lang('Debit'); ?></th>
                                    <th class="text-center"><?php echo lang('Credit'); ?></th>
                                    <th class="text-center"><?php echo lang('Saldo'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $saldo = 0;
                            $totDebit = 0;
                            $totCredit = 0;
                            if (is_array($view_invoice) || is_object($view_invoice)) {
                            foreach ($view_invoice as $vi) {
                                echo '<tr>';
                                echo '<td style="padding-top:2px;padding-bottom:2px;vertical-align:top;">
                                        <a class="btn btn-sm btn-primary" data-toggle="modal" title="Lihat Detail" data-target="#myModal' . $vi->invoice_no .'">' . $vi->invoice_no . '</a>
                                    </td>';
                                echo '<td class="text-center" style="padding-top:2px;padding-bottom:2px;vertical-align:top;">' . tgl_indo2($vi->invoice_date) . '</td>';
                                echo '<td style="padding-top:2px;padding-bottom:2px;vertical-align:top;">' . $vi->finance_receipt_no . '</td>';
                                echo '<td class="text-center" style="padding-top:2px;padding-bottom:2px;vertical-align:top;">' . tgl_indo2($vi->finance_receipt_date) . '</td>';
                                echo '<td class="text-center" style="padding-top:2px;padding-bottom:2px;vertical-align:top;">' . tgl_indo2($vi->due_date) . '</td>';
                                echo '<td style="padding-top:2px;padding-bottom:2px;vertical-align:top;">' . $vi->top . '</td>';

                                $cek = $vi->cek;
                                if ($cek == 'SI'){
                                    //$debit = $vi->debit;
                                    //$credit = 0;
                                    if ($vi->due_date > 0){
                                        $dateDue = date('d-M-Y',strtotime($vi->due_date));
                                        // $overDue = (strtotime($toDay) - strtotime($dtRB['due_date']))/(3600*24);
                                    }

                                    $status = 'ON SCHEDULE';
                                    // if ($overDue > 0){
                                    //     $status = 'OVER DUE';
                                    // }
                                    
                                    $aSaldo = $vi->debit - $vi->total_credit;
                                    if ($aSaldo < 1){
                                        $status = 'SOLVED';
                                        $overDue = 0;
                                    }

                                    $debit = $vi->debit;
                                    if ($debit == '') {
                                        $debit_hsl = 0;
                                    } else{
                                        $debit_hsl = $vi->debit;
                                    }

                                    $credit = $vi->credit;
                                    if ($credit == '') {
                                        $credit_hsl = 0;
                                    } else{
                                        $credit_hsl = $vi->credit;
                                    }
                                    $saldo = $saldo + $debit_hsl - $credit_hsl;
                                    $totDebit = $totDebit + $debit_hsl;
                                    $totCredit = $totCredit + $credit_hsl;

                                    echo '<td style="padding-top:2px;padding-bottom:2px;vertical-align:top;" class="text-right">' . $this->tec->formatNumber($debit_hsl) . '</td>';
                                    echo '<td style="padding-top:2px;padding-bottom:2px;vertical-align:top;" class="text-right">' . $this->tec->formatNumber($credit_hsl) . '</td>';
                                    echo '<td style="padding-top:2px;padding-bottom:2px;vertical-align:top;" class="text-right">' . $this->tec->formatNumber($saldo) . '</td>';
                                    echo '<td style="padding-top:2px;padding-bottom:2px;vertical-align:top;">' . $status . '</td>';

                                } elseif($cek == 'SR'){
                                    //$debit = 0;
                                    //$credit = $vi->credit;
                                    $status = '';

                                    $debit = $vi->debit;
                                    if ($debit == '') {
                                        $debit_hsl = 0;
                                    } else{
                                        $debit_hsl = $vi->debit;
                                    }

                                    $credit = $vi->credit;
                                    if ($credit == '') {
                                        $credit_hsl = 0;
                                    } else{
                                        $credit_hsl = $vi->credit;
                                    }
                                    $saldo = $saldo + $debit_hsl - $credit_hsl;
                                    $totDebit = $totDebit + $debit_hsl;
                                    $totCredit = $totCredit + $credit_hsl;

                                    echo '<td style="padding-top:2px;padding-bottom:2px;vertical-align:top;" class="text-right">' . $this->tec->formatNumber($debit_hsl) . '</td>';
                                    echo '<td style="padding-top:2px;padding-bottom:2px;vertical-align:top;" class="text-right">' . $this->tec->formatNumber($credit_hsl) . '</td>';
                                    echo '<td style="padding-top:2px;padding-bottom:2px;vertical-align:top;" class="text-right">' . $this->tec->formatNumber($saldo) . '</td>';
                                    echo '<td style="padding-top:2px;padding-bottom:2px;vertical-align:top;">' . $status . '</td>';
                                }
                                echo '</tr>';
                            }
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--- MODAL-->
<?php foreach($view_invoice as $vi){ 
echo '
<div class="modal fade" id="myModal' . $vi->invoice_no .'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">'
?>
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Detail Receivable</h4>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
            
            <table class="table table-condensed">
                <tr>
                    <th class="info" colspan="3">Detail Pesanan yang Harus di kirim</th>
                </tr>
                <tr>
                    <th>Date</th>
                    <th>:</th>

                    <td><?= $r->receipt_date ?></td>
                </tr>

            </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php } ?>

<script src="<?= $assets ?>plugins/bootstrap-datetimepicker/js/moment.min.js" type="text/javascript"></script>
<script src="<?= $assets ?>plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.datepicker').datetimepicker({format: 'YYYY-MM-DD', showClear: true, showClose: true, useCurrent: false, widgetPositioning: {horizontal: 'auto', vertical: 'bottom'}, widgetParent: $('.dataTable tfoot')});
    });
</script>