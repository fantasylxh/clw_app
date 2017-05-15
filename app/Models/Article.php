<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Article
 * @package App\Models
 * @mixin \Eloquent
 */
class Article extends Model
{
    /**
     * @var string
     */
    protected $table = 'eshop_article';
}