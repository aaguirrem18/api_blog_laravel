<?php

namespace App\src\Infrastucture\Persistence\Eloquent;

use Database\Factories\PostFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

final class PostEloquentModel extends Model
{
    use HasFactory;

    protected $table = 'posts';
    protected $primaryKey = 'id';
    protected $fillable = [
        'title',
        'content',
        'author_id',
    ];

    protected static function factory()
    {
        return PostFactory::new();
    }
}
