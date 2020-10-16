<?php
class Cart
{

    public $cart;
    private $expired;

    public function __construct()
    {
        $this->getCart();
        $this->expired = time() + 60 * 60 * 60;
    }

    private function getCart()
    {
        if (!isset($_COOKIE['cart'])) {
            setcookie('cart', '{}', time() + 60 * 60 * 60);
        }
        $this->cart = json_decode($_COOKIE['cart'] ?? '{}', true) ?? [];
    }

    private function saveCart()
    {
        setcookie('cart', json_encode($this->cart ?? '{}'), time() + 60 * 60 * 60);
    }

    public function addProduct($id, $count = 1)
    {
        $this->cart[$id] = (($this->cart[$id] ?? 0) + $count);
        $this->saveCart();
    }
    public function remProduct($id, $count = 1)
    {
        $this->cart[$id] = (($this->cart[$id] ?? 0) - $count);
        if($this->cart[$id] < 1){
            unset($this->cart[$id]);
        }
        $this->saveCart();
    }
    public function delProduct($id)
    {
        unset($this->cart[$id]);
        $this->saveCart();
    }

}