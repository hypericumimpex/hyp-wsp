<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\IpMessaging\V2\Service\User;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Values;
use Twilio\Version;

/**
 * @property string accountSid
 * @property string serviceSid
 * @property string channelSid
 * @property string userSid
 * @property string memberSid
 * @property string status
 * @property integer lastConsumedMessageIndex
 * @property integer unreadMessagesCount
 * @property array links
 * @property string url
 * @property string notificationLevel
 */
class UserChannelInstance extends InstanceResource {
	/**
	 * Initialize the UserChannelInstance
	 *
	 * @param \Twilio\Version $version Version that contains the resource
	 * @param mixed[] $payload The response payload
	 * @param string $serviceSid The unique id of the Service this channel belongs
	 *                           to.
	 * @param string $userSid The unique id of the User this Channel belongs to.
	 * @param string $channelSid The unique id of a Channel.
	 *
	 * @return \Twilio\Rest\IpMessaging\V2\Service\User\UserChannelInstance
	 */
	public function __construct( Version $version, array $payload, $serviceSid, $userSid, $channelSid = null ) {
		parent::__construct( $version );

		// Marshaled Properties
		$this->properties = array(
			'accountSid'               => Values::array_get( $payload, 'account_sid' ),
			'serviceSid'               => Values::array_get( $payload, 'service_sid' ),
			'channelSid'               => Values::array_get( $payload, 'channel_sid' ),
			'userSid'                  => Values::array_get( $payload, 'user_sid' ),
			'memberSid'                => Values::array_get( $payload, 'member_sid' ),
			'status'                   => Values::array_get( $payload, 'status' ),
			'lastConsumedMessageIndex' => Values::array_get( $payload, 'last_consumed_message_index' ),
			'unreadMessagesCount'      => Values::array_get( $payload, 'unread_messages_count' ),
			'links'                    => Values::array_get( $payload, 'links' ),
			'url'                      => Values::array_get( $payload, 'url' ),
			'notificationLevel'        => Values::array_get( $payload, 'notification_level' ),
		);

		$this->solution = array(
			'serviceSid' => $serviceSid,
			'userSid'    => $userSid,
			'channelSid' => $channelSid ?: $this->properties['channelSid'],
		);
	}

	/**
	 * Fetch a UserChannelInstance
	 *
	 * @return UserChannelInstance Fetched UserChannelInstance
	 * @throws TwilioException When an HTTP error occurs.
	 */
	public function fetch() {
		return $this->proxy()->fetch();
	}

	/**
	 * Generate an instance context for the instance, the context is capable of
	 * performing various actions.  All instance actions are proxied to the context
	 *
	 * @return \Twilio\Rest\IpMessaging\V2\Service\User\UserChannelContext Context
	 *                                                                     for this
	 *                                                                     UserChannelInstance
	 */
	protected function proxy() {
		if ( ! $this->context ) {
			$this->context = new UserChannelContext(
				$this->version,
				$this->solution['serviceSid'],
				$this->solution['userSid'],
				$this->solution['channelSid']
			);
		}

		return $this->context;
	}

	/**
	 * Update the UserChannelInstance
	 *
	 * @param string $notificationLevel Push notification level to be assigned to
	 *                                  Channel of the User.
	 *
	 * @return UserChannelInstance Updated UserChannelInstance
	 * @throws TwilioException When an HTTP error occurs.
	 */
	public function update( $notificationLevel ) {
		return $this->proxy()->update( $notificationLevel );
	}

	/**
	 * Magic getter to access properties
	 *
	 * @param string $name Property to access
	 *
	 * @return mixed The requested property
	 * @throws TwilioException For unknown properties
	 */
	public function __get( $name ) {
		if ( array_key_exists( $name, $this->properties ) ) {
			return $this->properties[ $name ];
		}

		if ( property_exists( $this, '_' . $name ) ) {
			$method = 'get' . ucfirst( $name );

			return $this->$method();
		}

		throw new TwilioException( 'Unknown property: ' . $name );
	}

	/**
	 * Provide a friendly representation
	 *
	 * @return string Machine friendly representation
	 */
	public function __toString() {
		$context = array();
		foreach ( $this->solution as $key => $value ) {
			$context[] = "$key=$value";
		}

		return '[Twilio.IpMessaging.V2.UserChannelInstance ' . implode( ' ', $context ) . ']';
	}
}