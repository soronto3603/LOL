# LOL
LOL API 
한글로 만들어진 API가 없어서 만들던 프로젝트에 있던 모듈을 올림

$server = "kr";
$key="";

$summoner_info=summoner_name($summoner,$server,$key);
$summoner_info_array = json_decode($summoner_info, true);
$summoner_info_array_name = summoner_info_array_name($summoner);
echo $summoner_id = $summoner_info_array[$summoner_info_array_name]['id']; 
print_r(summoner_matchlist($summoner_id,$server,$key));
