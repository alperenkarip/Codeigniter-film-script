<?php 
class ping extends CI_Controller {
	function ping(){
	parent::__construct();
	if ($this->session->userdata('oturum') < 1){ redirect('yp_giris'); }
		else {	
		$this->load->model('yonetim/y_yorumlar');
		$this->load->model('yonetim/y_mesajlar');
		$veri["onaysiz_yorumlar"] = $this->y_yorumlar->onaysizlar();
		$veri["okunmamis"] = $this->y_mesajlar->okunmamis();
		$this->load->view('yonetim/ust',$veri,true);
		$this->load->model('yonetim/y_filmler'); 
		}
	}
	
	function index(){
//Sonuc kodlari anlamlari : http://www.google.com/support/webmasters/bin/answer.py?hl=tr&answer=40132
@set_time_limit(0);
$url = "".site_url()."/rss.xml";
$site = "erenalp";
$pingliste = "ping.txt";
	$ac = fopen($pingliste,'r') or die("Dosya açılamadı..");
	$okut = fread($ac,filesize($pingliste));
	$parcala = explode('asd',$okut);
	$veri["parcala"] = $parcala;
	fclose($ac);
if ($this->input->post('ipler')){
$ipler = $this->input->post('ipler');
	$ac = fopen($pingliste,'w') or die("Dosya açılamadı..");
	$okut = fwrite($ac,$ipler);
	fclose($ac);
	redirect(site_url().'yonetim/ping');
}
if (!function_exists('xmlrpc_encode_request'))
{
    function xmlrpc_encode_request($yontem, $iki)
    {
        $cikti .= '<?xml version="1.0"?>';
        $cikti .= '<methodCall>';
        $cikti .= '<methodName>'.$yontem.'</methodName>';
        $cikti .= '<params>';
        $cikti .= '<param><value><string>'.$iki[0].'</string></value></param>';
        $cikti .= '<param><value><string>'.$iki[1].'</string></value></param>';
        $cikti .= '</params></methodCall>';
        return $cikti;
    }
}
function pingle($pingurl,$site,$url,$yontem) {
    $xmlrpc = xmlrpc_encode_request($yontem,array($site, $url));
    preg_match('@^(?:http://)?([^/]+)@i', $pingurl, $cikti); 
    $pinghost = $cikti[1];
    $headers[] = "Host: ".$pinghost;
    $headers[] = "Content-type: text/xml";
    $headers[] = "User-Agent: LPS";
    $headers[] = "Content-length: ".strlen($xmlrpc) . "\r\n";
    $headers[] = $xmlrpc;
    $chi = curl_init();
    curl_setopt($chi,CURLOPT_URL,$pingurl); 
    curl_setopt($chi,CURLOPT_RETURNTRANSFER,1); 
    curl_setopt($chi, CURLOPT_CONNECTTIMEOUT, 4);
    curl_setopt($chi,CURLOPT_HTTPHEADER,$headers); 
    curl_setopt($chi,CURLOPT_CUSTOMREQUEST,'POST');
    $html = curl_exec( $chi );
    $sonuc = curl_getinfo($chi);
    echo "Gönderildi : ".$pinghost.", Sonuc : ".$sonuc["http_code"]."<br />";
    curl_close($chi);
    unset($headers);
}
$oku = file($pingliste);
$len = count($oku);
$veri["oku"] = $oku;
$veri["len"] = $len;
$veri["url"] = $url;
$veri["site"] = $site;

		$veri["title"] = "Ping";
		$veri["goster"] = "yonetim/ping";
		$this->load->view('yonetim/yonetim',$veri);
	}
}
?>