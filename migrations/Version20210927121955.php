<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210927121955 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_38D1870F71F7E88B');
        $this->addSql('DROP INDEX IDX_38D1870F88194DE8');
        $this->addSql('CREATE TEMPORARY TABLE __temp__enchere AS SELECT id, oeuvre_id, event_id, montant, nombre, temps_restant FROM enchere');
        $this->addSql('DROP TABLE enchere');
        $this->addSql('CREATE TABLE enchere (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, oeuvre_id INTEGER DEFAULT NULL, event_id INTEGER DEFAULT NULL, montant INTEGER NOT NULL, nombre INTEGER NOT NULL, temps_restant INTEGER NOT NULL, CONSTRAINT FK_38D1870F88194DE8 FOREIGN KEY (oeuvre_id) REFERENCES oeuvre (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_38D1870F71F7E88B FOREIGN KEY (event_id) REFERENCES event (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO enchere (id, oeuvre_id, event_id, montant, nombre, temps_restant) SELECT id, oeuvre_id, event_id, montant, nombre, temps_restant FROM __temp__enchere');
        $this->addSql('DROP TABLE __temp__enchere');
        $this->addSql('CREATE INDEX IDX_38D1870F71F7E88B ON enchere (event_id)');
        $this->addSql('CREATE INDEX IDX_38D1870F88194DE8 ON enchere (oeuvre_id)');
        $this->addSql('DROP INDEX IDX_F57B6785EA417747');
        $this->addSql('DROP INDEX IDX_F57B678571F7E88B');
        $this->addSql('CREATE TEMPORARY TABLE __temp__event_invite AS SELECT event_id, invite_id FROM event_invite');
        $this->addSql('DROP TABLE event_invite');
        $this->addSql('CREATE TABLE event_invite (event_id INTEGER NOT NULL, invite_id INTEGER NOT NULL, PRIMARY KEY(event_id, invite_id), CONSTRAINT FK_F57B678571F7E88B FOREIGN KEY (event_id) REFERENCES event (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_F57B6785EA417747 FOREIGN KEY (invite_id) REFERENCES invite (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO event_invite (event_id, invite_id) SELECT event_id, invite_id FROM __temp__event_invite');
        $this->addSql('DROP TABLE __temp__event_invite');
        $this->addSql('CREATE INDEX IDX_F57B6785EA417747 ON event_invite (invite_id)');
        $this->addSql('CREATE INDEX IDX_F57B678571F7E88B ON event_invite (event_id)');
        $this->addSql('DROP INDEX IDX_76759AC88194DE8');
        $this->addSql('DROP INDEX IDX_76759AC71F7E88B');
        $this->addSql('CREATE TEMPORARY TABLE __temp__event_oeuvre AS SELECT event_id, oeuvre_id FROM event_oeuvre');
        $this->addSql('DROP TABLE event_oeuvre');
        $this->addSql('CREATE TABLE event_oeuvre (event_id INTEGER NOT NULL, oeuvre_id INTEGER NOT NULL, PRIMARY KEY(event_id, oeuvre_id), CONSTRAINT FK_76759AC71F7E88B FOREIGN KEY (event_id) REFERENCES event (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_76759AC88194DE8 FOREIGN KEY (oeuvre_id) REFERENCES oeuvre (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO event_oeuvre (event_id, oeuvre_id) SELECT event_id, oeuvre_id FROM __temp__event_oeuvre');
        $this->addSql('DROP TABLE __temp__event_oeuvre');
        $this->addSql('CREATE INDEX IDX_76759AC88194DE8 ON event_oeuvre (oeuvre_id)');
        $this->addSql('CREATE INDEX IDX_76759AC71F7E88B ON event_oeuvre (event_id)');
        $this->addSql('DROP INDEX IDX_EAED8A046B60B52F');
        $this->addSql('DROP INDEX IDX_EAED8A047285E5A0');
        $this->addSql('CREATE TEMPORARY TABLE __temp__invite_invite AS SELECT invite_source, invite_target FROM invite_invite');
        $this->addSql('DROP TABLE invite_invite');
        $this->addSql('CREATE TABLE invite_invite (invite_source INTEGER NOT NULL, invite_target INTEGER NOT NULL, PRIMARY KEY(invite_source, invite_target), CONSTRAINT FK_EAED8A047285E5A0 FOREIGN KEY (invite_source) REFERENCES invite (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_EAED8A046B60B52F FOREIGN KEY (invite_target) REFERENCES invite (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO invite_invite (invite_source, invite_target) SELECT invite_source, invite_target FROM __temp__invite_invite');
        $this->addSql('DROP TABLE __temp__invite_invite');
        $this->addSql('CREATE INDEX IDX_EAED8A046B60B52F ON invite_invite (invite_target)');
        $this->addSql('CREATE INDEX IDX_EAED8A047285E5A0 ON invite_invite (invite_source)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_38D1870F88194DE8');
        $this->addSql('DROP INDEX IDX_38D1870F71F7E88B');
        $this->addSql('CREATE TEMPORARY TABLE __temp__enchere AS SELECT id, oeuvre_id, event_id, montant, nombre, temps_restant FROM enchere');
        $this->addSql('DROP TABLE enchere');
        $this->addSql('CREATE TABLE enchere (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, oeuvre_id INTEGER DEFAULT NULL, event_id INTEGER DEFAULT NULL, montant INTEGER NOT NULL, nombre INTEGER NOT NULL, temps_restant INTEGER NOT NULL)');
        $this->addSql('INSERT INTO enchere (id, oeuvre_id, event_id, montant, nombre, temps_restant) SELECT id, oeuvre_id, event_id, montant, nombre, temps_restant FROM __temp__enchere');
        $this->addSql('DROP TABLE __temp__enchere');
        $this->addSql('CREATE INDEX IDX_38D1870F88194DE8 ON enchere (oeuvre_id)');
        $this->addSql('CREATE INDEX IDX_38D1870F71F7E88B ON enchere (event_id)');
        $this->addSql('DROP INDEX IDX_F57B678571F7E88B');
        $this->addSql('DROP INDEX IDX_F57B6785EA417747');
        $this->addSql('CREATE TEMPORARY TABLE __temp__event_invite AS SELECT event_id, invite_id FROM event_invite');
        $this->addSql('DROP TABLE event_invite');
        $this->addSql('CREATE TABLE event_invite (event_id INTEGER NOT NULL, invite_id INTEGER NOT NULL, PRIMARY KEY(event_id, invite_id))');
        $this->addSql('INSERT INTO event_invite (event_id, invite_id) SELECT event_id, invite_id FROM __temp__event_invite');
        $this->addSql('DROP TABLE __temp__event_invite');
        $this->addSql('CREATE INDEX IDX_F57B678571F7E88B ON event_invite (event_id)');
        $this->addSql('CREATE INDEX IDX_F57B6785EA417747 ON event_invite (invite_id)');
        $this->addSql('DROP INDEX IDX_76759AC71F7E88B');
        $this->addSql('DROP INDEX IDX_76759AC88194DE8');
        $this->addSql('CREATE TEMPORARY TABLE __temp__event_oeuvre AS SELECT event_id, oeuvre_id FROM event_oeuvre');
        $this->addSql('DROP TABLE event_oeuvre');
        $this->addSql('CREATE TABLE event_oeuvre (event_id INTEGER NOT NULL, oeuvre_id INTEGER NOT NULL, PRIMARY KEY(event_id, oeuvre_id))');
        $this->addSql('INSERT INTO event_oeuvre (event_id, oeuvre_id) SELECT event_id, oeuvre_id FROM __temp__event_oeuvre');
        $this->addSql('DROP TABLE __temp__event_oeuvre');
        $this->addSql('CREATE INDEX IDX_76759AC71F7E88B ON event_oeuvre (event_id)');
        $this->addSql('CREATE INDEX IDX_76759AC88194DE8 ON event_oeuvre (oeuvre_id)');
        $this->addSql('DROP INDEX IDX_EAED8A047285E5A0');
        $this->addSql('DROP INDEX IDX_EAED8A046B60B52F');
        $this->addSql('CREATE TEMPORARY TABLE __temp__invite_invite AS SELECT invite_source, invite_target FROM invite_invite');
        $this->addSql('DROP TABLE invite_invite');
        $this->addSql('CREATE TABLE invite_invite (invite_source INTEGER NOT NULL, invite_target INTEGER NOT NULL, PRIMARY KEY(invite_source, invite_target))');
        $this->addSql('INSERT INTO invite_invite (invite_source, invite_target) SELECT invite_source, invite_target FROM __temp__invite_invite');
        $this->addSql('DROP TABLE __temp__invite_invite');
        $this->addSql('CREATE INDEX IDX_EAED8A047285E5A0 ON invite_invite (invite_source)');
        $this->addSql('CREATE INDEX IDX_EAED8A046B60B52F ON invite_invite (invite_target)');
    }
}
