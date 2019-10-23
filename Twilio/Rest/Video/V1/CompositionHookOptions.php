<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Video\V1;

use Twilio\Options;
use Twilio\Values;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
abstract class CompositionHookOptions {
	/**
	 * @param boolean $enabled Only show Composition Hooks enabled or disabled.
	 * @param \DateTime $dateCreatedAfter Only show Composition Hooks created on or
	 *                                    after this ISO8601 date-time.
	 * @param \DateTime $dateCreatedBefore Only show Composition Hooks created
	 *                                     before this this ISO8601 date-time.
	 *
	 * @return ReadCompositionHookOptions Options builder
	 */
	public static function read( $enabled = Values::NONE, $dateCreatedAfter = Values::NONE, $dateCreatedBefore = Values::NONE ) {
		return new ReadCompositionHookOptions( $enabled, $dateCreatedAfter, $dateCreatedBefore );
	}

	/**
	 * @param boolean $enabled Boolean flag for activating the Composition Hook.
	 * @param array $videoLayout The JSON video layout description.
	 * @param string $audioSources A list of audio sources related to this
	 *                             Composition Hook.
	 * @param string $audioSourcesExcluded A list of audio sources excluded related
	 *                                     to this Composition Hook.
	 * @param string $resolution Pixel resolution of the composed video.
	 * @param string $format Container format of the Composition Hook media file.
	 *                       Any of the following: `mp4`, `webm`.
	 * @param string $statusCallback A URL that Twilio sends asynchronous webhook
	 *                               requests to on every composition event.
	 * @param string $statusCallbackMethod HTTP method Twilio should use when
	 *                                     requesting the above URL.
	 * @param boolean $trim Boolean flag for clipping intervals that have no media.
	 *
	 * @return CreateCompositionHookOptions Options builder
	 */
	public static function create( $enabled = Values::NONE, $videoLayout = Values::NONE, $audioSources = Values::NONE, $audioSourcesExcluded = Values::NONE, $resolution = Values::NONE, $format = Values::NONE, $statusCallback = Values::NONE, $statusCallbackMethod = Values::NONE, $trim = Values::NONE ) {
		return new CreateCompositionHookOptions( $enabled, $videoLayout, $audioSources, $audioSourcesExcluded, $resolution, $format, $statusCallback, $statusCallbackMethod, $trim );
	}

	/**
	 * @param boolean $enabled Boolean flag for activating the Composition Hook.
	 * @param array $videoLayout The JSON video layout description.
	 * @param string $audioSources A list of audio sources related to this
	 *                             Composition Hook.
	 * @param string $audioSourcesExcluded A list of audio sources excluded related
	 *                                     to this Composition Hook.
	 * @param boolean $trim Boolean flag for clipping intervals that have no media.
	 * @param string $format Container format of the Composition Hook media file.
	 *                       Any of the following: `mp4`, `webm`.
	 * @param string $resolution Pixel resolution of the composed video.
	 * @param string $statusCallback A URL that Twilio sends asynchronous webhook
	 *                               requests to on every composition event.
	 * @param string $statusCallbackMethod HTTP method Twilio should use when
	 *                                     requesting the above URL.
	 *
	 * @return UpdateCompositionHookOptions Options builder
	 */
	public static function update( $enabled = Values::NONE, $videoLayout = Values::NONE, $audioSources = Values::NONE, $audioSourcesExcluded = Values::NONE, $trim = Values::NONE, $format = Values::NONE, $resolution = Values::NONE, $statusCallback = Values::NONE, $statusCallbackMethod = Values::NONE ) {
		return new UpdateCompositionHookOptions( $enabled, $videoLayout, $audioSources, $audioSourcesExcluded, $trim, $format, $resolution, $statusCallback, $statusCallbackMethod );
	}
}

