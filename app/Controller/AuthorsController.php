<?php
class AuthorsController extends AppController {
	public $helpers=array('Html','Form');
	 public $components = array('Paginator');
	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('authorhome','authorview','authorsearch');
	}

    public function authorhome(){
		//$this->set('Authors',$this->Author->find('all'));
		// we prepare our query, the cakephp way!
    $this->paginate = array(
        'conditions' => array('Author.id !=' => '6'),
        'limit' => 3,
        'order' => array('id' => 'desc')
    );
     
    // we are using the 'User' model
    $authors = $this->paginate('Author');
     
    // pass the value to our view.ctp
    $this->set('Authors', $authors);
	}

	public function authorsearch(){
		echo $name=$this->request->data['Author']['name1'];
	 	echo $gender=$this->request->data['Author']['gender'];
		$condition=array('conditions'=>array('Author.name LIKE'=>'%'.$name.'%','Author.gender'=>$gender));
				$this->set('results',$this->Author->find('all',$condition));
		
	}
	
	public function authorview($id =null){
		if(!$id){
			throw new NotFoundException(__('Invalid Authors'));
		}
		
	$author=$this->Author->findById($id);
		if(!$author){
			throw new NotFoundException(__('Invalid Authors'));
		}
	$this->set('author',$author);
	}
	
	public function authoradd(){
	if($this->request->is('post')){
		$this->Author->create();
		if($this->Author->save($this->request->data)){
			$this->Session->setFlash(__('Successfully Add New Author'));
			return $this->redirect(array('action'=>'authorhome'));
		}
			$this->Session->setFlash(__('Unable to Add New Author, Try Again Later..'));
		}
	}
	
	public function authoreidt($id=null){
		if(!$id){
			throw new NotFoundException(__('Invalid Author, No ID'));
		}
		$author=$this->Author->findById($id);
		if(!$author){
			throw new NotFoundException(__('Invalid Author'));
		}
		
		if($this->request->is(array('author','put'))){
			$this->Author->id=$id;
			if($this->Author->save($this->request->data)){
			$this->Session->setFlash(__('Your Author\'s info has been updated.'));
            return $this->redirect(array('action' => 'authorhome'));
			}
			$this->Session->setFlash(__('Unable to Update Author Info'));
		}
		if(!$this->request->data){
			$this->request->data=$author;
		}
	}
	
	public function authordelete($id) {
		if ($this->request->is('get')) {
		    throw new MethodNotAllowedException();
		}
	    
		if ($this->Author->delete($id)) {
		    $this->Session->setFlash(
			__('The Author with id: %s has been deleted.', h($id))
		    );
		    return $this->redirect(array('action' => 'authorhome'));
		}
	}


}
?>

