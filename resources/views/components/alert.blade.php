<!--div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert"-->
{{-- <div class="bg-{{$color}}-100 border-l-4 border-{{$color}}-500 text-{{$color}}-700 p-4" role="alert"> --}}
<?php $class_str="bg-$color-100 border-l-4 border-$color-500 text-$color-700 p-4"; ?>
<div {{$attributes->merge(['class'=>$class_str])}} role="alert">
    <p class="font-bold">{{$title}}</p>
    <p>{{$slot}}</p>
</div>
