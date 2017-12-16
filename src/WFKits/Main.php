 <?php
 namespace WFKits;
 use pocketmine\plugin\PluginBase;
 use pocketmine\event\player\PlayerJoinEvent;
 use pocketmine\event\player\PlayerQuitEvent;
 use pocketmine\Player;
 use pocketmine\Server;
 use pocketmine\event\Listener;
 use pocketmine\utils\TextFormat as C;
 use pocketmine\command\Command;
 use pocketmine\command\CommandSender;
 use pocketmine\event\player\PlayerCommandPreprocessEvent;
 
  class Main extends PluginBase implements Listener{
 	
  	public function onLoad(){
            	$this->getLogger()->info("Plugin Loading");
	}
	public function onEnable(){
 		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->getLogger()->info("Enabled Plugin");
	}
	  
	public function onDisable(){
		$this->getLogger()->info("Plugin disabled");
	}
	  
	public function onJoin(PlayerJoinEvent $event){
		$player = $event->getPlayer();
		$name = $player->getName();
		$this->getServer()->broadcastMessage(C::GREEN."Ducky Scammed the server! He's a dick!");
	}
	public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args) : bool {
		if($cmd->getname() == "wizard"){
 			if(!$sender instanceof Player){
				$sender->sendMessage("This command only works for players! Please perform this command IN GAME!");
       			}else{
 				$sender->sendmessage("Here's your wand, ".$sender->getName()."!");
 				$sender->getInventory()->addItem(Item::get(280,0,1));
 			}
 		}
  		return true;
	}
  }
