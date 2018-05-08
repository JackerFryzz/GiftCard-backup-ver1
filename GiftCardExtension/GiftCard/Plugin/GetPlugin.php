<?php
/**
 * Created by PhpStorm.
 * User: DinhXuan
 * Date: 12/7/2017
 * Time: 8:37 PM
 */

namespace Mageplaza\GiftCard\Plugin;


class GetPlugin
{
//		public function beforeDemo(\Mageplaza\GiftCard\Controller\GiftCard\Main $subject)
//		{
//			echo 'dfgfdgfdgfd';
//		return ['dfgfdgfdgfd'];
//		}
//
		public function aftergetCode( \Mageplaza\GiftCard\Controller\GiftCard\Main $subject, $result)
		{
			return $result;
		}
////
		public function aroundDemo(\Mageplaza\GiftCard\Controller\GiftCard\Main $subject, callable $proceed)
		{

			$returnValue = $proceed('John');
			echo 'sdgfsdfdsfsdfsd';
			return $returnValue;
		}

}