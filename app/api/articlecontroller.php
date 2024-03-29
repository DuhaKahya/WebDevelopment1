<?php

require_once __DIR__.'/../services/articleservice.php';
require_once __DIR__.'/../models/article.php';

class ArticleController
{

    private $articleService;

    // initialize services
    function __construct()
    {
        $this->articleService = new ArticleService();
    }

    // router maps this to /api/article automatically
    public function index()
    {

        // Respond to a GET request to /api/article
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            // return all articles in the database as JSON
            $articles = $this->articleService->getAll();
            $json = json_encode($articles);
            header("Content-type: application/json");
            echo $json;
        }
        
    }

    public function ajax(){
        require __DIR__ . '/../views/articlesAJAX.php';

        
        // Respond to a POST request to /api/article
        if ($_SERVER["REQUEST_METHOD"] == 'POST') {

            // read JSON from the request, convert it to an article object
            // and have the service insert the article into the database
            $json = file_get_contents('php://input');
            $object = json_decode($json);

    
            $article = new Article();
            $article->setTitle($object->title);
            $article->setDescription($object->description);
            $article->setPrice($object->price);
            $article->setStock($object->stock);
            $article->setCategory($object->category);

            $this->articleService->insert($article);

        }
    }

}
?>