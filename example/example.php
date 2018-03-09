<?php
/**
 *     ProxyChecker  Copyright (C) 2018  OGFris
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

require("../ProxyChecker.php");

/**
 * This code is an example of how to use the ProxyChecker's API library.
 */

$ip = "8.8.8.8"; //the ip that you want to check
$key = "nokey"; //your ProxyChecker premium key, if you don't have one it's fine but your Query's will be limited! You can buy one at CheckProxy.ga

$api = new ProxyChecker($key);
$response = $api->Query($ip);
if ($response->isError()){
    echo $response->getMessage() . PHP_EOL;
}
echo "Message: " . $response->getMessage() . PHP_EOL; //will return a message that helps you to understand the answer.
echo $response->isProxy() ? "isProxy: true" : "isProxy: false" . PHP_EOL; //will return true if it's a proxy and false if it's not.
echo $response->isPremium() ? "isPremium: true" : "isPremium: false" . PHP_EOL; //will return true if your key is valid and false if it's not.

//NOTE: the PHP_EOL constant is used just to jump to another line, it can be removed but it helps to make the output messages more clear.
