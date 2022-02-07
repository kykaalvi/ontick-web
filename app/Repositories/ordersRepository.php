<?php

namespace App\Repositories;

use App\Models\orders;
use App\Repositories\BaseRepository;

/**
 * Class ordersRepository
 * @package App\Repositories
 * @version June 30, 2019, 6:40 pm UTC
*/

class ordersRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'ticket_id',
        'name',
        'nickname',
        'email',
        'sender_name',
        'payment_slip',
        'payment_confirm',
        'payment_confirm_date',
        'payment_confirm_admin',
        'ip_address'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return orders::class;
    }
}
