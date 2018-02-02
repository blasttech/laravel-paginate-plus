<?php

namespace Blasttech\PaginatePlus\Test;

use Illuminate\Database\Eloquent\Model;
use Blasttech\PaginatePlus\PaginatePlus;
use Blasttech\PaginatePlus\PaginatePlusTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class DummyWithSoftDeletes extends Model implements PaginatePlus
{
    use SoftDeletes, PaginatePlusTrait;

    protected $table = 'dummies';
    protected $guarded = [];
    public $timestamps = false;
}