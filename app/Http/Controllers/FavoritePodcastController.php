<?php

namespace App\Http\Controllers;

use App\FavoritePodcast;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class FavoritePodcastController extends Controller
{
    public function getFavoritePodcast($id) {
        $results = DB::table('podcasts')
            ->leftJoin('favorite_podcasts', 'podcasts.id', '=', 'favorite_podcasts.podcast_id')
            ->leftJoin('users', 'users.id', '=', 'favorite_podcasts.user_id')
            ->where('users.id', '=', $id)
            ->get(['podcasts.id', 'podcasts.title', 'podcasts.description', 'podcasts.artwork', 'favorite_podcasts.user_id']);
        return \response($results, Response::HTTP_ACCEPTED);
    }

    public  function create(Request $request) {
        $favoriteExist = DB::table('favorite_podcasts')->where([
            ['user_id', '=', $request->input('user_id')],
            ['podcast_id', '=', $request->input('podcast_id')]
        ])->get();

        if(sizeof($favoriteExist) == 0) {
            DB::table('favorite_podcasts')->insertOrIgnore(['podcast_id' => $request->input('podcast_id'), 'user_id' => $request->input('user_id')]);
        }

        return \response(null, Response::HTTP_NO_CONTENT);
    }
    public  function remove(Request $request) {
        DB::table('favorite_podcasts')->where([
            ['user_id', '=', $request->input('user_id')],
            ['podcast_id', '=', $request->input('podcast_id')]
        ])->delete();
        return \response(null, Response::HTTP_NO_CONTENT);
    }
}
