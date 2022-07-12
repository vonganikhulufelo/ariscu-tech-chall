
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comments</title>
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

<nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?= base_url('/') ?>">Home</a>
  </div>
</nav>

<?php
        use CodeIgniter\I18n\Time;
?>



<section class="pb-4">
  <div class="bg-white border rounded-5">
    
    <section class="p-4 d-flex justify-content-center w-100" style="background-color: #fbfbfb; border-radius: .5rem .5rem 0 0;">
      <!--Section: Newsfeed-->
      <section>
        <div class="card" style="max-width: 42rem">
          <div class="card-body">
            <!-- Data -->
            <div class="d-flex mb-3">
              <a href="">
                <img src="https://mdbcdn.b-cdn.net/img/new/avatars/18.webp" class="border rounded-circle me-2" alt="Avatar" style="height: 40px">
              </a>
              <div>
                <a  class="text-dark mb-0">
                  <strong><?= $story['by'] ?></strong>
                </a>
                <a href="<?= $story['url'] ?>" class="text-muted d-block" style="margin-top: -6px">
                  <small><?= Time::parse($story['time'])->humanize()?></small>
                </a>
              </div>
            </div>
            <!-- Description -->
            <div>
              <p>
              <a href="<?= $story['url'] ?>" target="_blank" class="text-muted d-block" style="margin-top: -6px">
                  <small></small><?= $story['title']?>
                </a>
              
              </p>
            </div>
          </div>
          <!-- Media -->
          <div class="bg-image hover-overlay ripple rounded-0" data-mdb-ripple-color="light">
            <img src="https://th.bing.com/th/id/OIP.MBXtBadT_ictFTVTqiksxgHaCy?pid=ImgDet&rs=1" class="w-100">
            <a href="#!">
              <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
            </a>
          </div>
          <!-- Media -->
          <!-- Interactions -->
          <div class="card-body">
            <!-- Reactions -->
            <div class="d-flex justify-content-between mb-3">
              <div>
                <a href="">
                  <i class="fas fa-thumbs-up text-primary"></i>
                  <i class="fas fa-heart text-danger"></i>
                  <span></span>
                </a>
              </div>
              <div>
                <a href="" class="text-muted"> <?= count($comments) ?> comments </a>
              </div>
            </div>
            <!-- Reactions -->

            <!-- Single answer -->
            <?php
            foreach ($comments as $key => $comment) : ?>
            <div class="d-flex mb-3">
              <a href="">
                <img src="https://th.bing.com/th/id/OIP.Mydkhl0AW3QEPAB9FkR46AHaHa?pid=ImgDet&rs=1" class="border rounded-circle me-2" alt="Avatar" style="height: 40px">
              </a>
              <div>
                <div class="bg-light rounded-3 px-3 py-1">
                  <a href="" class="text-dark mb-0">
                    <strong><?= $comment['by'] ?></strong>
                  </a>
                  <a href="" class="text-muted d-block">
                    <small><?= $comment['text'] ?></small>
                  </a>
                </div>
                <a  class="text-muted small ms-3 me-2"><strong>Like</strong></a>
                <a class="text-muted small me-2"><strong>Reply</strong></a>
              </div>
            </div>
            <?php endforeach; ?>
            

            <!-- Comments -->
          </div>
          <!-- Interactions -->
        </div>
      </section>
      <!--Section: Newsfeed-->
    </section>
    
  </div>
</section>

</body>
</html>