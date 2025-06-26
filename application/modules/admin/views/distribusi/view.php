<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Detail Distribusi #<?php echo $order_data->order_number; ?></h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="<?= site_url('admin'); ?>"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="<?= site_url('admin/distribusi'); ?>">Distribusi</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 col-5 text-right">
                    <a href="<?= site_url('admin/distribusi'); ?>" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid mt--6">
    <div class="row">
        <div class="col-md-8">
            <div class="card-wrapper">
                <!-- Barang dalam Pesanan -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="mb-0">Barang dalam Pesanan</h3>
                    </div>
                    <div class="card-body p-0">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Produk</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Harga Satuan</th>
                                    <th scope="col">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($items): ?>
                                    <?php $total_harga = 0; ?>
                                    <?php foreach ($items as $item) : ?>
                                        <?php $subtotal = $item->order_qty * $item->order_price; ?>
                                        <?php $total_harga += $subtotal; ?>
                                        <tr>
                                            <td>
                                                <img class="img img-fluid rounded" style="width: 60px; height: 60px; object-fit: cover;" alt="<?php echo $item->name; ?>" src="<?php echo base_url('assets/uploads/products/' . $item->picture_name); ?>">
                                            </td>
                                            <td>
                                                <h5 class="mb-0"><?php echo $item->name; ?></h5>
                                            </td>
                                            <td><?php echo $item->order_qty; ?></td>
                                            <td>Rp <?php echo format_rupiah($item->order_price); ?></td>
                                            <td>Rp <?php echo format_rupiah($subtotal); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                    <tr class="table-active">
                                        <td colspan="4" class="text-right"><strong>Total Harga:</strong></td>
                                        <td><strong>Rp <?php echo format_rupiah($total_harga); ?></strong></td>
                                    </tr>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="5" class="text-center">Tidak ada barang dalam pesanan ini.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <!-- Data Penerima -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="mb-0">Data Penerima</h3>
                </div>
                <div class="card-body p-0">
                    <table class="table align-items-center table-flush table-hover">
                        <tr>
                            <td>Nama</td>
                            <td><b><?php echo $customer_data->name; ?></b></td>
                        </tr>
                        <tr>
                            <td>No. HP</td>
                            <td><b><?php echo $customer_data->phone_number; ?></b></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><b><?php echo $customer_data->email; ?></b></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>
                                <div style="white-space: initial;"><b><?php echo $customer_data->address; ?></b></div>
                            </td>
                        </tr>
                        <tr>
                            <td>Catatan</td>
                            <td><b><?php echo ($order_data->note) ? $order_data->note : '-'; ?></b></td>
                        </tr>
                        <tr>
                            <td>Tanggal Order</td>
                            <td><b><?php echo get_formatted_date($order_data->order_date); ?></b></td>
                        </tr>
                        <tr>
                            <td>Status Order</td>
                            <td>
                                <b class="statusField">
                                    <?php echo get_order_status($order_data->order_status, $order_data->payment_method); ?>
                                </b>
                            </td>
                        </tr>
                        <tr>
                            <td>Metode Pembayaran</td>
                            <td><b><?php echo strtoupper($order_data->payment_method); ?></b></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>