<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

class FrontendController extends AppController
{
    public function initialize()
    {
        parent::initialize();
    }

    public function beforeFilter(Event $event)
    {
        $this->Auth->allow();
    }

    public function beforeRender(Event $event)
    {
        parent::beforeRender($event);

        $category = TableRegistry::get('categories');
        $categories = $category->find('all');
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

        $this->set(array('categoryId'=>$categoryId, 'products' => $products->toArray()));
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

        $productPos = $this->getProductPosInCart($cartArray, $productId);

        if($productPos < 0){
            $cartArray['products'][] = array('product'=>$product, 'count'=> 1 );
            $cartArray['num'] += 1;

            $this->set(array('cart' => array('updated'=>true,'total'=>$cartArray['total'],'num'=>$cartArray['num']),
                '__serialize' => 'cart'));
        }
        else{
            $this->set(array('cart' => array('updated'=>false),'__serialize' => 'cart'));
        }

        $session->write('cart', $cartArray);
    }

    public function updateProductCart()
    {
        $this->viewBuilder()->layout('ajax');

        $productId = $this->request->data("productId");
        $productCount = $this->request->data("productCount");

        $session = $this->request->session();
        $cartArray = $session->read('cart');

        $productPos = $this->getProductPosInCart($cartArray, $productId);

        $cartArray['products'][$productPos]['count'] = $productCount;
        $cartArray['total'] = $this->calculateCartTotalPrice($cartArray);

        $session->write('cart', $cartArray);

        $this->set(array('price' => array('total'=>$cartArray['total'], 'productTotal'=>($productCount * $cartArray['products'][$productPos]['product']->price)),
            '__serialize' => 'price'));
    }

    public function deleteProductFromCart()
    {
        $this->viewBuilder()->layout('ajax');

        $productId = $this->request->data("productId");

        $session = $this->request->session();
        $cartArray = $session->read('cart');

        $productPos = $this->getProductPosInCart($cartArray, $productId);

        array_splice($cartArray['products'],$productPos,1);
        if($cartArray['num'] > 0)
            $cartArray['num'] -= 1;
        $cartArray['total'] = $this->calculateCartTotalPrice($cartArray);
        $session->write('cart', $cartArray);

        $this->set(array('cart' => array('updated'=>true,'total'=>$cartArray['total'],'num'=>$cartArray['num']),
            '__serialize' => 'cart'));
    }

    public function shoppingCart()
    {
        $this->viewBuilder()->layout('frontend');

        $session = $this->request->session();
        $cartArray = $session->read('cart');

        $this->set(array('products' =>$cartArray['products'], '__serialize' => 'products'));
    }

    public function viewProduct($productId){
        $this->viewBuilder()->layout('frontend');
        $product = TableRegistry::get('products');
        $product = $product->get($productId, array('contain' => ['Categories']));

        $this->set(array("product" => $product));
    }

    private function calculateCartTotalPrice($cart){
        $total = 0;
        foreach ($cart['products'] as $product) {
            $total += $product['product']->price * $product['count'];
        }
        return $total;
    }

    private function getProductPosInCart($cart, $id){
        $i = 0;
        while($i < count($cart['products'])){
            if($cart['products'][$i]['product']->id == $id){
                return $i;
            }
            $i++;
        }
        return -1;
    }

}
