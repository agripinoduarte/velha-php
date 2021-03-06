<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
	public $helpers = array(
		'Html' => array('className' => 'TwitterBootstrap.BootstrapHtml'),
		'Form' => array('className' => 'TwitterBootstrap.BootstrapForm'),
		'Paginator' => array('className' => 'TwitterBootstrap.BootstrapPaginator'),
	);

	public $components = array(
		'Auth' => array(
	        'loginAction' => array(
	            'controller' => 'users',
	            'action' => 'login',
	        ),
	        'logoutAction' => '/users/login',
	        'authError' => 'Por favor faça o login',
	        'authenticate' => array(
	            'Form' => array(
	                'fields' => array('username' => 'username')
	            )
	        ),
	        'redirect' => 'board/index',
	    ),
	    'Session'
	);

	public function beforeFilter()
	{
		$this->Auth->authenticate = array('Form' => array('userModel' => 'User'));
		$this->Auth->allow('createAdmin', 'add');
		$this->loggedUser = $this->Auth->user();
		$this->set('loggedUser' , $this->loggedUser);
	}

}
