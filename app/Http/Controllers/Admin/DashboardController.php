<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Group;
use App\Http\Controllers\Controller;
use App\Material;
use App\Subject;
use App\User;

class DashboardController extends Controller{

    public function index()
    {
        $notification = auth()->user()->notifications;
        $users = count(User::all());
        $groups = Group::all();
        $materials = count(Material::all());
        $subjects = count(Subject::all());
        $articles = count(Article::all());
        

        return view('admin.dashboard.index', [
            'notifications' => $notification,
            'users' => $users,
            'groups' => $groups,
            'materials' => $materials,
            'subjects' => $subjects,
            'articles' => $articles
        ]);
    }
}