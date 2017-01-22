<?php

namespace Classes;

class VoteHandler
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
     * @param $vote
     */
    public function saveVote($vote = null)
    {
        $errors = [];
        $userAgent = $_SERVER['HTTP_USER_AGENT'];
        $sql = "INSERT " .
                "INTO vote_result (vote, user_agent) " .
                "values (:vote_result, :user_agent)";
        $sth = $this->pdo->prepare($sql);

        if ($vote !== null) {
            $sth->bindParam(":vote_result", $vote);
            $sth->bindParam(":user_agent", $userAgent);
            $sth->execute();
        } else {
            $errors[] = 'Данные голосования указаны не верно';
        }

        if (count($errors) > 0)
        {
            throw new \Exception($errors);
        }
    }

    public function getVote()
    {
        $sql = "SELECT * " .
                "FROM vote_result " .
                "LIMIT 50";
        $sth = $this->pdo->prepare($sql);
        $sth->execute();
        $data = $sth->fetchAll(\PDO::FETCH_ASSOC);
        return $data;
    }

    public function getVoteCount()
    {
        $sql = "SELECT vote, count(*) " .
            "FROM vote_result " .
            "GROUP BY vote";
        $sth = $this->pdo->prepare($sql);
        $sth->execute();
        $data = $sth->fetchAll(\PDO::FETCH_ASSOC);
        return $data;
    }
}