<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * City Entity
 *
 * @property int|null $prefecture_id
 * @property string|null $name
 * @property string|null $citycode
 * @property \Cake\I18n\FrozenTime $CREATE_AT
 * @property \Cake\I18n\FrozenTime $UPDATE_AT
 *
 * @property \App\Model\Entity\Prefecture $prefecture
 */
class City extends Entity
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
        'prefecture_id' => true,
        'name' => true,
        'citycode' => true,
        'CREATE_AT' => true,
        'UPDATE_AT' => true,
        'prefecture' => true
    ];
}
