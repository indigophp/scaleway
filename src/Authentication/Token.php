<?php

/*
 * This file is part of the Scaleway package.
 *
 * (c) Indigo Development Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Indigo\Scaleway\Authentication;

use Indigo\Scaleway\Authentication;
use Psr\Http\Message\RequestInterface;

/**
 * Authenticates a request using X-Auth-Token header
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
class Token implements Authentication
{
    /**
     * @var string
     */
    private $token;

    /**
     * @param string $token
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * {@inheritdoc}
     */
    public function authenticateRequest(RequestInterface $request)
    {
        return $request->withHeader('X-Auth-Token', $this->token);
    }
}
