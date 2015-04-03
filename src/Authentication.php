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

use Psr\Http\Message\RequestInterface;

/**
 * Authenticates an API request
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
interface Authentication
{
    /**
     * Authenticates an API request
     *
     * @param RequestInterface $request
     *
     * @return RequestInterface
     */
    public function authenticateRequest(RequestInterface $request);
}
