<?php


	/*
	Remote Wake/Sleep-On-LAN Server [CONFIGURATION FILE]
	https://github.com/sciguy14/Remote-Wake-Sleep-On-LAN-Server
	Author: Jeremy E. Blum (http://www.jeremyblum.com)
	License: GPL v3 (http://www.gnu.org/licenses/gpl.html)
	
	UPDATE THE VALUES IN THIS FILE AND CHANGE THE NAME TO: "config.php"
	*/

	//Choose a passphrase and find the sha256 hash of that passphrase.
	//You can use an online calculator to generate the hash: http://www.xorbin.com/tools/sha256-hash-calculator.
	//Unless you are using an SSL connection to your server, remember that passphrases could still be obtained via a man-in-the-middle attack.
	$APPROVED_HASH = "36a9e7f1c95b82ffb99743e0c5c4ce95d83c9a430aac59f84ef3cbfab6145068";
	
	//This is the number of times that the WOL server will try to ping the target computer to check if it has woken up. Default = 10.
	$MAX_PINGS = 10;
	//This is the number of seconds to wait between pings commands when waking up or sleeping. Waking from shutdown or sleep will impact this.
	$SLEEP_TIME = 5;

	//This is the Name of the computers to appear in the drop down
	$COMPUTER_NAME = array("Jones Home","computer2");
	
	//This is the MAC address of the Network Interface on the computer you are trying to wake.
	$COMPUTER_MAC = array("bc:30:5b:d2:02:85","00:00:00:00:00:00:00");
	
	//This is the LOCAL IP address of the computer you are trying to wake.  Use a reserved DHCP through your router's administration interface to ensure it doesn't change.
	$COMPUTER_LOCAL_IP = array("192.168.0.25","192.168.0.2");

	
	//This is the Port being used by the Windows SleepOnLan Utility to initiate a Sleep State
	//http://www.ireksoftware.com/SleepOnLan/
	$COMPUTER_SLEEP_CMD_PORT = 7760;
	//Command to be issued by the windows sleeponlan utility 
	//options are suspend, hibernate, logoff, poweroff, forcepoweroff, lock, reboot
	//You can create a windows scheduled task that starts sleeponlan.exe on boot with following startup parameters /auto /port=7760
	$COMPUTER_SLEEP_CMD = "suspend";
	
	//This is the location of the bootstrap style folder relative to your index and config file. Default = "" (Same folder as this file)
	//Directory must be called "bootstrap". You may wish to move if this WOL script is the "child" of a larger web project on your Pi, that will also use bootstrap styling.
	//If if it on directory up, for example, you would set this to "../"
	//Two directories up? Set too "../../"
	//etc...
	$BOOTSTRAP_LOCATION_PREFIX = "";
?>