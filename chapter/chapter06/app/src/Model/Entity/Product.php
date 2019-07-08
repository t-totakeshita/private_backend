<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Product Entity
 *
 * @property int $product_id
 * @property string|null $product_name
 * @property int|null $price
 * @property int|null $stock
 * @property \Cake\I18n\FrozenTime $CREATE_AT
 * @property \Cake\I18n\FrozenTime $UPDATE_AT
 */
class Product extends Entity
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
        'product_name' => true,
        'price' => true,
        'stock' => true,
        'CREATE_AT' => true,
        'UPDATE_AT' => true
    ];
}
