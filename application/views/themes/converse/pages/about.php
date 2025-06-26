<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="hero-wrap hero-bread" style="background-image: url('<?php echo get_theme_uri('images/b2.jpg'); ?>');">
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><?php echo anchor(base_url(), 'Home'); ?></span> <span>Tentang Pupuk Kami</span></p>
          <h1 class="mb-0 bread">Tentang Pupuk Kami</h1>
        </div>
      </div>
    </div>
  </div>

<section class="ftco-section bg-light">
  <div class="container">
    <div class="row justify-content-center mb-5">
      <div class="col-md-10 text-center">
        <h2 class="mb-4" style="font-size: 32px; font-weight: bold;">Pupuk Unggulan Toko Kami</h2>
        <p class="lead">Berikut adalah produk pupuk lengkap beserta manfaat dan kandungannya.</p>
      </div>
    </div>

    <div class="row">
      <?php 
        $pupuk_list = [
          [
            'nama' => 'NPK Mutiara 16-6-16',
            'gambar' => 'assets/product/p1.jpg',
            'kandungan' => 'Nitrogen 16%, Fosfor 6%, Kalium 16%',
            'kegunaan' => 'Cocok untuk pertumbuhan daun dan pembentukan buah/bunga.',
          ],
          [
            'nama' => 'NPK Phonska Plus 15-15-15',
            'gambar' => 'assets/product/p2.jpg',
            'kandungan' => 'N 15%, P 15%, K 15% + Zinc',
            'kegunaan' => 'Pertumbuhan seimbang seluruh bagian tanaman.',
          ],
          [
            'nama' => 'NPK 12-12-17-2 + TE',
            'gambar' => 'assets/product/p3.jpg',
            'kandungan' => 'N 12%, P 12%, K 17%, Mg 2% + TE',
            'kegunaan' => 'Pembentukan buah dan fotosintesis optimal.',
          ],
          [
            'nama' => 'Organik Lengkap',
            'gambar' => 'assets/product/p4.jpg',
            'kandungan' => 'Unsur makro & mikro dari bahan organik alami',
            'kegunaan' => 'Perbaikan struktur tanah & nutrisi bertahap.',
          ],
          [
            'nama' => 'KCL (Kalium Klorida)',
            'gambar' => 'assets/product/p5.jpg',
            'kandungan' => 'Kalium 60% (K₂O)',
            'kegunaan' => 'Kualitas buah, batang kuat, isi buah optimal.',
          ],
          [
            'nama' => 'Rock Phosphate',
            'gambar' => 'assets/product/p6.jpg',
            'kandungan' => 'Fosfor mineral alami',
            'kegunaan' => 'Sumber P jangka panjang, cocok untuk tanah masam.',
          ],
          [
            'nama' => 'Dolomit',
            'gambar' => 'assets/product/p7.jpg',
            'kandungan' => 'Kalsium dan Magnesium (CaCO₃ + MgCO₃)',
            'kegunaan' => 'Menetralkan tanah asam & menyediakan Ca-Mg.',
          ],
          [
            'nama' => 'NPK 13-8-27-4 + 0.5B',
            'gambar' => 'assets/product/p8.jpg',
            'kandungan' => 'N 13%, P 8%, K 27%, Mg 4%, B 0.5%',
            'kegunaan' => 'Pembungaan & penyerbukan optimal (tinggi K dan B).',
          ],
          [
            'nama' => 'Pupuk TSP',
            'gambar' => 'assets/product/p9.jpg',
            'kandungan' => 'Fosfor (P₂O₅) 44–46%',
            'kegunaan' => 'Akar dan bunga kuat. Kombinasi dengan N dan K.',
          ],
          [
            'nama' => 'Pupuk Urea',
            'gambar' => 'assets/product/p10.jpg',
            'kandungan' => 'Nitrogen (N) 46%',
            'kegunaan' => 'Pertumbuhan vegetatif cepat (daun & batang).',
          ],
        ];

        foreach ($pupuk_list as $pupuk): 
      ?>
      <div class="col-md-6 col-lg-4 mb-4 d-flex align-items-stretch">
        <div class="card shadow-sm rounded-lg w-100">
          <img src="<?php echo base_url($pupuk['gambar']); ?>" class="card-img-top" alt="<?php echo $pupuk['nama']; ?>" style="height: 200px; object-fit: cover;">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title font-weight-bold"><?php echo $pupuk['nama']; ?></h5>
            <p><strong>Kandungan:</strong> <?php echo $pupuk['kandungan']; ?></p>
            <p><strong>Kegunaan:</strong> <?php echo $pupuk['kegunaan']; ?></p>
            <a href="<?php echo site_url('#products'); ?>" class="btn btn-sm btn-primary mt-auto">Lihat Produk</a>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
  
      <section class="ftco-section testimony-section">
    <div class="container">
      <div class="row justify-content-center mb-5 pb-3">
        <div class="col-md-7 heading-section ftco-animate text-center">
            <span class="subheading">Testimony</span>
          <h2 class="mb-4">Apa yang pelanggan kami katakan?</h2>
        </div>
      </div>
      <div class="row ftco-animate">
        <div class="col-md-12">
          <div class="carousel-testimony owl-carousel">
            <?php if ( count($reviews) > 0) : ?>
            <?php foreach ($reviews as $review) : ?>
            <div class="item">
              <div class="testimony-wrap p-4 pb-5">
                <div class="user-img mb-5" style="background-image: url(<?php echo base_url('assets/uploads/users/'. $review->profile_picture); ?>)">
                  <span class="quote d-flex align-items-center justify-content-center">
                    <i class="icon-quote-left"></i>
                  </span>
                </div>
                <div class="text text-center">
                  <p class="mb-5 pl-4 line"><?php echo $review->review_text; ?></p>
                  <p class="name"><?php echo $review->name; ?></p>
                  <span class="position"><?php echo get_formatted_date($review->review_date); ?></span>
                </div>
              </div>
            </div>
            <?php endforeach; ?>
            <?php else : ?>
            <?php endif; ?>

          </div>
        </div>
      </div>
    </div>
  </section>

  
