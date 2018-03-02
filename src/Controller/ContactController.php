<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Form\ContactForm;
use Cake\Event\Event;

class ContactController extends AppController
{
public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
		
   
        $this->Auth->allow(['create']);
    }
	

    public function create()
    {
		
        $cform = new ContactForm();
		
		 
		if ($this->request->is('post')) {
			
				
            if ($cform->execute($this->request->data)) {
				
                $this->Flash->success('Thank you for your message!I will get back to you soon.');
				$this->redirect(array('action' => 'create'));
				$this->request->data['_name'] = null;
				$this->request->data['_email'] = null;
				$this->request->data['_message'] = null;
            } else {
                $this->Flash->error('There was a problem submitting your form.');
				
            }
        }
		
		$this->set('cform', $cform);
		
	}
	
	
       
}
	
	
?>