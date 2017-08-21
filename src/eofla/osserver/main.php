<?php

namespace eofla\osserver;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;
use pocketmine\command\{Command, CommandSender};

class main extends PluginBase {
	
	/**
	 * onEnable()
	 *
	  * Plugin enable
	  *
	  * @return void
	  */
	public function onEnable() {	
	  	  $this->getLogger()->warning(TextFormat::YELLOW . "This plugin may not return accurate results.");
	  	  $this->getLogger()->info(TextFormat::GREEN . "Eofla Server OS has been started.");
	}
	
	/**
	 * onDisable()
	 *
	 * Plugin disable
	 *
	 * @return void
	 */
	public function onDisable() {
		$this->getLogger()->info(TextFormat::RED . "Eofla Server OS has been stopped.");
	}
	
	/**
	 * onCommand()
	 *
	 * Plugin commands
	 *
	 * @param CommandSender $sender
	 * @param Command $command
	 * @param string $label
	 * @param array $args
	 *
	 * @return bool
	 */
	public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool {
		if(strtolower($command->getName()) == "os") {
			$operatesys = php_uname("s");
	  	  	$verinfo = php_uname("v");
	  	  	$releasen = php_uname("r");
	  	  	$architect = php_uname("m");
	  	  	$sender->sendMessage(TextFormat::GOLD . "------- Server OS Info -------");
	  	  	$sender->sendMessage(TextFormat::GOLD . "-> Server OS: " . TextFormat::AQUA .  $operatesys);
	  	  	$sender->sendMessage(TextFormat::GOLD . "-> Kernel Build Date: " . TextFormat::AQUA . $verinfo);
	  	        $sender->sendMessage(TextFormat::GOLD . "-> Kernel Version: " . TextFormat::AQUA . $releasen);
	  	        $sender->sendMessage(TextFormat::GOLD . "-> Server Architecture: " . TextFormat::AQUA . $architect);
	  	        $sender->sendMessage(TextFormat::GOLD . "----------------------------");
		  	$log = fopen("Eofla-OSRequestLog.txt","a+");
	  	        fwrite($log, "[" .  date("Y/m/d l h:i:s a") . "] " . $sender->getName() . " requested our server info.\n");
	  	        fclose($log);
		}
		return true;
	}
}
