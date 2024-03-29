<?php
namespace Users\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;


/**
 * User Entity
 *
 * @property int $id
 * @property string $email
 * @property string $password
 * @property int $group_id
 * @property string $first_name
 * @property string $last_name
 * @property string $avatar
 * @property \Cake\I18n\FrozenTime $created
 *
 * @property \Users\Model\Entity\Group $group
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
        'email' => true,
        'password' => true,
        'group_id' => true,
        'first_name' => true,
        'last_name' => true,
        'avatar' => true,
        'created' => true,
        'group' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];

    protected function _setPassword($password)
    {
        if (strlen($password) > 0) {
          return (new DefaultPasswordHasher)->hash($password);
        }
    }

}
