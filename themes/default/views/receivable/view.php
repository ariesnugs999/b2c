<?php (defined('BASEPATH')) OR exit('No direct script access allowed'); ?>

<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i>
            <button type="button" class="close mr10" onclick="window.print();"><i class="fa fa-print"></i></button>
            </button>
            <h5 class="modal-title" id="myModalLabel"><?= $sales->invoice_no; ?></h5>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-xs-12">
                    <h5 class="bold"><?= lang('Sales Invoice') ?></h5>
                    <div class="table-responsive">
                        <table class="table table-borderless table-striped dfTable table-right-left">
                            <tbody>
                                <tr>
                                    <td class="col-xs-4"><?= lang("Invoice No."); ?></td>
                                    <td class="col-xs-1">:</td>
                                    <td class="col-xs-7"><?= lang($invoice->invoice_no); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
            </div>

            <div class="col-xs-12">
                <?= $invoice->invoice_no ? '<div class="panel panel-primary"><div class="panel-heading">' . lang('Sales Invoice') . '</div><div class="panel-body">' . $invoice->invoice_no . '</div></div>' : ''; ?>
            </div>
        </div>

    </div>
</div>
</div>