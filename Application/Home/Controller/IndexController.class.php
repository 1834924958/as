<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index111(){
    	header("Content-type:text/html;charset=Utf-8");
    	import('Org.JAE.QueryList');
    	
    	//采集OSC的代码分享列表，标题 链接 作者
        $url = "http://www.thinkphp.cn/document/index.html";
//        $reg = array("title"=>array("a:eq(0)","text"),"url"=>array("a:eq(0)","href"));
        $reg = array("url"=>array(".fl a:eq(0)","href"));
        $rang = ".extend li";
        //使用curl抓取源码并以GB2312编码格式输出
        $hj = new \QueryList($url,$reg,$rang,'curl','Utf-8');
        $arr = $hj->jsonArr;
        echo "<pre>";
        print_r($arr);
        echo "</pre><hr/>";
//        //如果还想采当前页面右边的 TOP40活跃贡献者 图像，得到JSON数据,可以这样写
//        $reg = array("portrait"=>array(".hot_top img","src"));
//        $hj->setQuery($reg);
//        $json = $hj->getJSON();
//        echo $json . "<hr/>";

        //采OSC内容页内容
        $map = array();
        foreach($arr as $k => $v){
            $aa = "http://www.thinkphp.cn".$v['url'];
            $reg = array("title"=>array("h2","text"),"con"=>array(".art-cnt","html"));
            $hj = new \QueryList($aa,$reg);
            $ac = $hj->jsonArr;
            $map['title'] = $ac[0]['title'];
            $map['content'] = $ac[0]['con'];
            $res = M('Cs')->add($map);
        }


//        $url = "http://news.kf.cn/2017/1223/284646.shtml";
//        $reg = array("title"=>array("h1","text"),"con"=>array(".cont-detail","html"));
//        $hj = new \QueryList($aa,$reg);
//        $arr = $hj->jsonArr;
//        echo "<pre>";
//        print_r($arr);
//        echo "</pre><hr/>";

    }
    public function index(){
        header("Content-type:text/html;charset=Utf-8");
        import('Org.JAE.QueryList');

        //采集OSC的代码分享列表，标题 链接 作者
        $url = "http://www.kfst.cn/kjyw1";
//        $reg = array("title"=>array("a:eq(0)","text"),"url"=>array("a:eq(0)","href"));
        $reg = array("url"=>array(".item-content a:eq(0)","href"));
        $rang = ".active  li";
        //使用curl抓取源码并以GB2312编码格式输出
        $hj = new \QueryList($url,$reg,$rang,'curl','Utf-8');
        $arr = $hj->jsonArr;
        echo "<pre>";
        print_r($arr);
        echo "</pre><hr/>";

        die();
//        //如果还想采当前页面右边的 TOP40活跃贡献者 图像，得到JSON数据,可以这样写
//        $reg = array("portrait"=>array(".hot_top img","src"));
//        $hj->setQuery($reg);
//        $json = $hj->getJSON();
//        echo $json . "<hr/>";

        //采OSC内容页内容
        $map = array();
        foreach($arr as $k => $v){
            $aa = "http://www.my36500.com".$v['url'];
            $reg = array("title"=>array(".entry-head h1","text"),"con"=>array(".entry","html"));
            $hj = new \QueryList($aa,$reg);
            $ac = $hj->jsonArr;
            $map['title'] = $ac[0]['title'];
            $map['content'] = $ac[0]['con'];
            $list = M('Cs')->add($map);
        }


//        $url = "http://news.kf.cn/2017/1223/284646.shtml";
//        $reg = array("title"=>array("h1","text"),"con"=>array(".cont-detail","html"));
//        $hj = new \QueryList($aa,$reg);
//        $arr = $hj->jsonArr;
//        echo "<pre>";
//        print_r($arr);
//        echo "</pre><hr/>";


    }
}