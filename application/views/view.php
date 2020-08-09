<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Blog | <?php echo $var->judul ?></title>
    <meta property="og:type" content="article" />
    <meta property="og:title" content="<?php echo $var->judul ?>" />
    <meta property="og:description" content="<?php echo strip_tags($var->isi) ?>" />
    <meta property="og:image" content="<?php echo base_url("asset/gambar/".$var->gambar) ?>" />
  </head>
  <body>
    <div class="container">
      <div class="card mt-5">
        <div class="card-body">

          <!-- <h3 class="card-title mt-2 text-center">Simple Blog - ICWR</h3> -->
        <br>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home</a></li>
              <li class="breadcrumb-item"><a href="#"><?php echo $var->konten ?></a></li>
              <li class="breadcrumb-item active" aria-current="page"><?php echo $var->judul ?></li>
            </ol>
          </nav>
          <br>
          <center>
            <h2 class="text-center"><?php echo $var->judul ?></h2>
            <br>
            <img src="<?php echo base_url("asset/gambar/".$var->gambar) ?>" alt="<?php echo $var->gambar ?>" class="img-thumbnail" width="500px">
          </center>
          <br>
            <?php echo $var->isi; ?>
          <hr style="width:100%">
          Tanggal publish: <strong><?php echo $var->tanggal ?></strong>
          <br>
          Author: <strong><?php echo $var->author ?></strong>
          <br>
          Konten: <strong><?php echo $var->konten ?></strong>
        </div>
      </div>
    </div>
    <br><br><br>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>
