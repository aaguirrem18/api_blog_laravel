<?php

namespace App\src\Domain\Posts;

use App\src\Domain\Posts\ValueObject\Title;
use App\src\Domain\Posts\ValueObject\AuthorId;
use App\src\Domain\Posts\ValueObject\Content;

/**
 * Class Order
 *
 * Represents a drink order
 *
 * @property Title $title
 * @property Content $content
 * @property AuthorId $author
 */
class Post
{
    private $title;
    private $content;
    private $author;

    public function __construct(Title $title, Content $content, AuthorId $author)
    {
        $this->title = $title;
        $this->content = $content;
        $this->author = $author;
    }

    /**
     * @var Title
     */
    public function getTitle(): Title
    {
        return $this->title;
    }

    /**
     * @var Content
     */
    public function getContent(): Content
    {
        return $this->content;
    }

    /**
     * @var AuthorId
     */
    public function getAuthor(): AuthorId
    {
        return $this->author;
    }

    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'content' => $this->content,
            'author_id' => $this->author,
        ];
    }
}
