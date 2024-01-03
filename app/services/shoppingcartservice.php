<?php

require_once __DIR__.'/../repositories/shoppingcartrepository.php';
require_once __DIR__.'/../repositories/articlerepository.php';

class ShoppingCartService {

    private $shoppingCartRepository;
    private $articleRepository;

    public function __construct() {
        $this->shoppingCartRepository = new ShoppingCartRepository();
        $this->articleRepository = new ArticleRepository(); 
    }

    public function getAll() {
        return $this->shoppingCartRepository->getAll();
    }

    public function insert($shoppingCart) {
        $this->shoppingCartRepository->insert($shoppingCart);
    }

    public function getArticleById($id) {
        return $this->articleRepository->getArticleById($id);
    }

    public function delete($id) {
        $this->shoppingCartRepository->delete($id);
    }

    public function clearCart() {
        $this->shoppingCartRepository->clearCart();
    }
    public function getShoppingCartById($id) {
        return $this->shoppingCartRepository->getShoppingCartById($id);
    }

}
?>
