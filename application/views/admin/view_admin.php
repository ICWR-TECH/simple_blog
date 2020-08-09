    <div class="container">
      <h3 class="mt-3">User</h3>

      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah_user">
        Tambah user
      </button>

      <?php
      if ($this->session->flashdata("sukses_hapus_user")) {
        echo "<br><br><div class='alert alert-warning'>".$this->session->flashdata("sukses_hapus_user")."</div></br>";
      }
      if($this->session->flashdata("sukses_tambah_user")){
        echo "<br><br><div class='alert alert-success'>".$this->session->flashdata("sukses_tambah_user")."</div><br>";
      }
       ?>
      <table class="table table-bordered mt-3">
        <thead>
          <tr>
            <th width="30px">No</th>
            <th>Username</th>
            <th width="70px">Setting</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no=1;
          foreach ($user as $var) {
          ?>
          <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo strip_tags($var->username) ?></td>
            <td><a href="<?php echo base_url("admin/admin/delete_user/".$var->id) ?>" class="btn btn-danger"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/><path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/></svg></a></td>
          </tr>
          <?php
          }
           ?>
        </tbody>
      </table>
    </div>
    <div class="modal fade" id="tambah_user" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="exampleModalLabel">Tambah user</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form class="form-group" method="post" action="<?php echo base_url("admin/user") ?>">
              <input type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>">
              <label for="username">Username</label>
              <input type="text" name="username" value="" placeholder="username..." id="username" class="form-control">
              <label for="password">Password</label>
              <input type="password" name="password" value="" placeholder="password..." id="password" class="form-control">
              <br>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <input type="submit" name="submit" value="Tambah" class="btn btn-primary">
            </form>
          </div>
        </div>
      </div>
    </div>
<br><br><br>
