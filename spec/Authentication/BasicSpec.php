<?php

namespace spec\Indigo\Scaleway\Authentication;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\StreamableInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class BasicSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('john.doe@domain.com', 'secret');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Indigo\Scaleway\Authentication\Basic');
    }

    function it_authenticates_a_request(RequestInterface $request, RequestInterface $newRequest, StreamableInterface $body)
    {
        $body->__toString()->willReturn('{}');
        $body->rewind()->shouldBeCalled();
        $body->isSeekable()->willReturn(true);
        $body->isWritable()->willReturn(true);
        $body->write(json_encode([
                'email'    => 'john.doe@domain.com',
                'password' => 'secret',
        ]))->shouldBeCalled();
        $request->getBody()->willReturn($body);
        $request->withBody(Argument::type(StreamableInterface::class))->willReturn($newRequest);
        $request = $this->authenticateRequest($request);

        $request->shouldBe($newRequest);
    }

    function it_throws_an_exception_when_body_is_not_seekable_or_not_writable(RequestInterface $request, StreamableInterface $body)
    {
        $body->isSeekable()->willReturn(false);
        $body->isWritable()->willReturn(false);
        $request->getBody()->willReturn($body);

        $this->shouldThrow('RuntimeException')->duringAuthenticateRequest($request);
    }

    function it_throws_an_exception_when_no_valid_json_is_found(RequestInterface $request, StreamableInterface $body)
    {
        $body->__toString()->willReturn('INVALID');
        $body->isSeekable()->willReturn(true);
        $body->isWritable()->willReturn(true);
        $request->getBody()->willReturn($body);

        $this->shouldThrow('RuntimeException')->duringAuthenticateRequest($request);
    }
}
