<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class orders
 * @package App\Models
 * @version June 30, 2019, 6:40 pm UTC
 *
 * @property string ticket_id
 * @property string name
 * @property string nickname
 * @property string email
 * @property string sender_name
 * @property string payment_slip
 * @property boolean payment_confirm
 * @property string|\Carbon\Carbon payment_confirm_date
 * @property integer payment_confirm_admin
 * @property integer ip_address
 */
class orders extends Model
{
    use SoftDeletes;

    public $table = 'orders';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'hash',
        'username',
        'ticket_id',
        'email',
        'phone',
        'people',
        'bucin',
        'shift',
        'extra',
        'day',
        'total',
        'keterangan',
        'sender_name',
        'payment_slip',
        'payment_confirm',
        'payment_confirm_date',
        'payment_confirm_admin',
        'ip_address'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'nickname' => 'string',
        'email' => 'string',
        'sender_name' => 'string',
        'payment_slip' => 'string',
        'payment_confirm' => 'integer',
        'payment_confirm_date' => 'datetime',
        'payment_confirm_admin' => 'integer',
        'ip_address' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'nickname' => 'required',
        'email' => 'required',
        'sender_name' => 'required',
        'payment_slip' => 'required'
    ];
}
