<?php

namespace Tests\Functional;

use Doctrine\ORM\Mapping\ClassMetadataFactory;
use Doctrine\ORM\Tools\SchemaTool;
use Symfony\Bundle\FrameworkBundle\Client;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\HttpFoundation\Response;

class FunctionalTestCase extends WebTestCase
{
    /**
     * @var Client
     */
    private $client;

    /**
     * @var ContainerInterface
     */
    private $container;


    public function setUp()
    {
        $this->client = $this->createClient();
        $this->container = $this->client->getContainer();

        $this->setupDatabase();
    }

    /**
     * @return Client
     */
    public function client()
    {
        return $this->client;
    }

    /**
     * @return ContainerInterface
     */
    public function container()
    {
        return $this->container;
    }

    /**
     * @param string $method
     * @param string $routeName
     * @param array $params
     *
     * @return Crawler
     */
    public function request($method, $routeName, $params = [])
    {
        return $this->client()->request($method, $routeName, $params);
    }

    /**
     * @return null|Response
     */
    public function response()
    {
        return $this->client()->getResponse();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown()
    {
        $this->container = null;
        $this->client    = null;

        parent::tearDown();
    }

    public function assertResponseStatus($responseCode)
    {
        $this->assertEquals($responseCode, $this->response()->getStatusCode());
    }

    public function assertResponseIsJson()
    {
        $this->assertEquals('application/json', $this->response()->headers->get('Content-Type'));
    }

    public function assertResponseIsHtml()
    {
        $this->assertEquals('text/html; charset=UTF-8', $this->response()->headers->get('Content-Type'));
    }

    private function setupDatabase()
    {
        $em = $this->container()->get('doctrine.orm.default_entity_manager');
        $params = $em->getConnection()->getParams();
        if (file_exists($params['path'])) {
            unlink($params['path']);
        }
        $schemaTool = new SchemaTool($em);
        $cmf        = new ClassMetadataFactory();
        $cmf->setEntityManager($em);
        $metadata = $cmf->getAllMetadata();
        $schemaTool->createSchema($metadata);
    }
}
