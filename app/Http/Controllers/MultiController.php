<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MultiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = PhabricatorUser::select('phabricator_phrequent.phrequent_usertime phrequent', 
        DB::raw('project_name.`name` AS project, user.userName AS `user`'))
            ->leftJoin('phabricator_maniphest.maniphest_task', function($maniphest) {
            $maniphest->on('maniphest.phid', '=', 'phrequent.objectPHID')
            })
            ->leftJoin('phabricator_user.user', function($user) {
            $user->on('phrequent.userPHID', '=', 'user.phid')   
            })
            ->leftJoin('phabricator_project.edge', function($project) {
            $project->on('project.dst', '=', 'maniphest.phid');
            })
            ->leftJoin'phabricator_project.project', function($project_name) {
            $project_name->on('project_name.phid', '=', 'project.src')
            })
            ->Group by('user.userName', 'project')
            ->ORDER BY ('project')
            ->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
