<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhabricatorUser extends Model
{
    protected $table = 'phabricator_user';
    protected $guarded = [];
}
