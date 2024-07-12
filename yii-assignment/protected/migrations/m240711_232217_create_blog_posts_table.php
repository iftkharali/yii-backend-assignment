<?php

class m240711_232217_create_blog_posts_table extends CDbMigration
{
    public function up()
    {
        $this->createTable('blog_posts', array(
            'id' => 'pk',
            'user_id' => 'int NOT NULL',
            'title' => 'string NOT NULL',
            'content' => 'text NOT NULL',
            'is_public' => 'boolean DEFAULT 1',
            'created_at' => 'timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP',
            'updated_at' => 'timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
        ));
        $this->addForeignKey('fk_blog_posts_user', 'blog_posts', 'user_id', 'users', 'id', 'CASCADE', 'RESTRICT');
    }

	public function down()
	{
		// echo "m240711_232217_create_blog_posts_table does not support migration down.\n";
		// return false;
		$this->dropTable('blog_posts');

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