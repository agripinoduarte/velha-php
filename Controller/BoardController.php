<?php

class BoardController extends AppController
{
	public $uses = ['User', 'Request', 'Game'];

	public $map = [1 => 'one', 2 => 'two', 'three', 'four', 'five', 'six', 'seven', 'eigth', 'nine'];

	public function index()
	{
		$users = $this->User->find('list', array(
			'conditions' => array(
				'id <>' => $this->loggedUser['id']
			)
		));

		$requests = $this->Request->find('list', array(
			'conditions' => array(
				'subject_id' => $this->loggedUser['id'],
				'active' => true,
				'confirmed' => 0
			)
		));

		$this->set(compact('users', 'requests'));
	}

	public function game($game_id = '')
	{
		$game = $this->Game->find('first', array(
			'conditions' => array('Game.id' => $game_id),
			'recursive' => 2,
			'order' => array('Game.created DESC')
		));

		$me = $this->loggedUser['id'];

		if (!empty($game)) {
			$request = $this->Request->read(null, $game['Game']['request_id']);
		}

		$this->set(compact('game', 'me', 'request'));		
	}

	public function move()
	{
		if ($this->request->is('post')) {
			$this->layout = null;
			$this->autoRender = false;
			
			$game = $this->Game->find('first', array(
				'conditions' => array(
					'Game.id' => $this->request->data['game_id']
				)
			));	


			$game['Game'][$this->map[intval( $this->request->data['square'])]] = $this->request->data['player'];
			$game['Game']['last'] = intval($this->request->data['player_id']);
			$this->Game->save($game);
		}
	}

	public function emptyBoard()
	{
		if ($this->request->is('post')) {
			$this->layout = null;
			$this->autoRender = false;
			
			$game = $this->Game->find('first', array(
				'conditions' => array(
					'Game.id' => $this->request->data['game_id']
				)
			));	

			$game['Game']['one'] = '';
			$game['Game']['two'] = '';
			$game['Game']['three'] = '';
			$game['Game']['four'] = '';
			$game['Game']['five'] = '';
			$game['Game']['six'] = '';
			$game['Game']['seven'] = '';
			$game['Game']['eigth'] = '';
			$game['Game']['nine'] = '';

			$this->Game->save($game);
		}
	}

	public function request($id)
	{
		$existentRequest = $this->Request->find('first', array(
			'conditions' => array(
				'requester_id' => $this->loggedUser['id'],
				'subject_id' => $id
			)
		));

		if (empty($existentRequest)) {

			$myRequest = $this->Request->find('first', array(
				'conditions' => array(
					'requester_id' => $id,
					'subject_id' => $this->loggedUser['id']
				)
			));	


			if (!empty($myRequest)) {
				if (!$myRequest['Request']['confirmed']) {
					$myRequest['Request']['confirmed'] = true;
					$this->Game->create();
					$this->Game->save(array(
						'request_id' => $myRequest['Request']['id'], 
						'requester_id' => $id, 
						'subject_id' => $this->loggedUser['id'],
					));

					$this->Request->save($myRequest);

					$me = $this->loggedUser['id'];

					$this->set(compact('game', 'request', 'me'));
					$this->redirect('game/' . $this->Game->id);
				} else {
					$game = $this->Game->find('first', array(
						'conditions' => array('Game.request_id' => $myRequest['Request']['id']),
						'recursive' => 2,
						'order' => array('Game.created DESC')
					));

					if (empty($game)) {
						$this->redirect('index');
					} else {
						$request = $myRequest;
						$me = $this->loggedUser['id'];

						$this->set(compact('game', 'request', 'me'));
						$this->redirect('game/' . $game['Game']['id']);
					}
				}
			}

			$request = array(
				'Request' => array(
					'requester_id' => $this->loggedUser['id'],
					'subject_id' => $id,
					'active' => 1,
					'confirmed' => false
				)
			);

			$this->Request->create();
			$this->Request->save($request);

			$this->Session->setFlash('Pedido enviado. Espere a resposta do jogador',
	        	'alert',
	        	array(
					'plugin' => 'TwitterBootstrap',
					'class' => 'alert-success'
				)
			);
		} else {
			if (!$existentRequest['Request']['confirmed']) {
				$this->Session->setFlash('Já existe uma solicitação',
		        	'alert',
		        	array(
						'plugin' => 'TwitterBootstrap',
						'class' => 'alert-success'
					)
				);

				$this->redirect('index');
			} else {
				$game = $this->Game->find('first', array(
					'conditions' => array(
						'Game.request_id' => $existentRequest['Request']['id'],
					),
					'recursive' => 2,
					'order' => array('Game.created DESC')
				));

				if (empty($game)) {
					$this->redirect('index');
				} else {
					$request = $existentRequest;
					$me = $this->loggedUser['id'];

					$this->set(compact('game', 'request', 'me'));
					return $this->redirect('game/' . $game['Game']['id']);
				}
			}
		}

		$this->redirect(['controller' => $this->request->params['controller'], 'action' => 'index']);
	}

	public function cancel($game_id) 
	{

		$game = $this->Game->find('first', array(
			'conditions' => array('Game.id' => $game_id)
		));

		if (!empty($game)) {
			$this->Request->delete($game['Game']['request_id']);
			$this->Game->delete($game_id);
			
			$this->Session->setFlash('Jogo Encerrado!',
	        	'alert',
	        	array(
					'plugin' => 'TwitterBootstrap',
					'class' => 'alert-success'
				)
			);

			return $this->redirect('index');
		}
	}

	public function confirm($requester_id)
	{
		$request = $this->Request->find('first', array(
			'conditions' => array(
				'requester_id' => $requester_id,
				'confirmed' => 0
			)
		));
		
		if (!empty($request)) {
			$request['Request']['confirmed'] = true;
			$this->Request->save($request);
			$this->Game->create();
			$this->Game->save(array(
				'request_id' => $request['Request']['id'], 
				'requester_id' => $requester_id, 
				'subject_id' => $this->loggedUser['id']
			));
			$this->redirect('game/' . $this->Game->id);
		} 
	}
}