class ReadCompositionHookOptions extends Options {
	/**
	 * @param boolean $enabled Only show Composition Hooks enabled or disabled.
	 * @param \DateTime $dateCreatedAfter Only show Composition Hooks created on or
	 *                                    after this ISO8601 date-time.
	 * @param \DateTime $dateCreatedBefore Only show Composition Hooks created
	 *                                     before this this ISO8601 date-time.
	 */
	public function __construct( $enabled = Values::NONE, $dateCreatedAfter = Values::NONE, $dateCreatedBefore = Values::NONE ) {
		$this->options['enabled']           = $enabled;
		$this->options['dateCreatedAfter']  = $dateCreatedAfter;
		$this->options['dateCreatedBefore'] = $dateCreatedBefore;
	}

	/**
	 * Only show Composition Hooks that are enabled or disabled.
	 *
	 * @param boolean $enabled Only show Composition Hooks enabled or disabled.
	 *
	 * @return $this Fluent Builder
	 */
	public function setEnabled( $enabled ) {
		$this->options['enabled'] = $enabled;

		return $this;
	}

	/**
	 * Only show Composition Hooks created on or after this ISO8601 date-time, given as `YYYY-MM-DDThh:mm:ss-hh:mm`.
	 *
	 * @param \DateTime $dateCreatedAfter Only show Composition Hooks created on or
	 *                                    after this ISO8601 date-time.
	 *
	 * @return $this Fluent Builder
	 */
	public function setDateCreatedAfter( $dateCreatedAfter ) {
		$this->options['dateCreatedAfter'] = $dateCreatedAfter;

		return $this;
	}

	/**
	 * Only show Composition Hooks created before this this ISO8601 date-time, given as `YYYY-MM-DDThh:mm:ss-hh:mm`.
	 *
	 * @param \DateTime $dateCreatedBefore Only show Composition Hooks created
	 *                                     before this this ISO8601 date-time.
	 *
	 * @return $this Fluent Builder
	 */
	public function setDateCreatedBefore( $dateCreatedBefore ) {
		$this->options['dateCreatedBefore'] = $dateCreatedBefore;

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

		return '[Twilio.Video.V1.ReadCompositionHookOptions ' . implode( ' ', $options ) . ']';
	}
}

class CreateCompositionHookOptions extends Options {
	/**
	 * @param boolean $enabled Boolean flag for activating the Composition Hook.
	 * @param array $videoLayout The JSON video layout description.
	 * @param string $audioSources A list of audio sources related to this
	 *                             Composition Hook.
	 * @param string $audioSourcesExcluded A list of audio sources excluded related
	 *                                     to this Composition Hook.
	 * @param string $resolution Pixel resolution of the composed video.
	 * @param string $format Container format of the Composition Hook media file.
	 *                       Any of the following: `mp4`, `webm`.
	 * @param string $statusCallback A URL that Twilio sends asynchronous webhook
	 *                               requests to on every composition event.
	 * @param string $statusCallbackMethod HTTP method Twilio should use when
	 *                                     requesting the above URL.
	 * @param boolean $trim Boolean flag for clipping intervals that have no media.
	 */
	public function __construct( $enabled = Values::NONE, $videoLayout = Values::NONE, $audioSources = Values::NONE, $audioSourcesExcluded = Values::NONE, $resolution = Values::NONE, $format = Values::NONE, $statusCallback = Values::NONE, $statusCallbackMethod = Values::NONE, $trim = Values::NONE ) {
		$this->options['enabled']              = $enabled;
		$this->options['videoLayout']          = $videoLayout;
		$this->options['audioSources']         = $audioSources;
		$this->options['audioSourcesExcluded'] = $audioSourcesExcluded;
		$this->options['resolution']           = $resolution;
		$this->options['format']               = $format;
		$this->options['statusCallback']       = $statusCallback;
		$this->options['statusCallbackMethod'] = $statusCallbackMethod;
		$this->options['trim']                 = $trim;
	}

	/**
	 * When activated, the Composition Hook is enabled and a composition will be triggered for every Video room completed by this account from this point onwards; `false` indicates the Composition Hook is left inactive.
	 *
	 * @param boolean $enabled Boolean flag for activating the Composition Hook.
	 *
	 * @return $this Fluent Builder
	 */
	public function setEnabled( $enabled ) {
		$this->options['enabled'] = $enabled;

		return $this;
	}

