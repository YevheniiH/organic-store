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
class FooterOverallBlock implements DataPatchInterface
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
        <style>#html-body [data-pb-style=LFAQVW5],#html-body [data-pb-style=RELWEEQ]{background-position:left top;background-size:cover;background-repeat:no-repeat;background-attachment:scroll}#html-body [data-pb-style=LFAQVW5]{justify-content:flex-start;display:flex;flex-direction:column}#html-body [data-pb-style=RELWEEQ]{align-self:stretch}#html-body [data-pb-style=A4XHIVC],#html-body [data-pb-style=BSREUDP],#html-body [data-pb-style=FS7QXSI]{display:flex;width:100%}#html-body [data-pb-style=J6YUI6U],#html-body [data-pb-style=OQX5O0G],#html-body [data-pb-style=RAQ2HCG]{justify-content:flex-start;display:flex;flex-direction:column;background-position:left top;background-size:cover;background-repeat:no-repeat;background-attachment:scroll;width:100%;align-self:stretch}#html-body [data-pb-style=T0U18JO]{border-style:none}#html-body [data-pb-style=M61CR5H],#html-body [data-pb-style=U8H3PBI]{max-width:100%;height:auto}@media only screen and (max-width: 768px) { #html-body [data-pb-style=T0U18JO]{border-style:none} }</style>
        <div data-content-type="row" data-appearance="contained" data-element="main">
        <div data-enable-parallax="0" data-parallax-speed="0.5" data-background-images="{}" data-background-type="image" data-video-loop="true" data-video-play-only-visible="true" data-video-lazy-load="true" data-video-fallback-src="" data-element="inner" data-pb-style="LFAQVW5">
        <div class="pagebuilder-column-group footer-wrapper" data-background-images="{}" data-content-type="column-group" data-appearance="default" data-grid-size="12" data-element="main" data-pb-style="RELWEEQ">
        <div class="pagebuilder-column-line" data-content-type="column-line" data-element="main" data-pb-style="FS7QXSI">
        <div class="pagebuilder-column area-first" data-content-type="column" data-appearance="full-height" data-background-images="{}" data-element="main" data-pb-style="RAQ2HCG">
        <figure class="logo-footer" data-content-type="image" data-appearance="full-width" data-element="main" data-pb-style="T0U18JO"><a title="" href="#" target="" data-link-type="default" data-element="link"><img class="pagebuilder-mobile-hidden" title="" src="{{media url=wysiwyg/organic-store-logo.png}}" alt="" data-element="desktop_image" data-pb-style="U8H3PBI"><img class="pagebuilder-mobile-only" title="" src="{{media url=wysiwyg/organic-store-logo.png}}" alt="" data-element="mobile_image" data-pb-style="M61CR5H"></a></figure>
        <div data-content-type="text" data-appearance="default" data-element="main">
        <p>Maecenas mi justo, interdum at consectetur vel, tristique et arcu. Ut quis eros blandit, ultrices diam in, elementum ex. Suspendisse quis faucibus urna. Suspendisse pellentesque.</p>
        </div>
        </div>
        </div>
        <div class="pagebuilder-column-line" data-content-type="column-line" data-element="main" data-pb-style="BSREUDP">
        <div class="pagebuilder-column area-second" data-content-type="column" data-appearance="full-height" data-background-images="{}" data-element="main" data-pb-style="OQX5O0G">
        <div data-content-type="html" data-appearance="default" data-element="main">&lt;div class="quick-links general-links"&gt; &lt;h4&gt;Quick Links&lt;/h4&gt; &lt;ul class="general"&gt; &lt;li&gt;&lt;a href="#"&gt;About&lt;/a&gt;&lt;/li&gt; &lt;li&gt;&lt;a href="#"&gt;Cart&lt;/a&gt;&lt;/li&gt; &lt;li&gt;&lt;a href="#"&gt;Checkout&lt;/a&gt;&lt;/li&gt; &lt;li&gt;&lt;a href="#"&gt;Contact&lt;/a&gt;&lt;/li&gt; &lt;li&gt;&lt;a href="#"&gt;Home&lt;/a&gt;&lt;/li&gt; &lt;li&gt;&lt;a href="#"&gt;My account&lt;/a&gt;&lt;/li&gt; &lt;li&gt;&lt;a href="#"&gt;Shop&lt;/a&gt;&lt;/li&gt; &lt;/ul&gt; &lt;/div&gt;</div>
        <div data-content-type="html" data-appearance="default" data-element="main">&lt;div class="site-links general-links"&gt; &lt;h4&gt;Site Links&lt;/h4&gt; &lt;ul&gt; &lt;li&gt;&lt;a href="#"&gt;Privacy Policy&lt;/a&gt;&lt;/li&gt; &lt;li&gt;&lt;a href="#"&gt;Shipping Details&lt;/a&gt;&lt;/li&gt; &lt;li&gt;&lt;a href="#"&gt;Offers Coupons&lt;/a&gt;&lt;/li&gt; &lt;li&gt;&lt;a href="#"&gt;Terms &amp; Conditions&lt;/a&gt;&lt;/li&gt; &lt;/ul&gt; &lt;/div&gt;</div>
        </div>
        </div>
        <div class="pagebuilder-column-line" data-content-type="column-line" data-element="main" data-pb-style="A4XHIVC">
        <div class="pagebuilder-column area-third" data-content-type="column" data-appearance="full-height" data-background-images="{}" data-element="main" data-pb-style="J6YUI6U">
        <div data-content-type="html" data-appearance="default" data-element="main">&lt;div class="mobile-app general-links"&gt; &lt;h4&gt;Download Our Mobile App&lt;/h4&gt; &lt;p&gt; Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec aliquam gravida sollicitudin. Praesent porta enim mi, non tincidunt libero interdum sit amet. &lt;/p&gt; &lt;/div&gt;</div>
        <div data-content-type="html" data-appearance="default" data-element="main">&lt;div class="additional-links general-links"&gt; &lt;h4&gt;Additional Links&lt;/h4&gt; &lt;ul&gt; &lt;li&gt;&lt;a href="#"&gt;Know More About Us&lt;/a&gt;&lt;/li&gt; &lt;li&gt;&lt;a href="#"&gt;Visit Store&lt;/a&gt;&lt;/li&gt; &lt;li&gt;&lt;a href="#"&gt;Let’s Connect&lt;/a&gt;&lt;/li&gt; &lt;li&gt;&lt;a href="#"&gt;Locate Stores&lt;/a&gt;&lt;/li&gt; &lt;/ul&gt; &lt;/div&gt;&lt;div class="play"&gt;&lt;figure class="play-store" data-content-type="image" data-appearance="full-width" data-element="main" data-pb-style="QKYFYM5"&gt;&lt;a title="" href="https://play.google.com/store/games" target="" data-link-type="default" data-element="link"&gt;&lt;img class="pagebuilder-mobile-hidden" title="" src="{{media url=wysiwyg/play-store_2.png}}" alt="" data-element="desktop_image" data-pb-style="UVASYJF"&gt;&lt;img class="pagebuilder-mobile-only" title="" src="{{media url=wysiwyg/play-store_2.png}}" alt="" data-element="mobile_image" data-pb-style="WS1PYW5"&gt;&lt;/a&gt;&lt;/figure&gt; &lt;figure class="app-store" data-content-type="image" data-appearance="full-width" data-element="main" data-pb-style="HOMYD6F"&gt;&lt;a title="" href="https://www.apple.com/app-store" target="" data-link-type="default" data-element="link"&gt;&lt;img class="pagebuilder-mobile-hidden" title="" src="{{media url=wysiwyg/app-store_1.png}}" alt="" data-element="desktop_image" data-pb-style="FD0Y3A8"&gt;&lt;img class="pagebuilder-mobile-only" title="" src="{{media url=wysiwyg/app-store_1.png}}" alt="" data-element="mobile_image" data-pb-style="F7QLDNT"&gt;&lt;/a&gt;&lt;/figure&gt;&lt;/div&gt;</div>
        </div>
        </div>
        </div>
        </div>
        </div>
EOD;
        $data = [
            'title' => 'Footer Overall Block',
            'identifier' => 'footer_overall_block',
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
