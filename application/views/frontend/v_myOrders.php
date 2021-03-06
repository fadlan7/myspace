<div class="content-wrapper" style="padding-top: 100px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= $title ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">MySpace</a></li>
                        <li class="breadcrumb-item font-weight-bold"><a href="#"><?= $title ?></a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container">

            <div class="row">
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
                                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Orders</a>
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
                                            foreach ($not_yet_paid as $key => $value) { ?>
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
                                                        if ($value->payment_status == 0) { ?>
                                                            <a href="<?= base_url('my_order/pay/' . $value->id_transaction) ?>" class="btn btn-sm btn-success">Pay</a>
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
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($processed as $key => $value) { ?>
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
                                                        <span class="badge badge-success">Verified</span> <br>
                                                        <span class="badge badge-primary">Processed/Packaged</span>
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
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($shipped as $key => $value) { ?>
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
                                                        <span class="badge badge-success">Shipped</span> <br>
                                                    </td>
                                                    <td><?= $value->resi ?></td>
                                                    <td>
                                                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#received<?= $value->id_transaction ?>">Order Received</button>
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
                                            foreach ($completed as $key => $value) { ?>
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
                                                        <span class="badge badge-success">Completed</span> <br>
                                                    </td>
                                                    <td><?= $value->resi ?></td>
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
            </div>
        </div>
    </div>
</div>



<!-- Modal -->
<?php
foreach ($shipped as $key => $value) { ?>
    <div class="modal fade" id="received<?= $value->id_transaction ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Order Received</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>One fine body&hellip;</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">NO</button>
                    <a href="<?= base_url('my_order/order_received/' . $value->id_transaction) ?>" class="btn btn-primary">YES</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>
<!-- /.modal -->



<script>
    $(function() {
        $('.navbar').addClass('active');
    });
</script>