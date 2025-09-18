<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamPageController extends Controller
{
    protected Team $team;
    protected string $lang;

    /**
     * @param Team $team
     */
    public function __construct(Team $team)
    {
        $this->team = $team;
        $this->lang = app()->getLocale();
    }


    public function index()
    {
        $teams = $this->team->with('media')->withTranslation()->translatedIn($this->lang)->get();

        if ($teams->count() == 0) {
            return redirect()->route('home');
        }

        return view('site.teams.team-page', compact('teams'));
    }

    public function show(Team $team)
    {
        return view('site.teams.team-detail-page', compact('team'));
    }
}
