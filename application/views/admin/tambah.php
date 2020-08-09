<script src="https://cdn.ckeditor.com/4.14.1/full/ckeditor.js"></script>
  <div class="container">
    <h1 class="mt-4">Tambah blog</h1>

    <?php echo form_open(base_url("admin/tambah"),"class='mt-3' enctype='multipart/form-data'") ?>

      <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
      <label for="judul"> <strong>Judul</strong> </label>
      <input type="text" name="judul" placeholder="Judul...." value="<?php echo set_value('judul') ?>" class="form-control <?php echo form_error('judul') ? 'is-invalid':'' ?>" id="judul">
      <?php if(form_error("judul")){ ?>
        <div class="invalid-feedback">
          <?php echo form_error("judul") ?>
        </div>
      <?php } ?>
      <br>
      <label for="isi"> <strong>Isi</strong> </label>
      <textarea name="isi" rows="8" cols="80" class="ckeditor"><?php echo set_value("isi") ?></textarea>
      <br><br>
      <label for=""> <strong>Gambar</strong> </label>
      <input type="file" name="gambar" value="" class="">
      <br><br>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="author"> <strong>Author</strong> </label>
          <input type="text" name="author" id="konten" value="<?php echo set_value("author") ?>" placeholder="Author..." class="form-control <?php echo form_error('author') ? 'is-invalid':'' ?>">
          <?php if(form_error("author")){ ?>
            <div class="invalid-feedback">
              <?php echo form_error("author") ?>
            </div>
          <?php } ?>
        </div>
        <div class="form-group col-md-6">
          <label for="konten"> <strong>Konten</strong> </label>
          <input type="text" name="konten" id="konten" value="<?php echo set_value("konten") ?>" placeholder="Konten..." class="form-control <?php echo form_error('konten') ? 'is-invalid':'' ?>">
          <?php if(form_error("konten")){ ?>
            <div class="invalid-feedback">
              <?php echo form_error("konten") ?>
            </div>
          <?php } ?>
        </div>
      </div><br>
      <input type="submit" name="submit" value="Perbarui" class="btn btn-primary">
    <?php echo form_close(); ?>
    <br>
  </div>
<br><br>
