<?php

namespace spec\Indigo\Scaleway;

use Indigo\Scaleway\Authentication;
use Ivory\HttpAdapter\HttpAdapterInterface;
use PhpSpec\ObjectBehavior;

abstract class HttpAdapterAuthBehavior extends ObjectBehavior
{
    function let(HttpAdapterInterface $httpAdapter, Authentication $authentication)
    {
        $this->beConstructedWith($httpAdapter, $authentication);
    }

    function it_has_authentication(Authentication $authentication, Authentication $anotherAuthentication)
    {
        $this->getAuthentication()->shouldReturn($authentication);

        $this->setAuthentication($anotherAuthentication);

        $this->getAuthentication()->shouldReturn($anotherAuthentication);
    }
}
