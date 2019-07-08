<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Network\Session;

/**
 * Orders Model
 *
 * @property \App\Model\Table\ProductsTable|\Cake\ORM\Association\BelongsTo $Products
 *
 * @method \App\Model\Entity\Order get($primaryKey, $options = [])
 * @method \App\Model\Entity\Order newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Order[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Order|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Order saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Order patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Order[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Order findOrCreate($search, callable $callback = null, $options = [])
 */
class OrdersTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('orders');
        $this->setDisplayField('order_id');
        $this->setPrimaryKey('order_id');

        $this->hasOne('Products', [
            'foreignKey' => 'product_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('order_id')
            ->allowEmptyString('order_id', 'create');

        $validator
            ->integer('status')
            ->allowEmptyString('status');

        // ユーザのセッション情報の取得
        $session = new Session();
        $user_grand = $session->read('Auth.User.user_grand');

        // 登録時のユーザ権限毎にstatusのチェック
        if ($user_grand === 1) {
          $validator
            ->add('status', 'comparison',  ['rule' => ['comparison', '<=', 1]]);
        } elseif ( $user_grand  === 2 ) {
          $validator
            ->add('status', 'comparison',  ['rule' => ['comparison', '<=', 2]]);
        } elseif ( $user_grand === 3 ) {
          $validator
            ->add('status', 'comparison',  ['rule' => ['comparison', '<=', 3]]);
        }

        $validator
            ->dateTime('CREATE_AT')
            ->allowEmptyDateTime('CREATE_AT', false);

        $validator
            ->dateTime('UPDATE_AT')
            ->allowEmptyDateTime('UPDATE_AT', false);

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['product_id'], 'Products'));

        return $rules;
    }
}
