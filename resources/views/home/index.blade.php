@extends('home.includes.compleate')

@php
    $title = "Home";
    $index= "active";
@endphp

@section('bodyCompleate')
<section id="hero" class="hero d-flex align-items-center">
  <div class="container">
    <div class="row gy-4 d-flex justify-content-between">
      <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
        <h2 data-aos="fade-up">Ketersediaan Tempat Tidur Klinik Kini dalam Genggamanmu</h2>
        <p data-aos="fade-up" data-aos-delay="100">Situs kami memungkinkan Anda dengan cepat menemukan ketersediaan tempat tidur klinik di Bantaeng. Dengan informasi terkini dan mudah dijangkau, Anda memiliki kendali penuh atas perawatan kesehatan Anda. Selamat datang di era kesehatan yang lebih cerdas dan efisien</p>

        <form action="{{ route('search') }}" class="form-search d-flex align-items-stretch mb-3" data-aos="fade-up" data-aos-delay="200" method="GET">
          <input type="text" class="form-control" name="keyword" placeholder="Cari Klinik">
          <button type="submit" class="btn btn-primary">Search</button>
      </form>
      

        <div class="row gy-4" data-aos="fade-up" data-aos-delay="400">

          <div class="col-lg-3 col-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="{{$clinics}}" data-purecounter-duration="1" class="purecounter"></span>
              <p>Klinik</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="{{$rooms}}" data-purecounter-duration="1" class="purecounter"></span>
              <p>Kamar</p>
            </div>
          </div><!-- End Stats Item -->
          <div class="col-lg-3 col-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="{{$beds}}" data-purecounter-duration="1" class="purecounter"></span>
              <p>Tempat Tidur</p>
            </div>
          </div><!-- End Stats Item -->


        </div>
      </div>

      <div class="col-lg-5 order-1 order-lg-2 hero-img" data-aos="zoom-out">
        <img src="{{ asset('import/assets/img/hero-img.svg') }}" class="img-fluid mb-3 mb-lg-0" alt="">
      </div>

    </div>
  </div>
</section><!-- End Hero Section -->

