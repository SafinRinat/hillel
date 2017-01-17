<?php

namespace MyClasses;

class SmallORM
{
    /**
     * @var \PDO
     */
    private $pdo;

    public function __construct($dsn, $username = "", $password = "")
    {
        try {
            $this->pdo = new \PDO($dsn, $username, $password);
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $ex) {
            echo "<b>Database connection error</b>: " . $ex->getMessage();
        }
    }

    public function saveArticle(BaseArticle $article)
    {
        $sql = 'insert into article (title, date_published, content, price) values (:title, :date_published, :content, :price)';

        $sth = $this->pdo->prepare($sql);

        $errors = [];

        $title = $article->getTitle();
        if (strlen($title) > 200) {
            $errors[] = "Title is too big!";
        }
        if (strlen($title) == 0) {
            $errors[] = "Title is empty";
        }
        $sth->bindParam(":title", $title);

        $datePub = $article->getDatePublished();
        $datePubStr = $datePub->format("Y-m-d H:i:s");
        $sth->bindParam(":date_published", $datePubStr);


        $content = $article->getContent();
        if (strlen($content) <= 0) {
            $errors[] = "Content is empty";
        }
        $sth->bindParam(":content", $content);

        $price = $article->getPrice();
        if (is_numeric($price) == false) {
            $errors[] = "Price is wrong!";
        }
        $sth->bindParam(":price", $price);

        if (count($errors) > 0)
        {
            throw new ArticleWrongFieldsException($errors);
        }

        $sth->execute();
    }

    public function getArticleById($id)
    {
        $sql = "select * from article where id = :id";

        $sth = $this->pdo->prepare($sql);
        $sth->bindParam(":id", $id, \PDO::PARAM_INT);
        $sth->execute();

        $data = $sth->fetchAll(\PDO::FETCH_ASSOC);

        $datePub = new \DateTime($data[0]["date_published"]);
        $article = new Article($data[0]["title"], $datePub, $data[0]["content"]);

        return $article;
    }

    public function getAllArticles()
    {

    }
}