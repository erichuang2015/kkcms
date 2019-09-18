<!-- 
	4/11日 更新获取站外尝鲜地址api
	By：流氓凡博客 wslmf.com
	部分代码来自 King
 -->
<?php
header('Content-Type: text/html; charset=utf-8');
session_start();
error_reporting(0);
include('../data/cxini.php');//载入尝鲜源站配置文件
define('SYSPATH', $zwcx['path']);
$zwurl = "https://wslmf.com/api/zwurl.txt"; //获取最新zwurl地址
$king_zwurl=file_get_contents($zwurl);
function redirect($url, $rule = 'http://wslmf.com/') //版权
{
    $header = get_headers($url, 1);
    if (strpos($header[0], '301') !== false || strpos($header[0], '302') !== false) {
        if (array_key_exists('Set-Cookie', $header)) {
            $cookies = $header['Set-Cookie'];
            foreach ($cookies as $k => $v) {
                header('Set-Cookie: ' . $v);
            }
        }
        if (array_key_exists('Location', $header)) {
            $url = $header['Location'];
            if (is_array($url)) {
                foreach ($url as $k => $v) {
                    if (true) {
                        return $v;
                    } else {
                        file_get_contents($v);
                    }
                }
            } else {
                if (true) {
                    return $url;
                }
            }
        }
    }
    return $url;
}
$data = $zwcx;
$data['zhanwai'] = redirect($king_zwurl);
$zwcx = $data;
if (file_put_contents('../data/cxini.php', "<?php\n \$zwcx =  " . var_export($data, true) . ";\n?>")) {
    echo '<script>alert("恭喜！源站地址更新成功!\n\n稍等一分钟后刷新此页面即可看到最新的源站地址！");window.opener=null;window.close();</script>';
} else {
    echo '<script>alert("NO！更新失败!");window.opener=null;window.close();</script>';
}
?>