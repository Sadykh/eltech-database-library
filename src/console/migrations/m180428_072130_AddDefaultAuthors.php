<?php

use yii\db\Migration;
use common\models\User;

/**
 * Class m180428_072130_AddDefaultAuthors
 */
class m180428_072130_AddDefaultAuthors extends Migration
{
    public $authorList = [
        'Бутусов Денис Николаевич',
        'Андреев Валерий Сергеевич',
        'Каримов Артур Искандарович',
        'Каримов Тимур Искандарович',
        'Красильников Александр Витальевич',
        'Островский Валерий Юрьевич',
        'Тутуева Александра Вадимовна',
        'Горяинов Сергей Вадимович',
        'Рыбин Вячеслав Геннадьевич',
        'Копец Екатерина Евгеньевна​'
    ];

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $user = User::findOne(['username' => 'Admin']);

        foreach ($this->authorList as $item) {
            $author = explode(' ', $item);
            $this->insert('author', [
                'lastName' => $author[0],
                'firstName' => $author[1],
                'middleName' => $author[2],
                'user_id' => $user->id,
                'created_at' => '1524899833',
                'updated_at' => '1524899833',
            ]);

        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        foreach ($this->authorList as $item) {
            $author = explode(' ', $item);
            $this->delete('author', [
                'lastName' => $author[0],
                'firstName' => $author[1],
                'middleName' => $author[2],
                'created_at' => '1524899833',
                'updated_at' => '1524899833',
            ]);
        }
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180428_072130_AddDefaultAuthors cannot be reverted.\n";

        return false;
    }
    */
}
