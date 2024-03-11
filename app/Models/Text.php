<?php

namespace App\Models;

use CodeIgniter\Model;

class Text extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'text';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $allowedFields    = ['id', 'time', 'text', 'channel', 'calldata_id',];
}
