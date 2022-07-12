<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stories</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.3.0/mdb.min.js" ></script>
<!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
<!-- MDB -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.3.0/mdb.min.css" rel="stylesheet" />
</head>
<body>
<?php
use CodeIgniter\I18n\Time;

?>

<nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?= base_url('/') ?>">Home</a>
  </div>
</nav>

<section class="pb-4">
  <div class="bg-white border rounded-5">
    
      <section class="w-100 d-flex p-4 justify-content-center" style="background-color: #fbfbfb; border-radius: .5rem .5rem 0 0;">
        <div class="card d-flex" style="width: 48rem">
          <div class="card-body">
            <!--Table-->
            <table class="table-responsive">
            </table>
            <table class="table table-hover table-forum text-center">
              <!--Table head-->
              <thead>
                <tr>
                  <th></th>
                  <th class="text-left">Topic</th>
                  <th>Comments</th>
                </tr>
              </thead>
              <!--Table head-->
              <!--Table body-->
              <tbody>

              <?php foreach ($items as $key => $story) : ?>
                           
                <tr>
                  <td scope="row" class="text-nowrap">

                    <a type="button" class="btn btn-outline-dark-green btn-sm p-1 m-0 waves-effect">
                      <span class="value">0</span>
                      <i class="fas fa-thumbs-up ml-1"></i>
                    </a>
                    <a type="button" class="btn btn-outline-danger btn-sm p-1 m-0 waves-effect">
                      <span class="value">0</span>
                      <i class="fas fa-thumbs-down ml-1"></i>
                    </a>
                  </td>
                  <td class="text-start">
                    <a href="<?= $story['url'] ?>" target="_blank" class="font-weight-bold blue-text">
                    <?= $story['title'] ?></a>
                    <div class="my-2">
                      <a  class="blue-text">
                        <strong> </strong>
                      </a>
                      <span class="badge bg-secondary mx-1">descendants: <?= $story['descendants'] ?></span><span class="badge bg-primary mx-1">Score: <?= $story['score'] ?></span>
                      <span><?= Time::parse($story['time'])->humanize() ?></span>
                    </div>
                    <div></div>
                  </td>
                  <td>
                    <a href="<?= base_url('items/'.$story['id']) ?>" class="text-dark">
                      <span></span>
                      <i class="fas fa-comments ml-1"></i>
                    </a>
                  </td>
                </tr>
              <?php endforeach; ?>
              </tbody>
              <!--Table body-->
            </table>

            <!-- Table -->

            <!--Bottom Table UI-->
            <div class="d-flex justify-content-center">
              <!--Pagination -->
              <nav class="my-2 pt-2">
                  <?= $pager->links() ?>
               
              </nav>
              <!--/Pagination -->
            </div>
            <!--Bottom Table UI-->
          </div>
        </div>
      </section>
  </div>
</section>

</body>
</html>