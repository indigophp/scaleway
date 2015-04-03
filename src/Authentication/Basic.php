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
use Psr\Http\Message\StreamableInterface;

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

        $this->ensureBodyRewritable($requestBody);

        $body = (string) $requestBody;
        $body = json_decode($body, true);

        $this->ensureJsonDecodedCorrectly();

        $body['email'] = $this->email;
        $body['password'] = $this->password;

        $requestBody->rewind();
        $requestBody->write(json_encode($body));

        return $request->withBody($requestBody);
    }

    /**
     * Ensures that the body is valid and can be rewriten after inserting auth details
     *
     * @param StreamableInterface $body
     *
     * @throws \RuntimeException If the body cannot be rewriten
     */
    private function ensureBodyRewritable($body)
    {
        if (is_null($body) or !$body->isSeekable() or !$body->isWritable()) {
            throw new \RuntimeException('Cannot authenticate request: Body stream cannot be rewritten');
        }
    }

    /**
     * Ensures that the body JSON is decoded correctly
     */
    private function ensureJsonDecodedCorrectly()
    {
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \RuntimeException('Cannot authenticate request: No valid JSON data found');
        }
    }
}
