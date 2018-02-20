<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Grit;

class Repository extends Model
{
    public function user()
    {
      return $this->belongsTo(User::class);
    }
    
    public function url()
    {
      return url($this->slug);
    }

    public function grit()
    {
      $git = new Grit('/usr/bin/git');
      $repo = $git->workingCopy($this->path);
      return $repo;
    }

    public function branches()
    {
      $grit = $this->grit();
      $output = $grit->branch(['a'=>true]);
      $branches = preg_split("/\r\n|\n|\r/", rtrim($output));
      return array_map([$this, 'trimBranch'], $branches);
    }


    public function trimBranch(string $branch): string
    {
        return ltrim($branch, ' *');
    }
}
