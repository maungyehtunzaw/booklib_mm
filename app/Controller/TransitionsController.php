<?php
//TransitionController.php
class TransitionsController extends AppController{
	public $helpers=array('Html','Form');

	public function beforeFilter(){
		$this->loadModel('Member');
		$this->loadModel('Transition');
		$this->loadModel('Book');
		$members=$this->Member->find('list',array("conditions"=>array("Member.status"=>1)));
		$this->set('members',$members);
		$books=$this->Book->find('list',array("conditions"=>array("Book.status"=>1)));
		$this->set('books',$books);
		
		parent::beforeFilter();
		$this->Auth->allow('tranisiton','addtransition','viewtransition','authorsearch');
	}

	public function index(){
		$this->loadModel('Member');
		$this->loadModel('Book');
		$members=$this->Member->find('list');
		$this->set('members',$members);
		$books=$this->Book->find('list');
		$this->set('books',$books);
		//Load Model back cause of lost book!

		 $conditions=array('Transition.id !=' => '20','Transition.status !='=>'44');
		 $this->paginate = array(
        'conditions' =>$conditions, //staatus='44' is deleted
        'limit' => 10,
        'order' => array('id' => 'desc')
    );
		
		$transitions=$this->paginate('Transition');
		$this->set('Transitions',$transitions);
	
		//$this->set('Transitions',$this->Transition->find('all'));
		}

	public function transitionsearch(){
		$this->loadModel('Member');
		$this->loadModel('Transition');
		$this->loadModel('Book');
		$members=$this->Member->find('list');
		$this->set('members',$members);
		$books=$this->Book->find('list');
		$this->set('books',$books);
		if($this->request->is('post')){
			//	echo $this->request->data['Search']['status'];
			//if searching 
		echo $type=$this->request->data['Transition']['type'];
		echo '<hr>';
		echo $status=$this->request->data['Transition']['status'];
		echo '<hr>';
		echo $keyword=$this->request->data['Transition']['keyword'];
		echo '<hr>';
		echo $type1=($type=='all')? 'm':$type;
		echo $status1=($status=='all')? '2=2':$status;
		echo $keyword1=isset($keyword)? '3=3':$keyword;

			$conditions=array('Transition.status ='=>"".$status1."",'Transition.member_id ='=>"".$type1."");
			$this->paginate = array(
        'conditions' =>$conditions, //staatus='44' is deleted
        'limit' => 10,
        'order' => array('id' => 'desc')
    		);
		
		$transitions=$this->paginate('Transition');
		$this->set('Transitions',$transitions);
	
			}
		}

	public function addtransition(){	
	if($this->request->is('post')){
		$this->Transition->create();
		if($this->Transition->save($this->request->data)){
			$this->Session->setFlash(__('Successfully Add Borrow Books'));
			return $this->redirect(array('action'=>'index'));
		}
			$this->Session->setFlash(__('Unable to Add Borrow Books, Try Again Later..'));
		}
	}

	public function bookaccept($id = null)
	{
	    $this->Transition->id = $id;
	    if (!$this->Transition->exists()){
	     $this->Session->setFlash('Invalid Transition', 'error');	
	 }  
		
	$this->Transition->saveField('status', 'aa');
   
   	 $this->Session->setflash('The Book has been Accepted List');
    //$this->redirect(array('action' => 'administration'));
    return $this->redirect(array('action' => 'index'));
    
	}

public function edittransition($id=null){
		$this->loadModel('Member');
		$this->loadModel('Book');
		$members=$this->Member->find('list');
		$this->set('members',$members);

		$books=$this->Book->find('list');
		$this->set('books',$books);
		
		if(!$id){
			throw new NotFoundException(__('Invalid Book'));
		}
		$transition=$this->Transition->findById($id);
		if(!$transition){
			throw new NotFoundException(__('Invalid Book'));
		}
		
		if($this->request->is(array('transition','put'))){
			$this->Transition->id=$id;
			if($this->Transition->save($this->request->data)){
			$this->Session->setFlash(__('Your Transition '.$this->Transition->id.' been updated.'));
            return $this->redirect(array('action' => 'index'));
			}
			$this->Session->setFlash(__('Unable to Update Transition Info, Try Later'));
		}
		if(!$this->request->data){
			$this->request->data=$transition;
		}

}

public function notaccept($id = null)
{
    $this->Transition->id = $id;
    if (!$this->Transition->exists()){
     $this->Session->setFlash('Invalid Transition', 'error');	
 }  
	$this->Transition->saveField('status','bb');
 
    
   	 $this->Session->setflash('The Book has been add Not Accepted List');
    //$this->redirect(array('action' => 'administration'));
    return $this->redirect(array('action' => 'index'));
    
}

public function viewtransition($id = null){
		$this->loadModel('Member');
		$this->loadModel('Transition');
		$this->loadModel('Book');
		$members=$this->Member->find('list');
		$this->set('members',$members);
		$books=$this->Book->find('list');
		$this->set('books',$books);
		
		$this->Transition->id=$id;
		if(!$this->Transition->exists()){
		$this->Transition->setFlash('Invalid Transition','Error');
		}
		$tran=$this->Transition->findById($id);
		if(!$tran){
			throw new NotFoundException(__('Invalid Transition'));
		}
	$this->set('Transition',$tran);
	
	}
}
?>