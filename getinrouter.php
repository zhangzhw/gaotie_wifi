<?php
// TPLINK WR882N 管理脚本
function getContent($url)
{
	// 解悉url
	$temp = parse_url($url);
	$query = isset($temp['query']) ? $temp['query'] : '';
	$path = isset($temp['path']) ? $temp['path'] : '/';
	$header = array (
			"POST {$path}?{$query} HTTP/1.1",
			"Host: {$temp['host']}",
			"Content-Type: text/xml; charset=utf-8",
			'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8',
			'Cookie: Authorization=Basic ' . base64_encode("admin:rfid5313"),  // 注意这里的cookie认证字符串
			"Referer: http://{$temp['host']}/",
			'User-Agent: Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; SV1)',
			"Content-length: 380",
			"Connection: Close"
					);
	$curl = curl_init(); // 启动一个CURL会话
	curl_setopt($curl, CURLOPT_URL, $url); // 要访问的地址
	curl_setopt($curl, CURLOPT_HTTPHEADER, $header); //设置头信息的地方
	curl_setopt($curl, CURLOPT_TIMEOUT, 60); // 设置超时限制防止死循环
	curl_setopt($curl, CURLOPT_HEADER, 0); // 显示返回的Header区域内容
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); // 获取的信息以文件流的形式返回
	$content = curl_exec($curl); // 执行操作
	curl_close($curl);
	return $content;
}
function getIp(){
	$content = getContent("http://192.168.0.1/userRpm/StatusRpm.htm");
	echo $content;
// 	preg_match('/wanPara=new Array\((.+?)<\/script>/s',$content,$all);
// 	$ip = "0";
// 	if(!empty($all[1])){
// 		$data = trim($all[1]);
// 		$data = str_replace("\r\n","",$data);
// 		$data = explode(",",$data);
// 		$ip = str_replace('"','',$data[2]);
// 		$ip = trim($ip);
// 	}
// 	return $ip;
}
// function reboot(){
// 	$url = "http://192.168.1.1/userRpm/SysRebootRpm.htm?Reboot=%D6%D8%C6%F4%C2%B7%D3%C9%C6%F7";
// 	getContent($url);
// }
$info = getIp();
echo $info;
?>