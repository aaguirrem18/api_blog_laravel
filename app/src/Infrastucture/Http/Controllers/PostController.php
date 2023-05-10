<?php

namespace App\src\Infrastucture\Http\Controllers;

use Illuminate\Http\Request;
use App\src\Application\Post\CreatePost;
use App\src\Application\Post\GetAllPosts;
use App\src\Application\Post\ValidatePost;
use App\src\Domain\Posts\Exception\InvalidPostArgument;
use App\src\Infrastucture\Shared\Exception\APIResponse;
use App\src\Infrastucture\Persistence\Eloquent\PostRepository;

class PostController extends Controller
{
    use APIResponse;

    private $postRepository;
    
    public function __construct()
    {
        $this->postRepository = new PostRepository;
    }

    public function index()
    {
        $posts =  new GetAllPosts($this->postRepository);
        return response()->json($posts);
    }

    public function store(Request $request)
    {
        $data = $request->all();
    
        try {
            $validate = new ValidatePost();
            $validate->execute($data);
        } catch (\Exception $e) {
            return $this->apiResponse('invalid arguments', 400, json_decode($e->getMessage()));
        }

        $post = new CreatePost($this->postRepository);
        
        $post->execute(
            $data['title'],
            $data['content'],
            $data['author_id'],
        );

        return $this->apiResponse('post created', 201);
    }
}
