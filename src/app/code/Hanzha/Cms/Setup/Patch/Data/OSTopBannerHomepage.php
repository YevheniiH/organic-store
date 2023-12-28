<?php
/**
 * Copyright © Batoh Andrii, All rights reserved.
 * See COPYING.txt for license details.
 * @author Yevhenii Hanzha <evgenijganza369@gmail.com>
 */

namespace Hanzha\Cms\Setup\Patch\Data;

use \Magento\Cms\Model\BlockFactory;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use \Magento\Framework\Setup\ModuleDataSetupInterface;
class OSTopBannerHomepage implements DataPatchInterface
{
    protected $blockFactory;

    protected $moduleDataSetup;

    public function __construct(
        BlockFactory             $blockFactory,
        ModuleDataSetupInterface $moduleDataSetup
    )
    {
        $this->blockFactory = $blockFactory;
        $this->moduleDataSetup = $moduleDataSetup;
    }

    public function apply()
    {
        $html = <<<EOD
    <style>#html-body [data-pb-style=DTHOOS8],#html-body [data-pb-style=SP2YVHG]{background-position:left top;background-size:cover;background-repeat:no-repeat;background-attachment:scroll}#html-body [data-pb-style=DTHOOS8]{justify-content:flex-start;display:flex;flex-direction:column}#html-body [data-pb-style=SP2YVHG]{align-self:stretch}#html-body [data-pb-style=VCGFGI1]{display:flex;width:100%}#html-body [data-pb-style=CH1D48D],#html-body [data-pb-style=DBQCYML]{justify-content:flex-start;display:flex;flex-direction:column;background-position:left top;background-size:cover;background-repeat:no-repeat;background-attachment:scroll;width:50%;align-self:stretch}#html-body [data-pb-style=GA2DHV9]{border-style:none}#html-body [data-pb-style=TVEYV29],#html-body [data-pb-style=W4RAV5R]{max-width:100%;height:auto}#html-body [data-pb-style=NF6G721]{border-style:none}#html-body [data-pb-style=E8BI5HU],#html-body [data-pb-style=M5CFB0M]{max-width:100%;height:auto}@media only screen and (max-width: 768px) { #html-body [data-pb-style=GA2DHV9],#html-body [data-pb-style=NF6G721]{border-style:none} }</style>
    <div data-content-type="row" data-appearance="contained" data-element="main">
    <div class="os-top-banner" data-enable-parallax="0" data-parallax-speed="0.5" data-background-images="{}" data-background-type="image" data-video-loop="true" data-video-play-only-visible="true" data-video-lazy-load="true" data-video-fallback-src="" data-element="inner" data-pb-style="DTHOOS8">
    <div class="pagebuilder-column-group top-banner-wrapper" data-background-images="{}" data-content-type="column-group" data-appearance="default" data-grid-size="12" data-element="main" data-pb-style="SP2YVHG">
    <div class="pagebuilder-column-line" data-content-type="column-line" data-element="main" data-pb-style="VCGFGI1">
    <div class="pagebuilder-column top-banner-img" data-content-type="column" data-appearance="full-height" data-background-images="{}" data-element="main" data-pb-style="CH1D48D">
    <figure class="top-banner-img" data-content-type="image" data-appearance="full-width" data-element="main" data-pb-style="GA2DHV9"><img class="pagebuilder-mobile-hidden" title="" src="{{media url=wysiwyg/organic-products-top-banner_1.png}}" alt="" data-element="desktop_image" data-pb-style="W4RAV5R"><img class="pagebuilder-mobile-only" title="" src="{{media url=wysiwyg/organic-products-top-banner_1.png}}" alt="" data-element="mobile_image" data-pb-style="TVEYV29"></figure>
    </div>
    <div class="pagebuilder-column top-banner-content" data-content-type="column" data-appearance="full-height" data-background-images="{}" data-element="main" data-pb-style="DBQCYML">
    <figure class="banner-content-img" data-content-type="image" data-appearance="full-width" data-element="main" data-pb-style="NF6G721"><img class="pagebuilder-mobile-hidden" title="" src="{{media url=wysiwyg/logo-leaf-new.png}}" alt="" data-element="desktop_image" data-pb-style="E8BI5HU"><img class="pagebuilder-mobile-only" title="" src="{{media url=wysiwyg/logo-leaf-new.png}}" alt="" data-element="mobile_image" data-pb-style="M5CFB0M"></figure>
    <h4 class="subtitle-top-banner" data-content-type="heading" data-appearance="default" data-element="main">Best Quality Products</h4>
    <h1 class="title-top-banner" data-content-type="heading" data-appearance="default" data-element="main">Join The Organic Movement!</h1>
    <div data-content-type="text" data-appearance="default" data-element="main">
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>
    </div>
    <div data-content-type="html" data-appearance="default" data-element="main">&lt;a href="#" class="action primary"&gt; &lt;span&gt;&lt;i class='fas fa-shopping-cart'&gt;&lt;/i&gt;Shop Now&lt;/span&gt; &lt;/a&gt;</div>
    </div>
    </div>
    </div>
    </div>
    </div>
EOD;
        $data = [
            'title' => 'OS Top Banner Homepage',
            'identifier' => 'os_top_banner_homepage',
            'content' => $html,
            'is_active' => 1,
            'stores' => [0],
            'sort_order' => 0
        ];

        $applyData = [$data];

        $this->moduleDataSetup->getConnection()->startSetup();
        try {
            $this->createBlock($applyData);
        } catch (\Exception $e) {
            throw $e;
        }

        $this->moduleDataSetup->getConnection()->endSetup();
    }

    public function createBlock($dataArray)
    {
        foreach ($dataArray as $blockData) {
            $block = $this->blockFactory->create()->load($blockData['identifier']);
            if (!$block->getId()) {
                $block->setData($blockData)->save();
            } else {
                $block->setData('content', $blockData['content'])->save();
            }
        }
    }

    public function revert()
    {
    }

    public static function getDependencies()
    {
        return [];
    }

    public function getAliases()
    {
        return [];
    }
}

