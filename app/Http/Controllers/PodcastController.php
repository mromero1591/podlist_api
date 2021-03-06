<?php

namespace App\Http\Controllers;

use App\Http\Requests\PodcastCreateRequest;
use App\Http\Resources\PodcastResource;
use App\Podcast;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class PodcastController extends Controller
{
    public function index()
    {
        return Podcast::all();
    }

    public function show($id) {
        return new PodcastResource(Podcast::find($id));
    }

    public function store(PodcastCreateRequest $request) {
        $podcast = Podcast::create($request->only('title', 'description', 'artwork'));

        return \response($podcast, Response::HTTP_CREATED);
    }

    public  function  update(PodcastCreateRequest $request, $id) {
        $podcast = Podcast::find($id);
         $podcast->update($request->only('title', 'description', 'artwork'));

         return \response($podcast, Response::HTTP_ACCEPTED);

    }

    public function destroy($id) {
        Podcast::destroy($id);
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
