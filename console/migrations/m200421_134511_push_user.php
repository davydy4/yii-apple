<?php

use yii\db\Migration;

/**
 * Class m200421_134511_push_user
 */
class m200421_134511_push_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('user', [
            'username' => 'admin',
            'auth_key' => 'qixgHUM6pxazIaOdTCpKbjky_S6b-JjP',
            'password_hash' => '$2y$13$EEXdqiOO0fdcKRjW9N52c.OshXZzbSY2qPTaK4w78qXSN6P9EaDFW',
            'verification_token' => 'EgzNM0aCr_qgv1UzgihAcjk71QuG3Tqy_1587386451',
            'password_reset_token' => NULL,
            'created_at' => 1587386451,
            'updated_at' => 1587386451,
            'email' => 'test@test.com',
            'status' => 10,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('user', ['username' => 'admin']);
    }


}
