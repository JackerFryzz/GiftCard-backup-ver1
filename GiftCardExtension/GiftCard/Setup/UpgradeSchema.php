<?php
/**
 * Created by PhpStorm.
 * User: DinhXuan
 * Date: 11/23/2017
 * Time: 11:11 AM
 */

namespace Mageplaza\GiftCard\Setup;


use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class UpgradeSchema implements UpgradeSchemaInterface
{


	public function upgrade(
		SchemaSetupInterface $setup,
		ModuleContextInterface $context
	)
	{
		$installer = $setup;
		$installer->startSetup();


		if (version_compare($context->getVersion(), '1.1.3', '<')) {

			$installer->getConnection()->addColumn(
				$installer->getTable('customer_entity'),
				'giftcard_balance',
				[
					'type' => \Magento\Framework\DB\Ddl\Table::TYPE_DECIMAL,
					'12,4',
					'nullable' => true,
					'comment' => 'Balance'
				]
			);
//			$installer->getConnection()->dropColumn(
//				$installer->getTable( 'customer_entiti' ),
//				'category_depth'
//			);

//			$table = $installer->getConnection()->newTable(
//				$installer->getTable('customer_entiti')
//			)->addColumn(
//				'customer_id',
//				\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
//				null,
//				['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
//				'customer_id '
//			)->addColumn(
//				'giftcard_balance',
//				\Magento\Framework\DB\Ddl\Table::TYPE_DECIMAL,
//				'12,4',
//				[],
//				'giftcard_balance'
//			);
//			$installer->getConnection()->createTable($table);


			$table = $installer->getConnection()->newTable(
				$installer->getTable('giftcard_history')
			)->addColumn(
				'history_id',
				\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
				null,
				['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
				'history_id'
			)->addColumn(
				'amount',
				\Magento\Framework\DB\Ddl\Table::TYPE_DECIMAL,
				'12,4',
				[],
				'amount'
			)->addColumn(
				'action',
				\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
				null,
				[],
				'action'
			)->addColumn(
				'action_time',
				\Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
				null,
				['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],
				'action_time'
			)->addColumn(
				'giftcard_id',
				\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
				null,
				['unsigned' => true, 'default' => '0'],
				'giftcard_id '
			)->addColumn(
				'customer_id',
				\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
				null,
				['unsigned' => true, 'default' => '0'],
				'customer_id'
			)
			->addForeignKey(
				$installer->getFkName(
					'giftcard_history',
					'giftcard_id',
					'giftcard_code',
					'giftcard_id'
				),
				'giftcard_id', $installer->getTable('giftcard_code'), 'giftcard_id',
				\Magento\Framework\Db\Ddl\Table::ACTION_SET_NULL
			)
			->addForeignKey(
				$installer->getFkName(
					'giftcard_history',
					'customer_id',
					'customer_entity',
					'entity_id'
				),
				'customer_id', $installer->getTable('customer_entity'), 'entity_id',
				\Magento\Framework\Db\Ddl\Table::ACTION_SET_NULL
			);
			$installer->getConnection()->createTable($table);
//			Create table giftcard_history


			$installer->endSetup();
		}
	}
}