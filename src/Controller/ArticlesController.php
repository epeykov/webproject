<?php
namespace App\Controller;
use Cake\Event\Event;
use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\ORM\TableRegistry;
use App\Controller\DateTime;


/**
 * Articles Controller
 *
 * @property \App\Model\Table\ArticlesTable $Articles
 */
class ArticlesController extends AppController
{
public $helpers = ['CkEditor.Ck'];
public function initialize()
    {
        parent::initialize();
		 $this->loadComponent('Search.Prg', [
        // This is default config. You can modify "actions" as needed to make
        // the PRG component work only for specified methods.
        'actions' => ['index', 'lookup']
    ]);

        $this->loadComponent('Flash'); // Include the FlashComponent
		 // Set the layout

	
    }
public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
		// Load the Type using the 'Elastic' provider.
   
        $this->Auth->allow(['index','view','like','display','search','catview']);
    }
 
 /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
	 
	

	 
	 
	 
    public function index()
    {
       
$query = $this->Articles->find('all')->contain(['Users'])->order(['Articles.created' => 'DESC']);
    $this->set('articles', $this->paginate($query,['maxLimit' => '3']));
 $query_mv = $this->Articles->find('all')->contain(['Users'])->order(['Articles.viewcount' => 'DESC'])->limit(5);    
        $this->set('articles_lh',$query_mv);
		$this->set('_serialize', ['articles_lh']);
		$this->set('_serialize', ['articles']);
		}

    /**
     * View method
     *
     * @param string|null $id Article id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
	 public function catview($id=null){
		if (is_null($id))
			{return $this->redirect(['action' => 'index']);} 
				else
				{
					$this->loadModel('Categories');
					$articles = $this->Articles->find()->where(['Articles.category_id'=>$id])->contain(['Comments','Users'])
        ->where(['title IS NOT' => null])
		->order(['Articles.created' => 'DESC']);
					$this->set('articles', $this->paginate($articles,['maxLimit' => '3']));
					$this->set('category',$this->Categories->get($id));	
				}
	}
	 
    public function view($id = null)
    {   
			    $this->viewBuilder()->layout('articles');
			if (is_null($id))
			{return $this->redirect(['action' => 'index']);} 
				else
				{
        $article = $this->Articles->get($id, [
            'contain' => ['Comments','Comments.Users','Categories','Images'],
			'order' => ['Articles.created' => 'DESC'] ]);
		
		
	

$comments = $this->Articles->Comments->find('threaded', [
	'conditions' => ['Comments.article_id' => $id],
	'contain' => ['Users'],
    'order' => ['Comments.created' => 'DESC'],
	'limit' => 10000])->toArray();
	
	
function 	tree ($parent=null,$tmpModel){
	
	$arr= array();
	$categories = $tmpModel->find('all',[
	'conditions' => ['Categories.id' => $parent],
	
	] )->toArray();
	
	foreach ($categories as $key => $category ){
		
		$arr[$category->id]['title'] = $category->name;
		$arr[$category->id]['parents'] = tree($category->parent_id,$tmpModel);
		
	}
	return $arr;
	
	
}
function is_Crowler($request){
	
if (isset($request) && preg_match("'/bot|crawl|slurp|spider/i'",$request)){
	return 1;
}
else{
	return 0;
}	
	
}
$tmpModel=$this->Articles->Categories;
$categories=tree($article->category_id,$tmpModel);
$newComments=array_slice($comments, 0, 10);
$lastComments=array_slice($comments,10);
// Part from the add-action from Comments
$comment = $this->Articles->Comments->newEntity();
		
if ($this->request->is('ajax')) {
	
             Configure::write('debug', 0);
			
			$comment = $this->Articles->Comments->patchEntity($comment, $this->request->data);
			
			$comment->user_id = $this->Auth->user('id');
			
			$comment->article_id=$article->id;
		
            if ($this->Articles->Comments->save($comment)) {
				//$this->autoRender = false;
			
	$comments = $this->Articles->Comments->find('threaded', [
	'conditions' => ['Comments.article_id' => $id],
	'contain' => ['Users'],
    'order' => ['Comments.created' => 'DESC'],
	'limit' => 10000])->toArray();
	$newComments=array_slice($comments, 0, 10);
	$lastComments=array_slice($comments,10);
  	$this->Articles->updateAll(
        ['comm_count'=>count($comments)], // fields
        ['id' => $id]); // conditions

				$this->set('comments',$comments);
				
				$this->set('newComments', $newComments);
		$this->set('lastComments', $lastComments);
		
		
        $this->set('article', $article);
        $this->set('_serialize', ['article']);
		$this->render('comments','ajax');
				
                //$this->Flash->success(__('The comment has been saved.'));
					
					
                //return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The comment could not be saved. Please, try again.'));
            }
			
        }
	    


			
		if (!is_Crowler(($this->request->env('HTTP_USER_AGENT')))){
			
			if ($this->request->session()->check('art_read.'.$article->id)===false){
			$this->Articles->updateAll(
        ['viewcount'=>$article->viewcount+ 1], // fields
        ['id' => $id]); // conditions
		$this->request->session()->write('art_read.'.$article->id,true);
			}
			
		}	
		$this->set('newComments', $newComments);
		$this->set('lastComments', $lastComments);
        $this->set('article', $article);
		$this->set('categories',$categories);
		
		
        $this->set('_serialize', ['article']);
	}
	
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {	
        $article = $this->Articles->newEntity();
        if ($this->request->is('post')) {
			  
			if (!empty($this->request->data['image_upload']['name']))
		{		
				$file=$this->request->data['image_upload'];
				$ext = substr(strtolower(strrchr($file['name'], '.')), 1); 
				$arr_ext = array('jpg', 'jpeg', 'gif'); 
				if(in_array($ext, $arr_ext))
					
                      {
							move_uploaded_file($file['tmp_name'], WWW_ROOT . '/img/articles/' . $file['name']);
							
							$this->request->data['img']=$file['name'];
							
							
						}
				
			}
			
			$article->user_id = $this->Auth->user('id');
            $article = $this->Articles->patchEntity($article, $this->request->data);
			
            if ($this->Articles->save($article)) {
                $this->Flash->success(__('The article has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The article could not be saved. Please, try again.'));
            }
        }
		$this->set('article', $article);

		// Just added the categories list to be able to choose
        // one category for an article
        $categories = $this->Articles->Categories->find('treeList');
		
		
		
		$this->set(compact('comments'));
         $this->set(compact('categories'));

    }

    /**
     * Edit method
     *
     * @param string|null $id Article id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $article = $this->Articles->get($id, [
            'contain' => ['Images']
        ]);
		$imagesTable=TableRegistry::get('Images');
		$images=$imagesTable->newEntity();
        if ($this->request->is(['patch', 'post', 'put'])) {
			if (!empty($this->request->data['image_upload']['name'])){
				$file=$this->request->data['image_upload'];
				$ext = substr(strtolower(strrchr($file['name'], '.')), 1); 
				$arr_ext = array('jpg', 'jpeg', 'gif'); 
				if(in_array($ext, $arr_ext))
					
                      {
							move_uploaded_file($file['tmp_name'], WWW_ROOT . '/img/articles/' . $file['name']);
							
						
							$images->img=$file['name'];
							$images->article_id=$id;
							if ($imagesTable->save($images)) {
     $this->Flash->success(__('The article image has been saved.'));
}
						}
						else {
                $this->Flash->error(__('The image could not be saved. Please, try again.'));
            }
				
			}
			
			
			
			
			if (!empty($this->request->data['head_image_upload']['name']))
		{		
				$file=$this->request->data['head_image_upload'];
				$ext = substr(strtolower(strrchr($file['name'], '.')), 1); 
				$arr_ext = array('jpg', 'jpeg', 'gif'); 
				if(in_array($ext, $arr_ext))
					
                      {
							move_uploaded_file($file['tmp_name'], WWW_ROOT . '/img/articles/' . $file['name']);
							
							$this->request->data['img']=$file['name'];
							
							
						}
				
			}
			
			$article->user_id = $this->Auth->user('id');
            $article = $this->Articles->patchEntity($article, $this->request->data);
			
			
			
			
            if ($this->Articles->save($article)) {
			

                $this->Flash->success(__('The article has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The article could not be saved. Please, try again.'));
            }
        }
		
		
		  $this->set('article', $article);

        // Just added the categories list to be able to choose
        // one category for an article
        $categories = $this->Articles->Categories->find('treeList');
        $this->set(compact('categories'));

    }

    /**
     * Delete method
     *
     * @param string|null $id Article id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $article = $this->Articles->get($id);
        if ($this->Articles->delete($article)) {
            $this->Flash->success(__('The article has been deleted.'));
        } else {
            $this->Flash->error(__('The article could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
	
	
	
	public function search(){
		//$this->request->allowMethod(['post']);
		//debug($this->request->data);
		$query = $this->Articles
        // Use the plugins 'search' custom finder and pass in the
        // processed query params
        ->find('search', ['search' => $this->request->data])
        // You can add extra things to the query if you need to
        ->contain(['Comments','Users'])
        ->where(['title IS NOT' => null])
		->order(['Articles.created' => 'DESC']);
		//->where(['OR' => ['title LIKE' =>$art, 'body LIKE' => $art]]);
		$this->set('articles', $this->paginate($query,['maxLimit' => '3']));
		

		
		
	}
	public function like( $id= null) {
		
		if ($this->request->is('ajax')){
			
		 $article = $this->Articles->get($id);
		
		if ($this->request->session()->check('art_liked.'.$article->id)===false){
			$this->Articles->updateAll(
        ['likes_count'=>$article->likes_count+ 1], // fields
        ['id' => $id]); // conditions
		$this->request->session()->write('art_liked.'.$article->id,true);
			}
			
		
		$article = $this->Articles->get($id);
        $this->set('article', $article);
		$this->render('likes','ajax');
	}
	
	}
}