<main id="main">

  <!-- ======= klinik Section ======= -->
  <section id="service" class="services pt-0">
    <div class="container" data-aos="fade-up">

      <div class="section-header">
        <span>Klinik</span>
        <h2>Klinik</h2>

      </div>

      <div class="row gy-4">

        @foreach($cachedClinics as $clinic)
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
              <div class="card">
                  <div class="card-img"  style="max-height: 200px">
                    <img src="{{ $clinic->picture ? asset($clinic->picture) : asset('import/assets/img/klinik/mitra.jpg') }}" alt="" class="img-fluid" width="100%" style="object-fit: cover;">

                  </div>
                  <h3><a href="{{ route('klinikDetile', $clinic->id) }}" class="stretched-link"> Klinik {{ $clinic->name_clinic }}</a></h3>
                  <p>{{ $clinic->address }}</p>
              </div>
            </div>
            @endforeach
        <!-- End Card Item -->
        

      </div>

    </div>
  </section>
  <!-- End Klinik Section -->

   <!-- ======= Info ======= -->
   <section id="info" class="features">
    <div class="container">

      <div class="row gy-4 align-items-center features-item" data-aos="fade-up">

        <div class="col-md-5">
          <img src="{{asset('import/assets/img/klinik/klinik.jpg')}}" class="img-fluid" alt="">
        </div>
        <div class="col-md-7">
          <h3>Klinik</h3>
          <p class="fst-italic">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Klinik adalah pondasi penting dalam perawatan kesehatan masyarakat, berperan sebagai tempat pelayanan medis, diagnosis, dan pengobatan yang mudah diakses. 
          </p>
          <p>
           Mereka tidak hanya merawat penyakit, tetapi juga memberikan edukasi tentang kesehatan dan pencegahan penyakit, serta menjadi garda terdepan dalam situasi darurat medis. Dalam keseluruhan sistem kesehatan, klinik memainkan peran sentral dalam menjaga kesejahteraan dan kesehatan masyarakat.

          </p>
          
        </div>
      </div><!-- Features Item -->

      <div class="row gy-4 align-items-center features-item" data-aos="fade-up">
        <div class="col-md-5 order-1 order-md-2">
          <img src="{{asset('import/assets/img/klinik/kamar.jpg')}}" class="img-fluid" alt="">
        </div>
        <div class="col-md-7 order-2 order-md-1">
          <h3>Kamar</h3>
          <p class="fst-italic">
            Kamar klinik adalah lingkungan penting di dalam fasilitas perawatan kesehatan ini. Ini adalah tempat di mana pasien menerima perawatan medis, diagnosis, dan perawatan yang mereka butuhkan. 
          </p>
          <p>
            Kebersihan, kelengkapan peralatan medis, serta kenyamanan dalam kamar klinik sangat penting agar pasien merasa aman dan mendapatkan perawatan yang efektif.
          </p>
        </div>
      </div><!-- Features Item -->

      <div class="row gy-4 align-items-center features-item" data-aos="fade-up">

        <div class="col-md-5">
          <img src="{{asset('import/assets/img/klinik/bed.jpg')}}" class="img-fluid" alt="">
        </div>
        <div class="col-md-7">
          <h3>Tempat Tidur</h3>
          <p>Mendapatkan akses informasi tentang ketersediaan tempat tidur dalam sistem perawatan kesehatan memiliki dampak yang sangat penting </p>
          <ul>
            <li><i class="bi bi-check"></i> Penempatan Pasien yang Tepat</li>
            <li><i class="bi bi-check"></i>Efisiensi Operasional</li>
            <li><i class="bi bi-check"></i>Pemantauan Kapasitas</li>
            <li><i class="bi bi-check"></i>Pengalokasian Sumber Daya</li>
            <li><i class="bi bi-check"></i>Kenyamanan Pasien dan Keluarga</li>
          </ul>
        </div>
      </div><!-- Features Item -->




  <!-- ======= Frequently Asked Questions Section ======= -->
  <section id="faq" class="faq">
    <div class="container" data-aos="fade-up">

      <div class="section-header">
        <span>Frequently Asked Questions</span>
        <h2>Frequently Asked Questions</h2>

      </div>

      <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="200">
        <div class="col-lg-10">

          <div class="accordion accordion-flush" id="faqlist">

            <div class="accordion-item">
              <h3 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-1">
                  <i class="bi bi-question-circle question-icon"></i>
                  Mengapa penting untuk mendapatkan informasi tempat tidur secara cepat dalam konteks klinik atau rumah sakit?
                </button>
              </h3>
              <div id="faq-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                <div class="accordion-body">
                  Mendapatkan informasi tempat tidur dengan cepat penting karena waktu merupakan faktor krusial dalam penanganan medis. Setiap detik bisa sangat berarti dalam memastikan pasien mendapatkan tempat tidur dan perawatan yang sesuai.
                </div>
              </div>
            </div><!-- # Faq item-->

            <div class="accordion-item">
              <h3 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-2">
                  <i class="bi bi-question-circle question-icon"></i>
                  Bagaimana ketersediaan tempat tidur dapat memengaruhi penanganan pasien di suatu klinik atau rumah sakit?
                </button>
              </h3>
              <div id="faq-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                <div class="accordion-body">
                  Ketersediaan tempat tidur berdampak langsung pada kemampuan suatu klinik atau rumah sakit dalam menangani pasien. Jika tempat tidur tidak tersedia dengan cepat, hal ini bisa menghambat penanganan medis yang segera dibutuhkan bagi pasien yang membutuhkan perawatan darurat.
                </div>
              </div>
            </div><!-- # Faq item-->

            <div class="accordion-item">
              <h3 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-3">
                  <i class="bi bi-question-circle question-icon"></i>
                  Apa manfaat utama dari adanya website yang memberikan informasi ketersediaan tempat tidur pasien bagi masyarakat umum?
                </button>
              </h3>
              <div id="faq-content-3" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                <div class="accordion-body">
                  Website yang memberikan informasi ketersediaan tempat tidur pasien penting bagi masyarakat karena memungkinkan mereka untuk mengetahui ketersediaan tempat tidur sebelum pergi ke klinik atau rumah sakit. Hal ini dapat menghemat waktu, mengurangi kecemasan, serta memfasilitasi keputusan yang lebih baik dalam mencari layanan kesehatan.
                </div>
              </div>
            </div><!-- # Faq item-->

            <div class="accordion-item">
              <h3 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-4">
                  <i class="bi bi-question-circle question-icon"></i>
                  Bagaimana peran teknologi PWA dalam mempercepat akses informasi terkait ketersediaan tempat tidur pasien?
                </button>
              </h3>
              <div id="faq-content-4" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                <div class="accordion-body">
                  <i class="bi bi-question-circle question-icon"></i>
                  Teknologi PWA (Progressive Web App) memberikan keunggulan aksesibilitas dan kecepatan dalam pengambilan informasi. Dengan teknologi ini, pengguna dapat mengakses informasi ketersediaan tempat tidur secara langsung melalui web tanpa perlu mengunduh aplikasi khusus, meningkatkan kemudahan akses bagi pengguna.
                </div>
              </div>
            </div><!-- # Faq item-->

            <div class="accordion-item">
              <h3 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-5">
                  <i class="bi bi-question-circle question-icon"></i>
                  Apa dampak positif dari website yang menyediakan informasi ketersediaan tempat tidur pasien terhadap efisiensi operasional klinik atau rumah sakit?
                </button>
              </h3>
              <div id="faq-content-5" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                <div class="accordion-body">
                  Website yang menyediakan informasi ketersediaan tempat tidur pasien dapat meningkatkan efisiensi operasional klinik atau rumah sakit. Dengan memungkinkan manajemen yang lebih baik terhadap ketersediaan tempat tidur, hal ini dapat mengurangi waktu tunggu, mengoptimalkan penggunaan sumber daya, dan meningkatkan kepuasan pasien dalam mendapatkan perawatan yang dibutuhkan.
                </div>
              </div>
            </div><!-- # Faq item-->

          </div>

        </div>
      </div>

    </div>
  </section><!-- End Frequently Asked Questions Section -->

</main><!-- End #main -->
    
@endsection