<?php

namespace App\src\Application\Author;

use Illuminate\Support\Facades\Validator;

final class ValidateAuthor
{
    public function execute(array $data): array {

        $validator = Validator::make($data, [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            throw new \Exception(json_encode($validator->errors()->toArray()));
        }
        
        return [];
    }

}