<section class="ftco-section">
      <div class="container">
          <div class="row no-gutters ftco-services">
    <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
      <div class="media block-6 services mb-md-0 mb-4">
        <div class="icon bg-color-1 active d-flex justify-content-center align-items-center mb-2">
              <span class="flaticon-shipped"></span>
        </div>
        <div class="media-body">
          <h3 class="heading">Gratis Ongkir</h3>
          <span>Belanja minimal Rp <?php echo format_rupiah(get_settings('min_shop_to_free_shipping_cost')); ?></span>
        </div>
      </div>      
    </div>
    <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
      <div class="media block-6 services mb-md-0 mb-4">
        <div class="icon bg-color-2 d-flex justify-content-center align-items-center mb-2">
              <span class="flaticon-box"></span>
        </div>
        <div class="media-body">
          <h3 class="heading">PENGIRIMAN CEPAT</h3>
          <span>UNTUK PENGIRIMAN AMAN DAN TERCEPAT</span>
        </div>
      </div>    
    </div>
    <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
      <div class="media block-6 services mb-md-0 mb-4">
        <div class="icon bg-color-3 d-flex justify-content-center align-items-center mb-2">
              <span class="flaticon-award"></span>
        </div>
        <div class="media-body">
          <h3 class="heading">Kualitas Terbaik</h3>
          <span>Kualitas dari Pertanian Terbaik</span>
        </div>
      </div>      
    </div>
    <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
      <div class="media block-6 services mb-md-0 mb-4">
        <div class="icon bg-color-4 d-flex justify-content-center align-items-center mb-2">
              <span class="flaticon-customer-service"></span>
        </div>
        <div class="media-body">
          <h3 class="heading">Bantuan</h3>
          <span>Bantuan 24/7 Selalu Online</span>
        </div>
      </div>      
    </div>
  </div>
      </div>
  </section>