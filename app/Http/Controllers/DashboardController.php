<?php

namespace App\Http\Controllers;

use Barryvanveen\Lastfm\Constants;
use Barryvanveen\Lastfm\Lastfm;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    protected Lastfm $lastFm;

    /**
     * DashboardController constructor.
     * @param Lastfm $lastfm
     */
    public function __construct(Lastfm $lastfm)
    {
        $this->lastFm = $lastfm;
    }

    protected function fetchLastFmInfo($user)
    {
    }

    protected function index()
    {
        if (Auth::user()->lastfm_user != null) {
            $lastfmUser = $this->fetchLastFmInfo(Auth::user()->lastfm_user);
        }

        $lastfmUser = [
            'scrobbles' => '13.300',
            'lovedTracks' => 150,
            'listeningTime' => '9h',
            'artists' => 82,
            'tracks' => 110
        ];
        return view('dashboard.home', [
            'lastfmUser' => $lastfmUser
        ]);
    }

    protected function settings()
    {
        return view('dashboard.settings');
    }
}
