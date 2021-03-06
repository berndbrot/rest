<?php
declare(strict_types=1);

namespace Cundd\Rest;

use Cundd\Rest\Access\AccessControllerInterface;
use Cundd\Rest\Authentication\AuthenticationProviderInterface;
use Cundd\Rest\Cache\CacheInterface;
use Cundd\Rest\Configuration\ConfigurationProviderInterface;
use Cundd\Rest\DataProvider\DataProviderInterface;
use Cundd\Rest\Domain\Model\ResourceType;
use Cundd\Rest\Handler\HandlerInterface;
use Cundd\Rest\Http\RestRequestInterface;

/**
 * Interface for the specialized Object Manager
 */
interface ObjectManagerInterface
{
    /**
     * Return an instance of the given class
     *
     * @param string $class The class name of the object to return an instance of
     * @param array  $arguments
     * @return object The object instance
     */
    public function get($class, ...$arguments);

    /**
     * Returns the configuration provider
     *
     * @return ConfigurationProviderInterface
     */
    public function getConfigurationProvider(): ConfigurationProviderInterface;

    /**
     * Returns the configuration provider
     *
     * @return RequestFactoryInterface
     */
    public function getRequestFactory(): RequestFactoryInterface;

    /**
     * Returns the Response Factory
     *
     * @return ResponseFactoryInterface
     */
    public function getResponseFactory(): ResponseFactoryInterface;

    /**
     * Returns the data provider
     *
     * @param RestRequestInterface|null $request Argument will be mandatory from version 5.0
     * @return DataProviderInterface
     */
    public function getDataProvider(RestRequestInterface $request = null): DataProviderInterface;

    /**
     * Returns the Authentication Provider
     *
     * @param RestRequestInterface|null $request Argument will be mandatory from version 5.0
     * @return AuthenticationProviderInterface
     */
    public function getAuthenticationProvider(RestRequestInterface $request = null): AuthenticationProviderInterface;

    /**
     * Returns the Access Controller
     *
     * @param RestRequestInterface|null $request Argument will be mandatory from version 5.0
     * @return AccessControllerInterface
     */
    public function getAccessController(RestRequestInterface $request = null): AccessControllerInterface;

    /**
     * Returns the Handler which is responsible for handling the current request
     *
     * @param RestRequestInterface|null $request Argument will be mandatory from version 5.0
     * @return HandlerInterface
     */
    public function getHandler(RestRequestInterface $request = null): HandlerInterface;

    /**
     * Returns the Cache instance for the given Resource Type
     *
     * @param ResourceType $resourceType
     * @return CacheInterface
     */
    public function getCache(ResourceType $resourceType): CacheInterface;
}
