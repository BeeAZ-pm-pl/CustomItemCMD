<?php 

namespace BeeAZZ\CustomItemCMD;

use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\event\Listener;
use pocketmine\item\Item;
use pocketmine\Server;
use pocketmine\player\Player;
use pocketmine\plugin\PluginBase;

Class Main extends PluginBase implements Listener{
 
 public function onEnable(): void{
   $this->getServer()->getPluginManager()->registerEvents($this, $this);
   $this->getLogger()->info("PLUGIN CUSTOMITEMCMD ENABLE");
   }
   
   public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args):bool{
       switch($cmd->getName()){
           case "setitemname":
           $name = $sender->getName();
           $text = implode(" ", $args);
           $item = $sender->getInventory()->getItemInHand();
           $item->setCustomname($text);
           $sender->getInventory()->setItemInHand($item);
           $sender->sendMessage("You have renamed the item to " . $text . ".");
           break;
           return true;
           case "setitemlore":
           $name = $sender->getName();
           $lore = implode(" ", $args);
           $lore = explode("\\n",$lore);
           $item = $sender->getInventory()->getItemInHand();
           $item->setLore($lore);
           $sender->getInventory()->setItemInHand($item);
           $sender->sendMessage("You have successfully ordered lore item.");
       }
       return true;
   }
}