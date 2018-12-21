<?php
namespace EnchantmentInfoUI;
use pocketmine\Server;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use jojoe77777\FormAPI;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\event\server\ServerCommandEvent;
class EnchantmentInfoUI extends PluginBase implements Listener{
    public function onEnable(): void{
        $this->getServer()->getPluginManager()->registerEvents(($this), $this);
        $this->getLogger()->info("EnchantmentInfoUI Plugin Enabled");
    }
    public function onDisable(): void{
        $this->getServer()->getPluginManager()->registerEvents(($this), $this);
        $this->getLogger()->info("EnchantmentInfoUI Plugin Disabled");
    }
    public function checkDepends(): void{
        $this->formapi = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
        if(is_null($this->formapi)){
            $this->getLogger()->error("EnchantmentInfoUI Requires FormAPI To Work");
            $this->getPluginLoader()->disablePlugin($this);
        }
    }
    public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args):bool{
        if($cmd->getName() == "enchantmentinfo"){
            if(!($sender instanceof Player)){
                $sender->sendMessage("EnchantmentInfoUI Opening", false);
                return true;
            }
            $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
            $form = $api->createSimpleForm(function (Player $sender, $data){
                $result = $data;
                if ($result == null) {
                }
                switch ($result) {
                    case 0:
                        $sender->sendMessage("EnchantmentInfoUI Closing");
                        break;
                }
            });
            $form->setTitle("EnchantmentInfoUI");
            $form->setContent("EnchantmentInfo Below");
            $form->setContent("Protection");
            $form->setContent("Reduces Most Types Of Damage");
            $form->setContent("");
            $form->setContent("Fire Protection");
            $form->setContent("Reduces Fire Damage");
            $form->setContent("");
            $form->setContent("Feather Falling");
            $form->setContent("Reduces Fall Damage");
            $form->setContent("");
            $form->setContent("Blast Protection");
            $form->setContent("Reduces Explosion Damage");
            $form->setContent("");
            $form->setContent("Projectile Protection");
            $form->setContent("Reduces Projectile Damage");
            $form->setContent("");
            $form->setContent("Thorns");
            $form->setContent("Damages Attackers");
            $form->setContent("");
            $form->setContent("Respiration");
            $form->setContent("Extends Underwater Breathing Time");
            $form->setContent("");
            $form->setContent("Depth strider");
            $form->setContent("Increases Underwater Movement Speed");
            $form->setContent("");
            $form->setContent("Aqua affinity");
            $form->setContent("Increases Underwater Mining Rate");
            $form->setContent("");
            $form->setContent("Sharpness");
            $form->setContent("Increases Damage");
            $form->setContent("");
            $form->setContent("Smite");
            $form->setContent("Increases Damage To Undead Mobs");
            $form->setContent("");
            $form->setContent("Bane Of Athropods");
            $form->setContent("Increases Damage To Arthropods");
            $form->setContent("");
            $form->setContent("Knockback");
            $form->setContent("Increases Knockback");
            $form->setContent("");
            $form->setContent("Fire aspect");
            $form->setContent("Sets Target On Fire");
            $form->setContent("");
            $form->setContent("Looting");
            $form->setContent("Increases Mob Loot");
            $form->setContent("");
            $form->setContent("Efficiency");
            $form->setContent("Increases Mining Speed");
            $form->setContent("");
            $form->setContent("Silk touch");
            $form->setContent("Mined Blocks Drop Themselves");
            $form->setContent("");
            $form->setContent("Unbreaking");
            $form->setContent("Increases Effective Durability");
            $form->setContent("");
            $form->setContent("Fortune");
            $form->setContent("Increases Block Drops");
            $form->setContent("");
            $form->setContent("Power");
            $form->setContent("Increases Arrow Damage");
            $form->setContent("");
            $form->setContent("Punch");
            $form->setContent("Increases Arrow Knockback");
            $form->setContent("");
            $form->setContent("Flame");
            $form->setContent("Arrows Set Target On Fire");
            $form->setContent("");
            $form->setContent("Infinity");
            $form->setContent("Shooting Consumes No Arrows");
            $form->setContent("");
            $form->setContent("Mending");
            $form->setContent("Repair Items With Experience");
            $form->setContent("");
            $form->addButton("Exit EnchantmentInfoUI");
            $form->sendToPlayer($sender);
        }
        return true;
    }
}
