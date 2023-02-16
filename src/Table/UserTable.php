<?php
namespace App\Table;

use PDO;
use Exception;
use App\Model\User;
use App\Table\Table;
use App\Table\Exception\NotFoundException;

final class UserTable extends Table{

    protected $table = "users";
    protected $class = User::class;

    public function findByLogin (string $login)
    {
        $query = $this->pdo->prepare('SELECT * FROM ' . $this->table. ' WHERE login = :login');
        $query->execute(['login' => $login]);
        $query->setFetchMode(PDO::FETCH_CLASS, $this->class);
        $result = $query->fetch();
        if($result === false){
            throw new NotFoundException($this->table, $login);
        }
        return $result;
    }
}