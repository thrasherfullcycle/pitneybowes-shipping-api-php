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
# File: AddressTest.php
# Description: unit test for address verification
# 

// Just blanket add instead of picking and choosing..

use PitneyBowes\PBShippingApi\PBShipping;
use PitneyBowes\PBShippingApi\PBShippingAuthentication;
use PitneyBowes\PBShippingApi\PBShippingCarrier;
use PitneyBowes\PBShippingApi\PBShippingDeveloper;
use PitneyBowes\PBShippingApi\PBShippingAccount;
use PitneyBowes\PBShippingApi\PBShippingAddress;
use PitneyBowes\PBShippingApi\PBShippingShipment;
use PitneyBowes\PBShippingApi\PBShippingTracking;
use PitneyBowes\PBShippingApi\PBShippingApiError;
use PitneyBowes\PBShippingApi\PBShippingManifest;


require_once('TestUtil.php');

class AddressTest extends PHPUnit_Framework_TestCase {
	
	public function setUp() {
    	$this->auth_obj = new PBShippingAuthentication(
    		getenv("PBSHIPPING_KEY"), getenv("PBSHIPPING_SECRET"));   
	}
	
	public function tearDown() {
	}
		
    public function testAddress() {
    		
    	print "Testing get countries call ..." . "\n";
    	$res = PBShippingCarrier::getCountriesForCarrier(
    		$this->auth_obj, "usps", "US");    	
        
        print "Testing address verification ..." . "\n";        
		$origin_addr = array(
			"addressLines" => array("37 Executive Drive"), 
			"cityTown" => "Danbury",
			"stateProvince" => "Connecticut",
			"postalCode" => "06810",
			"countryCode" => "US");
        PBShippingAddress::verify($this->auth_obj, $origin_addr);  
        // expect the address is cleansed and changed
        $this->assertEquals("validated_changed", 
        	strtolower($origin_addr["status"]));
    }
}
