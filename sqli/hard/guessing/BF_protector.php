<?php
$max_attempts = 5; // 허용되는 최대 시도 횟수
$lockout_time = 120; // 차단 시간 (초)
$ip = $_SERVER['REMOTE_ADDR'];
$log_file = 'login_attempts.json'; // 시도 기록 저장 파일

// 시도 데이터 로드
$attempts_data = [];
if (file_exists($log_file)) {
    $attempts_data = json_decode(file_get_contents($log_file), true);
}

if (!isset($attempts_data[$ip])) {
    $attempts_data[$ip] = ['count' => 0, 'last_attempt' => 0];
}

$attempts = $attempts_data[$ip]['count'];
$last_attempt_time = $attempts_data[$ip]['last_attempt'];

if ($attempts >= $max_attempts && (time() - $last_attempt_time) < $lockout_time) {
	die("Too many requests. Try again later.");
	exit;
}else if($attempts >= $max_attempts && (time() - $last_attempt_time) > $lockout_time){
	$attempts_data[$ip]['count'] = 0;
	$attempts_data[$ip]['last_attempt'] = time();
	file_put_contents($log_file, json_encode($attempts_data));
}else{



// 요청 처리 (로그인 과정 제외)
$attempts_data[$ip]['count']++;
$attempts_data[$ip]['last_attempt'] = time();
file_put_contents($log_file, json_encode($attempts_data));
}

$remaining_attempts = $max_attempts - $attempts_data[$ip]['count'];
if ($remaining_attempts > 0) {
    echo "Request recorded. You have $remaining_attempts attempts left.<br>";
} else{
    echo "Too many requests. Try again after " . ($lockout_time / 60) . " minutes.<br>";
}
