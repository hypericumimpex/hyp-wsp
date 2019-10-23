<?php
// This file was auto-generated from sdk-root/src/data/elasticbeanstalk/2010-12-01/api-2.json
return [
	'version'    => '2.0',
	'metadata'   => [
		'apiVersion'          => '2010-12-01',
		'endpointPrefix'      => 'elasticbeanstalk',
		'protocol'            => 'query',
		'serviceAbbreviation' => 'Elastic Beanstalk',
		'serviceFullName'     => 'AWS Elastic Beanstalk',
		'serviceId'           => 'Elastic Beanstalk',
		'signatureVersion'    => 'v4',
		'uid'                 => 'elasticbeanstalk-2010-12-01',
		'xmlNamespace'        => 'http://elasticbeanstalk.amazonaws.com/docs/2010-12-01/',
	],
	'operations' => [
		'AbortEnvironmentUpdate'                  => [
			'name'   => 'AbortEnvironmentUpdate',
			'http'   => [ 'method' => 'POST', 'requestUri' => '/', ],
			'input'  => [ 'shape' => 'AbortEnvironmentUpdateMessage', ],
			'errors' => [ [ 'shape' => 'InsufficientPrivilegesException', ], ],
		],
		'ApplyEnvironmentManagedAction'           => [
			'name'   => 'ApplyEnvironmentManagedAction',
			'http'   => [ 'method' => 'POST', 'requestUri' => '/', ],
			'input'  => [ 'shape' => 'ApplyEnvironmentManagedActionRequest', ],
			'output' => [
				'shape'         => 'ApplyEnvironmentManagedActionResult',
				'resultWrapper' => 'ApplyEnvironmentManagedActionResult',
			],
			'errors' => [
				[ 'shape' => 'ElasticBeanstalkServiceException', ],
				[ 'shape' => 'ManagedActionInvalidStateException', ],
			],
		],
		'CheckDNSAvailability'                    => [
			'name'   => 'CheckDNSAvailability',
			'http'   => [ 'method' => 'POST', 'requestUri' => '/', ],
			'input'  => [ 'shape' => 'CheckDNSAvailabilityMessage', ],
			'output' => [
				'shape'         => 'CheckDNSAvailabilityResultMessage',
				'resultWrapper' => 'CheckDNSAvailabilityResult',
			],
		],
		'ComposeEnvironments'                     => [
			'name'   => 'ComposeEnvironments',
			'http'   => [ 'method' => 'POST', 'requestUri' => '/', ],
			'input'  => [ 'shape' => 'ComposeEnvironmentsMessage', ],
			'output' => [
				'shape'         => 'EnvironmentDescriptionsMessage',
				'resultWrapper' => 'ComposeEnvironmentsResult',
			],
			'errors' => [
				[ 'shape' => 'TooManyEnvironmentsException', ],
				[ 'shape' => 'InsufficientPrivilegesException', ],
			],
		],
		'CreateApplication'                       => [
			'name'   => 'CreateApplication',
			'http'   => [ 'method' => 'POST', 'requestUri' => '/', ],
			'input'  => [ 'shape' => 'CreateApplicationMessage', ],
			'output' => [
				'shape'         => 'ApplicationDescriptionMessage',
				'resultWrapper' => 'CreateApplicationResult',
			],
			'errors' => [ [ 'shape' => 'TooManyApplicationsException', ], ],
		],
		'CreateApplicationVersion'                => [
			'name'   => 'CreateApplicationVersion',
			'http'   => [ 'method' => 'POST', 'requestUri' => '/', ],
			'input'  => [ 'shape' => 'CreateApplicationVersionMessage', ],
			'output' => [
				'shape'         => 'ApplicationVersionDescriptionMessage',
				'resultWrapper' => 'CreateApplicationVersionResult',
			],
			'errors' => [
				[ 'shape' => 'TooManyApplicationsException', ],
				[ 'shape' => 'TooManyApplicationVersionsException', ],
				[ 'shape' => 'InsufficientPrivilegesException', ],
				[ 'shape' => 'S3LocationNotInServiceRegionException', ],
				[ 'shape' => 'CodeBuildNotInServiceRegionException', ],
			],
		],
		'CreateConfigurationTemplate'             => [
			'name'   => 'CreateConfigurationTemplate',
			'http'   => [ 'method' => 'POST', 'requestUri' => '/', ],
			'input'  => [ 'shape' => 'CreateConfigurationTemplateMessage', ],
			'output' => [
				'shape'         => 'ConfigurationSettingsDescription',
				'resultWrapper' => 'CreateConfigurationTemplateResult',
			],
			'errors' => [
				[ 'shape' => 'InsufficientPrivilegesException', ],
				[ 'shape' => 'TooManyBucketsException', ],
				[ 'shape' => 'TooManyConfigurationTemplatesException', ],
			],
		],
		'CreateEnvironment'                       => [
			'name'   => 'CreateEnvironment',
			'http'   => [ 'method' => 'POST', 'requestUri' => '/', ],
			'input'  => [ 'shape' => 'CreateEnvironmentMessage', ],
			'output' => [
				'shape'         => 'EnvironmentDescription',
				'resultWrapper' => 'CreateEnvironmentResult',
			],
			'errors' => [
				[ 'shape' => 'TooManyEnvironmentsException', ],
				[ 'shape' => 'InsufficientPrivilegesException', ],
			],
		],
		'CreatePlatformVersion'                   => [
			'name'   => 'CreatePlatformVersion',
			'http'   => [ 'method' => 'POST', 'requestUri' => '/', ],
			'input'  => [ 'shape' => 'CreatePlatformVersionRequest', ],
			'output' => [
				'shape'         => 'CreatePlatformVersionResult',
				'resultWrapper' => 'CreatePlatformVersionResult',
			],
			'errors' => [
				[ 'shape' => 'InsufficientPrivilegesException', ],
				[ 'shape' => 'ElasticBeanstalkServiceException', ],
				[ 'shape' => 'TooManyPlatformsException', ],
			],
		],
		'CreateStorageLocation'                   => [
			'name'   => 'CreateStorageLocation',
			'http'   => [ 'method' => 'POST', 'requestUri' => '/', ],
			'output' => [
				'shape'         => 'CreateStorageLocationResultMessage',
				'resultWrapper' => 'CreateStorageLocationResult',
			],
			'errors' => [
				[ 'shape' => 'TooManyBucketsException', ],
				[ 'shape' => 'S3SubscriptionRequiredException', ],
				[ 'shape' => 'InsufficientPrivilegesException', ],
			],
		],
		'DeleteApplication'                       => [
			'name'   => 'DeleteApplication',
			'http'   => [ 'method' => 'POST', 'requestUri' => '/', ],
			'input'  => [ 'shape' => 'DeleteApplicationMessage', ],
			'errors' => [ [ 'shape' => 'OperationInProgressException', ], ],
		],
		'DeleteApplicationVersion'                => [
			'name'   => 'DeleteApplicationVersion',
			'http'   => [ 'method' => 'POST', 'requestUri' => '/', ],
			'input'  => [ 'shape' => 'DeleteApplicationVersionMessage', ],
			'errors' => [
				[ 'shape' => 'SourceBundleDeletionException', ],
				[ 'shape' => 'InsufficientPrivilegesException', ],
				[ 'shape' => 'OperationInProgressException', ],
				[ 'shape' => 'S3LocationNotInServiceRegionException', ],
			],
		],
		'DeleteConfigurationTemplate'             => [
			'name'   => 'DeleteConfigurationTemplate',
			'http'   => [ 'method' => 'POST', 'requestUri' => '/', ],
			'input'  => [ 'shape' => 'DeleteConfigurationTemplateMessage', ],
			'errors' => [ [ 'shape' => 'OperationInProgressException', ], ],
		],
		'DeleteEnvironmentConfiguration'          => [
			'name'  => 'DeleteEnvironmentConfiguration',
			'http'  => [ 'method' => 'POST', 'requestUri' => '/', ],
			'input' => [ 'shape' => 'DeleteEnvironmentConfigurationMessage', ],
		],
		'DeletePlatformVersion'                   => [
			'name'   => 'DeletePlatformVersion',
			'http'   => [ 'method' => 'POST', 'requestUri' => '/', ],
			'input'  => [ 'shape' => 'DeletePlatformVersionRequest', ],
			'output' => [
				'shape'         => 'DeletePlatformVersionResult',
				'resultWrapper' => 'DeletePlatformVersionResult',
			],
			'errors' => [
				[ 'shape' => 'OperationInProgressException', ],
				[ 'shape' => 'InsufficientPrivilegesException', ],
				[ 'shape' => 'ElasticBeanstalkServiceException', ],
				[ 'shape' => 'PlatformVersionStillReferencedException', ],
			],
		],
		'DescribeAccountAttributes'               => [
			'name'   => 'DescribeAccountAttributes',
			'http'   => [ 'method' => 'POST', 'requestUri' => '/', ],
			'output' => [
				'shape'         => 'DescribeAccountAttributesResult',
				'resultWrapper' => 'DescribeAccountAttributesResult',
			],
			'errors' => [ [ 'shape' => 'InsufficientPrivilegesException', ], ],
		],
		'DescribeApplicationVersions'             => [
			'name'   => 'DescribeApplicationVersions',
			'http'   => [ 'method' => 'POST', 'requestUri' => '/', ],
			'input'  => [ 'shape' => 'DescribeApplicationVersionsMessage', ],
			'output' => [
				'shape'         => 'ApplicationVersionDescriptionsMessage',
				'resultWrapper' => 'DescribeApplicationVersionsResult',
			],
		],
		'DescribeApplications'                    => [
			'name'   => 'DescribeApplications',
			'http'   => [ 'method' => 'POST', 'requestUri' => '/', ],
			'input'  => [ 'shape' => 'DescribeApplicationsMessage', ],
			'output' => [
				'shape'         => 'ApplicationDescriptionsMessage',
				'resultWrapper' => 'DescribeApplicationsResult',
			],
		],
		'DescribeConfigurationOptions'            => [
			'name'   => 'DescribeConfigurationOptions',
			'http'   => [ 'method' => 'POST', 'requestUri' => '/', ],
			'input'  => [ 'shape' => 'DescribeConfigurationOptionsMessage', ],
			'output' => [
				'shape'         => 'ConfigurationOptionsDescription',
				'resultWrapper' => 'DescribeConfigurationOptionsResult',
			],
			'errors' => [ [ 'shape' => 'TooManyBucketsException', ], ],
		],
		'DescribeConfigurationSettings'           => [
			'name'   => 'DescribeConfigurationSettings',
			'http'   => [ 'method' => 'POST', 'requestUri' => '/', ],
			'input'  => [ 'shape' => 'DescribeConfigurationSettingsMessage', ],
			'output' => [
				'shape'         => 'ConfigurationSettingsDescriptions',
				'resultWrapper' => 'DescribeConfigurationSettingsResult',
			],
			'errors' => [ [ 'shape' => 'TooManyBucketsException', ], ],
		],
		'DescribeEnvironmentHealth'               => [
			'name'   => 'DescribeEnvironmentHealth',
			'http'   => [ 'method' => 'POST', 'requestUri' => '/', ],
			'input'  => [ 'shape' => 'DescribeEnvironmentHealthRequest', ],
			'output' => [
				'shape'         => 'DescribeEnvironmentHealthResult',
				'resultWrapper' => 'DescribeEnvironmentHealthResult',
			],
			'errors' => [
				[ 'shape' => 'InvalidRequestException', ],
				[ 'shape' => 'ElasticBeanstalkServiceException', ],
			],
		],
		'DescribeEnvironmentManagedActionHistory' => [
			'name'   => 'DescribeEnvironmentManagedActionHistory',
			'http'   => [ 'method' => 'POST', 'requestUri' => '/', ],
			'input'  => [ 'shape' => 'DescribeEnvironmentManagedActionHistoryRequest', ],
			'output' => [
				'shape'         => 'DescribeEnvironmentManagedActionHistoryResult',
				'resultWrapper' => 'DescribeEnvironmentManagedActionHistoryResult',
			],
			'errors' => [ [ 'shape' => 'ElasticBeanstalkServiceException', ], ],
		],
		'DescribeEnvironmentManagedActions'       => [
			'name'   => 'DescribeEnvironmentManagedActions',
			'http'   => [ 'method' => 'POST', 'requestUri' => '/', ],
			'input'  => [ 'shape' => 'DescribeEnvironmentManagedActionsRequest', ],
			'output' => [
				'shape'         => 'DescribeEnvironmentManagedActionsResult',
				'resultWrapper' => 'DescribeEnvironmentManagedActionsResult',
			],
			'errors' => [ [ 'shape' => 'ElasticBeanstalkServiceException', ], ],
		],
		'DescribeEnvironmentResources'            => [
			'name'   => 'DescribeEnvironmentResources',
			'http'   => [ 'method' => 'POST', 'requestUri' => '/', ],
			'input'  => [ 'shape' => 'DescribeEnvironmentResourcesMessage', ],
			'output' => [
				'shape'         => 'EnvironmentResourceDescriptionsMessage',
				'resultWrapper' => 'DescribeEnvironmentResourcesResult',
			],
			'errors' => [ [ 'shape' => 'InsufficientPrivilegesException', ], ],
		],
		'DescribeEnvironments'                    => [
			'name'   => 'DescribeEnvironments',
			'http'   => [ 'method' => 'POST', 'requestUri' => '/', ],
			'input'  => [ 'shape' => 'DescribeEnvironmentsMessage', ],
			'output' => [
				'shape'         => 'EnvironmentDescriptionsMessage',
				'resultWrapper' => 'DescribeEnvironmentsResult',
			],
		],
		'DescribeEvents'                          => [
			'name'   => 'DescribeEvents',
			'http'   => [ 'method' => 'POST', 'requestUri' => '/', ],
			'input'  => [ 'shape' => 'DescribeEventsMessage', ],
			'output' => [
				'shape'         => 'EventDescriptionsMessage',
				'resultWrapper' => 'DescribeEventsResult',
			],
		],
		'DescribeInstancesHealth'                 => [
			'name'   => 'DescribeInstancesHealth',
			'http'   => [ 'method' => 'POST', 'requestUri' => '/', ],
			'input'  => [ 'shape' => 'DescribeInstancesHealthRequest', ],
			'output' => [
				'shape'         => 'DescribeInstancesHealthResult',
				'resultWrapper' => 'DescribeInstancesHealthResult',
			],
			'errors' => [
				[ 'shape' => 'InvalidRequestException', ],
				[ 'shape' => 'ElasticBeanstalkServiceException', ],
			],
		],
		'DescribePlatformVersion'                 => [
			'name'   => 'DescribePlatformVersion',
			'http'   => [ 'method' => 'POST', 'requestUri' => '/', ],
			'input'  => [ 'shape' => 'DescribePlatformVersionRequest', ],
			'output' => [
				'shape'         => 'DescribePlatformVersionResult',
				'resultWrapper' => 'DescribePlatformVersionResult',
			],
			'errors' => [
				[ 'shape' => 'InsufficientPrivilegesException', ],
				[ 'shape' => 'ElasticBeanstalkServiceException', ],
			],
		],
		'ListAvailableSolutionStacks'             => [
			'name'   => 'ListAvailableSolutionStacks',
			'http'   => [ 'method' => 'POST', 'requestUri' => '/', ],
			'output' => [
				'shape'         => 'ListAvailableSolutionStacksResultMessage',
				'resultWrapper' => 'ListAvailableSolutionStacksResult',
			],
		],
		'ListPlatformVersions'                    => [
			'name'   => 'ListPlatformVersions',
			'http'   => [ 'method' => 'POST', 'requestUri' => '/', ],
			'input'  => [ 'shape' => 'ListPlatformVersionsRequest', ],
			'output' => [
				'shape'         => 'ListPlatformVersionsResult',
				'resultWrapper' => 'ListPlatformVersionsResult',
			],
			'errors' => [
				[ 'shape' => 'InsufficientPrivilegesException', ],
				[ 'shape' => 'ElasticBeanstalkServiceException', ],
			],
		],
		'ListTagsForResource'                     => [
			'name'   => 'ListTagsForResource',
			'http'   => [ 'method' => 'POST', 'requestUri' => '/', ],
			'input'  => [ 'shape' => 'ListTagsForResourceMessage', ],
			'output' => [
				'shape'         => 'ResourceTagsDescriptionMessage',
				'resultWrapper' => 'ListTagsForResourceResult',
			],
			'errors' => [
				[ 'shape' => 'InsufficientPrivilegesException', ],
				[ 'shape' => 'ResourceNotFoundException', ],
				[ 'shape' => 'ResourceTypeNotSupportedException', ],
			],
		],
		'RebuildEnvironment'                      => [
			'name'   => 'RebuildEnvironment',
			'http'   => [ 'method' => 'POST', 'requestUri' => '/', ],
			'input'  => [ 'shape' => 'RebuildEnvironmentMessage', ],
			'errors' => [ [ 'shape' => 'InsufficientPrivilegesException', ], ],
		],
		'RequestEnvironmentInfo'                  => [
			'name'  => 'RequestEnvironmentInfo',
			'http'  => [ 'method' => 'POST', 'requestUri' => '/', ],
			'input' => [ 'shape' => 'RequestEnvironmentInfoMessage', ],
		],
		'RestartAppServer'                        => [
			'name'  => 'RestartAppServer',
			'http'  => [ 'method' => 'POST', 'requestUri' => '/', ],
			'input' => [ 'shape' => 'RestartAppServerMessage', ],
		],
		'RetrieveEnvironmentInfo'                 => [
			'name'   => 'RetrieveEnvironmentInfo',
			'http'   => [ 'method' => 'POST', 'requestUri' => '/', ],
			'input'  => [ 'shape' => 'RetrieveEnvironmentInfoMessage', ],
			'output' => [
				'shape'         => 'RetrieveEnvironmentInfoResultMessage',
				'resultWrapper' => 'RetrieveEnvironmentInfoResult',
			],
		],
		'SwapEnvironmentCNAMEs'                   => [
			'name'  => 'SwapEnvironmentCNAMEs',
			'http'  => [ 'method' => 'POST', 'requestUri' => '/', ],
			'input' => [ 'shape' => 'SwapEnvironmentCNAMEsMessage', ],
		],
		'TerminateEnvironment'                    => [
			'name'   => 'TerminateEnvironment',
			'http'   => [ 'method' => 'POST', 'requestUri' => '/', ],
			'input'  => [ 'shape' => 'TerminateEnvironmentMessage', ],
			'output' => [
				'shape'         => 'EnvironmentDescription',
				'resultWrapper' => 'TerminateEnvironmentResult',
			],
			'errors' => [ [ 'shape' => 'InsufficientPrivilegesException', ], ],
		],
		'UpdateApplication'                       => [
			'name'   => 'UpdateApplication',
			'http'   => [ 'method' => 'POST', 'requestUri' => '/', ],
			'input'  => [ 'shape' => 'UpdateApplicationMessage', ],
			'output' => [
				'shape'         => 'ApplicationDescriptionMessage',
				'resultWrapper' => 'UpdateApplicationResult',
			],
		],
		'UpdateApplicationResourceLifecycle'      => [
			'name'   => 'UpdateApplicationResourceLifecycle',
			'http'   => [ 'method' => 'POST', 'requestUri' => '/', ],
			'input'  => [ 'shape' => 'UpdateApplicationResourceLifecycleMessage', ],
			'output' => [
				'shape'         => 'ApplicationResourceLifecycleDescriptionMessage',
				'resultWrapper' => 'UpdateApplicationResourceLifecycleResult',
			],
			'errors' => [ [ 'shape' => 'InsufficientPrivilegesException', ], ],
		],
		'UpdateApplicationVersion'                => [
			'name'   => 'UpdateApplicationVersion',
			'http'   => [ 'method' => 'POST', 'requestUri' => '/', ],
			'input'  => [ 'shape' => 'UpdateApplicationVersionMessage', ],
			'output' => [
				'shape'         => 'ApplicationVersionDescriptionMessage',
				'resultWrapper' => 'UpdateApplicationVersionResult',
			],
		],
		'UpdateConfigurationTemplate'             => [
			'name'   => 'UpdateConfigurationTemplate',
			'http'   => [ 'method' => 'POST', 'requestUri' => '/', ],
			'input'  => [ 'shape' => 'UpdateConfigurationTemplateMessage', ],
			'output' => [
				'shape'         => 'ConfigurationSettingsDescription',
				'resultWrapper' => 'UpdateConfigurationTemplateResult',
			],
			'errors' => [
				[ 'shape' => 'InsufficientPrivilegesException', ],
				[ 'shape' => 'TooManyBucketsException', ],
			],
		],
		'UpdateEnvironment'                       => [
			'name'   => 'UpdateEnvironment',
			'http'   => [ 'method' => 'POST', 'requestUri' => '/', ],
			'input'  => [ 'shape' => 'UpdateEnvironmentMessage', ],
			'output' => [
				'shape'         => 'EnvironmentDescription',
				'resultWrapper' => 'UpdateEnvironmentResult',
			],
			'errors' => [
				[ 'shape' => 'InsufficientPrivilegesException', ],
				[ 'shape' => 'TooManyBucketsException', ],
			],
		],
		'UpdateTagsForResource'                   => [
			'name'   => 'UpdateTagsForResource',
			'http'   => [ 'method' => 'POST', 'requestUri' => '/', ],
			'input'  => [ 'shape' => 'UpdateTagsForResourceMessage', ],
			'errors' => [
				[ 'shape' => 'InsufficientPrivilegesException', ],
				[ 'shape' => 'OperationInProgressException', ],
				[ 'shape' => 'TooManyTagsException', ],
				[ 'shape' => 'ResourceNotFoundException', ],
				[ 'shape' => 'ResourceTypeNotSupportedException', ],
			],
		],
		'ValidateConfigurationSettings'           => [
			'name'   => 'ValidateConfigurationSettings',
			'http'   => [ 'method' => 'POST', 'requestUri' => '/', ],
			'input'  => [ 'shape' => 'ValidateConfigurationSettingsMessage', ],
			'output' => [
				'shape'         => 'ConfigurationSettingsValidationMessages',
				'resultWrapper' => 'ValidateConfigurationSettingsResult',
			],
			'errors' => [
				[ 'shape' => 'InsufficientPrivilegesException', ],
				[ 'shape' => 'TooManyBucketsException', ],
			],
		],
	],
	'shapes'     => [
		'ARN'                                            => [ 'type' => 'string', ],
		'AbortEnvironmentUpdateMessage'                  => [
			'type'    => 'structure',
			'members' => [
				'EnvironmentId'   => [ 'shape' => 'EnvironmentId', ],
				'EnvironmentName' => [ 'shape' => 'EnvironmentName', ],
			],
		],
		'AbortableOperationInProgress'                   => [ 'type' => 'boolean', ],
		'ActionHistoryStatus'                            => [
			'type' => 'string',
			'enum' => [ 'Completed', 'Failed', 'Unknown', ],
		],
		'ActionStatus'                                   => [
			'type' => 'string',
			'enum' => [ 'Scheduled', 'Pending', 'Running', 'Unknown', ],
		],
		'ActionType'                                     => [
			'type' => 'string',
			'enum' => [ 'InstanceRefresh', 'PlatformUpdate', 'Unknown', ],
		],
		'ApplicationArn'                                 => [ 'type' => 'string', ],
		'ApplicationDescription'                         => [
			'type'    => 'structure',
			'members' => [
				'ApplicationArn'          => [ 'shape' => 'ApplicationArn', ],
				'ApplicationName'         => [ 'shape' => 'ApplicationName', ],
				'Description'             => [ 'shape' => 'Description', ],
				'DateCreated'             => [ 'shape' => 'CreationDate', ],
				'DateUpdated'             => [ 'shape' => 'UpdateDate', ],
				'Versions'                => [ 'shape' => 'VersionLabelsList', ],
				'ConfigurationTemplates'  => [ 'shape' => 'ConfigurationTemplateNamesList', ],
				'ResourceLifecycleConfig' => [ 'shape' => 'ApplicationResourceLifecycleConfig', ],
			],
		],
		'ApplicationDescriptionList'                     => [
			'type'   => 'list',
			'member' => [ 'shape' => 'ApplicationDescription', ],
		],
		'ApplicationDescriptionMessage'                  => [
			'type'    => 'structure',
			'members' => [ 'Application' => [ 'shape' => 'ApplicationDescription', ], ],
		],
		'ApplicationDescriptionsMessage'                 => [
			'type'    => 'structure',
			'members' => [ 'Applications' => [ 'shape' => 'ApplicationDescriptionList', ], ],
		],
		'ApplicationMetrics'                             => [
			'type'    => 'structure',
			'members' => [
				'Duration'     => [ 'shape' => 'NullableInteger', ],
				'RequestCount' => [ 'shape' => 'RequestCount', ],
				'StatusCodes'  => [ 'shape' => 'StatusCodes', ],
				'Latency'      => [ 'shape' => 'Latency', ],
			],
		],
		'ApplicationName'                                => [ 'type' => 'string', 'max' => 100, 'min' => 1, ],
		'ApplicationNamesList'                           => [
			'type'   => 'list',
			'member' => [ 'shape' => 'ApplicationName', ],
		],
		'ApplicationResourceLifecycleConfig'             => [
			'type'    => 'structure',
			'members' => [
				'ServiceRole'            => [ 'shape' => 'String', ],
				'VersionLifecycleConfig' => [ 'shape' => 'ApplicationVersionLifecycleConfig', ],
			],
		],
		'ApplicationResourceLifecycleDescriptionMessage' => [
			'type'    => 'structure',
			'members' => [
				'ApplicationName'         => [ 'shape' => 'ApplicationName', ],
				'ResourceLifecycleConfig' => [ 'shape' => 'ApplicationResourceLifecycleConfig', ],
			],
		],
		'ApplicationVersionArn'                          => [ 'type' => 'string', ],
		'ApplicationVersionDescription'                  => [
			'type'    => 'structure',
			'members' => [
				'ApplicationVersionArn'  => [ 'shape' => 'ApplicationVersionArn', ],
				'ApplicationName'        => [ 'shape' => 'ApplicationName', ],
				'Description'            => [ 'shape' => 'Description', ],
				'VersionLabel'           => [ 'shape' => 'VersionLabel', ],
				'SourceBuildInformation' => [ 'shape' => 'SourceBuildInformation', ],
				'BuildArn'               => [ 'shape' => 'String', ],
				'SourceBundle'           => [ 'shape' => 'S3Location', ],
				'DateCreated'            => [ 'shape' => 'CreationDate', ],
				'DateUpdated'            => [ 'shape' => 'UpdateDate', ],
				'Status'                 => [ 'shape' => 'ApplicationVersionStatus', ],
			],
		],
		'ApplicationVersionDescriptionList'              => [
			'type'   => 'list',
			'member' => [ 'shape' => 'ApplicationVersionDescription', ],
		],
		'ApplicationVersionDescriptionMessage'           => [
			'type'    => 'structure',
			'members' => [ 'ApplicationVersion' => [ 'shape' => 'ApplicationVersionDescription', ], ],
		],
		'ApplicationVersionDescriptionsMessage'          => [
			'type'    => 'structure',
			'members' => [
				'ApplicationVersions' => [ 'shape' => 'ApplicationVersionDescriptionList', ],
				'NextToken'           => [ 'shape' => 'Token', ],
			],
		],
		'ApplicationVersionLifecycleConfig'              => [
			'type'    => 'structure',
			'members' => [
				'MaxCountRule' => [ 'shape' => 'MaxCountRule', ],
				'MaxAgeRule'   => [ 'shape' => 'MaxAgeRule', ],
			],
		],
		'ApplicationVersionProccess'                     => [ 'type' => 'boolean', ],
		'ApplicationVersionStatus'                       => [
			'type' => 'string',
			'enum' => [
				'Processed',
				'Unprocessed',
				'Failed',
				'Processing',
				'Building',
			],
		],
		'ApplyEnvironmentManagedActionRequest'           => [
			'type'     => 'structure',
			'required' => [ 'ActionId', ],
			'members'  => [
				'EnvironmentName' => [ 'shape' => 'String', ],
				'EnvironmentId'   => [ 'shape' => 'String', ],
				'ActionId'        => [ 'shape' => 'String', ],
			],
		],
		'ApplyEnvironmentManagedActionResult'            => [
			'type'    => 'structure',
			'members' => [
				'ActionId'          => [ 'shape' => 'String', ],
				'ActionDescription' => [ 'shape' => 'String', ],
				'ActionType'        => [ 'shape' => 'ActionType', ],
				'Status'            => [ 'shape' => 'String', ],
			],
		],
		'AutoCreateApplication'                          => [ 'type' => 'boolean', ],
		'AutoScalingGroup'                               => [
			'type'    => 'structure',
			'members' => [ 'Name' => [ 'shape' => 'ResourceId', ], ],
		],
		'AutoScalingGroupList'                           => [
			'type'   => 'list',
			'member' => [ 'shape' => 'AutoScalingGroup', ],
		],
		'AvailableSolutionStackDetailsList'              => [
			'type'   => 'list',
			'member' => [ 'shape' => 'SolutionStackDescription', ],
		],
		'AvailableSolutionStackNamesList'                => [
			'type'   => 'list',
			'member' => [ 'shape' => 'SolutionStackName', ],
		],
		'BoxedBoolean'                                   => [ 'type' => 'boolean', ],
		'BoxedInt'                                       => [ 'type' => 'integer', ],
		'BuildConfiguration'                             => [
			'type'     => 'structure',
			'required' => [ 'CodeBuildServiceRole', 'Image', ],
			'members'  => [
				'ArtifactName'         => [ 'shape' => 'String', ],
				'CodeBuildServiceRole' => [ 'shape' => 'NonEmptyString', ],
				'ComputeType'          => [ 'shape' => 'ComputeType', ],
				'Image'                => [ 'shape' => 'NonEmptyString', ],
				'TimeoutInMinutes'     => [ 'shape' => 'BoxedInt', ],
			],
		],
		'Builder'                                        => [
			'type'    => 'structure',
			'members' => [ 'ARN' => [ 'shape' => 'ARN', ], ],
		],
		'CPUUtilization'                                 => [
			'type'    => 'structure',
			'members' => [
				'User'       => [ 'shape' => 'NullableDouble', ],
				'Nice'       => [ 'shape' => 'NullableDouble', ],
				'System'     => [ 'shape' => 'NullableDouble', ],
				'Idle'       => [ 'shape' => 'NullableDouble', ],
				'IOWait'     => [ 'shape' => 'NullableDouble', ],
				'IRQ'        => [ 'shape' => 'NullableDouble', ],
				'SoftIRQ'    => [ 'shape' => 'NullableDouble', ],
				'Privileged' => [ 'shape' => 'NullableDouble', ],
			],
		],
		'Cause'                                          => [ 'type' => 'string', 'max' => 255, 'min' => 1, ],
		'Causes'                                         => [ 'type' => 'list', 'member' => [ 'shape' => 'Cause', ], ],
		'CheckDNSAvailabilityMessage'                    => [
			'type'     => 'structure',
			'required' => [ 'CNAMEPrefix', ],
			'members'  => [ 'CNAMEPrefix' => [ 'shape' => 'DNSCnamePrefix', ], ],
		],
		'CheckDNSAvailabilityResultMessage'              => [
			'type'    => 'structure',
			'members' => [
				'Available'           => [ 'shape' => 'CnameAvailability', ],
				'FullyQualifiedCNAME' => [ 'shape' => 'DNSCname', ],
			],
		],
		'CnameAvailability'                              => [ 'type' => 'boolean', ],
		'CodeBuildNotInServiceRegionException'           => [
			'type'      => 'structure',
			'members'   => [],
			'error'     => [
				'code'           => 'CodeBuildNotInServiceRegionException',
				'httpStatusCode' => 400,
				'senderFault'    => true,
			],
			'exception' => true,
		],
		'ComposeEnvironmentsMessage'                     => [
			'type'    => 'structure',
			'members' => [
				'ApplicationName' => [ 'shape' => 'ApplicationName', ],
				'GroupName'       => [ 'shape' => 'GroupName', ],
				'VersionLabels'   => [ 'shape' => 'VersionLabels', ],
			],
		],
		'ComputeType'                                    => [
			'type' => 'string',
			'enum' => [
				'BUILD_GENERAL1_SMALL',
				'BUILD_GENERAL1_MEDIUM',
				'BUILD_GENERAL1_LARGE',
			],
		],
		'ConfigurationDeploymentStatus'                  => [
			'type' => 'string',
			'enum' => [ 'deployed', 'pending', 'failed', ],
		],
		'ConfigurationOptionDefaultValue'                => [ 'type' => 'string', ],
		'ConfigurationOptionDescription'                 => [
			'type'    => 'structure',
			'members' => [
				'Namespace'      => [ 'shape' => 'OptionNamespace', ],
				'Name'           => [ 'shape' => 'ConfigurationOptionName', ],
				'DefaultValue'   => [ 'shape' => 'ConfigurationOptionDefaultValue', ],
				'ChangeSeverity' => [ 'shape' => 'ConfigurationOptionSeverity', ],
				'UserDefined'    => [ 'shape' => 'UserDefinedOption', ],
				'ValueType'      => [ 'shape' => 'ConfigurationOptionValueType', ],
				'ValueOptions'   => [ 'shape' => 'ConfigurationOptionPossibleValues', ],
				'MinValue'       => [ 'shape' => 'OptionRestrictionMinValue', ],
				'MaxValue'       => [ 'shape' => 'OptionRestrictionMaxValue', ],
				'MaxLength'      => [ 'shape' => 'OptionRestrictionMaxLength', ],
				'Regex'          => [ 'shape' => 'OptionRestrictionRegex', ],
			],
		],
		'ConfigurationOptionDescriptionsList'            => [
			'type'   => 'list',
			'member' => [ 'shape' => 'ConfigurationOptionDescription', ],
		],
		'ConfigurationOptionName'                        => [ 'type' => 'string', ],
		'ConfigurationOptionPossibleValue'               => [ 'type' => 'string', ],
		'ConfigurationOptionPossibleValues'              => [
			'type'   => 'list',
			'member' => [ 'shape' => 'ConfigurationOptionPossibleValue', ],
		],
		'ConfigurationOptionSetting'                     => [
			'type'    => 'structure',
			'members' => [
				'ResourceName' => [ 'shape' => 'ResourceName', ],
				'Namespace'    => [ 'shape' => 'OptionNamespace', ],
				'OptionName'   => [ 'shape' => 'ConfigurationOptionName', ],
				'Value'        => [ 'shape' => 'ConfigurationOptionValue', ],
			],
		],
		'ConfigurationOptionSettingsList'                => [
			'type'   => 'list',
			'member' => [ 'shape' => 'ConfigurationOptionSetting', ],
		],
		'ConfigurationOptionSeverity'                    => [ 'type' => 'string', ],
		'ConfigurationOptionValue'                       => [ 'type' => 'string', ],
		'ConfigurationOptionValueType'                   => [ 'type' => 'string', 'enum' => [ 'Scalar', 'List', ], ],
		'ConfigurationOptionsDescription'                => [
			'type'    => 'structure',
			'members' => [
				'SolutionStackName' => [ 'shape' => 'SolutionStackName', ],
				'PlatformArn'       => [ 'shape' => 'PlatformArn', ],
				'Options'           => [ 'shape' => 'ConfigurationOptionDescriptionsList', ],
			],
		],
		'ConfigurationSettingsDescription'               => [
			'type'    => 'structure',
			'members' => [
				'SolutionStackName' => [ 'shape' => 'SolutionStackName', ],
				'PlatformArn'       => [ 'shape' => 'PlatformArn', ],
				'ApplicationName'   => [ 'shape' => 'ApplicationName', ],
				'TemplateName'      => [ 'shape' => 'ConfigurationTemplateName', ],
				'Description'       => [ 'shape' => 'Description', ],
				'EnvironmentName'   => [ 'shape' => 'EnvironmentName', ],
				'DeploymentStatus'  => [ 'shape' => 'ConfigurationDeploymentStatus', ],
				'DateCreated'       => [ 'shape' => 'CreationDate', ],
				'DateUpdated'       => [ 'shape' => 'UpdateDate', ],
				'OptionSettings'    => [ 'shape' => 'ConfigurationOptionSettingsList', ],
			],
		],
		'ConfigurationSettingsDescriptionList'           => [
			'type'   => 'list',
			'member' => [ 'shape' => 'ConfigurationSettingsDescription', ],
		],
		'ConfigurationSettingsDescriptions'              => [
			'type'    => 'structure',
			'members' => [ 'ConfigurationSettings' => [ 'shape' => 'ConfigurationSettingsDescriptionList', ], ],
		],
		'ConfigurationSettingsValidationMessages'        => [
			'type'    => 'structure',
			'members' => [ 'Messages' => [ 'shape' => 'ValidationMessagesList', ], ],
		],
		'ConfigurationTemplateName'                      => [ 'type' => 'string', 'max' => 100, 'min' => 1, ],
		'ConfigurationTemplateNamesList'                 => [
			'type'   => 'list',
			'member' => [ 'shape' => 'ConfigurationTemplateName', ],
		],
		'CreateApplicationMessage'                       => [
			'type'     => 'structure',
			'required' => [ 'ApplicationName', ],
			'members'  => [
				'ApplicationName'         => [ 'shape' => 'ApplicationName', ],
				'Description'             => [ 'shape' => 'Description', ],
				'ResourceLifecycleConfig' => [ 'shape' => 'ApplicationResourceLifecycleConfig', ],
				'Tags'                    => [ 'shape' => 'Tags', ],
			],
		],
		'CreateApplicationVersionMessage'                => [
			'type'     => 'structure',
			'required' => [ 'ApplicationName', 'VersionLabel', ],
			'members'  => [
				'ApplicationName'        => [ 'shape' => 'ApplicationName', ],
				'VersionLabel'           => [ 'shape' => 'VersionLabel', ],
				'Description'            => [ 'shape' => 'Description', ],
				'SourceBuildInformation' => [ 'shape' => 'SourceBuildInformation', ],
				'SourceBundle'           => [ 'shape' => 'S3Location', ],
				'BuildConfiguration'     => [ 'shape' => 'BuildConfiguration', ],
				'AutoCreateApplication'  => [ 'shape' => 'AutoCreateApplication', ],
				'Process'                => [ 'shape' => 'ApplicationVersionProccess', ],
				'Tags'                   => [ 'shape' => 'Tags', ],
			],
		],
		'CreateConfigurationTemplateMessage'             => [
			'type'     => 'structure',
			'required' => [ 'ApplicationName', 'TemplateName', ],
			'members'  => [
				'ApplicationName'     => [ 'shape' => 'ApplicationName', ],
				'TemplateName'        => [ 'shape' => 'ConfigurationTemplateName', ],
				'SolutionStackName'   => [ 'shape' => 'SolutionStackName', ],
				'PlatformArn'         => [ 'shape' => 'PlatformArn', ],
				'SourceConfiguration' => [ 'shape' => 'SourceConfiguration', ],
				'EnvironmentId'       => [ 'shape' => 'EnvironmentId', ],
				'Description'         => [ 'shape' => 'Description', ],
				'OptionSettings'      => [ 'shape' => 'ConfigurationOptionSettingsList', ],
				'Tags'                => [ 'shape' => 'Tags', ],
			],
		],
		'CreateEnvironmentMessage'                       => [
			'type'     => 'structure',
			'required' => [ 'ApplicationName', ],
			'members'  => [
				'ApplicationName'   => [ 'shape' => 'ApplicationName', ],
				'EnvironmentName'   => [ 'shape' => 'EnvironmentName', ],
				'GroupName'         => [ 'shape' => 'GroupName', ],
				'Description'       => [ 'shape' => 'Description', ],
				'CNAMEPrefix'       => [ 'shape' => 'DNSCnamePrefix', ],
				'Tier'              => [ 'shape' => 'EnvironmentTier', ],
				'Tags'              => [ 'shape' => 'Tags', ],
				'VersionLabel'      => [ 'shape' => 'VersionLabel', ],
				'TemplateName'      => [ 'shape' => 'ConfigurationTemplateName', ],
				'SolutionStackName' => [ 'shape' => 'SolutionStackName', ],
				'PlatformArn'       => [ 'shape' => 'PlatformArn', ],
				'OptionSettings'    => [ 'shape' => 'ConfigurationOptionSettingsList', ],
				'OptionsToRemove'   => [ 'shape' => 'OptionsSpecifierList', ],
			],
		],
		'CreatePlatformVersionRequest'                   => [
			'type'     => 'structure',
			'required' => [
				'PlatformName',
				'PlatformVersion',
				'PlatformDefinitionBundle',
			],
			'members'  => [
				'PlatformName'             => [ 'shape' => 'PlatformName', ],
				'PlatformVersion'          => [ 'shape' => 'PlatformVersion', ],
				'PlatformDefinitionBundle' => [ 'shape' => 'S3Location', ],
				'EnvironmentName'          => [ 'shape' => 'EnvironmentName', ],
				'OptionSettings'           => [ 'shape' => 'ConfigurationOptionSettingsList', ],
				'Tags'                     => [ 'shape' => 'Tags', ],
			],
		],
		'CreatePlatformVersionResult'                    => [
			'type'    => 'structure',
			'members' => [
				'PlatformSummary' => [ 'shape' => 'PlatformSummary', ],
				'Builder'         => [ 'shape' => 'Builder', ],
			],
		],
		'CreateStorageLocationResultMessage'             => [
			'type'    => 'structure',
			'members' => [ 'S3Bucket' => [ 'shape' => 'S3Bucket', ], ],
		],
		'CreationDate'                                   => [ 'type' => 'timestamp', ],
		'CustomAmi'                                      => [
			'type'    => 'structure',
			'members' => [
				'VirtualizationType' => [ 'shape' => 'VirtualizationType', ],
				'ImageId'            => [ 'shape' => 'ImageId', ],
			],
		],
		'CustomAmiList'                                  => [
			'type'   => 'list',
			'member' => [ 'shape' => 'CustomAmi', ],
		],
		'DNSCname'                                       => [ 'type' => 'string', 'max' => 255, 'min' => 1, ],
		'DNSCnamePrefix'                                 => [ 'type' => 'string', 'max' => 63, 'min' => 4, ],
		'DeleteApplicationMessage'                       => [
			'type'     => 'structure',
			'required' => [ 'ApplicationName', ],
			'members'  => [
				'ApplicationName'     => [ 'shape' => 'ApplicationName', ],
				'TerminateEnvByForce' => [ 'shape' => 'TerminateEnvForce', ],
			],
		],
		'DeleteApplicationVersionMessage'                => [
			'type'     => 'structure',
			'required' => [ 'ApplicationName', 'VersionLabel', ],
			'members'  => [
				'ApplicationName'    => [ 'shape' => 'ApplicationName', ],
				'VersionLabel'       => [ 'shape' => 'VersionLabel', ],
				'DeleteSourceBundle' => [ 'shape' => 'DeleteSourceBundle', ],
			],
		],
		'DeleteConfigurationTemplateMessage'             => [
			'type'     => 'structure',
			'required' => [ 'ApplicationName', 'TemplateName', ],
			'members'  => [
				'ApplicationName' => [ 'shape' => 'ApplicationName', ],
				'TemplateName'    => [ 'shape' => 'ConfigurationTemplateName', ],
			],
		],
		'DeleteEnvironmentConfigurationMessage'          => [
			'type'     => 'structure',
			'required' => [ 'ApplicationName', 'EnvironmentName', ],
			'members'  => [
				'ApplicationName' => [ 'shape' => 'ApplicationName', ],
				'EnvironmentName' => [ 'shape' => 'EnvironmentName', ],
			],
		],
		'DeletePlatformVersionRequest'                   => [
			'type'    => 'structure',
			'members' => [ 'PlatformArn' => [ 'shape' => 'PlatformArn', ], ],
		],
		'DeletePlatformVersionResult'                    => [
			'type'    => 'structure',
			'members' => [ 'PlatformSummary' => [ 'shape' => 'PlatformSummary', ], ],
		],
		'DeleteSourceBundle'                             => [ 'type' => 'boolean', ],
		'Deployment'                                     => [
			'type'    => 'structure',
			'members' => [
				'VersionLabel'   => [ 'shape' => 'String', ],
				'DeploymentId'   => [ 'shape' => 'NullableLong', ],
				'Status'         => [ 'shape' => 'String', ],
				'DeploymentTime' => [ 'shape' => 'DeploymentTimestamp', ],
			],
		],
		'DeploymentTimestamp'                            => [ 'type' => 'timestamp', ],
		'DescribeAccountAttributesResult'                => [
			'type'    => 'structure',
			'members' => [ 'ResourceQuotas' => [ 'shape' => 'ResourceQuotas', ], ],
		],
		'DescribeApplicationVersionsMessage'             => [
			'type'    => 'structure',
			'members' => [
				'ApplicationName' => [ 'shape' => 'ApplicationName', ],
				'VersionLabels'   => [ 'shape' => 'VersionLabelsList', ],
				'MaxRecords'      => [ 'shape' => 'MaxRecords', ],
				'NextToken'       => [ 'shape' => 'Token', ],
			],
		],
		'DescribeApplicationsMessage'                    => [
			'type'    => 'structure',
			'members' => [ 'ApplicationNames' => [ 'shape' => 'ApplicationNamesList', ], ],
		],
		'DescribeConfigurationOptionsMessage'            => [
			'type'    => 'structure',
			'members' => [
				'ApplicationName'   => [ 'shape' => 'ApplicationName', ],
				'TemplateName'      => [ 'shape' => 'ConfigurationTemplateName', ],
				'EnvironmentName'   => [ 'shape' => 'EnvironmentName', ],
				'SolutionStackName' => [ 'shape' => 'SolutionStackName', ],
				'PlatformArn'       => [ 'shape' => 'PlatformArn', ],
				'Options'           => [ 'shape' => 'OptionsSpecifierList', ],
			],
		],
		'DescribeConfigurationSettingsMessage'           => [
			'type'     => 'structure',
			'required' => [ 'ApplicationName', ],
			'members'  => [
				'ApplicationName' => [ 'shape' => 'ApplicationName', ],
				'TemplateName'    => [ 'shape' => 'ConfigurationTemplateName', ],
				'EnvironmentName' => [ 'shape' => 'EnvironmentName', ],
			],
		],
		'DescribeEnvironmentHealthRequest'               => [
			'type'    => 'structure',
			'members' => [
				'EnvironmentName' => [ 'shape' => 'EnvironmentName', ],
				'EnvironmentId'   => [ 'shape' => 'EnvironmentId', ],
				'AttributeNames'  => [ 'shape' => 'EnvironmentHealthAttributes', ],
			],
		],
		'DescribeEnvironmentHealthResult'                => [
			'type'    => 'structure',
			'members' => [
				'EnvironmentName'    => [ 'shape' => 'EnvironmentName', ],
				'HealthStatus'       => [ 'shape' => 'String', ],
				'Status'             => [ 'shape' => 'EnvironmentHealth', ],
				'Color'              => [ 'shape' => 'String', ],
				'Causes'             => [ 'shape' => 'Causes', ],
				'ApplicationMetrics' => [ 'shape' => 'ApplicationMetrics', ],
				'InstancesHealth'    => [ 'shape' => 'InstanceHealthSummary', ],
				'RefreshedAt'        => [ 'shape' => 'RefreshedAt', ],
			],
		],
		'DescribeEnvironmentManagedActionHistoryRequest' => [
			'type'    => 'structure',
			'members' => [
				'EnvironmentId'   => [ 'shape' => 'EnvironmentId', ],
				'EnvironmentName' => [ 'shape' => 'EnvironmentName', ],
				'NextToken'       => [ 'shape' => 'String', ],
				'MaxItems'        => [ 'shape' => 'Integer', ],
			],
		],
		'DescribeEnvironmentManagedActionHistoryResult'  => [
			'type'    => 'structure',
			'members' => [
				'ManagedActionHistoryItems' => [ 'shape' => 'ManagedActionHistoryItems', ],
				'NextToken'                 => [ 'shape' => 'String', ],
			],
		],
		'DescribeEnvironmentManagedActionsRequest'       => [
			'type'    => 'structure',
			'members' => [
				'EnvironmentName' => [ 'shape' => 'String', ],
				'EnvironmentId'   => [ 'shape' => 'String', ],
				'Status'          => [ 'shape' => 'ActionStatus', ],
			],
		],
		'DescribeEnvironmentManagedActionsResult'        => [
			'type'    => 'structure',
			'members' => [ 'ManagedActions' => [ 'shape' => 'ManagedActions', ], ],
		],
		'DescribeEnvironmentResourcesMessage'            => [
			'type'    => 'structure',
			'members' => [
				'EnvironmentId'   => [ 'shape' => 'EnvironmentId', ],
				'EnvironmentName' => [ 'shape' => 'EnvironmentName', ],
			],
		],
		'DescribeEnvironmentsMessage'                    => [
			'type'    => 'structure',
			'members' => [
				'ApplicationName'       => [ 'shape' => 'ApplicationName', ],
				'VersionLabel'          => [ 'shape' => 'VersionLabel', ],
				'EnvironmentIds'        => [ 'shape' => 'EnvironmentIdList', ],
				'EnvironmentNames'      => [ 'shape' => 'EnvironmentNamesList', ],
				'IncludeDeleted'        => [ 'shape' => 'IncludeDeleted', ],
				'IncludedDeletedBackTo' => [ 'shape' => 'IncludeDeletedBackTo', ],
				'MaxRecords'            => [ 'shape' => 'MaxRecords', ],
				'NextToken'             => [ 'shape' => 'Token', ],
			],
		],
		'DescribeEventsMessage'                          => [
			'type'    => 'structure',
			'members' => [
				'ApplicationName' => [ 'shape' => 'ApplicationName', ],
				'VersionLabel'    => [ 'shape' => 'VersionLabel', ],
				'TemplateName'    => [ 'shape' => 'ConfigurationTemplateName', ],
				'EnvironmentId'   => [ 'shape' => 'EnvironmentId', ],
				'EnvironmentName' => [ 'shape' => 'EnvironmentName', ],
				'PlatformArn'     => [ 'shape' => 'PlatformArn', ],
				'RequestId'       => [ 'shape' => 'RequestId', ],
				'Severity'        => [ 'shape' => 'EventSeverity', ],
				'StartTime'       => [ 'shape' => 'TimeFilterStart', ],
				'EndTime'         => [ 'shape' => 'TimeFilterEnd', ],
				'MaxRecords'      => [ 'shape' => 'MaxRecords', ],
				'NextToken'       => [ 'shape' => 'Token', ],
			],
		],
		'DescribeInstancesHealthRequest'                 => [
			'type'    => 'structure',
			'members' => [
				'EnvironmentName' => [ 'shape' => 'EnvironmentName', ],
				'EnvironmentId'   => [ 'shape' => 'EnvironmentId', ],
				'AttributeNames'  => [ 'shape' => 'InstancesHealthAttributes', ],
				'NextToken'       => [ 'shape' => 'NextToken', ],
			],
		],
		'DescribeInstancesHealthResult'                  => [
			'type'    => 'structure',
			'members' => [
				'InstanceHealthList' => [ 'shape' => 'InstanceHealthList', ],
				'RefreshedAt'        => [ 'shape' => 'RefreshedAt', ],
				'NextToken'          => [ 'shape' => 'NextToken', ],
			],
		],
		'DescribePlatformVersionRequest'                 => [
			'type'    => 'structure',
			'members' => [ 'PlatformArn' => [ 'shape' => 'PlatformArn', ], ],
		],
		'DescribePlatformVersionResult'                  => [
			'type'    => 'structure',
			'members' => [ 'PlatformDescription' => [ 'shape' => 'PlatformDescription', ], ],
		],
		'Description'                                    => [ 'type' => 'string', 'max' => 200, ],
		'Ec2InstanceId'                                  => [ 'type' => 'string', ],
		'ElasticBeanstalkServiceException'               => [
			'type'      => 'structure',
			'members'   => [ 'message' => [ 'shape' => 'ExceptionMessage', ], ],
			'exception' => true,
		],
		'EndpointURL'                                    => [ 'type' => 'string', ],
		'EnvironmentArn'                                 => [ 'type' => 'string', ],
		'EnvironmentDescription'                         => [
			'type'    => 'structure',
			'members' => [
				'EnvironmentName'              => [ 'shape' => 'EnvironmentName', ],
				'EnvironmentId'                => [ 'shape' => 'EnvironmentId', ],
				'ApplicationName'              => [ 'shape' => 'ApplicationName', ],
				'VersionLabel'                 => [ 'shape' => 'VersionLabel', ],
				'SolutionStackName'            => [ 'shape' => 'SolutionStackName', ],
				'PlatformArn'                  => [ 'shape' => 'PlatformArn', ],
				'TemplateName'                 => [ 'shape' => 'ConfigurationTemplateName', ],
				'Description'                  => [ 'shape' => 'Description', ],
				'EndpointURL'                  => [ 'shape' => 'EndpointURL', ],
				'CNAME'                        => [ 'shape' => 'DNSCname', ],
				'DateCreated'                  => [ 'shape' => 'CreationDate', ],
				'DateUpdated'                  => [ 'shape' => 'UpdateDate', ],
				'Status'                       => [ 'shape' => 'EnvironmentStatus', ],
				'AbortableOperationInProgress' => [ 'shape' => 'AbortableOperationInProgress', ],
				'Health'                       => [ 'shape' => 'EnvironmentHealth', ],
				'HealthStatus'                 => [ 'shape' => 'EnvironmentHealthStatus', ],
				'Resources'                    => [ 'shape' => 'EnvironmentResourcesDescription', ],
				'Tier'                         => [ 'shape' => 'EnvironmentTier', ],
				'EnvironmentLinks'             => [ 'shape' => 'EnvironmentLinks', ],
				'EnvironmentArn'               => [ 'shape' => 'EnvironmentArn', ],
			],
		],
		'EnvironmentDescriptionsList'                    => [
			'type'   => 'list',
			'member' => [ 'shape' => 'EnvironmentDescription', ],
		],
		'EnvironmentDescriptionsMessage'                 => [
			'type'    => 'structure',
			'members' => [
				'Environments' => [ 'shape' => 'EnvironmentDescriptionsList', ],
				'NextToken'    => [ 'shape' => 'Token', ],
			],
		],
		'EnvironmentHealth'                              => [
			'type' => 'string',
			'enum' => [ 'Green', 'Yellow', 'Red', 'Grey', ],
		],
		'EnvironmentHealthAttribute'                     => [
			'type' => 'string',
			'enum' => [
				'Status',
				'Color',
				'Causes',
				'ApplicationMetrics',
				'InstancesHealth',
				'All',
				'HealthStatus',
				'RefreshedAt',
			],
		],
		'EnvironmentHealthAttributes'                    => [
			'type'   => 'list',
			'member' => [ 'shape' => 'EnvironmentHealthAttribute', ],
		],
		'EnvironmentHealthStatus'                        => [
			'type' => 'string',
			'enum' => [
				'NoData',
				'Unknown',
				'Pending',
				'Ok',
				'Info',
				'Warning',
				'Degraded',
				'Severe',
				'Suspended',
			],
		],
		'EnvironmentId'                                  => [ 'type' => 'string', ],
		'EnvironmentIdList'                              => [
			'type'   => 'list',
			'member' => [ 'shape' => 'EnvironmentId', ],
		],
		'EnvironmentInfoDescription'                     => [
			'type'    => 'structure',
			'members' => [
				'InfoType'        => [ 'shape' => 'EnvironmentInfoType', ],
				'Ec2InstanceId'   => [ 'shape' => 'Ec2InstanceId', ],
				'SampleTimestamp' => [ 'shape' => 'SampleTimestamp', ],
				'Message'         => [ 'shape' => 'Message', ],
			],
		],
		'EnvironmentInfoDescriptionList'                 => [
			'type'   => 'list',
			'member' => [ 'shape' => 'EnvironmentInfoDescription', ],
		],
		'EnvironmentInfoType'                            => [ 'type' => 'string', 'enum' => [ 'tail', 'bundle', ], ],
		'EnvironmentLink'                                => [
			'type'    => 'structure',
			'members' => [
				'LinkName'        => [ 'shape' => 'String', ],
				'EnvironmentName' => [ 'shape' => 'String', ],
			],
		],
		'EnvironmentLinks'                               => [
			'type'   => 'list',
			'member' => [ 'shape' => 'EnvironmentLink', ],
		],
		'EnvironmentName'                                => [ 'type' => 'string', 'max' => 40, 'min' => 4, ],
		'EnvironmentNamesList'                           => [
			'type'   => 'list',
			'member' => [ 'shape' => 'EnvironmentName', ],
		],
		'EnvironmentResourceDescription'                 => [
			'type'    => 'structure',
			'members' => [
				'EnvironmentName'      => [ 'shape' => 'EnvironmentName', ],
				'AutoScalingGroups'    => [ 'shape' => 'AutoScalingGroupList', ],
				'Instances'            => [ 'shape' => 'InstanceList', ],
				'LaunchConfigurations' => [ 'shape' => 'LaunchConfigurationList', ],
				'LaunchTemplates'      => [ 'shape' => 'LaunchTemplateList', ],
				'LoadBalancers'        => [ 'shape' => 'LoadBalancerList', ],
				'Triggers'             => [ 'shape' => 'TriggerList', ],
				'Queues'               => [ 'shape' => 'QueueList', ],
			],
		],
		'EnvironmentResourceDescriptionsMessage'         => [
			'type'    => 'structure',
			'members' => [ 'EnvironmentResources' => [ 'shape' => 'EnvironmentResourceDescription', ], ],
		],
		'EnvironmentResourcesDescription'                => [
			'type'    => 'structure',
			'members' => [ 'LoadBalancer' => [ 'shape' => 'LoadBalancerDescription', ], ],
		],
		'EnvironmentStatus'                              => [
			'type' => 'string',
			'enum' => [
				'Launching',
				'Updating',
				'Ready',
				'Terminating',
				'Terminated',
			],
		],
		'EnvironmentTier'                                => [
			'type'    => 'structure',
			'members' => [
				'Name'    => [ 'shape' => 'String', ],
				'Type'    => [ 'shape' => 'String', ],
				'Version' => [ 'shape' => 'String', ],
			],
		],
		'EventDate'                                      => [ 'type' => 'timestamp', ],
		'EventDescription'                               => [
			'type'    => 'structure',
			'members' => [
				'EventDate'       => [ 'shape' => 'EventDate', ],
				'Message'         => [ 'shape' => 'EventMessage', ],
				'ApplicationName' => [ 'shape' => 'ApplicationName', ],
				'VersionLabel'    => [ 'shape' => 'VersionLabel', ],
				'TemplateName'    => [ 'shape' => 'ConfigurationTemplateName', ],
				'EnvironmentName' => [ 'shape' => 'EnvironmentName', ],
				'PlatformArn'     => [ 'shape' => 'PlatformArn', ],
				'RequestId'       => [ 'shape' => 'RequestId', ],
				'Severity'        => [ 'shape' => 'EventSeverity', ],
			],
		],
		'EventDescriptionList'                           => [
			'type'   => 'list',
			'member' => [ 'shape' => 'EventDescription', ],
		],
		'EventDescriptionsMessage'                       => [
			'type'    => 'structure',
			'members' => [
				'Events'    => [ 'shape' => 'EventDescriptionList', ],
				'NextToken' => [ 'shape' => 'Token', ],
			],
		],
		'EventMessage'                                   => [ 'type' => 'string', ],
		'EventSeverity'                                  => [
			'type' => 'string',
			'enum' => [
				'TRACE',
				'DEBUG',
				'INFO',
				'WARN',
				'ERROR',
				'FATAL',
			],
		],
		'ExceptionMessage'                               => [ 'type' => 'string', ],
		'FailureType'                                    => [
			'type' => 'string',
			'enum' => [
				'UpdateCancelled',
				'CancellationFailed',
				'RollbackFailed',
				'RollbackSuccessful',
				'InternalFailure',
				'InvalidEnvironmentState',
				'PermissionsError',
			],
		],
		'FileTypeExtension'                              => [ 'type' => 'string', 'max' => 100, 'min' => 1, ],
		'ForceTerminate'                                 => [ 'type' => 'boolean', ],
		'GroupName'                                      => [ 'type' => 'string', 'max' => 19, 'min' => 1, ],
		'ImageId'                                        => [ 'type' => 'string', ],
		'IncludeDeleted'                                 => [ 'type' => 'boolean', ],
		'IncludeDeletedBackTo'                           => [ 'type' => 'timestamp', ],
		'Instance'                                       => [
			'type'    => 'structure',
			'members' => [ 'Id' => [ 'shape' => 'ResourceId', ], ],
		],
		'InstanceHealthList'                             => [
			'type'   => 'list',
			'member' => [ 'shape' => 'SingleInstanceHealth', ],
		],
		'InstanceHealthSummary'                          => [
			'type'    => 'structure',
			'members' => [
				'NoData'   => [ 'shape' => 'NullableInteger', ],
				'Unknown'  => [ 'shape' => 'NullableInteger', ],
				'Pending'  => [ 'shape' => 'NullableInteger', ],
				'Ok'       => [ 'shape' => 'NullableInteger', ],
				'Info'     => [ 'shape' => 'NullableInteger', ],
				'Warning'  => [ 'shape' => 'NullableInteger', ],
				'Degraded' => [ 'shape' => 'NullableInteger', ],
				'Severe'   => [ 'shape' => 'NullableInteger', ],
			],
		],
		'InstanceId'                                     => [ 'type' => 'string', 'max' => 255, 'min' => 1, ],
		'InstanceList'                                   => [
			'type'   => 'list',
			'member' => [ 'shape' => 'Instance', ],
		],
		'InstancesHealthAttribute'                       => [
			'type' => 'string',
			'enum' => [
				'HealthStatus',
				'Color',
				'Causes',
				'ApplicationMetrics',
				'RefreshedAt',
				'LaunchedAt',
				'System',
				'Deployment',
				'AvailabilityZone',
				'InstanceType',
				'All',
			],
		],
		'InstancesHealthAttributes'                      => [
			'type'   => 'list',
			'member' => [ 'shape' => 'InstancesHealthAttribute', ],
		],
		'InsufficientPrivilegesException'                => [
			'type'      => 'structure',
			'members'   => [],
			'error'     => [
				'code'           => 'InsufficientPrivilegesException',
				'httpStatusCode' => 403,
				'senderFault'    => true,
			],
			'exception' => true,
		],
		'Integer'                                        => [ 'type' => 'integer', ],
		'InvalidRequestException'                        => [
			'type'      => 'structure',
			'members'   => [],
			'error'     => [
				'code'           => 'InvalidRequestException',
				'httpStatusCode' => 400,
				'senderFault'    => true,
			],
			'exception' => true,
		],
		'Latency'                                        => [
			'type'    => 'structure',
			'members' => [
				'P999' => [ 'shape' => 'NullableDouble', ],
				'P99'  => [ 'shape' => 'NullableDouble', ],
				'P95'  => [ 'shape' => 'NullableDouble', ],
				'P90'  => [ 'shape' => 'NullableDouble', ],
				'P85'  => [ 'shape' => 'NullableDouble', ],
				'P75'  => [ 'shape' => 'NullableDouble', ],
				'P50'  => [ 'shape' => 'NullableDouble', ],
				'P10'  => [ 'shape' => 'NullableDouble', ],
			],
		],
		'LaunchConfiguration'                            => [
			'type'    => 'structure',
			'members' => [ 'Name' => [ 'shape' => 'ResourceId', ], ],
		],
		'LaunchConfigurationList'                        => [
			'type'   => 'list',
			'member' => [ 'shape' => 'LaunchConfiguration', ],
		],
		'LaunchTemplate'                                 => [
			'type'    => 'structure',
			'members' => [ 'Id' => [ 'shape' => 'ResourceId', ], ],
		],
		'LaunchTemplateList'                             => [
			'type'   => 'list',
			'member' => [ 'shape' => 'LaunchTemplate', ],
		],
		'LaunchedAt'                                     => [ 'type' => 'timestamp', ],
		'ListAvailableSolutionStacksResultMessage'       => [
			'type'    => 'structure',
			'members' => [
				'SolutionStacks'       => [ 'shape' => 'AvailableSolutionStackNamesList', ],
				'SolutionStackDetails' => [ 'shape' => 'AvailableSolutionStackDetailsList', ],
			],
		],
		'ListPlatformVersionsRequest'                    => [
			'type'    => 'structure',
			'members' => [
				'Filters'    => [ 'shape' => 'PlatformFilters', ],
				'MaxRecords' => [ 'shape' => 'PlatformMaxRecords', ],
				'NextToken'  => [ 'shape' => 'Token', ],
			],
		],
		'ListPlatformVersionsResult'                     => [
			'type'    => 'structure',
			'members' => [
				'PlatformSummaryList' => [ 'shape' => 'PlatformSummaryList', ],
				'NextToken'           => [ 'shape' => 'Token', ],
			],
		],
		'ListTagsForResourceMessage'                     => [
			'type'     => 'structure',
			'required' => [ 'ResourceArn', ],
			'members'  => [ 'ResourceArn' => [ 'shape' => 'ResourceArn', ], ],
		],
		'Listener'                                       => [
			'type'    => 'structure',
			'members' => [
				'Protocol' => [ 'shape' => 'String', ],
				'Port'     => [ 'shape' => 'Integer', ],
			],
		],
		'LoadAverage'                                    => [
			'type'   => 'list',
			'member' => [ 'shape' => 'LoadAverageValue', ],
		],
		'LoadAverageValue'                               => [ 'type' => 'double', ],
		'LoadBalancer'                                   => [
			'type'    => 'structure',
			'members' => [ 'Name' => [ 'shape' => 'ResourceId', ], ],
		],
		'LoadBalancerDescription'                        => [
			'type'    => 'structure',
			'members' => [
				'LoadBalancerName' => [ 'shape' => 'String', ],
				'Domain'           => [ 'shape' => 'String', ],
				'Listeners'        => [ 'shape' => 'LoadBalancerListenersDescription', ],
			],
		],
		'LoadBalancerList'                               => [
			'type'   => 'list',
			'member' => [ 'shape' => 'LoadBalancer', ],
		],
		'LoadBalancerListenersDescription'               => [
			'type'   => 'list',
			'member' => [ 'shape' => 'Listener', ],
		],
		'Maintainer'                                     => [ 'type' => 'string', ],
		'ManagedAction'                                  => [
			'type'    => 'structure',
			'members' => [
				'ActionId'          => [ 'shape' => 'String', ],
				'ActionDescription' => [ 'shape' => 'String', ],
				'ActionType'        => [ 'shape' => 'ActionType', ],
				'Status'            => [ 'shape' => 'ActionStatus', ],
				'WindowStartTime'   => [ 'shape' => 'Timestamp', ],
			],
		],
		'ManagedActionHistoryItem'                       => [
			'type'    => 'structure',
			'members' => [
				'ActionId'           => [ 'shape' => 'String', ],
				'ActionType'         => [ 'shape' => 'ActionType', ],
				'ActionDescription'  => [ 'shape' => 'String', ],
				'FailureType'        => [ 'shape' => 'FailureType', ],
				'Status'             => [ 'shape' => 'ActionHistoryStatus', ],
				'FailureDescription' => [ 'shape' => 'String', ],
				'ExecutedTime'       => [ 'shape' => 'Timestamp', ],
				'FinishedTime'       => [ 'shape' => 'Timestamp', ],
			],
		],
		'ManagedActionHistoryItems'                      => [
			'type'   => 'list',
			'member' => [ 'shape' => 'ManagedActionHistoryItem', ],
			'max'    => 100,
			'min'    => 1,
		],
		'ManagedActionInvalidStateException'             => [
			'type'      => 'structure',
			'members'   => [],
			'error'     => [
				'code'           => 'ManagedActionInvalidStateException',
				'httpStatusCode' => 400,
				'senderFault'    => true,
			],
			'exception' => true,
		],
		'ManagedActions'                                 => [
			'type'   => 'list',
			'member' => [ 'shape' => 'ManagedAction', ],
			'max'    => 100,
			'min'    => 1,
		],
		'MaxAgeRule'                                     => [
			'type'     => 'structure',
			'required' => [ 'Enabled', ],
			'members'  => [
				'Enabled'            => [ 'shape' => 'BoxedBoolean', ],
				'MaxAgeInDays'       => [ 'shape' => 'BoxedInt', ],
				'DeleteSourceFromS3' => [ 'shape' => 'BoxedBoolean', ],
			],
		],
		'MaxCountRule'                                   => [
			'type'     => 'structure',
			'required' => [ 'Enabled', ],
			'members'  => [
				'Enabled'            => [ 'shape' => 'BoxedBoolean', ],
				'MaxCount'           => [ 'shape' => 'BoxedInt', ],
				'DeleteSourceFromS3' => [ 'shape' => 'BoxedBoolean', ],
			],
		],
		'MaxRecords'                                     => [ 'type' => 'integer', 'max' => 1000, 'min' => 1, ],
		'Message'                                        => [ 'type' => 'string', ],
		'NextToken'                                      => [ 'type' => 'string', 'max' => 100, 'min' => 1, ],
		'NonEmptyString'                                 => [ 'type' => 'string', 'pattern' => '.*\\S.*', ],
		'NullableDouble'                                 => [ 'type' => 'double', ],
		'NullableInteger'                                => [ 'type' => 'integer', ],
		'NullableLong'                                   => [ 'type' => 'long', ],
		'OperatingSystemName'                            => [ 'type' => 'string', ],
		'OperatingSystemVersion'                         => [ 'type' => 'string', ],
		'OperationInProgressException'                   => [
			'type'      => 'structure',
			'members'   => [],
			'error'     => [
				'code'           => 'OperationInProgressFailure',
				'httpStatusCode' => 400,
				'senderFault'    => true,
			],
			'exception' => true,
		],
		'OptionNamespace'                                => [ 'type' => 'string', ],
		'OptionRestrictionMaxLength'                     => [ 'type' => 'integer', ],
		'OptionRestrictionMaxValue'                      => [ 'type' => 'integer', ],
		'OptionRestrictionMinValue'                      => [ 'type' => 'integer', ],
		'OptionRestrictionRegex'                         => [
			'type'    => 'structure',
			'members' => [
				'Pattern' => [ 'shape' => 'RegexPattern', ],
				'Label'   => [ 'shape' => 'RegexLabel', ],
			],
		],
		'OptionSpecification'                            => [
			'type'    => 'structure',
			'members' => [
				'ResourceName' => [ 'shape' => 'ResourceName', ],
				'Namespace'    => [ 'shape' => 'OptionNamespace', ],
				'OptionName'   => [ 'shape' => 'ConfigurationOptionName', ],
			],
		],
		'OptionsSpecifierList'                           => [
			'type'   => 'list',
			'member' => [ 'shape' => 'OptionSpecification', ],
		],
		'PlatformArn'                                    => [ 'type' => 'string', ],
		'PlatformCategory'                               => [ 'type' => 'string', ],
		'PlatformDescription'                            => [
			'type'    => 'structure',
			'members' => [
				'PlatformArn'            => [ 'shape' => 'PlatformArn', ],
				'PlatformOwner'          => [ 'shape' => 'PlatformOwner', ],
				'PlatformName'           => [ 'shape' => 'PlatformName', ],
				'PlatformVersion'        => [ 'shape' => 'PlatformVersion', ],
				'SolutionStackName'      => [ 'shape' => 'SolutionStackName', ],
				'PlatformStatus'         => [ 'shape' => 'PlatformStatus', ],
				'DateCreated'            => [ 'shape' => 'CreationDate', ],
				'DateUpdated'            => [ 'shape' => 'UpdateDate', ],
				'PlatformCategory'       => [ 'shape' => 'PlatformCategory', ],
				'Description'            => [ 'shape' => 'Description', ],
				'Maintainer'             => [ 'shape' => 'Maintainer', ],
				'OperatingSystemName'    => [ 'shape' => 'OperatingSystemName', ],
				'OperatingSystemVersion' => [ 'shape' => 'OperatingSystemVersion', ],
				'ProgrammingLanguages'   => [ 'shape' => 'PlatformProgrammingLanguages', ],
				'Frameworks'             => [ 'shape' => 'PlatformFrameworks', ],
				'CustomAmiList'          => [ 'shape' => 'CustomAmiList', ],
				'SupportedTierList'      => [ 'shape' => 'SupportedTierList', ],
				'SupportedAddonList'     => [ 'shape' => 'SupportedAddonList', ],
			],
		],
		'PlatformFilter'                                 => [
			'type'    => 'structure',
			'members' => [
				'Type'     => [ 'shape' => 'PlatformFilterType', ],
				'Operator' => [ 'shape' => 'PlatformFilterOperator', ],
				'Values'   => [ 'shape' => 'PlatformFilterValueList', ],
			],
		],
		'PlatformFilterOperator'                         => [ 'type' => 'string', ],
		'PlatformFilterType'                             => [ 'type' => 'string', ],
		'PlatformFilterValue'                            => [ 'type' => 'string', ],
		'PlatformFilterValueList'                        => [
			'type'   => 'list',
			'member' => [ 'shape' => 'PlatformFilterValue', ],
		],
		'PlatformFilters'                                => [
			'type'   => 'list',
			'member' => [ 'shape' => 'PlatformFilter', ],
		],
		'PlatformFramework'                              => [
			'type'    => 'structure',
			'members' => [
				'Name'    => [ 'shape' => 'String', ],
				'Version' => [ 'shape' => 'String', ],
			],
		],
		'PlatformFrameworks'                             => [
			'type'   => 'list',
			'member' => [ 'shape' => 'PlatformFramework', ],
		],
		'PlatformMaxRecords'                             => [ 'type' => 'integer', 'min' => 1, ],
		'PlatformName'                                   => [ 'type' => 'string', ],
		'PlatformOwner'                                  => [ 'type' => 'string', ],
		'PlatformProgrammingLanguage'                    => [
			'type'    => 'structure',
			'members' => [
				'Name'    => [ 'shape' => 'String', ],
				'Version' => [ 'shape' => 'String', ],
			],
		],
		'PlatformProgrammingLanguages'                   => [
			'type'   => 'list',
			'member' => [ 'shape' => 'PlatformProgrammingLanguage', ],
		],
		'PlatformStatus'                                 => [
			'type' => 'string',
			'enum' => [
				'Creating',
				'Failed',
				'Ready',
				'Deleting',
				'Deleted',
			],
		],
		'PlatformSummary'                                => [
			'type'    => 'structure',
			'members' => [
				'PlatformArn'            => [ 'shape' => 'PlatformArn', ],
				'PlatformOwner'          => [ 'shape' => 'PlatformOwner', ],
				'PlatformStatus'         => [ 'shape' => 'PlatformStatus', ],
				'PlatformCategory'       => [ 'shape' => 'PlatformCategory', ],
				'OperatingSystemName'    => [ 'shape' => 'OperatingSystemName', ],
				'OperatingSystemVersion' => [ 'shape' => 'OperatingSystemVersion', ],
				'SupportedTierList'      => [ 'shape' => 'SupportedTierList', ],
				'SupportedAddonList'     => [ 'shape' => 'SupportedAddonList', ],
			],
		],
		'PlatformSummaryList'                            => [
			'type'   => 'list',
			'member' => [ 'shape' => 'PlatformSummary', ],
		],
		'PlatformVersion'                                => [ 'type' => 'string', ],
		'PlatformVersionStillReferencedException'        => [
			'type'      => 'structure',
			'members'   => [],
			'error'     => [
				'code'           => 'PlatformVersionStillReferencedException',
				'httpStatusCode' => 400,
				'senderFault'    => true,
			],
			'exception' => true,
		],
		'Queue'                                          => [
			'type'    => 'structure',
			'members' => [
				'Name' => [ 'shape' => 'String', ],
				'URL'  => [ 'shape' => 'String', ],
			],
		],
		'QueueList'                                      => [ 'type' => 'list', 'member' => [ 'shape' => 'Queue', ], ],
		'RebuildEnvironmentMessage'                      => [
			'type'    => 'structure',
			'members' => [
				'EnvironmentId'   => [ 'shape' => 'EnvironmentId', ],
				'EnvironmentName' => [ 'shape' => 'EnvironmentName', ],
			],
		],
		'RefreshedAt'                                    => [ 'type' => 'timestamp', ],
		'RegexLabel'                                     => [ 'type' => 'string', ],
		'RegexPattern'                                   => [ 'type' => 'string', ],
		'RequestCount'                                   => [ 'type' => 'integer', ],
		'RequestEnvironmentInfoMessage'                  => [
			'type'     => 'structure',
			'required' => [ 'InfoType', ],
			'members'  => [
				'EnvironmentId'   => [ 'shape' => 'EnvironmentId', ],
				'EnvironmentName' => [ 'shape' => 'EnvironmentName', ],
				'InfoType'        => [ 'shape' => 'EnvironmentInfoType', ],
			],
		],
		'RequestId'                                      => [ 'type' => 'string', ],
		'ResourceArn'                                    => [ 'type' => 'string', ],
		'ResourceId'                                     => [ 'type' => 'string', ],
		'ResourceName'                                   => [ 'type' => 'string', 'max' => 256, 'min' => 1, ],
		'ResourceNotFoundException'                      => [
			'type'      => 'structure',
			'members'   => [],
			'error'     => [
				'code'           => 'ResourceNotFoundException',
				'httpStatusCode' => 400,
				'senderFault'    => true,
			],
			'exception' => true,
		],
		'ResourceQuota'                                  => [
			'type'    => 'structure',
			'members' => [ 'Maximum' => [ 'shape' => 'BoxedInt', ], ],
		],
		'ResourceQuotas'                                 => [
			'type'    => 'structure',
			'members' => [
				'ApplicationQuota'           => [ 'shape' => 'ResourceQuota', ],
				'ApplicationVersionQuota'    => [ 'shape' => 'ResourceQuota', ],
				'EnvironmentQuota'           => [ 'shape' => 'ResourceQuota', ],
				'ConfigurationTemplateQuota' => [ 'shape' => 'ResourceQuota', ],
				'CustomPlatformQuota'        => [ 'shape' => 'ResourceQuota', ],
			],
		],
		'ResourceTagsDescriptionMessage'                 => [
			'type'    => 'structure',
			'members' => [
				'ResourceArn'  => [ 'shape' => 'ResourceArn', ],
				'ResourceTags' => [ 'shape' => 'TagList', ],
			],
		],
		'ResourceTypeNotSupportedException'              => [
			'type'      => 'structure',
			'members'   => [],
			'error'     => [
				'code'           => 'ResourceTypeNotSupportedException',
				'httpStatusCode' => 400,
				'senderFault'    => true,
			],
			'exception' => true,
		],
		'RestartAppServerMessage'                        => [
			'type'    => 'structure',
			'members' => [
				'EnvironmentId'   => [ 'shape' => 'EnvironmentId', ],
				'EnvironmentName' => [ 'shape' => 'EnvironmentName', ],
			],
		],
		'RetrieveEnvironmentInfoMessage'                 => [
			'type'     => 'structure',
			'required' => [ 'InfoType', ],
			'members'  => [
				'EnvironmentId'   => [ 'shape' => 'EnvironmentId', ],
				'EnvironmentName' => [ 'shape' => 'EnvironmentName', ],
				'InfoType'        => [ 'shape' => 'EnvironmentInfoType', ],
			],
		],
		'RetrieveEnvironmentInfoResultMessage'           => [
			'type'    => 'structure',
			'members' => [ 'EnvironmentInfo' => [ 'shape' => 'EnvironmentInfoDescriptionList', ], ],
		],
		'S3Bucket'                                       => [ 'type' => 'string', 'max' => 255, ],
		'S3Key'                                          => [ 'type' => 'string', 'max' => 1024, ],
		'S3Location'                                     => [
			'type'    => 'structure',
			'members' => [
				'S3Bucket' => [ 'shape' => 'S3Bucket', ],
				'S3Key'    => [ 'shape' => 'S3Key', ],
			],
		],
		'S3LocationNotInServiceRegionException'          => [
			'type'      => 'structure',
			'members'   => [],
			'error'     => [
				'code'           => 'S3LocationNotInServiceRegionException',
				'httpStatusCode' => 400,
				'senderFault'    => true,
			],
			'exception' => true,
		],
		'S3SubscriptionRequiredException'                => [
			'type'      => 'structure',
			'members'   => [],
			'error'     => [
				'code'           => 'S3SubscriptionRequiredException',
				'httpStatusCode' => 400,
				'senderFault'    => true,
			],
			'exception' => true,
		],
		'SampleTimestamp'                                => [ 'type' => 'timestamp', ],
		'SingleInstanceHealth'                           => [
			'type'    => 'structure',
			'members' => [
				'InstanceId'         => [ 'shape' => 'InstanceId', ],
				'HealthStatus'       => [ 'shape' => 'String', ],
				'Color'              => [ 'shape' => 'String', ],
				'Causes'             => [ 'shape' => 'Causes', ],
				'LaunchedAt'         => [ 'shape' => 'LaunchedAt', ],
				'ApplicationMetrics' => [ 'shape' => 'ApplicationMetrics', ],
				'System'             => [ 'shape' => 'SystemStatus', ],
				'Deployment'         => [ 'shape' => 'Deployment', ],
				'AvailabilityZone'   => [ 'shape' => 'String', ],
				'InstanceType'       => [ 'shape' => 'String', ],
			],
		],
		'SolutionStackDescription'                       => [
			'type'    => 'structure',
			'members' => [
				'SolutionStackName'  => [ 'shape' => 'SolutionStackName', ],
				'PermittedFileTypes' => [ 'shape' => 'SolutionStackFileTypeList', ],
			],
		],
		'SolutionStackFileTypeList'                      => [
			'type'   => 'list',
			'member' => [ 'shape' => 'FileTypeExtension', ],
		],
		'SolutionStackName'                              => [ 'type' => 'string', ],
		'SourceBuildInformation'                         => [
			'type'     => 'structure',
			'required' => [
				'SourceType',
				'SourceRepository',
				'SourceLocation',
			],
			'members'  => [
				'SourceType'       => [ 'shape' => 'SourceType', ],
				'SourceRepository' => [ 'shape' => 'SourceRepository', ],
				'SourceLocation'   => [ 'shape' => 'SourceLocation', ],
			],
		],
		'SourceBundleDeletionException'                  => [
			'type'      => 'structure',
			'members'   => [],
			'error'     => [
				'code'           => 'SourceBundleDeletionFailure',
				'httpStatusCode' => 400,
				'senderFault'    => true,
			],
			'exception' => true,
		],
		'SourceConfiguration'                            => [
			'type'    => 'structure',
			'members' => [
				'ApplicationName' => [ 'shape' => 'ApplicationName', ],
				'TemplateName'    => [ 'shape' => 'ConfigurationTemplateName', ],
			],
		],
		'SourceLocation'                                 => [
			'type'    => 'string',
			'max'     => 255,
			'min'     => 3,
			'pattern' => '.+/.+',
		],
		'SourceRepository'                               => [ 'type' => 'string', 'enum' => [ 'CodeCommit', 'S3', ], ],
		'SourceType'                                     => [ 'type' => 'string', 'enum' => [ 'Git', 'Zip', ], ],
		'StatusCodes'                                    => [
			'type'    => 'structure',
			'members' => [
				'Status2xx' => [ 'shape' => 'NullableInteger', ],
				'Status3xx' => [ 'shape' => 'NullableInteger', ],
				'Status4xx' => [ 'shape' => 'NullableInteger', ],
				'Status5xx' => [ 'shape' => 'NullableInteger', ],
			],
		],
		'String'                                         => [ 'type' => 'string', ],
		'SupportedAddon'                                 => [ 'type' => 'string', ],
		'SupportedAddonList'                             => [
			'type'   => 'list',
			'member' => [ 'shape' => 'SupportedAddon', ],
		],
		'SupportedTier'                                  => [ 'type' => 'string', ],
		'SupportedTierList'                              => [
			'type'   => 'list',
			'member' => [ 'shape' => 'SupportedTier', ],
		],
		'SwapEnvironmentCNAMEsMessage'                   => [
			'type'    => 'structure',
			'members' => [
				'SourceEnvironmentId'        => [ 'shape' => 'EnvironmentId', ],
				'SourceEnvironmentName'      => [ 'shape' => 'EnvironmentName', ],
				'DestinationEnvironmentId'   => [ 'shape' => 'EnvironmentId', ],
				'DestinationEnvironmentName' => [ 'shape' => 'EnvironmentName', ],
			],
		],
		'SystemStatus'                                   => [
			'type'    => 'structure',
			'members' => [
				'CPUUtilization' => [ 'shape' => 'CPUUtilization', ],
				'LoadAverage'    => [ 'shape' => 'LoadAverage', ],
			],
		],
		'Tag'                                            => [
			'type'    => 'structure',
			'members' => [
				'Key'   => [ 'shape' => 'TagKey', ],
				'Value' => [ 'shape' => 'TagValue', ],
			],
		],
		'TagKey'                                         => [ 'type' => 'string', 'max' => 128, 'min' => 1, ],
		'TagKeyList'                                     => [ 'type' => 'list', 'member' => [ 'shape' => 'TagKey', ], ],
		'TagList'                                        => [ 'type' => 'list', 'member' => [ 'shape' => 'Tag', ], ],
		'TagValue'                                       => [ 'type' => 'string', 'max' => 256, 'min' => 1, ],
		'Tags'                                           => [ 'type' => 'list', 'member' => [ 'shape' => 'Tag', ], ],
		'TerminateEnvForce'                              => [ 'type' => 'boolean', ],
		'TerminateEnvironmentMessage'                    => [
			'type'    => 'structure',
			'members' => [
				'EnvironmentId'      => [ 'shape' => 'EnvironmentId', ],
				'EnvironmentName'    => [ 'shape' => 'EnvironmentName', ],
				'TerminateResources' => [ 'shape' => 'TerminateEnvironmentResources', ],
				'ForceTerminate'     => [ 'shape' => 'ForceTerminate', ],
			],
		],
		'TerminateEnvironmentResources'                  => [ 'type' => 'boolean', ],
		'TimeFilterEnd'                                  => [ 'type' => 'timestamp', ],
		'TimeFilterStart'                                => [ 'type' => 'timestamp', ],
		'Timestamp'                                      => [ 'type' => 'timestamp', ],
		'Token'                                          => [ 'type' => 'string', ],
		'TooManyApplicationVersionsException'            => [
			'type'      => 'structure',
			'members'   => [],
			'exception' => true,
		],
		'TooManyApplicationsException'                   => [
			'type'      => 'structure',
			'members'   => [],
			'error'     => [
				'code'           => 'TooManyApplicationsException',
				'httpStatusCode' => 400,
				'senderFault'    => true,
			],
			'exception' => true,
		],
		'TooManyBucketsException'                        => [
			'type'      => 'structure',
			'members'   => [],
			'error'     => [
				'code'           => 'TooManyBucketsException',
				'httpStatusCode' => 400,
				'senderFault'    => true,
			],
			'exception' => true,
		],
		'TooManyConfigurationTemplatesException'         => [
			'type'      => 'structure',
			'members'   => [],
			'error'     => [
				'code'           => 'TooManyConfigurationTemplatesException',
				'httpStatusCode' => 400,
				'senderFault'    => true,
			],
			'exception' => true,
		],
		'TooManyEnvironmentsException'                   => [
			'type'      => 'structure',
			'members'   => [],
			'error'     => [
				'code'           => 'TooManyEnvironmentsException',
				'httpStatusCode' => 400,
				'senderFault'    => true,
			],
			'exception' => true,
		],
		'TooManyPlatformsException'                      => [
			'type'      => 'structure',
			'members'   => [],
			'error'     => [
				'code'           => 'TooManyPlatformsException',
				'httpStatusCode' => 400,
				'senderFault'    => true,
			],
			'exception' => true,
		],
		'TooManyTagsException'                           => [
			'type'      => 'structure',
			'members'   => [],
			'error'     => [
				'code'           => 'TooManyTagsException',
				'httpStatusCode' => 400,
				'senderFault'    => true,
			],
			'exception' => true,
		],
		'Trigger'                                        => [
			'type'    => 'structure',
			'members' => [ 'Name' => [ 'shape' => 'ResourceId', ], ],
		],
		'TriggerList'                                    => [
			'type'   => 'list',
			'member' => [ 'shape' => 'Trigger', ],
		],
		'UpdateApplicationMessage'                       => [
			'type'     => 'structure',
			'required' => [ 'ApplicationName', ],
			'members'  => [
				'ApplicationName' => [ 'shape' => 'ApplicationName', ],
				'Description'     => [ 'shape' => 'Description', ],
			],
		],
		'UpdateApplicationResourceLifecycleMessage'      => [
			'type'     => 'structure',
			'required' => [
				'ApplicationName',
				'ResourceLifecycleConfig',
			],
			'members'  => [
				'ApplicationName'         => [ 'shape' => 'ApplicationName', ],
				'ResourceLifecycleConfig' => [ 'shape' => 'ApplicationResourceLifecycleConfig', ],
			],
		],
		'UpdateApplicationVersionMessage'                => [
			'type'     => 'structure',
			'required' => [ 'ApplicationName', 'VersionLabel', ],
			'members'  => [
				'ApplicationName' => [ 'shape' => 'ApplicationName', ],
				'VersionLabel'    => [ 'shape' => 'VersionLabel', ],
				'Description'     => [ 'shape' => 'Description', ],
			],
		],
		'UpdateConfigurationTemplateMessage'             => [
			'type'     => 'structure',
			'required' => [ 'ApplicationName', 'TemplateName', ],
			'members'  => [
				'ApplicationName' => [ 'shape' => 'ApplicationName', ],
				'TemplateName'    => [ 'shape' => 'ConfigurationTemplateName', ],
				'Description'     => [ 'shape' => 'Description', ],
				'OptionSettings'  => [ 'shape' => 'ConfigurationOptionSettingsList', ],
				'OptionsToRemove' => [ 'shape' => 'OptionsSpecifierList', ],
			],
		],
		'UpdateDate'                                     => [ 'type' => 'timestamp', ],
		'UpdateEnvironmentMessage'                       => [
			'type'    => 'structure',
			'members' => [
				'ApplicationName'   => [ 'shape' => 'ApplicationName', ],
				'EnvironmentId'     => [ 'shape' => 'EnvironmentId', ],
				'EnvironmentName'   => [ 'shape' => 'EnvironmentName', ],
				'GroupName'         => [ 'shape' => 'GroupName', ],
				'Description'       => [ 'shape' => 'Description', ],
				'Tier'              => [ 'shape' => 'EnvironmentTier', ],
				'VersionLabel'      => [ 'shape' => 'VersionLabel', ],
				'TemplateName'      => [ 'shape' => 'ConfigurationTemplateName', ],
				'SolutionStackName' => [ 'shape' => 'SolutionStackName', ],
				'PlatformArn'       => [ 'shape' => 'PlatformArn', ],
				'OptionSettings'    => [ 'shape' => 'ConfigurationOptionSettingsList', ],
				'OptionsToRemove'   => [ 'shape' => 'OptionsSpecifierList', ],
			],
		],
		'UpdateTagsForResourceMessage'                   => [
			'type'     => 'structure',
			'required' => [ 'ResourceArn', ],
			'members'  => [
				'ResourceArn'  => [ 'shape' => 'ResourceArn', ],
				'TagsToAdd'    => [ 'shape' => 'TagList', ],
				'TagsToRemove' => [ 'shape' => 'TagKeyList', ],
			],
		],
		'UserDefinedOption'                              => [ 'type' => 'boolean', ],
		'ValidateConfigurationSettingsMessage'           => [
			'type'     => 'structure',
			'required' => [ 'ApplicationName', 'OptionSettings', ],
			'members'  => [
				'ApplicationName' => [ 'shape' => 'ApplicationName', ],
				'TemplateName'    => [ 'shape' => 'ConfigurationTemplateName', ],
				'EnvironmentName' => [ 'shape' => 'EnvironmentName', ],
				'OptionSettings'  => [ 'shape' => 'ConfigurationOptionSettingsList', ],
			],
		],
		'ValidationMessage'                              => [
			'type'    => 'structure',
			'members' => [
				'Message'    => [ 'shape' => 'ValidationMessageString', ],
				'Severity'   => [ 'shape' => 'ValidationSeverity', ],
				'Namespace'  => [ 'shape' => 'OptionNamespace', ],
				'OptionName' => [ 'shape' => 'ConfigurationOptionName', ],
			],
		],
		'ValidationMessageString'                        => [ 'type' => 'string', ],
		'ValidationMessagesList'                         => [
			'type'   => 'list',
			'member' => [ 'shape' => 'ValidationMessage', ],
		],
		'ValidationSeverity'                             => [ 'type' => 'string', 'enum' => [ 'error', 'warning', ], ],
		'VersionLabel'                                   => [ 'type' => 'string', 'max' => 100, 'min' => 1, ],
		'VersionLabels'                                  => [
			'type'   => 'list',
			'member' => [ 'shape' => 'VersionLabel', ],
		],
		'VersionLabelsList'                              => [
			'type'   => 'list',
			'member' => [ 'shape' => 'VersionLabel', ],
		],
		'VirtualizationType'                             => [ 'type' => 'string', ],
	],
];
