<!-- To overide a components attributes us ! on the class in the html -->
<div {{ $attributes->merge(['class' => 'bg-gray-50 border border-gray-200 rounded p-6']) }}>

{{$slot}}
</div>