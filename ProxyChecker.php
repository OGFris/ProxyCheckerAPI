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

require ("ProxyCheckerResponse.php");

class ProxyChecker
{
    const URL = "https://proxychecker-web.herokuapp.com/?key={key}&ip={ip}";

    /** @var String */
    private $key;

    /**
     * ProxyChecker constructor.
     * @param string $key
     */
    public function __construct(string $key = "")
    {
        $this->setKey($key);
    }

    /**
     * @param string $ip
     * @return ProxyCheckerResponse
     */
    public function Query(string $ip) : ProxyCheckerResponse
    {
        return new ProxyCheckerResponse(decode_answer(file_get_contents(str_replace(["{key}", "{ip}"], [$this->getKey(), $ip], ProxyChecker::URL))));
    }

    /**
     * @return String
     */
    public function getKey() : String
    {
        return $this->key;
    }

    /**
     * @param String $key
     */
    public function setKey(String $key)
    {
        $this->key = $key;
    }

}

/**
 * NOTE: when the json answer returns an stdClass this function will be used to decode it into an array,
 * That's a server side error that i ill fix as soon as i can.
 *
 * @param $answer
 * @return array
 */
function decode_answer($answer) : array
{
    $array = [];
    foreach (json_decode($answer) as $key => $value){
        $array[$key] = $value;
    }
    return $array;
}
