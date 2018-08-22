<?php

#╔═══╗╔═╗╔═╗╔═══╗╔═╗╔═╗╔═══╗╔═══╗╔═══╗╔════╗╔═══╗
#║╔═╗║║║╚╝║║║╔══╝╚╗╚╝╔╝║╔═╗║║╔══╝║╔═╗║║╔╗╔╗║║╔═╗║
#║╚═╝║║╔╗╔╗║║╚══╗─╚╗╔╝─║╚═╝║║╚══╗║╚═╝║╚╝║║╚╝║╚══╗
#║╔══╝║║║║║║║╔══╝─╔╝╚╗─║╔══╝║╔══╝║╔╗╔╝──║║──╚══╗║
#║║───║║║║║║║╚══╗╔╝╔╗╚╗║║───║╚══╗║║║╚╗──║║──║╚═╝║
#╚╝───╚╝╚╝╚╝╚═══╝╚═╝╚═╝╚╝───╚═══╝╚╝╚═╝──╚╝──╚═══╝

namespace ServerHelper\commands;

use ServerHelper\CommandBase;;
use pocketmine\command\CommandSender;
use pocketmine\utils\TextFormat as SH;
use pocketmine\Player;

class NickCommand extends CommandBase
{
    public $prefix = SH::GRAY . "» " . SH::AQUA . "SH" . SH::GRAY . " » ";

    public function __construct()
    {
        parent::__construct("nickname", "nickname command", "/nick <nickname>", ["nick"]);
    }
    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if($sender instanceof Player){
            if($sender->hasPermission("serverhelper.command.nick")){
                if(!empty($args[0])){
                    $sender->setDisplayName($args[0]);
                    $sender->setNameTag($args[0]);
                    $sender->sendMessage($this->prefix . "Your Nickname was set to " . SH::GREEN . $args[0] . SH::GRAY . "!");
                }else{
                    $sender->sendMessage($this->prefix . "Usage: /nick <nickname>");
                }
            }else{
                $sender->sendMessage($this->prefix . "You dont have the Permission to use this Command!");
            }
        }else{
            $sender->sendMessage($this->prefix . "This Command is Only for Players!");
        }
    }
}
