<div class="bg-bed">
  
<div class="container">
  
  <div class="col-lg-12" style="margin-top: 15px;">
        <img  class="img-fluid" src="<?= base_url();?>assets/img/logorsbam.PNG" height="100" width="110" style="float: left; margin-right: 0px;">
        <h2 style="text-align: center;font-weight: bold; margin-right: 7px; color: #004085;">INFORMASI KETERSEDIAAN TEMPAT TIDUR</h2> </img>
        <h4 style="text-align: center;font-weight: bold; color: #004085;">RS Bukit Asam Medika</h4>
        
  </div>

  
  <div class="alert alert-primary d-flex align-items-center" role="alert" style="border-color: ">
      <div>
       <i class="fas fa-exclamation-circle"></i> &nbsp;Sumber data yang digunakan merupakan Data RS Bukit Asam Medika yang diperoleh dari fasilitas kesehatan dan dilakukan secara harian<p>
       <i class="fas fa-exclamation-circle"></i> &nbsp;Update Terakhir : <b><?php foreach ($updated_bed as $ub) : ?>
            <?= $ub['updated']; ?>
            <?php endforeach; ?></b></p>
      </div>
</div>
 

  <p></p>
  <div class="row">
     <?php foreach($tampil_bed as $tb) : ?>
      <div class="column">
        <div class="cards">
          <div class="card-body" style="text-align: center;">
          <h2 style="font-weight: bold; color:   #004085;"><?= $tb['tersedia']; ?></h2>
          <span style="color:#004085;"><?= $tb['namaruang'];?></span>
          <span style="color:#004085;"><?= $tb['kelas'];?></span>
          </div>
        </div>
      </div>
       <?php endforeach; ?>
       <p></p>
  </div>

  


</div>
</div>





  <!-- <div class="container"> 
    <div class="row">
      <div class="col-md-1"></div>

      <div class="col-md-10">
        <div class="card blue-box">
          <p>
            <b>Perhatian</b>
          </p>
          <ol>
            <li>
              Dashboard Manajemen Tempat Tidur RS Bukit Asam Medika bertujuan untuk menampilkan informasi ketersediaan tempat tidur untuk pasien RS Bukit Asam Medika.
            </li>
            <li>
              Informasi dalam dashboard bersifat dinamis dan dapat berubah setiap saat sesuai dengan kondisi ketersediaan yang ada di Rumah Sakit.
            </li>
            <li>
              Silakan mengkonfirmasi informasi pada dashboard dengan pihak Rumah Sakit terkait.
            </li>
          </ol>
        </div>
      </div>

      <div class="col-md-1"></div>
    </div>
  </div>


 