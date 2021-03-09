<?php

namespace App\Http\Controllers;

use ParsedownExtra;
use App\MarkdownParser;
use Illuminate\Http\Request;

class ParseMarkdownController extends Controller
{
    public function store()
    {
        request()->validate(['content' => 'required']);

        return (new ParsedownExtra())->text(request('content'));
    }
}
