<?php
if (! function_exists('friendly_date')) {
    //生成友好时间形式
    function  friendly_date( $from ){
        static $now = NULL;
        $now == NULL && $now = time();
        ! is_numeric( $from ) && $from = strtotime( $from );
        $seconds = $now - $from;
        $minutes = floor( $seconds / 60 );
        $hours   = floor( $seconds / 3600 );
        $day     = round( ( strtotime( date( 'Y-m-d', $now ) ) - strtotime( date( 'Y-m-d', $from ) ) ) / 86400 );
        if( $seconds == 0 ){
            return '刚刚';
        }
        if( ( $seconds >= 0 ) && ( $seconds <= 60 ) ){
            return "{$seconds}秒前";
        }
        if( ( $minutes >= 0 ) && ( $minutes <= 60 ) ){
            return "{$minutes}分钟前";
        }
        if( ( $hours >= 0 ) && ( $hours <= 24 ) ){
            return "{$hours}小时前";
        }
        if( ( date( 'Y' ) - date( 'Y', $from ) ) > 0 ) {
            return date( 'Y-m-d', $from );
        }
        switch( $day ){
            case 0:
                return date( '今天H:i', $from );
                break;

            case 1:
                return date( '昨天H:i', $from );
                break;

            default:
                //$day += 1;
                return "{$day} 天前";
                break;
        }
    }
}


if (! function_exists('my_sb_substr')) {
    /**
     * 截取中英混排字符串
     * @param (string) $string
     * @param (int) $length
     * @param (string) $dot
     * @param (string) $charset
     * @return string
     */
    function my_sb_substr( $string, $length, $dot = '..', $charset='utf-8' ) {
        $slen = strlen($string);
        if( $slen <= $length ) {
            return $string;
        }
        if( function_exists( 'mb_substr' ) ) {
            return mb_substr( $string, 0, $length, $charset ) . $dot;
        }
        $strcut = '';
        if(strtolower($charset) == 'utf-8') {
            $n = $tn = $noc = 0;
            while($n < $slen) {
                $t = ord($string[$n]);
                if($t == 9 || $t == 10 || (32 <= $t && $t <= 126)) {
                    $tn = 1; $n++; $noc++;
                } elseif(194 <= $t && $t <= 223) {
                    $tn = 2; $n += 2; $noc += 1;
                } elseif(224 <= $t && $t < 239) {
                    $tn = 3; $n += 3; $noc += 1;
                } elseif(240 <= $t && $t <= 247) {
                    $tn = 4; $n += 4; $noc += 1;
                } elseif(248 <= $t && $t <= 251) {
                    $tn = 5; $n += 5; $noc += 1;
                } elseif($t == 252 || $t == 253) {
                    $tn = 6; $n += 6; $noc += 1;
                } else {
                    $n++;
                }
                if($noc >= $length) {
                    break;
                }
            }
            if($noc > $length) {
                $n -= $tn;
            }
            $strcut = substr($string, 0, $n);
        } else {
            for($i = 0; $i < $length; $i++) {
                $strcut .= ord($string[$i]) > 127 ? $string[$i].$string[++$i] : $string[$i];
            }
        }

        return $strcut.$dot;
    }
}

if (! function_exists('password_dohash')) {
    /**
     * 加密密码
     * @param $password
     * @param $salt
     * @return string
     */
    function password_dohash($password, $salt)
    {
        return md5(md5($password).$salt);
    }
}

if (! function_exists('get_online_ip')) {
    /**
     * 获得本地真实IP
     * @return mixed
     */
    function get_online_ip() {
        $ip_json = @file_get_contents("http://ip.taobao.com/service/getIpInfo.php?ip=myip");
        $ip_arr = json_decode(stripslashes($ip_json), 1);
        if($ip_arr['code']==0)
        {
            return $ip_arr['data']['ip'];
        }
        else
            return null;
    }
}

if (! function_exists('set_api_response')) {
    /**
     * ajax返回json数据
     * @param $errcode
     * @param $errmsg
     * @param null $result 数据
     * @param null $url 跳转url
     * @return array
     */
    function set_api_response($errcode, $errmsg, $result = NULL, $url = NULL) {
        return array(
            'errcode' => $errcode,
            'errmsg' => $errmsg,
            'result' => $result,
            'url' => $url,
        );
    }
}