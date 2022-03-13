<title>home</title>
<link rel="stylesheet" href="{{asset('')}}">
</link>
<style>
    .hov:hover{
        background-color:#672286;
    }
</style>
<body>
@extends('nav')
@section('content')

@if(Session::get('show_notification') and Session::get('not_name')==Session::get('user_name'))
<div  style="width:100%;margin-left:25%;margin-right:25%;height: 180px;margin-top:10px;z-index:2;">
    <div id="arrow"
        style="float:left;font-size:80px;margin-top:10px; <?php if (App::isLocale('ar')) echo "display:none;";?>">
        <i class="fas fa-long-arrow-alt-left"></i>
    </div>
    <div id="arrow2"
        style="float:left;font-size:80px;margin-top:10px; <?php if (App::isLocale('ar')) echo "display:flex;float:right"; else echo "display:none;";?>">
        <i class="fas fa-long-arrow-alt-right"></i>
    </div>
    <div id="no" dir="{{(App::isLocale('ar') ? 'ltr' : 'ltr')}}"
        style="display:flex;width:700px;height:180px;z-index:1;opacity:0.8;font-size:16px;color:#fff;border:2px solid #fff;outline:2px solid #6D6970;box-shadow:0px 20px 20px 4px #6d6970;border-radius:25px;<?php if (App::isLocale('ar')) echo "margin-right:100px;";?> ">
        <div class="bg-light text-dark  "
            style="font-weight:bold;float:left;padding:10px;width:80%;border-top-left-radius:25px;border-bottom-left-radius:25px;">
            <p class="text-center" id="demo"></p>
            <button class="rounded-circle p-2 hov" onClick="prev()" id="prev"
                style="width:20%;font-size:22;color:#fff;background-color:#674686;border:2px solid #fff;margin-left:30%;margin-right:20px;">{{__('messages.Previous')}}</button>
            <button class="rounded-circle p-2 hov" onClick="next()" id="next"
                style="color:#fff;background-color:#674686;border:2px solid #fff;width:20%;font-size:22;">{{__('messages.Next')}}</button>
        </div>
        <div style="float:right;width:10%;">
            <img src="{{asset('/images/char.jpg')}}"
                style="width: 135px;height:100%;border-top-right-radius:25px;border-bottom-right-radius:25px;"
                alt="character image">
        </div>

    </div>

</div>

@endif

<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
	theme: "light2",
	animationEnabled: true,
	title: {
		text: "{{__('messages.Pie Chart')}}" 
	},
	data: [{
		type: "pie",
		indexLabel: "{symbol} - {y}",
		yValueFormatString: "#,##0.0\"$\"",
		showInLegend: true,
		legendText: "{label} : {y}",
		dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();

var chart1 = new CanvasJS.Chart("chartContainer2", {
	theme: "light2",
	animationEnabled: true,
	title: {
		text: "{{__('messages.Savings')}}" 
	},
	subtitles: [{
		text: "<?php if($dataPoints4)if(!$dataPoints4[0]['y']) echo __('messages.No savings'); else echo  $dataPoints4[0]['y']; ?>"
	}],
	data: [{
		type: "doughnut",
		yValueFormatString: "#,##0.00\"$\"",
		indexLabel: "{label} ({y})",
		dataPoints: <?php echo json_encode($dataPoints4, JSON_NUMERIC_CHECK); ?>
	}]
});
chart1.render();


var chart2 = new CanvasJS.Chart("chartContainer3", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "{{__('messages.Expenses')}}"
	},
	axisY: {
		title: ""
	},
	data: [{
		type: "column",
		yValueFormatString: "#,##0.## tonnes",
		dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
	}]
});
chart2.render();


var chart4 = new CanvasJS.Chart("chartContainer4", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "{{__('messages.Budget')}}"
	},
	axisY:{
		includeZero: true
	},
	legend:{
		cursor: "pointer",
		verticalAlign: "center",
		horizontalAlign: "right",
		itemclick: toggleDataSeries
	},
	data: [{
		type: "column",
		name: "amount",
		indexLabel: "",
		yValueFormatString: "",
		showInLegend: true,
		dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
	},{
		type: "column",
		name: "Savings",
		indexLabel: "",
		yValueFormatString: "",
		showInLegend: true,
		dataPoints: <?php echo json_encode($dataPoints3, JSON_NUMERIC_CHECK); ?>
	}]
});
chart4.render();
function toggleDataSeries(e){
	if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	}
	else{
		e.dataSeries.visible = true;
	}
	chart4.render();
}
}
</script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
@if($dataPoints1)
<div class="mt-4" style="margin-left:25%;margin-right:25%;width:100%;z-index:1;">
<div style="width:80%;height: 500px;margin:50px auto;border:2px groove gray;outline:1px groove #123; ">
        <div style="float:left;width:50%;height:202.5px;margin:30px auto;" id="chartContainer">  
        </div>
        <div style="float:right;width:50%;height:202.5px;margin:30px auto;" id="chartContainer2">
        </div>
        <div style="float:left;width:50%;height:202.5px;margin:30px auto;" id="chartContainer3">
        </div>
		<div style="float:right;width:50%;height:202.5px;margin:30px auto;" id="chartContainer4">
        </div>
	    </div></div>
		
	<div class="bg-dark w-50" style="margin-top:50px;margin-left:35%;margin-right:35%;clear:both" dir="{{(App::isLocale('ar') ? 'rtl' : 'ltr')}}">
<img src="{{asset('/images/ehsan.png')}}" style="display:inline-block;float:left;"  alt="ehsan" >
<p  style="font-weight:bold;display:inline-block;float:right;margin-top:120px;">{{__('messages.WE are in a mission to help the helpless')}}<br>{{__("messages.Make someone's life by")}} <a href="https://ehsan.sa/" target="_blank"><font color="green">{{__('messages.Ehsan')}}</font></a> {{__('messages.of yours')}}
</p>
</div>
</div>

@endif
@endsection

</body>