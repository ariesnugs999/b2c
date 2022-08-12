<?php (defined('BASEPATH')) OR exit('No direct script access allowed'); ?>

<script type="text/javascript">

    $(document).ready(function() {
        var table = $('#ITable').DataTable( {
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
                    <h3 class="box-title card-title"><?= lang('Invoice'); ?></h3>
                </div>
                <div class="box-body card-body">
                    <div class="table-responsive py-4">
                        <table id="ITable" class="table table-bordered table-striped table-hover">
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
                            foreach ($view_invoice as $vi) {
                                $saldo = 0;
                                echo '<tr>';
                                echo '<td>' . $vi->invoice_no . '</td>';
                                echo '<td>' . $vi->invoice_date . '</td>';
                                echo '<td>' . $vi->finance_receipt_no . '</td>';
                                echo '<td>' . $vi->finance_receipt_date . '</td>';
                                echo '<td>' . $vi->due_date . '</td>';
                                echo '<td>' . $vi->top . '</td>';

                                $cek = $vi->cek;
                                if ($cek == 'SI'){
                                    $debit = $vi->debit;
                                    $credit = '';
                                    if ($vi->due_date > 0){
                                        $dateDue = date('d-M-Y',strtotime($vi->due_date));
                                        // $overDue = (strtotime($toDay) - strtotime($dtRB['due_date']))/(3600*24);
                                    }

                                    $status = 'ON SCHEDULE';
                                    // if ($overDue > 0){
                                    //     $status = 'OVER DUE';
                                    // }
                                    $saldo = $vi->debit - $vi->total_credit;
                                    if ($saldo < 1){
                                        $status = 'SOLVED';
                                        $overDue = 0;
                                    }
                                    echo '<td>' . $debit . '</td>';
                                    echo '<td>' . $credit . '</td>';
                                    echo '<td>' . $saldo . '</td>';
                                    echo '<td>' . $status . '</td>';

                                } elseif($cek == 'SR'){
                                    $debit = 0;
                                    $credit = $vi->credit;
                                    $saldo = $saldo + $debit - $credit;          
                                    $status = '';

                                    echo '<td>' . $debit . '</td>';
                                    echo '<td>' . $credit . '</td>';
                                    echo '<td>' . $saldo . '</td>';
                                    echo '<td>' . $status . '</td>';
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
