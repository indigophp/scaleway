<?php

namespace spec\Indigo\Scaleway\Authentication;

use Psr\Http\Message\RequestInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TokenSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('token');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Indigo\Scaleway\Authentication\Token');
    }

    function it_authenticates_a_request(RequestInterface $request, RequestInterface $newRequest)
    {
        $request->withHeader('X-Auth-Token', 'token')->willReturn($newRequest);
        $request = $this->authenticateRequest($request);

        $request->shouldBe($newRequest);
    }
}
