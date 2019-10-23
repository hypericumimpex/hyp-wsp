<?php
// This file was auto-generated from sdk-root/src/data/health/2016-08-04/paginators-1.json
return [ 'pagination' => [ 'DescribeAffectedEntities' => [ 'input_token'  => 'nextToken',
                                                           'limit_key'    => 'maxResults',
                                                           'output_token' => 'nextToken',
                                                           'result_key'   => 'entities',
],
                           'DescribeEntityAggregates' => [ 'result_key' => 'entityAggregates', ],
                           'DescribeEventAggregates'  => [ 'input_token'  => 'nextToken',
                                                           'limit_key'    => 'maxResults',
                                                           'output_token' => 'nextToken',
                                                           'result_key'   => 'eventAggregates',
                           ],
                           'DescribeEventTypes'       => [ 'input_token'  => 'nextToken',
                                                           'limit_key'    => 'maxResults',
                                                           'output_token' => 'nextToken',
                                                           'result_key'   => 'eventTypes',
                           ],
                           'DescribeEvents'           => [ 'input_token'  => 'nextToken',
                                                           'limit_key'    => 'maxResults',
                                                           'output_token' => 'nextToken',
                                                           'result_key'   => 'events',
                           ],
],
];
