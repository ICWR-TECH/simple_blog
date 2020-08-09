<div class="container">
  <nav aria-label="breadcrumb" class="mt-4">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url("admin"); ?>">Home</a></li>
      <li class="breadcrumb-item"><a href="<?php echo base_url("admin/".$var->id) ?>"><?php echo $var->judul ?></a></li>
      <li class="breadcrumb-item active" aria-current="page"><?php echo $var->judul ?></li>
    </ol>
  </nav>
  <h2 class="text-center mt-5"><?php echo $var->judul ?></h2>
  <br>
  <center>
    <img src="<?php echo base_url("asset/gambar/".$var->gambar) ?>" alt="<?php echo $var->gambar ?>" class="img-thumbnail">
  </center>
  <hr style="width:100%;border-top:3px solid #999;">
  <br>
  <p class="mt-3">
    <?php echo $var->isi; ?>
  </p>
  <p class="mt-5">
    <strong>Tanggal: </strong> <?php echo $var->tanggal ?>
    <br>
    <strong>Konten: </strong><?php echo $var->konten ?>
    <br>
    <strong>Author: </strong><?php echo $var->author ?>
  </p>
</div>
<br><br><br><br>
