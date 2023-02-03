<?php
date_default_timezone_set("Asia/Shanghai");
$openid=$_GET["openid"];
$did=$_GET["did"];
$sid=$_GET["sid"];
$ysshint=$did.time().'800';

function daka($did,$sid,$ysshint)
{
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://zwms.gdbs.gov.cn/ebus/minshengwxmp/api/r/eduhealthreport/DataReport",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS =>"{\"org_code\":\"Z8295WPDM\",\"location\":[{\"name\":\"广东省\"},{\"name\":\"茂名市\"}],\"checkbox\":[\"0\"],\"china_travel\":0,\"city_travel\":0,\"nation_travel\":0,\"return_school\":0,\"fever\":0,\"health_status\":3,\"practice\":0,\"trainlocation\":[{\"name\":\"\"},{\"name\":\"\"}],\"practice_company\":\"\",\"observe_status\":null,\"health_desc\":\"\",\"city\":\"茂名市\",\"province\":\"广东省\",\"practice_city\":\"\",\"practice_province\":\"\",\"trainlocationStr\":\"\",\"locationStr\":\"广东省茂名市\",\"nationality\":\"中国\",\"stay_school\":0,\"overseas_travel\":0,\"return_school_125\":0,\"hj_province\":\"内地非湖北省\",\"staff_identity\":null,\"residence\":0,\"return_school_status\":0,\"now_stay_school\":0,\"overseas_travel_place\":\"\",\"enter_china_time\":\"\",\"nation\":\"中国\",\"identity\":1,\"travel_hb\":0,\"travel_wz\":0,\"touch_hb_person\":0,\"touch_wz_person\":0,\"agency\":0,\"adjust_status\":0,\"type\":1,\"report_date\":\"".date("Y-m-d")."\"}\n",
  CURLOPT_HTTPHEADER => array(
    "x-tif-did:$did",
    "x-yss-page: operation_plus/pages/yiqing/education_reporter/toc/form/step1/index",
    "x-yss-city-code: 4401",
    "x-tif-sid: $sid",
    "Accept-Language: zh-cn",
    "x-ysshint:$ysshint",
    "dgd-pre-release: 0",
    "Content-Type: text/plain"
  ),
));
$response = curl_exec($curl);
curl_close($curl);
echo '<br>打卡状态:<br>';
if(json_decode($response, true)['errcode']==0)
echo '打卡成功';
else
echo json_decode($response, true)['errmsg'];
return json_decode($response, true)['hint'];
}
function write_log($openid,$did,$sid,$ysshint,$hint)
{
  $curl = curl_init();
  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://zwms.gdbs.gov.cn/ebus/minshengwxmp/api/r/frontlogrecv/LogReceive",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS =>"{\"data\":[{\"eid\":\"YSS_BISZ_REQUEST\",\"openid\":\"".$openid."\",\"platform\":\"ios\",\"report_type\":1,\"path\":\"\",\"rpath\":\"/ebus/minshengwxmp/api/r/eduhealthreport/DataReport\",\"errcode\":0,\"apn\":\"wifi\",\"systeminfo\":\"{\\\"language\\\":\\\"zh_CN\\\",\\\"wifiEnabled\\\":true,\\\"safeArea\\\":{\\\"bottom\\\":862,\\\"height\\\":818,\\\"top\\\":44,\\\"width\\\":414,\\\"left\\\":0,\\\"right\\\":414},\\\"bluetoothEnabled\\\":true,\\\"locationAuthorized\\\":true,\\\"deviceOrientation\\\":\\\"portrait\\\",\\\"notificationSoundAuthorized\\\":true,\\\"screenHeight\\\":896,\\\"windowHeight\\\":808,\\\"version\\\":\\\"7.0.12\\\",\\\"fontSizeSetting\\\":17,\\\"system\\\":\\\"iOS 13.4.5\\\",\\\"notificationAuthorized\\\":true,\\\"statusBarHeight\\\":44,\\\"pixelRatio\\\":2,\\\"windowWidth\\\":414,\\\"notificationBadgeAuthorized\\\":true,\\\"errMsg\\\":\\\"getSystemInfo:ok\\\",\\\"locationEnabled\\\":true,\\\"model\\\":\\\"iPhone XR<iPhone11,8>\\\",\\\"batteryLevel\\\":67,\\\"screenWidth\\\":414,\\\"screenTop\\\":88,\\\"microphoneAuthorized\\\":true,\\\"cameraAuthorized\\\":true,\\\"albumAuthorized\\\":true,\\\"notificationAlertAuthorized\\\":true,\\\"brand\\\":\\\"iPhone\\\",\\\"platform\\\":\\\"ios\\\",\\\"SDKVersion\\\":\\\"2.11.0\\\",\\\"devicePixelRatio\\\":2}\",\"wxsceneid\":1089,\"ptime\":\"".date("Ymd h:i:s")."\",\"region\":\"4401\",\"httpcode\":200,\"rdata\":\"{\\\"qs\\\":{},\\\"h\\\":{\\\"x-ysshint\\\":\\\"".$ysshint."\\\",\\\"dgd-pre-release\\\":0,\\\"x-yss-page\\\":\\\"operation_plus/pages/yiqing/education_reporter/toc/form/step1/index\\\",\\\"x-yss-city-code\\\":\\\"4401\\\"},\\\"b\\\":{\\\"org_code\\\":\\\"Z8295WPDM\\\",\\\"location\\\":[{\\\"name\\\":\\\"广东省\\\"},{\\\"name\\\":\\\"茂名市\\\"}],\\\"checkbox\\\":[\\\"0\\\"],\\\"china_travel\\\":0,\\\"city_travel\\\":0,\\\"nation_travel\\\":0,\\\"return_school\\\":0,\\\"fever\\\":0,\\\"health_status\\\":3,\\\"practice\\\":0,\\\"trainlocation\\\":[{\\\"name\\\":\\\"\\\"},{\\\"name\\\":\\\"\\\"}],\\\"practice_company\\\":\\\"\\\",\\\"observe_status\\\":null,\\\"health_desc\\\":\\\"\\\",\\\"city\\\":\\\"茂名市\\\",\\\"province\\\":\\\"广东省\\\",\\\"practice_city\\\":\\\"\\\",\\\"practice_province\\\":\\\"\\\",\\\"trainlocationStr\\\":\\\"\\\",\\\"locationStr\\\":\\\"广东省茂名市\\\",\\\"nationality\\\":\\\"中国\\\",\\\"stay_school\\\":0,\\\"overseas_travel\\\":0,\\\"return_school_125\\\":0,\\\"hj_province\\\":\\\"内地非湖北省\\\",\\\"staff_identity\\\":null,\\\"residence\\\":0,\\\"return_school_status\\\":0,\\\"now_stay_school\\\":0,\\\"overseas_travel_place\\\":\\\"\\\",\\\"enter_china_time\\\":\\\"\\\",\\\"nation\\\":\\\"中国\\\",\\\"identity\\\":1,\\\"travel_hb\\\":0,\\\"travel_wz\\\":0,\\\"touch_hb_person\\\":0,\\\"touch_wz_person\\\":0,\\\"agency\\\":0,\\\"adjust_status\\\":0,\\\"type\\\":1,\\\"report_date\\\":\\\"".date("Y-m-d")."\\\"},\\\"res\\\":{\\\"data\\\":{},\\\"errcode\\\":0,\\\"errmsg\\\":\\\"\\\",\\\"hint\\\":\\\"".$hint."\\\"}}\",\"exp1\":\"\",\"exp2\":\"\",\"exp3\":\"\",\"expath\":\"\",\"trigger_type\":\"cgi\",\"channel\":\"\",\"time\":358,\"desc\":\"\",\"activityid\":\"\"}]}",
    CURLOPT_HTTPHEADER => array(
      "Accept: */*",
      "x-tif-did: $did",
      "x-tif-sid: $sid",
      "Accept-Language: zh-cn",
      "Content-Type: application/json",
      "dgd-pre-release: 0",
      "Content-Type: text/plain"
    ),
  ));
  $response = curl_exec($curl);
  curl_close($curl);
  echo '<br><br>日志状态:<br>';
if(json_decode($response, true)['errcode']==0)
echo '写入日志成功';
else
echo json_decode($response, true)['errmsg'];
}
write_log($openid,$did,$sid,$ysshint,daka($did,$sid,$ysshint));