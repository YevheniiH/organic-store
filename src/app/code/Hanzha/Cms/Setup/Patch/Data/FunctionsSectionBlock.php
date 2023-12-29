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

class FunctionsSectionBlock implements DataPatchInterface
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
    <style>#html-body [data-pb-style=AK2368X],#html-body [data-pb-style=GAACJHP]{background-position:left top;background-size:cover;background-repeat:no-repeat;background-attachment:scroll}#html-body [data-pb-style=GAACJHP]{justify-content:flex-start;display:flex;flex-direction:column}#html-body [data-pb-style=AK2368X]{align-self:stretch}#html-body [data-pb-style=KIUOBWQ]{display:flex;width:100%}#html-body [data-pb-style=WWYJHM9]{justify-content:flex-start;display:flex;flex-direction:column;background-position:left top;background-size:cover;background-repeat:no-repeat;background-attachment:scroll;width:100%;align-self:stretch}</style>
    <div data-content-type="row" data-appearance="contained" data-element="main">
    <div class="functions-section-block" data-enable-parallax="0" data-parallax-speed="0.5" data-background-images="{}" data-background-type="image" data-video-loop="true" data-video-play-only-visible="true" data-video-lazy-load="true" data-video-fallback-src="" data-element="inner" data-pb-style="GAACJHP">
    <div class="pagebuilder-column-group functions-section-wrapper" data-background-images="{}" data-content-type="column-group" data-appearance="default" data-grid-size="12" data-element="main" data-pb-style="AK2368X">
    <div class="pagebuilder-column-line" data-content-type="column-line" data-element="main" data-pb-style="KIUOBWQ">
    <div class="pagebuilder-column" data-content-type="column" data-appearance="full-height" data-background-images="{}" data-element="main" data-pb-style="WWYJHM9">
    <div data-content-type="html" data-appearance="default" data-element="main">&lt;div class="functions-section"&gt; &lt;ul class="functions-list"&gt; &lt;li class="function-item"&gt; &lt;a href="#"&gt;&lt;i class='fas fa-truck'&gt;&lt;/i&gt;Free Shipping&lt;/a&gt; &lt;p&gt;Above $5 Only&lt;/p&gt; &lt;/li&gt; &lt;li class="function-item"&gt; &lt;a href="#"&gt;&lt;i class='far fa-address-book'&gt;&lt;/i&gt;Certified Organic&lt;/a&gt; &lt;p&gt;100% Guarantee&lt;/p&gt; &lt;/li&gt; &lt;li class="function-item"&gt; &lt;a href="#"&gt;&lt;i class='far fa-money-bill-alt'&gt;&lt;/i&gt;Huge Savings&lt;/a&gt; &lt;p&gt;At Lowest Price&lt;/p&gt; &lt;/li&gt; &lt;li class="function-item"&gt; &lt;a href="#"&gt;&lt;i class='fas fa-recycle'&gt;&lt;/i&gt;Easy Returns&lt;/a&gt; &lt;p&gt;No Questions Asked&lt;/p&gt; &lt;/li&gt; &lt;/ul&gt; &lt;/div&gt;</div>
    </div>
    </div>
    </div>
    </div>
    </div>
EOD;
        $data = [
            'title' => 'Functions Section Block',
            'identifier' => 'functions_section_block',
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
