<?php

class m240711_232147_create_users_table extends CDbMigration
{
    public function up()
    {
        $this->createTable('users', array(
            'id' => 'pk',
            'username' => 'string NOT NULL UNIQUE',
            'email' => 'string NOT NULL UNIQUE',
            'password' => 'string NOT NULL',
            'verified' => 'boolean DEFAULT 0',
            'verify_token' => 'string',
        ));
    }

	public function down()
	{
		// echo "m240711_232147_create_users_table does not support migration down.\n";
		// return false;
		$this->dropTable('users');

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