	/**
	 * A JSON object defining the video layout of the Composition Hook in terms of regions. See the section [Managing Video Layouts](#managing-video-layouts) below for further information.
	 *
	 * @param array $videoLayout The JSON video layout description.
	 *
	 * @return $this Fluent Builder
	 */
	public function setVideoLayout( $videoLayout ) {
		$this->options['videoLayout'] = $videoLayout;

		return $this;
	}

	/**
	 * An array of audio sources to merge. All the specified sources must belong to the same Group Room. It can include:
	 * Zero or more Track names. These can be specified using wildcards (e.g. `student*`). The use of `[*]` has semantics "all if any" meaning zero or more (i.e. all) depending on whether the Group Room had audio tracks.
	 *
	 * @param string $audioSources A list of audio sources related to this
	 *                             Composition Hook.
	 *
	 * @return $this Fluent Builder
	 */
	public function setAudioSources( $audioSources ) {
		$this->options['audioSources'] = $audioSources;

		return $this;
	}

	/**
	 * An array of audio sources to exclude from the Composition Hook. Any new Composition triggered by the Composition Hook shall include all audio sources specified in `AudioSources` except for the ones specified in `AudioSourcesExcluded`. This parameter may include:
	 * Zero or more Track names. These can be specified using wildcards (e.g. `student*`)
	 *
	 * @param string $audioSourcesExcluded A list of audio sources excluded related
	 *                                     to this Composition Hook.
	 *
	 * @return $this Fluent Builder
	 */
	public function setAudioSourcesExcluded( $audioSourcesExcluded ) {
		$this->options['audioSourcesExcluded'] = $audioSourcesExcluded;

		return $this;
	}

	/**
	 * A string representing the numbers of pixels for rows (width) and columns (height) of the generated composed video. This string must have the format `{width}x{height}`. This parameter must comply with the following constraints:
	 * `width >= 16 && width <= 1280`
	 * `height >= 16 && height <= 1280`
	 * `width * height <= 921,600`
	 * Typical values are:
	 * HD = `1280x720`
	 * PAL = `1024x576`
	 * VGA = `640x480`
	 * CIF = `320x240`
	 * Note that the `Resolution` implicitly imposes an aspect ratio to the resulting composition. When the original video tracks get constrained by this aspect ratio they are scaled-down to fit. You can find detailed information in the [Managing Video Layouts](#managing-video-layouts) section. Defaults to `640x480`.
	 *
	 * @param string $resolution Pixel resolution of the composed video.
	 *
	 * @return $this Fluent Builder
	 */
	public function setResolution( $resolution ) {
		$this->options['resolution'] = $resolution;

		return $this;
	}

	/**
	 * Container format of the Composition media files created by the Composition Hook. Can be any of the following: `mp4`, `webm`. The use of `mp4` or `webm` makes mandatory the specification of `AudioSources` and/or one `VideoLayout` element containing a valid `video_sources` list, otherwise an error is fired. Defaults to `webm`.
	 *
	 * @param string $format Container format of the Composition Hook media file.
	 *                       Any of the following: `mp4`, `webm`.
	 *
	 * @return $this Fluent Builder
	 */
	public function setFormat( $format ) {
		$this->options['format'] = $format;

		return $this;
	}

	/**
	 * A URL that Twilio sends asynchronous webhook requests to on every composition event. If not provided, status callback events will not be dispatched.
	 *
	 * @param string $statusCallback A URL that Twilio sends asynchronous webhook
	 *                               requests to on every composition event.
	 *
	 * @return $this Fluent Builder
	 */
	public function setStatusCallback( $statusCallback ) {
		$this->options['statusCallback'] = $statusCallback;

		return $this;
	}

