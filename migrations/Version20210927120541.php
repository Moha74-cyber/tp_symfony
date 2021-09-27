<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210927120541 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE admin (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, invite VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE artiste (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom VARCHAR(45) NOT NULL, oeuvres VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE enchere (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, oeuvre_id INTEGER DEFAULT NULL, event_id INTEGER DEFAULT NULL, montant INTEGER NOT NULL, nombre INTEGER NOT NULL, temps_restant INTEGER NOT NULL)');
        $this->addSql('CREATE INDEX IDX_38D1870F88194DE8 ON enchere (oeuvre_id)');
        $this->addSql('CREATE INDEX IDX_38D1870F71F7E88B ON enchere (event_id)');
        $this->addSql('CREATE TABLE event (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nature VARCHAR(255) NOT NULL, date DATE NOT NULL, nbre_invite INTEGER NOT NULL, description VARCHAR(255) NOT NULL, duree INTEGER NOT NULL)');
        $this->addSql('CREATE TABLE event_invite (event_id INTEGER NOT NULL, invite_id INTEGER NOT NULL, PRIMARY KEY(event_id, invite_id))');
        $this->addSql('CREATE INDEX IDX_F57B678571F7E88B ON event_invite (event_id)');
        $this->addSql('CREATE INDEX IDX_F57B6785EA417747 ON event_invite (invite_id)');
        $this->addSql('CREATE TABLE event_oeuvre (event_id INTEGER NOT NULL, oeuvre_id INTEGER NOT NULL, PRIMARY KEY(event_id, oeuvre_id))');
        $this->addSql('CREATE INDEX IDX_76759AC71F7E88B ON event_oeuvre (event_id)');
        $this->addSql('CREATE INDEX IDX_76759AC88194DE8 ON event_oeuvre (oeuvre_id)');
        $this->addSql('CREATE TABLE invite (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, numero INTEGER NOT NULL, last_enchere INTEGER NOT NULL)');
        $this->addSql('CREATE TABLE invite_invite (invite_source INTEGER NOT NULL, invite_target INTEGER NOT NULL, PRIMARY KEY(invite_source, invite_target))');
        $this->addSql('CREATE INDEX IDX_EAED8A047285E5A0 ON invite_invite (invite_source)');
        $this->addSql('CREATE INDEX IDX_EAED8A046B60B52F ON invite_invite (invite_target)');
        $this->addSql('CREATE TABLE oeuvre (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, date_creation DATE NOT NULL, description VARCHAR(255) NOT NULL, prix INTEGER NOT NULL)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE admin');
        $this->addSql('DROP TABLE artiste');
        $this->addSql('DROP TABLE enchere');
        $this->addSql('DROP TABLE event');
        $this->addSql('DROP TABLE event_invite');
        $this->addSql('DROP TABLE event_oeuvre');
        $this->addSql('DROP TABLE invite');
        $this->addSql('DROP TABLE invite_invite');
        $this->addSql('DROP TABLE oeuvre');
    }
}
