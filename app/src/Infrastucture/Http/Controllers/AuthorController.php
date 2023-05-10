<?php

namespace App\src\Infrastucture\Http\Controllers;

use Illuminate\Http\Request;
use App\src\Domain\Authors\AuthorInterface;
use App\src\Application\Author\CreateAuthor;
use App\src\Application\Author\ValidateAuthor;
use App\src\Infrastucture\Shared\Exception\APIResponse;

class AuthorController extends Controller
{
    use APIResponse;

    private $authorInterface;

    public function __construct(AuthorInterface $authorInterface)
    {
        $this->authorInterface = $authorInterface;
    }

    public function index()
    {
        $authors = $this->authorInterface->all();
        return response()->json($authors);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        try {
            $validate = new ValidateAuthor();
            $validate->execute($data);
        } catch (\Exception $e) {
            return $this->apiResponse(
                'invalid arguments',
                400,
                json_decode($e->getMessage())
            );
        }

        $author = new CreateAuthor($this->authorInterface);
        $author->execute($data['name']);

        return $this->apiResponse('post created', 201);
    }
}
