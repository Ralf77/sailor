<?php


namespace Spawnia\Sailor\FooApp;


use GraphQL\Server\ServerConfig;
use GraphQL\Server\StandardServer;
use GraphQL\Utils\BuildSchema;

class Server
{
    /**
     * @var StandardServer
     */
    private $server;

    public function __construct()
    {
        $schema = BuildSchema::build(
            file_get_contents(__DIR__ . '/../expected/schema.graphqls')
        );

        $config = new ServerConfig();
        $config->setSchema($schema);

        $this->server = new StandardServer($config);
    }

    public function handle()
    {

        $this->server->processPsrRequest()
    }
}
