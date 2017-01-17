<?php
namespace FolderClasses;
/**
 * Помните почему у нас 2 раза одна и тажа строка создавалась на уроке ?
 * Это было потому, что Chrome (браузер которым мы пользовались),
 * работает по такой логике:сначало формирует запрос типа GET,
 * чтобы выполнить наш php файла потом он хочет получить информацию о том есть ли на нашем сайте файлик favicon.ico (иконка для сайта)
 * и делает запрос типа HEAD, запрос типа HEAD аналогичен запросу типа GET, только данные в ответ не отправляются,
 * только информация о наличии файла на сервере. А PHP воспринимал это как запрос и выполнял второй раз скрипт.
 * Поэтому 2 раза записывался article в базу. Вообщем, в нашем случае с простыми файлами решается проверкой:
 * if ($_SERVER[“REQUEST_METHOD”] !== “GET”) exit(); Если запрос на наш скрипт был сделан не методом GET то
 * заввершить работу скрипта.Отправлено:ЧтОт:Igor
 *
 * Домашнее задание.
 * Создать свой класс по примеру класса SmallORM и реализовать в нем:методы для сохранения всех ваших обьектов класса
 * (товар, товар с акцией постоянной, товар с временной акцией).
 * По факту у вас получится 3 метода. Где в качестве аргумента метода вы передаете обьект соответствующего класса,
 * например: $product = new Product(…..);$orm->saveProduct($product);и так для каждого.
 * Кто сможет сделать 1 метод для всех типов классов (но только для них, чтобы я туда не смог передать обьект левого
 * класса), тот будет SuperStar и +1 к карме.
 *
 *
 *
 *
 *
 *
 Домашнее задание.
Создать свой класс по примеру класса SmallORM и реализовать в нем:
методы для сохранения всех ваших обьектов класса (товар, товар с акцией постоянной, товар с временной акцией).
По факту у вас получится 3 метода. Где в качестве аргумента метода вы передаете обьект соответствующего класса, например:
$product = new Product(…..);
$orm->saveProduct($product);
и так для каждого.

Кто сможет сделать 1 метод для всех типов классов (но только для них, чтобы я туда не смог передать обьект левого класса),
тот будет SuperStar и +1 к карме.

Для тех кого сегодня не было.
Из нового:
1. Рассмотрели фильтрацию данных. Функции is_int, is_float, is_numeric, и.т.д. Функцию filter_val
2. Рассматривали и применяли Exception-ы, создавали свой exception, добавляли фильтрацию данных и обработку ошибок.

Домашнее задание:
1. Необходимо составить техническое задание для своего интернет магазина.
Для начала делаете что-то типа оглавления.
Например:
1. Товар. Из чего он состоит. Какие виды товара бывают.
2. Категории товаров. Подкатегории товаров. Мжет ли находится товар в нескольких категориях одновременно.
и.т.д.
Фактически вы должны будете создать развернутое задание. Каждый свое. Потом отправите мне я подредактирую что-то или добавлю.

Вторая часть домашнего задания.

Необходимо сделать голосовалку.
Например:

Кофе или чай ?
 *  кофе
 *  чай
 *  воздержался
[ Проголосовать ]

При нажатии на кнопку проголосовать вам нужно записать это занение в базу данных.

Дальше, вы делаете скрипт который выводит результат голосования:

Кофе - 5 голосов
Чай - 3 голоса
Воздержались - 2 голоса

Да и еще, в рамках первой части домашнего задания. Подберите простой html шаблон для своего будущего интернет магазина.
Разберитесь в нем и.т.д.
 */
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
     * @param BaseProduct $product
     * @param ProductSale|null $count
     * @param ProductPeriod|null
     * @param ProductPeriod|null
     */
    public function saveProduct($product = null)
    {
//        var_dump($product);

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

        if($product !== null)
        {
            $model = $product->getName();
            if (strlen($model) <= 0) {
                $errors[] = "Model name is empty!!";
            }

            $price = $product->getPrice();

            if (strlen($price) == 0)
            {
                $errors[] = "Enter price for this item!";
            }

            if($product instanceof ProductSale)
            {
                $count = $product->getCount();

                if ($count !== false)
                {
                    if(strlen($count) === 0)
                    {
                        $errors[] = "Please enter item count!";
                    }
                }
            }

            if($product instanceof ProductPeriod)
            {
                $begDate = $product->getBegDate();
//                $begDate = $begDate->format("Y-m-d");

                $endDate = $product->getEndDate();
//                $endDate = $endDate->format("Y-m-d");

            }
        }
        else {
            $errors[] = 'Error: Class is not valid';
        }

        if (count($errors) > 0)
        {
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

        $data = $sth->fetchAll(\PDO::FETCH_ASSOC);

        var_dump($data);

//        $datePub = new \DateTime($data[0]["date_published"]);
//        $article = new Article($data[0]["title"], $datePub, $data[0]["content"]);
//
//        return $article;
    }

    public function getAllArticles()
    {

    }
}