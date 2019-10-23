<?php
// This file was auto-generated from sdk-root/src/data/elasticfilesystem/2015-02-01/api-2.json
return [
	'version'    => '2.0',
	'metadata'   => [
		'apiVersion'          => '2015-02-01',
		'endpointPrefix'      => 'elasticfilesystem',
		'protocol'            => 'rest-json',
		'serviceAbbreviation' => 'EFS',
		'serviceFullName'     => 'Amazon Elastic File System',
		'serviceId'           => 'EFS',
		'signatureVersion'    => 'v4',
		'uid'                 => 'elasticfilesystem-2015-02-01',
	],
	'operations' => [
		'CreateFileSystem'                  => [
			'name'   => 'CreateFileSystem',
			'http'   => [
				'method'       => 'POST',
				'requestUri'   => '/2015-02-01/file-systems',
				'responseCode' => 201,
			],
			'input'  => [ 'shape' => 'CreateFileSystemRequest', ],
			'output' => [ 'shape' => 'FileSystemDescription', ],
			'errors' => [
				[ 'shape' => 'BadRequest', ],
				[ 'shape' => 'InternalServerError', ],
				[ 'shape' => 'FileSystemAlreadyExists', ],
				[ 'shape' => 'FileSystemLimitExceeded', ],
				[ 'shape' => 'InsufficientThroughputCapacity', ],
				[ 'shape' => 'ThroughputLimitExceeded', ],
			],
		],
		'CreateMountTarget'                 => [
			'name'   => 'CreateMountTarget',
			'http'   => [
				'method'       => 'POST',
				'requestUri'   => '/2015-02-01/mount-targets',
				'responseCode' => 200,
			],
			'input'  => [ 'shape' => 'CreateMountTargetRequest', ],
			'output' => [ 'shape' => 'MountTargetDescription', ],
			'errors' => [
				[ 'shape' => 'BadRequest', ],
				[ 'shape' => 'InternalServerError', ],
				[ 'shape' => 'FileSystemNotFound', ],
				[ 'shape' => 'IncorrectFileSystemLifeCycleState', ],
				[ 'shape' => 'MountTargetConflict', ],
				[ 'shape' => 'SubnetNotFound', ],
				[ 'shape' => 'NoFreeAddressesInSubnet', ],
				[ 'shape' => 'IpAddressInUse', ],
				[ 'shape' => 'NetworkInterfaceLimitExceeded', ],
				[ 'shape' => 'SecurityGroupLimitExceeded', ],
				[ 'shape' => 'SecurityGroupNotFound', ],
				[ 'shape' => 'UnsupportedAvailabilityZone', ],
			],
		],
		'CreateTags'                        => [
			'name'   => 'CreateTags',
			'http'   => [
				'method'       => 'POST',
				'requestUri'   => '/2015-02-01/create-tags/{FileSystemId}',
				'responseCode' => 204,
			],
			'input'  => [ 'shape' => 'CreateTagsRequest', ],
			'errors' => [
				[ 'shape' => 'BadRequest', ],
				[ 'shape' => 'InternalServerError', ],
				[ 'shape' => 'FileSystemNotFound', ],
			],
		],
		'DeleteFileSystem'                  => [
			'name'   => 'DeleteFileSystem',
			'http'   => [
				'method'       => 'DELETE',
				'requestUri'   => '/2015-02-01/file-systems/{FileSystemId}',
				'responseCode' => 204,
			],
			'input'  => [ 'shape' => 'DeleteFileSystemRequest', ],
			'errors' => [
				[ 'shape' => 'BadRequest', ],
				[ 'shape' => 'InternalServerError', ],
				[ 'shape' => 'FileSystemNotFound', ],
				[ 'shape' => 'FileSystemInUse', ],
			],
		],
		'DeleteMountTarget'                 => [
			'name'   => 'DeleteMountTarget',
			'http'   => [
				'method'       => 'DELETE',
				'requestUri'   => '/2015-02-01/mount-targets/{MountTargetId}',
				'responseCode' => 204,
			],
			'input'  => [ 'shape' => 'DeleteMountTargetRequest', ],
			'errors' => [
				[ 'shape' => 'BadRequest', ],
				[ 'shape' => 'InternalServerError', ],
				[ 'shape' => 'DependencyTimeout', ],
				[ 'shape' => 'MountTargetNotFound', ],
			],
		],
		'DeleteTags'                        => [
			'name'   => 'DeleteTags',
			'http'   => [
				'method'       => 'POST',
				'requestUri'   => '/2015-02-01/delete-tags/{FileSystemId}',
				'responseCode' => 204,
			],
			'input'  => [ 'shape' => 'DeleteTagsRequest', ],
			'errors' => [
				[ 'shape' => 'BadRequest', ],
				[ 'shape' => 'InternalServerError', ],
				[ 'shape' => 'FileSystemNotFound', ],
			],
		],
		'DescribeFileSystems'               => [
			'name'   => 'DescribeFileSystems',
			'http'   => [
				'method'       => 'GET',
				'requestUri'   => '/2015-02-01/file-systems',
				'responseCode' => 200,
			],
			'input'  => [ 'shape' => 'DescribeFileSystemsRequest', ],
			'output' => [ 'shape' => 'DescribeFileSystemsResponse', ],
			'errors' => [
				[ 'shape' => 'BadRequest', ],
				[ 'shape' => 'InternalServerError', ],
				[ 'shape' => 'FileSystemNotFound', ],
			],
		],
		'DescribeLifecycleConfiguration'    => [
			'name'   => 'DescribeLifecycleConfiguration',
			'http'   => [
				'method'       => 'GET',
				'requestUri'   => '/2015-02-01/file-systems/{FileSystemId}/lifecycle-configuration',
				'responseCode' => 200,
			],
			'input'  => [ 'shape' => 'DescribeLifecycleConfigurationRequest', ],
			'output' => [ 'shape' => 'LifecycleConfigurationDescription', ],
			'errors' => [
				[ 'shape' => 'InternalServerError', ],
				[ 'shape' => 'BadRequest', ],
				[ 'shape' => 'FileSystemNotFound', ],
			],
		],
		'DescribeMountTargetSecurityGroups' => [
			'name'   => 'DescribeMountTargetSecurityGroups',
			'http'   => [
				'method'       => 'GET',
				'requestUri'   => '/2015-02-01/mount-targets/{MountTargetId}/security-groups',
				'responseCode' => 200,
			],
			'input'  => [ 'shape' => 'DescribeMountTargetSecurityGroupsRequest', ],
			'output' => [ 'shape' => 'DescribeMountTargetSecurityGroupsResponse', ],
			'errors' => [
				[ 'shape' => 'BadRequest', ],
				[ 'shape' => 'InternalServerError', ],
				[ 'shape' => 'MountTargetNotFound', ],
				[ 'shape' => 'IncorrectMountTargetState', ],
			],
		],
		'DescribeMountTargets'              => [
			'name'   => 'DescribeMountTargets',
			'http'   => [
				'method'       => 'GET',
				'requestUri'   => '/2015-02-01/mount-targets',
				'responseCode' => 200,
			],
			'input'  => [ 'shape' => 'DescribeMountTargetsRequest', ],
			'output' => [ 'shape' => 'DescribeMountTargetsResponse', ],
			'errors' => [
				[ 'shape' => 'BadRequest', ],
				[ 'shape' => 'InternalServerError', ],
				[ 'shape' => 'FileSystemNotFound', ],
				[ 'shape' => 'MountTargetNotFound', ],
			],
		],
		'DescribeTags'                      => [
			'name'   => 'DescribeTags',
			'http'   => [
				'method'       => 'GET',
				'requestUri'   => '/2015-02-01/tags/{FileSystemId}/',
				'responseCode' => 200,
			],
			'input'  => [ 'shape' => 'DescribeTagsRequest', ],
			'output' => [ 'shape' => 'DescribeTagsResponse', ],
			'errors' => [
				[ 'shape' => 'BadRequest', ],
				[ 'shape' => 'InternalServerError', ],
				[ 'shape' => 'FileSystemNotFound', ],
			],
		],
		'ModifyMountTargetSecurityGroups'   => [
			'name'   => 'ModifyMountTargetSecurityGroups',
			'http'   => [
				'method'       => 'PUT',
				'requestUri'   => '/2015-02-01/mount-targets/{MountTargetId}/security-groups',
				'responseCode' => 204,
			],
			'input'  => [ 'shape' => 'ModifyMountTargetSecurityGroupsRequest', ],
			'errors' => [
				[ 'shape' => 'BadRequest', ],
				[ 'shape' => 'InternalServerError', ],
				[ 'shape' => 'MountTargetNotFound', ],
				[ 'shape' => 'IncorrectMountTargetState', ],
				[ 'shape' => 'SecurityGroupLimitExceeded', ],
				[ 'shape' => 'SecurityGroupNotFound', ],
			],
		],
		'PutLifecycleConfiguration'         => [
			'name'   => 'PutLifecycleConfiguration',
			'http'   => [
				'method'       => 'PUT',
				'requestUri'   => '/2015-02-01/file-systems/{FileSystemId}/lifecycle-configuration',
				'responseCode' => 200,
			],
			'input'  => [ 'shape' => 'PutLifecycleConfigurationRequest', ],
			'output' => [ 'shape' => 'LifecycleConfigurationDescription', ],
			'errors' => [
				[ 'shape' => 'BadRequest', ],
				[ 'shape' => 'InternalServerError', ],
				[ 'shape' => 'FileSystemNotFound', ],
				[ 'shape' => 'IncorrectFileSystemLifeCycleState', ],
			],
		],
		'UpdateFileSystem'                  => [
			'name'   => 'UpdateFileSystem',
			'http'   => [
				'method'       => 'PUT',
				'requestUri'   => '/2015-02-01/file-systems/{FileSystemId}',
				'responseCode' => 202,
			],
			'input'  => [ 'shape' => 'UpdateFileSystemRequest', ],
			'output' => [ 'shape' => 'FileSystemDescription', ],
			'errors' => [
				[ 'shape' => 'BadRequest', ],
				[ 'shape' => 'FileSystemNotFound', ],
				[ 'shape' => 'IncorrectFileSystemLifeCycleState', ],
				[ 'shape' => 'InsufficientThroughputCapacity', ],
				[ 'shape' => 'InternalServerError', ],
				[ 'shape' => 'ThroughputLimitExceeded', ],
				[ 'shape' => 'TooManyRequests', ],
			],
		],
	],
	'shapes'     => [
		'AwsAccountId'                              => [ 'type' => 'string', ],
		'BadRequest'                                => [
			'type'      => 'structure',
			'required'  => [ 'ErrorCode', ],
			'members'   => [
				'ErrorCode' => [ 'shape' => 'ErrorCode', ],
				'Message'   => [ 'shape' => 'ErrorMessage', ],
			],
			'error'     => [ 'httpStatusCode' => 400, ],
			'exception' => true,
		],
		'CreateFileSystemRequest'                   => [
			'type'     => 'structure',
			'required' => [ 'CreationToken', ],
			'members'  => [
				'CreationToken'                => [ 'shape' => 'CreationToken', ],
				'PerformanceMode'              => [ 'shape' => 'PerformanceMode', ],
				'Encrypted'                    => [ 'shape' => 'Encrypted', ],
				'KmsKeyId'                     => [ 'shape' => 'KmsKeyId', ],
				'ThroughputMode'               => [ 'shape' => 'ThroughputMode', ],
				'ProvisionedThroughputInMibps' => [ 'shape' => 'ProvisionedThroughputInMibps', ],
				'Tags'                         => [ 'shape' => 'Tags', ],
			],
		],
		'CreateMountTargetRequest'                  => [
			'type'     => 'structure',
			'required' => [ 'FileSystemId', 'SubnetId', ],
			'members'  => [
				'FileSystemId'   => [ 'shape' => 'FileSystemId', ],
				'SubnetId'       => [ 'shape' => 'SubnetId', ],
				'IpAddress'      => [ 'shape' => 'IpAddress', ],
				'SecurityGroups' => [ 'shape' => 'SecurityGroups', ],
			],
		],
		'CreateTagsRequest'                         => [
			'type'     => 'structure',
			'required' => [ 'FileSystemId', 'Tags', ],
			'members'  => [
				'FileSystemId' => [
					'shape'        => 'FileSystemId',
					'location'     => 'uri',
					'locationName' => 'FileSystemId',
				],
				'Tags'         => [ 'shape' => 'Tags', ],
			],
		],
		'CreationToken'                             => [ 'type' => 'string', 'max' => 64, 'min' => 1, ],
		'DeleteFileSystemRequest'                   => [
			'type'     => 'structure',
			'required' => [ 'FileSystemId', ],
			'members'  => [
				'FileSystemId' => [
					'shape'        => 'FileSystemId',
					'location'     => 'uri',
					'locationName' => 'FileSystemId',
				],
			],
		],
		'DeleteMountTargetRequest'                  => [
			'type'     => 'structure',
			'required' => [ 'MountTargetId', ],
			'members'  => [
				'MountTargetId' => [
					'shape'        => 'MountTargetId',
					'location'     => 'uri',
					'locationName' => 'MountTargetId',
				],
			],
		],
		'DeleteTagsRequest'                         => [
			'type'     => 'structure',
			'required' => [ 'FileSystemId', 'TagKeys', ],
			'members'  => [
				'FileSystemId' => [
					'shape'        => 'FileSystemId',
					'location'     => 'uri',
					'locationName' => 'FileSystemId',
				],
				'TagKeys'      => [ 'shape' => 'TagKeys', ],
			],
		],
		'DependencyTimeout'                         => [
			'type'      => 'structure',
			'required'  => [ 'ErrorCode', ],
			'members'   => [
				'ErrorCode' => [ 'shape' => 'ErrorCode', ],
				'Message'   => [ 'shape' => 'ErrorMessage', ],
			],
			'error'     => [ 'httpStatusCode' => 504, ],
			'exception' => true,
		],
		'DescribeFileSystemsRequest'                => [
			'type'    => 'structure',
			'members' => [
				'MaxItems'      => [
					'shape'        => 'MaxItems',
					'location'     => 'querystring',
					'locationName' => 'MaxItems',
				],
				'Marker'        => [
					'shape'        => 'Marker',
					'location'     => 'querystring',
					'locationName' => 'Marker',
				],
				'CreationToken' => [
					'shape'        => 'CreationToken',
					'location'     => 'querystring',
					'locationName' => 'CreationToken',
				],
				'FileSystemId'  => [
					'shape'        => 'FileSystemId',
					'location'     => 'querystring',
					'locationName' => 'FileSystemId',
				],
			],
		],
		'DescribeFileSystemsResponse'               => [
			'type'    => 'structure',
			'members' => [
				'Marker'      => [ 'shape' => 'Marker', ],
				'FileSystems' => [ 'shape' => 'FileSystemDescriptions', ],
				'NextMarker'  => [ 'shape' => 'Marker', ],
			],
		],
		'DescribeLifecycleConfigurationRequest'     => [
			'type'     => 'structure',
			'required' => [ 'FileSystemId', ],
			'members'  => [
				'FileSystemId' => [
					'shape'        => 'FileSystemId',
					'location'     => 'uri',
					'locationName' => 'FileSystemId',
				],
			],
		],
		'DescribeMountTargetSecurityGroupsRequest'  => [
			'type'     => 'structure',
			'required' => [ 'MountTargetId', ],
			'members'  => [
				'MountTargetId' => [
					'shape'        => 'MountTargetId',
					'location'     => 'uri',
					'locationName' => 'MountTargetId',
				],
			],
		],
		'DescribeMountTargetSecurityGroupsResponse' => [
			'type'     => 'structure',
			'required' => [ 'SecurityGroups', ],
			'members'  => [ 'SecurityGroups' => [ 'shape' => 'SecurityGroups', ], ],
		],
		'DescribeMountTargetsRequest'               => [
			'type'    => 'structure',
			'members' => [
				'MaxItems'      => [
					'shape'        => 'MaxItems',
					'location'     => 'querystring',
					'locationName' => 'MaxItems',
				],
				'Marker'        => [
					'shape'        => 'Marker',
					'location'     => 'querystring',
					'locationName' => 'Marker',
				],
				'FileSystemId'  => [
					'shape'        => 'FileSystemId',
					'location'     => 'querystring',
					'locationName' => 'FileSystemId',
				],
				'MountTargetId' => [
					'shape'        => 'MountTargetId',
					'location'     => 'querystring',
					'locationName' => 'MountTargetId',
				],
			],
		],
		'DescribeMountTargetsResponse'              => [
			'type'    => 'structure',
			'members' => [
				'Marker'       => [ 'shape' => 'Marker', ],
				'MountTargets' => [ 'shape' => 'MountTargetDescriptions', ],
				'NextMarker'   => [ 'shape' => 'Marker', ],
			],
		],
		'DescribeTagsRequest'                       => [
			'type'     => 'structure',
			'required' => [ 'FileSystemId', ],
			'members'  => [
				'MaxItems'     => [
					'shape'        => 'MaxItems',
					'location'     => 'querystring',
					'locationName' => 'MaxItems',
				],
				'Marker'       => [
					'shape'        => 'Marker',
					'location'     => 'querystring',
					'locationName' => 'Marker',
				],
				'FileSystemId' => [
					'shape'        => 'FileSystemId',
					'location'     => 'uri',
					'locationName' => 'FileSystemId',
				],
			],
		],
		'DescribeTagsResponse'                      => [
			'type'     => 'structure',
			'required' => [ 'Tags', ],
			'members'  => [
				'Marker'     => [ 'shape' => 'Marker', ],
				'Tags'       => [ 'shape' => 'Tags', ],
				'NextMarker' => [ 'shape' => 'Marker', ],
			],
		],
		'Encrypted'                                 => [ 'type' => 'boolean', ],
		'ErrorCode'                                 => [ 'type' => 'string', 'min' => 1, ],
		'ErrorMessage'                              => [ 'type' => 'string', ],
		'FileSystemAlreadyExists'                   => [
			'type'      => 'structure',
			'required'  => [ 'ErrorCode', 'FileSystemId', ],
			'members'   => [
				'ErrorCode'    => [ 'shape' => 'ErrorCode', ],
				'Message'      => [ 'shape' => 'ErrorMessage', ],
				'FileSystemId' => [ 'shape' => 'FileSystemId', ],
			],
			'error'     => [ 'httpStatusCode' => 409, ],
			'exception' => true,
		],
		'FileSystemDescription'                     => [
			'type'     => 'structure',
			'required' => [
				'OwnerId',
				'CreationToken',
				'FileSystemId',
				'CreationTime',
				'LifeCycleState',
				'NumberOfMountTargets',
				'SizeInBytes',
				'PerformanceMode',
				'Tags',
			],
			'members'  => [
				'OwnerId'                      => [ 'shape' => 'AwsAccountId', ],
				'CreationToken'                => [ 'shape' => 'CreationToken', ],
				'FileSystemId'                 => [ 'shape' => 'FileSystemId', ],
				'CreationTime'                 => [ 'shape' => 'Timestamp', ],
				'LifeCycleState'               => [ 'shape' => 'LifeCycleState', ],
				'Name'                         => [ 'shape' => 'TagValue', ],
				'NumberOfMountTargets'         => [ 'shape' => 'MountTargetCount', ],
				'SizeInBytes'                  => [ 'shape' => 'FileSystemSize', ],
				'PerformanceMode'              => [ 'shape' => 'PerformanceMode', ],
				'Encrypted'                    => [ 'shape' => 'Encrypted', ],
				'KmsKeyId'                     => [ 'shape' => 'KmsKeyId', ],
				'ThroughputMode'               => [ 'shape' => 'ThroughputMode', ],
				'ProvisionedThroughputInMibps' => [ 'shape' => 'ProvisionedThroughputInMibps', ],
				'Tags'                         => [ 'shape' => 'Tags', ],
			],
		],
		'FileSystemDescriptions'                    => [
			'type'   => 'list',
			'member' => [ 'shape' => 'FileSystemDescription', ],
		],
		'FileSystemId'                              => [ 'type' => 'string', ],
		'FileSystemInUse'                           => [
			'type'      => 'structure',
			'required'  => [ 'ErrorCode', ],
			'members'   => [
				'ErrorCode' => [ 'shape' => 'ErrorCode', ],
				'Message'   => [ 'shape' => 'ErrorMessage', ],
			],
			'error'     => [ 'httpStatusCode' => 409, ],
			'exception' => true,
		],
		'FileSystemLimitExceeded'                   => [
			'type'      => 'structure',
			'required'  => [ 'ErrorCode', ],
			'members'   => [
				'ErrorCode' => [ 'shape' => 'ErrorCode', ],
				'Message'   => [ 'shape' => 'ErrorMessage', ],
			],
			'error'     => [ 'httpStatusCode' => 403, ],
			'exception' => true,
		],
		'FileSystemNotFound'                        => [
			'type'      => 'structure',
			'required'  => [ 'ErrorCode', ],
			'members'   => [
				'ErrorCode' => [ 'shape' => 'ErrorCode', ],
				'Message'   => [ 'shape' => 'ErrorMessage', ],
			],
			'error'     => [ 'httpStatusCode' => 404, ],
			'exception' => true,
		],
		'FileSystemNullableSizeValue'               => [ 'type' => 'long', 'min' => 0, ],
		'FileSystemSize'                            => [
			'type'     => 'structure',
			'required' => [ 'Value', ],
			'members'  => [
				'Value'           => [ 'shape' => 'FileSystemSizeValue', ],
				'Timestamp'       => [ 'shape' => 'Timestamp', ],
				'ValueInIA'       => [ 'shape' => 'FileSystemNullableSizeValue', ],
				'ValueInStandard' => [ 'shape' => 'FileSystemNullableSizeValue', ],
			],
		],
		'FileSystemSizeValue'                       => [ 'type' => 'long', 'min' => 0, ],
		'IncorrectFileSystemLifeCycleState'         => [
			'type'      => 'structure',
			'required'  => [ 'ErrorCode', ],
			'members'   => [
				'ErrorCode' => [ 'shape' => 'ErrorCode', ],
				'Message'   => [ 'shape' => 'ErrorMessage', ],
			],
			'error'     => [ 'httpStatusCode' => 409, ],
			'exception' => true,
		],
		'IncorrectMountTargetState'                 => [
			'type'      => 'structure',
			'required'  => [ 'ErrorCode', ],
			'members'   => [
				'ErrorCode' => [ 'shape' => 'ErrorCode', ],
				'Message'   => [ 'shape' => 'ErrorMessage', ],
			],
			'error'     => [ 'httpStatusCode' => 409, ],
			'exception' => true,
		],
		'InsufficientThroughputCapacity'            => [
			'type'      => 'structure',
			'required'  => [ 'ErrorCode', ],
			'members'   => [
				'ErrorCode' => [ 'shape' => 'ErrorCode', ],
				'Message'   => [ 'shape' => 'ErrorMessage', ],
			],
			'error'     => [ 'httpStatusCode' => 503, ],
			'exception' => true,
		],
		'InternalServerError'                       => [
			'type'      => 'structure',
			'required'  => [ 'ErrorCode', ],
			'members'   => [
				'ErrorCode' => [ 'shape' => 'ErrorCode', ],
				'Message'   => [ 'shape' => 'ErrorMessage', ],
			],
			'error'     => [ 'httpStatusCode' => 500, ],
			'exception' => true,
		],
		'IpAddress'                                 => [ 'type' => 'string', ],
		'IpAddressInUse'                            => [
			'type'      => 'structure',
			'required'  => [ 'ErrorCode', ],
			'members'   => [
				'ErrorCode' => [ 'shape' => 'ErrorCode', ],
				'Message'   => [ 'shape' => 'ErrorMessage', ],
			],
			'error'     => [ 'httpStatusCode' => 409, ],
			'exception' => true,
		],
		'KmsKeyId'                                  => [ 'type' => 'string', 'max' => 2048, 'min' => 1, ],
		'LifeCycleState'                            => [
			'type' => 'string',
			'enum' => [
				'creating',
				'available',
				'updating',
				'deleting',
				'deleted',
			],
		],
		'LifecycleConfigurationDescription'         => [
			'type'    => 'structure',
			'members' => [ 'LifecyclePolicies' => [ 'shape' => 'LifecyclePolicies', ], ],
		],
		'LifecyclePolicies'                         => [
			'type'   => 'list',
			'member' => [ 'shape' => 'LifecyclePolicy', ],
		],
		'LifecyclePolicy'                           => [
			'type'    => 'structure',
			'members' => [ 'TransitionToIA' => [ 'shape' => 'TransitionToIARules', ], ],
		],
		'Marker'                                    => [ 'type' => 'string', ],
		'MaxItems'                                  => [ 'type' => 'integer', 'min' => 1, ],
		'ModifyMountTargetSecurityGroupsRequest'    => [
			'type'     => 'structure',
			'required' => [ 'MountTargetId', ],
			'members'  => [
				'MountTargetId'  => [
					'shape'        => 'MountTargetId',
					'location'     => 'uri',
					'locationName' => 'MountTargetId',
				],
				'SecurityGroups' => [ 'shape' => 'SecurityGroups', ],
			],
		],
		'MountTargetConflict'                       => [
			'type'      => 'structure',
			'required'  => [ 'ErrorCode', ],
			'members'   => [
				'ErrorCode' => [ 'shape' => 'ErrorCode', ],
				'Message'   => [ 'shape' => 'ErrorMessage', ],
			],
			'error'     => [ 'httpStatusCode' => 409, ],
			'exception' => true,
		],
		'MountTargetCount'                          => [ 'type' => 'integer', 'min' => 0, ],
		'MountTargetDescription'                    => [
			'type'     => 'structure',
			'required' => [
				'MountTargetId',
				'FileSystemId',
				'SubnetId',
				'LifeCycleState',
			],
			'members'  => [
				'OwnerId'            => [ 'shape' => 'AwsAccountId', ],
				'MountTargetId'      => [ 'shape' => 'MountTargetId', ],
				'FileSystemId'       => [ 'shape' => 'FileSystemId', ],
				'SubnetId'           => [ 'shape' => 'SubnetId', ],
				'LifeCycleState'     => [ 'shape' => 'LifeCycleState', ],
				'IpAddress'          => [ 'shape' => 'IpAddress', ],
				'NetworkInterfaceId' => [ 'shape' => 'NetworkInterfaceId', ],
			],
		],
		'MountTargetDescriptions'                   => [
			'type'   => 'list',
			'member' => [ 'shape' => 'MountTargetDescription', ],
		],
		'MountTargetId'                             => [ 'type' => 'string', ],
		'MountTargetNotFound'                       => [
			'type'      => 'structure',
			'required'  => [ 'ErrorCode', ],
			'members'   => [
				'ErrorCode' => [ 'shape' => 'ErrorCode', ],
				'Message'   => [ 'shape' => 'ErrorMessage', ],
			],
			'error'     => [ 'httpStatusCode' => 404, ],
			'exception' => true,
		],
		'NetworkInterfaceId'                        => [ 'type' => 'string', ],
		'NetworkInterfaceLimitExceeded'             => [
			'type'      => 'structure',
			'required'  => [ 'ErrorCode', ],
			'members'   => [
				'ErrorCode' => [ 'shape' => 'ErrorCode', ],
				'Message'   => [ 'shape' => 'ErrorMessage', ],
			],
			'error'     => [ 'httpStatusCode' => 409, ],
			'exception' => true,
		],
		'NoFreeAddressesInSubnet'                   => [
			'type'      => 'structure',
			'required'  => [ 'ErrorCode', ],
			'members'   => [
				'ErrorCode' => [ 'shape' => 'ErrorCode', ],
				'Message'   => [ 'shape' => 'ErrorMessage', ],
			],
			'error'     => [ 'httpStatusCode' => 409, ],
			'exception' => true,
		],
		'PerformanceMode'                           => [
			'type' => 'string',
			'enum' => [ 'generalPurpose', 'maxIO', ],
		],
		'ProvisionedThroughputInMibps'              => [ 'type' => 'double', 'min' => 1, ],
		'PutLifecycleConfigurationRequest'          => [
			'type'     => 'structure',
			'required' => [ 'FileSystemId', 'LifecyclePolicies', ],
			'members'  => [
				'FileSystemId'      => [
					'shape'        => 'FileSystemId',
					'location'     => 'uri',
					'locationName' => 'FileSystemId',
				],
				'LifecyclePolicies' => [ 'shape' => 'LifecyclePolicies', ],
			],
		],
		'SecurityGroup'                             => [ 'type' => 'string', ],
		'SecurityGroupLimitExceeded'                => [
			'type'      => 'structure',
			'required'  => [ 'ErrorCode', ],
			'members'   => [
				'ErrorCode' => [ 'shape' => 'ErrorCode', ],
				'Message'   => [ 'shape' => 'ErrorMessage', ],
			],
			'error'     => [ 'httpStatusCode' => 400, ],
			'exception' => true,
		],
		'SecurityGroupNotFound'                     => [
			'type'      => 'structure',
			'required'  => [ 'ErrorCode', ],
			'members'   => [
				'ErrorCode' => [ 'shape' => 'ErrorCode', ],
				'Message'   => [ 'shape' => 'ErrorMessage', ],
			],
			'error'     => [ 'httpStatusCode' => 400, ],
			'exception' => true,
		],
		'SecurityGroups'                            => [
			'type'   => 'list',
			'member' => [ 'shape' => 'SecurityGroup', ],
			'max'    => 5,
		],
		'SubnetId'                                  => [ 'type' => 'string', ],
		'SubnetNotFound'                            => [
			'type'      => 'structure',
			'required'  => [ 'ErrorCode', ],
			'members'   => [
				'ErrorCode' => [ 'shape' => 'ErrorCode', ],
				'Message'   => [ 'shape' => 'ErrorMessage', ],
			],
			'error'     => [ 'httpStatusCode' => 400, ],
			'exception' => true,
		],
		'Tag'                                       => [
			'type'     => 'structure',
			'required' => [ 'Key', 'Value', ],
			'members'  => [
				'Key'   => [ 'shape' => 'TagKey', ],
				'Value' => [ 'shape' => 'TagValue', ],
			],
		],
		'TagKey'                                    => [ 'type' => 'string', 'max' => 128, 'min' => 1, ],
		'TagKeys'                                   => [ 'type' => 'list', 'member' => [ 'shape' => 'TagKey', ], ],
		'TagValue'                                  => [ 'type' => 'string', 'max' => 256, ],
		'Tags'                                      => [ 'type' => 'list', 'member' => [ 'shape' => 'Tag', ], ],
		'ThroughputLimitExceeded'                   => [
			'type'      => 'structure',
			'required'  => [ 'ErrorCode', ],
			'members'   => [
				'ErrorCode' => [ 'shape' => 'ErrorCode', ],
				'Message'   => [ 'shape' => 'ErrorMessage', ],
			],
			'error'     => [ 'httpStatusCode' => 400, ],
			'exception' => true,
		],
		'ThroughputMode'                            => [
			'type' => 'string',
			'enum' => [ 'bursting', 'provisioned', ],
		],
		'Timestamp'                                 => [ 'type' => 'timestamp', ],
		'TooManyRequests'                           => [
			'type'      => 'structure',
			'required'  => [ 'ErrorCode', ],
			'members'   => [
				'ErrorCode' => [ 'shape' => 'ErrorCode', ],
				'Message'   => [ 'shape' => 'ErrorMessage', ],
			],
			'error'     => [ 'httpStatusCode' => 429, ],
			'exception' => true,
		],
		'TransitionToIARules'                       => [
			'type' => 'string',
			'enum' => [
				'AFTER_14_DAYS',
				'AFTER_30_DAYS',
				'AFTER_60_DAYS',
				'AFTER_90_DAYS',
			],
		],
		'UnsupportedAvailabilityZone'               => [
			'type'      => 'structure',
			'required'  => [ 'ErrorCode', ],
			'members'   => [
				'ErrorCode' => [ 'shape' => 'ErrorCode', ],
				'Message'   => [ 'shape' => 'ErrorMessage', ],
			],
			'error'     => [ 'httpStatusCode' => 400, ],
			'exception' => true,
		],
		'UpdateFileSystemRequest'                   => [
			'type'     => 'structure',
			'required' => [ 'FileSystemId', ],
			'members'  => [
				'FileSystemId'                 => [
					'shape'        => 'FileSystemId',
					'location'     => 'uri',
					'locationName' => 'FileSystemId',
				],
				'ThroughputMode'               => [ 'shape' => 'ThroughputMode', ],
				'ProvisionedThroughputInMibps' => [ 'shape' => 'ProvisionedThroughputInMibps', ],
			],
		],
	],
];