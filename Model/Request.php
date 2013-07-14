<?php

class Request extends AppModel
{
	public $name = 'Request';

	public $displayField = 'requester_id';

	public $belongsTo = array(
		'User' => array(
			'foreignKey' => 'subject_id'
		),
		'Requester' => array(
			'className' => 'User',
			'foreignKey' => 'requester_id'
		)
	);
}