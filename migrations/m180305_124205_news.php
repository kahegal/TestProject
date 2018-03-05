<?php

use yii\db\Migration;

/**
 * Class m180305_124205_news
 */
class m180305_124205_news extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180305_124205_news cannot be reverted.\n";

        return false;
    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('news', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'content' => $this->text(),
            'date_create' => $this->integer(11),
        ]);
    }

    public function down()
    {
        $this->dropTable('news');
    }

}
