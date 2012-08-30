<?php
namespace TYPO3\ElasticSearch\Transfer;

/*                                                                        *
 * This script belongs to the FLOW3-package "TYPO3.ElasticSearch".        *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU Lesser General Public License, either version 3   *
 *  of the License, or (at your option) any later version.                *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

use \TYPO3\FLOW3\Annotations as FLOW3;

/**
 * Handles the requests
 * @FLOW3\scope("singleton")
 */
class RequestService {

	/**
	 * @FLOW3\Inject
	 * @var \TYPO3\FLOW3\Http\Client\Browser
	 */
	protected $browser;

	/**
	 */
	public function initializeObject() {
		$this->browser->setRequestEngine(new \TYPO3\FLOW3\Http\Client\CurlEngine());
	}

	/**
	 * @param string $method
	 * @param \TYPO3\ElasticSearch\Domain\Model\Client $client
	 * @param string $path
	 * @param array $arguments
	 * @param string $content
	 *
	 * @return \TYPO3\ElasticSearch\Transfer\Response
	 */
	public function request($method, \TYPO3\ElasticSearch\Domain\Model\Client $client, $path = NULL, $arguments = array(), $content = NULL) {
		$clientConfigurations = $client->getClientConfigurations();
		$clientConfiguration = $clientConfigurations[0];

		$uri = clone $clientConfiguration->getUri();
		if ($path !== NULL) {
			$uri->setPath($uri->getPath() . $path);
		}

		$response = $this->browser->request($uri, $method, $arguments, array(), array(), $content);
		return new Response($response, $this->browser->getLastRequest());
	}

}

?>