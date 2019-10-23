<?php
/**
 * This file has been @generated by a phing task by {@link BuildMetadataPHPFromXml}.
 * See [README.md](README.md#generating-data) for more information.
 *
 * Pull requests changing data in these files will not be accepted. See the
 * [FAQ in the README](README.md#problems-with-invalid-numbers] on how to make
 * metadata changes.
 *
 * Do not modify this file directly!
 */


return array(
	'generalDesc'                   =>
		array(
			'NationalNumberPattern'   => '(?:473|[58]\\d\\d|900)\\d{7}',
			'PossibleLength'          =>
				array(
					0 => 10,
				),
			'PossibleLengthLocalOnly' =>
				array(
					0 => 7,
				),
		),
	'fixedLine'                     =>
		array(
			'NationalNumberPattern'   => '473(?:2(?:3[0-2]|69)|3(?:2[89]|86)|4(?:[06]8|3[5-9]|4[0-49]|5[5-79]|73|90)|63[68]|7(?:58|84)|800|938)\\d{4}',
			'ExampleNumber'           => '4732691234',
			'PossibleLength'          =>
				array(),
			'PossibleLengthLocalOnly' =>
				array(
					0 => 7,
				),
		),
	'mobile'                        =>
		array(
			'NationalNumberPattern'   => '473(?:4(?:0[2-79]|1[04-9]|2[0-5]|58)|5(?:2[01]|3[3-8])|901)\\d{4}',
			'ExampleNumber'           => '4734031234',
			'PossibleLength'          =>
				array(),
			'PossibleLengthLocalOnly' =>
				array(
					0 => 7,
				),
		),
	'tollFree'                      =>
		array(
			'NationalNumberPattern'   => '8(?:00|33|44|55|66|77|88)[2-9]\\d{6}',
			'ExampleNumber'           => '8002123456',
			'PossibleLength'          =>
				array(),
			'PossibleLengthLocalOnly' =>
				array(),
		),
	'premiumRate'                   =>
		array(
			'NationalNumberPattern'   => '900[2-9]\\d{6}',
			'ExampleNumber'           => '9002123456',
			'PossibleLength'          =>
				array(),
			'PossibleLengthLocalOnly' =>
				array(),
		),
	'sharedCost'                    =>
		array(
			'PossibleLength'          =>
				array(
					0 => - 1,
				),
			'PossibleLengthLocalOnly' =>
				array(),
		),
	'personalNumber'                =>
		array(
			'NationalNumberPattern'   => '5(?:00|2[12]|33|44|66|77|88)[2-9]\\d{6}',
			'ExampleNumber'           => '5002345678',
			'PossibleLength'          =>
				array(),
			'PossibleLengthLocalOnly' =>
				array(),
		),
	'voip'                          =>
		array(
			'PossibleLength'          =>
				array(
					0 => - 1,
				),
			'PossibleLengthLocalOnly' =>
				array(),
		),
	'pager'                         =>
		array(
			'PossibleLength'          =>
				array(
					0 => - 1,
				),
			'PossibleLengthLocalOnly' =>
				array(),
		),
	'uan'                           =>
		array(
			'PossibleLength'          =>
				array(
					0 => - 1,
				),
			'PossibleLengthLocalOnly' =>
				array(),
		),
	'voicemail'                     =>
		array(
			'PossibleLength'          =>
				array(
					0 => - 1,
				),
			'PossibleLengthLocalOnly' =>
				array(),
		),
	'noInternationalDialling'       =>
		array(
			'PossibleLength'          =>
				array(
					0 => - 1,
				),
			'PossibleLengthLocalOnly' =>
				array(),
		),
	'id'                            => 'GD',
	'countryCode'                   => 1,
	'internationalPrefix'           => '011',
	'nationalPrefix'                => '1',
	'nationalPrefixForParsing'      => '1|([2-9]\\d{6})$',
	'nationalPrefixTransformRule'   => '473$1',
	'sameMobileAndFixedLinePattern' => false,
	'numberFormat'                  =>
		array(),
	'intlNumberFormat'              =>
		array(),
	'mainCountryForCode'            => false,
	'leadingDigits'                 => '473',
	'leadingZeroPossible'           => false,
	'mobileNumberPortableRegion'    => false,
);
