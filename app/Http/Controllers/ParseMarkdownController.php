<?php

namespace App\Http\Controllers;

use App\MarkdownParser;
use Illuminate\Http\Request;

class ParseMarkdownController extends Controller
{
    public function store()
    {
        request()->validate(['content' => 'required']);

        $parser = new MarkdownParser(config('app.github_personal_access_token'));

        return $parser->parse(request('content'));
    }
}
