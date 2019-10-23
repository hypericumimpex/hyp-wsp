<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Trunking\V1\Trunk;

use Twilio\Options;
use Twilio\Values;

abstract class OriginationUrlOptions {
	/**
	 * @param integer $weight Weight is used to determine the share of load when
	 *                        more than one URI has the same priority.
	 * @param integer $priority Priority ranks the importance of the URI.
	 * @param boolean $enabled A boolean value indicating whether the URL is
	 *                         enabled or disabled.
	 * @param string $friendlyName A human readable descriptive text, up to 64
	 *                             characters long.
	 * @param string $sipUrl The SIP address you want Twilio to route your
	 *                       Origination calls to.
	 *
	 * @return UpdateOriginationUrlOptions Options builder
	 */
	public static function update( $weight = Values::NONE, $priority = Values::NONE, $enabled = Values::NONE, $friendlyName = Values::NONE, $sipUrl = Values::NONE ) {
		return new UpdateOriginationUrlOptions( $weight, $priority, $enabled, $friendlyName, $sipUrl );
	}
}

class UpdateOriginationUrlOptions extends Options {
	/**
	 * @param integer $weight Weight is used to determine the share of load when
	 *                        more than one URI has the same priority.
	 * @param integer $priority Priority ranks the importance of the URI.
	 * @param boolean $enabled A boolean value indicating whether the URL is
	 *                         enabled or disabled.
	 * @param string $friendlyName A human readable descriptive text, up to 64
	 *                             characters long.
	 * @param string $sipUrl The SIP address you want Twilio to route your
	 *                       Origination calls to.
	 */
	public function __construct( $weight = Values::NONE, $priority = Values::NONE, $enabled = Values::NONE, $friendlyName = Values::NONE, $sipUrl = Values::NONE ) {
		$this->options['weight']       = $weight;
		$this->options['priority']     = $priority;
		$this->options['enabled']      = $enabled;
		$this->options['friendlyName'] = $friendlyName;
		$this->options['sipUrl']       = $sipUrl;
	}

	/**
	 * Weight is used to determine the share of load when more than one URI has the same priority. Its values range from 1 to 65535. The higher the value, the more load a URI is given. Defaults to 10.
	 *
	 * @param integer $weight Weight is used to determine the share of load when
	 *                        more than one URI has the same priority.
	 *
	 * @return $this Fluent Builder
	 */
	public function setWeight( $weight ) {
		$this->options['weight'] = $weight;

		return $this;
	}

	/**
	 * Priority ranks the importance of the URI. Values range from 0 to 65535, where the lowest number represents the highest importance. Defaults to 10.
	 *
	 * @param integer $priority Priority ranks the importance of the URI.
	 *
	 * @return $this Fluent Builder
	 */
	public function setPriority( $priority ) {
		$this->options['priority'] = $priority;

		return $this;
	}

	/**
	 * A boolean value indicating whether the URL is enabled or disabled. Defaults to true.
	 *
	 * @param boolean $enabled A boolean value indicating whether the URL is
	 *                         enabled or disabled.
	 *
	 * @return $this Fluent Builder
	 */
	public function setEnabled( $enabled ) {
		$this->options['enabled'] = $enabled;

		return $this;
	}

	/**
	 * A human readable descriptive text, up to 64 characters long.
	 *
	 * @param string $friendlyName A human readable descriptive text, up to 64
	 *                             characters long.
	 *
	 * @return $this Fluent Builder
	 */
	public function setFriendlyName( $friendlyName ) {
		$this->options['friendlyName'] = $friendlyName;

		return $this;
	}

	/**
	 * The SIP address you want Twilio to route your Origination calls to. This must be a `sip:` schema. `sips` is NOT supported
	 *
	 * @param string $sipUrl The SIP address you want Twilio to route your
	 *                       Origination calls to.
	 *
	 * @return $this Fluent Builder
	 */
	public function setSipUrl( $sipUrl ) {
		$this->options['sipUrl'] = $sipUrl;

		return $this;
	}

	/**
	 * Provide a friendly representation
	 *
	 * @return string Machine friendly representation
	 */
	public function __toString() {
		$options = array();
		foreach ( $this->options as $key => $value ) {
			if ( $value != Values::NONE ) {
				$options[] = "$key=$value";
			}
		}

		return '[Twilio.Trunking.V1.UpdateOriginationUrlOptions ' . implode( ' ', $options ) . ']';
	}
}