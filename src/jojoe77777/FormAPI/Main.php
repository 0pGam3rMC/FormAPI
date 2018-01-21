<?php

namespace Core\Commands;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\CommandExecutor;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\command\PluginComand;

use pocketmine\Player;
use pocketmine\Server;
use pocketmine\utils\TextFormat as color;
use Core\Core;

class CoreCommands extends PluginCommand{
    public function __construct($name, Core $plugin){
        
        parent::__construct($name, $plugin);
        $this->setDescription(color::GREEN . "SkyRealmPE Core Plugin");
        $this->setAlias(["core", "coreui"]);
        $this->setPermission("skycore.command.core");
    }
    
    public function core($sender){
        if($sender instanceof Player){
            if($sender->hasPermission("skycore.command.core")){
                $form = $this->getPlugin()->createCustomForm(function(Player $sender, array $data){
                    $result = $data[0];
                    if($result != null){
                        $corecommand = "core";
                        $this->getPlugin()->getServer()->getCommandMap()->dispatch($sender->getPlayer(), $corecommad);
                        
                    }
                    
                });
                $form->setTitle(color::GREEN . "-=- SkyRealmPE Main Menu -=-");
                $form->addButton("Vote");                          
                $form->sendToPlayer($sender);
               
            }else{
             $sender->sendMessage("You are not ingame....");
             
            }
            return true;
        }
        
        
    }
    
    public function Vote($sender){
        if($sender instanceof PLayer){
            if($sender->hasPermision(skycore.command.core)){
                $form = $this->getPlugin()->createSimpleForm(function(Player $sender, array $data){;
                    $result = $data[0];
                    if($result != null){
                        $form->setTitle("Vote For us!");
                        $form->setContent("You can vote at bit.do/skydiscord!");
                      }                
              }
           }
        }
    }
    public execute(CommandSender $sender, string $commandlabel , array $args) : bool {
        if($sender instanceof PLayer){
            if($sender->hasPermision(skycore.command.core)){
                $form = $this->getPlugin()->createSimpleForm(function(Player $sender, array $data){
                    $result = $data[0];
                    if($result != null){
                        
                    }
                    switch($result){
                        case 1:
                            $this->Vote($sender);
                            break;
                    }
                }
            }
        }
    }
}
