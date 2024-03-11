<?php

namespace App\Models;

use CodeIgniter\Model;

class Calldata extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'calldata';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $allowedFields    = ['id', 'callStartDate', 'callType', 'callDuration', 'crmEntityType',
	                               'crmEntityId', 'recordFileId', 'portalUserId', 'currentCategory', 'currentStage'];
}
