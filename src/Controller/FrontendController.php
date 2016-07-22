<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

class FrontendController extends AppController
{
    public function beforeRender(Event $event)
    {
        parent::beforeRender($event);
        $categories = $this->getCategories();

        $this->set(array('categories' => $categories->toArray()));
    }

    public function index($categoryId = 1)
    {
        $this->viewBuilder()->layout('frontend');

        if($this->request->is('ajax'))
        {
            $this->viewBuilder()->layout('ajax');
        }
        $products = $this->getProducts($categoryId);

        $this->set(array( 'products' => $products->toArray()));
    }

    public function getProducts($categoryId)
    {
        $product = TableRegistry::get('products');
        return $product->find('all', array('conditions' => array('category_id' => $categoryId)));
    }

    public function updateCart()
    {
        $this->viewBuilder()->layout('ajax');
        $productId = $this->request->data("productId");

        $productTable = TableRegistry::get('products');
        $product = $productTable->get($productId);

        $session = $this->request->session();

        $cartArray = $session->read('cart');
        $cartArray['total'] += $product->price;
        $cartArray['num'] += 1;

        $i = 0;
        $found = false;
        while($i < count($cartArray['products'])){
            if($cartArray['products'][$i]['id'] == $product->id){
                $cartArray['products'][$i]['count'] += 1;
                $found = true;
            }
            $i++;
        }

        if(!$found){
            $cartArray['products'][] = array('id'=>$product->id, 'count'=> 1 );
        }

        $session->write('cart', $cartArray);

        $this->set(array('cart' => $cartArray, '__serialize' => 'cart'));
    }

    private function getCategories()
    {
        $category = TableRegistry::get('categories');
        return $category->find('all');
    }

}
