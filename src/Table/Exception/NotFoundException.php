<?php
namespace App\Table\Exception;

use Exception;

class NotFoundException extends Exception {

    public function __construct(string $table, $id)
    {
        $this->message =" Aucun enregistrement ne correspond";
    }
}
