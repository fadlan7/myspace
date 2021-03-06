<div class="col-12 col-sm-12">
    <?php
    if ($this->session->flashdata('messages')) {
        echo '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i> Success !</h5>';
        echo $this->session->flashdata('messages');
        echo '</div>';
    }
    ?>
    <div class="card card-primary card-tabs">
        <div class="card-header p-0 pt-1">
            <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Incoming Orders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Processed</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">Shipped</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-settings-tab" data-toggle="pill" href="#custom-tabs-one-settings" role="tab" aria-controls="custom-tabs-one-settings" aria-selected="false">Completed</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content" id="custom-tabs-one-tabContent">
                <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                    <table class="table table-striped table-responsive-sm table-bordered">
                        <thead>
                            <tr>
                                <th>No. Order</th>
                                <th>Date</th>
                                <th>Courier</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($orders as $key => $value) { ?>
                                <tr>
                                    <td><?= $value->no_order ?></td>
                                    <td><?= $value->date_order ?></td>
                                    <td>
                                        <span class="font-weight-bold text-uppercase"><?= $value->courier ?></span> <br>
                                        Delivery: <?= $value->delivery ?> <br>
                                        Shipping: <?= number_format($value->shipping, 0) ?>
                                    </td>
                                    <td>
                                        <b>Rp. <?= number_format($value->total, 0) ?></b> <br>
                                        <?php
                                        if ($value->payment_status == 0) { ?>
                                            <span class="badge badge-warning">Not yet Paid</span>
                                        <?php } else { ?>
                                            <span class="badge badge-success">Paid</span> <br>
                                            <span class="badge badge-secondary">Waiting for confirmation</span>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <?php
                                        if ($value->payment_status == 1) { ?>
                                            <button class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#check<?= $value->id_transaction ?>"><i class="fas fa-eye"></i></button>
                                            <a href="<?= base_url('admin/process/' . $value->id_transaction) ?> " class="btn btn-sm btn-success">Confirmation</a>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                    <table class="table table-striped table-responsive-sm table-bordered">
                        <thead>
                            <tr>
                                <th>No. Order</th>
                                <th>Date</th>
                                <th>Courier</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($order_processed as $key => $value) { ?>
                                <tr>
                                    <td><?= $value->no_order ?></td>
                                    <td><?= $value->date_order ?></td>
                                    <td>
                                        <span class="font-weight-bold text-uppercase"><?= $value->courier ?></span> <br>
                                        Delivery: <?= $value->delivery ?> <br>
                                        Shipping: <?= number_format($value->shipping, 0) ?>
                                    </td>
                                    <td>
                                        <b>Rp. <?= number_format($value->total, 0) ?></b> <br>
                                        <span class="badge badge-primary">Processed/Packaged</span>
                                    </td>
                                    <td>
                                        <?php
                                        if ($value->payment_status == 1) { ?>
                                            <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#send<?= $value->id_transaction ?>">Send order</button>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
                    <table class="table table-striped table-responsive-sm table-bordered">
                        <thead>
                            <tr>
                                <th>No. Order</th>
                                <th>Date</th>
                                <th>Courier</th>
                                <th>Total</th>
                                <th>Resi Number</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($order_shipped as $key => $value) { ?>
                                <tr>
                                    <td><?= $value->no_order ?></td>
                                    <td><?= $value->date_order ?></td>
                                    <td>
                                        <span class="font-weight-bold text-uppercase"><?= $value->courier ?></span> <br>
                                        Delivery: <?= $value->delivery ?> <br>
                                        Shipping: <?= number_format($value->shipping, 0) ?>
                                    </td>
                                    <td>
                                        <b>Rp. <?= number_format($value->total, 0) ?></b> <br>
                                        <span class="badge badge-success">Shipped</span>
                                    </td>
                                    <td>
                                        <?= $value->resi ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="custom-tabs-one-settings" role="tabpanel" aria-labelledby="custom-tabs-one-settings-tab">
                    <table class="table table-striped table-responsive-sm table-bordered">
                        <thead>
                            <tr>
                                <th>No. Order</th>
                                <th>Date</th>
                                <th>Courier</th>
                                <th>Total</th>
                                <th>Resi Number</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($order_completed as $key => $value) { ?>
                                <tr>
                                    <td><?= $value->no_order ?></td>
                                    <td><?= $value->date_order ?></td>
                                    <td>
                                        <span class="font-weight-bold text-uppercase"><?= $value->courier ?></span> <br>
                                        Delivery: <?= $value->delivery ?> <br>
                                        Shipping: <?= number_format($value->shipping, 0) ?>
                                    </td>
                                    <td>
                                        <b>Rp. <?= number_format($value->total, 0) ?></b> <br>
                                        <span class="badge badge-success">Completed/Arrived to customer</span>
                                    </td>
                                    <td>
                                        <?= $value->resi ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.card -->
    </div>
</div>


<!-- Modal -->
<?php foreach ($orders as $key => $value) { ?>
    <div class="modal fade" id="check<?= $value->id_transaction ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?= $value->no_order ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <tr>
                            <th>Name</th>
                            <th>:</th>
                            <td><?= $value->in_the_name_of ?></td>
                        </tr>
                        <tr>
                            <th>Bank Name</th>
                            <th>:</th>
                            <td><?= $value->bank_name ?></td>
                        </tr>
                        <tr>
                            <th>Account Number</th>
                            <th>:</th>
                            <td><?= $value->no_rek ?></td>
                        </tr>
                        <tr>
                            <th>Total</th>
                            <th>:</th>
                            <td>Rp. <?= number_format($value->total, 0) ?></td>
                        </tr>
                    </table>

                    <img class="img-fluid pad" src="<?= base_url('assets/img/payment/' . $value->proof_payment) ?>" alt="">

                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>
<!-- /.modal -->



<!-- modal send order -->
<?php foreach ($order_processed as $key => $value) { ?>
    <div class="modal fade" id="send<?= $value->id_transaction ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?= $value->no_order ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <?php echo form_open('admin/send_order/' . $value->id_transaction) ?>
                    <table class="table">
                        <tr>
                            <th>Courier</th>
                            <th>:</th>
                            <th class="text-uppercase"><?= $value->courier ?></th>
                        </tr>
                        <tr>
                            <th>Delivery</th>
                            <th>:</th>
                            <th><?= $value->delivery ?></th>
                        </tr>
                        <tr>
                            <th>Shipping</th>
                            <th>:</th>
                            <th>Rp. <?= number_format($value->shipping, 0) ?></th>
                        </tr>
                        <tr>
                            <th>Resi Number</th>
                            <th>:</th>
                            <th><input name="resi" class="form-control" placeholder="Resi Number" required></th>
                        </tr>
                    </table>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Send Order</button>
                </div>
                <?php echo form_close() ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>
<!-- /.modal -->