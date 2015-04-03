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

use Ivory\HttpAdapter\HttpAdapterInterface;

/**
 * Accepts a HTTP Adapter and an Authentication
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
trait HttpAdapterAuthAcceptor
{
    /**
     * @var HttpAdapterInterface
     */
    protected $httpAdapter;

    /**
     * @var Authentication
     */
    protected $authentication;

    /**
     * @param HttpAdapterInterface $httpAdapter
     * @param Authentication       $authentication
     */
    public function __construct(HttpAdapterInterface $httpAdapter, Authentication $authentication)
    {
        $this->httpAdapter = $httpAdapter;
        $this->authentication = $authentication;
    }

    /**
     * Returns the authentication
     *
     * @return Authentication
     */
    public function getAuthentication()
    {
        return $this->authentication;
    }

    /**
     * Sets the authentication
     *
     * @param Authentication $authentication
     */
    public function setAuthentication(Authentication $authentication)
    {
        $this->authentication = $authentication;
    }
}
