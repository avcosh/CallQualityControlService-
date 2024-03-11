<?php

namespace App\Models;

use CodeIgniter\Model;

class Usedtag extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'usedtags';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $allowedFields    = ['id', 'tag', 'calldata_id'];
}
