<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Header -->
<div class="header bg-primary pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0">Kelola Distribusi</h6>
        </div>
        <div class="col-lg-6 col-5 text-right">
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item active" aria-current="page">Distribusi</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
  <div class="row">
    <div class="col">
      <div class="card">
        <!-- Card header -->
        <div class="card-header">
          <h3 class="mb-0">Kelola Distribusi</h3>
        </div>

        
<table id="distribusi-table" class="table align-items-center table-flush">
  <thead class="thead-light">
    <tr>
      <th>No</th>
      <th>Ekspedisi</th>
      <th>Tracking ID</th>
      <th>Status</th>
      <th>Tanggal</th>
    </tr>
  </thead>
  <tbody></tbody>
</table>

<script>
  $(document).ready(function() {
    $('#distribusi-table').DataTable({
      processing: true,
      serverSide: true,
      ajax: {
        url: '<?= site_url("admin/distribusi/get_ajax_data") ?>',
        type: 'POST'
      },
      columns: [
        { data: null, render: (data, type, row, meta) => meta.row + 1 },
        { data: 'ekspedisi' },
        { data: 'tracking_id' },
        { data: 'status' },
        { data: 'tanggal_distribusi' }
      ]
    });
  });
</script>


          
          <div class="card-body">
            <div class="alert alert-primary">
              Belum ada data distribusi
            </div>
          </div>


      </div>
    </div>
  </div>
</div>