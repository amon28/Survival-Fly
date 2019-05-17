<?php
namespace SurvivalFly;

use pocketmine\Server;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\item\Item;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\utils\TextFormat as C;

class Main extends PluginBase implements Listener{
	public $x = 0;
    
    public function onEnable(){
        $this->getServer()->getPluginManager()->registerEvents($this,$this);
    }
    
	public function onCommand(CommandSender $sender, Command $cmd, string $label,array $args) : bool {
	if(($cmd->getName()) == "fly"){
	if($sender instanceOf Player and $sender->hasPermission("fly.use")){
	if($this->x == 0)
	{
	$sender->setAllowFlight(true);
	$sender->sendTip(C::YELLOW.C::UNDERLINE."Fly is on");
	$this->x=1;
	}else{
	$sender->setAllowFlight(false);	
	$sender->sendTip(C::RED.C::UNDERLINE."Fly is off");
	$this->x=0;
	}
	}else{
	$sender->sendMessage(C::RED.C::UNDERLINE."You have no permission!");	
	}			
	}
return true;	
	}
    
    public function onDisable(){
     $this->getLogger()->info("§cOffline");
    }
}
