<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201202082732 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__snmp_client AS SELECT id, name, ip_address, mac_address FROM snmp_client');
        $this->addSql('DROP TABLE snmp_client');
        $this->addSql('CREATE TABLE snmp_client (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL COLLATE BINARY, ip_address VARCHAR(16) NOT NULL COLLATE BINARY, mac_address VARCHAR(25) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL)');
        $this->addSql('INSERT INTO snmp_client (id, name, ip_address, mac_address) SELECT id, name, ip_address, mac_address FROM __temp__snmp_client');
        $this->addSql('DROP TABLE __temp__snmp_client');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__snmp_client AS SELECT id, name, ip_address, mac_address FROM snmp_client');
        $this->addSql('DROP TABLE snmp_client');
        $this->addSql('CREATE TABLE snmp_client (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, ip_address VARCHAR(16) NOT NULL, mac_address VARCHAR(255) NOT NULL COLLATE BINARY)');
        $this->addSql('INSERT INTO snmp_client (id, name, ip_address, mac_address) SELECT id, name, ip_address, mac_address FROM __temp__snmp_client');
        $this->addSql('DROP TABLE __temp__snmp_client');
    }
}
