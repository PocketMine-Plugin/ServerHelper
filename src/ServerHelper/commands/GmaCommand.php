<?php

#╔═══╗╔═╗╔═╗╔═══╗╔═╗╔═╗╔═══╗╔═══╗╔═══╗╔════╗╔═══╗
#║╔═╗║║║╚╝║║║╔══╝╚╗╚╝╔╝║╔═╗║║╔══╝║╔═╗║║╔╗╔╗║║╔═╗║
#║╚═╝║║╔╗╔╗║║╚══╗─╚╗╔╝─║╚═╝║║╚══╗║╚═╝║╚╝║║╚╝║╚══╗
#║╔══╝║║║║║║║╔══╝─╔╝╚╗─║╔══╝║╔══╝║╔╗╔╝──║║──╚══╗║
#║║───║║║║║║║╚══╗╔╝╔╗╚╗║║───║╚══╗║║║╚╗──║║──║╚═╝║
#╚╝───╚╝╚╝╚╝╚═══╝╚═╝╚═╝╚╝───╚═══╝╚╝╚═╝──╚╝──╚═══╝

namespace ServerHelper\commands;

use ServerHelper\ServerHelper;
use ServerHelper\CommandBase;
use pocketmine\plugin\PluginCommand;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\utils\TextFormat as SH;
use pocketmine\Server;
use pocketmine\Player;

class GmaCommand extends CommandBase
{
	
	public $prefix = SH::GRAY . "» " . SH::AQUA . "SH" . SH::GRAY . " » ";
	
   public function __construct() 
   {
      parent::__construct("gma", "set your gamemode to Adventure", "/gma", ["gma"]);
   }
   public function execute(CommandSender $sender, string $commandLabel, array $args)
   {
   	if($sender instanceof Player){
			if($sender->hasPermission("serverhelper.command.gms")){
				$sender->setGameMode(2);
				$sender->sendMessage($this->prefix . "Your Gamemode was set to " . SH::GREEN . "Adventure" . SH::GRAY . "!");
			}else{
				$sender->sendMessage($this->prefix . "You dont have the Permission to use this Command!");
			}
	  	}else{
			$sender->sendMessage($this->prefix . "This Command is Only for Players!");
		}
	}
}
