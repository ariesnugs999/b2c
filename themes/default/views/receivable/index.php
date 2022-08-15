<?php (defined('BASEPATH')) OR exit('No direct script access allowed'); ?>

<script type="text/javascript">

    $(document).ready(function() {
        var table = $('#RTable').DataTable( {
            dom:"Bfrtip",
            bAutoWidth: false,
            // scrollY:        "300px",
            scrollX:        true,
            scrollCollapse: true,
            paging:         true,
            buttons:        [
              {
                extend: 'excel',
                exportOptions: {
                    columns: 'th:not(:last-child)'
                }
              },
              {
                extend: 'pdf',
                exportOptions: {
                    columns: 'th:not(:last-child)'
                }
              }
            ],
            // fixedColumns:   {
            //     leftColumns: 3
            // }
            
        } );
    } );
</script>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary card">
                <div class="box-header card-header">
                    <h6 class="box-title card-title"><?= lang('Receivable (Hutang)'); ?></h6>
                    <h7 class="box-tittle card-title"><?= $this->session->username; ?>-<?= $this->session->account_customer; ?></h7>
                </div>
                <div class="box-body card-body">
                    <div class="table-responsive py-4" style="font-size:12px;">
                        <table id="RTable" class="table table-bordered table-striped table-hover">
                            <thead class="cf">
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
                                echo '<td style="padding-top:2px;padding-bottom:2px;vertical-align:top;">' . $vi->invoice_no . '</td>';
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

                                    echo '<td style="padding-top:2px;padding-bottom:2px;vertical-align:top;" class="text-end">' . $this->tec->formatNumber($debit_hsl) . '</td>';
                                    echo '<td style="padding-top:2px;padding-bottom:2px;vertical-align:top;" class="text-end">' . $this->tec->formatNumber($credit_hsl) . '</td>';
                                    echo '<td style="padding-top:2px;padding-bottom:2px;vertical-align:top;" class="text-end">' . $this->tec->formatNumber($saldo) . '</td>';
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

                                    echo '<td style="padding-top:2px;padding-bottom:2px;vertical-align:top;" class="text-end">' . $this->tec->formatNumber($debit_hsl) . '</td>';
                                    echo '<td style="padding-top:2px;padding-bottom:2px;vertical-align:top;" class="text-end">' . $this->tec->formatNumber($credit_hsl) . '</td>';
                                    echo '<td style="padding-top:2px;padding-bottom:2px;vertical-align:top;" class="text-end">' . $this->tec->formatNumber($saldo) . '</td>';
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
