<?php

namespace MediaWiki\Extension\AIEditingAssistant\Provider;

use MediaWiki\Session\Session;
use Message;
use Status;

interface IProvider {
	/**
	 * @param array $connection
	 */
	public function setConnectionData( array $connection );

	/**
	 * @param string $command
	 * @param string $text
	 * @param bool $isContinuation Whether this is a continuation of a previous prompt
	 * @return Status
	 */
	public function executePrompt( string $command, string $text, bool $isContinuation ): Status;

	/**
	 * Set session object in order to remember the conversation between prompts
	 *
	 * @param Session $session
	 * @return void
	 */
	public function setSession( Session $session );

	/**
	 * @return Message
	 */
	public function getLabel(): Message;
}
