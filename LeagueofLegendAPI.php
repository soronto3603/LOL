<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<?
	include("Common.php");
	
	function request_api($url){
		$curl=curl_init($url);
		curl_setopt($curl,CURLOPT_POST,false);   //GET 전송방식
		curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
		$result = curl_exec($curl);
		curl_close($curl);
		return $result;
	}
	function summoner_name($summoner, $server,$key) {
		$result=request_api('https://' . $server . '.api.pvp.net/api/lol/' . $server . '/v1.4/summoner/by-name/' . $summoner . '?api_key='.$key);
		return $result;
	}
	function summoner_matchlist($summoner_id,$server,$key){
		$result=request_api('https://'.$server.'.api.pvp.net/api/lol/'.$server.'/v2.2/matchlist/by-summoner/'.$summoner_id.'?api_key='.$key);
		echo 'https://'.$server.'.api.pvp.net/api/lol/'.$server.'/v2.2/matchlist/by-summoner/'.$summoner_id.'?api_key='.$key;
		return $result;
	}
	function summoner_info_array_name($summoner) {
		$summoner_lower = mb_strtolower($summoner, 'UTF-8');
		$summoner_nospaces = str_replace(' ', '', $summoner_lower);
		return $summoner_nospaces;
	} 
	function get_champions_info($server,$key){
		$result=request_api('https://global.api.pvp.net/api/lol/static-data/'.$server.'/v1.2/champion?champData=tags&api_key='.$key);
		return $result;
	}
	function get_champion_list($server,$key){
		$champions_info_list=json_decode(get_champions_info($server,$key),true);
		$champions_name_list=array();
		foreach($champions_info_list['data'] as $k=>$v){
			array_push($champions_name_list,$v['key']);
		}
		return $champions_name_list;
	}
	function get_page($url){
		$ch=curl_init();
		curl_setopt($ch,CURLOPT_URL,$url);
		curl_setopt($ch,CURLOPT_POST,false);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		return curl_exec($ch);
	}
	//$summoner = 'defsoronto';

	//$summoner_info = summoner_name($summoner, $server,$key);
	//$summoner_info_array = json_decode($summoner_info, true);
	//$summoner_info_array_name = summoner_info_array_name($summoner);
	//echo $summoner_id = $summoner_info_array[$summoner_info_array_name]['id']; 
	//print_r(summoner_matchlist($summoner_id,$server,$key));
?>