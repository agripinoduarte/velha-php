<?php
		$requester_id = '0';
		$requester_name = '0';
		$request_id = '0';
		$subject_id = '0';
		$subject_name = '0';
		$other = '0';
		$game_id = 'null';
		$current = 0;

	if (!empty($game)) {
		echo '<h4>Partida Iniciada: ' , $request['Requester']['username'] , ' vs. ' , $request['User']['username'] , '</h4>';
		echo '<i id="turn">Ultimo Mov.: </i>', $game['Current']['name'];

		$requester_id = $game['Requester']['id'];
		$requester_name = $game['Requester']['username'];
		$request_id = $request['Request']['id'];
		$subject_id = $request['User']['id'];
		$subject_name = $request['User']['username'];
		$game_id = $game['Game']['id'];
		$other = ($me == $subject_id) ? $requester_id : $subject_id;
		$current = !empty($game['Current']['id']) ? $game['Current']['id'] : $game['User']['id'];
		$game = json_encode($game['Game']);
	}
?>
<canvas id="velha" height="300"  width="300" >Canvas não habilitado em seu navegador</canvas>
<input type="button" value="Limpar" onclick="return clearBoard()"/>

<?php
echo $this->Html->link('Encerrar Jogo', array('action' => 'cancel/' . $game_id));
$script = <<<SCRIPT
	var requester_id = $requester_id;
	var request_id = $request_id;
	var requester_name = "$requester_name";
	var subject_id = $subject_id;
	var subject_name = "$subject_name";
	var other = $other;
	var me = $me;
	var game_id = $game_id;
	var game = $game;
	var current = $current;
SCRIPT;

echo $this->Html->scriptBlock($script);
