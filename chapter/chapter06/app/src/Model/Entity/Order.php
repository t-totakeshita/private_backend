<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Order Entity
 *
 * @property int $order_id
 * @property int|null $product_id
 * @property int|null $status
 * @property \Cake\I18n\FrozenTime $CREATE_AT
 * @property \Cake\I18n\FrozenTime $UPDATE_AT
 *
 * @property \App\Model\Entity\Product $product
 */
class Order extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'product_id' => true,
        'status' => true,
        'CREATE_AT' => true,
        'UPDATE_AT' => true,
        'product' => true
    ];
}
