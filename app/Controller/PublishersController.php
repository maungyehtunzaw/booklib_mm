<?php
class  PublishersController  extends AppController {
	public $helpers=array('Html','Form');
	
	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('publisherhome','publisherview');
	}
    
    public function publisherhome(){
		//$this->set('Publishers',$this->Publisher->find('all')); //Normal Loopad
		$this->paginate = array(
        'conditions' => array('Publisher.id !=' => '6'),
        'limit' => 3,
        'order' => array('id' => 'desc')
    );
     
    // we are using the 'User' model
    $publishers = $this->paginate('Publisher');
     
    // pass the value to our view.ctp
    $this->set('Publishers', $publishers);
	}
	
	public function publisherview($id =null){
		if(!$id){
			throw new NotFoundException(__('Invalid Publisher'));
		}
		
	$publisher=$this->Publisher->findById($id);
		if(!$publisher){
			throw new NotFoundException(__('Invalid Publisher'));
		}
	$this->set('pub',$publisher);
	}
	
	public function publisheradd(){
	if($this->request->is('post')){
		$this->Publisher->create();
		if($this->Publisher->save($this->request->data)){
			$this->Session->setFlash(__('Successfully Add New Publisher..'));
			return $this->redirect(array('action'=>'publisherhome'));
		}
			$this->Session->setFlash(__('Unable to Add New Publisher..'));
		}
	}
	
	public function publisheredit($id=null){
		if(!$id){
			throw new NotFoundException(__('Invalid Publisher'));
		}
		$pub=$this->Publisher->findById($id);
		if(!$pub){
			throw new NotFoundException(__('Invalid Publisher'));
		}
		
		if($this->request->is(array('publisher','put'))){
			$this->Publisher->id=$id;
			if($this->Publisher->save($this->request->data)){
			$this->Session->setFlash(__('Your Publisher\' info has been updated.'));
            return $this->redirect(array('action' => 'publisherhome'));
			}
			$this->Session->setFlash(__('Unable to Update Publisher\'s  Info'));
		}
		if(!$this->request->data){
			$this->request->data=$pub;
		}
	}
	
	public function bookdelete($id) {
		if ($this->request->is('get')) {
		    throw new MethodNotAllowedException();
		}
	    
		if ($this->Book->delete($id)) {
		    $this->Session->setFlash(
			__('The post with id: %s has been deleted.', h($id))
		    );
		    return $this->redirect(array('action' => 'index'));
		}
	}
}
?>
