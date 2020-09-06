<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArtworkUploadRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class ArtworkController extends Controller
{
    public function upload(ArtworkUploadRequest $request) {
        $file = $request->file('artwork');

        $name = Str::random(10);
        $url = Storage::putFileAs('artwork', $file, $name . '.' . $file->extension());

        return response(['url' => $url], Response::HTTP_ACCEPTED);
    }
}
