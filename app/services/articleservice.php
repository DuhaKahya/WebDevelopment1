<?php

require_once __DIR__.'/../repositories/articlerepository.php';
class ArticleService {

    private $articleRepository;

    public function __construct() {
        $this->articleRepository = new ArticleRepository();
    }

    public function getAll() {
        return $this->articleRepository->getAll();
    }

    public function insert($article) {
        $this->articleRepository->insert($article);
    }
    

}