<?php

namespace spec\Indigo\Scaleway\Api;

use Indigo\Scaleway\Authentication;
use Ivory\HttpAdapter\HttpAdapterInterface;
use PhpSpec\ObjectBehavior;

class ActionSpec extends ObjectBehavior
{
    function let(HttpAdapterInterface $httpAdapter, Authentication $authentication)
    {
        $this->beConstructedWith($httpAdapter, $authentication);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Indigo\Scaleway\Api\Action');
    }
}
