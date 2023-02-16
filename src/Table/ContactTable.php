<?php
namespace App\Table;

use App\Model\Contact;
use App\Table\Table;

final class ContactTable extends Table{

    protected $table = "contact";
    protected $class = Contact::class;

}