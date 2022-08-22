<?php (defined('BASEPATH')) OR exit('No direct script access allowed'); ?>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <p><?= lang('review_report'); ?></p>
                </div>
                <div class="box-body">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="info-box bg-aqua">
                                    <span class="info-box-icon"><i class="fa fa-shopping-cart"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text"><?= lang('sales_value'); ?></span>
                                        <span class="info-box-number"><?= $this->tec->formatMoney($total_sales->total_amount) ?></span>
                                        <div class="progress">
                                            <div style="width: 100%" class="progress-bar"></div>
                                        </div>
                                        <span class="progress-description">
                                            <?= $total_sales->total .' ' . lang('sales'); ?> |
                                            <?= $this->tec->formatMoney($total_sales->paid) . ' ' . lang('paid') ?> |
                                            <?= $this->tec->formatMoney($total_sales->tax) . ' ' . lang('tax') ?> |
                                            <?= $this->tec->formatMoney($total_sales->piutang) . ' ' . lang('receivable') ?>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="info-box bg-yellow">
                                    <span class="info-box-icon"><i class="fa fa-plus"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text"><?= lang('purchasing_value'); ?></span>
                                        <span class="info-box-number"><?= $this->tec->formatMoney($total_purchases->total_amount) ?></span>
                                        <div class="progress">
                                            <div style="width: 0%" class="progress-bar"></div>
                                        </div>
                                        <span class="progress-description">
                                            <?= $total_purchases->total ?> <?= lang('purchases'); ?> |
                                            <?= $this->tec->formatMoney($total_purchases->paid) . ' ' . lang('paid') ?> |
                                            <?= $this->tec->formatMoney($total_purchases->tax) . ' ' . lang('tax') ?> |
                                            <?= $this->tec->formatMoney($total_purchases->hutang) . ' ' . lang('payable') ?>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="info-box bg-red">
                                    <span class="info-box-icon"><i class="fa fa-circle-o"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text"><?= lang('expenses_value'); ?></span>
                                        <span class="info-box-number"><?= $this->tec->formatMoney($total_expenses->total_amount) ?></span>
                                        <div class="progress">
                                            <div style="width: 0%" class="progress-bar"></div>
                                        </div>
                                        <span class="progress-description">
                                            <?= $total_expenses->total ?> <?= lang('expenses'); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="info-box bg-green">
                                    <span class="info-box-icon"><i class="fa fa-dollar"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text"><?= lang('profit_loss'); ?></span>
                                        <span class="info-box-number"><?= $this->tec->formatMoney($total_sales->total_amount-$total_purchases->total_amount-$total_expenses->total_amount) ?></span>
                                        <div class="progress">
                                            <div style="width: 100%" class="progress-bar"></div>
                                        </div>
                                        <span class="progress-description">
                                            <?= $this->tec->formatMoney($total_sales->total_amount).' - '.($this->tec->formatMoney($total_purchases->total_amount ? $total_purchases->total_amount : 0)).' - '.$this->tec->formatMoney(($total_expenses->total_amount ? $total_expenses->total_amount : 0)); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="calendar table-responsive">
                            <?=$calender?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
