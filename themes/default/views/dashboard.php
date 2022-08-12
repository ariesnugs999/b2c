<?php (defined('BASEPATH')) OR exit('No direct script access allowed'); ?>

<script type="text/javascript">
    $(document).ready(function() {
        $('#ITable').DataTable({
            "dom": '<"row"r>t<"row"<"col-md-6"i><"col-md-6"p>><"clear">',
            "order": [[ 0, "desc" ]],
            "pageLength": Settings.rows_per_page,
            "processing": false, "serverSide": false,
            "buttons": []
        });
    });
</script>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary card">
                <div class="box-header card-header">
                    <h3 class="box-title card-title"><?= lang('Invoice'); ?></h3>
                </div>
                <div class="box-body card-body">
                    <table id="ITable" class="table table-bordered table-striped table-hover">
                        <thead class="cf">
                        <tr>
                            <th><?php echo lang('Invoice No.'); ?></th>
                            <th><?php echo lang('Invoice Date'); ?></th>
                            <th><?php echo lang('Due Date'); ?></th>
                            <th><?php echo lang('currency'); ?></th>
                            <th><?php echo lang('Debit'); ?></th>
                            <th><?php echo lang('Total Debit'); ?></th>
                            <th><?php echo lang('TOP'); ?></th>
                            <th><?php echo lang('Finance Receipt No.'); ?></th>
                            <th><?php echo lang('Finance Receipt Date'); ?></th>
                            <th><?php echo lang('Bank'); ?></th>
                            <th><?php echo lang('Credit'); ?></th>
                            <th><?php echo lang('Total Credit'); ?></th>
                            <th><?php echo lang('Cek'); ?></th>
                            <th><?php echo lang('Category'); ?></th>
                            <th style="width:80px;"><?php echo lang('actions'); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($view_invoice as $vi) {
                            echo '<tr>';
                            echo '<td>' . $vi->invoice_no . '</td>';
                            echo '<td>' . $vi->invoice_date . '</td>';
                            echo '<td>' . $vi->due_date . '</td>';
                            echo '<td>' . $vi->currency . '</td>';
                            echo '<td>' . $vi->debit . '</td>';
                            echo '<td>' . $vi->debit . '</td>';
                            echo '<td>' . $vi->debit . '</td>';
                            echo '<td>' . $vi->debit . '</td>';
                            echo '<td>' . $vi->debit . '</td>';
                            echo '<td>' . $vi->debit . '</td>';
                            echo '<td>' . $vi->debit . '</td>';
                            echo '<td>' . $vi->debit . '</td>';
                            echo '<td>' . $vi->debit . '</td>';
                            echo '<td>' . $vi->debit . '</td>';
                            echo '</tr>';
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
