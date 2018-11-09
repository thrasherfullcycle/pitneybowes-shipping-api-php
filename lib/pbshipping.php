<?php

#
# Copyright 2016 Pitney Bowes Inc.
#
# Licensed under the MIT License (the "License"); you may not use this file 
# except in compliance with the License. You may obtain a copy of the License 
# in the LICENSE file or at 
#     https://opensource.org/licenses/MIT
#
# Unless required by applicable law or agreed to in writing, software 
# distributed under the License is distributed on an "AS IS" BASIS, WITHOUT 
# WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.  
# See the License for the specific language governing permissions and 
# limitations under the License.
#
# File: pbshipping.php
# Description: top level file to include all required source files for shipping 
#              api
# 

require(dirname(__FILE__) . '/pbshipping/PBShipping.php');
require(dirname(__FILE__) . '/pbshipping/PBShippingApiError.php');
require(dirname(__FILE__) . '/pbshipping/PBShippingAuthenticationError.php');
require(dirname(__FILE__) . '/pbshipping/PBShippingMissingAttributeError.php');
require(dirname(__FILE__) . '/pbshipping/PBShippingApiObject.php');
require(dirname(__FILE__) . '/pbshipping/PBShippingApiResource.php');

require(dirname(__FILE__) . '/pbshipping/PBShippingAuthentication.php');
require(dirname(__FILE__) . '/pbshipping/PBShippingRequestor.php');

require(dirname(__FILE__) . '/pbshipping/PBShippingAccount.php');
require(dirname(__FILE__) . '/pbshipping/PBShippingAddress.php');
require(dirname(__FILE__) . '/pbshipping/PBShippingCarrier.php');
require(dirname(__FILE__) . '/pbshipping/PBShippingDeveloper.php');
require(dirname(__FILE__) . '/pbshipping/PBShippingManifest.php');
require(dirname(__FILE__) . '/pbshipping/PBShippingShipment.php');
require(dirname(__FILE__) . '/pbshipping/PBShippingTracking.php');



  
