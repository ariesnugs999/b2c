<?php (defined('BASEPATH')) OR exit('No direct script access allowed'); ?>

<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="nav-tabs-custom card">
                <div class="card-header">
                    <div style="float: left;" class="ms-md-auto pe-md-12 d-flex align-items-center">
                        <h3 class="box-title card-title"><?= lang('users'); ?></h3>
                    </div>
                    <div style="float: left;" class="ms-md-auto pe-md-12 d-flex align-items-center">
                        <h3 class="box-title card-title text-white"><?= lang('users'); ?></h3>
                    </div>
                <!-- <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#edit_profile"><?= lang('edit'); ?></a></li>
                    <li><a data-toggle="tab" href="#avatar"><?= lang('avatar'); ?></a></li>
                    <li><a data-toggle="tab" href="#cpassword"><?= lang('change_password'); ?></a></li>
                </ul> -->
                <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false" style="padding-top: 0;left: 10%;">

                    <div class="container-fluid py-1 px-3" style="padding-top: 0 !important;">
                        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4">
                            <ul class="navbar-nav justify-content-end">
                              <li class="nav-item dropdown pe-2 d-flex align-items-center">
                                <!-- <a href="javascript:;" class="nav-link p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                  <i class="fa fa-bell cursor-pointer"></i>
                                </a> -->
                                <a href="javascript:;" class="btn btn-link text-secondary mb-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v text-xs" aria-hidden="true"></i>
                                </a>

                                <!-- <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                                  <li class="mb-2">
                                    <a class="dropdown-item border-radius-md" href="#edit_profile"><?= lang('edit'); ?>">
                                      <div class="d-flex py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                          <h6 class="text-sm font-weight-normal mb-1">
                                            <span class="font-weight-bold">New message</span> from Laur
                                          </h6>
                                        </div>
                                      </div>
                                    </a>
                                  </li>
                                  <li class="mb-2">
                                    <a class="dropdown-item border-radius-md" href="javascript:;">
                                      <div class="d-flex py-1">
                                        <div class="my-auto">
                                          <img src="../assets/img/small-logos/logo-spotify.svg" class="avatar avatar-sm bg-gradient-dark  me-3 ">
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                          <h6 class="text-sm font-weight-normal mb-1">
                                            <span class="font-weight-bold">New album</span> by Travis Scott
                                          </h6>
                                          <p class="text-xs text-secondary mb-0">
                                            <i class="fa fa-clock me-1"></i>
                                            1 day
                                          </p>
                                        </div>
                                      </div>
                                    </a>
                                  </li>
                                  <li>
                                    <a class="dropdown-item border-radius-md" href="javascript:;">
                                      <div class="d-flex py-1">
                                        <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
                                          <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <title>credit-card</title>
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                              <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                                <g transform="translate(1716.000000, 291.000000)">
                                                  <g transform="translate(453.000000, 454.000000)">
                                                    <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743"></path>
                                                    <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                                                  </g>
                                                </g>
                                              </g>
                                            </g>
                                          </svg>
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                          <h6 class="text-sm font-weight-normal mb-1">
                                            Payment successfully completed
                                          </h6>
                                          <p class="text-xs text-secondary mb-0">
                                            <i class="fa fa-clock me-1"></i>
                                            2 days
                                          </p>
                                        </div>
                                      </div>
                                    </a>
                                  </li>
                                </ul> -->
                              </li>
                            </ul>
                        </div>
                    </div>
                </nav>

                <ul class="nav nav-tabs">
                </ul>

                </div>

                <div class="card-body">
                    <div id="edit_profile" class="tab-pane active">
                        <div class="row">
                            <div class="col-lg-6">
                                <!-- <p><?= lang('update_info'); ?></p> -->
                                <?=form_open('auth/edit_user/' . $user->id);?>
                                <div class="form-group">
                                    <?= lang('first_name', 'first_name'); ?>
                                    <?= form_input('first_name', $user->first_name, 'class="form-control tip" id="first_name"  required="required"'); ?>
                                </div>
                                <div class="form-group">
                                    <?= lang('last_name', 'last_name'); ?>
                                    <?= form_input('last_name', $user->last_name, 'class="form-control tip" id="last_name"  required="required"'); ?>
                                </div>
                                <div class="form-group">
                                    <?= lang('phone', 'phone'); ?>
                                    <?= form_input('phone', $user->phone, 'class="form-control tip" id="phone"  required="required"'); ?>
                                </div>
                                <div class="form-group">
                                    <?= lang('gender', 'gender'); ?>
                                    <?php $gnders = array('male' => lang('male'), 'female' => lang('female')); ?>
                                    <?= form_dropdown('gender', $gnders, $user->gender, 'class="form-control tip select2" style="width:100%;" id="gender"  required="required"'); ?>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <?php if ($Admin && $id != $this->session->userdata('user_id')) { ?>

                                    <div class="form-group">
                                        <?= lang("group", "group"); ?>
                                        <?php
                                        $gp[""] = "";
                                        foreach ($groups as $group) {
                                            $gp[$group['id']] = $group['description'];
                                        }
                                        echo form_dropdown('group', $gp, $user->group_id, 'id="group" data-placeholder="' . lang("select") . ' ' . lang("group") . '" class="form-control input-tip select2" style="width:100%;"');
                                        ?>
                                    </div>

                                    <div class="form-group">
                                        <?= lang('username', 'username'); ?>
                                        <?= form_input('username', $user->username, 'class="form-control tip" id="username"  required="required"'); ?>
                                    </div>
                                    <div class="form-group">
                                        <?= lang('email', 'email'); ?>
                                        <?= form_input('email', $user->email, 'class="form-control tip" id="email"  required="required"'); ?>
                                    </div>

                                    <div class="panel panel-warning">
                                        <div class="panel-heading"><?= lang('if_you_need_to_rest_password_for_user') ?></div>
                                        <div class="panel-body" style="padding: 5px;">

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <?php echo lang('password', 'password'); ?>
                                                        <?php echo form_input($password); ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <?php echo lang('confirm_password', 'password_confirm'); ?>
                                                        <?php echo form_input($password_confirm); ?>
                                                    </div>
                                                </div>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <?= lang('status', 'status'); ?>
                                        <?php
                                        $opt = array('' => '', 1 => lang('active'), 0 => lang('inactive'));
                                        echo form_dropdown('status', $opt, $user->active, 'id="status" data-placeholder="' . lang("select") . ' ' . lang("status") . '" class="form-control input-tip select2" style="width:100%;"');
                                        ?>
                                    </div>
                                    <div class="form-group store-con">
                                        <?= lang("store", "store_id"); ?>
                                        <?php
                                        $st[""] = "";
                                        foreach ($stores as $store) {
                                            $st[$store->id] = $store->name;
                                        }
                                        echo form_dropdown('store_id', $st, $user->store_id, 'id="store_id" data-placeholder="' . lang("select") . ' ' . lang("store") . '" class="form-control input-tip select2" style="width:100%;"');
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <?= lang("customer", "customer_account"); ?>
                                        <?php
                                        $cs[""] = "";
                                        foreach ($customer1 as $customer1) {
                                            $cs[$customer1['no']] = $customer1['account'];
                                        }
                                        echo form_dropdown('customer', $cs, $user->account_customer, 'id="customer_account" data-placeholder="' . lang("select") . ' ' . lang("group") . '" class="form-control input-tip select2" style="width:100%;"');
                                        ?>
                                    </div>
                                <?php } ?>
                            </div>

                            <?php echo form_hidden('id', $id); ?>
                            <?php echo form_hidden($csrf); ?>
                            <div class="form-group">
                                <?= form_submit('update_user', lang('update'), 'class="btn btn-primary"'); ?>
                            </div>
                            <?= form_close(); ?>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="nav-tabs" style="margin-bottom: 10px;"></div>

                    <div id="avatar" class="tab-pane">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="col-md-5">
                                    <?=
                                    $user->avatar ? '<img alt="" src="' . base_url() . 'uploads/avatars/' . $user->avatar . '" class="avatar img-thumbnail img-rounded">' :
                                    '<img alt="" src="' . base_url() . 'uploads/avatars/' . $user->gender . '.png" class="avatar img-thumbnail img-rounded">';
                                    ?>

                                    <?php echo form_open_multipart("auth/update_avatar"); ?>
                                    <div class="form-group">
                                        <?= lang("change_avatar", "change_avatar"); ?>
                                        <input type="file" data-browse-label="<?= lang('browse'); ?>" name="avatar" id="product_image" required="required"
                                        data-show-upload="false" data-show-preview="false" accept="image/*"
                                        class="form-control file"/>
                                    </div>
                                    <div class="form-group">
                                        <?php echo form_hidden('id', $id); ?>
                                        <?php echo form_hidden($csrf); ?>
                                        <?php echo form_submit('update_avatar', lang('update_avatar'), 'class="btn btn-primary"'); ?>
                                        <?php echo form_close(); ?>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="nav-tabs" style="margin-bottom: 10px;"></div>

                    <div id="cpassword" class="tab-pane">
                        <div class="col-lg-6">
                            <div class="white-panel">
                                <!-- <p><?= lang('update_info'); ?></p> -->
                                <?php echo form_open("auth/change_password"); ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <?php echo lang('old_password', 'curr_password'); ?> <br/>
                                            <?php echo form_password('old_password', '', 'class="form-control" id="curr_password"'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label
                                                for="new_password"><?php echo sprintf(lang('new_password'), $min_password_length); ?></label>
                                            <br/>
                                            <?php echo form_password('new_password', '', 'class="form-control" id="new_password" pattern=".{8,}"'); ?>
                                        </div>

                                        <div class="form-group">
                                            <?php echo lang('confirm_password', 'new_password_confirm'); ?> <br/>
                                            <?php echo form_password('new_password_confirm', '', 'class="form-control" id="new_password_confirm" pattern=".{8,}"'); ?>

                                        </div>

                                        <?php echo form_input($user_id); ?>
                                        <div class="form-group">
                                            <?php echo form_submit('change_password', lang('change_password'), 'class="btn btn-primary"'); ?>
                                        </div>
                                    </div>
                                </div>
                                <?php echo form_close(); ?>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</section>

