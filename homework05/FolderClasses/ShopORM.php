<?php
namespace FolderClasses;
class ShopORM
{
    /**
     * @var \PDO
     */
    private $pdo;

    public function __construct($dsn, $username = "root", $password = "")
    {
        try {
            $this->pdo = new \PDO($dsn, $username, $password);
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $ex) {
            echo "<b>Database connection error</b>: " . $ex->getMessage();
        }
    }

    /**
     * @param $product \stdClass
     */
    public function saveProduct($product = null)
    {
        $model = null;
        $count = null;
        $price = null;
        $begDate = null;
        $endDate = null;
//        instanceof
        $sql = "INSERT " .
            "INTO product (model, price, count_items, beg_date, end_date) " .
            "values (:model, :price,:count_items, :beg_date, :end_date)";

        $sth = $this->pdo->prepare($sql);

        $errors = [];

        if ($product !== null) {
            $model = $product->getName();
            if (strlen($model) <= 0) {
                $errors[] = "Model name is empty!!";
            }

            $price = $product->getPrice();

            if (strlen($price) == 0) {
                $errors[] = "Enter price for this item!";
            }

            if ($product instanceof ProductSale) {
                $count = $product->getCount();

                if ($count !== false) {
                    if (strlen($count) === 0) {
                        $errors[] = "Please enter item count!";
                    }
                }
            }

            if ($product instanceof ProductPeriod) {
                $begDate = $product->getBegDate();
                $endDate = $product->getEndDate();
            }
        } else {
            $errors[] = 'Error: Class is not valid';
        }

        if (count($errors) > 0) {
            throw new ProductWrongFieldsException($errors);
        }

        $sth->bindParam(":model", $model);
        $sth->bindParam(":count_items", $count);
        $sth->bindParam(":price", $price);
        $sth->bindParam(":beg_date", $begDate);
        $sth->bindParam(":end_date", $endDate);

        $sth->execute();
    }

    public function getProduct($id)
    {
        $sql = "SELECT * FROM product WHERE id = :id";

        $sth = $this->pdo->prepare($sql);
        $sth->bindParam(":id", $id, \PDO::PARAM_INT);
        $sth->execute();
        $offset = 0;
        $data = $sth->fetchAll(\PDO::FETCH_ASSOC);

        try {
            if (error_reporting() == 0) {
                return $data[0];
            }
            throw new \InvalidArgumentException("Notice: Undefined offset: " . $offset);

        } catch (\InvalidArgumentException $e) {
            echo $e->getMessage() . "<br />";
            return false;
        }
    }

    public function getAllProduct()
    {
        $sql = "SELECT * FROM product ORDER BY id ASC LIMIT 50";
        $sth = $this->pdo->prepare($sql);
        $sth->execute();
        $data = $sth->fetchAll(\PDO::FETCH_ASSOC);
        return $data;
    }

    public function setVote($vote)
    {
        $sql = "INSERT INTO vote_result (vote, user_agent) VALUES (:vote, :user_agent)";
        $sth = $this->pdo->prepare($sql);
        $sth = $this->pdo->prepare($sql);
    }

}