	/**
	 * HTTP method Twilio should use when requesting the above URL. Defaults to `POST`.
	 *
	 * @param string $statusCallbackMethod HTTP method Twilio should use when
	 *                                     requesting the above URL.
	 *
	 * @return $this Fluent Builder
	 */
	public function setStatusCallbackMethod( $statusCallbackMethod ) {
		$this->options['statusCallbackMethod'] = $statusCallbackMethod;

		return $this;
	}

	/**
	 * When activated, clips all the intervals where there is no active media in the Compositions triggered by the Composition Hook. This results in shorter compositions in cases when the Room was created but no Participant joined for some time, or if all the Participants left the room and joined at a later stage, as those gaps will be removed. You can find further information in the [Managing Video Layouts](#managing-video-layouts) section. Defaults to `true`.
	 *
	 * @param boolean $trim Boolean flag for clipping intervals that have no media.
	 *
	 * @return $this Fluent Builder
	 */
	public function setTrim( $trim ) {
		$this->options['trim'] = $trim;

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

		return '[Twilio.Video.V1.CreateCompositionHookOptions ' . implode( ' ', $options ) . ']';
	}
}

class UpdateCompositionHookOptions extends Options {
	/**
	 * @param boolean $enabled Boolean flag for activating the Composition Hook.
	 * @param array $videoLayout The JSON video layout description.
	 * @param string $audioSources A list of audio sources related to this
	 *                             Composition Hook.
	 * @param string $audioSourcesExcluded A list of audio sources excluded related
	 *                                     to this Composition Hook.
	 * @param boolean $trim Boolean flag for clipping intervals that have no media.
	 * @param string $format Container format of the Composition Hook media file.
	 *                       Any of the following: `mp4`, `webm`.
	 * @param string $resolution Pixel resolution of the composed video.
	 * @param string $statusCallback A URL that Twilio sends asynchronous webhook
	 *                               requests to on every composition event.
	 * @param string $statusCallbackMethod HTTP method Twilio should use when
	 *                                     requesting the above URL.
	 */
	public function __construct( $enabled = Values::NONE, $videoLayout = Values::NONE, $audioSources = Values::NONE, $audioSourcesExcluded = Values::NONE, $trim = Values::NONE, $format = Values::NONE, $resolution = Values::NONE, $statusCallback = Values::NONE, $statusCallbackMethod = Values::NONE ) {
		$this->options['enabled']              = $enabled;
		$this->options['videoLayout']          = $videoLayout;
		$this->options['audioSources']         = $audioSources;
		$this->options['audioSourcesExcluded'] = $audioSourcesExcluded;
		$this->options['trim']                 = $trim;
		$this->options['format']               = $format;
		$this->options['resolution']           = $resolution;
		$this->options['statusCallback']       = $statusCallback;
		$this->options['statusCallbackMethod'] = $statusCallbackMethod;
	}

	/**
	 * When activated, the Composition Hook is enabled and a composition will be triggered for every Video room completed by this account from this point onwards; `false` indicates the Composition Hook is left inactive.
	 *
	 * @param boolean $enabled Boolean flag for activating the Composition Hook.
	 *
	 * @return $this Fluent Builder
	 */
	public function setEnabled( $enabled ) {
		$this->options['enabled'] = $enabled;

		return $this;
	}

	/**
	 * A JSON object defining the video layout of the Composition Hook in terms of regions. See the section [Managing Video Layouts](#managing-video-layouts) below for further information.
	 *
	 * @param array $videoLayout The JSON video layout description.
	 *
	 * @return $this Fluent Builder
	 */
	public function setVideoLayout( $videoLayout ) {
		$this->options['videoLayout'] = $videoLayout;

		return $this;
	}

	/**
	 * An array of audio sources to merge. All the specified sources must belong to the same Group Room. It can include:
	 * Zero or more Track names. These can be specified using wildcards (e.g. `student*`). The use of `[*]` has semantics "all if any" meaning zero or more (i.e. all) depending on whether the Group Room had audio tracks.
	 *
	 * @param string $audioSources A list of audio sources related to this
	 *                             Composition Hook.
	 *
	 * @return $this Fluent Builder
	 */
	public function setAudioSources( $audioSources ) {
		$this->options['audioSources'] = $audioSources;

		return $this;
	}

