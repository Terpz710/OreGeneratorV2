<?php

declare(strict_types=1);

namespace vividmemory\OreGenerator;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\block\BlockPlaceEvent;
use pocketmine\block\GlowingObsidian;
use pocketmine\block\VanillaBlocks;
use pocketmine\math\Vector3;
use pocketmine\math\Position;

class Generate extends PluginBase implements Listener{

    public function onEnable(): void {
        $this->getLogger()->info("Plugin OreGenerator by vividmemory! updated by Terpz710...");
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    public function onBlockSet(BlockPlaceEvent $event){
        $block = $event->getBlockAgainst();
        $end = false;
        for ($i = 0; $i <= 1; $i++) {
            $nearBlock = $block->getSide($i);
            if ($nearBlock instanceof GlowingObsidian) {
                $end = true;
            }
            if ($end) {
                $id = mt_rand(1, 60);
                switch ($id) {
                    case 2:
                        $newBlock = VanillaBlocks::IRON_ORE();
                        break;
                    case 4:
                        $newBlock = VanillaBlocks::GOLD_ORE();
                        break;
                    case 6:
                        $newBlock = VanillaBlocks::EMERALD_ORE();
                        break;
                    case 8:
                        $newBlock = VanillaBlocks::COAL_ORE();
                        break;
                    case 10:
                        $newBlock = VanillaBlocks::REDSTONE_ORE();
                        break;
                    case 12:
                        $newBlock = VanillaBlocks::DIAMOND_ORE();
                        break;
                    case 9:
                        $newBlock = VanillaBlocks::LAPIS_LAZULI_ORE();
                        break;
                    default:
                        $newBlock = VanillaBlocks::COBBLESTONE();
                }
                $newBlockPosition = (new Position($block->x, $block->y + 1, $block->z, $block->getWorld()));
                $event->getPlayer()->getWorld()->setBlock($newBlockPosition, $newBlock);
                return;
            }
        }
    }
}
