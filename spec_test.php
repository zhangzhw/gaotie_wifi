<html>
<head>

<style>
#box .hid{display:none;}
#box .show{display:block;}
</style>

</head>
<body>
<ul id="box">
<li>1</li>
<li>2</li>
<li>3</li>
<li>4</li>
<li>5</li>
<li>6</li>
<li>7</li>
<li>8</li>
<li>9</li>
<li>10</li>
<li>11</li>
<li>12</li>
<li>13</li>
</ul>
<p id="tog">展开</p>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.4.4.min.js"></script>
<script>
var len=$("#box li").length;
function int(){
for(i=8;i<len;i++){
$("#box li").eq(i).addClass("hid");   
}
}
$("#tog").click(function(){
var t=$(this).text();
if(t=="展开"){
$("#box .hid").addClass("show");
$(this).text("收缩");
}else{
$("#box .hid").removeClass("show");
$(this).text("展开");
}  
});
int();//初始化隐藏多余标签
</script>



</html>