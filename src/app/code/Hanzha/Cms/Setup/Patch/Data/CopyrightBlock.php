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

class CopyrightBlock implements DataPatchInterface
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
    <style>#html-body [data-pb-style=RIG7W4C]{background-position:left top;background-size:cover;background-repeat:no-repeat;background-attachment:scroll;align-self:stretch}#html-body [data-pb-style=H33AF21]{display:flex;width:100%}#html-body [data-pb-style=H9Y47GQ]{justify-content:flex-start;display:flex;flex-direction:column;background-position:left top;background-size:cover;background-repeat:no-repeat;background-attachment:scroll;width:100%;align-self:stretch}</style>
    <div class="pagebuilder-column-group" data-background-images="{}" data-content-type="column-group" data-appearance="default" data-grid-size="12" data-element="main" data-pb-style="RIG7W4C">
    <div class="pagebuilder-column-line" data-content-type="column-line" data-element="main" data-pb-style="H33AF21">
    <div class="pagebuilder-column" data-content-type="column" data-appearance="full-height" data-background-images="{}" data-element="main" data-pb-style="H9Y47GQ">
    <div data-content-type="html" data-appearance="default" data-element="main">&lt;ul class="social-icons"&gt; &lt;li&gt;&lt;a href="#"&gt;&lt;i class="fas fa-apple-alt"&gt;&lt;/i&gt;&lt;/a&gt;&lt;/li&gt; &lt;li&gt;&lt;a href="#"&gt;&lt;i class="fab fa-facebook"&gt;&lt;/i&gt;&lt;/a&gt;&lt;/li&gt; &lt;li&gt;&lt;a href="#"&gt;&lt;i class="fab fa-twitter"&gt;&lt;/i&gt;&lt;/a&gt;&lt;/li&gt; &lt;li&gt;&lt;a href="#"&gt;&lt;i class="fab fa-instagram"&gt;&lt;/i&gt;&lt;/a&gt;&lt;/li&gt; &lt;/ul&gt;</div>
    </div>
    </div>
    </div>
EOD;
        $data = [
            'title' => 'Copyright Block',
            'identifier' => 'copyright_block',
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
