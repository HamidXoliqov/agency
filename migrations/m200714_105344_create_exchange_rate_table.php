<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%exchange_rate}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%references}}`
 * - `{{%references}}`
 */
class m200714_105344_create_exchange_rate_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%exchange_rate}}', [
            'id' => $this->primaryKey(),
            'currency_id' => $this->integer(),
            'amount' => $this->decimal(20, 4),
            'to_currency_id' => $this->integer(),
            'to_amount' => $this->decimal(20, 4),
        ]);

        // creates index for column `currency_id`
        $this->createIndex(
            '{{%idx-exchange_rate-currency_id}}',
            '{{%exchange_rate}}',
            'currency_id'
        );

        // add foreign key for table `{{%references}}`
        $this->addForeignKey(
            '{{%fk-exchange_rate-currency_id}}',
            '{{%exchange_rate}}',
            'currency_id',
            '{{%references}}',
            'id',
            'CASCADE'
        );

        // creates index for column `to_currency_id`
        $this->createIndex(
            '{{%idx-exchange_rate-to_currency_id}}',
            '{{%exchange_rate}}',
            'to_currency_id'
        );

        // add foreign key for table `{{%references}}`
        $this->addForeignKey(
            '{{%fk-exchange_rate-to_currency_id}}',
            '{{%exchange_rate}}',
            'to_currency_id',
            '{{%references}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%references}}`
        $this->dropForeignKey(
            '{{%fk-exchange_rate-currency_id}}',
            '{{%exchange_rate}}'
        );

        // drops index for column `currency_id`
        $this->dropIndex(
            '{{%idx-exchange_rate-currency_id}}',
            '{{%exchange_rate}}'
        );

        // drops foreign key for table `{{%references}}`
        $this->dropForeignKey(
            '{{%fk-exchange_rate-to_currency_id}}',
            '{{%exchange_rate}}'
        );

        // drops index for column `to_currency_id`
        $this->dropIndex(
            '{{%idx-exchange_rate-to_currency_id}}',
            '{{%exchange_rate}}'
        );

        $this->dropTable('{{%exchange_rate}}');
    }
}
