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
# File: developer.php
# Description: developer account object for querying for account details, 
#              managing associated merchants, and querying for transaction 
#              history related to the developer account.
# 
namespace PitneyBowes\PBShippingApi;

class PBShippingRender extends PBShippingApiResource {

    # 
    # CLIENT LIBRARY SPECIFIC
    # API: GET /developers/{developerId}
    # API signature: get/developers/...
    # 
    # Query for developer account attributes
    #
    public function refresh($auth_obj) {

		if (!isset($this["developerId"]))
			throw new PBShippingMissingAttributeError("developerId");
			
		$api_version = PBShipping::getApiVersion("get/developers/...");
        $api_path = sprintf("/developers/%s", $this["developerId"]);
	$hdrs = null;
                $json_resp = PBShippingRequestor::request($auth_obj, "post", $api_version,
                        $api_path, $hdrs, null, $address);

        $this->exchangeArray($json_resp);
	}

    #
    # MANAGING MERCHANTS
    # API: POST /payment/render/
    # API signature: post/payment/render/...
    #
    # Register your merchants or shippers, if you have signed up for the 
    # individual account payment model.
    #
    # This method allows you to retrieve the merchant ID and related
    # information based on the Email ID they used while registering, 
    # so that you can request transactions on their behalf.  
    #     
	public function render(
		$auth_obj, $address) {

		$api_version = PBShipping::getApiVersion(
			"post/payment/render/...");	
        	$api_path = sprintf("/payment/render");
		$hdrs = null;
               $json_resp = PBShippingRequestor::request($auth_obj, "post", $api_version,
                        $api_path, $hdrs, null, $address);
		return new PBShippingRender($json_resp);
	}		

}
