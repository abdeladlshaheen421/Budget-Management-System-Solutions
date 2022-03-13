<title>history</title>
<link rel="shortcut icon" href="{{ asset('/images/icon.jpg') }}" type="image">

<style>
#search {
    border: 2px solid #999;
}

#search:focus {
    border: 2px solid blue;
    outline: 0;
}
div button{
    width:100%;
    height:100%;
    font-weight:bold;
    background-color:#3e3e3e;
    border:2px solid white;
    color:white;
    border-top-left-radius:15px;
    border-bottom-left-radius:80px;
    border-bottom-right-radius:15px;
    border-top-right-radius:80px;
}
div button:hover{
    background-color:#7f7f7f;
    /* cursor:not-allowed; */
    
}

</style>
<body style="background-color:#DCDCDE;">
  

@extends('nav')
@section('content')
<div style="width:100%;margin-right:200px;margin-left:200px;">
<div class="my-2 text-center">
    <form action="{{URL::to('history')}}">
        <input class="w-50 text-center rounded" style="letter-spacing:2px;" onfocus="this.placeholder = ''"
            onblur="this.placeholder = '{{__('messages.Search')}}'" type="search" placeholder="{{__('messages.Search')}}" name="search" id="search"><label
            for="search"><i class='fas fa-search mx-1 p-2 bg-primary text-white'
                style="font-size:16px;border-radius:8px;"></i></label>
    </form>
</div>
<?php $counter=0;?>
@foreach($dataPoints as $value)
    
<div style="width:30%;height:50px;margin:0 auto;margin-bottom:2px;">
        <button type="button"  data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        {{__('messages.PLAN')}} {{$planid[$counter]->plan_id}}  <i class="fas fa-share-alt" style="direction:rtl;margin-left:60px;"></i>
        </button>
        <!-- <button  value="{{$planid[$counter]->plan_id}}" id="but{{$planid[$counter]->plan_id}}" data-toggle="modal" data-target="#myModal" onclick="dis_social(<?php #echo $planid[$counter]->plan_id; ?>)">{{__('messages.PLAN')}} {{$planid[$counter]->plan_id}}  <i class="fas fa-share-alt" style="direction:rtl;margin-left:60px;"></i> </button> -->
    </div>
<div style="width:80%;height:400px;margin:0 auto;margin-bottom:20px;">

    <!-- width=400px height=70% -->
    <div style="width:70%;height: 410px;margin:0 auto;border:2px groove gray;outline:1px groove #123; " id="c{{$planid[$counter]->plan_id}}">
        <div style="float:left;width:50%;height:202.5px;border-right:1px solid #000;" id="col<?php echo $counter;?>">  
        </div>
        <div style="float:right;width:50%;height:202.5px;border-bottom:1px solid #000;" id="col2<?php echo $counter;?>">
        </div>
        <div style="float:left;width:50%;height:202.5px;border-top:1px solid #000;" id="col3<?php echo $counter;?>">
        </div>
        <div style="float:right;width:50%;height:202.5px;border-left:1px solid #000;" id="col4<?php echo $counter;?>">
        </div>
    </div></div>
    
    
    <?php $counter++;?>
@endforeach
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Share Page</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <ul style="list-style-type:none;margin-left:50px;" >
            <?php $ent=0;
            $icon=["<i class='fab fa-facebook-square'></i>","<i class='fab fa-twitter-square'></i>","<i class='fab fa-linkedin'></i>","<i class='fab fa-whatsapp-square'></i>","<i class='fab fa-telegram'></i>"];?>
            
            @foreach($social as $k=>$v)
            <li style="display:inline-block;font-size:26px;width:60px;">
                <a class="btn btn-outline-primary" href="{{$v}}" target="_blank"  style="text-decoration:none;"><?php echo $icon[$ent];?></a>
            </li>
            <?php $ent++;?>
            @endforeach
        </ul>
      </div>
    </div>
  </div>
</div>
</div>
<script>
        // drawing charts
        //drawing column chart
        window.onload = function () {
            var conv=<?php echo count($dataPoints);?>;
            var data = <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>;
 for(var x=0;x<conv;x++)
 {
     var chart = new CanvasJS.Chart("col"+x, {
     animationEnabled: true,
     theme: "light2", 
     title: {
         text: ""
     },
     axisY: {
         title: "budget"
     },
     data: [{
         type: "column",
         dataPoints: data[x]
     }]
 });
 var chart1 = new CanvasJS.Chart("col2"+x, {
	animationEnabled: true,
	title: {
		text: ""
	},
	subtitles: [{
		text: ""
	}],
	data: [{
		type: "pie",
		yValueFormatString: "#,##0.0\"$\"",
		indexLabel: "{label} ({y})",
		dataPoints: data[x]
	}]
});
var chart2 = new CanvasJS.Chart("col3"+x, {
	theme: "light2",
	animationEnabled: true,
	title: {
		text: ""
	},
	data: [{
		type: "doughnut",
		indexLabel: "{label} - {y}",
		yValueFormatString: "#,##0.0\"$\"",
		showInLegend: true,
		legendText: "{label} : {y}",
		dataPoints: data[x]
	}]
});
var chart3 = new CanvasJS.Chart("col4"+x,
    {
      title:{
        text: ""    
      },
      axisY: {
        title: ""
      },
      legend: {
        verticalAlign: "bottom",
        horizontalAlign: "center"
      },
      data: [

      {        
        color: "#70F28C",
        type: "column",  
        showInLegend: true, 
        legendMarkerType: "none",
        legendText: "",
        dataPoints: data[x]
      }
      ]
    });
chart3.render();
 chart1.render();
 chart2.render();
 chart.render();
 
}
 }
 function dis_social(so){
     
     var ul =document.getElementById('ul'+so);
        ul.style.display="initial";      
    
    
 }
 
</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
<script src="{{ asset('js/share.js') }}"></script>

@endsection
</body>
