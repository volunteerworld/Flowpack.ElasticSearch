<?php
namespace TYPO3\ElasticSearch\Domain\Exception;

/*                                                                        *
 * This script belongs to the FLOW3 package "TYPO3.ElasticSearch".        *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU General Public License, either version 3 of the   *
 * License, or (at your option) any later version.                        *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

use Doctrine\ORM\Mapping as ORM;
use TYPO3\FLOW3\Annotations as FLOW3;

/**
 */
class DocumentPropertiesMismatchException extends \TYPO3\ElasticSearch\Exception {

	/**
	 * @var \TYPO3\FLOW3\Error\Result
	 */
	protected $errorResult;

	/**
	 * @param \TYPO3\FLOW3\Error\Result $result
	 */
	public function setErrorResult(\TYPO3\FLOW3\Error\Result $result) {
		$this->errorResult = $result;
	}
}

?>