	/**
	 * An array of audio sources to exclude from the Composition Hook. Any new Composition triggered by the Composition Hook shall include all audio sources specified in `AudioSources` except for the ones specified in `AudioSourcesExcluded`. This parameter may include:
	 * Zero or more Track names. These can be specified using wildcards (e.g. `student*`)
	 *
	 * @param string $audioSourcesExcluded A list of audio sources excluded related
	 *                                     to this Composition Hook.
	 *
	 * @return $this Fluent Builder
	 */
	public function setAudioSourcesExcluded( $audioSourcesExcluded ) {
		$this->options['audioSourcesExcluded'] = $audioSourcesExcluded;

		return $this;
	}

	/**
	 * When activated, clips all the intervals where there is no active media in the Compositions triggered by the Composition Hook. This results in shorter compositions in cases when the Room was created but no Participant joined for some time, or if all the Participants left the room and joined at a later stage, as those gaps will be removed. You can find further information in the [Managing Video Layouts](#managing-video-layouts) section. Defaults to `true`.
	 *
	 * @param boolean $trim Boolean flag for clipping intervals that have no media.
	 *
	 * @return $this Fluent Builder
	 */
	public function setTrim( $trim ) {
		$this->options['trim'] = $trim;

		return $this;
	}

	/**
	 * Container format of the Composition media files created by the Composition Hook. Can be any of the following: `mp4`, `webm`. The use of `mp4` or `webm` makes mandatory the specification of `AudioSources` and/or one `VideoLayout` element containing a valid `video_sources` list, otherwise an error is fired. Defaults to `webm`.
	 *
	 * @param string $format Container format of the Composition Hook media file.
	 *                       Any of the following: `mp4`, `webm`.
	 *
	 * @return $this Fluent Builder
	 */
	public function setFormat( $format ) {
		$this->options['format'] = $format;

		return $this;
	}

	/**
	 * A string representing the numbers of pixels for rows (width) and columns (height) of the generated composed video. This string must have the format `{width}x{height}`. This parameter must comply with the following constraints:
	 * `width >= 16 && width <= 1280`
	 * `height >= 16 && height <= 1280`
	 * `width * height <= 921,600`
	 * Typical values are:
	 * HD = `1280x720`
	 * PAL = `1024x576`
	 * VGA = `640x480`
	 * CIF = `320x240`
	 * Note that the `Resolution` implicitly imposes an aspect ratio to the resulting composition. When the original video tracks get constrained by this aspect ratio they are scaled-down to fit. You can find detailed information in the [Managing Video Layouts](#managing-video-layouts) section. Defaults to `640x480`.
	 *
	 * @param string $resolution Pixel resolution of the composed video.
	 *
	 * @return $this Fluent Builder
	 */
	public function setResolution( $resolution ) {
		$this->options['resolution'] = $resolution;

		return $this;
	}

	/**
	 * A URL that Twilio sends asynchronous webhook requests to on every composition event. If not provided, status callback events will not be dispatched.
	 *
	 * @param string $statusCallback A URL that Twilio sends asynchronous webhook
	 *                               requests to on every composition event.
	 *
	 * @return $this Fluent Builder
	 */
	public function setStatusCallback( $statusCallback ) {
		$this->options['statusCallback'] = $statusCallback;

		return $this;
	}

	/**
	 * HTTP method Twilio should use when requesting the above URL. Defaults to `POST`.
	 *
	 * @param string $statusCallbackMethod HTTP method Twilio should use when
	 *                                     requesting the above URL.
	 *
	 * @return $this Fluent Builder
	 */
	public function setStatusCallbackMethod( $statusCallbackMethod ) {
		$this->options['statusCallbackMethod'] = $statusCallbackMethod;

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

		return '[Twilio.Video.V1.UpdateCompositionHookOptions ' . implode( ' ', $options ) . ']';
	}
}