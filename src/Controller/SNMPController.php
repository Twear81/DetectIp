<?php 
// src/Controller/HelloController.php
namespace App\Controller;
use FreeDSx\Snmp\SnmpClient;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class SNMPController extends AbstractController {
   /**
     * @Route("/snmp", name="snmp")
    */
   public function indexAction() {
        $snmp = new SnmpClient([
            'host' => '192.168.1.134',
            'version' => 2,
            'community' => 'test',
        ]);

        //composant process de symfony (Running process) nmap
        
        
        # Get a specific OID as an object...
        $oid_name = $snmp->getValue('1.3.6.1.2.1.1.5.0');
        $oid_ip = $snmp->getValue('.1.3.6.1.2.1.92.1.3.2.1.9.7.100.101.102.97.117.108.116.1.2');
        $oid_mac_bin = $snmp->getValue('.1.3.6.1.2.1.55.1.5.1.8.2');
        $oid_mac_hex = preg_replace('~(..)(?!$)\.?~', '\1:', bin2hex($oid_mac_bin));

        return new Response('<html></head><body>' . $oid_name . ' ----- '. $oid_ip . ' ---- ' . $oid_mac_hex . '</body></html>');
    }
 
}
?>