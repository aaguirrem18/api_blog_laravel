<?php

namespace App\src\Infrastucture\Persistence\Eloquent;

use Database\Factories\AuthorFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

final class AuthorEloquentModel extends Model
{
    use HasFactory;

    protected $table = 'authors';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name'
    ];

    protected static function factory()
    {
        return AuthorFactory::new();
    }
}
