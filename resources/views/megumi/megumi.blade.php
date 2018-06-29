@extends('layouts.app')

@section('content')
<?php 
$uranai[1]  = "みずがめ座：フナミ"; 
$uranai[2]  = "うお座：みなみ"; 
$uranai[3]  = "おひつじ座：めぐちゃん"; 
$uranai[4]  = "おうし座"; 
$uranai[5]  = "ふたご座：ざきお"; 
$uranai[6]  = "かに座"; 
$uranai[7]  = "しし座"; 
$uranai[8]  = "おとめ座"; 
$uranai[9]  = "てんびん座：じっちゃん"; 
$uranai[10] = "さそり座";
$uranai[11] = "いて座";
$uranai[12] = "やぎ座：ゆのき";

$figs = range(1, 12);
$nums = range(1, 12); 
shuffle($nums);


?>

@foreach (array_map(null, $nums, $figs) as [$num, $fig])
    <h1>
     {{$fig}} 位 {{$uranai[$num]}}
    </h1>
@endforeach


@endsection