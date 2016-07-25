<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductsTable $Products
 */
class ProductsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Categories']
        ];
        $products = $this->paginate($this->Products);

        $this->set(compact('products'));
        $this->set('_serialize', ['products']);
    }

    /**
     * View method
     *
     * @param string|null $id Product id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => ['Categories']
        ]);

        $this->set('product', $product);
        $this->set('_serialize', ['product']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $product = $this->Products->newEntity();
        if ($this->request->is('post')) {

            if (!empty($this->request->data['image']['name'])) {
                $file = $this->request->data['image'];
                $fileName = strtolower($file['name']);
                $ext = substr(strrchr($fileName, '.'), 0);
                $fileName = substr($fileName, 0, strrpos ($fileName,'.'));
                if (file_exists(WWW_ROOT . '/img/products/' . $fileName.$ext)) {
                    $fileName = $fileName.'_' . time() . "_" . rand(000000, 999999);
                }

                if(move_uploaded_file($file['tmp_name'], WWW_ROOT . '/img/products/' . $fileName.$ext))
                {
                    $this->request->data['image'] =  $fileName.$ext ;
                }
                else
                {
                    $this->Flash->error(__('The product could not be saved, because the image could not loaded. Please, try again.'));
                    return $this->redirect(['action' => 'add']);
                }
            }

            $product = $this->Products->patchEntity($product, $this->request->data);
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The product could not be saved. Please, try again.'));
            }
        }
        $categories = $this->Products->Categories->find('list', ['limit' => 200]);
        $this->set(compact('product', 'categories'));
        $this->set('_serialize', ['product']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Product id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {

            if (!empty($this->request->data['image']['name'])) {
                $file = $this->request->data['image'];
                $fileName = strtolower($file['name']);
                $ext = substr(strrchr($fileName, '.'), 0);
                $fileName = substr($fileName, 0, strrpos ($fileName,'.'));

                unlink( WWW_ROOT . '/img/products/' . $product->image);

                if (file_exists(WWW_ROOT . '/img/products/' . $fileName.$ext)) {
                    $fileName = $fileName.'_' . time() . "_" . rand(000000, 999999);
                }

                if(move_uploaded_file($file['tmp_name'], WWW_ROOT . '/img/products/' . $fileName.$ext))
                {
                    $this->request->data['image'] =  $fileName.$ext ;
                }
                else
                {
                    $this->Flash->error(__('The product could not be saved, because the image could not loaded. Please, try again.'));
                    return $this->redirect(['action' => 'add']);
                }
            }

            $product = $this->Products->patchEntity($product, $this->request->data);
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The product could not be saved. Please, try again.'));
            }
        }
        $categories = $this->Products->Categories->find('list', ['limit' => 200]);
        $this->set(compact('product', 'categories'));
        $this->set('_serialize', ['product']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Product id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $product = $this->Products->get($id);
        if ($this->Products->delete($product)) {
            unlink( WWW_ROOT . '/img/products/' . $product->image);
            $this->Flash->success(__('The product has been deleted.'));
        } else {
            $this->Flash->error(__('The product could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
