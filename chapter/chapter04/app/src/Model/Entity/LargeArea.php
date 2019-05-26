<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * LargeArea Entity
 *
 * @property string|null $prefecture_name
 * @property string|null $name
 * @property int|null $prefecture_id
 * @property \Cake\I18n\FrozenTime $CREATE_AT
 * @property \Cake\I18n\FrozenTime $UPDATE_AT
 *
 * @property \App\Model\Entity\Prefecture $prefecture
 */
class LargeArea extends Entity
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
        'prefecture_name' => true,
        'name' => true,
        'prefecture_id' => true,
        'CREATE_AT' => true,
        'UPDATE_AT' => true,
        'prefecture' => true
    ];
}
