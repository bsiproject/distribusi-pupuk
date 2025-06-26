<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Header -->
<div class="header bg-primary pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0">Order #<?php echo $data->order_number; ?></h6>
        </div>
        <div class="col-lg-6 col-5 text-right">
          <a href="<?php echo site_url('admin/orders/pdf/' . $data->id); ?>" class="btn btn-info">
            <i class="fa fa-print"></i> Print
          </a>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Page content -->
<div class="container-fluid mt--6">
  <div class="row">
    <div class="col-md-8">
      <div class="card-wrapper">
        <div class="card">
          <div class="card-header">
            <h3 class="mb-0">Data Order</h3>
            <?php if ($order_flash) : ?>
              <span class="float-right text-success font-weight-bold" style="margin-top: -30px;"><?php echo $order_flash; ?></span>
            <?php endif; ?>
          </div>

          <div class="card-body p-0">
            <table class="table align-items-center table-flush table-striped">
              <tr>
                <td>Nomor</td>
                <td><b>#<?php echo $data->order_number; ?></b></td>
              </tr>
              <tr>
                <td>Tanggal</td>
                <td><b><?php echo get_formatted_date($data->order_date); ?></b></td>
              </tr>
              <tr>
                <td>Item</td>
                <td><b><?php echo $data->total_items; ?></b></td>
              </tr>
              <tr>
                <td>Harga</td>
                <td><b>Rp <?php echo format_rupiah($data->total_price); ?></b></td>
              </tr>
              <tr>
                <td>Metode pembayaran</td>
                <td><b><?php echo ($data->payment_method == 1) ? 'Transfer bank' : 'Bayar ditempat'; ?></b></td>
              </tr>
            </table>
          </div>

          <!-- Optional Footer -->
          <div class="card-footer text-right">
            <a href="<?php echo site_url('admin/orders'); ?>" class="btn btn-secondary">Kembali</a>
          </div>

        </div> <!-- card -->
      </div> <!-- card-wrapper -->
    </div> <!-- col -->
  </div> <!-- row -->
</div> <!-- container -->
