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
 * Basic authentication with email-password pair
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
class Basic implements Authentication
{
    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $password;

    /**
     * @param string $email
     * @param string $password
     */
    public function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * {@inheritdoc}
     */
    public function authenticateRequest(RequestInterface $request)
    {
        $requestBody = $request->getBody();

        if (!$requestBody->isSeekable() or !$requestBody->isWritable()) {
            throw new \RuntimeException('Cannot authenticate request: Body stream is not seekable or not writable');
        }

        $body = (string) $requestBody;
        $body = json_decode($body, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \RuntimeException('Cannot authenticate request: no valid JSON data found');
        }

        $body['email'] = $this->email;
        $body['password'] = $this->password;

        $requestBody->rewind();
        $requestBody->write(json_encode($body));

        return $request->withBody($requestBody);
    }
}
