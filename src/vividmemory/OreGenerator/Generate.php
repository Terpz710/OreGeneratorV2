<?php

declare(strict_types=1);

namespace vividmemory\OreGenerator;

use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\math\Vector3;
use pocketmine\player\Player;
use pocketmine\event\block\BlockPlaceEvent;
use pocketmine\item\Item;
use pocketmine\event\Listener;
use pocketmine\world\World;
use pocketmine\block\Block;
use pocketmine\block\GlowingObsidian;
use pocketmine\block\VanillaBlocks;

class Generate extends PluginBase implements Listener{

    public function onEnable(): void {
        $this->getLogger()->info("Plugin OreGenerator by vividmemory! updated by Terpz710...");
        $this->getServer()->getPluginManager()->registerEvents($this,$this);
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
                    case 2;
                        $newBlock = VanillaBlocks::IRON_ORE();
                        break;
                    case 4;
                        $newBlock = VanillaBlocks::gold_ore();
                        break;
                    case 6;
                        $newBlock = VanillaBlocks::emerald_ore();
                        break;
                    case 8;
                        $newBlock = VanillaBlocks::coal_ore();
                        break;
                    case 10;
                        $newBlock = VanillaBlocks::redstone_ore();
                        break;
                    case 12;
                        $newBlock = VanillaBlocks::diamond_ore();
                        break;
					case 9;
                        $newBlock = VanillaBlocks::lapis_lazuli_ore();
                        break;
                    default:
                        $newBlock = VanillaBlocks::cobblestone();
                }
                $block->getWorld()->setBlock($block, $newBlock, true, false);
                return;
            }
        }
    }
}
