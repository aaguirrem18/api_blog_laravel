<?php

namespace App\src\Domain\Authors;

use Illuminate\Database\Eloquent\Model;
use App\src\Domain\Author\ValueObject\Name;

class Author extends Model
{
    private $name;

    public function __construct(Name $name)
    {
        $this->name = $name;
    }

    /**
     * @return Name
     */
    public function getName(): Name
    {
        return $this->name;
    }
    
}
