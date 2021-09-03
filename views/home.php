<div class="row">

 <div class="col-12">

  <h1>HOME</h1>

 </div>

 <?php foreach($posts as $post): ?>

 <div class="col-12 col-md-4">

  <div class="card">
  <img src="<?= "./images/" . $post->thumb ?>" class="card-img-top" alt="<?= $post->title ?>">

   <div class="card-body">
     <h5 class="card-title"><?= $post->title ?> - <?=$post->category?></h5>
     <p class="card-text"><?= $post->text ?></p>
     <p><small><?= $post->date ?></small></p>
     <a href="<?= $post->url ?>" class="btn btn-primary">Read more</a>
  </div>
 </div>

 </div>

 <?php endforeach ?>

</div>
