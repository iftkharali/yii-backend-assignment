<?php

class m240711_232233_create_likes_table extends CDbMigration
{
    public function up()
    {
        $this->createTable('likes', array(
            'id' => 'pk',
            'user_id' => 'int NOT NULL',
            'blog_post_id' => 'int NOT NULL',
        ));
        $this->addForeignKey('fk_likes_user', 'likes', 'user_id', 'users', 'id', 'CASCADE', 'RESTRICT');
        $this->addForeignKey('fk_likes_blog_post', 'likes', 'blog_post_id', 'blog_posts', 'id', 'CASCADE', 'RESTRICT');
    }

	public function down()
	{
		// echo "m240711_232233_create_likes_table does not support migration down.\n";
		// return false;
		$this->dropTable('likes');

	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}