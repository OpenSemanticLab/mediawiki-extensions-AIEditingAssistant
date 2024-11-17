<?php

namespace MediaWiki\Extension\AIEditingAssistant\Provider;

use MediaWiki\Http\HttpRequestFactory;
use MediaWiki\Session\Session;
use Message;
use RuntimeException;
use Status;

class Azure extends OpenAI {

	/**
	 * @var array
	 */
	private $connection;

	/**
	 * @inheritDoc
	 */
	public function setConnectionData( array $connection ) {
		$this->connection = $connection;
	}

	/**
	 * @return Message
	 */
	public function getLabel(): Message {
		return Message::newFromKey( 'aieditingassistant-provider-openai' );
	}

	/**
	 * @param array $messages
	 * @return Status
	 */
	protected function getResponse( array $messages ): Status {
		$req = $this->httpRequestFactory->create(
			$this->connection['url'],
			[ 'method' => 'POST', 'postData' => json_encode( [
				'model' => $this->connection['model'],
				'messages' => $messages
			] ) ]
		);
		$req->setHeader( 'api-key', $this->connection['secret'] );
		$req->setHeader( 'Content-Type', 'application/json' );
		$res = $req->execute();
		if ( !$res->isOK() ) {
			return Status::newFatal( 'aieditingassistant-provider-failure', $res->getMessage() );
		}
		$data = json_decode( $req->getContent(), true );

		$choices = $data['choices'];
		if ( count( $choices ) === 0 ) {
			return Status::newFatal( 'aieditingassistant-provider-no-reponses' );
		}
		$choice = $choices[0];
		$reply = $choice['message']['content'];
		return Status::newGood( $reply );
	}

}
