<?php
/**
 * Copyright (c) 2023. MageCloud.  All rights reserved.
 * @author: Volodymyr Hryvinskyi <mailto:volodymyr@hryvinskyi.com>
 */

namespace Hryvinskyi\SeoCanonicalAmastyShopByBrand\Model;

use Amasty\ShopbyBrand\Model\ConfigProvider;
use Hryvinskyi\SeoCanonicalFrontend\Model\AbstractCanonicalUrlProcess;
use Magento\Framework\App\HttpRequestInterface;

class CanonicalUrlProcess extends AbstractCanonicalUrlProcess
{
    private ConfigProvider $configProvider;

    public function __construct(ConfigProvider $configProvider, array $actions = [])
    {
        parent::__construct($actions);
        $this->configProvider = $configProvider;
    }

    /**
     * @inheritDoc
     */
    public function execute(HttpRequestInterface $request): ?string
    {
        $brandCode = $this->configProvider->getBrandAttributeCode();

        if (isset($request->getParams()[$brandCode])) {
            return $this->getPath($request);
        }

        return null;
    }


    /**
     * @param HttpRequestInterface $request
     *
     * @return string
     */
    private function getPath(HttpRequestInterface $request): string
    {
        $identifier = trim($request->getPathInfo(), '/');
        $suffix = $this->configProvider->getSuffix();
        if (!empty($suffix) && str_contains($identifier, $suffix)) {
            $suffixPosition = strrpos($identifier, $suffix);
            if ($suffixPosition !== false && $suffixPosition == strlen($identifier) - strlen($suffix)) {
                $identifier = substr($identifier, 0, $suffixPosition);
            }
        }

        return $identifier;
    }
}