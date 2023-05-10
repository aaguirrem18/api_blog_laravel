<?php

namespace App\src\Application\Post;

use Illuminate\Support\Facades\Validator;

final class ValidatePost
{
    public function execute(array $data): array {

        $validator = Validator::make($data, [
            'title' => 'required',
            'content' => 'required',
            'author_id' => 'required|exists:authors,id',
        ]);

        if ($validator->fails()) {
            throw new \Exception(json_encode($validator->errors()->toArray()));
        }
        
        return [];
    }

}
