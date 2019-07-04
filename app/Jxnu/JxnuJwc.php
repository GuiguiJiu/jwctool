<?php

namespace App\Jxnu;

use Illuminate\Support\Facades\DB;

class JxnuJwc
{
    use JxnuLogin, JxnuSpider;

    protected $connection = 'mysql_jwc';

}
