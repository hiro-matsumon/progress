<?php
/**
 * MocoPersons アプリケーション テーブルオブジェクト
 * @author h.matsuda
 */
namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use \App\Model\Validation\MocoPersonsValidation;

/**
 * MocoPersons アプリケーション テーブルオブジェクト
 * @package Model
 */
class MocoPersonsTable extends Table
{

    /**
     * 検索条件をもとにデータベースから検索する.
     *
     * @param string $cond 検索条件
     * @return \Cake\ORM\Query 検索結果
     */
    public function search($cond)
    {
        // 検索準備
        $query = $this->find();
        $exp = $query->newExpr();

        // 検索条件生成
        $whereFunc = function () use ($exp, $cond) {
            // OR条件部分
            $orCond = $exp->or_(function ($exp) use ($cond) {
                return $exp->like('name', '%' . $cond . '%')
                ->like('email', '%' . $cond . '%');
            });

            return $orCond;
        };
        // SQL発行
        return $query->where($whereFunc)
            ->order(['name' => 'asc']);
    }

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('moco_persons');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        // カスタムバリデーションを設定
        $validator->provider('custom', 'App\Model\Validation\MocoPersonsValidation');

        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name', __(MocoPersonsValidation::$messages['notEmpty'], '名前'));

        $validator
            ->email('email', false, MocoPersonsValidation::$messages['email'])
            ->requirePresence('email', 'create')
            ->notEmpty('email', __(MocoPersonsValidation::$messages['notEmpty'], 'メールアドレス'));

        $validator
            ->requirePresence('password', 'create')
            ->notEmpty('password', __(MocoPersonsValidation::$messages['notEmpty'], 'パスワード'));

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
        $rules->add($rules->isUnique(['email'], __(MocoPersonsValidation::$messages['isUnique'], 'メールアドレス')));

        return $rules;
    }
}
