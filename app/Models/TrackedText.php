<?php

namespace App\Models;

use CodeIgniter\Model;

class TrackedText extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'trackedtexts';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $allowedFields    = ['id', 'trackedtext', 'who', 'tag'];
}
