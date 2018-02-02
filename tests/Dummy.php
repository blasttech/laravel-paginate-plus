<?php

namespace Blasttech\PaginatePlus\Test;

use Illuminate\Database\Eloquent\Model;
use Blasttech\PaginatePlus\PaginatePlus;
use Blasttech\PaginatePlus\PaginatePlusTrait;

class Dummy extends Model implements PaginatePlus
{
    use PaginatePlusTrait;

    public $timestamps = false;
    protected $table = 'dummies';
    protected $guarded = [];
}
