<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;
/**
 * User Entity
 *
 * @property int $user_id
 * @property string|null $user_name
 * @property string|null $password
 * @property int|null $user_grand
 * @property \Cake\I18n\FrozenTime $CREATE_AT
 * @property \Cake\I18n\FrozenTime $UPDATE_AT
 */
class User extends Entity
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
        'user_name' => true,
        'password' => true,
        'user_grand' => true,
        'CREATE_AT' => true,
        'UPDATE_AT' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
    // パスワードハッシュ化
    protected function _setPassword($password)
    {
      if (strlen($password) > 0) {
        return (new DefaultPasswordHasher)->hash($password);
      }
    }

}
