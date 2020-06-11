<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Comment;
use App\Group;
use App\Http\Controllers\Controller;
use App\Material;
use App\Subject;
use App\User;

class DashboardController extends Controller{

    public function index()
    {
        $users = count(User::all());
        $groups = count(Group::all());
        $materials = count(Material::all());
        $subjects = count(Subject::all());
        $articles = count(Article::all());
        $comments = count(Comment::all());
        

        return view('admin.dashboard.index', [
            'users' => $users,
            'groups' => $groups,
            'materials' => $materials,
            'subjects' => $subjects,
            'articles' => $articles,
            'comments' => $comments
        ]);
    }
}