<?php

namespace Blasttech\PaginatePlus\Test;

use Blasttech\PaginatePlus\PaginatePlus;
use Blasttech\PaginatePlus\PaginatePlusTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DummyWithSoftDeletes extends Model implements PaginatePlus
{
    use SoftDeletes;
    use PaginatePlusTrait;

    protected $table = 'dummies';
    protected $guarded = [];
    public $timestamps = false;
}
