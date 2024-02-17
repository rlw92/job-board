@extends('layout')

@section("content")

<h1>Listings</h1>
<h2>
    <?php echo $heading;?>
</h2>
<p> 
    <?php foreach($listings as $listing): ?>
   <h2> <?php echo $listing['title'] ?></h2>
   <p><?php echo $listing['description']?></p>
        <?php endforeach; ?>
</p>

@endsection