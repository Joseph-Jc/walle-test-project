<?php
	$appSercet = 'oy5xhieq2ysx4xn3jmpf9wwjvbels31z';    //商户对应的appSercet（由麦乐积分商城提供）
    $appKey = 'aslqkhmrnc0uvqlgixssstj9';       //商户对应的appKey（由麦乐积分商城提供）
    $uid = $_GET['uid'];          //商户登录用户标识
    $timeStamp = time();//当前时间戳
    $credits = $_GET['credits'];    //商户登录用户当前积分
    $channel = '123456';      //商户提供的渠道标识符（仅针对游戏类应用）
    $string = '';       //预定义构造请求url

    $params = array(
        'uid'=> $uid,
        'appKey' => $appKey,
        'timeStamp' => $timeStamp,
        'credits' => $credits,
        'channel' => $channel
    );

    ksort($params);

    $string = join("", $params);

    $params['sign'] = md5($string . $appSercet);

    $query = http_build_query($params);

    echo "<a href='http://h5.mailejifen.com/login/auto?$query'>登录</a>";
?>