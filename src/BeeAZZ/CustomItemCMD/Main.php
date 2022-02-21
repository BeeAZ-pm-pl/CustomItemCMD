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
   }
   
   public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args):bool{
       switch($cmd->getName()){
           case "setitemname":
           if($sender instanceof Player){         
           $text = implode(" ", $args);
           $item = $sender->getInventory()->getItemInHand();
           $item->setCustomname($text);
           $sender->getInventory()->setItemInHand($item);
           $sender->sendMessage("You have renamed the item to " . $text . ".");
           break;
           }else{
            $sender->sendMessage("Please Use Command In Game");
           }
           case "setitemlore":
          if($sender instanceof Player){
           $lore = implode(" ", $args);
           $lore = explode("\\n", $lore);
           $item = $sender->getInventory()->getItemInHand();
           $item->setLore($lore);
           $sender->getInventory()->setItemInHand($item);
           $sender->sendMessage("You have successfully ordered lore item.");
          }else{
            $sender->sendMessage("Please Use Command In Game");
          }
       }
       return true;
   }
}
