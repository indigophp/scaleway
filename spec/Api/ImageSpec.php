<?php

namespace spec\Indigo\Scaleway\Api;

use spec\Indigo\Scaleway\HttpAdapterAuthBehavior;

class ImageSpec extends HttpAdapterAuthBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Indigo\Scaleway\Api\Image');
    }
}
