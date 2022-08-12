<?php (defined('BASEPATH')) or exit('No direct script access allowed'); ?>

<script src="<?= $assets ?>plugins/highchart/highcharts.js"></script>



<script type="text/javascript">
    $(document).ready(function() {

        function status(x) {
            var paid = '<?= lang('paid'); ?>';
            var partial = '<?= lang('partial'); ?>';
            var unpaid = '<?= lang('unpaid'); ?>';
            if (x == 'paid') {
                return '<div class="text-center"><span class="sale_status label label-success">'+paid+'</span></div>';
            } else if (x == 'partial') {
                return '<div class="text-center"><span class="sale_status label label-primary">'+partial+'</span></div>';
            } else if (x == 'unpaid') {
                return '<div class="text-center"><span class="sale_status label label-danger">'+unpaid+'</span></div>';
            } else {
                return '<div class="text-center"><span class="sale_status label label-default">'+x+'</span></div>';
            }
        }

        var table = $('#SLData').DataTable({

            'ajax' : { url: '<?=site_url('sales/get_sales');?>', type: 'POST', "data": function ( d ) {
                d.<?=$this->security->get_csrf_token_name();?> = "<?=$this->security->get_csrf_hash()?>";
            }},
            "buttons": [
            { extend: 'copyHtml5', 'footer': true, exportOptions: { columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10 ] } },
            { extend: 'excelHtml5', 'footer': true, exportOptions: { columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10 ] } },
            { extend: 'csvHtml5', 'footer': true, exportOptions: { columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10 ] } },
            { extend: 'pdfHtml5', orientation: 'landscape', pageSize: 'A4', 'footer': true,
            exportOptions: { columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10 ] } },
            { extend: 'colvis', text: 'Columns'},
            ],
            "columns": [
            { "data": "id", "visible": false },
            { "data": "date", "render": hrld },
            { "data": "customer_name" },
            { "data": "total", "render": currencyFormat },
            { "data": "total_tax", "render": currencyFormat },
            { "data": "total_discount", "render": currencyFormat },
            { "data": "grand_total", "render": currencyFormat },
            { "data": "paid", "render": currencyFormat },
            { "data": "balance", "render": currencyFormat },
            { "data": "status", "render": status },
            { "data": "Actions", "searchable": false, "orderable": false }
            ],
            "fnRowCallback": function (nRow, aData, iDisplayIndex) {
                nRow.id = aData.id;
                return nRow;
            },
            "footerCallback": function (  tfoot, data, start, end, display ) {
                var api = this.api(), data;
                $(api.column(3).footer()).html( cf(api.column(3).data().reduce( function (a, b) { return pf(a) + pf(b); }, 0)) );
                $(api.column(4).footer()).html( cf(api.column(4).data().reduce( function (a, b) { return pf(a) + pf(b); }, 0)) );
                $(api.column(5).footer()).html( cf(api.column(5).data().reduce( function (a, b) { return pf(a) + pf(b); }, 0)) );
                $(api.column(6).footer()).html( cf(api.column(6).data().reduce( function (a, b) { return pf(a) + pf(b); }, 0)) );
                $(api.column(7).footer()).html( cf(api.column(7).data().reduce( function (a, b) { return pf(a) + pf(b); }, 0)) );
                $(api.column(8).footer()).html( cf(api.column(8).data().reduce( function (a, b) { return pf(a) + pf(b); }, 0)) );
            }

        });

        $('#search_table').on( 'keyup change', function (e) {
            var code = (e.keyCode ? e.keyCode : e.which);
            if (((code == 13 && table.search() !== this.value) || (table.search() !== '' && this.value === ''))) {
                table.search( this.value ).draw();
            }
        });

        table.columns().every(function () {
            var self = this;
            $( 'input.datepicker', this.footer() ).on('dp.change', function (e) {
                self.search( this.value ).draw();
            });
            $( 'input:not(.datepicker)', this.footer() ).on('keyup change', function (e) {
                var code = (e.keyCode ? e.keyCode : e.which);
                if (((code == 13 && self.search() !== this.value) || (self.search() !== '' && this.value === ''))) {
                    self.search( this.value ).draw();
                }
            });
            $( 'select', this.footer() ).on( 'change', function (e) {
                self.search( this.value ).draw();
            });
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
                            <!-- <table id="SLData" class="table table-striped table-bordered" > -->
                            <table id="SLData" class="table table-striped table-bordered" >
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
                        <?php
                            foreach ($record->result_array() as $row){
                            echo '
                                <td>$no</td>
                                <td><a href="#" class="detail-barang" data-id='$row[id_barang]' title='Detail Barang $row[kode_barang]'>$row[kode_barang]</a></td>
                                <td><a href='#' class='detail-barang' data-id='$row[id_barang]' title='Detail Barang $row[nama_barang]'>$row[nama_barang]</a></td>
                                <td>$row[nama_kategori]</td>
                                <td>".rupiah($stok['stok'])."</td>
                                <td>$row[kode_satuan]</td>
                                <td>".rupiah($harga1['harga'])."</td>
                                <td class='$conf[harga_grosir]'>".rupiah($harga2['harga'])."</td>
                                <td class='$conf[harga_grosir]'>".rupiah($harga3['harga'])."</td>
                                <td class='$conf[harga_grosir]'>".rupiah($harga4['harga'])."</td>
                                <td>".rupiah($row['harga_beli'])."</td>
                                <td><center>
                                <a class='btn btn-success btn-xs' title='Edit Data' href='".base_url()."app/edit_barang/$row[id_barang]'><span class='glyphicon glyphicon-edit'></span></a>
                                <a class='btn btn-danger btn-xs' title='Delete Data' href='".base_url()."app/delete_barang/$row[id_barang]' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\"><span class='glyphicon glyphicon-remove'></span></a>
                                </center></td>
                                <tr>
                                    <td colspan="9" class="dataTables_empty"><?= lang('loading_data_from_server'); ?></td>
                                </tr>';
                            } ?>
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