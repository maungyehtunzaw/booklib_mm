<?php
App::uses('AppController', 'Controller');

class UsersController extends AppController {

    public function beforeFilter() {
    parent::beforeFilter();
    // Allow users to register and logout.
    $this->Auth->allow('add', 'logout','homepage');
}

public function login() {
    if ($this->request->is('post')) {
        if ($this->Auth->login()) {
            return $this->redirect($this->Auth->redirect());
          //  return $this->redirect(array('action' => 'index'));
        }
       
 $this->Session->setFlash(
                __('Username and Password incorrect. Please, try again.')
            );
    }
}

public function logout() {
  //  return $this->redirect($this->Auth->logout());
    $this->Session->setFlash('Good-Bye');
    $this->redirect($this->Auth->logout());

}

    public function index() {
       // $this->User->recursive = 0;
        $this->set('Users',$this->User->find('all')); //me
       // $this->set('users', $this->paginate()); //orginal
        $this->paginate=array(
            'conditions'=>array('User.id !='=>'6'),
            'limit'=>3,
            'order'=>array('id'=>'desc')
            );
        $users=$this->paginate('User');
        $this->set('Users',$users);

    }

    public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $this->User->read(null, $id));
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(
                __('The user could not be saved. Please, try again.')
            );
        }
    }

    public function updateprofile($id=null){
        
    }


    public function edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(
                __('The user could not be saved. Please, try again.')
            );
        } else {
            $this->request->data = $this->User->read(null, $id);
            unset($this->request->data['User']['password']);
        }
    }

    public function delete($id = null) {
        $this->request->onlyAllow('post');

        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('User deleted'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not deleted'));
        return $this->redirect(array('action' => 'index'));
    }

    function isUserLogin()
    {
        $user_id = $this->MemberAuth->id();
        $user=array();
        if($user_id)
        {
            $member = $this->User->find('first',array('conditions'=>array('User.id'=>$user_id),'fields'=>array('name')));
        }
        
        return $user;
    }

}
?>