<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css" integrity="sha384-VCmXjywReHh4PwowAiWNagnWcLhlEJLA5buUprzK8rxFgeH0kww/aWY76TfkUoSX" crossorigin="anonymous">
    <title>Dashboard admin</title>
    <style>
      .nav-link:hover{
        font-weight: bold;
      }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand" href="<?php echo base_url("admin") ?>">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url("admin/tambah") ?>">Tambah blog</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url("admin/user"); ?>">View user</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url("admin/keluar"); ?>">Keluar</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
