<?php

/*
 * This file is part of the Scaleway package.
 *
 * (c) Indigo Development Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Indigo\Scaleway;

/**
 * Main entry point
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
class Scaleway
{
    use HttpAdapterAuthAcceptor;

    /**
     * @return Api\Action
     */
    public function action()
    {
        return new Api\Action($this->httpAdapter, $this->authentication);
    }

    /**
     * @return Api\Image
     */
    public function image()
    {
        return new Api\Image($this->httpAdapter, $this->authentication);
    }

    /**
     * @return Api\Ip
     */
    public function ip()
    {
        return new Api\Ip($this->httpAdapter, $this->authentication);
    }

    /**
     * @return Api\Metadata
     */
    public function metadata()
    {
        return new Api\Metadata($this->httpAdapter, $this->authentication);
    }

    /**
     * @return Api\Organization
     */
    public function organization()
    {
        return new Api\Organization($this->httpAdapter, $this->authentication);
    }

    /**
     * @return Api\Server
     */
    public function server()
    {
        return new Api\Server($this->httpAdapter, $this->authentication);
    }

    /**
     * @return Api\Snapshot
     */
    public function snapshot()
    {
        return new Api\Snapshot($this->httpAdapter, $this->authentication);
    }

    /**
     * @return Api\Token
     */
    public function token()
    {
        return new Api\Token($this->httpAdapter, $this->authentication);
    }

    /**
     * @return Api\User
     */
    public function user()
    {
        return new Api\User($this->httpAdapter, $this->authentication);
    }

    /**
     * @return Api\Volume
     */
    public function volume()
    {
        return new Api\Volume($this->httpAdapter, $this->authentication);
    }
}
