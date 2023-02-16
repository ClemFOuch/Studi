<?php
namespace App\Validators;

use App\Table\UserTable;
use App\Validators\AbstractValidator;

class UserValidator extends AbstractValidator {

    public function __construct(array $data, UserTable $table)
    {
        parent::__construct($data);
        $this->validator->rule('required', ['username', 'usersurname', 'login', 'password', 'usersociety']);
        $this->validator->rule('lengthBetween', ['username', 'usersurname', 'login', 'password', 'usersociety'], 3, 280);
    }
}