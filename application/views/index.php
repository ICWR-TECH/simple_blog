<div class="container mt-4">
  <div class="card">
    <div class="card-body">
      <h3 class="card-title mt-2 text-center">Simple Blog - ICWR</h3>
    </div>
  </div>
  <br>
  <br>
  <?php
  foreach ($data->result() as $var) {
  ?>
  <div class="card mb-3">
    <a href="<?php echo base_url($var->slug); ?>.html">
      <img src="<?php echo base_url("asset/gambar/".$var->gambar) ?>" class="card-img-top" height="500px" alt="<?php echo $var->gambar ?>">
    </a>
    <div class="card-body">
      <a href="<?php echo base_url($var->slug) ?>.html" style="color:black">
        <h5 class="card-title"><?php echo $var->judul ?></h5>
      </a>
      <p class="card-text">
        <?php
        echo strip_tags(substr($var->isi,0,200))." <a href='".base_url($var->slug).".html'>Baca selengkapnya...</a>";
         ?>
      </p>
      <p class="card-text"><small class="text-muted">Last updated <?php echo $var->tanggal ?></small></p>
    </div>
  </div>
  <?php
  }
  ?>
  <br><br>
  <?php echo $pagination ?>
  <br><br><br>
</div>
