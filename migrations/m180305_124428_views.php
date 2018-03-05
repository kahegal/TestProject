<?php

use yii\db\Migration;

/**
 * Class m180305_124428_views
 */
class m180305_124428_views extends Migration
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
        echo "m180305_124428_views cannot be reverted.\n";

        return false;
    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('views', [
            'id' => $this->primaryKey(),
            'news_id' => $this->integer()->notNull(),
            'user_info' => $this->text()
        ]);

        $this->createIndex(
            'idx-views-news_id',
            'views',
            'news_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-views-news_id',
            'views',
            'news_id',
            'news',
            'id',
            'CASCADE'
        );
    }

    public function down()
    {
        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-views-news_id',
            'views'
            
        );

        // drops index for column `author_id`
        $this->dropIndex(
            'idx-views-news_id',
            'views'
        );
    }
}
