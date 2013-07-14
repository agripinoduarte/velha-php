<?php 
	$reqs = array_values($requests);
?>
	<div id="players">
 	<h3>Jogadores Cadastrados</h3>
   	<ul>
   <?php
 		foreach ($users as $id => $name) {
 	?>
 		<li ><?php echo $this->Html->link($name, "/board/request/" . $id)
 			, in_array($id, $reqs) 
 			? ' (este usuário solicitou jogar com você. ' .  $this->Html->link('Confirmar', "/board/confirm/" . $id) . ')'
 			: '';
 		?>
 		 </li>
<?php
 	}