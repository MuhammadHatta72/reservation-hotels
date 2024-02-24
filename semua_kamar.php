<?php
    include 'functions/koneksi.php';
    session_start();
    $query_kamar = mysqli_query($conn, "SELECT * FROM rooms");
    $query_hasil_kamar = mysqli_fetch_all($query_kamar, MYSQLI_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Guest House - UPT PPP Bulu Tuban</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="keywords" />
    <meta content="" name="description" />

    <!-- Favicon -->
    <link href="assets/landing/img/pppbulutuban.png" rel="icon" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />

    <!-- Icon Font Stylesheet -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css"
      rel="stylesheet"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"
      rel="stylesheet"
    />

    <!-- Libraries Stylesheet -->
    <link href="assets/landing/lib/animate/animate.min.css" rel="stylesheet" />
    <link
      href="assets/landing/lib/owlcarousel/assets/landing/owl.carousel.min.css"
      rel="stylesheet"
    />
    <link
      href="assets/landing/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css"
      rel="stylesheet"
    />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="assets/landing/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Template Stylesheet -->
    <link href="assets/landing/css/style.css" rel="stylesheet" />
  </head>

  <body>
    <div class="container-fluid bg-white p-0">
      <!-- Spinner Start -->
      <div
        id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center"
      >
        <div
          class="spinner-border text-primary"
          style="width: 3rem; height: 3rem"
          role="status"
        >
          <span class="sr-only">Loading...</span>
        </div>
      </div>
      <!-- Spinner End -->

      <!-- Header Start -->
      <div class="container-fluid bg-dark px-0">
        <div class="row gx-0">
          <div class="col-lg-4 bg-dark d-none d-lg-block">
            <a
              href="index.html"
              class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center"
            >
              <img src="assets/landing/img/pppbulutuban.png" alt="" width="90px">
              <h1 class="m-0 text-primary text-uppercase">GUEST HOUSE</h1>
            </a>
          </div>
          <div class="col-lg-8">
            <div class="row gx-0 bg-white d-none d-lg-flex">
              <div class="col-lg-7 px-5 text-start">
                <div class="h-100 d-inline-flex align-items-center py-2 me-4">
                  <i class="fa fa-envelope text-primary me-2"></i>
                  <p class="mb-0">guesthouse@gmail.com</p>
                </div>
                <div class="h-100 d-inline-flex align-items-center py-2">
                  <i class="fa fa-phone-alt text-primary me-2"></i>
                  <p class="mb-0">+62 822-9370-8227</p>
                </div>
              </div>
              <div class="col-lg-5 px-5 text-end">
                <div class="d-inline-flex align-items-center py-2">
                  <a class="me-3" href=""><i class="fab fa-facebook-f"></i></a>
                  <a class="me-3" href=""><i class="fab fa-instagram"></i></a>
                  <a class="" href=""><i class="fab fa-youtube"></i></a>
                </div>
              </div>
            </div>
            <nav class="navbar navbar-expand-lg bg-dark navbar-dark p-3 p-lg-0">
              <a href="index.php" class="navbar-brand d-block d-lg-none">
                <div class="d-flex align-items-center">
                  <img src="assets/landing/img/pppbulutuban.png" alt="" width="50px">
                  <h1 class="m-0 text-primary text-uppercase">GUEST HOUSE</h1>
                </div>
              </a>
              <button
                type="button"
                class="navbar-toggler"
                data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse"
              >
                <span class="navbar-toggler-icon"></span>
              </button>
              <div
                class="collapse navbar-collapse justify-content-between"
                id="navbarCollapse"
              >
                <div class="navbar-nav mr-auto py-0">
                  <a href="index.php" class="nav-item nav-link">Beranda</a>
                  <a href="semua_kamar.php" class="nav-item nav-link active">Kamar</a>
                </div>
                <a
                  href="login.php"
                  class="btn btn-primary rounded-0 py-4 px-md-5 d-none d-lg-block"
                  >Login<i class="fa fa-arrow-right ms-3"></i
                ></a>
              </div>
            </nav>
          </div>
        </div>
      </div>
      <!-- Header End -->

      <!-- Carousel Start -->
      <div class="container-fluid p-0 mb-5">
        <div
          id="header-carousel"
          class="carousel slide"
          data-bs-ride="carousel"
        >
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img
                class="w-100"
                src="assets/landing/img/slide1.jpeg"
                alt="Image"
              />
              <div
                class="carousel-caption d-flex flex-column align-items-center justify-content-center"
              >
                <div class="p-3" style="max-width: 700px">
                  <h6
                    class="section-title text-white text-uppercase mb-3 animated slideInDown"
                  >
                    Hotel & Resort
                  </h6>
                  <h1 class="display-3 text-white mb-4 animated slideInDown">
                    Daftar Kamar di <br /> <span class="text-primary">Guest House</span>
                  </h1>
                  <a
                    href="#semua_kamar"
                    class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft"
                    >Selengkapnya</a
                  >
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <img
                class="w-100"
                src="assets/landing/img/slide2.jpeg"
                alt="Image"
              />
              <div
                class="carousel-caption d-flex flex-column align-items-center justify-content-center"
              >
                <div class="p-3" style="max-width: 700px">
                  <h6
                    class="section-title text-white text-uppercase mb-3 animated slideInDown"
                  >
                    Hotel & Resort
                  </h6>
                  <h1 class="display-3 text-white mb-4 animated slideInDown">
                    Daftar Kamar di <br /> <span class="text-primary">Guest House</span>
                  </h1>
                  <a
                    href="#semua_kamar"
                    class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft"
                    >Selengkapnya</a
                  >
                </div>
              </div>
            </div>
          </div>
          <button
            class="carousel-control-prev"
            type="button"
            data-bs-target="#header-carousel"
            data-bs-slide="prev"
          >
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button
            class="carousel-control-next"
            type="button"
            data-bs-target="#header-carousel"
            data-bs-slide="next"
          >
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
      <!-- Carousel End -->

      <!-- About Start -->
      <div class="container-xxl py-5" id="semua_kamar">
        <div class="container">
          <div class="row g-5 align-items-center">
            <div class="col-lg-12">
              <h6 class="section-title text-start text-primary text-uppercase">
                Guest House
              </h6>
              <h1 class="mb-4">
                Daftar Kamar
              </h1>
              <p class="mb-4">
                Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit.
                Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit,
                sed stet lorem sit clita duo justo magna dolore erat amet
              </p>
              <div class="row">
                    <?php
                        foreach($query_hasil_kamar as $kamar){
                    ?>
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-bottom-warning shadow h-100 py-2">
                            <div class="card-body">
                                <img src="assets/admin/img/kamar.jpeg" alt="" width="100%" class="mb-3">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="h5 mb-0">Kamar <?= $kamar['room_number'] ?></div>
                                        <!-- format rupiah -->
                                        <p class="mb-0">Harga : Rp. <?= number_format($kamar['harga'], 0, ',', '.') ?></p>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-bed fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                                <?php
                                if($kamar['status'] == 'available'){
                                ?>
                                <div class="row no-gutters align-items-center mt-3">
                                    <div class="col-auto">
                                        <div class="mb-0">Status: Kosong</div>
                                    </div>
                                </div>
                                <div class="row no-gutters align-items-center mt-3">
                                    <div class="col-md-6 float-right">
                                        <!-- <a href="tambah_pemesanan_pengguna.php?room_id=<?= $kamar['id'] ?>" class="btn btn-primary btn-block" data-bs-toggle="modal" data-bs-target="#exampleModal">Pesan</a> -->
                                        <button type="button" class="btn btn-primary btn-block viewCheckUser" data-id="<?= $kamar['id'] ?>">Pesan</button>
                                    </div>
                                </div>
                                <?php
                                }else{
                                ?>
                                <div class="row no-gutters align-items-center mt-3">
                                    <div class="col-auto">
                                        <div class="mb-0">Status: Terisi</div>
                                    </div>
                                </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
          </div>
        </div>
      </div>
      <!-- About End -->

      <!-- Modal -->
      <div class="modal fade" id="modalPesan" tabindex="-1" aria-labelledby="modalPesanLabel" aria-hidden="true">
        <div class="modal-dialog">
        <form id="formPesan">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalPesanLabel">Pesan Kamar</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                  <input type="hidden" name="id_kamar" id="id_kamar">
                  <div class="mb-3">
                    <label for="harga" class="form-label">Harga Perhari</label>
                    <input class="form-control" id="harga" name="harga" type="text" value="Rp. 250.000" readonly>
                  </div>
                  <div class="mb-3">
                    <label for="checkin" class="form-label">Check In</label>
                    <input type="date" class="form-control" id="checkin" placeholder="Check In" required>
                  </div>
                  <div class="mb-3">
                    <label for="checkout" class="form-label">Check Out</label>
                    <input type="date" class="form-control" id="checkout" placeholder="Check Out" required>
                  </div>
                  <label for="metode_pembayaran" class="form-label">Metode Pembayaran</label>
                  <select class="form-select" id="metode_pembayaran" name="metode_pembayaran" required>
                    <option value="pilih_metode_pembayaran">Pilih Metode Pembayaran</option>
                    <option value="tunai">Tunai</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="pembayaran" class="form-label">Pembayaran</label>
                  <input type="text" class="form-control" id="pembayaran" name="pembayaran" placeholder="0" readonly>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary pesanAction">Pesan</button>
            </div>
          </div>
          </form>
        </div>
      </div>

      <!-- Modal Cek User Login -->
      <div class="modal fade" id="modalLogin" tabindex="-1" aria-labelledby="modalLoginLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalLoginLabel">Peringatan</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <p class="text-secondary">Apakah kamu sudah login?Jika anda login , akan mendapatkan kartu member!</p>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <a href="login.php" class="btn btn-info btn-block">Login</a>
              <button type="button" class="btn btn-primary ViewPesanan">Pesan Kamar</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Footer Start -->
      <div
        class="container-fluid bg-dark text-light footer wow fadeIn"
        data-wow-delay="0.1s">
        <div class="container">
          <div class="copyright">
            <div class="row">
              <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                Copyright &copy; Dwi Ayu Ciptaning 2024
              </div>
              <div class="col-md-6 text-center text-md-end">
                <div class="footer-menu">
                  <a href="index.php">Beranda</a>
                  <a href="semua_kamar.php">Kamar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer End -->

      <!-- Back to Top -->
      <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"
        ><i class="bi bi-arrow-up"></i
      ></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/landing/lib/wow/wow.min.js"></script>
    <script src="assets/landing/lib/easing/easing.min.js"></script>
    <script src="assets/landing/lib/waypoints/waypoints.min.js"></script>
    <script src="assets/landing/lib/counterup/counterup.min.js"></script>
    <script src="assets/landing/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="assets/landing/lib/tempusdominus/js/moment.min.js"></script>
    <script src="assets/landing/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="assets/landing/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="assets/landing/js/main.js"></script>
    <script>
      $(document).ready(function(){	
        $('.viewCheckUser').click(function(){
          $('#modalLogin').modal('show');
          $('#id_kamar').val($(this).data('id'));
        });
        $('.ViewPesanan').click(function(){
          $('#modalLogin').modal('hide');
          $('#modalPesan').modal('show');
        });
        //modal close
        $('#modalPesan').on('hidden.bs.modal', function () {
          $('#id_kamar').val('');
          $('#metode_pembayaran').val('pilih_metode_pembayaran');
          $('#pembayaran').val('');
          $('#checkin').val('');
          $('#checkout').val('');
        });        
        $('#checkin').change(function(){
          if($('#checkout').val() !== ''){
            // hitung jumlah hari anatara checkin checkout
            let checkin = new Date($('#checkin').val());
            let checkout = new Date($('#checkout').val());
            let dateCheckin = checkout.getDate()+'-'+checkout.getMonth()+1+'-'+checkout.getFullYear();
            let dateCheckout = checkin.getDate()+'-'+checkin.getMonth()+1+'-'+checkin.getFullYear();
            if(checkout < checkin){
              alert('Hari Checkout Tidak Boleh Lebih Besar Dari Hari Checkin');
              $('#checkin').val('');
              $('#checkout').val('');
              return false;
            }
            if(checkout.getTime() === checkin.getTime()){
                alert('Hari Checkin Tidak Boleh Sama Dengan Hari Checkout');
                $('#checkin').val('');
                $('#checkout').val('');
                return false;
            }
            let hari = Math.ceil((checkout-checkin)/(1000*60*60*24));
            let pembayaran = hari*250000;
            $('#pembayaran').val(`Rp. ${pembayaran}`);
          }
        });
        $('#checkout').change(function(){
          if($('#checkin').val() !== ''){
            // hitung jumlah hari anatara checkin checkout
            let checkin = new Date($('#checkin').val());
            let checkout = new Date($('#checkout').val());
            if(checkout < checkin){
              alert('Hari Checkout Tidak Boleh Lebih Besar Dari Hari Checkin');
              $('#checkin').val('');
              $('#checkout').val('');
              return false;
            }
            if(checkout.getTime() === checkin.getTime()){
                alert('Hari Checkin Tidak Boleh Sama Dengan Hari Checkout');
                $('#checkin').val('');
                $('#checkout').val('');
                return false;
            }
            let hari = Math.ceil((checkout-checkin)/(1000*60*60*24));
            let pembayaran = hari*250000;
            $('#pembayaran').val(`Rp. ${pembayaran}`);
          }
        });
        $('.pesanAction').click(function(){
          let room_id = $('#id_kamar').val();
          let metode_pembayaran = $('#metode_pembayaran').val();
          let pembayaran = $('#pembayaran').val();
          let check_in = $('#checkin').val();
          let check_out = $('#checkout').val();
          if(metode_pembayaran == 'pilih_metode_pembayaran'){
            alert('Pilih Metode Pembayaran Terlebih Dahulu');
            return false;
          }
          $.ajax({
            type: 'post',
            url: './functions/bookingActionPengguna.php',
            data: {
              'room_id': room_id,
              'metode_pembayaran': metode_pembayaran,
              'pembayaran': pembayaran,
              'check_in': check_in,
              'check_out': check_out,
              'pesanKamar':'pesanKamar'
            },
            success: function(response){
              $('#modalPesan').modal('hide');
              alert(response);
              location.reload();
              return false;
            }
          });
        })
      });
    </script>
  </body>
</html>
