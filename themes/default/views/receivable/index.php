<?php (defined('BASEPATH')) OR exit('No direct script access allowed'); ?>

<script type="text/javascript">
    // $(document).ready(function() {
    //     var table = $('#RTable').DataTable( {
    //         dom:"Bfrtip",
    //         bAutoWidth: false,
    //         // scrollY:        "300px",
    //         scrollX:        true,
    //         scrollCollapse: true,
    //         paging:         true,
    //         buttons:        [
    //           {
    //             extend: 'excel',
    //             exportOptions: {
    //                 columns: 'th:not(:last-child)'
    //             }
    //           },
    //           {
    //             extend: 'pdf',
    //             exportOptions: {
    //                 columns: 'th:not(:last-child)'
    //             }
    //           }
    //         ],
    //         // fixedColumns:   {
    //         //     leftColumns: 3
    //         // }
            
    //     } );
    // } );
</script>
<script type="text/javascript">
    $(window).load(function(){
        $('#modal_add_new').modal('show');
    });
</script>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h6 class="box-title card-title"><?= lang('receivable_debt'); ?></h6>
                    <h7 class="box-tittle card-title"><?= $this->session->account_customer; ?> - GOPPAR</h7>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="RTable" class="table table-striped table-bordered table-condensed table-hover">
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
                            foreach ($view_invoice as $vi) {
                                echo '<tr>';
                                echo '<td style="padding-top:2px;padding-bottom:2px;vertical-align:top;">
                                        <a data-toggle="modal" data-target="#modal_add_new">' . $vi->invoice_no . '</a>
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
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php if ($Admin) { ?>
<div class="modal fade" id="stModal" tabindex="-1" role="dialog" aria-labelledby="stModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times"></i></span></button>
                <h4 class="modal-title" id="stModalLabel"><?= lang('update_status'); ?> <span id="status-id"></span></h4>
            </div>
            <?= form_open('sales/status'); ?>
            <div class="modal-body">
                <input type="hidden" value="" id="sale_id" name="sale_id" />
                <div class="form-group">
                    <?= lang('status', 'status'); ?>
                    <?php $opts = array('paid' => lang('paid'), 'partial' => lang('partial'), 'unpaid' => lang('unpaid'))  ?>
                    <?= form_dropdown('status', $opts, set_value('status'), 'class="form-control select2 tip" id="status" required="required" style="width:100%;"'); ?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?= lang('close'); ?></button>
                <button type="submit" class="btn btn-primary"><?= lang('update'); ?></button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('click', '.sale_status', function() {
            var sale_id = $(this).closest('tr').attr('id');
            var curr_status = $(this).text();
            var status = curr_status.toLowerCase();
            $('#status-id').text('( <?= lang('sale_id'); ?> '+sale_id+' )');
            $('#sale_id').val(sale_id);
            $('#status').val(status);
            $('#status').select2('val', status);
            $('#stModal').modal()
        });
    });
</script>
<?php } ?>
<script src="<?= $assets ?>plugins/bootstrap-datetimepicker/js/moment.min.js" type="text/javascript"></script>
<script src="<?= $assets ?>plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.datepicker').datetimepicker({format: 'YYYY-MM-DD', showClear: true, showClose: true, useCurrent: false, widgetPositioning: {horizontal: 'auto', vertical: 'bottom'}, widgetParent: $('.dataTable tfoot')});
    });
</script>