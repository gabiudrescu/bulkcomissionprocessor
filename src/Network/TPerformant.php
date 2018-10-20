<?php
/**
 * Created by PhpStorm.
 * User: gabiudrescu
 * Date: 20.10.2018
 * Time: 15:35
 */

namespace App\Network;


use TPerformant\API\Api;
use TPerformant\API\HTTP\Advertiser;
use Webmozart\Assert\Assert;

class TPerformant
{
    private $network;
    /**
     * @var string
     */
    private $baseUrl;

    public function __construct(string $baseUrl = 'http://505fa2b1.ngrok.io')
    {
        $this->baseUrl = $baseUrl;
    }

    public function build($username, $password)
    {
        Api::init($this->baseUrl);

        $this->network = new Advertiser($username, $password);

        return $this->network;
    }

    public function getNetwork(): Advertiser
    {
        Assert::notNull($this->network, 'you must first build the network connection before you can use it');

        return $this->network;
    }
}
