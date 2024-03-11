<?php

namespace App\Models;

use CodeIgniter\Model;

class CrmresultModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'crmresults';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $allowedFields    = ['id', 'tag', 'success_entity', 'success_category', 'success_stage',
	                               'fail_entity', 'fail_category', 'fail_stage', 'timeout',];
}
