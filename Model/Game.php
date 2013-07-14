<?php

class Game extends AppModel
{
	public $belongsTo = array(
		'Request',
		'User' => array(
			'foreignKey' => 'subject_id'
		),
		'Requester' => array(
			'className' => 'User',
			'foreignKey' => 'requester_id'
		),
		'Current' => array(
			'className' => 'User',
			'foreignKey' => 'last'
		),
	);
}