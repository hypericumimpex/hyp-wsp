<?php
// This file was auto-generated from sdk-root/src/data/cloudfront/2016-08-01/api-2.json
return [
	'version'    => '2.0',
	'metadata'   => [
		'uid'                 => 'cloudfront-2016-08-01',
		'apiVersion'          => '2016-08-01',
		'endpointPrefix'      => 'cloudfront',
		'globalEndpoint'      => 'cloudfront.amazonaws.com',
		'protocol'            => 'rest-xml',
		'serviceAbbreviation' => 'CloudFront',
		'serviceFullName'     => 'Amazon CloudFront',
		'signatureVersion'    => 'v4',
	],
	'operations' => [
		'CreateCloudFrontOriginAccessIdentity'    => [
			'name'   => 'CreateCloudFrontOriginAccessIdentity2016_08_01',
			'http'   => [
				'method'       => 'POST',
				'requestUri'   => '/2016-08-01/origin-access-identity/cloudfront',
				'responseCode' => 201,
			],
			'input'  => [ 'shape' => 'CreateCloudFrontOriginAccessIdentityRequest', ],
			'output' => [ 'shape' => 'CreateCloudFrontOriginAccessIdentityResult', ],
			'errors' => [
				[ 'shape' => 'CloudFrontOriginAccessIdentityAlreadyExists', ],
				[ 'shape' => 'MissingBody', ],
				[ 'shape' => 'TooManyCloudFrontOriginAccessIdentities', ],
				[ 'shape' => 'InvalidArgument', ],
				[ 'shape' => 'InconsistentQuantities', ],
			],
		],
		'CreateDistribution'                      => [
			'name'   => 'CreateDistribution2016_08_01',
			'http'   => [ 'method' => 'POST', 'requestUri' => '/2016-08-01/distribution', 'responseCode' => 201, ],
			'input'  => [ 'shape' => 'CreateDistributionRequest', ],
			'output' => [ 'shape' => 'CreateDistributionResult', ],
			'errors' => [
				[ 'shape' => 'CNAMEAlreadyExists', ],
				[ 'shape' => 'DistributionAlreadyExists', ],
				[ 'shape' => 'InvalidOrigin', ],
				[ 'shape' => 'InvalidOriginAccessIdentity', ],
				[ 'shape' => 'AccessDenied', ],
				[ 'shape' => 'TooManyTrustedSigners', ],
				[ 'shape' => 'TrustedSignerDoesNotExist', ],
				[ 'shape' => 'InvalidViewerCertificate', ],
				[ 'shape' => 'InvalidMinimumProtocolVersion', ],
				[ 'shape' => 'MissingBody', ],
				[ 'shape' => 'TooManyDistributionCNAMEs', ],
				[ 'shape' => 'TooManyDistributions', ],
				[ 'shape' => 'InvalidDefaultRootObject', ],
				[ 'shape' => 'InvalidRelativePath', ],
				[ 'shape' => 'InvalidErrorCode', ],
				[ 'shape' => 'InvalidResponseCode', ],
				[ 'shape' => 'InvalidArgument', ],
				[ 'shape' => 'InvalidRequiredProtocol', ],
				[ 'shape' => 'NoSuchOrigin', ],
				[ 'shape' => 'TooManyOrigins', ],
				[ 'shape' => 'TooManyCacheBehaviors', ],
				[ 'shape' => 'TooManyCookieNamesInWhiteList', ],
				[ 'shape' => 'InvalidForwardCookies', ],
				[ 'shape' => 'TooManyHeadersInForwardedValues', ],
				[ 'shape' => 'InvalidHeadersForS3Origin', ],
				[ 'shape' => 'InconsistentQuantities', ],
				[ 'shape' => 'TooManyCertificates', ],
				[ 'shape' => 'InvalidLocationCode', ],
				[ 'shape' => 'InvalidGeoRestrictionParameter', ],
				[ 'shape' => 'InvalidProtocolSettings', ],
				[ 'shape' => 'InvalidTTLOrder', ],
				[ 'shape' => 'InvalidWebACLId', ],
				[ 'shape' => 'TooManyOriginCustomHeaders', ],
			],
		],
		'CreateDistributionWithTags'              => [
			'name'   => 'CreateDistributionWithTags2016_08_01',
			'http'   => [
				'method'       => 'POST',
				'requestUri'   => '/2016-08-01/distribution?WithTags',
				'responseCode' => 201,
			],
			'input'  => [ 'shape' => 'CreateDistributionWithTagsRequest', ],
			'output' => [ 'shape' => 'CreateDistributionWithTagsResult', ],
			'errors' => [
				[ 'shape' => 'CNAMEAlreadyExists', ],
				[ 'shape' => 'DistributionAlreadyExists', ],
				[ 'shape' => 'InvalidOrigin', ],
				[ 'shape' => 'InvalidOriginAccessIdentity', ],
				[ 'shape' => 'AccessDenied', ],
				[ 'shape' => 'TooManyTrustedSigners', ],
				[ 'shape' => 'TrustedSignerDoesNotExist', ],
				[ 'shape' => 'InvalidViewerCertificate', ],
				[ 'shape' => 'InvalidMinimumProtocolVersion', ],
				[ 'shape' => 'MissingBody', ],
				[ 'shape' => 'TooManyDistributionCNAMEs', ],
				[ 'shape' => 'TooManyDistributions', ],
				[ 'shape' => 'InvalidDefaultRootObject', ],
				[ 'shape' => 'InvalidRelativePath', ],
				[ 'shape' => 'InvalidErrorCode', ],
				[ 'shape' => 'InvalidResponseCode', ],
				[ 'shape' => 'InvalidArgument', ],
				[ 'shape' => 'InvalidRequiredProtocol', ],
				[ 'shape' => 'NoSuchOrigin', ],
				[ 'shape' => 'TooManyOrigins', ],
				[ 'shape' => 'TooManyCacheBehaviors', ],
				[ 'shape' => 'TooManyCookieNamesInWhiteList', ],
				[ 'shape' => 'InvalidForwardCookies', ],
				[ 'shape' => 'TooManyHeadersInForwardedValues', ],
				[ 'shape' => 'InvalidHeadersForS3Origin', ],
				[ 'shape' => 'InconsistentQuantities', ],
				[ 'shape' => 'TooManyCertificates', ],
				[ 'shape' => 'InvalidLocationCode', ],
				[ 'shape' => 'InvalidGeoRestrictionParameter', ],
				[ 'shape' => 'InvalidProtocolSettings', ],
				[ 'shape' => 'InvalidTTLOrder', ],
				[ 'shape' => 'InvalidWebACLId', ],
				[ 'shape' => 'TooManyOriginCustomHeaders', ],
				[ 'shape' => 'InvalidTagging', ],
			],
		],
		'CreateInvalidation'                      => [
			'name'   => 'CreateInvalidation2016_08_01',
			'http'   => [
				'method'       => 'POST',
				'requestUri'   => '/2016-08-01/distribution/{DistributionId}/invalidation',
				'responseCode' => 201,
			],
			'input'  => [ 'shape' => 'CreateInvalidationRequest', ],
			'output' => [ 'shape' => 'CreateInvalidationResult', ],
			'errors' => [
				[ 'shape' => 'AccessDenied', ],
				[ 'shape' => 'MissingBody', ],
				[ 'shape' => 'InvalidArgument', ],
				[ 'shape' => 'NoSuchDistribution', ],
				[ 'shape' => 'BatchTooLarge', ],
				[ 'shape' => 'TooManyInvalidationsInProgress', ],
				[ 'shape' => 'InconsistentQuantities', ],
			],
		],
		'CreateStreamingDistribution'             => [
			'name'   => 'CreateStreamingDistribution2016_08_01',
			'http'   => [
				'method'       => 'POST',
				'requestUri'   => '/2016-08-01/streaming-distribution',
				'responseCode' => 201,
			],
			'input'  => [ 'shape' => 'CreateStreamingDistributionRequest', ],
			'output' => [ 'shape' => 'CreateStreamingDistributionResult', ],
			'errors' => [
				[ 'shape' => 'CNAMEAlreadyExists', ],
				[ 'shape' => 'StreamingDistributionAlreadyExists', ],
				[ 'shape' => 'InvalidOrigin', ],
				[ 'shape' => 'InvalidOriginAccessIdentity', ],
				[ 'shape' => 'AccessDenied', ],
				[ 'shape' => 'TooManyTrustedSigners', ],
				[ 'shape' => 'TrustedSignerDoesNotExist', ],
				[ 'shape' => 'MissingBody', ],
				[ 'shape' => 'TooManyStreamingDistributionCNAMEs', ],
				[ 'shape' => 'TooManyStreamingDistributions', ],
				[ 'shape' => 'InvalidArgument', ],
				[ 'shape' => 'InconsistentQuantities', ],
			],
		],
		'CreateStreamingDistributionWithTags'     => [
			'name'   => 'CreateStreamingDistributionWithTags2016_08_01',
			'http'   => [
				'method'       => 'POST',
				'requestUri'   => '/2016-08-01/streaming-distribution?WithTags',
				'responseCode' => 201,
			],
			'input'  => [ 'shape' => 'CreateStreamingDistributionWithTagsRequest', ],
			'output' => [ 'shape' => 'CreateStreamingDistributionWithTagsResult', ],
			'errors' => [
				[ 'shape' => 'CNAMEAlreadyExists', ],
				[ 'shape' => 'StreamingDistributionAlreadyExists', ],
				[ 'shape' => 'InvalidOrigin', ],
				[ 'shape' => 'InvalidOriginAccessIdentity', ],
				[ 'shape' => 'AccessDenied', ],
				[ 'shape' => 'TooManyTrustedSigners', ],
				[ 'shape' => 'TrustedSignerDoesNotExist', ],
				[ 'shape' => 'MissingBody', ],
				[ 'shape' => 'TooManyStreamingDistributionCNAMEs', ],
				[ 'shape' => 'TooManyStreamingDistributions', ],
				[ 'shape' => 'InvalidArgument', ],
				[ 'shape' => 'InconsistentQuantities', ],
				[ 'shape' => 'InvalidTagging', ],
			],
		],
		'DeleteCloudFrontOriginAccessIdentity'    => [
			'name'   => 'DeleteCloudFrontOriginAccessIdentity2016_08_01',
			'http'   => [
				'method'       => 'DELETE',
				'requestUri'   => '/2016-08-01/origin-access-identity/cloudfront/{Id}',
				'responseCode' => 204,
			],
			'input'  => [ 'shape' => 'DeleteCloudFrontOriginAccessIdentityRequest', ],
			'errors' => [
				[ 'shape' => 'AccessDenied', ],
				[ 'shape' => 'InvalidIfMatchVersion', ],
				[ 'shape' => 'NoSuchCloudFrontOriginAccessIdentity', ],
				[ 'shape' => 'PreconditionFailed', ],
				[ 'shape' => 'CloudFrontOriginAccessIdentityInUse', ],
			],
		],
		'DeleteDistribution'                      => [
			'name'   => 'DeleteDistribution2016_08_01',
			'http'   => [
				'method'       => 'DELETE',
				'requestUri'   => '/2016-08-01/distribution/{Id}',
				'responseCode' => 204,
			],
			'input'  => [ 'shape' => 'DeleteDistributionRequest', ],
			'errors' => [
				[ 'shape' => 'AccessDenied', ],
				[ 'shape' => 'DistributionNotDisabled', ],
				[ 'shape' => 'InvalidIfMatchVersion', ],
				[ 'shape' => 'NoSuchDistribution', ],
				[ 'shape' => 'PreconditionFailed', ],
			],
		],
		'DeleteStreamingDistribution'             => [
			'name'   => 'DeleteStreamingDistribution2016_08_01',
			'http'   => [
				'method'       => 'DELETE',
				'requestUri'   => '/2016-08-01/streaming-distribution/{Id}',
				'responseCode' => 204,
			],
			'input'  => [ 'shape' => 'DeleteStreamingDistributionRequest', ],
			'errors' => [
				[ 'shape' => 'AccessDenied', ],
				[ 'shape' => 'StreamingDistributionNotDisabled', ],
				[ 'shape' => 'InvalidIfMatchVersion', ],
				[ 'shape' => 'NoSuchStreamingDistribution', ],
				[ 'shape' => 'PreconditionFailed', ],
			],
		],
		'GetCloudFrontOriginAccessIdentity'       => [
			'name'   => 'GetCloudFrontOriginAccessIdentity2016_08_01',
			'http'   => [
				'method'     => 'GET',
				'requestUri' => '/2016-08-01/origin-access-identity/cloudfront/{Id}',
			],
			'input'  => [ 'shape' => 'GetCloudFrontOriginAccessIdentityRequest', ],
			'output' => [ 'shape' => 'GetCloudFrontOriginAccessIdentityResult', ],
			'errors' => [
				[ 'shape' => 'NoSuchCloudFrontOriginAccessIdentity', ],
				[ 'shape' => 'AccessDenied', ],
			],
		],
		'GetCloudFrontOriginAccessIdentityConfig' => [
			'name'   => 'GetCloudFrontOriginAccessIdentityConfig2016_08_01',
			'http'   => [
				'method'     => 'GET',
				'requestUri' => '/2016-08-01/origin-access-identity/cloudfront/{Id}/config',
			],
			'input'  => [ 'shape' => 'GetCloudFrontOriginAccessIdentityConfigRequest', ],
			'output' => [ 'shape' => 'GetCloudFrontOriginAccessIdentityConfigResult', ],
			'errors' => [
				[ 'shape' => 'NoSuchCloudFrontOriginAccessIdentity', ],
				[ 'shape' => 'AccessDenied', ],
			],
		],
		'GetDistribution'                         => [
			'name'   => 'GetDistribution2016_08_01',
			'http'   => [
				'method'     => 'GET',
				'requestUri' => '/2016-08-01/distribution/{Id}',
			],
			'input'  => [ 'shape' => 'GetDistributionRequest', ],
			'output' => [ 'shape' => 'GetDistributionResult', ],
			'errors' => [
				[ 'shape' => 'NoSuchDistribution', ],
				[ 'shape' => 'AccessDenied', ],
			],
		],
		'GetDistributionConfig'                   => [
			'name'   => 'GetDistributionConfig2016_08_01',
			'http'   => [
				'method'     => 'GET',
				'requestUri' => '/2016-08-01/distribution/{Id}/config',
			],
			'input'  => [ 'shape' => 'GetDistributionConfigRequest', ],
			'output' => [ 'shape' => 'GetDistributionConfigResult', ],
			'errors' => [
				[ 'shape' => 'NoSuchDistribution', ],
				[ 'shape' => 'AccessDenied', ],
			],
		],
		'GetInvalidation'                         => [
			'name'   => 'GetInvalidation2016_08_01',
			'http'   => [
				'method'     => 'GET',
				'requestUri' => '/2016-08-01/distribution/{DistributionId}/invalidation/{Id}',
			],
			'input'  => [ 'shape' => 'GetInvalidationRequest', ],
			'output' => [ 'shape' => 'GetInvalidationResult', ],
			'errors' => [
				[ 'shape' => 'NoSuchInvalidation', ],
				[ 'shape' => 'NoSuchDistribution', ],
				[ 'shape' => 'AccessDenied', ],
			],
		],
		'GetStreamingDistribution'                => [
			'name'   => 'GetStreamingDistribution2016_08_01',
			'http'   => [
				'method'     => 'GET',
				'requestUri' => '/2016-08-01/streaming-distribution/{Id}',
			],
			'input'  => [ 'shape' => 'GetStreamingDistributionRequest', ],
			'output' => [ 'shape' => 'GetStreamingDistributionResult', ],
			'errors' => [
				[ 'shape' => 'NoSuchStreamingDistribution', ],
				[ 'shape' => 'AccessDenied', ],
			],
		],
		'GetStreamingDistributionConfig'          => [
			'name'   => 'GetStreamingDistributionConfig2016_08_01',
			'http'   => [
				'method'     => 'GET',
				'requestUri' => '/2016-08-01/streaming-distribution/{Id}/config',
			],
			'input'  => [ 'shape' => 'GetStreamingDistributionConfigRequest', ],
			'output' => [ 'shape' => 'GetStreamingDistributionConfigResult', ],
			'errors' => [
				[ 'shape' => 'NoSuchStreamingDistribution', ],
				[ 'shape' => 'AccessDenied', ],
			],
		],
		'ListCloudFrontOriginAccessIdentities'    => [
			'name'   => 'ListCloudFrontOriginAccessIdentities2016_08_01',
			'http'   => [
				'method'     => 'GET',
				'requestUri' => '/2016-08-01/origin-access-identity/cloudfront',
			],
			'input'  => [ 'shape' => 'ListCloudFrontOriginAccessIdentitiesRequest', ],
			'output' => [ 'shape' => 'ListCloudFrontOriginAccessIdentitiesResult', ],
			'errors' => [ [ 'shape' => 'InvalidArgument', ], ],
		],
		'ListDistributions'                       => [
			'name'   => 'ListDistributions2016_08_01',
			'http'   => [
				'method'     => 'GET',
				'requestUri' => '/2016-08-01/distribution',
			],
			'input'  => [ 'shape' => 'ListDistributionsRequest', ],
			'output' => [ 'shape' => 'ListDistributionsResult', ],
			'errors' => [ [ 'shape' => 'InvalidArgument', ], ],
		],
		'ListDistributionsByWebACLId'             => [
			'name'   => 'ListDistributionsByWebACLId2016_08_01',
			'http'   => [
				'method'     => 'GET',
				'requestUri' => '/2016-08-01/distributionsByWebACLId/{WebACLId}',
			],
			'input'  => [ 'shape' => 'ListDistributionsByWebACLIdRequest', ],
			'output' => [ 'shape' => 'ListDistributionsByWebACLIdResult', ],
			'errors' => [
				[ 'shape' => 'InvalidArgument', ],
				[ 'shape' => 'InvalidWebACLId', ],
			],
		],
		'ListInvalidations'                       => [
			'name'   => 'ListInvalidations2016_08_01',
			'http'   => [
				'method'     => 'GET',
				'requestUri' => '/2016-08-01/distribution/{DistributionId}/invalidation',
			],
			'input'  => [ 'shape' => 'ListInvalidationsRequest', ],
			'output' => [ 'shape' => 'ListInvalidationsResult', ],
			'errors' => [
				[ 'shape' => 'InvalidArgument', ],
				[ 'shape' => 'NoSuchDistribution', ],
				[ 'shape' => 'AccessDenied', ],
			],
		],
		'ListStreamingDistributions'              => [
			'name'   => 'ListStreamingDistributions2016_08_01',
			'http'   => [
				'method'     => 'GET',
				'requestUri' => '/2016-08-01/streaming-distribution',
			],
			'input'  => [ 'shape' => 'ListStreamingDistributionsRequest', ],
			'output' => [ 'shape' => 'ListStreamingDistributionsResult', ],
			'errors' => [ [ 'shape' => 'InvalidArgument', ], ],
		],
		'ListTagsForResource'                     => [
			'name'   => 'ListTagsForResource2016_08_01',
			'http'   => [
				'method'     => 'GET',
				'requestUri' => '/2016-08-01/tagging',
			],
			'input'  => [ 'shape' => 'ListTagsForResourceRequest', ],
			'output' => [ 'shape' => 'ListTagsForResourceResult', ],
			'errors' => [
				[ 'shape' => 'AccessDenied', ],
				[ 'shape' => 'InvalidArgument', ],
				[ 'shape' => 'InvalidTagging', ],
				[ 'shape' => 'NoSuchResource', ],
			],
		],
		'TagResource'                             => [
			'name'   => 'TagResource2016_08_01',
			'http'   => [
				'method'       => 'POST',
				'requestUri'   => '/2016-08-01/tagging?Operation=Tag',
				'responseCode' => 204,
			],
			'input'  => [ 'shape' => 'TagResourceRequest', ],
			'errors' => [
				[ 'shape' => 'AccessDenied', ],
				[ 'shape' => 'InvalidArgument', ],
				[ 'shape' => 'InvalidTagging', ],
				[ 'shape' => 'NoSuchResource', ],
			],
		],
		'UntagResource'                           => [
			'name'   => 'UntagResource2016_08_01',
			'http'   => [
				'method'       => 'POST',
				'requestUri'   => '/2016-08-01/tagging?Operation=Untag',
				'responseCode' => 204,
			],
			'input'  => [ 'shape' => 'UntagResourceRequest', ],
			'errors' => [
				[ 'shape' => 'AccessDenied', ],
				[ 'shape' => 'InvalidArgument', ],
				[ 'shape' => 'InvalidTagging', ],
				[ 'shape' => 'NoSuchResource', ],
			],
		],
		'UpdateCloudFrontOriginAccessIdentity'    => [
			'name'   => 'UpdateCloudFrontOriginAccessIdentity2016_08_01',
			'http'   => [
				'method'     => 'PUT',
				'requestUri' => '/2016-08-01/origin-access-identity/cloudfront/{Id}/config',
			],
			'input'  => [ 'shape' => 'UpdateCloudFrontOriginAccessIdentityRequest', ],
			'output' => [ 'shape' => 'UpdateCloudFrontOriginAccessIdentityResult', ],
			'errors' => [
				[ 'shape' => 'AccessDenied', ],
				[ 'shape' => 'IllegalUpdate', ],
				[ 'shape' => 'InvalidIfMatchVersion', ],
				[ 'shape' => 'MissingBody', ],
				[ 'shape' => 'NoSuchCloudFrontOriginAccessIdentity', ],
				[ 'shape' => 'PreconditionFailed', ],
				[ 'shape' => 'InvalidArgument', ],
				[ 'shape' => 'InconsistentQuantities', ],
			],
		],
		'UpdateDistribution'                      => [
			'name'   => 'UpdateDistribution2016_08_01',
			'http'   => [ 'method' => 'PUT', 'requestUri' => '/2016-08-01/distribution/{Id}/config', ],
			'input'  => [ 'shape' => 'UpdateDistributionRequest', ],
			'output' => [ 'shape' => 'UpdateDistributionResult', ],
			'errors' => [
				[ 'shape' => 'AccessDenied', ],
				[ 'shape' => 'CNAMEAlreadyExists', ],
				[ 'shape' => 'IllegalUpdate', ],
				[ 'shape' => 'InvalidIfMatchVersion', ],
				[ 'shape' => 'MissingBody', ],
				[ 'shape' => 'NoSuchDistribution', ],
				[ 'shape' => 'PreconditionFailed', ],
				[ 'shape' => 'TooManyDistributionCNAMEs', ],
				[ 'shape' => 'InvalidDefaultRootObject', ],
				[ 'shape' => 'InvalidRelativePath', ],
				[ 'shape' => 'InvalidErrorCode', ],
				[ 'shape' => 'InvalidResponseCode', ],
				[ 'shape' => 'InvalidArgument', ],
				[ 'shape' => 'InvalidOriginAccessIdentity', ],
				[ 'shape' => 'TooManyTrustedSigners', ],
				[ 'shape' => 'TrustedSignerDoesNotExist', ],
				[ 'shape' => 'InvalidViewerCertificate', ],
				[ 'shape' => 'InvalidMinimumProtocolVersion', ],
				[ 'shape' => 'InvalidRequiredProtocol', ],
				[ 'shape' => 'NoSuchOrigin', ],
				[ 'shape' => 'TooManyOrigins', ],
				[ 'shape' => 'TooManyCacheBehaviors', ],
				[ 'shape' => 'TooManyCookieNamesInWhiteList', ],
				[ 'shape' => 'InvalidForwardCookies', ],
				[ 'shape' => 'TooManyHeadersInForwardedValues', ],
				[ 'shape' => 'InvalidHeadersForS3Origin', ],
				[ 'shape' => 'InconsistentQuantities', ],
				[ 'shape' => 'TooManyCertificates', ],
				[ 'shape' => 'InvalidLocationCode', ],
				[ 'shape' => 'InvalidGeoRestrictionParameter', ],
				[ 'shape' => 'InvalidTTLOrder', ],
				[ 'shape' => 'InvalidWebACLId', ],
				[ 'shape' => 'TooManyOriginCustomHeaders', ],
			],
		],
		'UpdateStreamingDistribution'             => [
			'name'   => 'UpdateStreamingDistribution2016_08_01',
			'http'   => [
				'method'     => 'PUT',
				'requestUri' => '/2016-08-01/streaming-distribution/{Id}/config',
			],
			'input'  => [ 'shape' => 'UpdateStreamingDistributionRequest', ],
			'output' => [ 'shape' => 'UpdateStreamingDistributionResult', ],
			'errors' => [
				[ 'shape' => 'AccessDenied', ],
				[ 'shape' => 'CNAMEAlreadyExists', ],
				[ 'shape' => 'IllegalUpdate', ],
				[ 'shape' => 'InvalidIfMatchVersion', ],
				[ 'shape' => 'MissingBody', ],
				[ 'shape' => 'NoSuchStreamingDistribution', ],
				[ 'shape' => 'PreconditionFailed', ],
				[ 'shape' => 'TooManyStreamingDistributionCNAMEs', ],
				[ 'shape' => 'InvalidArgument', ],
				[ 'shape' => 'InvalidOriginAccessIdentity', ],
				[ 'shape' => 'TooManyTrustedSigners', ],
				[ 'shape' => 'TrustedSignerDoesNotExist', ],
				[ 'shape' => 'InconsistentQuantities', ],
			],
		],
	],
	'shapes'     => [
		'AccessDenied'                                   => [
			'type'      => 'structure',
			'members'   => [ 'Message' => [ 'shape' => 'string', ], ],
			'error'     => [ 'httpStatusCode' => 403, ],
			'exception' => true,
		],
		'ActiveTrustedSigners'                           => [
			'type'     => 'structure',
			'required' => [ 'Enabled', 'Quantity', ],
			'members'  => [
				'Enabled'  => [ 'shape' => 'boolean', ],
				'Quantity' => [ 'shape' => 'integer', ],
				'Items'    => [ 'shape' => 'SignerList', ],
			],
		],
		'AliasList'                                      => [
			'type'   => 'list',
			'member' => [ 'shape' => 'string', 'locationName' => 'CNAME', ],
		],
		'Aliases'                                        => [
			'type'     => 'structure',
			'required' => [ 'Quantity', ],
			'members'  => [
				'Quantity' => [ 'shape' => 'integer', ],
				'Items'    => [ 'shape' => 'AliasList', ],
			],
		],
		'AllowedMethods'                                 => [
			'type'     => 'structure',
			'required' => [ 'Quantity', 'Items', ],
			'members'  => [
				'Quantity'      => [ 'shape' => 'integer', ],
				'Items'         => [ 'shape' => 'MethodsList', ],
				'CachedMethods' => [ 'shape' => 'CachedMethods', ],
			],
		],
		'AwsAccountNumberList'                           => [
			'type'   => 'list',
			'member' => [ 'shape' => 'string', 'locationName' => 'AwsAccountNumber', ],
		],
		'BatchTooLarge'                                  => [
			'type'      => 'structure',
			'members'   => [ 'Message' => [ 'shape' => 'string', ], ],
			'error'     => [ 'httpStatusCode' => 413, ],
			'exception' => true,
		],
		'CNAMEAlreadyExists'                             => [
			'type'      => 'structure',
			'members'   => [ 'Message' => [ 'shape' => 'string', ], ],
			'error'     => [ 'httpStatusCode' => 409, ],
			'exception' => true,
		],
		'CacheBehavior'                                  => [
			'type'     => 'structure',
			'required' => [
				'PathPattern',
				'TargetOriginId',
				'ForwardedValues',
				'TrustedSigners',
				'ViewerProtocolPolicy',
				'MinTTL',
			],
			'members'  => [
				'PathPattern'          => [ 'shape' => 'string', ],
				'TargetOriginId'       => [ 'shape' => 'string', ],
				'ForwardedValues'      => [ 'shape' => 'ForwardedValues', ],
				'TrustedSigners'       => [ 'shape' => 'TrustedSigners', ],
				'ViewerProtocolPolicy' => [ 'shape' => 'ViewerProtocolPolicy', ],
				'MinTTL'               => [ 'shape' => 'long', ],
				'AllowedMethods'       => [ 'shape' => 'AllowedMethods', ],
				'SmoothStreaming'      => [ 'shape' => 'boolean', ],
				'DefaultTTL'           => [ 'shape' => 'long', ],
				'MaxTTL'               => [ 'shape' => 'long', ],
				'Compress'             => [ 'shape' => 'boolean', ],
			],
		],
		'CacheBehaviorList'                              => [
			'type'   => 'list',
			'member' => [ 'shape' => 'CacheBehavior', 'locationName' => 'CacheBehavior', ],
		],
		'CacheBehaviors'                                 => [
			'type'     => 'structure',
			'required' => [ 'Quantity', ],
			'members'  => [
				'Quantity' => [ 'shape' => 'integer', ],
				'Items'    => [ 'shape' => 'CacheBehaviorList', ],
			],
		],
		'CachedMethods'                                  => [
			'type'     => 'structure',
			'required' => [ 'Quantity', 'Items', ],
			'members'  => [
				'Quantity' => [ 'shape' => 'integer', ],
				'Items'    => [ 'shape' => 'MethodsList', ],
			],
		],
		'CertificateSource'                              => [
			'type' => 'string',
			'enum' => [ 'cloudfront', 'iam', 'acm', ],
		],
		'CloudFrontOriginAccessIdentity'                 => [
			'type'     => 'structure',
			'required' => [ 'Id', 'S3CanonicalUserId', ],
			'members'  => [
				'Id'                                   => [ 'shape' => 'string', ],
				'S3CanonicalUserId'                    => [ 'shape' => 'string', ],
				'CloudFrontOriginAccessIdentityConfig' => [ 'shape' => 'CloudFrontOriginAccessIdentityConfig', ],
			],
		],
		'CloudFrontOriginAccessIdentityAlreadyExists'    => [
			'type'      => 'structure',
			'members'   => [ 'Message' => [ 'shape' => 'string', ], ],
			'error'     => [ 'httpStatusCode' => 409, ],
			'exception' => true,
		],
		'CloudFrontOriginAccessIdentityConfig'           => [
			'type'     => 'structure',
			'required' => [ 'CallerReference', 'Comment', ],
			'members'  => [
				'CallerReference' => [ 'shape' => 'string', ],
				'Comment'         => [ 'shape' => 'string', ],
			],
		],
		'CloudFrontOriginAccessIdentityInUse'            => [
			'type'      => 'structure',
			'members'   => [ 'Message' => [ 'shape' => 'string', ], ],
			'error'     => [ 'httpStatusCode' => 409, ],
			'exception' => true,
		],
		'CloudFrontOriginAccessIdentityList'             => [
			'type'     => 'structure',
			'required' => [
				'Marker',
				'MaxItems',
				'IsTruncated',
				'Quantity',
			],
			'members'  => [
				'Marker'      => [ 'shape' => 'string', ],
				'NextMarker'  => [ 'shape' => 'string', ],
				'MaxItems'    => [ 'shape' => 'integer', ],
				'IsTruncated' => [ 'shape' => 'boolean', ],
				'Quantity'    => [ 'shape' => 'integer', ],
				'Items'       => [ 'shape' => 'CloudFrontOriginAccessIdentitySummaryList', ],
			],
		],
		'CloudFrontOriginAccessIdentitySummary'          => [
			'type'     => 'structure',
			'required' => [ 'Id', 'S3CanonicalUserId', 'Comment', ],
			'members'  => [
				'Id'                => [ 'shape' => 'string', ],
				'S3CanonicalUserId' => [ 'shape' => 'string', ],
				'Comment'           => [ 'shape' => 'string', ],
			],
		],
		'CloudFrontOriginAccessIdentitySummaryList'      => [
			'type'   => 'list',
			'member' => [
				'shape'        => 'CloudFrontOriginAccessIdentitySummary',
				'locationName' => 'CloudFrontOriginAccessIdentitySummary',
			],
		],
		'CookieNameList'                                 => [
			'type'   => 'list',
			'member' => [
				'shape'        => 'string',
				'locationName' => 'Name',
			],
		],
		'CookieNames'                                    => [
			'type'     => 'structure',
			'required' => [ 'Quantity', ],
			'members'  => [
				'Quantity' => [ 'shape' => 'integer', ],
				'Items'    => [ 'shape' => 'CookieNameList', ],
			],
		],
		'CookiePreference'                               => [
			'type'     => 'structure',
			'required' => [ 'Forward', ],
			'members'  => [
				'Forward'          => [ 'shape' => 'ItemSelection', ],
				'WhitelistedNames' => [ 'shape' => 'CookieNames', ],
			],
		],
		'CreateCloudFrontOriginAccessIdentityRequest'    => [
			'type'     => 'structure',
			'required' => [ 'CloudFrontOriginAccessIdentityConfig', ],
			'members'  => [
				'CloudFrontOriginAccessIdentityConfig' => [
					'shape'        => 'CloudFrontOriginAccessIdentityConfig',
					'locationName' => 'CloudFrontOriginAccessIdentityConfig',
					'xmlNamespace' => [ 'uri' => 'http://cloudfront.amazonaws.com/doc/2016-08-01/', ],
				],
			],
			'payload'  => 'CloudFrontOriginAccessIdentityConfig',
		],
		'CreateCloudFrontOriginAccessIdentityResult'     => [
			'type'    => 'structure',
			'members' => [
				'CloudFrontOriginAccessIdentity' => [ 'shape' => 'CloudFrontOriginAccessIdentity', ],
				'Location'                       => [
					'shape'        => 'string',
					'location'     => 'header',
					'locationName' => 'Location',
				],
				'ETag'                           => [
					'shape'        => 'string',
					'location'     => 'header',
					'locationName' => 'ETag',
				],
			],
			'payload' => 'CloudFrontOriginAccessIdentity',
		],
		'CreateDistributionRequest'                      => [
			'type'     => 'structure',
			'required' => [ 'DistributionConfig', ],
			'members'  => [
				'DistributionConfig' => [
					'shape'        => 'DistributionConfig',
					'locationName' => 'DistributionConfig',
					'xmlNamespace' => [ 'uri' => 'http://cloudfront.amazonaws.com/doc/2016-08-01/', ],
				],
			],
			'payload'  => 'DistributionConfig',
		],
		'CreateDistributionResult'                       => [
			'type'    => 'structure',
			'members' => [
				'Distribution' => [ 'shape' => 'Distribution', ],
				'Location'     => [
					'shape'        => 'string',
					'location'     => 'header',
					'locationName' => 'Location',
				],
				'ETag'         => [
					'shape'        => 'string',
					'location'     => 'header',
					'locationName' => 'ETag',
				],
			],
			'payload' => 'Distribution',
		],
		'CreateDistributionWithTagsRequest'              => [
			'type'     => 'structure',
			'required' => [ 'DistributionConfigWithTags', ],
			'members'  => [
				'DistributionConfigWithTags' => [
					'shape'        => 'DistributionConfigWithTags',
					'locationName' => 'DistributionConfigWithTags',
					'xmlNamespace' => [ 'uri' => 'http://cloudfront.amazonaws.com/doc/2016-08-01/', ],
				],
			],
			'payload'  => 'DistributionConfigWithTags',
		],
		'CreateDistributionWithTagsResult'               => [
			'type'    => 'structure',
			'members' => [
				'Distribution' => [ 'shape' => 'Distribution', ],
				'Location'     => [
					'shape'        => 'string',
					'location'     => 'header',
					'locationName' => 'Location',
				],
				'ETag'         => [
					'shape'        => 'string',
					'location'     => 'header',
					'locationName' => 'ETag',
				],
			],
			'payload' => 'Distribution',
		],
		'CreateInvalidationRequest'                      => [
			'type'     => 'structure',
			'required' => [ 'DistributionId', 'InvalidationBatch', ],
			'members'  => [
				'DistributionId'    => [
					'shape'        => 'string',
					'location'     => 'uri',
					'locationName' => 'DistributionId',
				],
				'InvalidationBatch' => [
					'shape'        => 'InvalidationBatch',
					'locationName' => 'InvalidationBatch',
					'xmlNamespace' => [ 'uri' => 'http://cloudfront.amazonaws.com/doc/2016-08-01/', ],
				],
			],
			'payload'  => 'InvalidationBatch',
		],
		'CreateInvalidationResult'                       => [
			'type'    => 'structure',
			'members' => [
				'Location'     => [
					'shape'        => 'string',
					'location'     => 'header',
					'locationName' => 'Location',
				],
				'Invalidation' => [ 'shape' => 'Invalidation', ],
			],
			'payload' => 'Invalidation',
		],
		'CreateStreamingDistributionRequest'             => [
			'type'     => 'structure',
			'required' => [ 'StreamingDistributionConfig', ],
			'members'  => [
				'StreamingDistributionConfig' => [
					'shape'        => 'StreamingDistributionConfig',
					'locationName' => 'StreamingDistributionConfig',
					'xmlNamespace' => [ 'uri' => 'http://cloudfront.amazonaws.com/doc/2016-08-01/', ],
				],
			],
			'payload'  => 'StreamingDistributionConfig',
		],
		'CreateStreamingDistributionResult'              => [
			'type'    => 'structure',
			'members' => [
				'StreamingDistribution' => [ 'shape' => 'StreamingDistribution', ],
				'Location'              => [
					'shape'        => 'string',
					'location'     => 'header',
					'locationName' => 'Location',
				],
				'ETag'                  => [
					'shape'        => 'string',
					'location'     => 'header',
					'locationName' => 'ETag',
				],
			],
			'payload' => 'StreamingDistribution',
		],
		'CreateStreamingDistributionWithTagsRequest'     => [
			'type'     => 'structure',
			'required' => [ 'StreamingDistributionConfigWithTags', ],
			'members'  => [
				'StreamingDistributionConfigWithTags' => [
					'shape'        => 'StreamingDistributionConfigWithTags',
					'locationName' => 'StreamingDistributionConfigWithTags',
					'xmlNamespace' => [ 'uri' => 'http://cloudfront.amazonaws.com/doc/2016-08-01/', ],
				],
			],
			'payload'  => 'StreamingDistributionConfigWithTags',
		],
		'CreateStreamingDistributionWithTagsResult'      => [
			'type'    => 'structure',
			'members' => [
				'StreamingDistribution' => [ 'shape' => 'StreamingDistribution', ],
				'Location'              => [
					'shape'        => 'string',
					'location'     => 'header',
					'locationName' => 'Location',
				],
				'ETag'                  => [
					'shape'        => 'string',
					'location'     => 'header',
					'locationName' => 'ETag',
				],
			],
			'payload' => 'StreamingDistribution',
		],
		'CustomErrorResponse'                            => [
			'type'     => 'structure',
			'required' => [ 'ErrorCode', ],
			'members'  => [
				'ErrorCode'          => [ 'shape' => 'integer', ],
				'ResponsePagePath'   => [ 'shape' => 'string', ],
				'ResponseCode'       => [ 'shape' => 'string', ],
				'ErrorCachingMinTTL' => [ 'shape' => 'long', ],
			],
		],
		'CustomErrorResponseList'                        => [
			'type'   => 'list',
			'member' => [
				'shape'        => 'CustomErrorResponse',
				'locationName' => 'CustomErrorResponse',
			],
		],
		'CustomErrorResponses'                           => [
			'type'     => 'structure',
			'required' => [ 'Quantity', ],
			'members'  => [
				'Quantity' => [ 'shape' => 'integer', ],
				'Items'    => [ 'shape' => 'CustomErrorResponseList', ],
			],
		],
		'CustomHeaders'                                  => [
			'type'     => 'structure',
			'required' => [ 'Quantity', ],
			'members'  => [
				'Quantity' => [ 'shape' => 'integer', ],
				'Items'    => [ 'shape' => 'OriginCustomHeadersList', ],
			],
		],
		'CustomOriginConfig'                             => [
			'type'     => 'structure',
			'required' => [
				'HTTPPort',
				'HTTPSPort',
				'OriginProtocolPolicy',
			],
			'members'  => [
				'HTTPPort'             => [ 'shape' => 'integer', ],
				'HTTPSPort'            => [ 'shape' => 'integer', ],
				'OriginProtocolPolicy' => [ 'shape' => 'OriginProtocolPolicy', ],
				'OriginSslProtocols'   => [ 'shape' => 'OriginSslProtocols', ],
			],
		],
		'DefaultCacheBehavior'                           => [
			'type'     => 'structure',
			'required' => [
				'TargetOriginId',
				'ForwardedValues',
				'TrustedSigners',
				'ViewerProtocolPolicy',
				'MinTTL',
			],
			'members'  => [
				'TargetOriginId'       => [ 'shape' => 'string', ],
				'ForwardedValues'      => [ 'shape' => 'ForwardedValues', ],
				'TrustedSigners'       => [ 'shape' => 'TrustedSigners', ],
				'ViewerProtocolPolicy' => [ 'shape' => 'ViewerProtocolPolicy', ],
				'MinTTL'               => [ 'shape' => 'long', ],
				'AllowedMethods'       => [ 'shape' => 'AllowedMethods', ],
				'SmoothStreaming'      => [ 'shape' => 'boolean', ],
				'DefaultTTL'           => [ 'shape' => 'long', ],
				'MaxTTL'               => [ 'shape' => 'long', ],
				'Compress'             => [ 'shape' => 'boolean', ],
			],
		],
		'DeleteCloudFrontOriginAccessIdentityRequest'    => [
			'type'     => 'structure',
			'required' => [ 'Id', ],
			'members'  => [
				'Id'      => [
					'shape'        => 'string',
					'location'     => 'uri',
					'locationName' => 'Id',
				],
				'IfMatch' => [
					'shape'        => 'string',
					'location'     => 'header',
					'locationName' => 'If-Match',
				],
			],
		],
		'DeleteDistributionRequest'                      => [
			'type'     => 'structure',
			'required' => [ 'Id', ],
			'members'  => [
				'Id'      => [
					'shape'        => 'string',
					'location'     => 'uri',
					'locationName' => 'Id',
				],
				'IfMatch' => [
					'shape'        => 'string',
					'location'     => 'header',
					'locationName' => 'If-Match',
				],
			],
		],
		'DeleteStreamingDistributionRequest'             => [
			'type'     => 'structure',
			'required' => [ 'Id', ],
			'members'  => [
				'Id'      => [
					'shape'        => 'string',
					'location'     => 'uri',
					'locationName' => 'Id',
				],
				'IfMatch' => [
					'shape'        => 'string',
					'location'     => 'header',
					'locationName' => 'If-Match',
				],
			],
		],
		'Distribution'                                   => [
			'type'     => 'structure',
			'required' => [
				'Id',
				'ARN',
				'Status',
				'LastModifiedTime',
				'InProgressInvalidationBatches',
				'DomainName',
				'ActiveTrustedSigners',
				'DistributionConfig',
			],
			'members'  => [
				'Id'                            => [ 'shape' => 'string', ],
				'ARN'                           => [ 'shape' => 'string', ],
				'Status'                        => [ 'shape' => 'string', ],
				'LastModifiedTime'              => [ 'shape' => 'timestamp', ],
				'InProgressInvalidationBatches' => [ 'shape' => 'integer', ],
				'DomainName'                    => [ 'shape' => 'string', ],
				'ActiveTrustedSigners'          => [ 'shape' => 'ActiveTrustedSigners', ],
				'DistributionConfig'            => [ 'shape' => 'DistributionConfig', ],
			],
		],
		'DistributionAlreadyExists'                      => [
			'type'      => 'structure',
			'members'   => [ 'Message' => [ 'shape' => 'string', ], ],
			'error'     => [ 'httpStatusCode' => 409, ],
			'exception' => true,
		],
		'DistributionConfig'                             => [
			'type'     => 'structure',
			'required' => [
				'CallerReference',
				'Origins',
				'DefaultCacheBehavior',
				'Comment',
				'Enabled',
			],
			'members'  => [
				'CallerReference'      => [ 'shape' => 'string', ],
				'Aliases'              => [ 'shape' => 'Aliases', ],
				'DefaultRootObject'    => [ 'shape' => 'string', ],
				'Origins'              => [ 'shape' => 'Origins', ],
				'DefaultCacheBehavior' => [ 'shape' => 'DefaultCacheBehavior', ],
				'CacheBehaviors'       => [ 'shape' => 'CacheBehaviors', ],
				'CustomErrorResponses' => [ 'shape' => 'CustomErrorResponses', ],
				'Comment'              => [ 'shape' => 'string', ],
				'Logging'              => [ 'shape' => 'LoggingConfig', ],
				'PriceClass'           => [ 'shape' => 'PriceClass', ],
				'Enabled'              => [ 'shape' => 'boolean', ],
				'ViewerCertificate'    => [ 'shape' => 'ViewerCertificate', ],
				'Restrictions'         => [ 'shape' => 'Restrictions', ],
				'WebACLId'             => [ 'shape' => 'string', ],
			],
		],
		'DistributionConfigWithTags'                     => [
			'type'     => 'structure',
			'required' => [ 'DistributionConfig', 'Tags', ],
			'members'  => [
				'DistributionConfig' => [ 'shape' => 'DistributionConfig', ],
				'Tags'               => [ 'shape' => 'Tags', ],
			],
		],
		'DistributionList'                               => [
			'type'     => 'structure',
			'required' => [
				'Marker',
				'MaxItems',
				'IsTruncated',
				'Quantity',
			],
			'members'  => [
				'Marker'      => [ 'shape' => 'string', ],
				'NextMarker'  => [ 'shape' => 'string', ],
				'MaxItems'    => [ 'shape' => 'integer', ],
				'IsTruncated' => [ 'shape' => 'boolean', ],
				'Quantity'    => [ 'shape' => 'integer', ],
				'Items'       => [ 'shape' => 'DistributionSummaryList', ],
			],
		],
		'DistributionNotDisabled'                        => [
			'type'      => 'structure',
			'members'   => [ 'Message' => [ 'shape' => 'string', ], ],
			'error'     => [ 'httpStatusCode' => 409, ],
			'exception' => true,
		],
		'DistributionSummary'                            => [
			'type'     => 'structure',
			'required' => [
				'Id',
				'ARN',
				'Status',
				'LastModifiedTime',
				'DomainName',
				'Aliases',
				'Origins',
				'DefaultCacheBehavior',
				'CacheBehaviors',
				'CustomErrorResponses',
				'Comment',
				'PriceClass',
				'Enabled',
				'ViewerCertificate',
				'Restrictions',
				'WebACLId',
			],
			'members'  => [
				'Id'                   => [ 'shape' => 'string', ],
				'ARN'                  => [ 'shape' => 'string', ],
				'Status'               => [ 'shape' => 'string', ],
				'LastModifiedTime'     => [ 'shape' => 'timestamp', ],
				'DomainName'           => [ 'shape' => 'string', ],
				'Aliases'              => [ 'shape' => 'Aliases', ],
				'Origins'              => [ 'shape' => 'Origins', ],
				'DefaultCacheBehavior' => [ 'shape' => 'DefaultCacheBehavior', ],
				'CacheBehaviors'       => [ 'shape' => 'CacheBehaviors', ],
				'CustomErrorResponses' => [ 'shape' => 'CustomErrorResponses', ],
				'Comment'              => [ 'shape' => 'string', ],
				'PriceClass'           => [ 'shape' => 'PriceClass', ],
				'Enabled'              => [ 'shape' => 'boolean', ],
				'ViewerCertificate'    => [ 'shape' => 'ViewerCertificate', ],
				'Restrictions'         => [ 'shape' => 'Restrictions', ],
				'WebACLId'             => [ 'shape' => 'string', ],
			],
		],
		'DistributionSummaryList'                        => [
			'type'   => 'list',
			'member' => [
				'shape'        => 'DistributionSummary',
				'locationName' => 'DistributionSummary',
			],
		],
		'ForwardedValues'                                => [
			'type'     => 'structure',
			'required' => [ 'QueryString', 'Cookies', ],
			'members'  => [
				'QueryString' => [ 'shape' => 'boolean', ],
				'Cookies'     => [ 'shape' => 'CookiePreference', ],
				'Headers'     => [ 'shape' => 'Headers', ],
			],
		],
		'GeoRestriction'                                 => [
			'type'     => 'structure',
			'required' => [ 'RestrictionType', 'Quantity', ],
			'members'  => [
				'RestrictionType' => [ 'shape' => 'GeoRestrictionType', ],
				'Quantity'        => [ 'shape' => 'integer', ],
				'Items'           => [ 'shape' => 'LocationList', ],
			],
		],
		'GeoRestrictionType'                             => [
			'type' => 'string',
			'enum' => [ 'blacklist', 'whitelist', 'none', ],
		],
		'GetCloudFrontOriginAccessIdentityConfigRequest' => [
			'type'     => 'structure',
			'required' => [ 'Id', ],
			'members'  => [
				'Id' => [
					'shape'        => 'string',
					'location'     => 'uri',
					'locationName' => 'Id',
				],
			],
		],
		'GetCloudFrontOriginAccessIdentityConfigResult'  => [
			'type'    => 'structure',
			'members' => [
				'CloudFrontOriginAccessIdentityConfig' => [ 'shape' => 'CloudFrontOriginAccessIdentityConfig', ],
				'ETag'                                 => [
					'shape'        => 'string',
					'location'     => 'header',
					'locationName' => 'ETag',
				],
			],
			'payload' => 'CloudFrontOriginAccessIdentityConfig',
		],
		'GetCloudFrontOriginAccessIdentityRequest'       => [
			'type'     => 'structure',
			'required' => [ 'Id', ],
			'members'  => [
				'Id' => [
					'shape'        => 'string',
					'location'     => 'uri',
					'locationName' => 'Id',
				],
			],
		],
		'GetCloudFrontOriginAccessIdentityResult'        => [
			'type'    => 'structure',
			'members' => [
				'CloudFrontOriginAccessIdentity' => [ 'shape' => 'CloudFrontOriginAccessIdentity', ],
				'ETag'                           => [
					'shape'        => 'string',
					'location'     => 'header',
					'locationName' => 'ETag',
				],
			],
			'payload' => 'CloudFrontOriginAccessIdentity',
		],
		'GetDistributionConfigRequest'                   => [
			'type'     => 'structure',
			'required' => [ 'Id', ],
			'members'  => [
				'Id' => [
					'shape'        => 'string',
					'location'     => 'uri',
					'locationName' => 'Id',
				],
			],
		],
		'GetDistributionConfigResult'                    => [
			'type'    => 'structure',
			'members' => [
				'DistributionConfig' => [ 'shape' => 'DistributionConfig', ],
				'ETag'               => [
					'shape'        => 'string',
					'location'     => 'header',
					'locationName' => 'ETag',
				],
			],
			'payload' => 'DistributionConfig',
		],
		'GetDistributionRequest'                         => [
			'type'     => 'structure',
			'required' => [ 'Id', ],
			'members'  => [
				'Id' => [
					'shape'        => 'string',
					'location'     => 'uri',
					'locationName' => 'Id',
				],
			],
		],
		'GetDistributionResult'                          => [
			'type'    => 'structure',
			'members' => [
				'Distribution' => [ 'shape' => 'Distribution', ],
				'ETag'         => [
					'shape'        => 'string',
					'location'     => 'header',
					'locationName' => 'ETag',
				],
			],
			'payload' => 'Distribution',
		],
		'GetInvalidationRequest'                         => [
			'type'     => 'structure',
			'required' => [ 'DistributionId', 'Id', ],
			'members'  => [
				'DistributionId' => [
					'shape'        => 'string',
					'location'     => 'uri',
					'locationName' => 'DistributionId',
				],
				'Id'             => [
					'shape'        => 'string',
					'location'     => 'uri',
					'locationName' => 'Id',
				],
			],
		],
		'GetInvalidationResult'                          => [
			'type'    => 'structure',
			'members' => [ 'Invalidation' => [ 'shape' => 'Invalidation', ], ],
			'payload' => 'Invalidation',
		],
		'GetStreamingDistributionConfigRequest'          => [
			'type'     => 'structure',
			'required' => [ 'Id', ],
			'members'  => [
				'Id' => [
					'shape'        => 'string',
					'location'     => 'uri',
					'locationName' => 'Id',
				],
			],
		],
		'GetStreamingDistributionConfigResult'           => [
			'type'    => 'structure',
			'members' => [
				'StreamingDistributionConfig' => [ 'shape' => 'StreamingDistributionConfig', ],
				'ETag'                        => [
					'shape'        => 'string',
					'location'     => 'header',
					'locationName' => 'ETag',
				],
			],
			'payload' => 'StreamingDistributionConfig',
		],
		'GetStreamingDistributionRequest'                => [
			'type'     => 'structure',
			'required' => [ 'Id', ],
			'members'  => [
				'Id' => [
					'shape'        => 'string',
					'location'     => 'uri',
					'locationName' => 'Id',
				],
			],
		],
		'GetStreamingDistributionResult'                 => [
			'type'    => 'structure',
			'members' => [
				'StreamingDistribution' => [ 'shape' => 'StreamingDistribution', ],
				'ETag'                  => [
					'shape'        => 'string',
					'location'     => 'header',
					'locationName' => 'ETag',
				],
			],
			'payload' => 'StreamingDistribution',
		],
		'HeaderList'                                     => [
			'type'   => 'list',
			'member' => [
				'shape'        => 'string',
				'locationName' => 'Name',
			],
		],
		'Headers'                                        => [
			'type'     => 'structure',
			'required' => [ 'Quantity', ],
			'members'  => [
				'Quantity' => [ 'shape' => 'integer', ],
				'Items'    => [ 'shape' => 'HeaderList', ],
			],
		],
		'IllegalUpdate'                                  => [
			'type'      => 'structure',
			'members'   => [ 'Message' => [ 'shape' => 'string', ], ],
			'error'     => [ 'httpStatusCode' => 400, ],
			'exception' => true,
		],
		'InconsistentQuantities'                         => [
			'type'      => 'structure',
			'members'   => [ 'Message' => [ 'shape' => 'string', ], ],
			'error'     => [ 'httpStatusCode' => 400, ],
			'exception' => true,
		],
		'InvalidArgument'                                => [
			'type'      => 'structure',
			'members'   => [ 'Message' => [ 'shape' => 'string', ], ],
			'error'     => [ 'httpStatusCode' => 400, ],
			'exception' => true,
		],
		'InvalidDefaultRootObject'                       => [
			'type'      => 'structure',
			'members'   => [ 'Message' => [ 'shape' => 'string', ], ],
			'error'     => [ 'httpStatusCode' => 400, ],
			'exception' => true,
		],
		'InvalidErrorCode'                               => [
			'type'      => 'structure',
			'members'   => [ 'Message' => [ 'shape' => 'string', ], ],
			'error'     => [ 'httpStatusCode' => 400, ],
			'exception' => true,
		],
		'InvalidForwardCookies'                          => [
			'type'      => 'structure',
			'members'   => [ 'Message' => [ 'shape' => 'string', ], ],
			'error'     => [ 'httpStatusCode' => 400, ],
			'exception' => true,
		],
		'InvalidGeoRestrictionParameter'                 => [
			'type'      => 'structure',
			'members'   => [ 'Message' => [ 'shape' => 'string', ], ],
			'error'     => [ 'httpStatusCode' => 400, ],
			'exception' => true,
		],
		'InvalidHeadersForS3Origin'                      => [
			'type'      => 'structure',
			'members'   => [ 'Message' => [ 'shape' => 'string', ], ],
			'error'     => [ 'httpStatusCode' => 400, ],
			'exception' => true,
		],
		'InvalidIfMatchVersion'                          => [
			'type'      => 'structure',
			'members'   => [ 'Message' => [ 'shape' => 'string', ], ],
			'error'     => [ 'httpStatusCode' => 400, ],
			'exception' => true,
		],
		'InvalidLocationCode'                            => [
			'type'      => 'structure',
			'members'   => [ 'Message' => [ 'shape' => 'string', ], ],
			'error'     => [ 'httpStatusCode' => 400, ],
			'exception' => true,
		],
		'InvalidMinimumProtocolVersion'                  => [
			'type'      => 'structure',
			'members'   => [ 'Message' => [ 'shape' => 'string', ], ],
			'error'     => [ 'httpStatusCode' => 400, ],
			'exception' => true,
		],
		'InvalidOrigin'                                  => [
			'type'      => 'structure',
			'members'   => [ 'Message' => [ 'shape' => 'string', ], ],
			'error'     => [ 'httpStatusCode' => 400, ],
			'exception' => true,
		],
		'InvalidOriginAccessIdentity'                    => [
			'type'      => 'structure',
			'members'   => [ 'Message' => [ 'shape' => 'string', ], ],
			'error'     => [ 'httpStatusCode' => 400, ],
			'exception' => true,
		],
		'InvalidProtocolSettings'                        => [
			'type'      => 'structure',
			'members'   => [ 'Message' => [ 'shape' => 'string', ], ],
			'error'     => [ 'httpStatusCode' => 400, ],
			'exception' => true,
		],
		'InvalidRelativePath'                            => [
			'type'      => 'structure',
			'members'   => [ 'Message' => [ 'shape' => 'string', ], ],
			'error'     => [ 'httpStatusCode' => 400, ],
			'exception' => true,
		],
		'InvalidRequiredProtocol'                        => [
			'type'      => 'structure',
			'members'   => [ 'Message' => [ 'shape' => 'string', ], ],
			'error'     => [ 'httpStatusCode' => 400, ],
			'exception' => true,
		],
		'InvalidResponseCode'                            => [
			'type'      => 'structure',
			'members'   => [ 'Message' => [ 'shape' => 'string', ], ],
			'error'     => [ 'httpStatusCode' => 400, ],
			'exception' => true,
		],
		'InvalidTTLOrder'                                => [
			'type'      => 'structure',
			'members'   => [ 'Message' => [ 'shape' => 'string', ], ],
			'error'     => [ 'httpStatusCode' => 400, ],
			'exception' => true,
		],
		'InvalidTagging'                                 => [
			'type'      => 'structure',
			'members'   => [ 'Message' => [ 'shape' => 'string', ], ],
			'error'     => [ 'httpStatusCode' => 400, ],
			'exception' => true,
		],
		'InvalidViewerCertificate'                       => [
			'type'      => 'structure',
			'members'   => [ 'Message' => [ 'shape' => 'string', ], ],
			'error'     => [ 'httpStatusCode' => 400, ],
			'exception' => true,
		],
		'InvalidWebACLId'                                => [
			'type'      => 'structure',
			'members'   => [ 'Message' => [ 'shape' => 'string', ], ],
			'error'     => [ 'httpStatusCode' => 400, ],
			'exception' => true,
		],
		'Invalidation'                                   => [
			'type'     => 'structure',
			'required' => [
				'Id',
				'Status',
				'CreateTime',
				'InvalidationBatch',
			],
			'members'  => [
				'Id'                => [ 'shape' => 'string', ],
				'Status'            => [ 'shape' => 'string', ],
				'CreateTime'        => [ 'shape' => 'timestamp', ],
				'InvalidationBatch' => [ 'shape' => 'InvalidationBatch', ],
			],
		],
		'InvalidationBatch'                              => [
			'type'     => 'structure',
			'required' => [ 'Paths', 'CallerReference', ],
			'members'  => [
				'Paths'           => [ 'shape' => 'Paths', ],
				'CallerReference' => [ 'shape' => 'string', ],
			],
		],
		'InvalidationList'                               => [
			'type'     => 'structure',
			'required' => [
				'Marker',
				'MaxItems',
				'IsTruncated',
				'Quantity',
			],
			'members'  => [
				'Marker'      => [ 'shape' => 'string', ],
				'NextMarker'  => [ 'shape' => 'string', ],
				'MaxItems'    => [ 'shape' => 'integer', ],
				'IsTruncated' => [ 'shape' => 'boolean', ],
				'Quantity'    => [ 'shape' => 'integer', ],
				'Items'       => [ 'shape' => 'InvalidationSummaryList', ],
			],
		],
		'InvalidationSummary'                            => [
			'type'     => 'structure',
			'required' => [ 'Id', 'CreateTime', 'Status', ],
			'members'  => [
				'Id'         => [ 'shape' => 'string', ],
				'CreateTime' => [ 'shape' => 'timestamp', ],
				'Status'     => [ 'shape' => 'string', ],
			],
		],
		'InvalidationSummaryList'                        => [
			'type'   => 'list',
			'member' => [
				'shape'        => 'InvalidationSummary',
				'locationName' => 'InvalidationSummary',
			],
		],
		'ItemSelection'                                  => [
			'type' => 'string',
			'enum' => [ 'none', 'whitelist', 'all', ],
		],
		'KeyPairIdList'                                  => [
			'type'   => 'list',
			'member' => [
				'shape'        => 'string',
				'locationName' => 'KeyPairId',
			],
		],
		'KeyPairIds'                                     => [
			'type'     => 'structure',
			'required' => [ 'Quantity', ],
			'members'  => [
				'Quantity' => [ 'shape' => 'integer', ],
				'Items'    => [ 'shape' => 'KeyPairIdList', ],
			],
		],
		'ListCloudFrontOriginAccessIdentitiesRequest'    => [
			'type'    => 'structure',
			'members' => [
				'Marker'   => [
					'shape'        => 'string',
					'location'     => 'querystring',
					'locationName' => 'Marker',
				],
				'MaxItems' => [
					'shape'        => 'string',
					'location'     => 'querystring',
					'locationName' => 'MaxItems',
				],
			],
		],
		'ListCloudFrontOriginAccessIdentitiesResult'     => [
			'type'    => 'structure',
			'members' => [ 'CloudFrontOriginAccessIdentityList' => [ 'shape' => 'CloudFrontOriginAccessIdentityList', ], ],
			'payload' => 'CloudFrontOriginAccessIdentityList',
		],
		'ListDistributionsByWebACLIdRequest'             => [
			'type'     => 'structure',
			'required' => [ 'WebACLId', ],
			'members'  => [
				'Marker'   => [
					'shape'        => 'string',
					'location'     => 'querystring',
					'locationName' => 'Marker',
				],
				'MaxItems' => [
					'shape'        => 'string',
					'location'     => 'querystring',
					'locationName' => 'MaxItems',
				],
				'WebACLId' => [
					'shape'        => 'string',
					'location'     => 'uri',
					'locationName' => 'WebACLId',
				],
			],
		],
		'ListDistributionsByWebACLIdResult'              => [
			'type'    => 'structure',
			'members' => [ 'DistributionList' => [ 'shape' => 'DistributionList', ], ],
			'payload' => 'DistributionList',
		],
		'ListDistributionsRequest'                       => [
			'type'    => 'structure',
			'members' => [
				'Marker'   => [
					'shape'        => 'string',
					'location'     => 'querystring',
					'locationName' => 'Marker',
				],
				'MaxItems' => [
					'shape'        => 'string',
					'location'     => 'querystring',
					'locationName' => 'MaxItems',
				],
			],
		],
		'ListDistributionsResult'                        => [
			'type'    => 'structure',
			'members' => [ 'DistributionList' => [ 'shape' => 'DistributionList', ], ],
			'payload' => 'DistributionList',
		],
		'ListInvalidationsRequest'                       => [
			'type'     => 'structure',
			'required' => [ 'DistributionId', ],
			'members'  => [
				'DistributionId' => [
					'shape'        => 'string',
					'location'     => 'uri',
					'locationName' => 'DistributionId',
				],
				'Marker'         => [
					'shape'        => 'string',
					'location'     => 'querystring',
					'locationName' => 'Marker',
				],
				'MaxItems'       => [
					'shape'        => 'string',
					'location'     => 'querystring',
					'locationName' => 'MaxItems',
				],
			],
		],
		'ListInvalidationsResult'                        => [
			'type'    => 'structure',
			'members' => [ 'InvalidationList' => [ 'shape' => 'InvalidationList', ], ],
			'payload' => 'InvalidationList',
		],
		'ListStreamingDistributionsRequest'              => [
			'type'    => 'structure',
			'members' => [
				'Marker'   => [
					'shape'        => 'string',
					'location'     => 'querystring',
					'locationName' => 'Marker',
				],
				'MaxItems' => [
					'shape'        => 'string',
					'location'     => 'querystring',
					'locationName' => 'MaxItems',
				],
			],
		],
		'ListStreamingDistributionsResult'               => [
			'type'    => 'structure',
			'members' => [ 'StreamingDistributionList' => [ 'shape' => 'StreamingDistributionList', ], ],
			'payload' => 'StreamingDistributionList',
		],
		'ListTagsForResourceRequest'                     => [
			'type'     => 'structure',
			'required' => [ 'Resource', ],
			'members'  => [
				'Resource' => [
					'shape'        => 'ResourceARN',
					'location'     => 'querystring',
					'locationName' => 'Resource',
				],
			],
		],
		'ListTagsForResourceResult'                      => [
			'type'     => 'structure',
			'required' => [ 'Tags', ],
			'members'  => [ 'Tags' => [ 'shape' => 'Tags', ], ],
			'payload'  => 'Tags',
		],
		'LocationList'                                   => [
			'type'   => 'list',
			'member' => [
				'shape'        => 'string',
				'locationName' => 'Location',
			],
		],
		'LoggingConfig'                                  => [
			'type'     => 'structure',
			'required' => [
				'Enabled',
				'IncludeCookies',
				'Bucket',
				'Prefix',
			],
			'members'  => [
				'Enabled'        => [ 'shape' => 'boolean', ],
				'IncludeCookies' => [ 'shape' => 'boolean', ],
				'Bucket'         => [ 'shape' => 'string', ],
				'Prefix'         => [ 'shape' => 'string', ],
			],
		],
		'Method'                                         => [
			'type' => 'string',
			'enum' => [
				'GET',
				'HEAD',
				'POST',
				'PUT',
				'PATCH',
				'OPTIONS',
				'DELETE',
			],
		],
		'MethodsList'                                    => [
			'type'   => 'list',
			'member' => [
				'shape'        => 'Method',
				'locationName' => 'Method',
			],
		],
		'MinimumProtocolVersion'                         => [ 'type' => 'string', 'enum' => [ 'SSLv3', 'TLSv1', ], ],
		'MissingBody'                                    => [
			'type'      => 'structure',
			'members'   => [ 'Message' => [ 'shape' => 'string', ], ],
			'error'     => [ 'httpStatusCode' => 400, ],
			'exception' => true,
		],
		'NoSuchCloudFrontOriginAccessIdentity'           => [
			'type'      => 'structure',
			'members'   => [ 'Message' => [ 'shape' => 'string', ], ],
			'error'     => [ 'httpStatusCode' => 404, ],
			'exception' => true,
		],
		'NoSuchDistribution'                             => [
			'type'      => 'structure',
			'members'   => [ 'Message' => [ 'shape' => 'string', ], ],
			'error'     => [ 'httpStatusCode' => 404, ],
			'exception' => true,
		],
		'NoSuchInvalidation'                             => [
			'type'      => 'structure',
			'members'   => [ 'Message' => [ 'shape' => 'string', ], ],
			'error'     => [ 'httpStatusCode' => 404, ],
			'exception' => true,
		],
		'NoSuchOrigin'                                   => [
			'type'      => 'structure',
			'members'   => [ 'Message' => [ 'shape' => 'string', ], ],
			'error'     => [ 'httpStatusCode' => 404, ],
			'exception' => true,
		],
		'NoSuchResource'                                 => [
			'type'      => 'structure',
			'members'   => [ 'Message' => [ 'shape' => 'string', ], ],
			'error'     => [ 'httpStatusCode' => 404, ],
			'exception' => true,
		],
		'NoSuchStreamingDistribution'                    => [
			'type'      => 'structure',
			'members'   => [ 'Message' => [ 'shape' => 'string', ], ],
			'error'     => [ 'httpStatusCode' => 404, ],
			'exception' => true,
		],
		'Origin'                                         => [
			'type'     => 'structure',
			'required' => [ 'Id', 'DomainName', ],
			'members'  => [
				'Id'                 => [ 'shape' => 'string', ],
				'DomainName'         => [ 'shape' => 'string', ],
				'OriginPath'         => [ 'shape' => 'string', ],
				'CustomHeaders'      => [ 'shape' => 'CustomHeaders', ],
				'S3OriginConfig'     => [ 'shape' => 'S3OriginConfig', ],
				'CustomOriginConfig' => [ 'shape' => 'CustomOriginConfig', ],
			],
		],
		'OriginCustomHeader'                             => [
			'type'     => 'structure',
			'required' => [ 'HeaderName', 'HeaderValue', ],
			'members'  => [
				'HeaderName'  => [ 'shape' => 'string', ],
				'HeaderValue' => [ 'shape' => 'string', ],
			],
		],
		'OriginCustomHeadersList'                        => [
			'type'   => 'list',
			'member' => [
				'shape'        => 'OriginCustomHeader',
				'locationName' => 'OriginCustomHeader',
			],
		],
		'OriginList'                                     => [
			'type'   => 'list',
			'member' => [
				'shape'        => 'Origin',
				'locationName' => 'Origin',
			],
			'min'    => 1,
		],
		'OriginProtocolPolicy'                           => [
			'type' => 'string',
			'enum' => [ 'http-only', 'match-viewer', 'https-only', ],
		],
		'OriginSslProtocols'                             => [
			'type'     => 'structure',
			'required' => [ 'Quantity', 'Items', ],
			'members'  => [
				'Quantity' => [ 'shape' => 'integer', ],
				'Items'    => [ 'shape' => 'SslProtocolsList', ],
			],
		],
		'Origins'                                        => [
			'type'     => 'structure',
			'required' => [ 'Quantity', ],
			'members'  => [
				'Quantity' => [ 'shape' => 'integer', ],
				'Items'    => [ 'shape' => 'OriginList', ],
			],
		],
		'PathList'                                       => [
			'type'   => 'list',
			'member' => [
				'shape'        => 'string',
				'locationName' => 'Path',
			],
		],
		'Paths'                                          => [
			'type'     => 'structure',
			'required' => [ 'Quantity', ],
			'members'  => [
				'Quantity' => [ 'shape' => 'integer', ],
				'Items'    => [ 'shape' => 'PathList', ],
			],
		],
		'PreconditionFailed'                             => [
			'type'      => 'structure',
			'members'   => [ 'Message' => [ 'shape' => 'string', ], ],
			'error'     => [ 'httpStatusCode' => 412, ],
			'exception' => true,
		],
		'PriceClass'                                     => [
			'type' => 'string',
			'enum' => [
				'PriceClass_100',
				'PriceClass_200',
				'PriceClass_All',
			],
		],
		'ResourceARN'                                    => [
			'type'    => 'string',
			'pattern' => 'arn:aws:cloudfront::[0-9]+:.*',
		],
		'Restrictions'                                   => [
			'type'     => 'structure',
			'required' => [ 'GeoRestriction', ],
			'members'  => [ 'GeoRestriction' => [ 'shape' => 'GeoRestriction', ], ],
		],
		'S3Origin'                                       => [
			'type'     => 'structure',
			'required' => [ 'DomainName', 'OriginAccessIdentity', ],
			'members'  => [
				'DomainName'           => [ 'shape' => 'string', ],
				'OriginAccessIdentity' => [ 'shape' => 'string', ],
			],
		],
		'S3OriginConfig'                                 => [
			'type'     => 'structure',
			'required' => [ 'OriginAccessIdentity', ],
			'members'  => [ 'OriginAccessIdentity' => [ 'shape' => 'string', ], ],
		],
		'SSLSupportMethod'                               => [ 'type' => 'string', 'enum' => [ 'sni-only', 'vip', ], ],
		'Signer'                                         => [
			'type'    => 'structure',
			'members' => [
				'AwsAccountNumber' => [ 'shape' => 'string', ],
				'KeyPairIds'       => [ 'shape' => 'KeyPairIds', ],
			],
		],
		'SignerList'                                     => [
			'type'   => 'list',
			'member' => [
				'shape'        => 'Signer',
				'locationName' => 'Signer',
			],
		],
		'SslProtocol'                                    => [
			'type' => 'string',
			'enum' => [ 'SSLv3', 'TLSv1', 'TLSv1.1', 'TLSv1.2', ],
		],
		'SslProtocolsList'                               => [
			'type'   => 'list',
			'member' => [
				'shape'        => 'SslProtocol',
				'locationName' => 'SslProtocol',
			],
		],
		'StreamingDistribution'                          => [
			'type'     => 'structure',
			'required' => [
				'Id',
				'ARN',
				'Status',
				'DomainName',
				'ActiveTrustedSigners',
				'StreamingDistributionConfig',
			],
			'members'  => [
				'Id'                          => [ 'shape' => 'string', ],
				'ARN'                         => [ 'shape' => 'string', ],
				'Status'                      => [ 'shape' => 'string', ],
				'LastModifiedTime'            => [ 'shape' => 'timestamp', ],
				'DomainName'                  => [ 'shape' => 'string', ],
				'ActiveTrustedSigners'        => [ 'shape' => 'ActiveTrustedSigners', ],
				'StreamingDistributionConfig' => [ 'shape' => 'StreamingDistributionConfig', ],
			],
		],
		'StreamingDistributionAlreadyExists'             => [
			'type'      => 'structure',
			'members'   => [ 'Message' => [ 'shape' => 'string', ], ],
			'error'     => [ 'httpStatusCode' => 409, ],
			'exception' => true,
		],
		'StreamingDistributionConfig'                    => [
			'type'     => 'structure',
			'required' => [
				'CallerReference',
				'S3Origin',
				'Comment',
				'TrustedSigners',
				'Enabled',
			],
			'members'  => [
				'CallerReference' => [ 'shape' => 'string', ],
				'S3Origin'        => [ 'shape' => 'S3Origin', ],
				'Aliases'         => [ 'shape' => 'Aliases', ],
				'Comment'         => [ 'shape' => 'string', ],
				'Logging'         => [ 'shape' => 'StreamingLoggingConfig', ],
				'TrustedSigners'  => [ 'shape' => 'TrustedSigners', ],
				'PriceClass'      => [ 'shape' => 'PriceClass', ],
				'Enabled'         => [ 'shape' => 'boolean', ],
			],
		],
		'StreamingDistributionConfigWithTags'            => [
			'type'     => 'structure',
			'required' => [ 'StreamingDistributionConfig', 'Tags', ],
			'members'  => [
				'StreamingDistributionConfig' => [ 'shape' => 'StreamingDistributionConfig', ],
				'Tags'                        => [ 'shape' => 'Tags', ],
			],
		],
		'StreamingDistributionList'                      => [
			'type'     => 'structure',
			'required' => [
				'Marker',
				'MaxItems',
				'IsTruncated',
				'Quantity',
			],
			'members'  => [
				'Marker'      => [ 'shape' => 'string', ],
				'NextMarker'  => [ 'shape' => 'string', ],
				'MaxItems'    => [ 'shape' => 'integer', ],
				'IsTruncated' => [ 'shape' => 'boolean', ],
				'Quantity'    => [ 'shape' => 'integer', ],
				'Items'       => [ 'shape' => 'StreamingDistributionSummaryList', ],
			],
		],
		'StreamingDistributionNotDisabled'               => [
			'type'      => 'structure',
			'members'   => [ 'Message' => [ 'shape' => 'string', ], ],
			'error'     => [ 'httpStatusCode' => 409, ],
			'exception' => true,
		],
		'StreamingDistributionSummary'                   => [
			'type'     => 'structure',
			'required' => [
				'Id',
				'ARN',
				'Status',
				'LastModifiedTime',
				'DomainName',
				'S3Origin',
				'Aliases',
				'TrustedSigners',
				'Comment',
				'PriceClass',
				'Enabled',
			],
			'members'  => [
				'Id'               => [ 'shape' => 'string', ],
				'ARN'              => [ 'shape' => 'string', ],
				'Status'           => [ 'shape' => 'string', ],
				'LastModifiedTime' => [ 'shape' => 'timestamp', ],
				'DomainName'       => [ 'shape' => 'string', ],
				'S3Origin'         => [ 'shape' => 'S3Origin', ],
				'Aliases'          => [ 'shape' => 'Aliases', ],
				'TrustedSigners'   => [ 'shape' => 'TrustedSigners', ],
				'Comment'          => [ 'shape' => 'string', ],
				'PriceClass'       => [ 'shape' => 'PriceClass', ],
				'Enabled'          => [ 'shape' => 'boolean', ],
			],
		],
		'StreamingDistributionSummaryList'               => [
			'type'   => 'list',
			'member' => [
				'shape'        => 'StreamingDistributionSummary',
				'locationName' => 'StreamingDistributionSummary',
			],
		],
		'StreamingLoggingConfig'                         => [
			'type'     => 'structure',
			'required' => [ 'Enabled', 'Bucket', 'Prefix', ],
			'members'  => [
				'Enabled' => [ 'shape' => 'boolean', ],
				'Bucket'  => [ 'shape' => 'string', ],
				'Prefix'  => [ 'shape' => 'string', ],
			],
		],
		'Tag'                                            => [
			'type'     => 'structure',
			'required' => [ 'Key', ],
			'members'  => [
				'Key'   => [ 'shape' => 'TagKey', ],
				'Value' => [ 'shape' => 'TagValue', ],
			],
		],
		'TagKey'                                         => [
			'type'    => 'string',
			'max'     => 128,
			'min'     => 1,
			'pattern' => '^([\\p{L}\\p{Z}\\p{N}_.:/=+\\-@]*)$',
		],
		'TagKeyList'                                     => [
			'type'   => 'list',
			'member' => [
				'shape'        => 'TagKey',
				'locationName' => 'Key',
			],
		],
		'TagKeys'                                        => [
			'type'    => 'structure',
			'members' => [ 'Items' => [ 'shape' => 'TagKeyList', ], ],
		],
		'TagList'                                        => [
			'type'   => 'list',
			'member' => [
				'shape'        => 'Tag',
				'locationName' => 'Tag',
			],
		],
		'TagResourceRequest'                             => [
			'type'     => 'structure',
			'required' => [ 'Resource', 'Tags', ],
			'members'  => [
				'Resource' => [
					'shape'        => 'ResourceARN',
					'location'     => 'querystring',
					'locationName' => 'Resource',
				],
				'Tags'     => [
					'shape'        => 'Tags',
					'locationName' => 'Tags',
					'xmlNamespace' => [ 'uri' => 'http://cloudfront.amazonaws.com/doc/2016-08-01/', ],
				],
			],
			'payload'  => 'Tags',
		],
		'TagValue'                                       => [
			'type'    => 'string',
			'max'     => 256,
			'min'     => 0,
			'pattern' => '^([\\p{L}\\p{Z}\\p{N}_.:/=+\\-@]*)$',
		],
		'Tags'                                           => [
			'type'    => 'structure',
			'members' => [ 'Items' => [ 'shape' => 'TagList', ], ],
		],
		'TooManyCacheBehaviors'                          => [
			'type'      => 'structure',
			'members'   => [ 'Message' => [ 'shape' => 'string', ], ],
			'error'     => [ 'httpStatusCode' => 400, ],
			'exception' => true,
		],
		'TooManyCertificates'                            => [
			'type'      => 'structure',
			'members'   => [ 'Message' => [ 'shape' => 'string', ], ],
			'error'     => [ 'httpStatusCode' => 400, ],
			'exception' => true,
		],
		'TooManyCloudFrontOriginAccessIdentities'        => [
			'type'      => 'structure',
			'members'   => [ 'Message' => [ 'shape' => 'string', ], ],
			'error'     => [ 'httpStatusCode' => 400, ],
			'exception' => true,
		],
		'TooManyCookieNamesInWhiteList'                  => [
			'type'      => 'structure',
			'members'   => [ 'Message' => [ 'shape' => 'string', ], ],
			'error'     => [ 'httpStatusCode' => 400, ],
			'exception' => true,
		],
		'TooManyDistributionCNAMEs'                      => [
			'type'      => 'structure',
			'members'   => [ 'Message' => [ 'shape' => 'string', ], ],
			'error'     => [ 'httpStatusCode' => 400, ],
			'exception' => true,
		],
		'TooManyDistributions'                           => [
			'type'      => 'structure',
			'members'   => [ 'Message' => [ 'shape' => 'string', ], ],
			'error'     => [ 'httpStatusCode' => 400, ],
			'exception' => true,
		],
		'TooManyHeadersInForwardedValues'                => [
			'type'      => 'structure',
			'members'   => [ 'Message' => [ 'shape' => 'string', ], ],
			'error'     => [ 'httpStatusCode' => 400, ],
			'exception' => true,
		],
		'TooManyInvalidationsInProgress'                 => [
			'type'      => 'structure',
			'members'   => [ 'Message' => [ 'shape' => 'string', ], ],
			'error'     => [ 'httpStatusCode' => 400, ],
			'exception' => true,
		],
		'TooManyOriginCustomHeaders'                     => [
			'type'      => 'structure',
			'members'   => [ 'Message' => [ 'shape' => 'string', ], ],
			'error'     => [ 'httpStatusCode' => 400, ],
			'exception' => true,
		],
		'TooManyOrigins'                                 => [
			'type'      => 'structure',
			'members'   => [ 'Message' => [ 'shape' => 'string', ], ],
			'error'     => [ 'httpStatusCode' => 400, ],
			'exception' => true,
		],
		'TooManyStreamingDistributionCNAMEs'             => [
			'type'      => 'structure',
			'members'   => [ 'Message' => [ 'shape' => 'string', ], ],
			'error'     => [ 'httpStatusCode' => 400, ],
			'exception' => true,
		],
		'TooManyStreamingDistributions'                  => [
			'type'      => 'structure',
			'members'   => [ 'Message' => [ 'shape' => 'string', ], ],
			'error'     => [ 'httpStatusCode' => 400, ],
			'exception' => true,
		],
		'TooManyTrustedSigners'                          => [
			'type'      => 'structure',
			'members'   => [ 'Message' => [ 'shape' => 'string', ], ],
			'error'     => [ 'httpStatusCode' => 400, ],
			'exception' => true,
		],
		'TrustedSignerDoesNotExist'                      => [
			'type'      => 'structure',
			'members'   => [ 'Message' => [ 'shape' => 'string', ], ],
			'error'     => [ 'httpStatusCode' => 400, ],
			'exception' => true,
		],
		'TrustedSigners'                                 => [
			'type'     => 'structure',
			'required' => [ 'Enabled', 'Quantity', ],
			'members'  => [
				'Enabled'  => [ 'shape' => 'boolean', ],
				'Quantity' => [ 'shape' => 'integer', ],
				'Items'    => [ 'shape' => 'AwsAccountNumberList', ],
			],
		],
		'UntagResourceRequest'                           => [
			'type'     => 'structure',
			'required' => [ 'Resource', 'TagKeys', ],
			'members'  => [
				'Resource' => [
					'shape'        => 'ResourceARN',
					'location'     => 'querystring',
					'locationName' => 'Resource',
				],
				'TagKeys'  => [
					'shape'        => 'TagKeys',
					'locationName' => 'TagKeys',
					'xmlNamespace' => [ 'uri' => 'http://cloudfront.amazonaws.com/doc/2016-08-01/', ],
				],
			],
			'payload'  => 'TagKeys',
		],
		'UpdateCloudFrontOriginAccessIdentityRequest'    => [
			'type'     => 'structure',
			'required' => [
				'CloudFrontOriginAccessIdentityConfig',
				'Id',
			],
			'members'  => [
				'CloudFrontOriginAccessIdentityConfig' => [
					'shape'        => 'CloudFrontOriginAccessIdentityConfig',
					'locationName' => 'CloudFrontOriginAccessIdentityConfig',
					'xmlNamespace' => [ 'uri' => 'http://cloudfront.amazonaws.com/doc/2016-08-01/', ],
				],
				'Id'                                   => [
					'shape'        => 'string',
					'location'     => 'uri',
					'locationName' => 'Id',
				],
				'IfMatch'                              => [
					'shape'        => 'string',
					'location'     => 'header',
					'locationName' => 'If-Match',
				],
			],
			'payload'  => 'CloudFrontOriginAccessIdentityConfig',
		],
		'UpdateCloudFrontOriginAccessIdentityResult'     => [
			'type'    => 'structure',
			'members' => [
				'CloudFrontOriginAccessIdentity' => [ 'shape' => 'CloudFrontOriginAccessIdentity', ],
				'ETag'                           => [
					'shape'        => 'string',
					'location'     => 'header',
					'locationName' => 'ETag',
				],
			],
			'payload' => 'CloudFrontOriginAccessIdentity',
		],
		'UpdateDistributionRequest'                      => [
			'type'     => 'structure',
			'required' => [ 'DistributionConfig', 'Id', ],
			'members'  => [
				'DistributionConfig' => [
					'shape'        => 'DistributionConfig',
					'locationName' => 'DistributionConfig',
					'xmlNamespace' => [ 'uri' => 'http://cloudfront.amazonaws.com/doc/2016-08-01/', ],
				],
				'Id'                 => [
					'shape'        => 'string',
					'location'     => 'uri',
					'locationName' => 'Id',
				],
				'IfMatch'            => [
					'shape'        => 'string',
					'location'     => 'header',
					'locationName' => 'If-Match',
				],
			],
			'payload'  => 'DistributionConfig',
		],
		'UpdateDistributionResult'                       => [
			'type'    => 'structure',
			'members' => [
				'Distribution' => [ 'shape' => 'Distribution', ],
				'ETag'         => [
					'shape'        => 'string',
					'location'     => 'header',
					'locationName' => 'ETag',
				],
			],
			'payload' => 'Distribution',
		],
		'UpdateStreamingDistributionRequest'             => [
			'type'     => 'structure',
			'required' => [ 'StreamingDistributionConfig', 'Id', ],
			'members'  => [
				'StreamingDistributionConfig' => [
					'shape'        => 'StreamingDistributionConfig',
					'locationName' => 'StreamingDistributionConfig',
					'xmlNamespace' => [ 'uri' => 'http://cloudfront.amazonaws.com/doc/2016-08-01/', ],
				],
				'Id'                          => [
					'shape'        => 'string',
					'location'     => 'uri',
					'locationName' => 'Id',
				],
				'IfMatch'                     => [
					'shape'        => 'string',
					'location'     => 'header',
					'locationName' => 'If-Match',
				],
			],
			'payload'  => 'StreamingDistributionConfig',
		],
		'UpdateStreamingDistributionResult'              => [
			'type'    => 'structure',
			'members' => [
				'StreamingDistribution' => [ 'shape' => 'StreamingDistribution', ],
				'ETag'                  => [
					'shape'        => 'string',
					'location'     => 'header',
					'locationName' => 'ETag',
				],
			],
			'payload' => 'StreamingDistribution',
		],
		'ViewerCertificate'                              => [
			'type'    => 'structure',
			'members' => [
				'CloudFrontDefaultCertificate' => [ 'shape' => 'boolean', ],
				'IAMCertificateId'             => [ 'shape' => 'string', ],
				'ACMCertificateArn'            => [ 'shape' => 'string', ],
				'SSLSupportMethod'             => [ 'shape' => 'SSLSupportMethod', ],
				'MinimumProtocolVersion'       => [ 'shape' => 'MinimumProtocolVersion', ],
				'Certificate'                  => [
					'shape'      => 'string',
					'deprecated' => true,
				],
				'CertificateSource'            => [
					'shape'      => 'CertificateSource',
					'deprecated' => true,
				],
			],
		],
		'ViewerProtocolPolicy'                           => [
			'type' => 'string',
			'enum' => [
				'allow-all',
				'https-only',
				'redirect-to-https',
			],
		],
		'boolean'                                        => [ 'type' => 'boolean', ],
		'integer'                                        => [ 'type' => 'integer', ],
		'long'                                           => [ 'type' => 'long', ],
		'string'                                         => [ 'type' => 'string', ],
		'timestamp'                                      => [ 'type' => 'timestamp', ],
	],
];
