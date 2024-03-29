<x-layout>
@include('partials._hero')
@include('partials._search')

<div
                class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4"
            >

            
    @foreach($listings as $listing)
   
   <x-listing-card :listing="$listing"/>
    
   <!--basic html
    <h2> 
    <a href="/listing/{{$listing['id']}}">
    Blade listing:{{$listing['title']}} 
</a>
</h2>
   <p>Blade Description:{{$listing['description']}}</p>
-->
        @endforeach
</div>

<div class="mt-6 p-4">
    {{$listings->links()}}
  </div>



<!--
testing php
@php
$test = 1
@endphp




@if($test===1)
<h3>testing inline php:{{$test}}<h3>
@endif
@if($test===2)
<h3>Number two!!!<h3>
@endif

-->
</x-layout>