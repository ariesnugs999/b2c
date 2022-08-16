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
<script type="text/javascript">
    $(window).load(function(){
        $('#modal_add_new').modal('show');
    });
</script>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary card">
                <div class="box-header card-header">
                    <h6 class="box-title card-title"><?= lang('Receivable (Hutang)'); ?></h6>
                    <h7 class="box-tittle card-title"><?= $this->session->account_customer; ?> - GOPPAR</h7>
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

<div class="modal fade" id="modal_add_new" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h3 class="modal-title" id="myModalLabel">Detail Invoice - <?php $vi->invoice_no ?></h3>
            </div>
            <form class="form-horizontal" method="post" action="#">
                <div class="modal-body">

                    <!-- <div class="form-group">
                        <label class="control-label col-xs-3" >Kode Barang</label>
                        <div class="col-xs-8">
                            <input name="kode_barang" class="form-control" type="text" placeholder="Kode Barang..." required>
                        </div>
                    </div> -->

                    <!-- <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Barang</label>
                        <div class="col-xs-8">
                            <input name="nama_barang" class="form-control" type="text" placeholder="Nama Barang..." required>
                        </div>
                    </div> -->

                    <!-- <div class="form-group">
                        <label class="control-label col-xs-3" >Satuan</label>
                        <div class="col-xs-8">
                             <select name="satuan" class="form-control" required>
                                <option value="">-PILIH-</option>
                                <option value="Unit">Unit</option>
                                <option value="Kotak">Kotak</option>
                                <option value="Botol">Botol</option>
                                <option value="Sachet">Sachet</option>
                                <option value="Pcs">Pcs</option>
                                <option value="Dus">Dus</option>
                             </select>
                        </div>
                    </div> -->

                    <!-- <div class="form-group">
                        <label class="control-label col-xs-3" >Harga</label>
                        <div class="col-xs-8">
                            <input name="harga" class="form-control" type="text" placeholder="Harga..." required>
                        </div>
                    </div> -->

                </div>

                <!-- <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info">Simpan</button>
                </div> -->
            </form>
        </div>
    </div>
</div>
