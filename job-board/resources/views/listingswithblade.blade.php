<h1>Listings</h1>
<h2> Blade header:
    {{$heading}}
</h2>
<p> 
    @foreach($listings as $listing)
   <h2> 
    <a href="/listing/{{$listing['id']}}">
    Blade listing:{{$listing['title']}} 
</a>
</h2>
   <p>Blade Description:{{$listing['description']}}</p>
        @endforeach
</p>

@php
$test = 1
@endphp

@if($test===1)
<h3>testing inline php:{{$test}}<h3>
@endif
@if($test===2)
<h3>Number two!!!<h3>
@endif