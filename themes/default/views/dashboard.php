<?php (defined('BASEPATH')) or exit('No direct script access allowed'); ?>

<script src="<?= $assets ?>plugins/highchart/highcharts.js"></script>



<script type="text/javascript">
    $(document).ready(function() {
        $('#SLData').DataTable({
        processing: true,
        serverSide: true,
        ajax: '',
    });
    });
</script>

<div class="row">
    <div class="col-xs-12">

        </br>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><?= lang('Buku Piutang'); ?></h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive py-4">
                            <table id="SLData"  class="table table-striped table-bordered" >
                                <thead>
                                    <tr class="active">
                                        <th><?= lang("No_Referensi"); ?></th>
                                        <th><?= lang("date"); ?></th>
                                        <th><?= lang("customer"); ?></th>
                                        <th><?= lang("receivable"); ?></th>
                                        <th><?= lang("Debit"); ?></th>
                                        <th><?= lang("Credit"); ?></th>
                                        <th><?= lang("Saldo"); ?></th>
                                        <th><?= lang("Metode_Bayar"); ?></th>
                                        <th style="min-width:115px; max-width:115px; text-align:center;"><?= lang("actions"); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="9" class="dataTables_empty"><?= lang('loading_data_from_server'); ?></td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr class="active">
                                        <th><?= lang("No_Referensi"); ?></th>
                                        <th><?= lang("date"); ?></th>
                                        <th><?= lang("customer"); ?></th>
                                        <th><?= lang("receivable"); ?></th>
                                        <th><?= lang("Debit"); ?></th>
                                        <th><?= lang("Credit"); ?></th>
                                        <th><?= lang("Saldo"); ?></th>
                                        <th><?= lang("Metode_Bayar"); ?></th>
                                        <th style="min-width:115px; max-width:115px; text-align:center;"><?= lang("actions"); ?></th>
                                    </tr>
                                    <tr>
                                        <td colspan="9" class="p0"><input type="text" class="form-control b0" name="search_table" id="search_table" placeholder="<?= lang('type_hit_enter'); ?>" style="width:100%;"></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>     
                    </div>
                </div>
            </div>


        </div>

    </div>
</div>