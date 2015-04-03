<?php

namespace spec\Indigo\Scaleway;

use Indigo\Scaleway\Authentication;
use Ivory\HttpAdapter\HttpAdapterInterface;
use PhpSpec\ObjectBehavior;

class ScalewaySpec extends ObjectBehavior
{
    function let(HttpAdapterInterface $httpAdapter, Authentication $authentication)
    {
        $this->beConstructedWith($httpAdapter, $authentication);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Indigo\Scaleway\Scaleway');
    }

    function it_has_authentication(Authentication $authentication, Authentication $anotherAuthentication)
    {
        $this->getAuthentication()->shouldReturn($authentication);

        $this->setAuthentication($anotherAuthentication);

        $this->getAuthentication()->shouldReturn($anotherAuthentication);
    }

    function it_provides_token_api()
    {
        $token = $this->token();

        $token->shouldHaveType('Indigo\Scaleway\Api\Token');
    }

    function it_provides_organization_api()
    {
        $organization = $this->organization();

        $organization->shouldHaveType('Indigo\Scaleway\Api\Organization');
    }

    function it_provides_user_api()
    {
        $user = $this->user();

        $user->shouldHaveType('Indigo\Scaleway\Api\User');
    }

    function it_provides_server_api()
    {
        $server = $this->server();

        $server->shouldHaveType('Indigo\Scaleway\Api\Server');
    }

    function it_provides_action_api()
    {
        $action = $this->action();

        $action->shouldHaveType('Indigo\Scaleway\Api\Action');
    }

    function it_provides_volume_api()
    {
        $volume = $this->volume();

        $volume->shouldHaveType('Indigo\Scaleway\Api\Volume');
    }

    function it_provides_snapshot_api()
    {
        $snapshot = $this->snapshot();

        $snapshot->shouldHaveType('Indigo\Scaleway\Api\Snapshot');
    }

    function it_provides_image_api()
    {
        $image = $this->image();

        $image->shouldHaveType('Indigo\Scaleway\Api\Image');
    }

    function it_provides_ip_api()
    {
        $ip = $this->ip();

        $ip->shouldHaveType('Indigo\Scaleway\Api\Ip');
    }

    function it_provides_metadata_api()
    {
        $metadata = $this->metadata();

        $metadata->shouldHaveType('Indigo\Scaleway\Api\Metadata');
    }
}
