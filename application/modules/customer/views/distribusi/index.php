<div class="container mt-4">
    <h2 class="mb-4">Distribusi Saya</h2>

    <!-- Flash message -->
    <?php if ($this->session->flashdata('message')) : ?>
        <div class="alert alert-info">
            <?= $this->session->flashdata('message'); ?>
        </div>
    <?php endif; ?>

    <!-- Search -->
    <form method="get" class="row mb-3">
        <div class="col-md-4">
            <input type="text" name="search" class="form-control" placeholder="Cari distribusi..." value="<?= $this->input->get('search') ?>">
        </div>
        <div class="col-md-2">
            <button class="btn btn-primary" type="submit">Cari</button>
        </div>
    </form>

    <!-- Distribusi Table -->
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Nomor Distribusi</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Metode Pengiriman</th>
                    <th>Total Item</th>
                    <th>Total Volume</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($distribusi)) : ?>
                    <tr>
                        <td colspan="8" class="text-center">Belum ada data distribusi.</td>
                    </tr>
                <?php else : ?>
                    <?php $no = $start + 1; foreach ($distribusi as $row) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row->nomor_distribusi ?></td>
                            <td><?= date('d-m-Y', strtotime($row->tanggal_distribusi)) ?></td>
                            <td>
                                <?php if ($row->status == 'selesai'): ?>
                                    <span class="badge bg-success">Selesai</span>
                                <?php elseif ($row->status == 'dikirim'): ?>
                                    <span class="badge bg-primary">Dikirim</span>
                                <?php else: ?>
                                    <span class="badge bg-warning text-dark"><?= ucfirst($row->status) ?></span>
                                <?php endif; ?>
                            </td>
                            <td><?= $row->metode_pengiriman ?></td>
                            <td><?= $row->total_item ?></td>
                            <td><?= $row->total_volume ?> <?= $row->satuan ?></td>
                            <td>
                                <a href="<?= site_url('customer/distribusi/detail/' . $row->id) ?>" class="btn btn-sm btn-info">
                                    Detail
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-3">
        <?= $pagination ?>
    </div>
</div>
