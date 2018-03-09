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

class ProxyCheckerResponse
{
    const PROXY = 0;
    const NOT_PROXY = 1;
    const ERROR = 2;

    /** @var array */
    private $response;

    public function __construct(array $response)
    {
        if(empty($response))
            throw new Exception("No valid response received from the server!");
        else $this->setResponse($response);
    }

    /**
     * @return bool
     */
    public function isProxy() : bool
    {
        if ($this->getResponse()["status"] === self::PROXY)
            return true;
        else return false;
    }

    /**
     * @return bool
     */
    public function isError() : bool
    {
        if ($this->getResponse()["status"] === self::ERROR)
            return true;
        else return false;
    }

    /**
     * @return bool
     */
    public function isPremium() : bool
    {
        return boolval($this->getResponse()["premium"]);
    }


    /**
     * @return string
     */
    public function getMessage() : string
    {
        return $this->getResponse()["message"];
    }

    /**
     * @return array
     */
    public function getResponse() : array
    {
        return $this->response;
    }

    /**
     * @param array $response
     */
    public function setResponse(array $response)
    {
        $this->response = $response;
    }
}