<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Repository as Repo, User};
use Grit;

class RepositoryController extends Controller
{
    public function show(Request $request, $username, $repo)
    {
      $slug = "$username/$repo";
      $repo = Repo::whereSlug($slug)->firstOrFail();
      $grit = (new Grit('/usr/bin/git'))->workingCopy($repo->path);
      $files = new \DirectoryIterator($repo->path);
      return view('repo.show', compact('repo','grit', 'files'));
    }
}
