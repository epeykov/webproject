<?php
namespace App\Controller;
use Cake\Core\Configure;
use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
//Other Methods

 public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
		
        $this->Auth->allow(['logout','register']);
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }
	
    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
			if (!empty($this->request->data['avatar_up']['name']))
		{		
				$file=$this->request->data['avatar_up'];
				$ext = substr(strtolower(strrchr($file['name'], '.')), 1); 
				$arr_ext = array('jpg', 'jpeg', 'gif'); 
				if(in_array($ext, $arr_ext))
					
                      {
							move_uploaded_file($file['tmp_name'], WWW_ROOT . '/img/avatars/' . $file['name']);
							
							$this->request->data['avatar']=$file['name'];
							
							
						}
				
			}
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
		
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
		
        if ($this->request->is(['patch', 'post', 'put'])) {
				if (!empty($this->request->data['avatar_up']['name']))
		{		
				$file=$this->request->data['avatar_up'];
				
				$ext = substr(strtolower(strrchr($file['name'], '.')), 1); 
				$arr_ext = array('jpg', 'jpeg', 'gif'); 
				if(in_array($ext, $arr_ext))
					
                      {
						 
							move_uploaded_file($file['tmp_name'], WWW_ROOT . '/img/avatars/' . $file['name']);
							
							$this->request->data['avatar']=$file['name'];
							
							
						}
				
			}
			
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

	
	
	
	
	
    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
	public function login()
    {
        if ($this->request->is('post')) {
			
    


            $user = $this->Auth->identify();
            if ($user) {
				
				
				//debug($user);
				
				
					$this->Auth->setUser($user);
				
				if ($user['auth']=='imap'){
					
					//return $this->redirect(['action' => 'regedit', $user]);
					$this->register($user);
				}
				
				
                return $this->redirect($this->Auth->redirectUrl());
				
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }
    }
public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }
	
public function register($data){
	//debug($this->request->data);
	
	 $user = $this->Users->newEntity();
	 $data['auth']=null;
	 if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('This is your first login , please fill registration form.'));
				
				return $this->redirect(['action' => 'edit', $user->id]);
            } else {
                $this->Flash->error(__('The user could not be registrated. Please, try again.'));
            }
        }
        //$this->set(compact('user'));
        //$this->set('_serialize', ['user']);
		
	}
	

	
}
 
