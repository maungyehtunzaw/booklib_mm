<?php
class BooksController extends AppController{
	public $helpers=array('Html','Form');
	


	public function beforeFilter(){
		$this->loadModel('Author');
		$this->loadModel('Transition');
		$this->loadModel('Publisher');
		$authors=$this->Author->find('list');
		$this->set('authors',$authors);
		$publishers=$this->Publisher->find('list');
		$this->set('publishers',$publishers);

		parent::beforeFilter();
		$this->Auth->allow('index','bookview');
	}
	
	public function isAuthorized($user) {
	    // All registered users can add posts
	    if ($this->action === 'bookadd') {
	        return true;
	    }

	    // The owner of a post can edit and delete it
	    if (in_array($this->action, array('bookedit', 'bookdelete'))) {
	        $BookId = (int) $this->request->params['pass'][0];
	        if ($this->Book->isOwnedBy($BookId, $user['id'])) {
	            return true;
	        }
	    }

	    return parent::isAuthorized($user);
	}

	public function index(){
		$this->paginate=array(
				'conditions'=>array('Book.id !='=>'6','Book.Status !='=>2),
				'limit'=>3,
				'order'=>array('id'=>'desc')
			
		);
		$books=$this->paginate('Book');
		$this->set('Books',$books);

		//$this->set('Books',$this->Book->find('all'));
	}
	
	public function bookview($id =null){
		if(!$id){
			throw new NotFoundException(__('Invalid Book'));
		}
		
	$book=$this->Book->findById($id);
		if(!$book){
			throw new NotFoundException(__('Invalid Book'));
		}
	$this->set('book',$book);
	}
	
	public function bookadd(){
	//	$authorlist=$this->set('name',$this->Book->Author->find('all'));
		$this->loadModel('Author');
		$this->loadModel('Book');
		$this->loadModel('Publisher');
		$publishers=$this->Publisher->find('list');
		$this->set('publishers',$publishers);
		$authors=$this->Author->find('list');
		$this->set('authors',$authors);

	if($this->request->is('post')){
		$this->request->data['Book']['user_id'] = $this->Auth->user('id');
		$this->Book->create();

		if($this->Book->save($this->request->data)){
			$this->Session->setFlash(__('Successfully Add New Book..'));
			return $this->redirect(array('action'=>'index'));
		}
			$this->Session->setFlash(__('Unable to Add New Book..'));
		}
	}
	
	public function bookedit($id=null){
	
		if(!$id){
			throw new NotFoundException(__('Invalid Book'));
		}
		$book=$this->Book->findById($id);
		if(!$book){
			throw new NotFoundException(__('Invalid Book'));
		}
		
		$bookid=$this->Book->findById($id,array("fields"=>"title"));
		$this->set('booktit',$bookid);
		
		if($this->request->is(array('book','put'))){
			$this->Book->id=$id;
			if($this->Book->save($this->request->data)){
			$this->Session->setFlash(__('Your post has been updated.'));
            return $this->redirect(array('action' => 'index'));
			}
			$this->Session->setFlash(__('Unable to Update Book Info'));
		}
		if(!$this->request->data){
			$this->request->data=$book;
		}
	}
	
	public function bookdelete($id) {
	 $this->Book->id = $id;
    if (!$this->Book->exists()){
    	 $this->Session->setFlash('Invalid Book', 'error');	
 	}  
	
	$this->Book->saveField('status','2');
	$this->Session->setflash('The Book '.$this->Book->title.' Have Been Deleted');
    return $this->redirect(array('action' => 'index'));
}

}
?>
