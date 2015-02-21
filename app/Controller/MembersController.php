<?php
class MembersController extends AppController {
	public $helpers=array('Html','Form');
	
 	public function beforeFilter() {
    parent::beforeFilter();
    // Allow users to register and logout.
    	$this->Auth->allow('logout','memberhome'); //accessable function 
	}
	
    public function memberhome(){
	//	$this->set('Members',$this->Member->find('all'));
    	$this->paginate=array(
    			'conditions' => array('Member.id !=' => '6'),
       			'limit' => 3,
        		'order' => array('id' => 'desc')
    		);
    	$members=$this->paginate('Member');
    	$this->set('Members',$members);
		
	}
	
	public function memberview($id =null){
		if(!$id){
			throw new NotFoundException(__('Invalid Member '));
		}
		
	$member=$this->Member->findById($id);
		if(!$member){
			throw new NotFoundException(__('Invalid Member'));
		}
	$this->set('member',$member);
	}
	
	public function memberreg(){
	if($this->request->is('post')){
		$this->Member->create();
		if($this->Member->save($this->request->data)){
			$this->Session->setFlash(__('Successfully Register New Member, Good job'));
			return $this->redirect(array('action'=>'memberhome'));
		}
			$this->Session->setFlash(__('Unable to Register , Bad Job'));
		}
	}
	
	public function memberedit($id=null){
		if(!$id){
			throw new NotFoundException(__('Invalid Member'));
		}
		$mem=$this->Member->findById($id);
		if(!$mem){
			throw new NotFoundException(__('Invalid Member'));
		}
		
		if($this->request->is(array('member','put'))){
			$this->Member->id=$id;
			if($this->Member->save($this->request->data)){
			$this->Session->setFlash(__('Successfully Update Member infomation'));
            return $this->redirect(array('action' => 'memberhome'));
			}
			$this->Session->setFlash(__('Unable to Update Member\'s Info'));
		}
		if(!$this->request->data){
			$this->request->data=$mem;
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
