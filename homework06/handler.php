<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use Classes\VoteHandler;

require_once 'init.php';
/**
 * config db:
 */
$db_name = "school";

if (isset($_POST["vote"]) && $_POST["vote"] !== false) {
    $VoteHandler = new VoteHandler("mysql:dbname=" . $db_name . ";host=127.0.0.1", "root", "");
    $vote = $_POST['vote'];

    $VoteHandler->saveVote($vote);

    unset($_POST['vote']);

    $result = $VoteHandler->getVote();

    foreach ($result as $k)
    {
        echo "Пользователь под номер: " . $k['id'] . "<br />";
        echo "Пользователь предпочитает: " . $k['vote'] . "<br />";
        echo "Дата и время голосования: " . $k['when_added'] . "<br />";
        echo "Браузер пользователя: " . $k['user_agent'] . "<br />";
    };

    $countVote = $VoteHandler->getVoteCount();
    var_dump($countVote);
}

if (isset($_GET['list']) && $_GET['list'] === "vote") {
    $VoteHandler = new VoteHandler("mysql:dbname=" . $db_name . ";host=127.0.0.1", "root", "");

    $countVote = $VoteHandler->getVoteCount();

    echo "Итого голосов: <br />";

    foreach ($countVote as $kkey) {
        $voteName = '';

        if($kkey['vote'] === 'coffee') {
            $voteName = 'Кофе';
            echo "За " . $voteName . " проголосовало: " . $kkey['count(*)'] . "<br />";
        }

        if($kkey['vote'] === 'tea') {
            $voteName = 'Чай';
            echo "За " . $voteName . " проголосовало: " . $kkey['count(*)'] . "<br />";
        }

        if($kkey['vote'] === 'other') {
            echo 'Воздержались от голосования : ' . $kkey['count(*)'] . "<br />";
        }
    }

    $voteResultList = $VoteHandler->getVote();

    echo "<br /><br />";
    
    foreach ($voteResultList as $k)
    {
        echo "Пользователь под номер: " . $k['id'] . "<br />";
        echo "Пользователь предпочитает: " . $k['vote'] . "<br />";
        echo "Дата и время голосования: " . $k['when_added'] . "<br />";
        echo "Браузер пользователя: " . $k['user_agent'] . "<br />";
    };
}