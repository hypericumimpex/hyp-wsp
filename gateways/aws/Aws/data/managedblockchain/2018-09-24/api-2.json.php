<?php
// This file was auto-generated from sdk-root/src/data/managedblockchain/2018-09-24/api-2.json
return [
	'version'    => '2.0',
	'metadata'   => [
		'apiVersion'          => '2018-09-24',
		'endpointPrefix'      => 'managedblockchain',
		'jsonVersion'         => '1.1',
		'protocol'            => 'rest-json',
		'serviceAbbreviation' => 'ManagedBlockchain',
		'serviceFullName'     => 'Amazon Managed Blockchain',
		'serviceId'           => 'ManagedBlockchain',
		'signatureVersion'    => 'v4',
		'signingName'         => 'managedblockchain',
		'uid'                 => 'managedblockchain-2018-09-24',
	],
	'operations' => [
		'CreateMember'      => [
			'name'   => 'CreateMember',
			'http'   => [ 'method' => 'POST', 'requestUri' => '/networks/{networkId}/members', ],
			'input'  => [ 'shape' => 'CreateMemberInput', ],
			'output' => [ 'shape' => 'CreateMemberOutput', ],
			'errors' => [
				[ 'shape' => 'InvalidRequestException', ],
				[ 'shape' => 'AccessDeniedException', ],
				[ 'shape' => 'ResourceNotFoundException', ],
				[ 'shape' => 'ResourceAlreadyExistsException', ],
				[ 'shape' => 'ResourceNotReadyException', ],
				[ 'shape' => 'ThrottlingException', ],
				[ 'shape' => 'ResourceLimitExceededException', ],
				[ 'shape' => 'InternalServiceErrorException', ],
			],
		],
		'CreateNetwork'     => [
			'name'   => 'CreateNetwork',
			'http'   => [ 'method' => 'POST', 'requestUri' => '/networks', ],
			'input'  => [ 'shape' => 'CreateNetworkInput', ],
			'output' => [ 'shape' => 'CreateNetworkOutput', ],
			'errors' => [
				[ 'shape' => 'InvalidRequestException', ],
				[ 'shape' => 'AccessDeniedException', ],
				[ 'shape' => 'ResourceAlreadyExistsException', ],
				[ 'shape' => 'ThrottlingException', ],
				[ 'shape' => 'ResourceLimitExceededException', ],
				[ 'shape' => 'InternalServiceErrorException', ],
			],
		],
		'CreateNode'        => [
			'name'   => 'CreateNode',
			'http'   => [
				'method'     => 'POST',
				'requestUri' => '/networks/{networkId}/members/{memberId}/nodes',
			],
			'input'  => [ 'shape' => 'CreateNodeInput', ],
			'output' => [ 'shape' => 'CreateNodeOutput', ],
			'errors' => [
				[ 'shape' => 'InvalidRequestException', ],
				[ 'shape' => 'AccessDeniedException', ],
				[ 'shape' => 'ResourceNotFoundException', ],
				[ 'shape' => 'ResourceAlreadyExistsException', ],
				[ 'shape' => 'ResourceNotReadyException', ],
				[ 'shape' => 'ThrottlingException', ],
				[ 'shape' => 'ResourceLimitExceededException', ],
				[ 'shape' => 'InternalServiceErrorException', ],
			],
		],
		'CreateProposal'    => [
			'name'   => 'CreateProposal',
			'http'   => [ 'method' => 'POST', 'requestUri' => '/networks/{networkId}/proposals', ],
			'input'  => [ 'shape' => 'CreateProposalInput', ],
			'output' => [ 'shape' => 'CreateProposalOutput', ],
			'errors' => [
				[ 'shape' => 'InvalidRequestException', ],
				[ 'shape' => 'AccessDeniedException', ],
				[ 'shape' => 'ResourceNotFoundException', ],
				[ 'shape' => 'ResourceNotReadyException', ],
				[ 'shape' => 'ThrottlingException', ],
				[ 'shape' => 'InternalServiceErrorException', ],
			],
		],
		'DeleteMember'      => [
			'name'   => 'DeleteMember',
			'http'   => [
				'method'     => 'DELETE',
				'requestUri' => '/networks/{networkId}/members/{memberId}',
			],
			'input'  => [ 'shape' => 'DeleteMemberInput', ],
			'output' => [ 'shape' => 'DeleteMemberOutput', ],
			'errors' => [
				[ 'shape' => 'InvalidRequestException', ],
				[ 'shape' => 'AccessDeniedException', ],
				[ 'shape' => 'ResourceNotFoundException', ],
				[ 'shape' => 'ResourceNotReadyException', ],
				[ 'shape' => 'ThrottlingException', ],
				[ 'shape' => 'InternalServiceErrorException', ],
			],
		],
		'DeleteNode'        => [
			'name'   => 'DeleteNode',
			'http'   => [
				'method'     => 'DELETE',
				'requestUri' => '/networks/{networkId}/members/{memberId}/nodes/{nodeId}',
			],
			'input'  => [ 'shape' => 'DeleteNodeInput', ],
			'output' => [ 'shape' => 'DeleteNodeOutput', ],
			'errors' => [
				[ 'shape' => 'InvalidRequestException', ],
				[ 'shape' => 'AccessDeniedException', ],
				[ 'shape' => 'ResourceNotFoundException', ],
				[ 'shape' => 'ResourceNotReadyException', ],
				[ 'shape' => 'ThrottlingException', ],
				[ 'shape' => 'InternalServiceErrorException', ],
			],
		],
		'GetMember'         => [
			'name'   => 'GetMember',
			'http'   => [
				'method'     => 'GET',
				'requestUri' => '/networks/{networkId}/members/{memberId}',
			],
			'input'  => [ 'shape' => 'GetMemberInput', ],
			'output' => [ 'shape' => 'GetMemberOutput', ],
			'errors' => [
				[ 'shape' => 'InvalidRequestException', ],
				[ 'shape' => 'AccessDeniedException', ],
				[ 'shape' => 'ResourceNotFoundException', ],
				[ 'shape' => 'ThrottlingException', ],
				[ 'shape' => 'InternalServiceErrorException', ],
			],
		],
		'GetNetwork'        => [
			'name'   => 'GetNetwork',
			'http'   => [ 'method' => 'GET', 'requestUri' => '/networks/{networkId}', ],
			'input'  => [ 'shape' => 'GetNetworkInput', ],
			'output' => [ 'shape' => 'GetNetworkOutput', ],
			'errors' => [
				[ 'shape' => 'InvalidRequestException', ],
				[ 'shape' => 'AccessDeniedException', ],
				[ 'shape' => 'ResourceNotFoundException', ],
				[ 'shape' => 'ThrottlingException', ],
				[ 'shape' => 'InternalServiceErrorException', ],
			],
		],
		'GetNode'           => [
			'name'   => 'GetNode',
			'http'   => [
				'method'     => 'GET',
				'requestUri' => '/networks/{networkId}/members/{memberId}/nodes/{nodeId}',
			],
			'input'  => [ 'shape' => 'GetNodeInput', ],
			'output' => [ 'shape' => 'GetNodeOutput', ],
			'errors' => [
				[ 'shape' => 'InvalidRequestException', ],
				[ 'shape' => 'AccessDeniedException', ],
				[ 'shape' => 'ResourceNotFoundException', ],
				[ 'shape' => 'ThrottlingException', ],
				[ 'shape' => 'InternalServiceErrorException', ],
			],
		],
		'GetProposal'       => [
			'name'   => 'GetProposal',
			'http'   => [
				'method'     => 'GET',
				'requestUri' => '/networks/{networkId}/proposals/{proposalId}',
			],
			'input'  => [ 'shape' => 'GetProposalInput', ],
			'output' => [ 'shape' => 'GetProposalOutput', ],
			'errors' => [
				[ 'shape' => 'InvalidRequestException', ],
				[ 'shape' => 'AccessDeniedException', ],
				[ 'shape' => 'ResourceNotFoundException', ],
				[ 'shape' => 'ThrottlingException', ],
				[ 'shape' => 'InternalServiceErrorException', ],
			],
		],
		'ListInvitations'   => [
			'name'   => 'ListInvitations',
			'http'   => [ 'method' => 'GET', 'requestUri' => '/invitations', ],
			'input'  => [ 'shape' => 'ListInvitationsInput', ],
			'output' => [ 'shape' => 'ListInvitationsOutput', ],
			'errors' => [
				[ 'shape' => 'InvalidRequestException', ],
				[ 'shape' => 'AccessDeniedException', ],
				[ 'shape' => 'ResourceNotFoundException', ],
				[ 'shape' => 'ThrottlingException', ],
				[ 'shape' => 'ResourceLimitExceededException', ],
				[ 'shape' => 'InternalServiceErrorException', ],
			],
		],
		'ListMembers'       => [
			'name'   => 'ListMembers',
			'http'   => [ 'method' => 'GET', 'requestUri' => '/networks/{networkId}/members', ],
			'input'  => [ 'shape' => 'ListMembersInput', ],
			'output' => [ 'shape' => 'ListMembersOutput', ],
			'errors' => [
				[ 'shape' => 'InvalidRequestException', ],
				[ 'shape' => 'AccessDeniedException', ],
				[ 'shape' => 'ThrottlingException', ],
				[ 'shape' => 'InternalServiceErrorException', ],
			],
		],
		'ListNetworks'      => [
			'name'   => 'ListNetworks',
			'http'   => [ 'method' => 'GET', 'requestUri' => '/networks', ],
			'input'  => [ 'shape' => 'ListNetworksInput', ],
			'output' => [ 'shape' => 'ListNetworksOutput', ],
			'errors' => [
				[ 'shape' => 'InvalidRequestException', ],
				[ 'shape' => 'AccessDeniedException', ],
				[ 'shape' => 'ThrottlingException', ],
				[ 'shape' => 'InternalServiceErrorException', ],
			],
		],
		'ListNodes'         => [
			'name'   => 'ListNodes',
			'http'   => [
				'method'     => 'GET',
				'requestUri' => '/networks/{networkId}/members/{memberId}/nodes',
			],
			'input'  => [ 'shape' => 'ListNodesInput', ],
			'output' => [ 'shape' => 'ListNodesOutput', ],
			'errors' => [
				[ 'shape' => 'InvalidRequestException', ],
				[ 'shape' => 'AccessDeniedException', ],
				[ 'shape' => 'ThrottlingException', ],
				[ 'shape' => 'InternalServiceErrorException', ],
			],
		],
		'ListProposalVotes' => [
			'name'   => 'ListProposalVotes',
			'http'   => [
				'method'     => 'GET',
				'requestUri' => '/networks/{networkId}/proposals/{proposalId}/votes',
			],
			'input'  => [ 'shape' => 'ListProposalVotesInput', ],
			'output' => [ 'shape' => 'ListProposalVotesOutput', ],
			'errors' => [
				[ 'shape' => 'InvalidRequestException', ],
				[ 'shape' => 'AccessDeniedException', ],
				[ 'shape' => 'ThrottlingException', ],
				[ 'shape' => 'InternalServiceErrorException', ],
			],
		],
		'ListProposals'     => [
			'name'   => 'ListProposals',
			'http'   => [ 'method' => 'GET', 'requestUri' => '/networks/{networkId}/proposals', ],
			'input'  => [ 'shape' => 'ListProposalsInput', ],
			'output' => [ 'shape' => 'ListProposalsOutput', ],
			'errors' => [
				[ 'shape' => 'InvalidRequestException', ],
				[ 'shape' => 'ResourceNotFoundException', ],
				[ 'shape' => 'AccessDeniedException', ],
				[ 'shape' => 'ThrottlingException', ],
				[ 'shape' => 'InternalServiceErrorException', ],
			],
		],
		'RejectInvitation'  => [
			'name'   => 'RejectInvitation',
			'http'   => [ 'method' => 'DELETE', 'requestUri' => '/invitations/{invitationId}', ],
			'input'  => [ 'shape' => 'RejectInvitationInput', ],
			'output' => [ 'shape' => 'RejectInvitationOutput', ],
			'errors' => [
				[ 'shape' => 'InvalidRequestException', ],
				[ 'shape' => 'IllegalActionException', ],
				[ 'shape' => 'AccessDeniedException', ],
				[ 'shape' => 'ResourceNotFoundException', ],
				[ 'shape' => 'ThrottlingException', ],
				[ 'shape' => 'InternalServiceErrorException', ],
			],
		],
		'VoteOnProposal'    => [
			'name'   => 'VoteOnProposal',
			'http'   => [
				'method'     => 'POST',
				'requestUri' => '/networks/{networkId}/proposals/{proposalId}/votes',
			],
			'input'  => [ 'shape' => 'VoteOnProposalInput', ],
			'output' => [ 'shape' => 'VoteOnProposalOutput', ],
			'errors' => [
				[ 'shape' => 'InvalidRequestException', ],
				[ 'shape' => 'IllegalActionException', ],
				[ 'shape' => 'AccessDeniedException', ],
				[ 'shape' => 'ResourceNotFoundException', ],
				[ 'shape' => 'ThrottlingException', ],
				[ 'shape' => 'InternalServiceErrorException', ],
			],
		],
	],
	'shapes'     => [
		'AccessDeniedException'          => [
			'type'      => 'structure',
			'members'   => [],
			'error'     => [ 'httpStatusCode' => 403, ],
			'exception' => true,
		],
		'ApprovalThresholdPolicy'        => [
			'type'    => 'structure',
			'members' => [
				'ThresholdPercentage'     => [ 'shape' => 'ThresholdPercentageInt', ],
				'ProposalDurationInHours' => [ 'shape' => 'ProposalDurationInt', ],
				'ThresholdComparator'     => [ 'shape' => 'ThresholdComparator', ],
			],
		],
		'AvailabilityZoneString'         => [ 'type' => 'string', ],
		'ClientRequestTokenString'       => [ 'type' => 'string', 'max' => 64, 'min' => 1, ],
		'CreateMemberInput'              => [
			'type'     => 'structure',
			'required' => [
				'ClientRequestToken',
				'InvitationId',
				'NetworkId',
				'MemberConfiguration',
			],
			'members'  => [
				'ClientRequestToken'  => [
					'shape'            => 'ClientRequestTokenString',
					'idempotencyToken' => true,
				],
				'InvitationId'        => [ 'shape' => 'ResourceIdString', ],
				'NetworkId'           => [
					'shape'        => 'ResourceIdString',
					'location'     => 'uri',
					'locationName' => 'networkId',
				],
				'MemberConfiguration' => [ 'shape' => 'MemberConfiguration', ],
			],
		],
		'CreateMemberOutput'             => [
			'type'    => 'structure',
			'members' => [ 'MemberId' => [ 'shape' => 'ResourceIdString', ], ],
		],
		'CreateNetworkInput'             => [
			'type'     => 'structure',
			'required' => [
				'ClientRequestToken',
				'Name',
				'Framework',
				'FrameworkVersion',
				'VotingPolicy',
				'MemberConfiguration',
			],
			'members'  => [
				'ClientRequestToken'     => [
					'shape'            => 'ClientRequestTokenString',
					'idempotencyToken' => true,
				],
				'Name'                   => [ 'shape' => 'NameString', ],
				'Description'            => [ 'shape' => 'DescriptionString', ],
				'Framework'              => [ 'shape' => 'Framework', ],
				'FrameworkVersion'       => [ 'shape' => 'FrameworkVersionString', ],
				'FrameworkConfiguration' => [ 'shape' => 'NetworkFrameworkConfiguration', ],
				'VotingPolicy'           => [ 'shape' => 'VotingPolicy', ],
				'MemberConfiguration'    => [ 'shape' => 'MemberConfiguration', ],
			],
		],
		'CreateNetworkOutput'            => [
			'type'    => 'structure',
			'members' => [
				'NetworkId' => [ 'shape' => 'ResourceIdString', ],
				'MemberId'  => [ 'shape' => 'ResourceIdString', ],
			],
		],
		'CreateNodeInput'                => [
			'type'     => 'structure',
			'required' => [
				'ClientRequestToken',
				'NetworkId',
				'MemberId',
				'NodeConfiguration',
			],
			'members'  => [
				'ClientRequestToken' => [
					'shape'            => 'ClientRequestTokenString',
					'idempotencyToken' => true,
				],
				'NetworkId'          => [
					'shape'        => 'ResourceIdString',
					'location'     => 'uri',
					'locationName' => 'networkId',
				],
				'MemberId'           => [
					'shape'        => 'ResourceIdString',
					'location'     => 'uri',
					'locationName' => 'memberId',
				],
				'NodeConfiguration'  => [ 'shape' => 'NodeConfiguration', ],
			],
		],
		'CreateNodeOutput'               => [
			'type'    => 'structure',
			'members' => [ 'NodeId' => [ 'shape' => 'ResourceIdString', ], ],
		],
		'CreateProposalInput'            => [
			'type'     => 'structure',
			'required' => [ 'ClientRequestToken', 'NetworkId', 'MemberId', 'Actions', ],
			'members'  => [
				'ClientRequestToken' => [
					'shape'            => 'ClientRequestTokenString',
					'idempotencyToken' => true,
				],
				'NetworkId'          => [
					'shape'        => 'ResourceIdString',
					'location'     => 'uri',
					'locationName' => 'networkId',
				],
				'MemberId'           => [ 'shape' => 'ResourceIdString', ],
				'Actions'            => [ 'shape' => 'ProposalActions', ],
				'Description'        => [ 'shape' => 'DescriptionString', ],
			],
		],
		'CreateProposalOutput'           => [
			'type'    => 'structure',
			'members' => [ 'ProposalId' => [ 'shape' => 'ResourceIdString', ], ],
		],
		'DeleteMemberInput'              => [
			'type'     => 'structure',
			'required' => [ 'NetworkId', 'MemberId', ],
			'members'  => [
				'NetworkId' => [
					'shape'        => 'ResourceIdString',
					'location'     => 'uri',
					'locationName' => 'networkId',
				],
				'MemberId'  => [
					'shape'        => 'ResourceIdString',
					'location'     => 'uri',
					'locationName' => 'memberId',
				],
			],
		],
		'DeleteMemberOutput'             => [ 'type' => 'structure', 'members' => [], ],
		'DeleteNodeInput'                => [
			'type'     => 'structure',
			'required' => [ 'NetworkId', 'MemberId', 'NodeId', ],
			'members'  => [
				'NetworkId' => [
					'shape'        => 'ResourceIdString',
					'location'     => 'uri',
					'locationName' => 'networkId',
				],
				'MemberId'  => [
					'shape'        => 'ResourceIdString',
					'location'     => 'uri',
					'locationName' => 'memberId',
				],
				'NodeId'    => [
					'shape'        => 'ResourceIdString',
					'location'     => 'uri',
					'locationName' => 'nodeId',
				],
			],
		],
		'DeleteNodeOutput'               => [ 'type' => 'structure', 'members' => [], ],
		'DescriptionString'              => [ 'type' => 'string', 'max' => 128, ],
		'Edition'                        => [ 'type' => 'string', 'enum' => [ 'STARTER', 'STANDARD', ], ],
		'Framework'                      => [ 'type' => 'string', 'enum' => [ 'HYPERLEDGER_FABRIC', ], ],
		'FrameworkVersionString'         => [ 'type' => 'string', 'max' => 8, 'min' => 1, ],
		'GetMemberInput'                 => [
			'type'     => 'structure',
			'required' => [ 'NetworkId', 'MemberId', ],
			'members'  => [
				'NetworkId' => [
					'shape'        => 'ResourceIdString',
					'location'     => 'uri',
					'locationName' => 'networkId',
				],
				'MemberId'  => [
					'shape'        => 'ResourceIdString',
					'location'     => 'uri',
					'locationName' => 'memberId',
				],
			],
		],
		'GetMemberOutput'                => [
			'type'    => 'structure',
			'members' => [ 'Member' => [ 'shape' => 'Member', ], ],
		],
		'GetNetworkInput'                => [
			'type'     => 'structure',
			'required' => [ 'NetworkId', ],
			'members'  => [
				'NetworkId' => [
					'shape'        => 'ResourceIdString',
					'location'     => 'uri',
					'locationName' => 'networkId',
				],
			],
		],
		'GetNetworkOutput'               => [
			'type'    => 'structure',
			'members' => [ 'Network' => [ 'shape' => 'Network', ], ],
		],
		'GetNodeInput'                   => [
			'type'     => 'structure',
			'required' => [ 'NetworkId', 'MemberId', 'NodeId', ],
			'members'  => [
				'NetworkId' => [
					'shape'        => 'ResourceIdString',
					'location'     => 'uri',
					'locationName' => 'networkId',
				],
				'MemberId'  => [
					'shape'        => 'ResourceIdString',
					'location'     => 'uri',
					'locationName' => 'memberId',
				],
				'NodeId'    => [
					'shape'        => 'ResourceIdString',
					'location'     => 'uri',
					'locationName' => 'nodeId',
				],
			],
		],
		'GetNodeOutput'                  => [
			'type'    => 'structure',
			'members' => [ 'Node' => [ 'shape' => 'Node', ], ],
		],
		'GetProposalInput'               => [
			'type'     => 'structure',
			'required' => [ 'NetworkId', 'ProposalId', ],
			'members'  => [
				'NetworkId'  => [
					'shape'        => 'ResourceIdString',
					'location'     => 'uri',
					'locationName' => 'networkId',
				],
				'ProposalId' => [
					'shape'        => 'ResourceIdString',
					'location'     => 'uri',
					'locationName' => 'proposalId',
				],
			],
		],
		'GetProposalOutput'              => [
			'type'    => 'structure',
			'members' => [ 'Proposal' => [ 'shape' => 'Proposal', ], ],
		],
		'IllegalActionException'         => [
			'type'      => 'structure',
			'members'   => [ 'Message' => [ 'shape' => 'String', ], ],
			'error'     => [ 'httpStatusCode' => 400, ],
			'exception' => true,
		],
		'InstanceTypeString'             => [ 'type' => 'string', ],
		'InternalServiceErrorException'  => [
			'type'      => 'structure',
			'members'   => [],
			'error'     => [ 'httpStatusCode' => 500, ],
			'exception' => true,
		],
		'InvalidRequestException'        => [
			'type'      => 'structure',
			'members'   => [ 'Message' => [ 'shape' => 'String', ], ],
			'error'     => [ 'httpStatusCode' => 400, ],
			'exception' => true,
		],
		'Invitation'                     => [
			'type'    => 'structure',
			'members' => [
				'InvitationId'   => [ 'shape' => 'ResourceIdString', ],
				'CreationDate'   => [ 'shape' => 'Timestamp', ],
				'ExpirationDate' => [ 'shape' => 'Timestamp', ],
				'Status'         => [ 'shape' => 'InvitationStatus', ],
				'NetworkSummary' => [ 'shape' => 'NetworkSummary', ],
			],
		],
		'InvitationList'                 => [ 'type' => 'list', 'member' => [ 'shape' => 'Invitation', ], ],
		'InvitationStatus'               => [
			'type' => 'string',
			'enum' => [ 'PENDING', 'ACCEPTED', 'ACCEPTING', 'REJECTED', 'EXPIRED', ],
		],
		'InviteAction'                   => [
			'type'     => 'structure',
			'required' => [ 'Principal', ],
			'members'  => [ 'Principal' => [ 'shape' => 'PrincipalString', ], ],
		],
		'InviteActionList'               => [ 'type' => 'list', 'member' => [ 'shape' => 'InviteAction', ], ],
		'IsOwned'                        => [ 'type' => 'boolean', 'box' => true, ],
		'ListInvitationsInput'           => [
			'type'    => 'structure',
			'members' => [
				'MaxResults' => [
					'shape'        => 'ProposalListMaxResults',
					'location'     => 'querystring',
					'locationName' => 'maxResults',
				],
				'NextToken'  => [
					'shape'        => 'PaginationToken',
					'location'     => 'querystring',
					'locationName' => 'nextToken',
				],
			],
		],
		'ListInvitationsOutput'          => [
			'type'    => 'structure',
			'members' => [
				'Invitations' => [ 'shape' => 'InvitationList', ],
				'NextToken'   => [ 'shape' => 'PaginationToken', ],
			],
		],
		'ListMembersInput'               => [
			'type'     => 'structure',
			'required' => [ 'NetworkId', ],
			'members'  => [
				'NetworkId'  => [
					'shape'        => 'ResourceIdString',
					'location'     => 'uri',
					'locationName' => 'networkId',
				],
				'Name'       => [
					'shape'        => 'String',
					'location'     => 'querystring',
					'locationName' => 'name',
				],
				'Status'     => [
					'shape'        => 'MemberStatus',
					'location'     => 'querystring',
					'locationName' => 'status',
				],
				'IsOwned'    => [
					'shape'        => 'IsOwned',
					'location'     => 'querystring',
					'locationName' => 'isOwned',
				],
				'MaxResults' => [
					'shape'        => 'MemberListMaxResults',
					'location'     => 'querystring',
					'locationName' => 'maxResults',
				],
				'NextToken'  => [
					'shape'        => 'PaginationToken',
					'location'     => 'querystring',
					'locationName' => 'nextToken',
				],
			],
		],
		'ListMembersOutput'              => [
			'type'    => 'structure',
			'members' => [
				'Members'   => [ 'shape' => 'MemberSummaryList', ],
				'NextToken' => [ 'shape' => 'PaginationToken', ],
			],
		],
		'ListNetworksInput'              => [
			'type'    => 'structure',
			'members' => [
				'Name'       => [
					'shape'        => 'String',
					'location'     => 'querystring',
					'locationName' => 'name',
				],
				'Framework'  => [
					'shape'        => 'Framework',
					'location'     => 'querystring',
					'locationName' => 'framework',
				],
				'Status'     => [
					'shape'        => 'NetworkStatus',
					'location'     => 'querystring',
					'locationName' => 'status',
				],
				'MaxResults' => [
					'shape'        => 'NetworkListMaxResults',
					'location'     => 'querystring',
					'locationName' => 'maxResults',
				],
				'NextToken'  => [
					'shape'        => 'PaginationToken',
					'location'     => 'querystring',
					'locationName' => 'nextToken',
				],
			],
		],
		'ListNetworksOutput'             => [
			'type'    => 'structure',
			'members' => [
				'Networks'  => [ 'shape' => 'NetworkSummaryList', ],
				'NextToken' => [ 'shape' => 'PaginationToken', ],
			],
		],
		'ListNodesInput'                 => [
			'type'     => 'structure',
			'required' => [ 'NetworkId', 'MemberId', ],
			'members'  => [
				'NetworkId'  => [
					'shape'        => 'ResourceIdString',
					'location'     => 'uri',
					'locationName' => 'networkId',
				],
				'MemberId'   => [
					'shape'        => 'ResourceIdString',
					'location'     => 'uri',
					'locationName' => 'memberId',
				],
				'Status'     => [
					'shape'        => 'NodeStatus',
					'location'     => 'querystring',
					'locationName' => 'status',
				],
				'MaxResults' => [
					'shape'        => 'NodeListMaxResults',
					'location'     => 'querystring',
					'locationName' => 'maxResults',
				],
				'NextToken'  => [
					'shape'        => 'PaginationToken',
					'location'     => 'querystring',
					'locationName' => 'nextToken',
				],
			],
		],
		'ListNodesOutput'                => [
			'type'    => 'structure',
			'members' => [
				'Nodes'     => [ 'shape' => 'NodeSummaryList', ],
				'NextToken' => [ 'shape' => 'PaginationToken', ],
			],
		],
		'ListProposalVotesInput'         => [
			'type'     => 'structure',
			'required' => [ 'NetworkId', 'ProposalId', ],
			'members'  => [
				'NetworkId'  => [
					'shape'        => 'ResourceIdString',
					'location'     => 'uri',
					'locationName' => 'networkId',
				],
				'ProposalId' => [
					'shape'        => 'ResourceIdString',
					'location'     => 'uri',
					'locationName' => 'proposalId',
				],
				'MaxResults' => [
					'shape'        => 'ProposalListMaxResults',
					'location'     => 'querystring',
					'locationName' => 'maxResults',
				],
				'NextToken'  => [
					'shape'        => 'PaginationToken',
					'location'     => 'querystring',
					'locationName' => 'nextToken',
				],
			],
		],
		'ListProposalVotesOutput'        => [
			'type'    => 'structure',
			'members' => [
				'ProposalVotes' => [ 'shape' => 'ProposalVoteList', ],
				'NextToken'     => [ 'shape' => 'PaginationToken', ],
			],
		],
		'ListProposalsInput'             => [
			'type'     => 'structure',
			'required' => [ 'NetworkId', ],
			'members'  => [
				'NetworkId'  => [
					'shape'        => 'ResourceIdString',
					'location'     => 'uri',
					'locationName' => 'networkId',
				],
				'MaxResults' => [
					'shape'        => 'ProposalListMaxResults',
					'location'     => 'querystring',
					'locationName' => 'maxResults',
				],
				'NextToken'  => [
					'shape'        => 'PaginationToken',
					'location'     => 'querystring',
					'locationName' => 'nextToken',
				],
			],
		],
		'ListProposalsOutput'            => [
			'type'    => 'structure',
			'members' => [
				'Proposals' => [ 'shape' => 'ProposalSummaryList', ],
				'NextToken' => [ 'shape' => 'PaginationToken', ],
			],
		],
		'Member'                         => [
			'type'    => 'structure',
			'members' => [
				'NetworkId'           => [ 'shape' => 'ResourceIdString', ],
				'Id'                  => [ 'shape' => 'ResourceIdString', ],
				'Name'                => [ 'shape' => 'NetworkMemberNameString', ],
				'Description'         => [ 'shape' => 'DescriptionString', ],
				'FrameworkAttributes' => [ 'shape' => 'MemberFrameworkAttributes', ],
				'Status'              => [ 'shape' => 'MemberStatus', ],
				'CreationDate'        => [ 'shape' => 'Timestamp', ],
			],
		],
		'MemberConfiguration'            => [
			'type'     => 'structure',
			'required' => [ 'Name', 'FrameworkConfiguration', ],
			'members'  => [
				'Name'                   => [ 'shape' => 'NetworkMemberNameString', ],
				'Description'            => [ 'shape' => 'DescriptionString', ],
				'FrameworkConfiguration' => [ 'shape' => 'MemberFrameworkConfiguration', ],
			],
		],
		'MemberFabricAttributes'         => [
			'type'    => 'structure',
			'members' => [
				'AdminUsername' => [ 'shape' => 'UsernameString', ],
				'CaEndpoint'    => [ 'shape' => 'String', ],
			],
		],
		'MemberFabricConfiguration'      => [
			'type'     => 'structure',
			'required' => [ 'AdminUsername', 'AdminPassword', ],
			'members'  => [
				'AdminUsername' => [ 'shape' => 'UsernameString', ],
				'AdminPassword' => [ 'shape' => 'PasswordString', ],
			],
		],
		'MemberFrameworkAttributes'      => [
			'type'    => 'structure',
			'members' => [ 'Fabric' => [ 'shape' => 'MemberFabricAttributes', ], ],
		],
		'MemberFrameworkConfiguration'   => [
			'type'    => 'structure',
			'members' => [ 'Fabric' => [ 'shape' => 'MemberFabricConfiguration', ], ],
		],
		'MemberListMaxResults'           => [ 'type' => 'integer', 'box' => true, 'max' => 20, 'min' => 1, ],
		'MemberStatus'                   => [
			'type' => 'string',
			'enum' => [
				'CREATING',
				'AVAILABLE',
				'CREATE_FAILED',
				'DELETING',
				'DELETED',
			],
		],
		'MemberSummary'                  => [
			'type'    => 'structure',
			'members' => [
				'Id'           => [ 'shape' => 'ResourceIdString', ],
				'Name'         => [ 'shape' => 'NetworkMemberNameString', ],
				'Description'  => [ 'shape' => 'DescriptionString', ],
				'Status'       => [ 'shape' => 'MemberStatus', ],
				'CreationDate' => [ 'shape' => 'Timestamp', ],
				'IsOwned'      => [ 'shape' => 'IsOwned', ],
			],
		],
		'MemberSummaryList'              => [ 'type' => 'list', 'member' => [ 'shape' => 'MemberSummary', ], ],
		'NameString'                     => [ 'type' => 'string', 'max' => 64, 'min' => 1, 'pattern' => '.*\\S.*', ],
		'Network'                        => [
			'type'    => 'structure',
			'members' => [
				'Id'                     => [ 'shape' => 'ResourceIdString', ],
				'Name'                   => [ 'shape' => 'NameString', ],
				'Description'            => [ 'shape' => 'DescriptionString', ],
				'Framework'              => [ 'shape' => 'Framework', ],
				'FrameworkVersion'       => [ 'shape' => 'FrameworkVersionString', ],
				'FrameworkAttributes'    => [ 'shape' => 'NetworkFrameworkAttributes', ],
				'VpcEndpointServiceName' => [ 'shape' => 'String', ],
				'VotingPolicy'           => [ 'shape' => 'VotingPolicy', ],
				'Status'                 => [ 'shape' => 'NetworkStatus', ],
				'CreationDate'           => [ 'shape' => 'Timestamp', ],
			],
		],
		'NetworkFabricAttributes'        => [
			'type'    => 'structure',
			'members' => [
				'OrderingServiceEndpoint' => [ 'shape' => 'String', ],
				'Edition'                 => [ 'shape' => 'Edition', ],
			],
		],
		'NetworkFabricConfiguration'     => [
			'type'     => 'structure',
			'required' => [ 'Edition', ],
			'members'  => [ 'Edition' => [ 'shape' => 'Edition', ], ],
		],
		'NetworkFrameworkAttributes'     => [
			'type'    => 'structure',
			'members' => [ 'Fabric' => [ 'shape' => 'NetworkFabricAttributes', ], ],
		],
		'NetworkFrameworkConfiguration'  => [
			'type'    => 'structure',
			'members' => [ 'Fabric' => [ 'shape' => 'NetworkFabricConfiguration', ], ],
		],
		'NetworkListMaxResults'          => [ 'type' => 'integer', 'box' => true, 'max' => 10, 'min' => 1, ],
		'NetworkMemberNameString'        => [
			'type'    => 'string',
			'max'     => 64,
			'min'     => 1,
			'pattern' => '^(?!-)^[^0-9](?!.*--)[A-Za-z0-9-]+[^- ]$',
		],
		'NetworkStatus'                  => [
			'type' => 'string',
			'enum' => [
				'CREATING',
				'AVAILABLE',
				'CREATE_FAILED',
				'DELETING',
				'DELETED',
			],
		],
		'NetworkSummary'                 => [
			'type'    => 'structure',
			'members' => [
				'Id'               => [ 'shape' => 'ResourceIdString', ],
				'Name'             => [ 'shape' => 'NameString', ],
				'Description'      => [ 'shape' => 'DescriptionString', ],
				'Framework'        => [ 'shape' => 'Framework', ],
				'FrameworkVersion' => [ 'shape' => 'FrameworkVersionString', ],
				'Status'           => [ 'shape' => 'NetworkStatus', ],
				'CreationDate'     => [ 'shape' => 'Timestamp', ],
			],
		],
		'NetworkSummaryList'             => [ 'type' => 'list', 'member' => [ 'shape' => 'NetworkSummary', ], ],
		'Node'                           => [
			'type'    => 'structure',
			'members' => [
				'NetworkId'           => [ 'shape' => 'ResourceIdString', ],
				'MemberId'            => [ 'shape' => 'ResourceIdString', ],
				'Id'                  => [ 'shape' => 'ResourceIdString', ],
				'InstanceType'        => [ 'shape' => 'InstanceTypeString', ],
				'AvailabilityZone'    => [ 'shape' => 'AvailabilityZoneString', ],
				'FrameworkAttributes' => [ 'shape' => 'NodeFrameworkAttributes', ],
				'Status'              => [ 'shape' => 'NodeStatus', ],
				'CreationDate'        => [ 'shape' => 'Timestamp', ],
			],
		],
		'NodeConfiguration'              => [
			'type'     => 'structure',
			'required' => [ 'InstanceType', 'AvailabilityZone', ],
			'members'  => [
				'InstanceType'     => [ 'shape' => 'InstanceTypeString', ],
				'AvailabilityZone' => [ 'shape' => 'AvailabilityZoneString', ],
			],
		],
		'NodeFabricAttributes'           => [
			'type'    => 'structure',
			'members' => [
				'PeerEndpoint'      => [ 'shape' => 'String', ],
				'PeerEventEndpoint' => [ 'shape' => 'String', ],
			],
		],
		'NodeFrameworkAttributes'        => [
			'type'    => 'structure',
			'members' => [ 'Fabric' => [ 'shape' => 'NodeFabricAttributes', ], ],
		],
		'NodeListMaxResults'             => [ 'type' => 'integer', 'box' => true, 'max' => 20, 'min' => 1, ],
		'NodeStatus'                     => [
			'type' => 'string',
			'enum' => [
				'CREATING',
				'AVAILABLE',
				'CREATE_FAILED',
				'DELETING',
				'DELETED',
				'FAILED',
			],
		],
		'NodeSummary'                    => [
			'type'    => 'structure',
			'members' => [
				'Id'               => [ 'shape' => 'ResourceIdString', ],
				'Status'           => [ 'shape' => 'NodeStatus', ],
				'CreationDate'     => [ 'shape' => 'Timestamp', ],
				'AvailabilityZone' => [ 'shape' => 'AvailabilityZoneString', ],
				'InstanceType'     => [ 'shape' => 'InstanceTypeString', ],
			],
		],
		'NodeSummaryList'                => [ 'type' => 'list', 'member' => [ 'shape' => 'NodeSummary', ], ],
		'PaginationToken'                => [ 'type' => 'string', 'max' => 128, ],
		'PasswordString'                 => [
			'type'      => 'string',
			'max'       => 32,
			'min'       => 8,
			'pattern'   => '^(?=.*[a-z])(?=.*[A-Z])(?=.*\\d)(?!.*[@\'\\\\"/])[a-zA-Z0-9\\S]*$',
			'sensitive' => true,
		],
		'PrincipalString'                => [ 'type' => 'string', ],
		'Proposal'                       => [
			'type'    => 'structure',
			'members' => [
				'ProposalId'           => [ 'shape' => 'ResourceIdString', ],
				'NetworkId'            => [ 'shape' => 'ResourceIdString', ],
				'Description'          => [ 'shape' => 'DescriptionString', ],
				'Actions'              => [ 'shape' => 'ProposalActions', ],
				'ProposedByMemberId'   => [ 'shape' => 'ResourceIdString', ],
				'ProposedByMemberName' => [ 'shape' => 'NetworkMemberNameString', ],
				'Status'               => [ 'shape' => 'ProposalStatus', ],
				'CreationDate'         => [ 'shape' => 'Timestamp', ],
				'ExpirationDate'       => [ 'shape' => 'Timestamp', ],
				'YesVoteCount'         => [ 'shape' => 'VoteCount', ],
				'NoVoteCount'          => [ 'shape' => 'VoteCount', ],
				'OutstandingVoteCount' => [ 'shape' => 'VoteCount', ],
			],
		],
		'ProposalActions'                => [
			'type'    => 'structure',
			'members' => [
				'Invitations' => [ 'shape' => 'InviteActionList', ],
				'Removals'    => [ 'shape' => 'RemoveActionList', ],
			],
		],
		'ProposalDurationInt'            => [ 'type' => 'integer', 'box' => true, 'max' => 168, 'min' => 1, ],
		'ProposalListMaxResults'         => [ 'type' => 'integer', 'box' => true, 'max' => 100, 'min' => 1, ],
		'ProposalStatus'                 => [
			'type' => 'string',
			'enum' => [
				'IN_PROGRESS',
				'APPROVED',
				'REJECTED',
				'EXPIRED',
				'ACTION_FAILED',
			],
		],
		'ProposalSummary'                => [
			'type'    => 'structure',
			'members' => [
				'ProposalId'           => [ 'shape' => 'ResourceIdString', ],
				'Description'          => [ 'shape' => 'DescriptionString', ],
				'ProposedByMemberId'   => [ 'shape' => 'ResourceIdString', ],
				'ProposedByMemberName' => [ 'shape' => 'NetworkMemberNameString', ],
				'Status'               => [ 'shape' => 'ProposalStatus', ],
				'CreationDate'         => [ 'shape' => 'Timestamp', ],
				'ExpirationDate'       => [ 'shape' => 'Timestamp', ],
			],
		],
		'ProposalSummaryList'            => [ 'type' => 'list', 'member' => [ 'shape' => 'ProposalSummary', ], ],
		'ProposalVoteList'               => [ 'type' => 'list', 'member' => [ 'shape' => 'VoteSummary', ], ],
		'RejectInvitationInput'          => [
			'type'     => 'structure',
			'required' => [ 'InvitationId', ],
			'members'  => [
				'InvitationId' => [
					'shape'        => 'ResourceIdString',
					'location'     => 'uri',
					'locationName' => 'invitationId',
				],
			],
		],
		'RejectInvitationOutput'         => [ 'type' => 'structure', 'members' => [], ],
		'RemoveAction'                   => [
			'type'     => 'structure',
			'required' => [ 'MemberId', ],
			'members'  => [ 'MemberId' => [ 'shape' => 'ResourceIdString', ], ],
		],
		'RemoveActionList'               => [ 'type' => 'list', 'member' => [ 'shape' => 'RemoveAction', ], ],
		'ResourceAlreadyExistsException' => [
			'type'      => 'structure',
			'members'   => [ 'Message' => [ 'shape' => 'String', ], ],
			'error'     => [ 'httpStatusCode' => 409, ],
			'exception' => true,
		],
		'ResourceIdString'               => [ 'type' => 'string', 'max' => 32, 'min' => 1, ],
		'ResourceLimitExceededException' => [
			'type'      => 'structure',
			'members'   => [ 'Message' => [ 'shape' => 'String', ], ],
			'error'     => [ 'httpStatusCode' => 429, ],
			'exception' => true,
		],
		'ResourceNotFoundException'      => [
			'type'      => 'structure',
			'members'   => [ 'Message' => [ 'shape' => 'String', ], ],
			'error'     => [ 'httpStatusCode' => 404, ],
			'exception' => true,
		],
		'ResourceNotReadyException'      => [
			'type'      => 'structure',
			'members'   => [ 'Message' => [ 'shape' => 'String', ], ],
			'error'     => [ 'httpStatusCode' => 409, ],
			'exception' => true,
		],
		'String'                         => [ 'type' => 'string', ],
		'ThresholdComparator'            => [
			'type' => 'string',
			'enum' => [ 'GREATER_THAN', 'GREATER_THAN_OR_EQUAL_TO', ],
		],
		'ThresholdPercentageInt'         => [ 'type' => 'integer', 'box' => true, 'max' => 100, 'min' => 0, ],
		'ThrottlingException'            => [
			'type'      => 'structure',
			'members'   => [],
			'error'     => [ 'httpStatusCode' => 429, ],
			'exception' => true,
		],
		'Timestamp'                      => [ 'type' => 'timestamp', 'timestampFormat' => 'iso8601', ],
		'UsernameString'                 => [
			'type'    => 'string',
			'max'     => 16,
			'min'     => 1,
			'pattern' => '^[a-zA-Z][a-zA-Z0-9]*$',
		],
		'VoteCount'                      => [ 'type' => 'integer', 'box' => true, ],
		'VoteOnProposalInput'            => [
			'type'     => 'structure',
			'required' => [ 'NetworkId', 'ProposalId', 'VoterMemberId', 'Vote', ],
			'members'  => [
				'NetworkId'     => [
					'shape'        => 'ResourceIdString',
					'location'     => 'uri',
					'locationName' => 'networkId',
				],
				'ProposalId'    => [
					'shape'        => 'ResourceIdString',
					'location'     => 'uri',
					'locationName' => 'proposalId',
				],
				'VoterMemberId' => [ 'shape' => 'ResourceIdString', ],
				'Vote'          => [ 'shape' => 'VoteValue', ],
			],
		],
		'VoteOnProposalOutput'           => [ 'type' => 'structure', 'members' => [], ],
		'VoteSummary'                    => [
			'type'    => 'structure',
			'members' => [
				'Vote'       => [ 'shape' => 'VoteValue', ],
				'MemberName' => [ 'shape' => 'NetworkMemberNameString', ],
				'MemberId'   => [ 'shape' => 'ResourceIdString', ],
			],
		],
		'VoteValue'                      => [ 'type' => 'string', 'enum' => [ 'YES', 'NO', ], ],
		'VotingPolicy'                   => [
			'type'    => 'structure',
			'members' => [ 'ApprovalThresholdPolicy' => [ 'shape' => 'ApprovalThresholdPolicy', ], ],
		],
	],
];
