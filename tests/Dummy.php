<?php

namespace Blasttech\PaginatePlus\Test;

use Blasttech\PaginatePlus\PaginatePlus;
use Blasttech\PaginatePlus\PaginatePlusTrait;
use Illuminate\Database\Eloquent\Model;

class Dummy extends Model implements PaginatePlus
{
    use PaginatePlusTrait;

    public $timestamps = false;
    protected $table = 'dummies';
    protected $guarded = [];
}
